<div class="users index">
    
    <?php //echo $this->element('backend/search') ?>
    
    <h2><?php __('Users'); ?></h2>

    <?php // echo $this->element('paging'); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($users as $user):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class; ?>>
                <td>
                    <?php echo $this->Html->link($user[$model]['username'], array('action' => 'edit', $user[$model]['id']), array('class' => 'avatar-username')); ?>
                </td>
                <td>
                    <?php echo $user[$model]['email']; ?>
                </td>
                <td>
                    <?php echo $user[$model]['modified']; ?>
                </td>
                <td class="actions">
                    <?php echo $this->Backend->actionLink(__('View', true), array('action' => 'view', $user[$model]['id'])); ?>
                    <?php echo $this->Backend->actionLink(__('Edit', true), array('action' => 'edit', $user[$model]['id'])); ?>
                    <?php echo $this->Backend->actionLink(__('Delete', true), array('action' => 'delete', $user[$model]['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user[$model]['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>

    <?php echo $this->element('backend/paging'); ?>

            </div>

<?php echo $this->element("backend/left_navigator") ?>
