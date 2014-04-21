<?php
class File_test {
	public $title;
	public $subtitle;
	public $ques_id;
	public $ques_content;
	public $ans_id=array();
	public $ans_content=array();
	public $ans_true;
	public $point;
}
class LecturesController extends AppController{
	public $uses = array('Block','Studentlearnlecture','Lecture','Like','File','Comment','Test','Tag','Result','Studentdotest','User','Report');
	public $helpers = array('Html', 'Form');
	public $components = array("Tsv");

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout="user";
		
	}
	public function home(){
		$users = $this->Lecture->find('all', array('conditions' => array('Lecture.create_time BETWEEN NOW() -INTERVAL 1 DAY AND NOW()'), 'recursive' => -2));
		// pr($users);die();
	}
	public function search(){
		// pr(!strcmp($this->Session->read('role'),"teacher"));die();
		

		if($this->request->is('get')){
			
			if(!strcmp($this->Session->read('role'),"admin")){$this->layout="admin";}
			if(!strcmp($this->Session->read('role'),"teacher")){$this->layout="teacher_home";}
			if(!strcmp($this->Session->read('role'),"student")){$this->layout="student_home";}
			$keywords = explode("-",$this->request->query('key'));
			$keywords1 = explode("+", $this->request->query('key'));
			$conditionsOR = array();
			$conditionsAND = array();
			foreach ($keywords as $key => $keyword) {
				$conditionsOR[$key] = array('Lecture.title LIKE' => '%'.$keyword.'%');
			}
			foreach ($keywords1 as $key => $keyword) {
				$conditionsAND[$key] = array('Lecture.title LIKE' => '%'.$keyword.'%');
			}
			if(count($conditionsOR)>1){
				$this->paginate = array('conditions' => array('OR' => $conditionsOR),'limit' => 2,'recursive' => 3,'order' => array('Lecture.lectureid' => 'desc'));
			}
			if(count($conditionsAND)>1){
				$this->paginate = array('conditions' => array('AND' => $conditionsAND),'limit' => 2,'recursive' => 3,'order' => array('Lecture.lectureid' => 'desc'));
			}
			if(count($conditionsAND)==1 && count($conditionsOR)==1){
				$this->paginate = array('conditions' => array('AND' => $conditionsAND),'limit' => 2,'recursive' => 3,'order' => array('Lecture.lectureid' => 'desc'));
			}
			$this->set('Lectures', $this->paginate('Lecture'));
		}
	}
	public function search_tag($key=null){
		if(!strcmp($this->Session->read('role'),"admin")){$this->layout="admin";}
		if(!strcmp($this->Session->read('role'),"teacher")){$this->layout="teacher_home";}
		if(!strcmp($this->Session->read('role'),"student")){$this->layout="student_home";}

		$this->paginate = array(
			'conditions' => array(
				'Tag.tagname' => $key
				),
			'limit' => 2,
			'recursive' => 3,
			'order' => array(
				'Tag.lectureid' => 'desc'
				)

			);
		$this->set('Lectures', $this->paginate('Tag'));
		// pr($this->paginate('Tag'));die();
	}
	public function simulator($value='')
	{
		$this->layout="user";
		$lecture= $this->Lecture->find('first', array('recursive'=>2,'conditions' => array('Lecture.lectureid' => 1)
			));
		$this->set('lecture',$lecture);			

	}
	public function learn($lectureid=null)
	{
		if($this->Session->read('role')=='admin')
		{
			$this->layout='admin';
		}
		else
		{
			$this->layout="tsv";
		}
		if (!$lectureid) {
			throw new NotFoundException(__('Invalid Lecture'));
		}

		$Lecture = $this->Lecture->findByLectureid($lectureid);
		if (!$Lecture) {
			throw new NotFoundException(__('Invalid Lecture'));
		}
		//is Student?
		if(!strcmp($this->Session->read('role'), "student")){
				//check exists in studentlearnlecture
			$islearn = $this->Studentlearnlecture->findByLectureidAndUserid($lectureid,$this->Session->read('userid'));
			if(!$islearn){
				//dang ky hoc
				$newStudent = array('Studentlearnlecture'=>array(
					'lectureid'=>$lectureid,
					'userid'=>$this->Session->read('userid'),
					'time'=>date('Y-m-d h:i:s'),
					'isblock'=>0
					));
				$this->Studentlearnlecture->create();
				if($this->Studentlearnlecture->save($newStudent)){
					$this->Session->setFlash('授業に登録しましたので、２００００ドンを払いました','default',array('class' => 'notice1'));
				}
			}else {
				//check block
				$isBlock = $this->Block->findByUserid($this->Session->read('userid'));
				if($isBlock){
					$this->Session->setFlash('この授業からブロックされています','default',array('class' => 'warning1'));
					return $this->redirect(array("controller"=>"students","action"=>"home"));
				}
			}
		}else{
			//is owner?
			if($this->Session->read('userid') == $Lecture['Lecture']['userid']){
				$this->Session->setFlash('あなたはこの授業のオーナで、学生リスト参照してみましょうか','default',array('class' => 'notice1'));
			}else{
				//is admin or the other teacher?
				$this->Session->setFlash('ようこそ','default',array('class' => 'success1'));
			}
			
		}
		$this->request->data = $Lecture;
		$CommentsList = $this->Comment->find('all', array('conditions' => array('lectureid' => $lectureid)));

		$Lecture['CommentsList'] = $CommentsList;

		//studentlist
		$studentlist = array();
		foreach ($Lecture['Studentlearnlecture'] as $key => $student) {
			if($student['isblock'] == 0){
				$studentlist[$key] = $this->User->findByUserid($student['userid']);	
			}
		}
		//blockList
		$blockList = array();
		foreach ($Lecture['Block'] as $key => $student) {
			$blockList[$key] = $this->User->findByUserid($student['userid']);
		}
		if($studentlist!=null)$Lecture['studentList'] = $studentlist;
		if($blockList!=null)$Lecture['blockList'] = $blockList;
		foreach ($Lecture['Test'] as $key => $Test) {
			$Lecture['Test'][$key]['TestDetail'] = $this->Tsv->readfile($Test['storelink']);
		}
		$this->set('data',$Lecture);
		// pr($Lecture);die();
	}
	public function statistic($value='')
	{
		$this->layout="user";
		$lecture= $this->Lecture->find('first', array('recursive'=>2,'conditions' => array('Lecture.lectureid' => 1)
			));
		$this->set('lecture',$lecture);
	}
	public function add($value='')
	{
		$filetype = array("pdf","PDF","mp4","MP4","mp3","MP3","wav","WAV","jpg","JPG","gif","GIF","png","PNG","tsv","TSV");

		// pr($this->webroot);die();
		if($this->request->is('post')){
			// pr($this->request->data);die();
			$data = $this->request->data;
			$data['Lecture']['userid'] = $this->Session->read('userid');
			$data['Lecture']['create_time'] = date('Y-m-d h:i:s');
			if($this->data['Lecture']['files'][0]['name']){
				foreach ($this->data['Lecture']['files'] as $key => $file) {
					$type = explode(".", $file['name'])[1];
					if (!in_array($type, $filetype)) {
						$this->Session->setFlash("このファイルタイプはサポートしない: ".$type,'default',array('class' => 'warning1'));
						return $this->redirect($this->referer());
					}
				}
			}
			$this->Lecture->create();
			if($this->Lecture->save($data)){
				$tags = explode(",", $this->data['Lecture']['tagname']);
				foreach ($tags as $key => $tag) {
					$data = array(
						'tagname' => $tag,
						'lectureid' => $this->Lecture->id
						);
					$this->Tag->create();
					if(!$this->Tag->save($data)){
						$this->Session->setFlash("これを追加できない ".$tag,'default',array('class' => 'error1'));
						return $this->redirect($this->referer());
					}
				}
				if($this->data['Lecture']['files'][0]['name']){
					foreach ($this->data['Lecture']['files'] as $key => $file) {
						$filename = "./files/".$file['name']; 
						move_uploaded_file($file['tmp_name'],$filename);
						$data = array(
							'title' => $file['name'],
							'lectureid' => $this->Lecture->id,
							'storelink' => "http://localhost".$this->webroot."files/".$file['name']
							);
					// debug($data);die();
						$this->File->create();
						if(!$this->File->save($data)){
							$this->Session->setFlash("ファイルアップロードできない",'default',array('class' => 'error1'));
						}
					}
				}
				if($this->data['Lecture']['files1'][0]['name']){
					foreach ($this->data['Lecture']['files1'] as $key => $file) {
						$filename = "./tests/".$file['name']; 
						move_uploaded_file($file['tmp_name'],$filename);

						$data = array(
							'title' => $file['name'],
							'lectureid' => $this->Lecture->id,
							'storelink' => "http://localhost".$this->webroot."tests/".$file['name']
							);
						$this->Test->create();
						if(!$this->Test->save($data)){
							$this->Session->setFlash("ファイルアップロードできない",'default',array('class' => 'error1'));
						}
					}
				}
				$this->redirect(array('controller' => 'teachers','action' => 'home'));
			}
		}	
	}
	public function delete($lectureid=null)
	{
		if ($this->Lecture->delete($lectureid)) {
			return $this->redirect($this->referer());
		}
	}
	public function edit($lectureid=null)
	{
		if (!$lectureid) {
			throw new NotFoundException(__('Invalid lecture'));
		}

		$lecture = $this->Lecture->findByLectureid($lectureid);
		if (!$lecture) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		if($this->request->is('post')){
			// pr($this->request->data);die();
			$this->Lecture->id = $lectureid;
			$data = $this->request->data;
			if($this->Lecture->save($data)){

				$this->redirect(array('controller' => 'teachers','action' => 'home'));
			}


		}
		if (!$this->request->data) {
			$this->request->data = $lecture;
		}	
	}


	public function like($lectureid = null){
		$like = $this->Like->findByLectureidAndUserid($lectureid,$this->Session->read('userid'));
		if(!$like){
			// pr($this->referer());die();
			$data = array(
				'Like' => array(
					'userid' => $this->Session->read('userid'), 
					'lectureid' => $lectureid
					)
				);
			$this->Like->create();
			if ($this->Like->save($data)) {
				return $this->redirect($this->referer());
			}
		}
		return $this->redirect($this->referer());	
	}
	public function blockstudent($lectureid = null){
		$this->layout="tsv";
		if($this->request->is('post')){
			//set isblock=0 from studentlearnlecture table
			$result = $this->Studentlearnlecture->find('first',array('conditions'=>array('Studentlearnlecture.lectureid'=>$lectureid,'Studentlearnlecture.userid'=>$this->data['Lecture']['userid'])));
			
			if($result){
				$this->Studentlearnlecture->id = $result['Studentlearnlecture']['studentlearnlectureid'];
				if($this->Studentlearnlecture->save(array('isblock'=>1))){
					//check exists from block table
					$exists = $this->Block->find('first',array('conditions'=>array('lectureid'=>$lectureid,'userid'=>$this->data['Lecture']['userid'])));
					if(!$exists){
						//add into block table
						$this->Block->create();
						$newBlock = array('Block'=>array('lectureid'=>$lectureid,'userid'=>$this->data['Lecture']['userid']));
						if($this->Block->save($newBlock)){
							$this->Session->setFlash('ブロックしました','default',array('class' => 'success1'));
							return $this->redirect(array('action'=>'learn',$lectureid));
						}
					}
				}
			}
		}
		if(!$this->request->data){
			$Lecture = $this->Lecture->read(null, $lectureid);
			$this->request->data = $Lecture;
			$this->set('data',$Lecture);
			//studentlist
			$studentlist = array();
			foreach ($Lecture['Studentlearnlecture'] as $key => $student) {
				if($student['isblock'] == 0){
					$studentlist[$key] = $this->User->findByUserid($student['userid']);	
				}
			}
			//blockList
			$blockList = array();
			foreach ($Lecture['Block'] as $key => $student) {
				$blockList[$key] = $this->User->findByUserid($student['userid']);
			}
			if($studentlist!=null)$this->set('studentlist', $studentlist);
			if($blockList!=null)$this->set('blockList',$blockList);
		}
	}
	public function unblock($lectureid = null){
		if($this->request->is('post')){
			//check exists from Block table
			$result = $this->Block->find('first',array('conditions'=>array('lectureid'=>$lectureid,'userid'=>$this->data['Lecture']['userid'])));
			if($result){
				//delete from block table
				if($this->Block->delete($result['Block']['blockid'])){
					//set isblock = 0 from Studentlearnlecture
					$unblock = $this->Studentlearnlecture->find('first',array('conditions'=>array('Studentlearnlecture.lectureid'=>$lectureid,'Studentlearnlecture.userid'=>$this->data['Lecture']['userid'])));
					if($unblock){
						$this->Studentlearnlecture->id = $unblock['Studentlearnlecture']['studentlearnlectureid'];
						if($this->Studentlearnlecture->save(array('isblock'=>0))){
							$this->Session->setFlash('ブロックを解除しました','default',array('class' => 'success1'));
							return $this->redirect(array('action'=>'learn',$lectureid));
						}
					}
				}
			}
		}
	}


}

?>