<div class="form-input">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">テスト</label>
						<div class="box-input">
							<div class="col-sm-10">
								<?pHp echo $this->Form->input("hoang",array("class"=>"form-control", "id"=>"inputEmail3","type"=>"email","label"=>""))?>
								<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
							</div>
						</div>
					</div>
				</form>	
				<div class="upload-document-test-button1">
					<?php

					echo $this->Html->link(
						$this->Form->button('追加',array('class' => "btn btn-success btn-sm")),
						array('controller' => "students", "action"=>"view"),
						array("escape"=>false)
						);
						?>

					</div>
					<div class="upload-document-test-button2">
						<?php

						echo $this->Html->link(
							$this->Form->button('削除',array('class' => "btn btn-danger btn-sm")),
							array('controller' => "students", "action"=>"view"),
							array("escape"=>false)
							);
							?>
					</div>
</div>



