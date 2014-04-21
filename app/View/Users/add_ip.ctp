<div> 
	<?php
	echo $this->element("list_change_profile");
	?>


</div>
<?php //var_dump($ips);?>
<div class = "content_2">


	<?php echo $this->Form->create("Adminip", array("class" => "form-horizontal", "role"=>"form")); ?>

	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">新しいIPアドレス</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?php echo $this->Form->input("ipid",array("class"=>"form-control","type"=>"text","label"=>""))?>

					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>
	<div style="position:relative;left:300px;top:20px;">

		<?php echo $this->Form->end("変更"); ?>
	</div>

</div>