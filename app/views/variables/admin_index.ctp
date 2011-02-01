<div class="variables index">
	<h2><?php __('Variables');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('key');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($variables as $variable):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $variable['Variable']['key']; ?>&nbsp;</td>
		<td><?php echo $variable['Variable']['value']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $variable['Variable']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

    <?php echo $this->element("backend/paging") ?>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php __('No actions available') ?></li>
	</ul>
</div>