<div class="newsletters form">
    <?php echo $this->Form->create('Newsletter', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Modifica Newsletter'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('language_id');
        echo $this->Form->input('title', array('label' => 'Titolo'));
        ?>

        <?php echo $this->Backend->htmlEditor('description_html', array('label' => 'Descrizione [HTML]')); ?>
        <?php //echo $this->Form->input('description_text', array('label' => 'Descrizione [TEXT]')); ?>

        <?php
//        echo $this->Backend->fileInput('attachment', array('label' => 'Seleziona un file'), (bool) $this->data['Newsletter']['attachment'], array('path' => $this->Html->url('/files/attachments/' . $this->data['Newsletter']['attachment'])), (bool) $this->data['Newsletter']['attachment']);
        echo $this->Backend->fileInput('attachment', empty($this->data['Newsletter']['attachment']) ? array() : array(
                    'preview' => array("url" => "/files/attachments/" . $this->data['Newsletter']['attachment']),
                    'delete' => true
                        ));
        echo $this->Form->input('user_id', array('type' => 'hidden'));
        echo $this->Form->input('send_newsletter', array('label' => 'Salva ed invia la newsletter', 'type' => 'checkbox'));
        ?>
    </fieldset>
    <?php echo $this->Form->end('Salva'); ?>
    </div>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Newsletter.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Newsletter.id'))); ?></li>
            <li><?php echo $this->Html->link(__('Elenco Newsletters', true), array('action' => 'index')); ?></li>
    </ul>
</div>
