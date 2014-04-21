<?php
class BillComponent extends Object{
	var $components = array('Session');
	function initialize(&$controller, $settings = array()) {
        // saving the controller reference for later use
		$this->controller =& $controller;
	}

    //called after Controller::beforeFilter()
	function startup(&$controller) {
	}

    //called after Controller::beforeRender()
	function beforeRender(&$controller) {
	}

    //called after Controller::render()
	function shutdown(&$controller) {
	}

    //called before Controller::redirect()
	function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
	}

	function redirectSomewhere($value) {
        // utilizing a controller method
	}  

	public function writefile($string,$user,$indentify,$year,$month){
		//$bill=array();
		//Tao bien $bill voi cac thong so nhu phia duoi
		//$string='C:\\xampp\\htdocs\\elearning\\app\\webroot\\bill\\hoang.tsv';
		// pr($user);
		//  die();
		//pr(date('Y-m-d h:i:s'));
		$i=0;
		foreach ($user as $key => $user) {
			$i++;
		}
		
		
		$admin_id;
		if($indentify == 'teacher')
		{
			
			if($user ['Studentlearnlecture'])
			{
				$user_name=$user  ['Lecture']['User']['username'];
				$user_id=$user ['Lecture']['User']['userid'];
				$user_address=$user ['Lecture']['User']['address'];
				$user_phonenumber= $user ['Lecture']['User']['phonenumber'];
				$user_status=$user ['Lecture']['User']['role'];
				$user_card=$user['Lecture']['User']['Teacher']['bankaccountinfo'];
				$user_money=$i*20000*0.4;
			}
			else
			{
				$user_name=$user ['User']['username'];
				$user_id=$user ['User']['userid'];
				$user_address=$user ['User']['address'];
				$user_phonenumber= $user ['User']['phonenumber'];
				$user_status=$user ['User']['role'];
				$user_card=$user['Teacher']['bankaccountinfo'];
				$user_money=0;
			}
		}
		if($indentify == 'student')
		{
			$user_name=$user ['User']['username'];
			$user_id=$user ['User']['userid'];
			$user_address=$user ['User']['address'];
			$user_phonenumber= $user ['User']['phonenumber'];
			$user_status=$user ['User']['role'];
			if($user['Lecture'])
			{
				$user_card=$user ['User']['Student']['creditcardinfo'];
				$user_money=$i*20000;
			}
			else
			{
				$user_card=$user ['Student']['creditcardinfo'];
				$user_money=0;
			}
		}
		$fp = fopen($string, 'w');
		if (!$fp) {
			echo 'Could not open file';
			return 0;
		}
		else
		{
			fprintf($fp,"請求対象者の氏名:   %s    ID: %d \n",$user_name,$user_id);
			fprintf($fp,"請求金額:   %0.2f đ \n",$user_money);
			fprintf($fp,"請求対象者の連絡先住所:   %s  \n",$user_address);
			fprintf($fp,"請求対象者の連絡先電話番号:  %d \n",$user_phonenumber);
			fprintf($fp,"請求区分:     %s     \n", $user_status);     
			fprintf($fp,"クレジットカード番号: %-30s  \n",$user_card);
			fprintf($fp,"==========================================\n");
			fprintf($fp,"本請求データの月:      %-30d\n",$month);
			fprintf($fp,"本請求データの年:      %-30d\n",$year);
			fprintf($fp,"本請求データの作成時間:	%s  \n",date('Y-m-d h:i:s'));
			//fprintf($fp,"本請求データの作成日  :   %d 月 %d 日 %d 年  \n",$month_create,$day_create,$year_create);
			//fprintf($fp,"本請求データの作成者氏名:   %s     ID: %d  \n",$admin_name,$admin_id);*/
			fprintf($fp,"	ＥＮＤ＿＿＿ＥＮＤ＿＿＿ＥＮＤ    \n");
		}


	}
	public function writefile_system($string,$user,$year,$month,$i,$j){
		//pr($user);
		//pr($i);
		//pr($user); die();		
		
		$k=0;

		$fp = fopen($string, 'a');
		if (!$fp) {
			echo 'Could not open file';
			return 0;
		}
		else
		{
			if($user['User']['role']=='student')
				{
					$user_id=$user ['User']['username'];
					$user_name=$user ['User']['name'];
					$user_address=$user ['User']['address'];
					$user_phonenumber= $user ['User']['phonenumber'];
					$user_status=$user ['User']['role'];
					$user_card=$user ['Student']['creditcardinfo'];
					if(strlen($user_card)<18)
					{
						while(strlen($user_card)<18)
						{
							$user_card='0'.$user_card;
						}				
						
					}
					$user_money=$i*2000*$j;
					fprintf($fp,"%s\t%s\t%s\t%s\t%s\t54\t%18s\n",$user_id,$user_name,$user_money,$user_address,$user_phonenumber,$user_card);
									
				}
				if($user['User']['role']=='teacher')
				{
					$user_id=$user ['User']['username'];
					$user_name=$user ['User']['name'];
					$user_address=$user ['User']['address'];
					$user_phonenumber= $user ['User']['phonenumber'];
					$user_status=$user ['User']['role'];
					$user_card=$user ['Teacher']['bankaccountinfo'];
					if(strlen($user_card)<28)
					{
						while(strlen($user_card)<28)
						{
							$user_card='0'.$user_card;
						}				
						
					}
					$user_money=$i*200*$j;
					fprintf($fp,"%s\t%s\t%s\t%s\t%s\t18\t%s\n",$user_id,$user_name,$user_money,$user_address,$user_phonenumber,$user_card);
									

				}

				
			}

		
	}
	
	
}