<div> 
	<?php  echo $this->element("list_change_profile");  ?>


</div>

<div class = "content_2">
	<!--Ham CREATE INPUT-->
	<?php echo $this->Form->create("User", array('action' => 'change_profile')); ?>
	<?php echo $this->Form->input("userid", array('type' => 'hidden')); ?>
	<?pHp echo $this->Form->input("User.username",array("class"=>"form-control", "type"=>"hidden","label"=>""))?>
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">名前:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("User.name",array("class"=>"form-control", "type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">生年月日:</label>
			<div class="box-input-birthday">
				<div class="col-sm-12">
					<?php
					echo $this->Form->input('User.birthday', 
						array(
							'type' => 'date',
							'label' => '',
							'dateFormat' => 'MDY',
							'empty' => array(
								'month' => '月',
								'day'   => '日',
								'year'  => '年'
								),
							'minYear' => date('Y')-130,
							'maxYear' => date('Y'),
							'options' => array('1','2')
							)
						);
						?>
					</div>
				</div>
			</div>
		</div>


		<div class="form-input">
			<div class="form-group">
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">場所:</label>
				<div class="box-input">
					<div class="col-sm-10">
						<?pHp echo $this->Form->input("User.address",array("class"=>"form-control", "type"=>"text","label"=>""))?>
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
						<?pHp echo $this->Form->input("User.phonenumber",array("class"=>"form-control", "type"=>"text","label"=>""))?>
						<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
					</div>
				</div>
			</div>
		</div>
		<!-- <?php debug($this->Session->read('role')); ?>  -->
		<?php  if($this->Session->read('role') == 'student'){ ?>
		<div class="form-input">
			<div class="form-group">
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">クレジットカード情報:</label>
				<div class="box-input">
					<div class="col-sm-10">
						<?pHp echo $this->Form->input("Student.creditcardinfo",array("class"=>"form-control", "type"=>"text","label"=>""))?>
						<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
					</div>
				</div>
			</div>
		</div>

		<?php } ?>
		<?php  if($this->Session->read('role') == 'teacher'){ ?>
		<div class="form-input">
			<div class="form-group">
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">銀行口座情報:</label>
				<div class="box-input">
					<div class="col-sm-10">
						<?pHp echo $this->Form->input("Teacher.bankaccountinfo",array("class"=>"form-control", "type"=>"text","label"=>""))?>
						<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
					</div>
				</div>
			</div>
		</div>

		<?php } ?>
		<?php  if($this->Session->read('role') == 'admin'){ ?>
		<div class="form-input">
			<div class="form-group">
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">IP</label>
				<div class="box-input">
					<div class="col-sm-10">
						<?pHp echo $this->Form->input("Adminip.ipid",array("class"=>"form-control", "type"=>"text","label"=>""))?>
						<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
					</div>
				</div>
			</div>
		</div>

		<?php } ?>
		<div style="position:relative; top:40px; left:306px;">
		<?php

		echo $this->Form->button('変更',array('class' => "btn btn-success btn"));
		echo $this->Form->end();
		?>

		
		
	</div>
	</div>

