<?php
class System extends AppModel{
	var $name='System';
	var $primaryKey = 'systemid';

	/***************validate****************/

	public $validate = array(
		'numberwrongpassword' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'required' => true,
				'message' => 'パスワードを間違う回数は数字のみです'
				)
			
			),
		'numberviolation' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'required' => true,
				'message' => '違反のできる回数は数字のみです'
				)
			
			),
		'timeblocksession' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'required' => true,
				'message' => 'セッションを削除の待つ時間は数字のみです'
				)
			
			),
		'lecturecost' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'required' => true,
				'message' => '授業のコストは数字のみです'
				)
			
			),
		'lecturetime' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'required' => true,
				'message' => '授業の時間は数字のみです'
				)
			
			),
		'ratiomoney' => array(
			'alphaNumeric' => array(
				'rule' => 'decimal',
				'required' => true,
				'message' => '先生と管理者の割合の課金は数字のみです'
				)
			
			),
		'filebillpath' => array(
			/*'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'パスワードを間違う回数は数字のみです'
				)*/
			//'required' => true
		),
		);


/***************************************/
}
?>