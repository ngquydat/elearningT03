<div>
	<?pHp  echo $this->element("list_admin_manage_user");
	?>

</div>
<div class="content_2"> 

	<?php 
	if(isset($registerrequests)){
		foreach($registerrequests as $registerrequest):?>
		<div>
			<div class="list-user">
				<?pHp
				echo $this->Html->div(array("class"=>"list-user-user"));
				echo $this->Html->image("teacher.jpg");

				echo $this->Html->div(array("class"=>"list-user-name"),$this->Html->link($registerrequest['Registerrequest']['username'],array('controller' => "users", "action"=>"admin_view_user", $registerrequest['Registerrequest']['registerrequestid']),	array("escape"=>false)));
				?>
			</div>

			<?pHp
			echo $this->Html->div(array("class"=>"list-user-button1"));
			echo $this->Html->link(	$this->Form->button('確認',array('class' => "btn btn-success btn-sm")),
				array('controller' => "users", "action"=>"accept_register",$registerrequest['Registerrequest']['registerrequestid']),
				array("escape"=>false,'confirm'=>'よろしうですか?')
				);	
			
				?>
			</div>


			<?pHp
			echo $this->Html->div(array("class"=>"list-user-button2"));
			echo $this->Html->link(	$this->Form->button('Deny',array('class' => "btn btn-danger btn-sm")),
				array('controller' => "users", "action"=>"deny_register",$registerrequest['Registerrequest']['registerrequestid']),
				array("escape"=>false,'confirm'=>'よろしうですか?')
				);	
			
				?>
			</div>


		</div>
	<?php endforeach;
}
?>


</div>

</div>    