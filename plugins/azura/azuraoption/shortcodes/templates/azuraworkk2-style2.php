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
//require_once JPATH_BASE.'/components/com_k2/helpers/utilities.php';
extract(cth_shortcode_atts(array(
    'id'=>'',
    'category'=>'',
    'columns'=>'3',
    'limit'=>'All',
    'order'=>'created',
    'orderdir'=>'DESC',
    'showfilter'=>'0',
    'defaultfilter'=>'all',
    'extraclass' => '',
    'layout'=>''
), $atts));

if($category == '0' || $category =='') return false;

$items = ElementParser::getK2Items($category, $limit, $order, $orderdir,'','1');

$classes = "";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$workk2style = self::buildStyle($atts);

if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
	$id = 'id="'.$id.'"';
}

$dataObj = new stdClass;
$dataObj->defaultFilter = $defaultfilter;

$dataObj = rawurlencode(json_encode($dataObj));

$cols = 'col-md-3';
if($columns == '2')
    $cols = 'col-md-6';
if($columns == '3')
    $cols = 'col-md-4';
?>
<div <?php echo $id . ' ' .$classes.' '.$workk2style.' '.$animationData;?>>
<?php if(count($items)) : ?>
<!-- portfolio filters -->
    <?php if($showfilter == '1') :

        $tagsFilter = ElementParser::getK2TagsFilter($items);

    ?>
    <?php if(!empty($tagsFilter)): ?>
    <div class="container work-section">
        <div id="options" class="filter-menu">
            <ul class="option-set nav black nav-pills">
                <li data-filter="all" class="filter active">
                    <?php echo JText::_('TPL_MIST_FILTER_ALL');?>
                </li>
                <?php foreach($tagsFilter as $tag): ?>
                <li data-filter=".<?php echo strtolower(str_replace(" ","-",$tag)); ?>" class="filter">
                    <?php echo ucfirst($tag); ?>
                </li>
                <?php endforeach;  ?>
            </ul>
        </div>
    </div>
    <?php endif;?>
        
    <?php endif;?>

    <!-- filter -->
    <div id="mix-container" class="portfolio-grid">
        <?php foreach ($items as $key => $item) :
        $extraFields    = json_decode($item->extra_fields);?>
        <!-- Item <?php echo $key; ?> -->
        <div class="grids col-xs-12 col-sm-6 <?php echo $cols; ?> mix all <?php echo ElementParser::getK2ItemTagsFilter($item);?>">
            <div class="grid">
                <?php if(!empty($extraFields[1]->value)): ?>
                    <img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" alt="Recent Work" class="img-responsive">
                <?php endif; ?>
                <div class="figcaption">
                <div class="caption-block">
                    <?php if($item->params->get('catItemTitle')): ?>
                        <h4><?php echo $item->title;?></h4>
                        <p><?php echo strlen(strip_tags($item->introtext))>60 ? substr(strip_tags($item->introtext),0,60).'...': strip_tags($item->introtext);?></p>
                    <?php endif;?>
                </div>
                <?php if(!empty($extraFields[1]->value)): ?>
                <!-- Image Popup-->
                <a href="<?php echo JURI::root(true).$extraFields[1]->value; ?>" data-rel="prettyPhoto[portfolio]">
                    <i class="fa fa-search"></i>
                </a>
                <?php endif; ?>
                <a href="<?php echo $item->link;?>">
                    <i class="fa fa-link"></i>
                </a></div>
            </div>
        </div>
        <!-- Item <?php echo $key; ?> Ends-->
        <?php endforeach; ?>
    </div>
    <!-- Mix Container -->

<?php endif;?>
</div>
	
	