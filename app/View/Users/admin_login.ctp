<h1>Welcome to admin login</h1>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Admin',array("class"=>"login")); ?>


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
  
  <?php echo $this->form->end("ログイン")?>
  
  </div>


    


  


