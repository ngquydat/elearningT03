<div> 
	<?php
	echo $this->element("list_change_profile");
	?>

</div>




<div class = "content_2">
	<?php echo $this->Form->create("User", array("action" => "change_secession")); ?>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">パスワードを入力:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("mypassword",array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>


	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">秘密の質問:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("secretquestion",array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">答え:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("answer",array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>

	<div style="position:absolute;left:50px;top:300px;">

		<?php echo $this->Form->end("変更"); ?>
	</div>

</div>

