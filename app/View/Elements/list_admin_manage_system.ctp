<div class="list_admin_manage_lecture">
<ul class="nav nav-pills nav-stacked">
	<li>
	</li>

     <li <?php echo ($this->params->params['action'] == 'change_system_coefficient') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("システム定数変更",
    array('controller' => 'systems','action' => 'change_system_coefficient')); ?>
  </li>

       <li <?php echo ($this->params->params['action'] == 'backup') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("バックアップ",
    array('controller' => 'admins','action' => 'backup')); ?>
  </li>

	</ul>
</div> 