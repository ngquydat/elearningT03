<?php if(isset($report)){ ?>
<div class="report-violation">
	<div class="report-violation-content">
		<?php echo $report['reason']; ?>
	</div>
	<div style="position: absolute;top:87px; left:20px;">
		<?php echo $this->Html->image('line.png')?>
	</div>
</div>
<?php } ?>