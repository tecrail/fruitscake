
<h2><?php __('Photo Galleries'); ?></h2>

<div class="wrapper">

    <ul class="photoGalleries indexList">
        <?php $i = 0;
        foreach ($photoGalleries as $photoGallery): ?>
            <li class="<?php echo ($i++ % 2 == 0) ? 'altrow' : ''; ?>">
            <?php
            $background_image = (isset($photoGallery['Photo'][0]['image']) && !empty($photoGallery['Photo'][0]['image'])) ? "/img/photos/thumb.{$photoGallery['Photo'][0]['image']}" : false;
            if ($background_image) {
                echo $this->Html->link("<span style='background-image: url({$background_image});'></span>",
                        array('action' => 'view', $photoGallery['PhotoGallery']['id']),
                        array(
                            'class' => 'image-link ',
                            'title' => $photoGallery['PhotoGallery']['title'],
                            'escape' => false
                        )
                );
            }
            ?>
            <?php echo $this->Html->link($photoGallery['PhotoGallery']['title'], array('controller' => 'photo_galleries', 'action' => 'view', $photoGallery['PhotoGallery']['id']), array('class' => 'title')) ?>

            <div class="abstract">
                <?php echo $photoGallery['PhotoGallery']['description'] ?>
            </div>
            <?php echo $this->Html->link("Vedi gallery &gt;", array('controller' => 'photo_galleries', 'action' => 'view', $photoGallery['PhotoGallery']['id']), array('escape' => false, 'class' => 'show_link')) ?>

                <div class="clear">&nbsp;</div>

            </li>
        <?php endforeach; ?>
    </ul>

</div>

<?php echo $this->element("paginator") ?>