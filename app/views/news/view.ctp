<h2>
    <?php echo $this->Html->link(__('News', true), array('controller' => 'news', 'action' => 'index')) ?> <strong>&gt; <?php echo $news['News']['title']; ?></strong>
    <div class="date">
        <?php echo $news['News']['date']; ?>
    </div>
</h2>

<div class="wrapper">
    <?php
        echo $this->Html->link(
                "<span style='background-image: url(/img/news/normal.{$news['News']['image']})'></span>",
                "/img/news/{$news['News']['image']}",
                array(
                    'rel'       => 'shadowbox',
                    'escape'    => false,
                    'style'     => "",
                    'class'     => "image-link",
                    'title'     => $news['News']['title']
                )
        );
    ?>

    <p class="abstract"><strong><?php echo $news['News']['short_description']; ?></strong></p>

    <?php echo $news['News']['description']; ?>

</div>


