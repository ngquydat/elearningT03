<?php
class Lecture extends AppModel{
	public $primaryKey='lectureid';
	var $hasMany=array(
		'Test'=>array(
			'className'=>'Test',
			'foreignKey'=>'lectureid',
			'dependent'=>true
			),
		'File'=>array(
			'className'=>'File',
			'foreignKey'=>'lectureid',
			'dependent'=>true
			),
		'Comment'=>array(
			'className'=>'Comment',
			'foreignKey'=>'lectureid',
			'dependent'=>true
			),
		'Like'=>array(
			'className'=>'Like',
			'foreignKey'=>'lectureid',
			'dependent'=>true
			),
		'Report' => array(
			'className' => 'Report',
			'foreignKey' => 'lectureid',
			'dependent' => true
			),
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'lectureid',
			'dependent' => true
			),
		'Block' => array(
			'className' => 'Block',
			'foreignKey' => 'lectureid',
			'dependent' => true
			),
		'Studentlearnlecture'=>array(
			'className'=>'Studentlearnlecture',
			'foreignKey'=>'lectureid',
			'dependent'=>true)
		);
	var $belongsTo=array(
		'User'=>array(
			'className'=>'User',
			'foreignKey'=>'userid',
			'dependent'=>false)

		);	

	/*********************validate********************************/
	var $validate = array(
		'title' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'
			),
		'description' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'
			),
		'tagname' => array(
			'rule' => array('minLength', '1'),
			'message' => 'ここに記入してください'
			)/*,
		'files' => array(
			'rule' => 'rule1',
			'required' => true,
			'message' => 'パスワードは8文字以上です'
			
			)*/

	);



	/***************************************************************/

}
?>