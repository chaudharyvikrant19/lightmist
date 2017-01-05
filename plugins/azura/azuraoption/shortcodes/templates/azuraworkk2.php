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
            <ul class="option-set nav nav-pills">
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
        $extraFields = array();
        if($item->extra_fields){
            if(!is_array($item->extra_fields)){
                $extraFields = json_decode($item->extra_fields);
            }else{
                $extraFields = $item->extra_fields;
            }
        }

        if(!empty($extraFields)){
            $postType = $extraFields[0]->value;
            $postLink = $extraFields[3]->value;
        }

        ?>
        <!-- Item <?php echo $key; ?> -->
        <div class="grids col-xs-12 col-sm-6 col-md-<?php echo $columns; ?> mix all <?php echo ElementParser::getK2ItemTagsFilter($item);?>">
            <div class="grid">
                <!-- meta -->
                <?php switch ($postType) :
                case '1': case '3':case '4':# single photo ?>
                    <?php if(!empty($extraFields[1]->value)): ?>
                    <img src="<?php echo JURI::root(true).$extraFields[1]->value;?>" alt="" class="img-responsive" >
                    <?php endif; ?>
                <?php   break;
                case '2': # image slider 
                    ?>
                    <div id="carousel-example-generic<?php echo $item->id;?>" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php foreach ($extraFields as $key => $field) :
                            if($key > 2 && trim($field->value) !='') : ?>
                            <li data-target="#carousel-example-generic<?php echo $item->id;?>" data-slide-to="<?php echo ($key-3);?>" <?php if($key === 3) {echo ' class="active"';} ?>></li>
                            <?php endif; endforeach; ?>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            foreach ($extraFields as $key => $field) :
                                if($key > 2 && trim($field->value) !='') : ?>
                                <div class="item<?php if($key === 3) echo ' active'; ?>">
                                    <img src="<?php echo JURI::root(true).$field->value;?>" alt="<?php echo $item->title. '-image-'.($key+1);?>" title=""  class="img-responsive" />
                                    <div class="img-overlay"></div>
                                    <div class="figcaption">
                                        <div class="caption-block">
                                            <h4><?php echo $item->title;?></h4>
                                            <p><?php echo strlen($item->introtext)>60 ? substr($item->introtext,0,59).'...': $item->introtext;?></p>
                                        </div>
                                        <!-- Image Popup-->
                                        <a href="<?php echo JURI::root(true).$field->value;?>" data-rel="prettyPhoto[portfolio]">
                                            <i class="fa fa-search"></i>
                                        </a> 
                                        <a href="<?php echo $item->link; ?>">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                <?php break; endswitch; ?>

                <?php if($postType !== '2'): ?>
                    <div class="img-overlay"></div>
                    <div class="figcaption">
                        <div class="caption-block">
                            <h4><?php echo $item->title;?></h4>
                            <p><?php echo strlen($item->introtext)>60 ? substr($item->introtext,0,59).'...': $item->introtext;?></p>
                        </div>
                        <?php if($postType == '3' or $postType == '4'): ?>
                            <a href="<?php echo JURI::root(true).$extraFields[3]->value;?>" data-rel="prettyPhoto">
                                <i class="fa fa-search"></i>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo JURI::root(true).$extraFields[1]->value;?>" data-rel="prettyPhoto[portfolio]">
                                <i class="fa fa-search"></i>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo $item->link; ?>">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                <?php endif; ?>
                <!-- /meta -->
            </div>
        </div>
        <!-- Item <?php echo $key; ?> Ends-->
        <?php endforeach; ?>
    </div>
    <!-- Mix Container -->

<?php endif;?>
</div>
	
	