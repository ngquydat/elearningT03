
<!-- FORM INPUT-->

<div class="form-input">
	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="box-input">
				<div class="col-sm-10">
					<?pHp echo $this->Form->input("hoang",array("class"=>"form-control", "id"=>"inputEmail3","type"=>"email","label"=>""))?>
					<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
				</div>
			</div>
		</div>
	</form>	
</div>








<!-- Neu muon to hop inbox thi cop "<textarea class="form-control" rows="5"></textarea>" thay cho 
"<input type="email" class="form-control" id="inputEmail3" placeholder="Email">"

- Khi hop inbox to len thi nho thay <div class="form-input"> thanh "<div class="form-input" style="height:120px;>"
de can doi vs form



<!--LECTURE-->

<div class="lecture">
	<div class="lecture-title">
		<?php

		echo $this->Html->link("IT Nihongo",
			array('controller' => "students", "action"=>"view"),
			array("escape"=>false)
			);
			?>
			</div>
		<div class="lecture-date">
			03/03/2014
		</div>
		<div class="lecture-button1">
			<?php

			echo $this->Html->link(
				$this->Form->button('みる',array('class' => "btn btn-success btn-sm")),
				array('controller' => "students", "action"=>"view"),
				array("escape"=>false)
				);
				?>
			</div>

			<div class="lecture-button2">
				<?php

				echo $this->Html->link(
					$this->Form->button('削除',array('class' => "btn btn-success btn-sm")),
					array('controller' => "students", "action"=>"view"),
					array("escape"=>false)
					);
					?>


				</div>
				<div class="lecture-description"><p>Gioi thieu gio hoc</p>

				</div>
				<div class="lecture-vote">
					
					<?pHp
					echo $this->Html->div(array("class"=>"vote"));
					echo $this->Html->image('vote_author.png');
					echo $this->Html->div(array("class"=>"like"),$this->Html->link($this->Html->image('like.png'),array('controller' => 'students','action' => 'view'),
						array('escape' =>false )));
					echo $this->Html->para(null,"12345いいね",array("class"=>"p"))

					?>
				</div>
			</div>
			<div class="lecture-author">
				<?pHp
				echo $this->Html->div(array("class"=>"vote"));
				echo $this->Html->image('vote_author.png');
				echo $this->Html->div(array("class"=>"author"),$this->Html->link("hoang123",array('controller' => "students", "action"=>"view"),
					array("escape"=>false)));
				echo $this->Html->para(null,"筆者：",array("class"=>"p"))

				?>
			</div>
		</div>
	</div>




<!--CHECKBOX-->

	<div class="checkbox">
		<label>
			<input type="checkbox"> 
		</label>
	</div>

<div class="lecture-author">
				<?pHp
				echo $this->Html->div(array("class"=>"vote"));
				echo $this->Html->image('vote_author.png');
				echo $this->Html->div(array("class"=>"author"),$this->Html->link("hoang123",array('controller' => "students", "action"=>"view"),
					array("escape"=>false)));
				echo $this->Html->para(null,"筆者：",array("class"=>"p"))

				?>
			</div>





