
<?php echo $this->Form->create("User", array("class" => "form-horizontal", "role"=>"form")); ?>
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
					<?pHp echo $this->Form->input("answer",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>
	<div style="position:relative;left:300px;top:20px;">

		<?php echo $this->Form->end("変更"); ?>
	</div>
