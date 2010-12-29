<div class="users index">
    <h2><?php __d('users', 'Users'); ?></h2>

    <div class="searchbox">
        <?php echo $this->Html->link(__('Search', true), '#' ); ?>
        <fieldset>
            <legend><?php __('Filter') ?></legend>
            <?php echo $this->Form->create($model, array('action' => 'index')); ?>
                <?php echo $this->Form->input('username', array('label' => __d('users', 'Username', true))); ?>
                <?php echo $this->Form->input('email', array('label' => __d('users', 'Email', true))); ?>
            <?php echo $this->Form->end(__d('users', 'Search', true)); ?>
        </fieldset>
    </div>

    <?php echo $this->element('paging'); ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo $paginator->sort('username'); ?></th>
                    <th><?php echo $paginator->sort('email'); ?></th>
                    <th><?php echo $paginator->sort('created'); ?></th>
                    <th><?php echo $paginator->sort('modified'); ?></th>
                    <th class="actions"><?php __d('users', 'Actions'); ?></th>
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
                <?php echo $user[$model]['username']; ?>
            </td>
            <td>
                <?php echo $user[$model]['email']; ?>
            </td>
            <td>
                <?php echo $user[$model]['created']; ?>
            </td>
            <td>
                <?php echo $user[$model]['modified']; ?>
            </td>
            <td class="actions">
                <?php echo $this->Html->link(__d('users', 'View', true), array('action' => 'view', $user[$model]['id'])); ?>
                <?php echo $this->Html->link(__d('users', 'Edit', true), array('action' => 'edit', $user[$model]['id'])); ?>
                <?php echo $this->Html->link(__d('users', 'Delete', true), array('action' => 'delete', $user[$model]['id']), null, sprintf(__d('users', 'Are you sure you want to delete # %s?', true), $user[$model]['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
