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
require_once JPATH_SITE.'/components/com_k2/helpers/utilities.php';
extract(cth_shortcode_atts(array(
    'id'=>'',
    'category'=>'',
    'columns'=>'3',
    'limit'=>'All',
    'order'=>'created',
    'orderdir'=>'DESC',
    'extraclass' => '',
    'layout'=>''
), $atts));

if($category == '0' || $category =='') return false;

$items = ElementParser::getK2Items($category, $limit, $order, $orderdir,'','1');

$classes = "";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$k2catviewstyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
    $id = 'id="'.$id.'"';
}

$dataObj = new stdClass;

$dataObj = rawurlencode(json_encode($dataObj));

?>

<div <?php echo $id . ' ' .$classes.' '.$k2catviewstyle.' '.$animationData;?>>
<?php if(count($items)) : ?>
        <?php foreach ($items as $key => $item) :
        $extraFields    = json_decode($item->extra_fields);?>
        <!-- Item <?php echo $key; ?> -->
        <div class="<?php echo $columns; ?>">
            <?php if(!empty($extraFields[1]->value)): ?>
                <p class="text-center">
                    <a href="<?php echo JURI::root(true).$extraFields[1]->value; ?>" class="opacity" data-rel="prettyPhoto[portfolio]"><img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" width="370" height="185" alt=""></a>
                </p>
            <?php endif; ?>
            <?php if($item->params->get('catItemTitle')): ?>
            <h5><a href="<?php echo $item->link;?>" class="black"><?php echo $item->title;?></a></h5>
            <?php endif;?>
            <p><?php echo strlen(strip_tags($item->introtext))>150 ? substr(strip_tags($item->introtext),0,150).'...': strip_tags($item->introtext);?></p>
        </div>
        <!-- Item <?php echo $key; ?> Ends-->
        <?php endforeach; ?>
<?php endif;?>
</div>
    
    