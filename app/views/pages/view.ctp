
<h2><?php echo $page['Page']['title']; ?></h2>

<?php
    echo $this->Html->link(
            "<span style='background-image: url(/img/pages/normal.{$page['Page']['image']})'></span>",
            "/img/pages/{$page['Page']['image']}",
            array(
                'rel'       => 'shadowbox',
                'escape'    => false,
                'style'     => "",
                'class'     => "image-link",
                'title'     => $page['Page']['title']
            )
    );
?>
<div class="content_description">
    <?php echo $page['Page']['description']; ?>
</div>