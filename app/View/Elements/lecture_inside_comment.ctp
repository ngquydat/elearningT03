<div class="lecture-inside-comment">
	<div class="form-group"> 
		<?php
		if(isset($data)){
			echo $this->Form->create('Comment', array('action' => 'addComment','name' => 'theform'));
			echo $this->Form->input('lectureid', array('type' => 'hidden', 'value' => $data['Lecture']['lectureid']));
			echo $this->Form->label(array("class"=>"col-sm-2 control-label"),"コメント");
			echo $this->Html->div(array("class"=>"col-xs-50"),
				$this->Form->textarea("content",array("class"=>"form-control","rows"=>"5","onkeydown"=> "pressed(event)")));
			echo $this->Form->end();
		}
		?>
		<script type="text/javascript">
		function pressed(e) {
            // Has the enter key been pressed?
            if ( (window.event ? event.keyCode : e.which) == 13) { 
                // If it has been so, manually submit the <form>
                document.theform.submit();
            }
        }
        </script>
    </div> 
</div>
