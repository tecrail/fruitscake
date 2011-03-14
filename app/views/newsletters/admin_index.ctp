<div class="newsletters index">

    <h2><?php __('Newsletters'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Titolo', 'title'); ?></th>
            <th><?php echo $this->Paginator->sort('Lingua', 'Language.name'); ?></th>
            <th><?php echo $this->Paginator->sort('Ultima modifica', 'modified'); ?></th>
            <th class="actions"><?php __('Azioni'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($newsletters as $newsletter):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            if (!isset($newsletter['Language']['name'])) {
                $newsletter['Language']['name'] = Configure::read('App.defaultLocale');
            }
        ?>
            <tr<?php echo $class; ?>>
            <td>
                    <?php echo$this->Backend->actionLink( $newsletter['Newsletter']['title'], array('controller' => 'newsletters', 'action' => 'edit', $newsletter['Newsletter']['id']), array('class' => 'listing')); ?>&nbsp;
            </td>
            <td>
                <?php echo $newsletter['Language']['name']; ?>
            </td>
            <td>
                <?php echo $newsletter['Newsletter']['modified']; ?>
            </td>
            <td class="actions">
                <?php echo $html->link(__('Visualizza', true), '/newsletters/view/' . $newsletter['Newsletter']['id'], array('target' => '_blank')); ?>
                <?php echo $html->link(__('Modifica', true), array('action' => 'edit', $newsletter['Newsletter']['id'])); ?>
                <?php echo $html->link(__('Elimina', true), array('action' => 'delete', $newsletter['Newsletter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $newsletter['Newsletter']['id'])); ?>
                <?php echo $html->link(__('Spedisci', true), array('action' => 'deliver', $newsletter['Newsletter']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
            </table>
            
		<?php echo $this->element("backend/paging") ?>

        </div>

<?php echo $this->element("backend/left_navigator") ?>
