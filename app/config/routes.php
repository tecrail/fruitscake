<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'homepage', 'action' => 'index'));

Router::connect('/newsletters/subscription', array('controller' => 'newsletter_users', 'action' => 'index'));
Router::connect('/newsletters/unsubscription', array('controller' => 'newsletter_users', 'action' => 'unsubscription'));
Router::connect('/galleries', array('controller' => 'photo_galleries', 'action' => 'index'));
Router::connect('/galleries/view/*', array('controller' => 'photo_galleries', 'action' => 'view'));

Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/page/*', array('controller' => 'pages', 'action' => 'view'));
