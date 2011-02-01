<div class="newsletterUsers view">
<h2><?php  __('Iscritto Newsletter');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterUser['NewsletterUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterUser['NewsletterUser']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cognome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterUser['NewsletterUser']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterUser['NewsletterUser']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lingua'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterUser['Language']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $html->image('/img/administration/'.($newsletterUser['NewsletterUser']['is_active'] ? 'on.gif' : 'off.gif')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Modifica Utente Newsletter', true), array('action'=>'edit', $newsletterUser['NewsletterUser']['id'])); ?> </li>
		<li><?php echo $html->link(__('Elimina Utente Newsletter', true), array('action'=>'delete', $newsletterUser['NewsletterUser']['id']), null, sprintf(__('Sei sicuro di voler eliminare il contatto \n\t # %s?', true), $newsletterUser['NewsletterUser']['email'])); ?> </li>
	</ul>
</div>
