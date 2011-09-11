
<h2><?php __('News'); ?></h2>

<div class="wrapper">

    <ul class="news indexList">
        <?php $i = 0;
        foreach ($news as $news_item): ?>
            <li class="<?php echo ($i++ % 2 == 0) ? 'altrow' : ''; ?>">
                
                <?php
                $background_image = isset($news_item['News']['image']) && !empty($news_item['News']['image']) ? "/img/news/thumb.{$news_item['News']['image']}" : false;
                if ($background_image) {
                    echo $this->Html->link("<span style='background-image: url({$background_image});'></span>",
                            array('action' => 'view', $news_item['News']['id']),
                            array(
                                'class' => 'image-link',
                                'title' => $news_item['News']['title'],
                                'escape' => false
                            )
                    );
                }
                ?>
                <?php 
                echo $this->Html->link(
                        "<div class='date'>" . $this->Frontend->l10n_date($news_item['News']['date']) . "</div>{$news_item['News']['title']}",
                        array('controller' => 'news', 'action' => 'view', $news_item['News']['id']),
                        array('escape' => false, 'class' => 'title')
                );
                ?>

                <div class="abstract">
                    <?php echo $news_item['News']['short_description'] ?>
                </div>
                <?php echo $this->Html->link("Leggi tutto &gt;", array('controller' => 'news', 'action' => 'view', $news_item['News']['id']), array('escape' => false, 'class' => 'show_link')) ?>

                <div class="clear">&nbsp;</div>

            </li>
        <?php endforeach; ?>
    </ul>

</div>

<?php echo $this->element("paginator") ?>
