<?php

if ($this->Session->check('Message.flash')) {
    echo $this->Session->flash();
}

if ($this->Session->check('Message.auth')) {
    echo $this->Session->flash('auth');
}