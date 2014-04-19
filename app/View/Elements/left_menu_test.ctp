<div>
	<?php  
	if(isset($data)){?>
	<div class="list_lecture">
		<ul class="nav nav-pills nav-stacked">
			<li></li>
			<li><?pHp echo $this->Html->link("ドキュメント",array('controller' => 'lectures','action' => 'learn', $data['Lecture']['lectureid']));?></li>
			<li><?pHp echo $this->Html->link("テスト",array('controller' => 'tests','action' => 'view', $data['Lecture']['lectureid']));?></li>
			<li><?pHp echo $this->Html->link("歴史",array('controller' => 'tests','action' => 'studentdotest', $data['Lecture']['lectureid']));?></li>
		</ul>
	</div>
	<?php } 
	?>
</div>