<?php
/**
 * Copyright 2009-2010, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2009-2010, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * i18n Helper
 *
 * i18n view helper allowing to easily generate common i18n related controls
 *
 * @package i18n
 * @subpackage i18n.views.helpers
 */
class i18nHelper extends AppHelper {
	
/**
 * Helpers
 *
 * @var array $helpers
 */
	public $helpers = array('Html');
	
/**
 * Base path for the flags images, with a trailing slash
 * 
 * @var string $basePath
 */
	public $basePath = '/i18n/img/flags/';
	
/**
 * Displays a list of flags
 * 
 * @param array $options Options with the following possible keys
 * 	- basePath: Base path for the flag images, with a trailing slash
 * 	- class: Class of the <ul> wrapper
 * 	- id Id of the wrapper
 * @return void
 */
	public function flagSwitcher($options = array()) {
		$_defaults = array(
			'basePath' => $this->basePath,
			'class' => 'languages');
		$options = array_merge($_defaults, $options);
		$langs = Configure::read('Config.languages');
		if (defined('DEFAULT_LANGUAGE')) {
			array_unshift($langs, DEFAULT_LANGUAGE);
		}
		
		$out = '';
		if (!empty($langs)) {
			$out .= '<ul class="' . $options['class'] . '"' . ife(empty($options['id']), '', ' id="' . $options['id'] . '"') . '>';
			foreach($langs as $lang) {
				$class = $lang;
				if ($lang == Configure::read('Config.language')) {
					$class .= ' selected';
				}
				$url = array_merge($this->params['named'], $this->params['pass'], compact('lang'));
				$out .= 
				'<li class="' . $class . '">' .
					$this->Html->link($this->flagImage($lang, $options), $url, array('escape' => false)) .
				'</li>';
			}
			$out .= '</ul>';
		}
		
		return $out;
	}

/**
 * Returns the correct image from the language code
 * 
 * @param string $lang Long language code
 * @param array $options Options with the following possible keys
 * 	- basePath: Base path for the flag images, with a trailing slash
 * @return string Image markup
 */
	public function flagImage($lang, $options = array()) {
		static $L10n = null;
		if (is_null($L10n)) {
			App::import('Core', 'L10n');
			$L10n = new L10n();
		}
		$_defaults = array('basePath' => $this->basePath);
		$options = array_merge($_defaults, $options);
		return $this->Html->image($options['basePath'] . $L10n->map($lang) . '.png');
	}
}
