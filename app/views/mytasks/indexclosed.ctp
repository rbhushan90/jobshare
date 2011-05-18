<div class="mytasks index">
	<h2><?php __('Geschlossene Tasks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('text');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('duedate');?></th>
			<th><?php echo $this->Paginator->sort('prio_id');?></th>
			<th><?php echo $this->Paginator->sort('state_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mytasks as $mytask):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mytask['Mytask']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mytask['User']['username'], array('controller' => 'users', 'action' => 'view', $mytask['User']['id'])); ?>
		</td>
		<td><?php echo $mytask['Mytask']['title']; ?>&nbsp;</td>
		<td><?php echo $mytask['Mytask']['text']; ?>&nbsp;</td>
		<td><?php echo $mytask['Mytask']['date']; ?>&nbsp;</td>
		<td><?php echo $mytask['Mytask']['duedate']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mytask['Prio']['title'], array('controller' => 'prios', 'action' => 'view', $mytask['Prio']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mytask['State']['title'], array('controller' => 'states', 'action' => 'view', $mytask['State']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mytask['Mytask']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mytask['Mytask']['id'])); ?>
			<?php if ($admin || $manager): ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mytask['Mytask']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mytask['Mytask']['id'])); ?>
			<?php endif;?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Task hinzufügen', true), array('action' => 'add')); ?></li>
		<!-- <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prios', true), array('controller' => 'prios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prio', true), array('controller' => 'prios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States', true), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State', true), array('controller' => 'states', 'action' => 'add')); ?> </li> -->
	</ul>
</div>