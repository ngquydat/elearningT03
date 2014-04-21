<div class="list_admin_manage_lecture">
<ul class="nav nav-pills nav-stacked">
  <li>
  </li>
     <li <?php echo ($this->params->params['action'] == 'lecture_manage') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("検索する",
    array('controller' => 'admins','action' => 'lecture_manage')); ?>
  </li>

   <li <?php echo ($this->params->params['action'] == 'admin_view_report') ?'class="active"' : '' ?>>
    <?pHp echo $this->Html->link("違反報告確認",
    array('controller' => 'admins','action' => 'admin_view_report')); ?>
  </li>

  </ul> 
</div>