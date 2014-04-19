<div class="avatar_change_profile">

	<?php
	if(isset($user)){
		echo $this->Html->div(array("class"=>"name_user_change_profile"), $user['User']['username']);
	}else{
		echo $this->Html->div(array("class"=>"name_user_change_profile"), "ユーザ名");
	}

	echo $this->Html->link($this->Html->image("teacher_big.jpg"),array('controller' => 'students','action' => 'view'),array('escape' => false ));
	?>


</div>