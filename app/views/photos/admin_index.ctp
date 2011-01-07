<div class="photos index">
    <h2><?php __('Photos'); ?></h2>

    <ul class="gallery-list">

        <?php foreach ($photos as $photo): ?>

        <li class="<?php echo $photo['Photo']['published'] ? "published" : "unpublished" ?>">
            <div class="actions">
                <?php echo $this->Html->link(__('View', true), array('action' => 'view', $photo['Photo']['id'])) ?>
                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $photo['Photo']['id'])) ?>
                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $photo['Photo']['id'])) ?>
                <div class="clear">&nbsp;</div>
            </div>
            <div class="image">
                <div class="image-link-div">
                    <?php echo $this->Html->link(" ",
                        array('action' => 'edit', $photo['Photo']['id']),
                        array(
                            'style' => "background-image: url(/img/photos/thumb.{$photo['Photo']['image']});",
                            'class' => 'image-link',
                            'title' => $photo['Photo']['title']
                            )
                    ) ?>
                </div>
            </div>
            <div class="gallery">
                <?php echo $this->Html->link($photo['PhotoGallery']['title'], array('action' => 'edit', $photo['Photo']['photo_gallery_id'])) ?>
            </div>
            <div class="title">
                <?php echo $this->Html->link($photo['Photo']['title'], array('action' => 'edit', $photo['Photo']['id'])) ?>
            </div>
        </li>

        <?php endforeach; ?>

     </ul>

    <?php echo $this->element("backend/paging") ?>

        </div>
        <div class="actions">
            <h3><?php __('Actions'); ?></h3>
            <ul>
                <li><?php echo $this->Html->link(__('New Photo', true), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('List Photo Galleries', true), array('controller' => 'photo_galleries', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Photo Gallery', true), array('controller' => 'photo_galleries', 'action' => 'add')); ?> </li>
    </ul>
</div>