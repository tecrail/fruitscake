<div class="newsletterUsers index">
<h2><?php __('Utenti Newsletter');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('Nome','first_name');?></th>
	<th><?php echo $this->Paginator->sort('Cognome','last_name');?></th>
	<th><?php echo $this->Paginator->sort('Email','email');?></th>
	<th><?php echo $this->Paginator->sort('Attivo','is_active');?></th>
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
			<?php echo $this->Backend->isActive($newsletterUser['NewsletterUser']['is_active']); ?>
		</td>
		<td class="actions">
			<?php echo $this->Backend->actionLink(__('View', true), array('action'=>'view', $newsletterUser['NewsletterUser']['id'])); ?>
			<?php echo $this->Backend->actionLink(__('Edit', true), array('action'=>'edit', $newsletterUser['NewsletterUser']['id'])); ?>
			<?php echo $this->Backend->actionLink(__('Delete', true), array('action'=>'delete', $newsletterUser['NewsletterUser']['id']), null, sprintf(__('Sei sicuro di voler eliminare il contatto\n\t # %s?', true), $newsletterUser['NewsletterUser']['email'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element("backend/paging") ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nuovo Utente', true), array('action'=>'add')); ?></li>
	</ul>
</div>
