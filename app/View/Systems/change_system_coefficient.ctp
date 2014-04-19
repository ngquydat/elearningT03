<div>
	<?pHp  echo $this->element("list_admin_manage_system");
	?>

</div>

<div class="content_2">
	<?php //debug($system);?>

	<?php echo $this->Form->create("System",array("action"=>"change_system_coefficient"));?>
	<div class="form-input">	
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">パスワードを間違う回数</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input('numberwrongpassword',array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div class="form-input">	
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">違反のできる回数</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input('numberviolation',array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">セッションを削除の待つ時間</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("timeblocksession",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">授業のコスト</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("lecturecost",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">授業の時間</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("lecturetime",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">先生と管理者の割合の課金</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("ratiomoney",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">課金情報の所定のフォルダ</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("filebillpath",array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div style="position:absolute; top:580px; left:310px;">
		<?php

	echo $this->Form->button('変更',array('class' => "btn btn-success btn-sm"));
	echo $this->Form->end();
	?>

		
		
	</div>
</form>

</div>  