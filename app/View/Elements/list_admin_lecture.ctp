<div class="list_lecture">
<ul class="nav nav-pills nav-stacked">
	<li>
	</li>
	<li><?pHp echo $this->Html->link("導入",
  		array('controller' => 'students','action' => 'view'));?>
  	</li>	
  	<li>
  		<a href="#">ドキュメント</a>
  		<ul class="nav nav-pills nav-stacked">
  			<li>
			</li>
  			<li><?pHp echo $this->Html->link("ドキュメント1",
        		array('controller' => 'students','action' => 'view'));?>
  			</li>
  			<li><?pHp echo $this->Html->link("ドキュメント2",
        		array('controller' => 'students','action' => 'view'));?>

  			</li>
  		</ul>
  	</li>
  	<li><a href="#">テスト</a>
  		<ul class="nav nav-pills nav-stacked">
  			<li>
			</li>
  			<li><?pHp echo $this->Html->link("テスト1",
        		array('controller' => 'students','action' => 'view'));?>
  			</li>
  			<li><?pHp echo $this->Html->link("テスト2",
        		array('controller' => 'students','action' => 'view'));?>

  			</li>
  		</ul>
  	</li>
  
	</ul>
</div>
