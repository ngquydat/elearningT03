<?php
class Studentdotest extends AppModel{
	public $primaryKey='testid';
	var $belongsTo=array(
			'User'=>array(
				'className'=>'User',
				'foreignKey'=>'userid',
				'dependent'=>false),
			'Test'=>array(
				'className'=>'Test',
				'foreignKey'=>'testid',
				'dependent'=>false)
			);
	
}