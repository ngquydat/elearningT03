<div>
	<?pHp  echo $this->element("list_teacher_lecture");
	?>

</div>

<div class="content_2">

	<div class="lecture-inside-title">
		<?pHp
		echo $lecture["Lecture"]["title"];
		//echo "FFFFFFF";
		?>
	</div>
	<div class="lecture-inside-document-test ">
		<?pHp
		echo '授業の説明';
		?>
	</div>
	<div class="lecture-inside-comment">
	<div class="form-group"> 
	<?php
	echo $this->Form->label(array("class"=>"col-sm-2 control-label"),"Comment");
	echo $this->Html->div(array("class"=>"col-xs-50"),
			$this->Form->textarea("username",array("class"=>"form-control","type"=>"email","rows"=>"5")));
	?>
	</div> 
	</div>
	<div class="lecture-inside-vote">

	<?pHp
	
	echo $this->Html->div(array("class"=>"vote"),$this->Html->image('vote_author.png').$this->Html->div(array("class"=>"like"),$this->Html->link($this->Html->image('like.png'),array('controller' => 'students','action' => 'view'),
		array('escape' =>false ))).$this->Html->para(null,count($lecture['Like']).'  いいね',array("class"=>"p")));

		?>
	</div>
	<div class="lecture-inside-author">
			<?pHp
			echo $this->Html->div(array("class"=>"vote"),
				$this->Html->image('vote_author.png').
				$this->Html->div(array("class"=>"author"),$this->Html->link($lecture["User"]["username"],array('controller' => "users", "action"=>"view_other_by_student"),
					array("escape"=>false))).
				$this->Html->para(null,"筆者：",array("class"=>"p")));

				?>
	</div>
	<?php foreach ($lecture['Comment'] as $comment):?>

	<div class="lecture-inside-user">
	<?pHp
	if(0) $a="student";
	else $a="teacher";
	echo $this->Html->div(array("class"=>"lecture-inside-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"lecture-inside-user-name"),$this->Html->link($comment["User"]["username"],array('controller' => "users", "action"=>"view_other_by_".$a),	array("escape"=>false))).$this->Html->div(array("class"=>"lecture-inside-user-commet"),$comment['content'])
	);
	?>
	</div>
	<?php endforeach;?>

</div>

	
	

	
	

