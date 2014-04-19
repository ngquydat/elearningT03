<div class="list-user-sort">並べる順番: 
	<?php
	if(isset($this->Paginator)){
		echo $this->Paginator->sort('title','タイトル')." | ".$this->Paginator->sort('create_time','時間');
	}
	?>
</div>