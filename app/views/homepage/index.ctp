
<h2><?php echo $page['Page']['title']; ?></h2>

<?php
    echo $this->Html->link(
            $this->Html->image("pages/page.{$page['Page']['image']}"),
            "/img/pages/{$page['Page']['image']}",
            array(
                'rel'       => 'shadowbox',
                'escape'    => false,
                'style'     => "",
                'class'     => "normal-image-link",
                'title'     => $page['Page']['title']
            )
    );
?>
<div class="content_description">
    <?php echo $page['Page']['description']; ?>
</div>