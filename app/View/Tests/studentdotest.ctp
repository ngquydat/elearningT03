<?php echo $this->element("left_menu_test", array('data'=>$data)); ?>

<div class="content_2">

	<?pHp
	if(isset($data['History'])){
		echo '<table><tr><th>コマ</th><th>テスト</th><th>時間</th></tr>';
		foreach ($data['History'] as $key => $history) {
			echo '<tr><td>'.$history['Test']['Lecture']['Lecture']['title'].'</td><td>'.$this->Html->link($history['Test']['title'], array('controller' => 'tests', 'action' => 'result', $history['Studentdotest']['testid']))."</td><td>".$history['Studentdotest']['time']."</td></tr>";
		}
		echo '</table>';
	}
	?>
</div>