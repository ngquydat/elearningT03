<?php if(isset($data)){ ?>
<div class="lecture-inside-document-test" style="overflow:scroll;">
	<div id="describer" class="hidediv" style="display:block">
		<?php echo $data['Lecture']['description'] ;?>
	</div>
	<div id="files" class="hidediv" style="display:none">
		<table><th>ドキュメント</th>
			<?php 
			
			foreach ($data['File'] as $key => $file) { ?>
			<tr><td><?pHp echo $this->Form->button($file['title'],array('type'=>'button','onclick'=>"viewfile('myfile".$key."')"));?>
				</td></tr><?php 
			} 
			
			?>

		</table>
		<?php 
		echo '<div id="viewfile" style="display:none">';
		
		foreach ($data['File'] as $key => $file) {
			echo '<div class="hidefile" id="myfile'.$key.'" style="display:none">';
			echo $this->element("view_file", array('File' => $file));
			echo '</div>';
		}
		
		echo '</div>';
		?>
	</div>
	<!-- <div id="tests" class="hidediv" style="display:none">
		<table><th>テスト</th>
			<?php foreach ($data['Test'] as $key => $test) { ?>
			<tr><td><?pHp echo $this->Form->button($test['title'],array('type'=>'button','onclick'=>"viewtest('mytest".$key."')"));?></td></tr>
			<?php } ?>
		</table>
		<?php 
		echo '<div id="viewtest" style="display:none">';
		foreach ($data['Test'] as $key => $test) {
			echo '<div class="hidetest" id="mytest'.$key.'" style="display:none">';
			echo $this->element("view_test", array('TestDetail' => $test['TestDetail']));
			echo '</div>';
		}
		echo '</div>';
		?>
	</div> -->
	<div id="studentList" class="hidediv" style="display:none">
		<div>
			<div class="studentlist">学生リスト</div>
			<?php 
			if(isset($data['studentList'])){
				foreach ($data['studentList'] as $user):?>
				<div class="list-user">
					<?pHp
					echo $this->Html->div(array("class"=>"list-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"list-user-name"),$this->Html->link($user["User"]['username'],array('controller' => "users", "action"=>"user_view_teacher", $user["User"]["userid"]),  array("escape"=>false))));
					?>

					<?php 
					echo $this->Form->create("Lecture", array("action" => "blockstudent"));
					echo $this->Form->input('userid', array('type' => 'hidden', 'value' => $user["User"]["userid"]));
					echo $this->Html->div(array("class"=>"list-user-button1"),$this->Form->button('ブロック',array('class' => "btn btn-success btn-sm")));
					echo $this->Form->end();
					?>


				</div>

				<?php endforeach; 

			} ?>
		</div>
		<div>
			<div class="blocklist">ブロックリスト</div>
			<?php
			if(isset($data['blockList'])){
				foreach ($data['blockList'] as $user):?>
				<div class="list-user">
					<?pHp
					echo $this->Html->div(array("class"=>"list-user-user"),$this->Html->image("teacher.jpg").$this->Html->div(array("class"=>"list-user-name"),$this->Html->link($user["User"]['username'],array('controller' => "users", "action"=>"user_view_teacher", $user["User"]["userid"]),  array("escape"=>false))));
					?>
					<div class="list-user-buttion1">
						<?php 
						echo $this->Form->create("Lecture", array("action" => "unblock"));
						echo $this->Form->input('userid', array('type' => 'hidden', 'value' => $user["User"]["userid"]));
						echo $this->Html->div(array("class"=>"list-user-button1"),$this->Form->button('Khôi phục',array('class' => "btn btn-success btn-sm")));
						echo $this->Form->end();
						?>
					</div>

				</div>

				<?php endforeach;

			}
			?>
		</div>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
function viewfile(i) 
{ 
	var divid = document.getElementById(i);
	var divclass = document.getElementsByClassName("hidefile");
	var parent = document.getElementById("viewfile");
	if(parent.style.display == "none")parent.style.display = "block";
	for(var i=0;i<divclass.length;i++){
		divclass[i].style.display = 'none';
	}
	divid.style.display = 'block';

};
// function viewtest(i) 
// { 
// 	var divid = document.getElementById(i);
// 	var divclass = document.getElementsByClassName("hidetest");
// 	var parent = document.getElementById("viewtest");
// 	if(parent.style.display == "none")parent.style.display = "block";
// 	for(var i=0;i<divclass.length;i++){
// 		divclass[i].style.display = 'none';
// 	}
// 	divid.style.display = 'block';

// };
</script>