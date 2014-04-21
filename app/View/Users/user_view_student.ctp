
<div>
	<?pHp if(isset($user)){
		echo $this->element("list_student_watch_user", array('user'=>$user));
	} else{
		echo $this->element("list_student_watch_user");
	}
	?>

</div>


<div class="content_2">
	<?php echo $this->Form->create("User", array('action' => 'user_view_teacher')); ?>
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">名前:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("username",array("class"=>"form-control","type"=>"text","label"=>"","readonly"=>true))?>
				</div>
			</div>
		</div>
	</div>
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">生年月日</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("birthday",array("class"=>"form-control","type"=>"text","label"=>"","readonly"=>true))?>
				</div>
			</div>
		</div>
	</div>

	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">場所</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("address",array("class"=>"form-control","type"=>"text","label"=>"","readonly"=>true))?>
				</div>
			</div>
		</div>
	</div>
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">電話番号</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("phonenumber",array("class"=>"form-control","type"=>"text","label"=>"","readonly"=>true))?>
				</div>
			</div>
		</div>
	</div>
	<div class="form-input">
		<div class="form-group">
			<div class="box-input">
				<div class="col-sm-10">
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="lecture-of-user-profile">
		<div class="list-user-sort">並べる順番: 
			<?php
			if(isset($this->Paginator)){
				echo $this->Paginator->sort('Lecture.title','タイトル')." | ".$this->Paginator->sort('Lecture.create_time','時間');
			}
			?>
		</div>

		<?php 
		//pr($Lectures); die();
		if(isset($Lectures)){

			foreach ($Lectures as $key => $Lecture) {
				//pr($Lecture); die();
				echo $this->element("lecture_admin", array('Lecture' => $Lecture));
			}
		}
		?>

		<?php echo $this->element("paging"); ?>
	</div>
	
</div>