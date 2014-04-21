<div>
	<?pHp  echo $this->element("list_admin_manage_user");
	?>

</div>
<div class="content_2"> 

  <div id="search-admin">
    <?php echo $this->Form->create('Admin', array('type'=>'get','class' => 'navbar-form navbar-left', 'action' => 'search')); ?>
    <div class="form-group">
      <?php
      echo $this->Form->input("search",array("class"=>"form-control", "id"=>"search-box","type"=>"text","placeholder"=>"検索する。。。","label"=>""));
      ?>


    </div>
    <?php
    echo $this->Form->button($this->Html->image("kinh.png"),array('type' => 'submit','class' => "btn btn-default","id"=>"search-submit"));

    echo $this->Form->end(); ?>
  </div>
  <div>
    <?php //debug($users);?>
    <?php foreach ($users as $user):?>
    <div class="list-user">
      <?pHp
      echo $this->Html->div(array("class"=>"list-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"list-user-name"),$this->Html->link($user["User"]['username'],array('controller' => "users", "action"=>"admin_view_user", $user["User"]["userid"]),  array("escape"=>false))));
      echo $this->Html->div(array("class"=>"list-user-button1"),$this->Html->link($this->Form->button('削除',array('class' => "btn btn-success btn-sm")),
        array('controller' => "users", "action"=>"deleteUser", $user["User"]["userid"]),
        array("escape"=>false,'confirm'=>'よろしいですか?')));
        ?>
      </div>

    <?php endforeach;?>
  </div>

</div>   			