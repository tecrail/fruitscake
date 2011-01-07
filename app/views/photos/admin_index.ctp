<div class="photos index">
	<h2><?php __('Photos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('image');?></th>
			<th><?php echo $this->Paginator->sort('image_dir');?></th>
			<th><?php echo $this->Paginator->sort('image_mimetype');?></th>
			<th><?php echo $this->Paginator->sort('image_filesize');?></th>
			<th><?php echo $this->Paginator->sort('image_filename');?></th>
			<th><?php echo $this->Paginator->sort('photo_gallery_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($photos as $photo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $photo['Photo']['id']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['title']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['description']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['published']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['image']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['image_dir']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['image_mimetype']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['image_filesize']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['image_filename']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($photo['PhotoGallery']['title'], array('controller' => 'photo_galleries', 'action' => 'view', $photo['PhotoGallery']['id'])); ?>
		</td>
		<td><?php echo $photo['Photo']['created']; ?>&nbsp;</td>
		<td><?php echo $photo['Photo']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $photo['Photo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $photo['Photo']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $photo['Photo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $photo['Photo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Photo', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Photo Galleries', true), array('controller' => 'photo_galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo Gallery', true), array('controller' => 'photo_galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>