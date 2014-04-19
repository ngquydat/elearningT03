<?php //debug($tags);?>
<?php foreach ($tags as $tag):?>
	<?php 
	echo $this->Html->div(array("class"=>"tag"),$this->Html->link($tag["Tag"]["tagname"],
		array('controller' => "lectures", "action"=>"search_tag", $tag["Tag"]["tagname"]),
		array("escape"=>false)));?>
	<?php endforeach;?>
	<div style="position:absolute; top:300px; left:300px;font-size:20px;">
		<?php
    echo $this->Paginator->prev('« 前のページ ', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
    echo $this->Paginator->next(' 次のページ »', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " ページ ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
    ?>
</div>
