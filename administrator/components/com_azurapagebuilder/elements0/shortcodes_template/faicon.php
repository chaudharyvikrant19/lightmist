<?php 
/**
 * @package Azura Joomla Pagebuilder
 * @author Cththemes - www.cththemes.com
 * @date: 15-07-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;

extract(cth_shortcode_atts(array(
    'name' => 'joomla',
    'class' =>""
), $atts));

$name = 'fa fa-'.$name;

if(!empty($class)){
  $name .= ' '.$class;
}
 
?>
<i class="<?php echo $name;?>"></i>