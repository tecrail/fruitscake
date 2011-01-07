<div class="photoGalleries view">
<h2><?php  __('Photo Gallery');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Photo Gallery', true), array('action' => 'edit', $photoGallery['PhotoGallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Photo Gallery', true), array('action' => 'delete', $photoGallery['PhotoGallery']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $photoGallery['PhotoGallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Photo Galleries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo Gallery', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos', true), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo', true), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Photos');?></h3>
	<?php if (!empty($photoGallery['Photo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Image'); ?></th>
		<th><?php __('Image Dir'); ?></th>
		<th><?php __('Image Mimetype'); ?></th>
		<th><?php __('Image Filesize'); ?></th>
		<th><?php __('Image Filename'); ?></th>
		<th><?php __('Photo Gallery Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($photoGallery['Photo'] as $photo):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $photo['id'];?></td>
			<td><?php echo $photo['title'];?></td>
			<td><?php echo $photo['description'];?></td>
			<td><?php echo $photo['published'];?></td>
			<td><?php echo $photo['image'];?></td>
			<td><?php echo $photo['image_dir'];?></td>
			<td><?php echo $photo['image_mimetype'];?></td>
			<td><?php echo $photo['image_filesize'];?></td>
			<td><?php echo $photo['image_filename'];?></td>
			<td><?php echo $photo['photo_gallery_id'];?></td>
			<td><?php echo $photo['created'];?></td>
			<td><?php echo $photo['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'photos', 'action' => 'view', $photo['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'photos', 'action' => 'edit', $photo['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'photos', 'action' => 'delete', $photo['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $photo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Photo', true), array('controller' => 'photos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
