<div class="lecture-inside-user">
	<?pHp
	echo $this->Html->div(array("class"=>"lecture-inside-user-user"));
	echo $this->Html->image("teacher.jpg");
	if(isset($Comment)){
		if(!strcmp($Comment['User']['username'],"admin")){
			if(!strcmp($this->Session->read('role'),"admin")){
				echo $this->Html->div(array("class"=>"lecture-inside-user-name"),$this->Html->link($Comment['User']['username'],array('controller' => "users", "action"=> ($Comment['User']['role'] == 'student')? "user_view_student":"user_view_teacher", $Comment['User']['userid']),	array("escape"=>false)));
			}else{
				echo $this->Html->div(array("class"=>"lecture-inside-user-name"),$Comment['User']['username']);
			}
		}
		else{
			echo $this->Html->div(array("class"=>"lecture-inside-user-name"),$this->Html->link($Comment['User']['username'],array('controller' => "users", "action"=> ($Comment['User']['role'] == 'student')? "user_view_student":"user_view_teacher", $Comment['User']['userid']),	array("escape"=>false)));
		}

		echo $this->Html->div(array("class"=>"lecture-inside-user-commet"),$Comment['Comment']['content']);
	}
	?>
</div>
</div>