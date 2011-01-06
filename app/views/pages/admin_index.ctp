<div class="pages index">
    <h2><?php __('Pages'); ?></h2>
    
    <?php echo $this->element('backend/search') ?>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('title'); ?></th>
            <th><?php echo $this->Paginator->sort('published'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($pages as $page):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $page['Page']['id']; ?>&nbsp;</td>
                <td><?php echo $page['Page']['title']; ?>&nbsp;</td>
                <td><?php echo $page['Page']['published']; ?>&nbsp;</td>
                <td><?php echo $page['Page']['created']; ?>&nbsp;</td>
                <td><?php echo $page['Page']['modified']; ?>&nbsp;</td>
                <td class="actions">
                <?php echo $this->Html->link(__('View', true), array('action' => 'view', $page['Page']['id'])); ?>
                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $page['Page']['id'])); ?>
                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $page['Page']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $page['Page']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php echo $this->element('backend/paging'); ?>

</div>

<?php echo $this->element('backend/left_navigator'); ?>
