<?php

Configure::write('App.defaultEmail', 'noreply@' . env('HTTP_HOST'));
Configure::write('App.baseTitle', 'Fruitscake site name');
Configure::write('App.defaultLocale', 'it');
Configure::write('App.infoEmail', 'info@' . env('HTTP_HOST'));
