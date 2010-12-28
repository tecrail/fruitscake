<div class="users view">
    <h2><?php __d('users', 'User'); ?></h2>
    
    <dl><?php $i = 0; $class = ' class="altrow"'; ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __d('users', 'Username'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>><?php echo $user[$model]['username']; ?>&nbsp;</dd>

        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __d('users', 'First Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>><?php echo $user[$model]['first_name']; ?>&nbsp;</dd>

        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __d('users', 'Last Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>><?php echo $user[$model]['last_name']; ?>&nbsp;</dd>

        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __d('users', 'Email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>><?php echo $user[$model]['email']; ?>&nbsp;</dd>

        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __d('users', 'Active'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>><?php echo $user[$model]['active']; ?>&nbsp;</dd>
        
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __d('users', 'Modified'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>><?php echo $user[$model]['modified']; ?>&nbsp;</dd>
    </dl>
</div>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__d('users', 'Edit User', true), array('action' => 'edit', $user[$model]['id'])); ?> </li>
        <li><?php echo $this->Html->link(__d('users', 'Delete User', true), array('action' => 'delete', $user[$model]['id']), null, sprintf(__d('users', 'Are you sure you want to delete # %s?', true), $user[$model]['id'])); ?> </li>
        <li><?php echo $this->Html->link(__d('users', 'List Users', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__d('users', 'New User', true), array('action' => 'add')); ?> </li>
    </ul>
</div>
