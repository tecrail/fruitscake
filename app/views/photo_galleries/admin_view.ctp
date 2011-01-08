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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $photoGallery['PhotoGallery']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Backend->isActive($photoGallery['PhotoGallery']['published']); ?>
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

        <ul class="gallery-list">
	<?php foreach ($photoGallery['Photo'] as $photo): ?>

            <?php echo $this->element("backend/photos/list_item", array('photo' => array('Photo' => $photo, 'PhotoGallery' => $photoGallery['PhotoGallery']))) ?>

	<?php endforeach; ?>

            <li class="clear">&nbsp;</li>

        </ul>

<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Photo', true), array('controller' => 'photos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
