<?php echo $this->Form->create("Admin", array("class" => "form-horizontal", "role"=>"form")); ?>
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
<div style="position:relative; top:20px;left:300px;">
		<?php
		echo $this->Form->button("作成",array('class' => "btn btn-success btn"));
		echo $this->Form->end();
		?>
</div>
<div style="position:relative; top:20px;left:310px;">
<?php
			if($this->data)
				echo $this->Html->link("レシートダウンロード", '/bill/ELS-UBT-'.$this->data['Admin']['month_year']['year'].'-'.$this->data['Admin']['month_year']['month'].'.tsv');

			?>
</div>
<?php if(isset($user)){ ?>
<!--
		<div style="position:relative; left: 0px; top:0px;">
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
			<p> Tong tien phai tra thang <?php echo $this->data['Admin']['month_year']['month'] ?> nam  <?php echo $this->data['Admin']['month_year']['year'] ?> cua he thong : <?php echo $j*20000 ?> VND</p>
			<?php } ?>
			
			<?php
			
				//echo $this->Html->link("download_bill", 'http://localhost/elearning/bill/'.$this->Session->read('username').'_'.$this->data['User']['year'].'_'.$this->data['User']['month'].'.tsv');

			?>

		</div>
<?php }  ?>

