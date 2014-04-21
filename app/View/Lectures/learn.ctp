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
//alert("let's see");
event.returnValue = false; // disable Ctrl+C
}
}
  </script>
</head>
<div>
	<?pHp  
	if(isset($data)){
		echo $this->element("list_teacher_lecture", array('data' => $data));
	}
	?>

</div>



<div class="content_2" onkeydown="javascript:Disable_Control_C() onload=setInterval("window.clipboardData.setData('text','')",2) 

    oncontextmenu="return false" onselectstart="return false" ">

	<?pHp
	if(isset($data)){
		echo $this->element("lecture_inside_title",array('data' => $data));
		echo $this->element("lecture_inside_document", array('data' => $data));
		echo $this->element("lecture_inside_comment", array('data' => $data));
		echo $this->element("lecture_inside_vote",array('data' => $data));
		echo $this->element("lecture_inside_author", array('data' => $data));
		foreach ($data['CommentsList'] as $key => $Comment) {
			echo $this->element("lecture_inside_comment_of_user", array('Comment' => $Comment));
		}
	}
	

	?>




</div>
