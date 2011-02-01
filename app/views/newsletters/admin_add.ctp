<div class="newsletters form">
    <?php echo $this->Form->create('Newsletter', array('type' => 'file'));?>
    <fieldset>
        <legend><?php __('Scrivi Newsletter');?></legend>
        <?php
            echo $this->Form->input('language_id');
            echo $this->Form->input('title', array('label' => 'Titolo'));
        ?>

        <?php echo $this->Backend->htmlEditor('description_html', array('label' => 'Descrizione [HTML]')); ?>
        <?php //echo $this->Form->input('description_text', array('label' => 'Descrizione [TEXT]')); ?>
        
        <?php
            echo $this->Backend->fileInput('attachment', array('label' => 'Seleziona un file'));
            echo $this->Form->input('user_id', array('type' => 'hidden'));
            echo $this->Form->input('send_newsletter', array('label' => 'Salva ed invia la newsletter', 'type' => 'checkbox'));
        ?>
    </fieldset>
    <?php echo $this->Form->end('Salva');?>
</div>


<?php echo $this->element("backend/left_navigator") ?>
