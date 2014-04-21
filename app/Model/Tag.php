<?php
class Tag extends AppModel{
	public $primaryKey='tagid';
	var $belongsTo=array(
		"Lecture"=>array(
			'className'=>'Lecture',
			'foreignKey'=>'lectureid',
			'dependent'=>true
			)
		);
}
?>