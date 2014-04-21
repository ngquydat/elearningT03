<div>
	<?pHp  echo $this->element("list_admin_manage_user");
	?>

</div>

<div class="content_2">
	<?php 
	echo $this->Form->create('User',array("action"=>"new_admin"));
	echo $this->Form->input('role',array('type'=> 'hidden', 'value' => 'admin'))
	?>
	
	<div class="form-input">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">ユーザー名:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("username",array("class"=>"form-control","type"=>"text","label"=>""))?>
				</div>
			</div>
		</div>
	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">パスワード:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("password",array("class"=>"form-control","type"=>"password","label"=>""))?>
				</div>
			</div>
		</div>

	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">もう一度パスワードを 入力:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("password2",array("class"=>"form-control","type"=>"password","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">名前:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("admin_name",array("class"=>"form-control","type"=>"text","label"=>""))?>
				</div>
			</div>	
		</div>

	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">電話番号:</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("admin_phonenumber",array("class"=>"form-control","type"=>"text","label"=>""))?>
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
					<?pHp echo $this->Form->input("admin_address",array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>

	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">銀行口座情報</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("admin_bankaccountinfo",array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>	 
	</div>

	<div class="form-input">

		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">生年月日</label>
			<div class="box-input-birthday">
				<div class="col-sm-10">
					<?php
					echo $this->Form->input('admin_birthday', 
						array(
							'type' => 'date',
							'label' => '',
							'dateFormat' => 'MDY',
							'empty' => array(
								'month' => 'Month',
								'day'   => 'Day',
								'year'  => 'Year'
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
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">IPアドレス</label>
				<div class="box-input">
					<div class="col-sm-10">
						<?pHp echo $this->Form->input("admin_ip",array("class"=>"form-control","type"=>"text","label"=>""))?>
					</div>
				</div>
			</div>
		</div>
		<div class="form-input">

			<div class="form-group">
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">秘密の質問</label>
				<div class="box-input">
					<div class="col-sm-10">
						<?pHp echo $this->Form->input("admin_secretquestion",array("class"=>"form-control","type"=>"text","label"=>""))?>
					</div>
				</div>
			</div>

		</div>
		<div class="form-input">

			<div class="form-group">
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">答え</label>
				<div class="box-input">
					<div class="col-sm-10">
						<?pHp echo $this->Form->input("admin_initialverifycode",array("class"=>"form-control","type"=>"text","label"=>""))?>
					</div>
				</div>
			</div>
		</div>
		
		<div style="position:relative; top:40px; left:305px;">
			<?php

			echo $this->Form->button('登録',array('class' => "btn btn-success btn"));
			echo $this->Form->end();
			?>
		</div>