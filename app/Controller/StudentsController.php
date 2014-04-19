<?php
class StudentsController extends AppController{
	public $components = array("Bill");
	public $uses = array('Lecture','Like','File','Comment','Test','Tag','Result','Studentlearnlecture','User');
	public function beforeFilter(){
		$this->layout="user";

	}
	public function home(){
		$this->layout="student_home";
		$this->paginate = array(
			'conditions' => array('Studentlearnlecture.userid' => $this->Session->read('userid')),
			'limit' => 2,
			'recursive' => 3
			);
		$this->set('Lectures', $this->paginate('Studentlearnlecture'));
	}


	public function view($lectureid='')
	{
		$this->layout="user";
		$this->Bill->writefile('c:\\xampp\\htdocs\\elearning\\app\\webroot\\bill\\bill.tsv');
	//pr($p);
	//$this->set('p',$p);
	}
	public function studentlearnlecture($lectureid=null){
		if($lectureid){
			$data = array(
				'lectureid' => $lectureid,
				'userid' => $this->Session->read('userid'),
				'time' => date('Y-m-d h:i:s')
				);
			$this->Studentlearnlecture->create();
			if($this->Studentlearnlecture->save($data)){
				return $this->redirect(array(
					'controller' => 'lectures',
					'action' => 'learn',
					$lectureid
					));
			}
		}

	}
}
?>