<?php if(isset($data))echo $this->element("left_menu_test", array('data'=>$data)); ?>
<div class='content_2'>
	<table><tr><th>テスト</th><th>テーマ</th><th>先生</th></tr>
		<?php
		if(isset($data)){
			foreach ($data['Test'] as $key => $test) { 
				echo '<tr><td>'.$this->Html->link($test['title'],array('controller'=>'tests','action'=>'test',$test['testid'])).'</td><td>'.mb_convert_encoding($test['TestDetail']['title'], 'UTF-8',"SJIS").'</td><td>'.$data['User']['username'].'</td></tr>';	
			}
		}
		?>
	</table>
	<?php echo $this->element("paging"); ?>
	
</div>