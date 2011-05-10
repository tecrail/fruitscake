
<h2>
<?php echo $this->Html->link(__('Photo Gallery', true), array('controller' => 'photo_galleries', 'action' => 'index')) ?><strong> &gt; <?php echo $photoGallery['PhotoGallery']['title']; ?></strong>
</h2>

<div class="wrapper">


    <p>
        <strong><?php echo $photoGallery['PhotoGallery']['description']; ?></strong>
    </p>

    <ul class="gallery-list">

        <?php foreach ($photos as $photo): ?>

        <li>
            <?php
                echo $this->Html->link(
                        "<span style='background-image: url(/img/photos/thumb.{$photo['Photo']['image']});'></span>",
                        "/img/photos/{$photo['Photo']['image']}",
                        array(
                            'escape'    => false,
                            'class'     => 'image-link',
                            'title'     => $photo['Photo']['title'],
                            'rel'       => "shadowbox[gallery]"
                        )
                );
            ?>
        </li>

        <?php endforeach; ?>

        <li class="clear">&nbsp;</li>

    </ul>

</div>

<?php echo $this->element("paginator") ?>