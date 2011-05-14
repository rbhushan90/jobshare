<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('BAHOGE jobshare: '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
	?>
	
	<style>
	#user_nav {
		width: 100%;
		text-align: right;
		}
	</style>
	
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			
			<div class="actions">
				<h3><?php __('Navigation'); ?></h3>
				<ul>
					<li><?php echo $this->Html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display', 'home'))?></li>
					<?php if ($admin || $manager || $logged_in) :?>
						
						<?php if ($admin) :?>
							<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index'));?></li>
							<li><?php echo $this->Html->link(__('List States', true), array('controller' => 'states', 'action' => 'index'));?></li>
							<li><?php echo $this->Html->link(__('List Prios', true), array('controller' => 'prios', 'action' => 'index')); ?> </li>
					 	<?php endif; ?>
					<li><?php echo $this->Html->link(__('List Tasks', true), array('controller' => 'mytasks', 'action' => 'index')); ?> </li>
					</ul>
					<?php else:?>
						<ul>
							<li><?php echo $html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
					<?php endif; ?>
				</ul>
			</div>
			
			<div id="user_nav">
				<?php if ($logged_in): ?>
				Angemeldet mit: <?php echo $users_username; ?> (
					<?php
						if ($admin){
							echo 'Administrator';
						}
						elseif ($manager){
							echo 'Manager';
						}
						else {
							echo 'User';
						}
					?>), 
					<?php echo $html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array(), 'Are you sure ?'); ?>
				<?php else: ?>
					You are not logged in!
				<?php echo $html->link('Register', array('controller' => 'users', 'action' => 'add')); ?>
				<?php echo $html->link('Login', array('controller' => 'users', 'action' => 'login')); ?>
				<?php endif; ?>
			</div>
			
			<?php echo $content_for_layout; ?>
			

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>