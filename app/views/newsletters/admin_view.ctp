<div class="newsletters view">
<h2><?php  __('Newsletter');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletter['Newsletter']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titolo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletter['Newsletter']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrizione [HTML]'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletter['Newsletter']['description_html']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrizione [TEXT]'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<pre><?php echo $newsletter['Newsletter']['description_text']; ?></pre>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lingua'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletter['Language']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Allegato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
        	<?php echo (!empty($news['News']['attachment'])) ? $this->Html->link($newsletter['Newsletter']['attchment'], "/files/attachments/".$newsletter['Newsletter']['attchment']) : '' ?>
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Utente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($newsletter['User']['name'], array('controller'=> 'users', 'action'=>'view', $newsletter['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $newsletter['Newsletter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $newsletter['Newsletter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $newsletter['Newsletter']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Spedisci', true), array('action'=>'deliver', $newsletter['Newsletter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Elenco Newsletters', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuova Newsletter', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
