<?php
class Studentlearnlecture extends AppModel{
	public $primaryKey = 'studentlearnlectureid';
	var $belongsTo=array(
		"User"=>array(
			'className'=>'User',
			'foreignKey'=>'userid',
			'dependent'=>true
			),
		"Lecture"=>array(
			'className'=>'Lecture',
			'foreignKey'=>'lectureid',
			'dependent'=>true
			)
		);
}
?>