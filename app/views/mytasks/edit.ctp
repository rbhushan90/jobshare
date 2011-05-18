<div class="mytasks form">
<?php echo $this->Form->create('Mytask');?>
	<fieldset>
		<legend><?php __('Edit Mytask'); ?></legend>
	<?php
		echo $this->Form->input('id');
		if ($admin || $manager):
		echo $this->Form->input('user_id');
		endif;
		echo $this->Form->input('title', array('label' => 'Titel: '));
		echo $this->Form->input('text', array('label' => 'Details: '));
		//echo $this->Form->input('date', array('label' => 'Eröffnet am: '));
		echo $this->Form->input('duedate', array('label' => 'Erledigen bis: '));
		echo $this->Form->input('prio_id', array('label' => 'Priorität: ', 'default' => '2'));
		echo $this->Form->input('state_id', array('label' => 'Status: '));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php if ($admin || $manager): ?>
		<?php echo $this->Html->link(__('Löschen', true), array('action' => 'delete', $this->Form->value('Mytask.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Mytask.id'))); ?><?php endif;?></li>
		<li><?php echo $this->Html->link(__('Alle Tasks', true), array('action' => 'index'));?></li>
		<!-- <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prios', true), array('controller' => 'prios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prio', true), array('controller' => 'prios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States', true), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State', true), array('controller' => 'states', 'action' => 'add')); ?> </li> -->
	</ul>
</div>