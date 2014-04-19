<?php
	class Comment extends AppModel{
		var $name='Comment';
		public $primaryKey='commentid';
		var $belongsTo=array(
			'User'=>array(
				'className'=>'User',
				'foreignKey'=>'userid',
				'dependent'=>true),
			)
			;
	}
?>