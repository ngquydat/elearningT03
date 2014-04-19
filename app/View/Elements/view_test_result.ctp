
<div class="lecture-inside-document-test" style="overflow:scroll;">

	<?php echo $this->Html->div(array("class"=>"lecture-inside-test-title"),mb_convert_encoding($TestDetail['title'], 'UTF-8',"SJIS"));
	
	echo '時間: '.$student_result['Test']['time'].'<br>';
	echo '点数: '. $student_result['Test']['point'].'<br>';
	?>
	<div class="lecture-inside-test-content">
		<?php foreach ($TestDetail['questionsList'] as $key => $question) { ?>
		<div class="">

			<div class="lecture-inside-test-question">
				<?php echo mb_convert_encoding($question['content'], 'UTF-8',"SJIS").'('.$question['point'].'point)'; ?>
			</div>
			<div class="lecture-inside-test-answer">
				<?php
				foreach ($question['answer'] as $key1 => $answer) {
					$question['answer'][$key1] = mb_convert_encoding($answer, 'UTF-8',"SJIS");
				}
				echo $this->Form->radio('Test.studentAnswer.'.$key, $question['answer'], array('legend' => false, 'separator' => '<br>'));
				
				if($question['correctAnswer'] == ($student_result['Test']['studentAnswer'][$key]+1)){
					echo '<p style="font-weight:bold;color:green">正しい</p>';
				}else{
					echo '<p style="font-weight:bold;color:red">正しくない</p>';
				}
				echo '<p style="font-weight:bold;color:red">CorrectAnswer: '.$question['correctAnswer'].'</p>';
				?>
			</div>
		</div>
		<?php } ?>
		<?php
		?>
		
	</div>
	<?php 
	
	?>

</div>