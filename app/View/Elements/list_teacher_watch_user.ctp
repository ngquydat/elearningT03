<div class="avatar_change_profile">
    
   <?php
    echo $this->Html->div(array("class"=>"name_user_change_profile"), "ユーザ名");
    echo $this->Html->link(
    $this->Html->image("teacher_big.jpg"),
    array('controller' => 'students','action' => 'view'),
    array('escape' => false ));
?>


</div>

<div class="list_admin_change_profile_user">
<ul class="nav nav-pills nav-stacked">
	<li>
	</li>
	<li><?pHp echo $this->Html->link("ブロック",
  		array('controller' => 'students','action' => 'view'),
      array(),
      "この学生をブロックしたいですか。");
     
      ?>
  </li>
  	</ul>
</div>
