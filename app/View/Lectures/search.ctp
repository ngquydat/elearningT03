<div>

  <?pHp 
  if($this->Session->read('role') == "admin"){ 
    echo $this->element("list_admin_manage_lecture");
  }
  ?>

</div>
<?php if($this->Session->read('role') == "admin"){?>
<div class="content_2">

  <?php echo $this->Form->create('Lecture', array('type'=>'get','class' => 'navbar-form navbar-left', 'action' => 'search')); ?>
  <div class="form-group">
    <?php
    echo $this->Form->input("search",array("class"=>"form-control", "id"=>"search-box","type"=>"text","placeholder"=>"検索する。。。","label"=>""));?>
  </div>
  <?php
  echo $this->Form->button($this->Html->image("kinh.png"),array('type' => 'submit','name'=>'search_title','class' => "btn btn-default","id"=>"search-submit"));?>
  <?php echo $this->Form->end(); ?>
  <?php
  echo $this->Html->link($this->Form->button('タグ',array('type' => 'button','name'=>'search_tag','class' => "btn btn-default","id"=>"tag-submit"),array("escape"=>false)),array('controller'=>'tags','action'=>'search_tag'),array("escape"=>false));
  ?>

  <?php } ?>
  <div style="position:absolute; top:50px;">
    <?php echo $this->element("sort"); ?>

    <?php 
    if(isset($Lectures)){
      foreach ($Lectures as $key => $Lecture) {
        echo $this->element("lecture_admin", array('Lecture' => $Lecture));
      }
    }

    ?>
    <?php echo $this->element("paging"); ?>
    
  </div>
  <?php if($this->Session->read('role') == "admin"){?>
</div>
<?php }?>