<?php echo $this->element("sort"); ?>

<?php 
if(isset($Lectures)){
  foreach ($Lectures as $key => $Lecture) {
    echo $this->element("lecture_admin", array('Lecture' => $Lecture));
  }
}

?>

<?php echo $this->element("paging"); ?>
