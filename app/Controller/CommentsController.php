<?php
class CommentsController extends AppController{
	public function beforeFilter(){
		// $this->layout="user";
		parent::beforeFilter();
		$this->set('session', $this->Session->read());
	}
	public function index(){
		$commentsList = $this->Comment->find('all');	//get all user in User table
		$this->set('commentsList', $commentsList);	//gửi đến View/Users/index.ctp
	}

	public function addComment(){
		if ($this->request->is('post')) {
			$this->request->data['Comment']['userid'] = $this->Session->read('userid');
			$this->request->data['Comment']['time'] = date('Y-m-d h:i:s');
			// pr($this->request->data);die();
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				return $this->redirect($this->referer());
			}
			$this->Session->setFlash('サーバに接続できない','default',array('class' => 'error1'));
			return $this->redirect($this->referer());
		}
	}

}
