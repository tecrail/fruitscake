
<h2><?php __('Pages'); ?></h2>

<div class="wrapper">

    <ul class="pages_index">
        <?php
        $i = 0;
        foreach ($pages as $page):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
        <li<?php echo $class; ?>>
            <?php
            echo $this->Html->link(
                    "{$page['Page']['title']} <span>visualizza &raquo;</span>",
                    array('controller' => 'pages', 'action' => 'view', $page['Page']['id']),
                    array('escape' => false)
            );
            ?>
        </li>
        <?php endforeach; ?>
    </ul>

</div>

<?php echo $this->element("paginator") ?>