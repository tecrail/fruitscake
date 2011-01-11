<?php
/* SVN FILE: $Id: app_helper.php 6311 2008-01-02 06:33:52Z phpnut $ */
/**
 * Short description for file.
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 6311 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-01 22:33:52 -0800 (Tue, 01 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * This is a placeholder class.
 * Create the same file in app/app_helper.php
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package		cake
 * @subpackage	cake.cake
 */
class AppHelper extends Helper {

    public $helpers = array('Html', 'Form');

//    function published($condition = false) {
//        $image = $this->Html->image('administration/'.($condition ? 'on.gif' : 'off.gif'));
//        return $this->output($image);
//    }
//
//    function imageInput($fieldName, $options = array('type' => 'file'), $preview = false, $previewOptions = array('path' => null, 'label' => 'image'), $deletable = false) {
//        $options['type'] = 'file';
//
//        $output = '';
//
//        $output.= "<fieldset>";
//
//        $output.= "<legend>" . (isset($options['label'])? $options['label'] : __($fieldName, true)) . "</legend>";
//
//        $output.= FormHelper::input($fieldName, $options);
//        if($deletable) {
//            $output.= FormHelper::input("delete_{$fieldName}", array('label' => __('Delete image', true), 'type' => 'checkbox'));
//        }
//        if($preview) {
//            $output.= "<div class=\"preview_image\">" . (isset($previewOptions['label'])? $previewOptions['label'] : __('Current image', true).':') . "<br/>" . $this->Html->image($previewOptions['path']) . "</div>";
//        }
//
//        $output.= '</fieldset>';
//
//        return $this->output($output);
//    }
//
//    function movieInput($fieldName, $options = array(), $preview = false, $previewOptions = array('path' => null, 'label' => 'movie', 'target' => '_blank'), $deletable = false) {
//        $options['type'] = 'file';
//
//        $output = '';
//
//        $output.= "<fieldset>";
//
//        $output.= "<legend>" . (isset($options['label'])? $options['label'] : __($fieldName, true)) . "</legend>";
//
//        $output.= FormHelper::input($fieldName, $options);
//        if($deletable) {
//            $output.= FormHelper::input("delete_{$fieldName}", array('label' => __('Delete movie', true), 'type' => 'checkbox'));
//        }
//        if($preview) {
//            $output.= "<div class=\"preview_movie\">" .$this->Html->link( (isset($previewOptions['label'])? $previewOptions['label'] : __('Download movie', true) ), $previewOptions['path'], array('target' => empty($previewOptions['target'])? '_blank' : $previewOptions['target'])) . "</div>";
//        }
//
//        $output.= '</fieldset>';
//
//        return $this->output($output);
//    }
}
?>