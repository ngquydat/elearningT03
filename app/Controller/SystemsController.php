<?php
class SystemsController extends AppController{
	var $uses = array('User', 'Admin','Adminip','Report','Lecture','System');
	var $components = array('Session','Bill','Attempt');
	public function beforeFilter(){
		parent::beforeFilter();
		$this->layout="admin";
	}
	public function change_system_coefficient($systemid=null)
	{
		if(!$systemid){
			$this->Session->setFlash("システムIDは存在していない",'default',array('class' => 'error1'));
		}
		$system=$this->System->findBysystemid($systemid);
		if(!$system){
			$this->Session->setFlash("システムは存在していない",'default',array('class' => 'error1'));
		}
			//$this->set("teacher",$teacher);

			// cap nhat du lieu
		if($this->request->is('post')){
			$this->System->id = $systemid;
			if($this->System->save($this->data)){
				$this->Session->setFlash("アップデートできました",'default',array('class' => 'success1'));
				return $this->redirect($this->referer());
			}
			$this->Session->setFlash("アップデート不成功です",'default',array('class' => 'error1'));
			return $this->redirect($this->referer());

		}
		if(!$this->request->data){
			$this->request->data = $system;
		}
	}
}
?>