<div class="newsletters form">
    <?php echo $form->create('Newsletter', array('type' => 'file'));?>
    <fieldset>
        <legend><?php __('Modifica Newsletter');?></legend>
        <?php
            echo $form->input('id');
            echo $form->input('language_id');
            echo $form->input('title', array('label' => 'Titolo'));
        ?>

        <?php echo $tinymce->input('description_html', array('label' => 'Descrizione [HTML]')); ?>
        <?php //echo $form->input('description_text', array('label' => 'Descrizione [TEXT]')); ?>

        <?php
            echo $myApp->fileInput('attachment', array('label' => 'Seleziona un file'), (bool)$this->data['Newsletter']['attachment'], array('path' => $html->url('/files/attachments/'.$this->data['Newsletter']['attachment'])), (bool)$this->data['Newsletter']['attachment']);
            echo $form->input('user_id', array('type' => 'hidden'));
            echo $form->input('send_newsletter', array('label' => 'Salva ed invia la newsletter', 'type' => 'checkbox'));
        ?>
    </fieldset>
    <?php echo $form->end('Salva');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Newsletter.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Newsletter.id'))); ?></li>
        <li><?php echo $html->link(__('Elenco Newsletters', true), array('action'=>'index'));?></li>
    </ul>
</div>
