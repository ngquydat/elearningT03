<div class="lecture">
	<div class="lecture-title">
		<?php

		echo $this->Html->link($Lecture['Lecture']['title'],array('controller' => "lectures", "action"=>"learn",$Lecture['Lecture']['lectureid'] ),array("escape"=>false,'confirm'=>($this->Session->read('role')=='student')? '参加したい？？？':false));?>
	</div>
	<div class="lecture-date">
		<?php echo $Lecture['Lecture']['create_time']  ?>
	</div>
	<?php if($this->Session->read('role') == 'admin'){  ?>
	<div class="lecture-button2">
		<?php

		echo $this->Html->link($this->Form->button('削除',array('class' => "btn btn-success btn-sm")),array('controller' => "lectures", "action"=>"delete",$Lecture['Lecture']['lectureid']),array("escape"=>false,'confirm'=>'よろしいですか?'));?>


	</div>
	<?php } ?>
	<?php if($this->Session->read('role') == 'teacher'){  
		if($this->Session->read('userid') == $Lecture['Lecture']['userid']){ ?>
		<div class="lecture-button1">
			<?php

			echo $this->Html->link($this->Form->button('変更',array('class' => "btn btn-success btn-sm")),array('controller' => "lectures", "action"=>"edit",$Lecture['Lecture']['lectureid']),array("escape"=>false));?>
		</div>

		<div class="lecture-button2">
			<?php

			echo $this->Html->link($this->Form->button('削除',array('class' => "btn btn-success btn-sm")),array('controller' => "lectures", "action"=>"delete",$Lecture['Lecture']['lectureid']),array("escape"=>false,'confirm'=>'よろしいですか?'));?>


		</div>
		<?php }else{ ?>
		<div class="lecture-button2">
			<?php
			echo $this->Form->create("User",array('action'=>'report'));
			echo $this->Form->input("reason", array('type'=>'hidden','id'=>'reason'));
			echo $this->Form->input("lectureid", array('type'=>'hidden','value'=>$Lecture['Lecture']['lectureid']));
			echo $this->Form->button('違反報告',array('class' => "btn btn-success btn-sm",'onClick'=>"report()"));
			echo $this->Form->end();
			?>
		</div>
		<?php } ?>


		<?php } ?>
		<?php if($this->Session->read('role') == 'student'){  ?>
		<div class="lecture-button1">
			<?php
			echo $this->Form->create("User",array('action'=>'report'));
			echo $this->Form->input("reason", array('type'=>'hidden','id'=>'reason'));
			echo $this->Form->input("lectureid", array('type'=>'hidden','value'=>$Lecture['Lecture']['lectureid']));
			echo $this->Form->button('違反報告',array('class' => "btn btn-success btn-sm",'onClick'=>"report()"));
			echo $this->Form->end();
			?>
		</div>

		<div class="lecture-button2">
			<?php

			echo $this->Html->link($this->Form->button('登録',array('class' => "btn btn-success btn-sm")),array('controller' => "students", "action"=>"studentlearnlecture",$Lecture['Lecture']['lectureid']),array("escape"=>false,'confirm'=>'よろしいですか?'));?>


		</div>
		<?php } ?>


		<div class="lecture-description"><p><?php echo $Lecture['Lecture']['description'] ; ?></p>

		</div>
		<div class="lecture-vote">
			<?pHp
			echo $this->Html->div(array("class"=>"vote"));
			echo $this->Html->image('vote_author.png');
			echo $this->Html->div(array("class"=>"like"),$this->Html->link($this->Html->image('like.png'),array('controller' => 'lectures','action' => 'like', $Lecture['Lecture']['lectureid']),
				array('escape' =>false )));
			echo $this->Html->para(null,count($Lecture['Lecture']['Like'])."いいね",array("class"=>"p"))
			?>
		</div>
	</div>
	<div class="lecture-author">
		<?pHp
		echo $this->Html->div(array("class"=>"vote"));
		echo $this->Html->image('vote_author.png');
		echo $this->Html->div(array("class"=>"author"),$this->Html->link($Lecture['Lecture']['User']['username'],array('controller' => "users", "action"=>"user_view_teacher",$Lecture['Lecture']['User']['userid']),
			array("escape"=>false)));
		echo $this->Html->para(null,"筆者：",array("class"=>"p"))

		?>
	</div>
</div>
</div>
<script type="text/javascript">
function report(){
	s=prompt('Enter your reason','reason');
	document.getElementById("reason").value = s;
}
</script>