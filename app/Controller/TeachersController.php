<?php
class TeachersController extends AppController{
	var $uses = array('Teacher','Student','User','Lecture','Like','Tag');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout="teacher_home";
		
	}
	
	public function home(){
		
		if(!$this->request->data){
			$this->paginate = array(
				'conditions' => array('Lecture.userid' => $this->Session->read('userid')),
				'limit' => 2,
				'order' => array(
					'Lecture.lectureid' => 'desc'
					)

				);
			$this->set('Lectures', $this->paginate('Lecture'));
			// debug($this->paginate('Lecture'));die();
		}
	}
	
	public function view($value='')
	{
			# code...
	}
}
?>