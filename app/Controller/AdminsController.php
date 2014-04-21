<?php
class AdminsController extends AppController{
	var $uses = array('User', 'Admin','Adminip','Report','Lecture','System');
	var $components = array('Session','Bill','Attempt');
	public function beforeFilter(){
		parent::beforeFilter();
		$this->layout="admin";
	}
	public function home(){
		$users= $this->User->find('all');
		// pr($users);die();
		$this->set('users',$users);
	}

	
	public function backup($value='')
	{
			# code...
	}
	public function view($value='')
	{
			# code...
	}
	public function search(){
		if($this->request->is('get')){
			$keywords = explode("-",$this->request->query('key'));
			$keywords1 = explode("+", $this->request->query('key'));
			$conditionsOR = array();
			$conditionsAND = array();
			foreach ($keywords as $key => $keyword) {
				$conditionsOR[$key] = array('User.username LIKE' => '%'.$keyword.'%');
			}
			foreach ($keywords1 as $key => $keyword) {
				$conditionsAND[$key] = array('User.username LIKE' => '%'.$keyword.'%');
			}
			if(count($conditionsOR)>1){
				$this->paginate = array('conditions' => array('OR' => $conditionsOR),'limit' => 2,'recursive' => 3,'order' => array('User.userid' => 'desc'));
			}
			if(count($conditionsAND)>=1){
				$this->paginate = array('conditions' => array('AND' => $conditionsAND),'limit' => 2,'recursive' => 3,'order' => array('User.userid' => 'desc'));
			}
			if(count($conditionsAND)==1 && count($conditionsOR)==1){
				$this->paginate = array('conditions' => array('AND' => $conditionsAND),'limit' => 2,'recursive' => 3,'order' => array('User.userid' => 'desc'));
			}
			$this->set('Users', $this->paginate('User'));
		}

	}
	public function new_admin()
	{
		$this->layout="admin";
		if($this->request->is("post")){
				// debug($this->data);die();
			$data['User'] = $this->data['Admin'];
			// $data['User']['initialpassword'] = $data['User']['password'];
			// $data['User']['verifycode'] = $data['User']['initialverifycode'];
			$username=$data['User']['username'];
			if(strcmp($data['User']['password'],$data['User']['password2'])!=0){
				$this->Session->setFlash('パスワードとパスワード確認は違う','default',array('class' => 'error1'));
				return;
			}
			if($this->User->findByUsername($username)){
				$this->Session->setFlash('存在しているユーザ名である','default',array('class' => 'error1'));
				return;
			}
			$data['Admin']['status'] = 'off';
			$data['Adminip']['ipid'] = $data['User']['ip'];
			// debug($data);die();
			if($this->User->saveAll($data)){
				$this->redirect(array('controller'=>'admins','action'=>'home'));
			}else {
				$this->Session->setFlash("データベースに格納できない",'default',array('class' => 'error1'));
			}
		}
	}

	public function admin_view_report()
	{
		$this->layout="admin";
		$AllLectures = $this->Lecture->find('all');
		$Lectures = array();
		foreach ($AllLectures as $key => $Lecture) {
			if($Lecture['Report'] != null){
				$i = count($Lectures);
				$Lectures[$i] = $Lecture;
			}
		}
		$this->set('Lectures', $Lectures);
	}

