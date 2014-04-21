<?php 
if(isset($data))echo $this->element("left_menu_test", array('data'=>$data)); ?>

<div class="content_2">

	<?pHp
	if(isset($data)){
		echo $this->element("lecture_inside_title",array('Lecture' => $data['Lecture']));
		echo $this->element("view_test_result", array('TestDetail' => $data['TestDetail'], 'student_result' => $data['StudentResult']));
		echo $this->element("lecture_inside_comment", array('Lecture' => $data['Lecture']));
		echo $this->element("lecture_inside_vote",array('Lecture' => $data['Lecture']));
		echo $this->element("lecture_inside_author", array('Lecture' => $data['Lecture']));
		foreach ($data['CommentsList'] as $key => $Comment) {
			echo $this->element("lecture_inside_comment_of_user", array('Comment' => $Comment));
		}
	}
	?>

</div>