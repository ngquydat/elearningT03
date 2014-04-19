<div style="position:relative; top:30px; left:300px;font-size:20px;">
	<?php
	if(isset($this->Paginator)){
		echo $this->Paginator->prev('« 前のページ ', null, null, array('class' => 'disabled')); 
		echo " | ".$this->Paginator->numbers()." | "; 
		echo $this->Paginator->next(' 次のページ »', null, null, array('class' => 'disabled')); 
		echo " ページ ".$this->Paginator->counter(); 
	}

	?>
</div>