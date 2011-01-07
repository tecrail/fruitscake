<div class="photoGalleries index">
    <h2><?php __('Photo Galleries'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('title'); ?></th>
            <th><?php echo $this->Paginator->sort('published'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($photoGalleries as $photoGallery):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $photoGallery['PhotoGallery']['id']; ?>&nbsp;</td>
                <td><?php echo $photoGallery['PhotoGallery']['title']; ?>&nbsp;</td>
                <td><?php echo $photoGallery['PhotoGallery']['published']; ?>&nbsp;</td>
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