<style type="text/css">
.test
{
  position: relative;
  left:200px;
  top: 100px;
}


</style>

<div class="test"><p>Hoang</p>
</div>


<p>Hoang2</p>
<?php
echo $this->Html->link(
    $this->Html->image("bg_tile.jpg"),
   	array('controller' => 'students','action' => 'view'),
	array('escape' =>false ));

?>

<?php

echo $this->Html->link(
	$this->Form->button('Hoang',array('class' => "btn btn-success btn-sm")),
 	array('controller' => "students", "action"=>"view"),
 	array("escape"=>false)
		);
echo $this->Html->div(array("class"=>"col-xs-5"),
			$this->Form->input("username",array("class"=>"form-control")));
?>
    

<div >
  <button type="button" class="btn btn-default">Left</button>
  <button type="button" class="btn btn-default">Middle</button>
  <button type="button" class="btn btn-default">Right</button>
</div>

<div class="btn-group">
  <button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
    Dropdown
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
    <li role="presentation" class="divider"></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
  </ul>
  </div>
