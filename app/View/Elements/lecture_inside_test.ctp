<div class="lecture-inside-document-test" style="overflow:scroll;">

	<?php 

	echo $this->Form->create("Test", array('action' => 'result')); 
	?>
	<?php echo $this->Html->div(array("class"=>"lecture-inside-test-title"),mb_convert_encoding($TestDetail['title'], 'UTF-8',"SJIS"));
	//pr($TestDetail);
	// pr(mb_convert_encoding($TestDetail['title'], 'UTF-8',"SJIS"));
	?>
	<div class="lecture-inside-test-content">
		<?php 
		if(isset($TestDetail['questionsList'])){
			foreach ($TestDetail['questionsList'] as $key => $question) { ?>
			<div class="">

				<div class="lecture-inside-test-question">
					<?php echo mb_convert_encoding($question['content'], 'UTF-8',"SJIS")?>
				</div>
				<div class="lecture-inside-test-answer">
					<?php
					foreach ($question['answer'] as $key1 => $answer) {
						$question['answer'][$key1] = mb_convert_encoding($answer, 'UTF-8',"SJIS");
					}
					echo $this->Form->radio('Test.studentAnswer.'.$key, $question['answer'], array('legend' => false, 'separator' => '<br>'));
					?>
				</div>
			</div>
			<?php } 
		}
		?>

		<p style="position:relative; top:30px;font-weight: bold;font-size:20px; text-align: center;color:#000;">
			<?php   echo $this->Form->button('END TEST', array('type' => 'submit')); ?>

		</p>
		<?php echo $this->Form->end();?>
	</div>
	<?php //pr($Test);?>

</div>