<div class="menus index">
    <h2><?php __('Menus'); ?></h2>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>
    </p>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('menu_id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($menus as $menu):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class; ?>>
                <td>
                <?php echo $this->Html->link($menu['ParentMenu']['name'], array('controller' => 'menus', 'action' => 'view', $menu['ParentMenu']['id'])); ?>
            </td>
            <td>
                <?php echo $menu['Menu']['name']; ?>
            </td>
            <td>
                <?php echo $menu['Menu']['description']; ?>
            </td>
            <td>
                <?php echo $menu['Menu']['created']; ?>
            </td>
            <td class="actions">
                <?php echo $this->Html->link(__('View', true), array('action' => 'view', $menu['Menu']['id'])); ?>
                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $menu['Menu']['id'])); ?>
                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $menu['Menu']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menu['Menu']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
            </table>
    <?php echo $this->element('paging'); ?>

            </div>

<?php echo $this->element('backend/left_navigator'); ?>
