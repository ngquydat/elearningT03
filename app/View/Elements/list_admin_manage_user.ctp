<div class="list_admins_user">
<ul class="nav nav-pills nav-stacked">
  <li>
  </li>

  <li <?php echo ($this->params->params['action'] == 'home') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("検索する",
    array('controller' => 'admins','action' => 'home')); ?>
  </li>

  <li <?php echo ($this->params->params['action'] == 'accept_register') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("新ユーザ確認",
    array('controller' => 'users','action' => 'accept_register')); ?>
  </li>

  <li <?php echo ($this->params->params['action'] == 'new_admin') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("新管理者を作る",
    array('controller' => 'users','action' => 'new_admin')); ?>
  </li>
   
  </ul>
</div>