<div class="list-user-sort">並べる順番: 
	<?php
	if(isset($this->Paginator)){
		echo $this->Paginator->sort('Lecture.title','タイトル')." | ".$this->Paginator->sort('Lecture.create_time','時間');
	}
	?>
</div>

<?php 
if(isset($Lectures)){
	foreach ($Lectures as $key => $Lecture) {
		echo $this->element("lecture_search_tag", array('Lecture' => $Lecture));
	}
}
?>

<?php echo $this->element("paging"); ?>

