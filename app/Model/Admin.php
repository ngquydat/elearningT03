<?php
class Admin extends AppModel{
	var $name = "Admin";
	public $primaryKey="userid";
	/********************************validation********************************************************/
	var $validate = array(
		'bankaccoutinfoadmin' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				//'required' => true,
				'message' => 'ユーザ名はアルファベットと数字のみです'
				),
			'between' => array(
				'rule' => array('between', 3, 15),
				'message' => 'ユーザ名は5から15文字の間です'
				)
			)
		);

/******************************************************************************************/
}
?>