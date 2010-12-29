<div id="menu-container">
    <ul class="sf-menu">
        <li>
            <?php echo $this->Html->link(__('Dashboard', true), array('controller' => 'users', 'action' => 'dashboard', 'admin' => true)) ?>
        </li>
        <li class="">
            <?php echo $this->Html->link(__('Users', true), array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('Users index', true), array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Users add', true), array('controller' => 'users', 'action' => 'add', 'admin' => true)) ?>
                </li>
            </ul>
        </li>
        <li>
            <?php echo $this->Html->link(__('Navigation', true), '#') ?>
                </li>
                <li class="">
            <?php echo $this->Html->link(__('Pages', true), '#') ?>
                    <ul>
                        <li>
                    <?php echo $this->Html->link(__('Pages index', true), '#') ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Pages add', true), '#') ?>
                </li>
            </ul>
        </li>
    </ul>
    <div class="clear">&nbsp;</div>
</div>