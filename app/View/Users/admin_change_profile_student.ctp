<div>
	<?php echo $this->element("list_admin_change_profile_user");
	?>
</div>



<div class = "content_2">
	<!--Ham CREATE INPUT-->
	<?php echo $this->Form->create("User", array("class" => "form-horizontal", "role"=>"form")); ?>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">名前:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("name",array("class"=>"form-control", "type"=>"text","label"=>"", "value" => $user["User"]["name"]))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>


	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">生年月日:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("birthday",array("class"=>"form-control", "type"=>"text","label"=>"", "value" => $user["User"]["birthday"]))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>


	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">場所:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("address",array("class"=>"form-control", "type"=>"text","label"=>"", "value" => $user["User"]["address"]))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>


	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">電話番号:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("phonenumber",array("class"=>"form-control", "type"=>"text","label"=>"", "value" => $user["User"]["phonenumber"]))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>

	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">クレジットカード情報:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("Student.creditcardinfo",array("class"=>"form-control", "type"=>"text","label"=>"", "value" => $student["Student"]["creditcardinfo"]))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>

	<div style="position:absolute;left:50px;top:400px;">

		<?php echo $this->Form->end("変更"); ?>
	</div>
</div>

