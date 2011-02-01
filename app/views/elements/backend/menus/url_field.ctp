<?php $this->Html->script(array("backend/url_builder"), false) ?>
<?php echo $this->Form->input('url'); ?>
<fieldset class="urlBuilder">
    <legend><?php __("Url builder") ?></legend>
    <div class="urlBuilderBox">
        <h4><?php echo __("Content type selection") ?>:</h4>
        <ul id="avaliableModels" class="urlBuilderList">
            <?php foreach ($availableMenus as $modelName => $options): ?>
                <li><?php echo $this->Backend->actionLink(__($modelName, true), '#'); ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="clear">&nbsp;</div>
</fieldset>