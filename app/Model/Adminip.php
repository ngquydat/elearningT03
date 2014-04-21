<?php
class Adminip extends AppModel{
	var $name = "Adminip";
	public $primaryKey="userid";
	// var $validate = array(
	// 	'ipid' => array(
	// 		'alphaNumeric' => array(
	// 			'rule' => 'alphaNumeric',
	// 			'message' => 'ユーザ名はアルファベットと数字のみです'
	// 			),
	// 		'between' => array(
	// 			'rule' => array('between', 5, 15),
	// 			'message' => 'ユーザ名は5から15文字の間です'
	// 			)
	// 		)
	// 	);
}
?>