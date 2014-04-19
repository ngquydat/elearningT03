<div class="list-user">
	<?pHp
	echo $this->Html->div(array("class"=>"list-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"list-user-name"),$this->Html->link("hoang123",array('controller' => "users", "action"=>"view_other_by_student"),	array("escape"=>false))));
	?>

	<?pHp
	echo $this->Html->div(array("class"=>"list-user-button1"),$this->Html->link($this->Form->button('削除',array('class' => "btn btn-success btn-sm")),
 	array('controller' => "students", "action"=>"view"),
 	array("escape"=>false)));
		//)
	
	?>

	<?pHp
	echo $this->Html->div(array("class"=>"list-user-button1"),$this->Html->link($this->Form->button('キャンセル',array('class' => "btn btn-danger btn-sm")),
 	array('controller' => "students", "action"=>"view"),
 	array("escape"=>false)));
		//)
	
	?>


</div>
