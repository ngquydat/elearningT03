
<style type="text/css">


.user-change-verifycode-button
{
	position: absolute;
	left:310px;
	top:300px;
}

</style>



<div> 
	<?php
	echo $this->element("list_change_profile");
	?>

</div>


<div class = "content_2">

	<?php echo $this->Form->create("User", array('action' => 'change_verify_code')); ?>
	<?php echo $this->Form->input("userid",array("class"=>"form-control","type"=>"hidden","label"=>"","value" => $this->Session->read('userid')))?>
	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">現在の秘密の質問:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("secretquestion",array("class"=>"form-control", "type"=>"text","label"=>""))?>
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
					<?pHp echo $this->Form->input("oldverifycode",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">新しい秘密の質問:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("newsecretquestion",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>


	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">新しい答え:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("newverifycode",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div style="position:absolute;left:50px;top:400px;">

		<?php echo $this->Form->end("変更"); ?>
	</div>

</div>


