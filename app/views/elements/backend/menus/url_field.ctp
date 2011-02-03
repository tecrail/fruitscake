<?php $this->Html->script(array("backend/url_builder"), false) ?>
<?php echo $this->Form->input('url', array('id' => 'url_builder_input_field')); ?>

<div id="urlBuilderContainer">

    <fieldset class="urlBuilder">
        <legend><?php __("Url builder") ?></legend>

        <div class="overlay">
            <?php echo $this->Html->link($this->Html->image("backend/close.png"), '#', array('class' => 'close_url_builder', 'escape' => false, 'title' => __('close', true))); ?>
            <div id="urlBuilderSpinner"></div>
        </div>

        <div class="urlBuilderBox">
            <div id="urlBuilderModelsBox" class="box">
                <h4><?php echo __("Content type selection") ?>:</h4>
                <ul id="avaliableModels" class="urlBuilderList"></ul>
            </div>
        </div>

        <div class="urlBuilderBox">
            <div id="urlBuilderModelActionsBox" class="box">
                <h4><?php echo __("Content type selection") ?>:</h4>
                <ul id="avaliableModels" class="urlBuilderList"></ul>
            </div>
        </div>

        <div class="urlBuilderBox">
            <div id="urlBuilderModelValuesBox" class="box">
                <h4><?php echo __("Content type selection") ?>:</h4>
                <ul id="avaliableModels" class="urlBuilderList"></ul>
            </div>
        </div>
        
        <div class="clear">&nbsp;</div>
    </fieldset>

</div>
