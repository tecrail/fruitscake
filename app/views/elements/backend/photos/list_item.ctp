<li class="<?php echo $photo['Photo']['published'] ? "published" : "unpublished" ?>">
    <div class="actions">
        <?php // echo $this->Html->link(__('View', true), array('controller' => 'photos', 'action' => 'view', $photo['Photo']['id'])) ?>
        <div class="left"> <?php echo $this->Html->link(__('Edit', true), array('controller' => 'photos', 'action' => 'edit', $photo['Photo']['id'])) ?></div>
        <div class="right"><?php echo $this->Html->link(__('Delete', true), array('controller' => 'photos', 'action' => 'delete', $photo['Photo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $photo['Photo']['id'])) ?></div>
        <div class="clear">&nbsp;</div>
    </div>
    <div class="image">
        <div class="image-link-div">
            <?php
            echo $this->Html->link(" ",
                    array('controller' => 'photos', 'action' => 'view', $photo['Photo']['id']),
                    array(
                        'style' => "background-image: url(/img/photos/thumb.{$photo['Photo']['image']});",
                        'class' => 'image-link',
                        'title' => $photo['Photo']['title']
                    )
            )
            ?>
        </div>
    </div>
    <div class="gallery">
        <?php echo $this->Html->link($photo['PhotoGallery']['title'], array('controller' => 'photo_galleries', 'action' => 'edit', $photo['Photo']['photo_gallery_id'])) ?>
    </div>
    <div class="title">
        <?php echo $this->Html->link($photo['Photo']['title'], array('controller' => 'photos', 'action' => 'edit', $photo['Photo']['id'])) ?>
    </div>
</li>