<?php

echo $this->Form->input('id');
echo $this->Form->input('name', array('readonly' => true));
echo $this->Backend->htmlEditor('description');

?>
