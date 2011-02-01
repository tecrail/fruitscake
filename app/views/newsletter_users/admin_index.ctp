<div class="newsletterUsers index">
<h2><?php __('Utenti Newsletter');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Nome','first_name');?></th>
	<th><?php echo $paginator->sort('Cognome','last_name');?></th>
	<th><?php echo $paginator->sort('Email','email');?></th>
	<th><?php echo $paginator->sort('Attivo','is_active');?></th>
	<th class="actions"><?php __('Azioni');?></th>
</tr>
<?php
$i = 0;
foreach ($newsletterUsers as $newsletterUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $newsletterUser['NewsletterUser']['id']; ?>
		</td>
		<td>
			<?php echo $newsletterUser['NewsletterUser']['first_name']; ?>
		</td>
		<td>
			<?php echo $newsletterUser['NewsletterUser']['last_name']; ?>
		</td>
		<td>
			<?php echo $newsletterUser['NewsletterUser']['email']; ?>
		</td>
		<td>
            <?php echo $html->image('/img/administration/'.($newsletterUser['NewsletterUser']['is_active'] ? 'on.gif' : 'off.gif')); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Visualizza', true), array('action'=>'view', $newsletterUser['NewsletterUser']['id'])); ?>
			<?php echo $html->link(__('Modifica', true), array('action'=>'edit', $newsletterUser['NewsletterUser']['id'])); ?>
			<?php echo $html->link(__('Elimina', true), array('action'=>'delete', $newsletterUser['NewsletterUser']['id']), null, sprintf(__('Sei sicuro di voler eliminare il contatto\n\t # %s?', true), $newsletterUser['NewsletterUser']['email'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('precedente', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('successivo', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Nuovo Utente', true), array('action'=>'add')); ?></li>
	</ul>
</div>
