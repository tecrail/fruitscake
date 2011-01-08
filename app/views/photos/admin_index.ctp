<div class="photos index">
    <h2><?php __('Photos'); ?></h2>

    <ul class="gallery-list">

        <?php foreach ($photos as $photo): ?>

            <?php echo $this->element("backend/photos/list_item", array('photo' => $photo)) ?>

        <?php endforeach; ?>

     </ul>

    <?php echo $this->element("backend/paging") ?>

        </div>
        <div class="actions">
            <h3><?php __('Actions'); ?></h3>
            <ul>
                <li><?php echo $this->Html->link(__('New Photo', true), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('List Photo Galleries', true), array('controller' => 'photo_galleries', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Photo Gallery', true), array('controller' => 'photo_galleries', 'action' => 'add')); ?> </li>
    </ul>
</div>