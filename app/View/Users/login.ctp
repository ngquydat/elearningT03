<?php if(isset($admin)){
  echo '<h1>管理者ようこそ</h1>';
} ?>

<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User',array("class"=>"login")); ?>


<h1>ログイン</h1>
<div class="inset">

  <p>
    <?php   
    echo $this->Form->input("username",array("class"=>"login","label"=>"ユーザー名"));
    ?>

  </p>
  <p>
    <?php   
    echo $this->Form->input("password",array("class"=>"login","label"=>"パスワード"));
    ?>
  </p>
  <div class="button-login1">

  <?php echo $this->Form->button("ログイン",array('class' => "btn btn-success btn", "style"=>'position:relative;left:150px;top:17px'));
  echo $this->form->end()?>
  </div>

  <?php if(!isset($admin)){
    echo $this->Html->link("登録",array('controller' => 'users','action' => 'register'),array("class"=>"link-signin"));
  } ?>

</div>








