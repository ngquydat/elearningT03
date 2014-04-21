<?php if(isset($Lecture)){ ?>
<div class="lecture">
	<div class="lecture-title">
		<?php

		echo $this->Html->link($Lecture['Lecture']['title'],array('controller' => "students", "action"=>"view"),array("escape"=>false));?>
	</div>
	<div class="lecture-date">
		<?php echo $Lecture['Lecture']['create_time']; ?>
	</div>
	<div class="lecture-button1">
		<?php
		echo $this->Html->link($this->Form->button('登録',array('class' => "btn btn-success btn-sm")),array('controller' => "students", "action"=>"view"),array("escape"=>false));
		?>


	</div>
	<div class="lecture-button2">
		
	</div>


	<div class="lecture-description"><p><?php echo $Lecture['Lecture']['description']; ?></p>

	</div>
	<div class="lecture-vote">

		<?pHp
		echo $this->Html->div(array("class"=>"vote"));
		echo $this->Html->image('vote_author.png');
		echo $this->Html->div(array("class"=>"like"),$this->Html->link($this->Html->image('like.png'), array('controller' => 'lectures', 'action' => 'like', $Lecture['Lecture']['lectureid']), array('escape' => false)));
		echo $this->Html->para(null,$Lecture['Lecture']['likes']."いいね",array("class"=>"p"))

		?>
	</div>
</div>
<div class="lecture-author">
	<?pHp
	echo $this->Html->div(array("class"=>"vote"));
	echo $this->Html->image('vote_author.png');
	echo $this->Html->div(array("class"=>"author"),$this->Html->link($Lecture['User']['username'],array('controller' => "students", "action"=>"view"),array("escape"=>false)));
	echo $this->Html->para(null,"筆者：",array("class"=>"p"))

	?>
</div>
<?php } else echo "データがありません"; ?>
</div>
</div>