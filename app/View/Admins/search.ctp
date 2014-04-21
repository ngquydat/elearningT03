
<div>
  <?pHp  echo $this->element("list_admin_manage_user"); ?>
  
</div>

<div class="content_2"> 
  <div id="search-admin">
    <?php echo $this->Form->create('Admin', array('class' => 'navbar-form navbar-left', 'action' => 'search')); ?>
    <div class="form-group">
      <?php
      echo $this->Form->input("key",array("class"=>"form-control", "id"=>"search-box","type"=>"text","placeholder"=>"検索する。。。","label"=>""));
      ?>


    </div>
    <?php
    echo $this->Form->button($this->Html->image("kinh.png"),array('type' => 'submit','class' => "btn btn-default","id"=>"search-submit"));

    echo $this->Form->end(); ?>
  </div>
  <div class="list-user-sort">並べる順番: 
    <?php
    if(isset($this->Paginator)){
      echo $this->Paginator->sort('username','ユーザ名')." | ".$this->Paginator->sort('birthday','生年月日');
    }
    ?>
  </div>
  <?php 
  if(isset($Users)){
    foreach ($Users as $key => $user) {?>
    <div class="list-user">
      <?pHp
      echo $this->Html->div(array("class"=>"list-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"list-user-name"),$this->Html->link($user["User"]['username'],array('controller' => "users", "action"=>"admin_view_user", $user["User"]["userid"]),  array("escape"=>false))));
      ?>

    </div>
    <?php
  }
}

?>
<?php echo $this->element("paging"); ?>


</div>
