	<?php
	class UsersController extends AppController{
		//var $name = "Users";
		var $helpers = array('Paginator','Html');
		var $components = array('Session','Bill','Attempt');
		var $paginate = array(); 
		var $uses = array('Report','Teacher','Student','User','Lecture','Studentlearnlecture','Registerrequest','System','Adminip');
		public function beforeFilter(){
			parent::beforeFilter();
			$this->layout="user";
		}
		public function isAuthorized($user){
			if((isset($user['role']))&&($user['role']==='teacher')){
				if($this->action==='check_verifycode') return true;
				if(($this->Session->read('ipchecked')==1)) return true;
				else return false;

			}

			if($this->action==="accept_register"){
				if(isset($user['role'])&&$user['role']==='admin') return true; 
				else return false;
			}
			
			return true;
		}
		
		public function login(){
			$this->layout='login';
			$loginAttemptLimit = 10;
			$loginAttemptDuration = '+1 hour';
			$AdminList = $this->Adminip->find('all');
			$ipAdmin = array();
			if($AdminList){
				foreach ($AdminList as $key => $admin) {
					$ipAdmin[$key] = $admin['Adminip']['ipid'];
				}
				if (in_array($_SERVER['REMOTE_ADDR'], $ipAdmin)) {
					$this->set('admin',$ipAdmin);
				}
			}

			if($this->request->is('post')){
				$username=$this->request->data['User']['username'];
				if (in_array($_SERVER['REMOTE_ADDR'], $ipAdmin)) {
					if($this->Auth->login()){
						$data=$this->User->findByusername($this->request->data['User']['username']);
						$this->Session->write('username',$data['User']['username']);
						$this->Session->write('userid',$data['User']['userid']);
						$this->Session->write('role',$data['User']['role']);
						$this->Session->setFlash('ようこそ');
						
						if($this->Adminip->findByUseridAndIpid($this->Session->read('userid'),$_SERVER['REMOTE_ADDR'])){
							return $this->redirect(array('controller' => 'admins', 'action' => 'home'));
						}else {
							$this->Auth->logout();
							$this->Session->destroy();
							$this->Session->setFlash('現在のIPアドレス前回のIPアドレスではない又はあなたは管理者ではない!');
						}

					}else{
						$this->Session->setFlash(__('ユーザ名とパスワードは不正です'));
					}
					
				}else{
					if ( $this->Attempt->limit($username,'login',$this->System->findBySystemid("1")['System']['numberwrongpassword']) ){
						if($this->Auth->login()){
							$data=$this->User->findByusername($this->request->data['User']['username']);
							$this->Session->write('username',$data['User']['username']);
							$this->Session->write('userid',$data['User']['userid']);
							$this->Session->write('role',$data['User']['role']);
							$this->Session->setFlash('ようこそ');

							if($this->Session->read('role') == 'admin'){
								if($this->Adminip->findByUseridAndIpid($this->Session->read('userid'),$_SERVER['REMOTE_ADDR'])){
									return $this->redirect(array('controller' => 'admins', 'action' => 'home'));
								}else {
									$this->Auth->logout();
									$this->Session->destroy();
									$this->Session->setFlash('現在のIPアドレス前回のIPアドレスではない');
								}

							}
							if($this->Session->read('role') == 'student'){

								return $this->redirect(array('controller' => 'students', 'action' => 'home'));
							}
							if($this->Session->read('role') == 'teacher'){
								if($this->Session->read('ipchecked')==-1){
									$this->Session->setFlash('Verifycodeをもう一度入力してください');
									return $this->redirect(array('controller'=>'users','action'=>'check_verifycode'));
								}
								if(!$data['Teacher']['previousip']){
									$this->Teacher->id = $this->Session->read("userid");
									if($this->Teacher->save(array('previousip' => $_SERVER['REMOTE_ADDR']))){
										$this->Session->write('ipchecked',1);
										return $this->redirect(array('controller' => 'teachers', 'action' => 'home'));
									}
								}else{
									if($data['Teacher']['previousip']==$_SERVER['REMOTE_ADDR']){
										$this->Session->write('ipchecked',1);
										return $this->redirect(array('controller' => 'teachers', 'action' => 'home'));
									}
									else {
										$this->Session->setFlash('現在のIPアドレス前回のIPアドレスではない');
										$this->Session->write('ipchecked',-1);
										return $this->redirect(array('controller'=>'users','action'=>'check_verifycode'));
									}
								}
							}

						}
						else {
							$this->Attempt->fail($username,'login', '+'.$this->System->findBySystemid("1")['System']['timeblocksession'].' minutes');

							$this->Session->setFlash(__('ユーザ名とパスワードは不正です'));
						}
					}
					else
					{
						$this->Session->write('ipchecked',-1);
						$this->Session->setFlash('ブロックした！');
					}
				}
			}
		}
		public function logout()
		{
			$this->Auth->logout();
			$this->Session->destroy();
			return $this->redirect($this->Auth->redirect());
		}

		public function register()
		{
			$this->loadModel('Registerrequest');
			$this->layout="register";
			if($this->request->is("post")){
					//debug($this->request->data);
				$username=$this->request->data['Registerrequest']['username'];
				if(strcmp($this->request->data['Registerrequest']['password'],$this->request->data['Registerrequest']['password2'])!=0){
					$this->Session->setFlash('パスワード入力は不正である');
					return;
				}
				if($this->User->findByusername($username)||($this->Registerrequest->findByusername($username))){
					$this->Session->setFlash('存在しているユーザ名である');
					return;
				}
					// debug($this->User->validationErrors);die();
				$this->loadModel('Registerrequest');
				if(!$this->Registerrequest->save($this->data)){
					$this->Session->setFlash("データベースに格納できない");	
				} 

				else {
					$this->Session->setFlash("管理者に登録情報を送りましたので、管理者が確認するまでにお待ちください");
					return $this->redirect(array('controller' => 'users', 'action' => 'login'));}
				}


			}
			public function change_profile($id=null){
				if($this->Session->read('role') == 'admin')$this->layout = "admin";
				if($this->Session->read('role') == 'teacher')$this->layout="teacher_home";
				if($this->Session->read('role') == 'student')$this->layout="student_home";

				if($this->request->is('post')){
					$this->User->id = $this->request->data['User']['userid'];
					if($this->User->saveAll($this->request->data)){
						$this->Session->setFlash('プロフィール情報を格納しました');
					}
				// debug($this->User->validationErrors);
				}

				if(!$this->request->data){
					$user = $this->User->read(null, $id);
					$this->request->data = $user;
				}
			}

			public function deleteUser($id) {
				if ($this->User->delete($id)) {
					return $this->redirect(array('controller' => 'admins','action' => 'home'));
				}
			}


		public function change_password($userid=null) // Da xong
		{
			if (!$userid) {
				// throw new NotFoundException(__('Invalid User'));
			}

			$user = $this->User->findByUserid($userid);
			if (!$user) {
				// throw new NotFoundException(__('Invalid User'));
			}

			if($this->request->is('post')){
				if(!strcmp(AuthComponent::password($this->data['User']['oldpassword']),$user['User']['password']))
				{
					if(!strcmp($this->data['User']['newpassword1'],$this->data['User']['newpassword'])) {
						$this->User->id = $this->request->data['User']['userid'];
						$data =  array('User' => array(
							'password' => $this->request->data['User']['newpassword']
							)
						);
						if($this->User->save($data)){
							$this->Session->setFlash('パスワードを変更しました');
							return $this->redirect($this->referer());
						}
						$this->Session->setFlash('パスワードを変更できません');
						return $this->redirect($this->referer());
					}

				} 

			}
			if (!$this->request->data) {
				$this->request->data = $user;
			}	
		}

		public function change_verify_code($userid = null){ // Da xong
			if (!$userid) {
				// throw new NotFoundException(__('Invalid User'));
			}

			$user = $this->User->findByUserid($userid);
			if (!$user) {
				// throw new NotFoundException(__('Invalid User'));
			}

			if($this->request->is('post')){
				if(!strcmp($this->data['User']['secretquestion'],$user['User']['secretquestion']) &&
					!strcmp(AuthComponent::password($this->data['User']['oldverifycode']),$user['User']['verifycode']))
				{
					$this->User->id = $this->data['User']['userid'];
					$data =  array(
						'secretquestion' => $this->data['User']['newsecretquestion'],
						'verifycode' => $this->data['User']['newverifycode'],
						);
						// debug($data);die();
					if($this->User->save($data)){
						$this->Session->setFlash('verifycode変更しました');
						return $this->redirect($this->referer());
					}
					$this->Session->setFlash('verifycode変更できませんでした');
					return $this->redirect($this->referer());
				} 
			}
			if (!$this->request->data) {
				$this->request->data = $user;
			}
		}

		public function change_secession($id = null)
		{
			if(!$id){

			}
			$user=$this->User->findByuserid($id);
			if(!$user){

			}
			if($this->request->is('post')){

				if(!strcmp (AuthComponent::password($this->request->data['User']['mypassword']), $user['User']['password'])) {

					if (!strcmp (AuthComponent::password($this->request->data['User']['answer']), $user['User']['verifycode'])) {
						$this->User->delete($user['User']['userid']);
						$this->Auth->logout();
						$this->Session->setFlash("あなたのアカウントを削除しました");
						$this->Session->destroy();
						return $this->redirect($this->Auth->redirect());
					}
				} 
			}
			if(!$this->request->data){
				$this->request->data = $user;
			}
		}

		public function watch_bill_user()
		{
			$userid=$this->Session->read("userid");
			//$this->User->find->('first')
			//if($this->request->is('post')){
			$this->loadModel("Studentlearnlecture");
			$this->loadModel("Lecture");
			$user=null;
			$user1=$this->User->find('all', array('recursive'=>3,'conditions' => array('User.userid'=>$userid)));
			if($this->data){
				
				if($this->Session->read('role') == 'student'){			
					$year=$this->data['User']['month_year']['year'];
					$month=$this->data['User']['month_year']['month'];
				//pr($this->data);
					$day='01';
					$start='date("'.$year.'-'.$month.'-'.$day.' 00:00:00")';
				//$user=$this->Lecture->find('all', array('conditions' => array('Lecture.create_time BETWEEN NOW() - INTERVAL 1 MONTH AND NOW()')));
					$user=$this->Studentlearnlecture->find('all', array('recursive'=>3,'conditions' => array('Studentlearnlecture.time BETWEEN '.$start.' AND '.$start.' + INTERVAL 1 MONTH','User.userid'=>$userid,)));


				}
				if($this->Session->read('role') == 'teacher'){
					$year=$this->data['User']['month_year']['year'];
					$month=$this->data['User']['month_year']['month'];
					$day='01';
					$start='date("'.$year.'-'.$month.'-'.$day.' 00:00:00")';
				//$user=$this->Lecture->find('all', array('conditions' => array('Lecture.create_time BETWEEN NOW() - INTERVAL 1 MONTH AND NOW()')));
					$user=$this->Studentlearnlecture->find('all', array('recursive'=>3,'conditions' => array('Studentlearnlecture.time BETWEEN '.$start.' AND '.$start.' + INTERVAL 1 MONTH','Lecture.userid'=>$userid,)));
				}
				$this->set('user',$user);
			//}
			//pr($user);
				if($user)
				{
					$this->Bill->writefile(ROOT.'\\app\\webroot\\bill\\'.$this->Session->read('username').'_'.$year.'_'.$month.'.tsv',$user,$this->Session->read('role'),$year,$month);	
				}
				else
				{
					$this->Bill->writefile(ROOT.'\\app\\webroot\\bill\\'.$this->Session->read('username').'_'.$year.'_'.$month.'.tsv',$user1,$this->Session->read('role'),$year,$month);	
				}
			//.$this->Session->read('username').'_'.$year.'_'.$month.'.tsv'	
			}		
		}
		public function download_bill() {
			//$ym=$this->watch_bill_user();
			//die();
			//pr($ym);
			$year='2014';
			$month='3';

			$value=$this->Session->read('username');
			//$this->autoRender = false;
			$this->viewClass = 'Media';     
			
	    	// $pathInfo = pathinfo($file['webroot'.DS.'bill'.DS]);
			$params = array(
				'id'        => $value.'_'.$year.'_'.$month.'.tsv',
				'name'      => $value.'_'.$year.'_'.$month,
				'download'  => true,
				'extension' => 'tsv',
				'mimeType'  => 'text/tsv tsv', 
				'cache'		=> true,
				'path'      =>  'webroot'.DS.'bill'.DS,

				);
			$this->set($params);
			$this->autoLayout = false;
		}

		public function reset_password($id = null) // Sua lai database
		{
			if(!$id){

			}
			$user = $this->User->findByuserid($id);
			if(!$user){

			}
			// pr($data);die();
			if($this->User->updateAll(
				array('User.password' => "'".$user['User']['initialpassword']."'"),
				array('User.userid' => $id)
				)){
				$this->Session->setFlash("リセットしました");
			return $this->redirect($this->referer());
		}
		$this->Session->setFlash("resetできませんでした");

		return $this->redirect($this->referer());

	}
		public function reset_verify_code($id =null) // okie
		{
			if(!$id){

			}
			$user = $this->User->findByuserid($id);
			if(!$user){

			}
			if($this->User->updateAll(
				array('User.verifycode' => "'".$user['User']['initialverifycode']."'"),
				array('User.userid' => $id)
				)){
				$this->Session->setFlash("リセットしました");
			return $this->redirect($this->referer());
		}
		$this->Session->setFlash("resetできませんでした");

		return $this->redirect($this->referer());
	}
	public function accept_register($id=null)
	{
		$this->layout="admin";

		$this->loadModel('Registerrequest');

		$registerrequests=$this->Registerrequest->find('all');
		if(count($registerrequests)==0) {
			$this->Session->setFlash('登録リクエストはないです');
			return;
		} 
		$this->set('registerrequests',$registerrequests);


		if(($this->request->is('get'))&&($id)){
			$data1=$this->Registerrequest->findByregisterrequestid($id);
			$data['User']=$data1['Registerrequest'];
			if($data['User']['role']=='teacher') $data['Teacher']['bankaccountinfo']=$data['User']['bankaccountinfo'];
			if($data['User']['role']=='student') $data['Student']['creditcardinfo']=$data['User']['creditcardinfo'];

			$data['User']['initialpassword'] = $data['User']['password'];
			$data['User']['verifycode'] = $data['User']['initialverifycode'];
				// debug($data);die();
			$this->User->saveAll($data);
			$this->Registerrequest->delete($id);
			$this->redirect(array('controller'=>'users','action'=>'accept_register'));
		}

	}


	public function admin_view_user($id=null)
	{
		$this->layout="admin";
		if(!$id){
			throw new NotFoundException(__('Invalid user'));

		}
		$user = $this->User->read(null, $id);
		if(!$user){
			throw new NotFoundException(__('Invalid user'));
		}
		if($this->request->is('post')){
			$this->User->id = $this->request->data['User']['userid'];
			if($this->User->saveAll($this->request->data)){
				$this->Session->setFlash('プロフィール情報を格納しました');
			}
			$this->Session->setFlash('プロフィール情報を格納することができませんでした！');
		}
		if(!$this->request->data){
			$this->request->data = $user;
			$this->set('user',$user);
		}
		
		
	}


	public function user_view_student($id=null)
	{
		if(strcmp($this->Session->read('role'), 'teacher') == 0)$this->layout="teacher_home";
		if(strcmp($this->Session->read('role'), 'student') == 0)$this->layout="student_home";

		if(!$id){
			throw new NotFoundException(__('Invalid user'));

		}
		$user = $this->User->read(null, $id);
		if(!$user){
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->data = $user;
		$this->set('user',$user);
		$this->paginate = array(
			'conditions' => array('Studentlearnlecture.userid' => $this->Session->read('userid')),
			'limit' => 2,
			'recursive' => 3
			);
		$this->set('Lectures', $this->paginate('Studentlearnlecture'));
	}
	public function user_view_teacher($id=null)
	{
		if(strcmp($this->Session->read('role'), 'teacher') == 0)$this->layout="teacher_home";
		if(strcmp($this->Session->read('role'), 'student') == 0)$this->layout="student_home";

		if(!$id){
			throw new NotFoundException(__('Invalid user'));

		}
		$user = $this->User->read(null, $id);
		if(!$user){
			throw new NotFoundException(__('Invalid user'));
		}


		$this->request->data = $user;
		$this->set('user',$user);
		$this->paginate = array(
									//'conditions'=>array('userid'=>''),
			'conditions' => array('Lecture.userid' => $id),
			'limit' => 2,
			'order' => array('Lecture.lectureid' => 'desc'),
			);
		$Lectures = $this->paginate("Lecture");
		$this->set('Lectures', $Lectures);
	}

	public function admin_change_profile_teacher($value='5') 
	{


		$this->layout="admin";
		$userid = $value;
		$user=$this->User->findByuserid($userid);

			// chuyen qua man hinh view
		$this->loadModel("Teacher");
		$teacher = $this->Teacher->findByuserid($userid);	

		$this->set("user",$user);
		$this->set("teacher",$teacher);

			// cap nhat du lieu
		if($this->request->is('post')){

			$this->User->updateAll(
				array('User.name' => "'".$this->request->data['User']['name']."'"),
				array('User.userid' => $userid)
				);

			$this->User->updateAll(
				array('User.birthday' => "'".$this->request->data['User']['birthday']."'"),
				array('User.userid' => $userid)
				);

			$this->User->updateAll(
				array('User.phonenumber' => "'".$this->request->data['User']['phonenumber']."'"),
				array('User.userid' => $userid)
				);

			$this->User->updateAll(
				array('User.address' => "'".$this->request->data['User']['address']."'"),
				array('User.userid' => $userid)
				);

			$this->Teacher->updateAll(

				array('Teacher.bankaccountinfo' => "'".$this->request->data['Teacher']['bankaccountinfo']."'"),
				array('Teacher.userid' => $userid)
				);

				// chuyen qua man hinh view de cap nhat du lieu
			$userid = $value;
			$user=$this->User->findByuserid($userid);

			$this->loadModel("Teacher");
			$teacher = $this->Teacher->findByuserid($userid);	

			$this->set("user",$user);
			$this->set("teacher",$teacher);

				// thong bao

		}

	}
	public function admin_change_profile_student($value='5') 
	{
		$this->layout="admin";
		$userid = $value;
		$user=$this->User->findByuserid($userid);

		$this->loadModel("Student");
		$student = $this->Student->findByuserid($userid);	

		$this->set("user",$user);
		$this->set("student",$student);

		if($this->request->is('post')){

			$this->User->updateAll(
				array('User.name' => "'".$this->request->data['User']['name']."'"),
				array('User.userid' => $userid)
				);

			$this->User->updateAll(
				array('User.birthday' => "'".$this->request->data['User']['birthday']."'"),
				array('User.userid' => $userid)
				);

			$this->User->updateAll(
				array('User.phonenumber' => "'".$this->request->data['User']['phonenumber']."'"),
				array('User.userid' => $userid)
				);

			$this->User->updateAll(
				array('User.address' => "'".$this->request->data['User']['address']."'"),
				array('User.userid' => $userid)
				);

			$this->Student->updateAll(

				array('Student.creditcardinfo' => "'".$this->request->data['Student']['creditcardinfo']."'"),
				array('Student.userid' => $userid)
				);


			$userid = $value;
			$user=$this->User->findByuserid($userid);

			$this->loadModel("Student");
			$student = $this->Student->findByuserid($userid);	

			$this->set("user",$user);
			$this->set("student",$student);

				// thong bao

		}

	}
	public function deny_register($id='')
	{
		$this->loadModel('Registerrequest');
		$this->Registerrequest->delete($id);
		$this->redirect(array('controller'=>'users','action'=>'accept_register'));
	}

	public function add_ip()
	{
		$this->loadModel("Adminip");


		if($this->request->is('post')){
			$this->request->data['Adminip']['userid']=$this->Session->read('userid');
			$data=$this->request->data;
				// debug($this->request->data);
				//debug($data);
			if($this->Adminip->find('count',array('conditions'=>array('userid'=>$data['Adminip']['userid'],'ipid'=>$data['Adminip']['ipid']))))
				$this->Session->setFlash("IP: ".$data['Adminip']['ipid']." は存在しています");
			else
				$this->Adminip->save($data);
		}
		$ips=$this->Adminip->findAllByuserid($this->Session->read('userid'));
			//var_dump($ips);
		$this->set("ips",$ips);
	}
	public function check_verifycode(){
			// $this->loadModel('Teacher');
			// $teacher=$this->Teacher->findByUserid($this->Session->read('userid'));
			// // pr($this->Session->read('userid'));die();
			// if(($teacher['Teacher']['previousip'])==null){ 
			// 	// echo"123";die();
			// 	$this->Teacher->updateAll(
			// 		array('Teacher.previousip' => "'".$_SERVER['REMOTE_ADDR']."'"),
			// 		array('Teacher.userid' => $this->Session->read('userid'))
			// 		);
			// }
		if($this->request->is('post')){
			$user=$this->User->findByuserid($this->Session->read('userid'));
			$data=$this->request->data;
			if(($user['User']['secretquestion']==(AuthComponent::password($data['User']['secretquestion'])))&&($user['User']['verifycode']==(AuthComponent::password($data['User']['answer']))))
			{
				$this->Session->write('ipchecked',1); 
				$this->Teacher->updateAll(
					array('Teacher.previousip' =>"'".$_SERVER['REMOTE_ADDR']."'"),
					array('Teacher.userid' => $this->Session->read('userid')));
				return $this->redirect(array('controller' => 'teachers', 'action' => 'home'));
			}else{
				$this->Session->setFlash('質問と答えは不正で、再入力してください');
			}
		}
	}
	public function report(){
		if($this->request->is('post')){
			// debug($this->data);die();
			$reported = $this->Report->findByUseridAndLectureid($this->Session->read('userid'),$this->data['User']['lectureid']);
			if(!$reported){
				$data = array('Report'=>array(
					'lectureid' => $this->data['User']['lectureid'],
					'userid' => $this->Session->read('userid'),
					'reason' => $this->data['User']['reason']
					));
				$this->Report->create();
				if($this->Report->save($data)){
					return $this->redirect($this->referer());
				}
			}
			$this->Session->setFlash("違反報告はしました");
			return $this->redirect($this->referer());
		}
		return $this->redirect($this->referer());
	}
	public function new_admin()
	{
		$this->layout="admin";
		if($this->request->is("post")){
			$data = $this->data;
			if($data['User']['admin_name'])
				$data['User']['name'] = $data['User']['admin_name'];
			else $data['User']['name'] = $data['User']['username'];

			if($data['User']['admin_phonenumber'])
				$data['User']['phonenumber'] = $data['User']['admin_phonenumber'];
			else $data['User']['phonenumber'] = '12345678';

			if($data['User']['admin_address'])
				$data['User']['address'] = $data['User']['admin_address'];
			else $data['User']['address'] = '12345678';

			if($data['User']['admin_bankaccountinfo'])
				$data['Admin']['bankaccountinfo'] = $data['User']['admin_bankaccountinfo'];
			else $data['Admin']['bankaccountinfo'] = '12345678';

			if($data['User']['admin_birthday'] != array('month' =>'', 'day' =>'', 'year' =>''))
				$data['User']['birthday'] = $data['User']['admin_birthday'];
			else $data['User']['birthday'] = '1991-09-01';
			
			if($data['User']['admin_ip'])
				$data['Adminip']['ipid'] = $data['User']['admin_ip'];
			else $data['Adminip']['ipid'] = '';

			if($data['User']['admin_initialverifycode']){
				$data['User']['initialverifycode'] = $data['User']['admin_initialverifycode'];
				$data['User']['verifycode'] = $data['User']['admin_initialverifycode'];
			}else {
				$data['User']['initialverifycode'] = '12345678';
				$data['User']['verifycode'] = '12345678';
			}

			if($data['User']['admin_secretquestion'])
				$data['User']['secretquestion'] = $data['User']['admin_secretquestion'];
			else $data['User']['secretquestion'] = '12345678';

			$data['Admin']['status'] = 'off';
			$data['User']['initialpassword'] = $data['User']['password'];

			if(strcmp($data['User']['password'],$data['User']['password2'])!=0){
				$this->Session->setFlash('パスワードとパスワード確認は違う');
				return;
			}
			if($this->User->findByUsername($data['User']['username'])){
				$this->Session->setFlash('存在しているユーザ名である');
				return;
			}
			if($this->User->saveAll($data)){
				$this->redirect(array('controller'=>'admins','action'=>'home'));
			}else {
				$this->Session->setFlash("データベースに格納できない");
			}
		}
	}
}

?>