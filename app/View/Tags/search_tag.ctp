<?php 
if(isset($tags)){
	foreach ($tags as $key => $tag) {
		echo $this->Html->div(array("class"=>"tag"),$this->Html->link($tag["Tag"]["tagname"],array('controller' => "lectures", "action"=>"search_tag", $tag["Tag"]["tagname"]),array("escape"=>false)));
	}
}
?>
<div style="position:absolute; top:300px; left:300px;font-size:20px;">
	<?php
	if(isset($this->Paginator)){
		echo $this->Paginator->prev('« 前のページ ', null, null, array('class' => 'disabled')); 
		echo " | ".$this->Paginator->numbers()." | "; 
		echo $this->Paginator->next(' 次のページ »', null, null, array('class' => 'disabled')); 
		echo " ページ ".$this->Paginator->counter(); 
	}

	?>
</div>

