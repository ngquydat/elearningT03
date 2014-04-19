<?php
class TagsController extends AppController{
	var $name = "Tags";
	var $helpers = array('Paginator','Html');
	var $components = array('Session');
	var $paginate = array(); 
	public function search_tag()
	{
		if(!strcmp($this->Session->read('role'),"admin")){$this->layout="admin";}
		if(!strcmp($this->Session->read('role'),"teacher")){$this->layout="teacher_home";}
		if(!strcmp($this->Session->read('role'),"student")){$this->layout="student_home";}
		
		$this->loadModel("Tag");
		$this->paginate = array(
			'fields'=>'DISTINCT tagname',
			'limit' => 100,
			'order' => array('tagid' => 'desc'),
			);
		$tags = $this->paginate("Tag");
		$this->set('tags', $tags);
	}


}


?>