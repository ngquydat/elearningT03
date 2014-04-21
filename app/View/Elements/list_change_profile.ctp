<div class="avatar_change_profile">

 <?php
 echo $this->Html->div(array("class"=>"name_user_change_profile"), $this->Session->read('username'));
 echo 
 $this->Html->image("teacher_big.jpg");
 ?>


</div>

<div class="list_change_profile">
  <ul class="nav nav-pills nav-stacked">
   <li>
   </li>
   <li <?php echo ($this->params->params['action'] == 'change_profile') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("自己情報を替える",
    array('controller' => 'users','action' => 'change_profile', $this->Session->read('userid'))); ?>
  </li>
  <li <?php echo ($this->params->params['action'] == 'change_password') ?'class="active"' : '' ?>>
    <?php echo $this->Html->link("パスワードを替える",
    array('controller' => 'users','action' => 'change_password', $this->Session->read('userid')));?>
  </li>
  <li <?php echo ($this->params->params['action'] == 'change_verify_code') ?'class="active"' : '' ?>>
    <?php echo $this->Html->link("Verifycodeを替える",
    array('controller' => 'users','action' => 'change_verify_code', $this->Session->read('userid')));?>
  </li>
   <?php  
  if($this->Session->read('role')!="admin"){?>
  <li <?php echo ($this->params->params['action'] == 'watch_bill_user') ?'class="active"' : '' ?>>
    <?php echo $this->Html->link("課金情報作成",
    array('controller' => 'users','action' => 'watch_bill_user', $this->Session->read('userid')));?>
  </li>
  <?php } ?>
  <li <?php echo ($this->params->params['action'] == 'change_secession') ?'class="active"' : '' ?>>
    <?php echo $this->Html->link("脱退",
    array('controller' => 'users','action' => 'change_secession', $this->Session->read('userid')));?>
  </li>
  <?php  
  if($this->Session->read('role')=="admin"){?>
  <li <?php echo ($this->params->params['action'] == 'add_ip') ?'class="active"' : '' ?>>
    <?php echo $this->Html->link("IPアドレス変更",
    array('controller' => 'users','action' => 'add_ip'));?>
  </li>
  <?php } ?>
</ul>
</div>