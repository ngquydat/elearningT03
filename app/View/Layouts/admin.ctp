<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('cake.generic');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('styles');

	?>
</head>
<body>

	<div id="container">
		<!--Header-->
		<div id="header">
			<?php echo $this->element("info_header");?>
			<div class="banner" ><?php echo $this->Html->image('banner.jpg');?></div>
			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<!--Navbar-->
		<div id="navbar">
			<?php echo $this->Html->image('bg_head_3.png');?>

			
			<nav>
				<ul class="fancyNav">
					<li id="home">
						<?php
						echo $this->Html->link('ホーム'
							,
							array('controller' => 'admins','action' => 'home'),array("class"=>"homeIcon"));

							?>
						</li>
						<li id="news">
							<?php
							echo $this->Html->link('授業管理'
								,
								array('controller' => 'admins','action' => 'lecture_manage'));

								?>
							</li>
							<li id="about">
								<?php
								echo $this->Html->link('課金情報管理'
									,
									array('controller' => 'admins','action' => 'salary'));

									?>
								</li>
								<li id="services">
									<?php
									echo $this->Html->link('システム'
										,
										array('controller' => 'systems','action' => 'change_system_coefficient',1));

										?>
									</li>
								</ul>
							</nav>
						</div>  	

						<div id="message">
							<?php echo $this->Session->flash(); ?>
						</div>
						<!--Content-->
						<div id="content_1">			
							<?php echo $this->fetch('content'); ?>
						</div>

						<!--Footer-->
						<div id="footer">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			*/?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	
</body>
</html>
