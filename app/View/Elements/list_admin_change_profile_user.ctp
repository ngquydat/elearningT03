<div class="avatar_change_profile">
    
   <?php
    echo $this->Html->div(array("class"=>"name_user_change_profile"), $user['User']['username']);
    echo 
    $this->Html->image("teacher_big.jpg");

?>
 

</div>

<div class="list_admin_change_profile_user">
<ul class="nav nav-pills nav-stacked">
  <li>
  </li>
     <li <?php echo ($this->params->params['action'] == 'admin_view_user') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("ユーザの自己情報変更",
    array('controller' => 'users','action' => 'admin_view_user', $user['User']['userid'])); ?>
  </li>

     <li <?php echo ($this->params->params['action'] == 'reset_password') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("パスワードリセット",
    array('controller' => 'users','action' => 'reset_password', $user['User']['userid']), array("escape"=>false,'confirm'=>'よろしいですか?')); ?>
  </li>

     <li <?php echo ($this->params->params['action'] == 'reset_verify_code') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("Verifycodeリセット",
        array('controller' => 'users','action' => 'reset_verify_code', $user['User']['userid']), array("escape"=>false,'confirm'=>'よろしいですか?')); ?>
  </li>
  <li <?php echo ($this->params->params['action'] == 'change_secession') ?'class="active"' : '' ?>>
    <?php 
    echo $this->Html->link("脱退",array('controller' => 'users','action' => 'deleteUser', $user['User']['userid']));
    ?>
  </li>

  </ul>
</div>