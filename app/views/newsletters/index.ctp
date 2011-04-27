
<h2><?php __('Newsletter'); ?></h2>

<div class="wrapper">

    <ul class="pages_index">
        <?php
        $i = 0;
        foreach ($newsletters as $newsletter):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
        <li<?php echo $class; ?>>
            <?php
            echo $this->Html->link(
                    "{$newsletter['Newsletter']['title']} <span>visualizza &raquo;</span>",
                    array('controller' => 'newsletters', 'action' => 'view', $newsletter['Newsletter']['id']),
                    array('escape' => false, 'target' => '_blank')
            );
            ?>
        </li>
        <?php endforeach; ?>
    </ul>

</div>

<?php echo $this->element("paginator") ?>