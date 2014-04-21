	<div> 
		<?php
		echo $this->element("list_change_profile");
		?>

	</div>


	<div class="content_2">
		<?php  if($this->Session->read('role') == 'student'){ ?>
		<?php echo $this->Form->create("User", array("class" => "form-horizontal", "role"=>"form")); ?>

		<div class="form-input">	
			<div class="form-group">
				<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">月を選ぶ</label>
				<div class="box-input">
					<div class="col-sm-10" style="position:relative; top:20px;">
						<?php
						echo $this->Form->input('month_year', 
							array(
								'type' => 'date',
								'label' => '',
								'dateFormat' => 'MY',
								'empty' => array(
									'month' => '月',
									'year'  => '年'
									),
								'minYear' => date('Y')-130,
								'maxYear' => date('Y'),
								'options' => array('1','2')
								)
							);
							?>
							<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
						</div>
					</div>
				</div>
			</div>

			<div style="position:relative; left: 300px; top:10px;">

				<?php echo $this->Form->end("更新"); ?>
			</div>
			<?php if(isset($user)){ ?>
			<div style="position:absolute; left: 0px; top:180px;">
				<table class="table table-bordered">
					<tr>
						<td class="info" style="width:50px;">STT</td>
						<td class="info" style="width:150px;">HVT giao vien</td>
						<td class="info" style="width:250px;">Lec</td>
						<td class="info" style="width:150px;">Ngay tao</td>
						<td class="info" style="width:150px;">Ngay hoc</td>				
					</tr>
					<?php  $j=0; foreach ($user as $key => $user){ $j++ ?>

					<tr>
						<td class="warning" style="width:50px;"><?php echo $j ?></td>
						<td class="warning"><?php echo $user['Lecture']['User']['username'] ?></td>
						<td class="warning"><?php echo $user['Lecture']['title'] ?></td>
						<td class="warning"><?php echo $user['Lecture']['create_time'] ?></td>
						<td class="warning"><?php echo $user['Studentlearnlecture']['time'] ?></td>
					</tr>
					<?php } ?>
				</table>
				<?php  if(!$this->data){ 
				} 
				else { ?>
				<p> Tong tien phai tra thang <?php echo $this->data['User']['month_year']['month'] ?> nam  <?php echo $this->data['User']['month_year']['year'] ?> cua sinh vien <?php echo $this->Session->read('username') ?>: <?php echo $j*20000 ?> VND</p>
				<?php } ?>

				<?php

				echo $this->Html->link("download_bill", '/bill/'.$this->Session->read('username').'_'.$this->data['User']['month_year']['year'].'_'.$this->data['User']['month_year']['month'].'.tsv');

				?>

			</div>
			<?php } } ?>

			<?php  if($this->Session->read('role') == 'teacher'){ ?>
			<?php echo $this->Form->create("User", array("class" => "form-horizontal", "role"=>"form")); ?>

			<div class="form-input">	
				<div class="form-group">
					<label class="text-input" for="inputEmail3" class="col-sm-2 control-label">月を選ぶ</label>
					<div class="box-input">
						<div class="col-sm-10" style="position:relative; top:20px;">
							<?php
							echo $this->Form->input('month_year', 
								array(
									'type' => 'date',
									'label' => '',
									'dateFormat' => 'MY',
									'empty' => array(
										'month' => 'Month',
										'year'  => 'Year'
										),
									'minYear' => date('Y')-130,
									'maxYear' => date('Y'),
									'options' => array('1','2')
									)
								);
								?>
								<!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
							</div>
						</div>
					</div>
				</div>
				<div style="position:relative; left: 302px; top:20px;">

					<?php echo $this->Form->button("更新",array('class' => "btn btn-success btn"));
					echo $this->Form->end(); ?>
				</div>
				
				<?php if(isset($user)){ ?>
				<div style="position:absolute; left: 0px; top:180px;">
					<table class="table table-bordered">
						<tr>
							<td class="info" style="width:50px;">STT</td>
							<td class="info" style="width:150px;">HVT hoc sinh</td>
							<td class="info" style="width:250px;">Lec</td>
							<td class="info" style="width:150px;">Ngay tao</td>
							<td class="info" style="width:150px;">Ngay hoc</td>				
						</tr>

						<?php  $j=0; 

						foreach ($user as $key => $user){ $j++ ?>

						<tr>
							<td class="warning" style="width:50px;"><?php echo $j ?></td>
							<td class="warning"><?php echo $user['User']['username'] ?></td>
							<td class="warning"><?php echo $user['Lecture']['title'] ?></td>
							<td class="warning"><?php echo $user['Lecture']['create_time'] ?></td>
							<td class="warning"><?php echo $user['Studentlearnlecture']['time'] ?></td>
						</tr>
						<?php } ?>

					</table>
					<?php  if(!$this->data){ 
					} 
					else { ?>
					<p> Tong tien nhan duoc thang <?php echo $this->data['User']['month_year']['month'] ?> nam  <?php echo $this->data['User']['month_year']['year'] ?> cua giao vien <?php echo $this->Session->read('username') ?>: <?php echo $j*20000*0.4 ?> VND</p>
					<?php } ?>
					<?php

					echo $this->Html->link("download_bill", '/bill/'.$this->Session->read('username').'_'.$this->data['User']['month_year']['year'].'_'.$this->data['User']['month_year']['month'].'.tsv');

					?>

				</div>
				<?php } 
			}?>
		</div>


		<?php //pr($user);?>
