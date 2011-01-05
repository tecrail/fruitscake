<div class="menus view">
    <h2><?php __('Menu'); ?></h2>
    <div>
        <dl><?php $i = 0;
$class = ' class="altrow"'; ?>
            <dt<?php if ($i % 2 == 0)
    echo $class; ?>><?php __('Parent Menu'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
<?php echo $this->Html->link($menu['ParentMenu']['name'], array('controller' => 'menus', 'action' => 'view', $menu['ParentMenu']['id'])); ?>
                &nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('User'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
                <?php echo $this->Html->link($menu['User']['id'], array('controller' => 'users', 'action' => 'view', $menu['User']['id'])); ?>
                &nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Name'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
<?php echo $menu['Menu']['name']; ?>
                &nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Description'); ?></dt>
            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
<?php echo $menu['Menu']['description']; ?>
                &nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Created'); ?></dt>
                            <dd<?php if ($i++ % 2 == 0)
                    echo $class; ?>>
<?php echo $menu['Menu']['created']; ?>
                                &nbsp;
                            </dd>
                        </dl>
                    </div>
                </div>
                
<?php echo $this->element('backend/left_navigator'); ?>
