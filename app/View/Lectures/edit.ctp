<!-- MG3.05 -->

<?php echo $this->Form->create('Lecture', array('action' => 'edit','class' => 'form-horizontal', 'role' => 'form'));  ?>
<div class="form-input">
	
	<div class="form-group">
		<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">授業の名前</label>
		<div class="box-input">
			<div class="col-sm-10">
				<?pHp echo $this->Form->input("title",array("class"=>"form-control", "id"=>"inputEmail3","label"=>""))?>
			</div>
		</div>
	</div>
</div>
<div class="form-input-description">
	<div class="form-group">
		<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">導入</label>
		<div class="box-input">
			<div class="col-sm-10">
				<?pHp echo $this->Form->input("description",array("class"=>"form-control", "rows"=>"5","label"=>""))?>
			</div>
		</div>
	</div>
</div>




<div style="position:relative; height:30px; left:310px; top:80px">
	<div style="position:absolute; top:5px; left:0px">
		<?php echo $this->Form->button('更新', array('type' => 'submit','class' => "btn btn-success btn")); ?>
	</div>
	<div style="position:absolute; top:5px; left:150px">
		<?php
		echo $this->Html->link(
			$this->Form->button('キャンセル',array('class' => "btn btn-danger btn")),array('controller' => "students", "action"=>"view"),array("escape"=>false));
		echo $this->Form->end(); 
		?>
	</div>
</div>