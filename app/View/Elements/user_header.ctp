
<div class="list-user-header">
	<?pHp
	
	echo $this->Html->div(array("class"=>"list-user-user"));
	echo $this->Html->image("teacher.jpg");
	echo $this->Html->div(array("class"=>"list-user-name"),$this->Html->link($this->Session->read('username'),array('controller' => "users", "action"=>"change_profile",$this->Session->read('userid')),	array("escape"=>false)));
	?>
</div>
<div class="list-user-header-img">
	<?php
	echo $this->Html->link($this->Html->image("logout.png"),
		array('controller' => "users", "action"=>"logout"),	array("escape"=>false));?>
</div>
	<?php
	echo $this->Html->image("background_logout.png");?>
</div>