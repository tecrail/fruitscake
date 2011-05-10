<?php $paginatorNumbers = $this->Paginator->numbers(); ?>

<div class="paginator_container">
    <div class="counter">
        <?php echo $this->Paginator->counter(array('format' => 'Pagina %page% di %pages%')); ?>
    </div>

    <div class="paginator">
        <?php echo $this->Paginator->prev('« Precedente', null, null, array('class' => 'disabled')); ?>
        <?php if (!empty($paginatorNumbers)) echo "| {$paginatorNumbers}"; ?> |
        <?php echo $this->Paginator->next('successiva »', null, null, array('class' => 'disabled')); ?>
    </div>

    <div class="clear">&nbsp;</div>
</div>