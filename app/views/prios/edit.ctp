<div class="prios form">
<?php echo $this->Form->create('Prio');?>
	<fieldset>
		<legend><?php __('Edit Prio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Prio.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Prio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Prios', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Mytasks', true), array('controller' => 'mytasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mytask', true), array('controller' => 'mytasks', 'action' => 'add')); ?> </li>
	</ul>
</div>