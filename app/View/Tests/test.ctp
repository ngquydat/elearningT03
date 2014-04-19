<head>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<meta charset=utf-8 />
	<title>Disable Right Click Demo</title>

	<script type="text/javascript">
	$(document).ready(function(){



		$(document).ready(function(){
			$(document).bind("contextmenu",function(e){
				return false;
			});
		});

	});

	function Disable_Control_C() {
		var keystroke = String.fromCharCode(event.keyCode).toLowerCase();

		if (event.ctrlKey && (keystroke == 'c' || keystroke == 'v')) {
			event.returnValue = false; 
		}
	}
	</script>
</head>
<div onkeydown="javascript:Disable_Control_C() onload=setInterval("window.clipboardData.setData('text','')",2) oncontextmenu="return false" onselectstart="return false" ">
	<?php echo $this->element("left_menu_test", array('data'=>$data)); ?>
</div>

<div class="content_2">
	<?pHp
	echo $this->element("lecture_inside_title",array('Lecture' => $data['Lecture']));
	echo $this->element("lecture_inside_test", array('TestDetail' => $data['TestDetail'], 'Test' => $data['Test']));
	echo $this->element("lecture_inside_comment", array('Lecture' => $data['Lecture']));
	echo $this->element("lecture_inside_vote",array('Lecture' => $data['Lecture']));
	echo $this->element("lecture_inside_author", array('Lecture' => $data['Lecture']));
	foreach ($data['CommentsList'] as $key => $Comment) {
		echo $this->element("lecture_inside_comment_of_user", array('Comment' => $Comment));
	}

	?>



</div>