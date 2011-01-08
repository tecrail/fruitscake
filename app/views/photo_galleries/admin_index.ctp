<div class="photoGalleries index">
    <h2><?php __('Photo Galleries'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="2"><?php echo $this->Paginator->sort('title'); ?></th>
            <th><?php echo $this->Paginator->sort('published'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($photoGalleries as $photoGallery):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' altrow';
            }
        ?>
            <tr class="<?php echo $class; ?> index-image-tr">
                <td>
                    <div class="index-image-link">
                    <?php
                        echo $this->Html->link(" ",
                                array('action' => 'view', $photoGallery['PhotoGallery']['id']),
                                array(
                                    'style' => "background-image: url(/img/photos/thumb.{$photoGallery['Photo'][0]['image']});",
                                    'class' => 'image-link ' . $photoGallery['PhotoGallery']['published'] ? "published" : "unpublished",
                                    'title' => $photoGallery['PhotoGallery']['title']
                                )
                        )
                    ?>
                    </div>
                </td>
                <td><?php echo $photoGallery['PhotoGallery']['title']; ?>&nbsp;</td>
                <td style="text-align: center;"><?php echo $this->Backend->isActive($photoGallery['PhotoGallery']['published']); ?>&nbsp;</td>
                <td><?php echo $photoGallery['PhotoGallery']['modified']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $photoGallery['PhotoGallery']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $photoGallery['PhotoGallery']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $photoGallery['PhotoGallery']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $photoGallery['PhotoGallery']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
                </table>

    <?php echo $this->element("backend/paging") ?>
                </div>
                <div class="actions">
                    <h3><?php __('Actions'); ?></h3>
                    <ul>
                        <li><?php echo $this->Html->link(__('New Photo Gallery', true), array('action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('List Photos', true), array('controller' => 'photos', 'action' => 'index')); ?> </li>
                        <li><?php echo $this->Html->link(__('New Photo', true), array('controller' => 'photos', 'action' => 'add')); ?> </li>
    </ul>
</div>