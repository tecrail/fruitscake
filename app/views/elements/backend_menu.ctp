<?php if($this->params["action"] != 'admin_login'): ?>
<div id="modernbricksmenu">
    <ul>
        <?php //UTENTI ?>
        <li id="<?php echo ($this->params['controller'] == 'users' ? 'current' : '') ?>" style="margin-left: 1px"><?php echo $this->Html->link('Amministratori', array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?></li>
        <?php //NEWS ?>
        <li id="<?php echo ($this->params['controller'] == 'news' ? 'current' : '') ?>"><?php echo $this->Html->link('News', array('controller' => 'news', 'action' => 'index', 'admin' => true)) ?></li>
        <?php //CONFIGURAZIONI ?>
        <li id="<?php echo ($this->params['controller'] == 'configurations' ? 'current' : '') ?>"><?php echo $this->Html->link('Configurazioni', array('controller' => 'configurations', 'action' => 'index', 'admin' => true)) ?></li>
    </ul>
</div>
<div id="modernbricksmenuline">
    <ul style="margin-left:10px;">
    </ul>
</div>
<?php endif ?>