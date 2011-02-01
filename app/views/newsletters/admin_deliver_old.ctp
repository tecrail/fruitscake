<div class="newsletters view">
    <h2><?php  __('Newsletter:');?></h2>
    <dl><?php $i = 0; $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titolo (italiano)'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $newsletter['Newsletter']['title_it']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titolo (inglese)'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $newsletter['Newsletter']['title_en']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titolo (francese)'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $newsletter['Newsletter']['title_fr']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titolo (tedesco)'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $newsletter['Newsletter']['title_de']; ?>
            &nbsp;
        </dd>
    </dl>
    <fieldset>
        <legend><?php __('Seleziona le lingue di cui vuoi spedire la newsletter:');?></legend>
        <?php echo $form->create('Newsletter', array('url' => $html->here));?>

        <?php
            echo $form->select('languages', $languages, array(), array('multiple' => true), false);
        ?>
        <?php echo $form->end('Spedisci');?>
    </fieldset>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('Edit', true), array('action'=>'edit', $newsletter['Newsletter']['id'])); ?> </li>
        <li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $newsletter['Newsletter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $newsletter['Newsletter']['id'])); ?> </li>
        <li><?php echo $html->link(__('Elenco Newsletters', true), array('action'=>'index')); ?> </li>
        <li><?php echo $html->link(__('Nuova Newsletter', true), array('action'=>'add')); ?> </li>
    </ul>
</div>
