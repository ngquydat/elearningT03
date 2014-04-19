<div>
	<?pHp  echo $this->element("list_admin_manage_system");
	?>

</div>
<div class="content_2">
	<?php 
	echo $this->Html->link($this->Form->button("バックアップ", array('class'=>'btn btn-success btn')), array('controller' => 'admins', 'action' => 'admin_database_mysql_dump'),array("escape"=>false));
	?>
</div>