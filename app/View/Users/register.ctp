
<?php echo $this->Form->create('Registerrequest',array("class"=>"form-horizontal","role"=>"form")); ?>

<div style="position:relative;top:140px;left:650px;">
	<?php 
	echo $this->Form->input('role',array('options'=>array('teacher'=>'先生','student'=>'学生'),'default'=>'student',"label"=>"資格","onchange"=>"showDiv(this)"))
	?>
	<?php  
	// echo $this->Form->input('role',array('options'=>array('teacher'=>'先生','student'=>'学生'),'default'=>'student',"label"=>"資格"))
	?>

</div>
<script type="text/javascript">
function showDiv(elem){
	if(elem.value == "teacher"){
		document.getElementById('accountbank').style.display = "block";
		document.getElementById('creditcard').style.display = "none";
		document.getElementById("student").value = "12345678";
		document.getElementById("teacher").value = "";
	}
	if(elem.value == "student"){
		document.getElementById('accountbank').style.display = "none";
		document.getElementById('creditcard').style.display = "block";
		document.getElementById("teacher").value = "12345678";
		document.getElementById("student").value = "";
	}
	
}
</script>

<div class="form-input">
	<div class="form-group">
		<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">ユーザー名:</label>
		<div class="box-input">
			<div class="col-sm-10">
				<?pHp echo $this->Form->input("username",array("class"=>"form-control","type"=>"text","label"=>""))?>
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
				<?pHp echo $this->Form->input("name",array("class"=>"form-control","type"=>"text","label"=>""))?>
				<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
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
				<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
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
<div class="form-input" id="accountbank" style="display: none;">
	
	<div class="form-group">
		<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">銀行口座情報</label>
		<div class="box-input">
			<div class="col-sm-10">
				<?pHp echo $this->Form->input("bankaccountinfo",array("id"=>"teacher","class"=>"form-control","type"=>"text","label"=>"","value" =>"12345678"))?>
				<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
			</div>
		</div>
	</div>	 
</div>
<div class="form-input" id="creditcard" style="display: block;">
	
	<div class="form-group">
		<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">クレジットカード情報</label>
		<div class="box-input">
			<div class="col-sm-10">
				<?pHp echo $this->Form->input("creditcardinfo",array("id"=>"student","class"=>"form-control","type"=>"text","label"=>""))?>
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
				<?pHp echo $this->Form->input("phonenumber",array("class"=>"form-control","type"=>"text","label"=>""))?>
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
				<?pHp echo $this->Form->input("address",array("class"=>"form-control","type"=>"text","label"=>""))?>
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
				echo $this->Form->input('birthday', 
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
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">秘密の質問</label>
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
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">答え</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("initialverifycode",array("class"=>"form-control","type"=>"text","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</div>
	<div style="position:relative; top:20px; left:300px;">
		<?php

		echo $this->Form->button('登録',array('class' => "btn btn-success btn"));
		echo $this->Form->end();
		?>
	</div>











