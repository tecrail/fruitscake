<?php if (isset($presetVars) && $presetVars): ?>
    <div class="searchbox">
    <?php echo $this->Html->link(__('Search', true), '#search', array('class' => 'search-link')); ?>
    <div class="clear">&nbsp;</div>
    <fieldset class="search-fieldset">
        <legend><?php __('Filter') ?></legend>
        <?php echo $this->Form->create($model, array('url' => array_merge(array('action' => 'find', 'admin' => true), $this->params['pass']))); ?>

        <?php foreach ($presetVars as $var): ?>

        <?php echo $this->Form->input($var['field'], array('label' => isset($var['label']) ? __($var['label'], true) : __(Inflector::humanize($var['field']), true))); ?>

        <?php endforeach ?>

        <?php echo $this->Form->end(__d('users', 'Search', true)); ?>
        </fieldset>
    </div>
<?php endif ?>