	public function lecture_manage()
	{
		$this->layout="admin";
		$this->paginate = array(
			'conditions' => array(),
			'limit' => 2,
			'order' => array(
				'Lecture.lectureid' => 'desc'
				)

			);
		$this->set('Lectures', $this->paginate('Lecture'));

	}
	/**
 * Dumps the MySQL database that this controller's model is attached to.
 * This action will serve the sql file as a download so that the user can save the backup to their local computer.
 *
 * @param string $tables Comma separated list of tables you want to download, or '*' if you want to download them all.
 */
	function admin_database_mysql_dump($tables = '*') {

		$return = '';

		$modelName = $this->modelClass;

		$dataSource = $this->{$modelName}->getDataSource();
		$databaseName = $dataSource->getSchemaName();


    // Do a short header
		$return .= '-- Database: `' . $databaseName . '`' . "\n";
		$return .= '-- Generation time: ' . date('D jS M Y H:i:s') . "\n\n\n";


		if ($tables == '*') {
			$tables = array();
			$result = $this->{$modelName}->query('SHOW TABLES');
			foreach($result as $resultKey => $resultValue){
				$tables[] = current($resultValue['TABLE_NAMES']);
			}
		} else {
			$tables = is_array($tables) ? $tables : explode(',', $tables);
		}

    // Run through all the tables
		foreach ($tables as $table) {
			$tableData = $this->{$modelName}->query('SELECT * FROM ' . $table);

			$return .= 'DROP TABLE IF EXISTS ' . $table . ';';
			$createTableResult = $this->{$modelName}->query('SHOW CREATE TABLE ' . $table);
			$createTableEntry = current(current($createTableResult));
			$return .= "\n\n" . $createTableEntry['Create Table'] . ";\n\n";

        // Output the table data
			foreach($tableData as $tableDataIndex => $tableDataDetails) {

				$return .= 'INSERT INTO ' . $table . ' VALUES(';

					foreach($tableDataDetails[$table] as $dataKey => $dataValue) {

						if(is_null($dataValue)){
							$escapedDataValue = 'NULL';
						}
						else {
                    // Convert the encoding
							$escapedDataValue = mb_convert_encoding( $dataValue, "UTF-8", "ISO-8859-1" );

                    // Escape any apostrophes using the datasource of the model.
							$escapedDataValue = $this->{$modelName}->getDataSource()->value($escapedDataValue);
						}

						$tableDataDetails[$table][$dataKey] = $escapedDataValue;
					}
					$return .= implode(',', $tableDataDetails[$table]);

					$return .= ");\n";
}

$return .= "\n\n\n";
}

    // Set the default file name
$fileName = $databaseName . '-backup-' . date('Y-m-d_H-i-s') . '.sql';

    // Serve the file as a download
$this->autoRender = false;
$this->response->type('Content-Type: text/x-sql');
$this->response->download($fileName);
$this->response->body($return);
}

public function salary(){
	$this->loadModel("Studentlearnlecture");
	$this->loadModel("Student");
	$this->loadModel("Lecture");
	$this->loadModel("User");
	$this->loadModel("System");
		//pr($this->data);
		//pr($this->data);


	$user=$this->User->find('first', array('recursive'=>3,'conditions' => array('User.userid'=>$this->Session->read("userid"))));
	if($this->data){		
		$year=$this->data['Admin']['month_year']['year'];
		$month=$this->data['Admin']['month_year']['month'];
			//pr($this->data);
		$day='01';
		$start=date($year.'-'.$month.'-'.$day);
		$end=date($year.'-'.$month.'-'.($day+30));

			//$user=$this->Lecture->find('all', array('conditions' => array('Lecture.create_time BETWEEN NOW() - INTERVAL 1 MONTH AND NOW()')));
				//$user= $this->User->find('all', array('recursive'=>2));
				//$user= $this->User->find('all', array('recursive'=>2, 

		$fp = fopen(ROOT.'\\app\\webroot\\bill\\'.'ELS-UBT-'.$year.'-'.$month.'.tsv', 'w');
		if (!$fp) {
			echo 'Could not open file';
			return 0;
		}
		else
		{
			$k=0;
			$year_now=null;
			$month_now=null;
			$date_now=null;
			$hour_now=null;
			$minute_now=null;
			$second_now=null;
			$date=date('Y-m-d h:i:s');
			for($k=0;$k<4;$k++)
			{
				$year_now=$year_now.$date[$k];		
			}
			for($k=5;$k<7;$k++)
			{
				$month_now=$month_now.$date[$k];		
			}
			for($k=8;$k<10;$k++)
			{
				$date_now=$date_now.$date[$k];		
			}
			for($k=11;$k<13;$k++)
			{
				$hour_now=$hour_now.$date[$k];		
			}
			for($k=14;$k<16;$k++)
			{
				$minute_now=$minute_now.$date[$k];		
			}
			for($k=17;$k<19;$k++)
			{
				$second_now=$second_now.$date[$k];		
			}
			$hour_now+=5;

			fprintf($fp,"ELS-UBT-GWK54M78\t%4d\t%2d\t%4d\t%2d\t%2d\t%2d\t%2d\t%2d\t%2s\t%2s\n",$year,$month,$year_now,$month_now,$date_now,$hour_now,$minute_now,$second_now,$user['User']['username'],$user['User']['name']);

			$m=0;
			$n=0;
			$user=$this->User->find('all', array('recursive'=>2));
			foreach ($user as $key => $user) {
				$i=0;

				if($user['User']['role']=='student')
				{
					$j=10;
					foreach ($user['Studentlearnlecture'] as $key => $Studentlearnlecture) {
						if($Studentlearnlecture['time']>$start && $Studentlearnlecture['time']<$end)
						{
							$i++;
							$m++;
							//echo $user['User']['role'].'ngon';
						}
						else
						{
							//echo $user['User']['role'].'xit';
						}
					}


				}
				if($user['User']['role']=='teacher')
				{
					$j=$this->System->findBysystemid('1')['System']['ratiomoney'];
					foreach ($user['Lecture'] as $key => $Lecture) {
						foreach ($Lecture['Studentlearnlecture'] as $key => $Studentlearnlecture) {
							if($Studentlearnlecture['time']>$start && $Studentlearnlecture['time']<$end)
							{
								$i++;
								$n++;
								//echo $user['User']['role'].'ngon';
							}
							else
							{
								//echo $user['User']['role'].'xit';
							}
						}
					}
				}
				if($user['User']['role']=='admin')
					continue;
				$this->Bill->writefile_system(ROOT.'\\app\\webroot\\bill\\'.'ELS-UBT-'.$year.'-'.$month.'.tsv',$user,$year,$month,$i,$j);
					//pr($user);
			}




				// $user= $this->User->find('all', array('recursive'=>2 ,

				//  	'finderQuery' => 'SELECT Studentlearnlecture.* FROM studentlearnlectures as Studentlearnlecture WHERE Studentlearnlecture.userid={$__cakeID__$} AND Studentlearnlecture.lectureid= 1'
				// 	));
				//$user=$this->Studentlearnlecture->find('all', array('recursive'=>3,'conditions' => array('Studentlearnlecture.time BETWEEN '.$start.' AND '.$start.' + INTERVAL 1 MONTH')));
				//$this->set('user',$user);
		}
			//fprintf($fp,"\nＥＮＤ＿＿＿ＥＮＤ＿＿＿ＥＮＤ \n");
		fclose($fp);
		$fp = fopen(ROOT.'\\app\\webroot\\bill\\'.'ELS-UBT-'.$year.'-'.$month.'.tsv', 'a');
		if (!$fp) {
			echo 'Could not open file';
			return 0;
		}
		else
		{
			fprintf($fp,"END___END___END \t%d\t%d\n",$year,$month);
		}
	}



}

}
?>