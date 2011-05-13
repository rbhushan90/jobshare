<div class="user_form">
	<fieldset>
	<legend><?php __('Login'); ?></legend>
	Benutzername und Passwort eingeben
	<?php echo $session->flash('auth'); ?>
	<?
	echo $this->Form->create('User', array('action' => 'login'));
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->end('Login');
	?>	
	</fieldset>
</div>