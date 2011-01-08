<div class="news index">
	<h2><?php __('News');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('slug');?></th>
			<th><?php echo $this->Paginator->sort('short_description');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('date_from');?></th>
			<th><?php echo $this->Paginator->sort('date_to');?></th>
			<th><?php echo $this->Paginator->sort('language_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($news as $news):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $news['News']['id']; ?>&nbsp;</td>
		<td><?php echo $news['News']['title']; ?>&nbsp;</td>
		<td><?php echo $news['News']['slug']; ?>&nbsp;</td>
		<td><?php echo $news['News']['short_description']; ?>&nbsp;</td>
		<td><?php echo $news['News']['description']; ?>&nbsp;</td>
		<td><?php echo $news['News']['published']; ?>&nbsp;</td>
		<td><?php echo $news['News']['date']; ?>&nbsp;</td>
		<td><?php echo $news['News']['date_from']; ?>&nbsp;</td>
		<td><?php echo $news['News']['date_to']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($news['Language']['title'], array('controller' => 'languages', 'action' => 'view', $news['Language']['id'])); ?>
		</td>
		<td><?php echo $news['News']['created']; ?>&nbsp;</td>
		<td><?php echo $news['News']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $news['News']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $news['News']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $news['News']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $news['News']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

        <?php echo $this->element("backend/paging") ?>

</div>


<?php echo $this->element("backend/left_navigator") ?>
