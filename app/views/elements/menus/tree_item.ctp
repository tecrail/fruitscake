
<?php
$link = $this->Html->link($data['Menu']['name'], array('controller' => 'menus', 'action' => 'edit', $data['Menu']['id']));
echo '<span id="' . $data['Menu']['id'] . '">' . $link . '</span>';
?>