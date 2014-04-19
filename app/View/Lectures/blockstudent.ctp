<div>
	<?pHp  
	if(isset($data)){
		echo $this->element("list_teacher_lecture", array('data' => $data));
	}
	?>

</div>


<div class="content_2"> 

	<!-- <div id="search-admin">
		<?php echo $this->Form->create('Lecture', array('class' => 'navbar-form navbar-left', 'action' => 'searchstudent')); ?>
		<div class="form-group">
			<?php
			echo $this->Form->input("search.username",array("class"=>"form-control", "id"=>"search-box","type"=>"text","placeholder"=>"検索する。。。","label"=>""));
			?>


		</div>
		<?php
		echo $this->Form->button($this->Html->image("kinh.png"),array('type' => 'submit','name'=>'search_student','class' => "btn btn-default","id"=>"search-submit"));

		echo $this->Form->end(); ?>
	</div> -->
	<div>
		<div class="studentlist">学生リスト</div>
		<?php 
		if(isset($studentlist)){
			foreach ($studentlist as $user):?>
			<div class="list-user">
				<?pHp
				echo $this->Html->div(array("class"=>"list-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"list-user-name"),$this->Html->link($user["User"]['username'],array('controller' => "users", "action"=>"user_view_teacher", $user["User"]["userid"]),  array("escape"=>false))));
				?>
				
				<?php 
				echo $this->Form->create("Lecture", array("action" => "blockstudent"));
				echo $this->Form->input('userid', array('type' => 'hidden', 'value' => $user["User"]["userid"]));
				echo $this->Html->div(array("class"=>"list-user-button1"),$this->Form->button('ブロック',array('class' => "btn btn-success btn-sm")));
				echo $this->Form->end();
				?>
				

			</div>

			<?php endforeach; 

		} ?>
	</div>
	<div>
		<div class="blocklist">ブロックリスト</div>
		<?php
		if(isset($blockList)){
			foreach ($blockList as $user):?>
			<div class="list-user">
				<?pHp
				echo $this->Html->div(array("class"=>"list-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"list-user-name"),$this->Html->link($user["User"]['username'],array('controller' => "users", "action"=>"user_view_teacher", $user["User"]["userid"]),  array("escape"=>false))));
				?>
				<div class="list-user-buttion1">
					<?php 
					echo $this->Form->create("Lecture", array("action" => "unblock"));
					echo $this->Form->input('userid', array('type' => 'hidden', 'value' => $user["User"]["userid"]));
					echo $this->Html->div(array("class"=>"list-user-button1"),$this->Form->button('ブロック解除',array('class' => "btn btn-success btn-sm")));
					echo $this->Form->end();
					?>
				</div>

			</div>

			<?php endforeach;

		}
		?>
	</div>
	<?php echo $this->element("paging"); ?>
</div> 
