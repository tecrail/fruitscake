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
                        echo $class; ?>><?php __('Url'); ?></dt>
                <dd<?php if ($i++ % 2 == 0)
                        echo $class; ?>>
                    <?php echo $menu['Menu']['url']; ?>
                &nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0)
                        echo $class; ?>><?php __('Target'); ?></dt>
                <dd<?php if ($i++ % 2 == 0)
                        echo $class; ?>>
                    <?php echo $menu['Menu']['target']; ?>
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
