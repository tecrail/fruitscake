<div id="menu-container">
    <ul class="sf-menu">
        <li>
            <?php echo $this->Html->link(__('Navigation', true), array('controller' => 'menus', 'action' => 'index', 'admin' => true)) ?>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('Menus index', true), array('controller' => 'menus', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Menus add', true), array('controller' => 'menus', 'action' => 'add', 'admin' => true)) ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Pages index', true), array('controller' => 'pages', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Pages add', true), array('controller' => 'pages', 'action' => 'add', 'admin' => true)) ?>
                </li>
            </ul>
        </li>
        <li>
            <?php echo $this->Html->link(__('News', true), array('controller' => 'news', 'action' => 'index', 'admin' => true)) ?>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('News index', true), array('controller' => 'news', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('News add', true), array('controller' => 'news', 'action' => 'add', 'admin' => true)) ?>
                </li>
            </ul>
        </li>
        <li>
            <?php echo $this->Html->link(__('Photo gallery', true), array('controller' => 'photo_galleries', 'action' => 'index', 'admin' => true)) ?>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('Photo galleries index', true), array('controller' => 'photo_galleries', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Photo galleries add', true), array('controller' => 'photo_galleries', 'action' => 'add', 'admin' => true)) ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Photos index', true), array('controller' => 'photos', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Photos add', true), array('controller' => 'photos', 'action' => 'add', 'admin' => true)) ?>
                </li>
            </ul>
        </li>
        <li class="">
            <?php echo $this->Html->link(__('Newsletters', true), array('controller' => 'newsletters', 'action' => 'index', 'admin' => true)) ?>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('Newsletters index', true), array('controller' => 'newsletters', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Newsletters add', true), array('controller' => 'newsletters', 'action' => 'add', 'admin' => true)) ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Newsletter Users index', true), array('controller' => 'newsletter_users', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li class="">
                    <?php echo $this->Html->link(__('Newsletter Users add', true), array('controller' => 'newsletter_users', 'action' => 'add', 'admin' => true)) ?>
                </li>
            </ul>
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
        <li class="">
            <?php echo $this->Html->link(__('Configurations', true), array('controller' => 'variables', 'action' => 'index', 'admin' => true)) ?>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('Variables index', true), array('controller' => 'variables', 'action' => 'index', 'admin' => true)) ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Languages index', true), array('controller' => 'languages', 'action' => 'index', 'admin' => true)) ?>
                </li>
            </ul>
        </li>
    </ul>
    <div class="clear">&nbsp;</div>
</div>