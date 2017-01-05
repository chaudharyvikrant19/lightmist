<?php
/**
* @package Mist - Multi-Purpose HTML5 Responsive Joomla Template
* @author Cththemes - www.cththemes.com
* @date: 01-10-2014
*
* @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
* @license    GNU General Public License version 2 or later; see LICENSE
*/
// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

/**
* Book form field class
*/
class JFormFieldColorReset extends JFormField
{
    /**
     * field type
     * @var string
     */
    protected $type = 'ColorReset';

    /*
    * Method to get the field input markup
    */
    protected function getInput()
    {
        $doc = JFactory::getDocument();
  		$scripts = array();

        $scripts[] = 'jQuery(document).ready(function($){';
            $scripts[] = '$(\'#resetColorButton\').click(function(){';
                $scripts[] = '$(\'#jform_params_textColor\').val(\'#ffc400\');';
                $scripts[] = '$(\'#jform_params_borderColor\').val(\'#ffc400\');';
                $scripts[] = '$(\'#jform_params_backgroundColor\').val(\'#ffc400\');';
            $scripts[] = '});';
        $scripts[] = '});';

        $doc->addScriptDeclaration(implode("\n", $scripts));
        $html[] = '<a role="button" id="resetColorButton" class="btn btn-warning">Reset Colors</a>';
        return implode("\n", $html);
    }
 
}