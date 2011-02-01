<div class="languages index">
	<h2><?php __('Languages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('locale');?></th>
			<th><?php echo $this->Paginator->sort('slug');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($languages as $language):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $language['Language']['id']; ?>&nbsp;</td>
		<td><?php echo $language['Language']['title']; ?>&nbsp;</td>
		<td><?php echo $language['Language']['locale']; ?>&nbsp;</td>
		<td><?php echo $language['Language']['slug']; ?>&nbsp;</td>
		<td><?php echo $language['Language']['published']; ?>&nbsp;</td>
		<td><?php echo $language['Language']['created']; ?>&nbsp;</td>
		<td><?php echo $language['Language']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $language['Language']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $language['Language']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $language['Language']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $language['Language']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>


    <?php echo $this->element("backend/paging") ?>

        
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Language', true), array('action' => 'add')); ?></li>
	</ul>
</div>