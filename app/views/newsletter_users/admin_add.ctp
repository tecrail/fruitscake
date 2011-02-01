<div class="newsletterUsers form">
<?php echo $form->create('NewsletterUser');?>
	<fieldset>
 		<legend><?php __('Nuovo Iscritto alla Newsletter');?></legend>
	<?php
		echo $form->input('first_name',array('label' => 'Nome'));
		echo $form->input('last_name',array('label' => 'Cognome'));
		echo $form->input('email',array('label' => 'Email'));
		echo $form->input('is_active',array('label' => 'Attivo'));
		echo $form->input('language_id',array('label' => 'Lingua'));
	?>
	</fieldset>
<?php echo $form->end('Salva');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista Iscritti alla Newsletter', true), array('action'=>'index'));?></li>
	</ul>
</div>
