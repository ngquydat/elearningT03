<div> 
	<?php
	echo $this->element("list_change_profile");
	?>

</div>


<div class = "content_2">

	<?php echo $this->Form->create("User", array('action' => 'change_password')); ?>
	<?php echo $this->Form->input("userid",array("class"=>"form-control","type"=>"hidden","label"=>"","value" => $this->Session->read('userid')))?>
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">現在のパスワード:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?php echo $this->Form->input("oldpassword",array("class"=>"form-control","type"=>"password","label"=>""))?>

					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>

	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">新しいパスワード:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("newpassword",array("class"=>"form-control", "type"=>"password","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>


	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">新しいパスワードの確認:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("newpassword1",array("class"=>"form-control", "type"=>"password","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div style="position:absolute;left:50px;top:300px;">

		<?php echo $this->Form->end("変更"); ?>
	</div>


</div>

