<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Registrieren'); ?></legend>
		Ihr Benutzer muss nach der Registrierung zuerst von einem Manager oder Administrator freigeschaltet werden.
		<?php echo $session->flash('auth'); ?>
	<?php
		echo $this->Form->input('lastname', array('label' => 'Nachname'));
		echo $this->Form->input('surname', array('label' => 'Vorname'));
		echo $this->Form->input('username', array('label' => 'Email'));
		echo $this->Form->input('password', array('label' => 'Passwort'));
	?>
	
	<?php if ($admin) :?>
		<?php echo $this->Form->input('group_id'); ?>
	<?php endif; ?>	
		
	</fieldset>
<?php echo $this->Form->end(__('Anmeldung', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Startseite', true), array('controller' => 'users', 'action' => 'login')); ?></li>
<!-- 		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mytasks', true), array('controller' => 'mytasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mytask', true), array('controller' => 'mytasks', 'action' => 'add')); ?> </li> -->
	</ul>
</div>