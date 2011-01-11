<div class="news index">
    <h2><?php __('News'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('title'); ?></th>
            <th><?php echo $this->Paginator->sort('published'); ?></th>
            <th><?php echo $this->Paginator->sort('date'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($news as $news):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $news['News']['title']; ?>&nbsp;</td>
                <td class="published"><?php echo $this->Backend->isActive($news['News']['published']); ?>&nbsp;</td>
                <td><?php echo $news['News']['date']; ?>&nbsp;</td>
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
