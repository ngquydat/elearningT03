<?php
class Test extends AppModel {
	public $primaryKey='testid';	
	var $hasMany=array(
			'Studentdotest'=>array(
				'className'=>'Studentdotest',
				'foreignKey'=>'testid',
				'dependent'=>true)
			);
	var $belongsTo=array(
			'Lecture'=>array(
				'className'=>'Lecture',
				'foreignKey'=>'lectureid',
				'dependent'=>false)
			);

}