<div class="states view">
<h2><?php  __('State');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $state['State']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $state['State']['title']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit State', true), array('action' => 'edit', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete State', true), array('action' => 'delete', $state['State']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $state['State']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List States', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mytasks', true), array('controller' => 'mytasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mytask', true), array('controller' => 'mytasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Mytasks');?></h3>
	<?php if (!empty($state['Mytask'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Text'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Duedate'); ?></th>
		<th><?php __('Prio Id'); ?></th>
		<th><?php __('State Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($state['Mytask'] as $mytask):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $mytask['id'];?></td>
			<td><?php echo $mytask['user_id'];?></td>
			<td><?php echo $mytask['title'];?></td>
			<td><?php echo $mytask['text'];?></td>
			<td><?php echo $mytask['date'];?></td>
			<td><?php echo $mytask['duedate'];?></td>
			<td><?php echo $mytask['prio_id'];?></td>
			<td><?php echo $mytask['state_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'mytasks', 'action' => 'view', $mytask['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'mytasks', 'action' => 'edit', $mytask['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'mytasks', 'action' => 'delete', $mytask['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mytask['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mytask', true), array('controller' => 'mytasks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
