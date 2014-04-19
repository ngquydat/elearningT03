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
class TestsController extends AppController{
	public $uses = array('Lecture','Like','File','Comment','Test','Tag','Result','Studentdotest','User');
	public $helpers = array('Html', 'Form');
	public $components = array("Tsv");

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout="tsv";
	}
	public function view($lectureid=null){
		if (!$lectureid) {
			throw new NotFoundException(__('Invalid Lecture'));
		}

		$Lecture = $this->Lecture->findByLectureid($lectureid);
		if (!$Lecture) {
			throw new NotFoundException(__('Invalid Lecture'));
		}
		if(!$this->request->data){
			$this->request->data = $Lecture;
			foreach ($Lecture['Test'] as $key => $Test) {
				$Lecture['Test'][$key]['TestDetail'] = $this->Tsv->readfile($Test['storelink']);
			}
			$this->set('data',$Lecture);
		}
	}
	public function test($testid=null)
	{
		if($testid){
			$Test = $this->Test->read(null, $testid);
			$this->request->data = $Test;

			$lectureid = $Test['Test']['lectureid'];

			$Lecture = $this->Lecture->read(null, $lectureid);
			$CommentsList = $this->Comment->find('all', array('conditions' => array('Comment.lectureid' => $lectureid)));

			$History = $this->Studentdotest->find('all', array('conditions' => array('Studentdotest.testid' => $testid, 'Studentdotest.userid' => $this->Session->read('userid'))));
			$TestDetail=$this->Tsv->readfile($Test['Test']['storelink']);
			$Lecture['History'] = $History;
			$Lecture['TestDetail'] = $TestDetail;
			$Lecture['CommentsList'] = $CommentsList;
			$this->set('data', $Lecture);
		}
	}
	public function result($testid = null){
		$this->layout="tsv";
		// pr($this->data);die();
		if($this->request->is('post')){
			// debug($this->data);die();
			$Test = $this->Test->read(null, $testid);
			// debug($Test);die();
			$TestDetail=$this->Tsv->readfile($Test['Test']['storelink']);
			$studentAnswer = $this->data['Test']['studentAnswer'];		
			$n = count($studentAnswer);
			$student_result = array();
			$time = date('Y-m-d h:i:s');
			$point = 0;

			for($i = 0; $i < $n; $i ++){
				if(($studentAnswer[$i] + 1) == $TestDetail['questionsList'][$i]['correctAnswer']){
					// $student_result[$i+1] = 1;
					$point += $TestDetail['questionsList'][$i]['point'];
				}
			}
			$studentdotest = $this->Studentdotest->find('first', array('conditions' => array('Studentdotest.testid' => $testid, 'Studentdotest.userid' => $this->Session->read('userid'))));
			// debug($studentdotest);
			if($studentdotest){
				// pr('studentdotest da ton tai');
				$this->Studentdotest->id = $studentdotest['Studentdotest']['studentdotestid'];
				$data = array(
					'Studentdotest' => array(
						'testid' => $testid,
						'userid' => $this->Session->read('userid'),
						'time' => $time,
						'point' => $point
						)
					);
				if($this->Studentdotest->save($data)){
					// pr("updated studentdotest");
					$result1 = $this->Result->find('all', array('conditions' => array('Result.testid' => $testid, 'Result.userid' => $this->Session->read('userid'))));
					foreach ($studentAnswer as $key => $result) {
						$this->Result->id = $result1[$key]['Result']['resultid'];
						$data = array(
							'Result' => array(
								'testid' => $testid,
								'userid' => $this->Session->read('userid'),
								'question' => $key,
								'answer' => $result 
								)
							);
						$this->Result->save($data);
					}
					$data = array(
						'Test' => array(
							'time' => $time,
							'point' => $point,
							'studentAnswer' => $studentAnswer
							)
						);
					$student_result = $data;
					$this->set('student_result', $student_result);
					$this->request->data = $student_result;
				}
			}
			else{
				$data = array(
					'Studentdotest' => array(
						'testid' => $testid,
						'userid' => $this->Session->read('userid'),
						'time' => $time,
						'point' => $point
						)
					);
				$this->Studentdotest->create();
				if($this->Studentdotest->save($data)){
					foreach ($studentAnswer as $key => $result) {
						$data = array(
							'Result' => array(
								'testid' => $testid,
								'userid' => $this->Session->read('userid'),
								'question' => $key,
								'answer' => $result 
								)
							);
						$this->Result->create();
						$this->Result->save($data);
					};
					$data = array(
						'testid' => $testid,
						'userid' => $this->Session->read('userid'),
						'time' => $time,
						'point' => $point,
						'studentAnswer' => $studentAnswer
						);
					$student_result = array('Test' => $data);
					$this->set('student_result', $student_result);
					$this->request->data = $student_result;
				}

			}
		}
		if($testid){

			$Test = $this->Test->read(null, $testid);
			$lectureid = $Test['Test']['lectureid'];

			$Lecture = $this->Lecture->read(null, $lectureid);

			$CommentsList = $this->Comment->find('all', array('conditions' => array('Comment.lectureid' => $lectureid)));
			$TestDetail=$this->Tsv->readfile($Test['Test']['storelink']);
			$Studentdotest = $this->Studentdotest->findByUseridAndTestid($this->Session->read('userid'), $testid);
			// pr($Studentdotest);
			$student_result['Test'] = $Studentdotest['Studentdotest'];
			$result = $this->Result->find('all', array('conditions' => array('Result.userid' => $this->Session->read('userid'), 'Result.testid' => $testid)));
			foreach ($result as $key => $value) {
				$studentAnswer[$value['Result']['question']] = $value['Result']['answer'];
			}
			$student_result['Test']['studentAnswer'] = $studentAnswer;
			$History = $this->Studentdotest->find('all', array('conditions' => array('Studentdotest.testid'=> $testid)));
			foreach ($History as $key => $value) {
				$History[$key]['Studentdotest']['username'] = $this->User->find('first', array('conditions' => array('User.userid' => $value['Studentdotest']['userid'])))['User']['username'];

			}
			$this->request->data = $student_result;
			$Lecture['History'] = $History;
			$Lecture['TestDetail'] = $TestDetail;
			$Lecture['CommentsList'] = $CommentsList;
			$Lecture['StudentResult'] = $student_result;
			$this->set('data', $Lecture);
		}


	}
	public function studentdotest($lectureid = null){
		$this->layout="tsv";
		if (!$lectureid) {
			throw new NotFoundException(__('Invalid Lecture'));
		}

		$Lecture = $this->Lecture->findByLectureid($lectureid);
		if (!$Lecture) {
			throw new NotFoundException(__('Invalid Lecture'));
		}
		if(!$this->request->data){
			$this->request->data = $Lecture;
			$History = $this->Studentdotest->find('all', array('conditions' => array('Studentdotest.userid'=> $this->Session->read('userid'))));
			foreach ($History as $key => $value) {
				$History[$key]['Studentdotest']['Result'] = $this->Result->findByUseridAndTestid($value['User']['userid'],$value['Studentdotest']['testid'])['Result'];
			}
			foreach ($History as $key => $value) {
				$History[$key]['Test']['Lecture'] = $this->Lecture->findByLectureid($value['Test']['lectureid']);
			}
			$Lecture['History'] = $History;
			$this->set('data',$Lecture);
			// debug($Lecture);die();
		}
		
	}
}
