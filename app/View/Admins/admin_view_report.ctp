<div>
	<?pHp  echo $this->element("list_admin_manage_lecture");
	?>

</div>

<div class="content_2">
	<div>
		<?pHp foreach ($Lectures as $key => $Lecture) { 
		echo $this->element("lecture_admin", array('Lecture' => $Lecture));
	
	echo count($Lecture['Report']);
		foreach ($Lecture['Report'] as $key => $report) {
			echo $this->element("report_violation", array('report' => $report));
		}
	} 
	?>

</div>

</div>
