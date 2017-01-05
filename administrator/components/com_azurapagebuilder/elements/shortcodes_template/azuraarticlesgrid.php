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
   	'id' => '',
   	'extraclass' => '',
	'category'=>'',
	'order'=>'created',
	'orderdir'=>'ASC',
	'columngrid'=>'3',
	'showthumbnail'=>'1',
	'showtitle'=>'1',
	'showintrotext'=>'1',
	'showdate'=>'1',
	'showmore'=>'1',
	'limit'=>'All',
	'showfilter'=>'0',
	'fetchchild'=>'0',
	'layout'=>''
), $atts));

if($category == '0' || $category =='') return false;

$articles = ElementParser::getContentItems($category, $limit, $order, $orderdir,'',$fetchchild);

//echo'<pre>';var_dump($articles);die;

if($showfilter == '1'){
  $tagsFilter = ElementParser::getArticlesTagsFilter($articles);
  //echo'<pre>';var_dump($tagsFilter);die;
}



if($showfilter === '1') {
	AzuraJs::addJScript('isotope','/components/com_azurapagebuilder/assets/plugins/isotope/isotope.pkgd.min.js');
}

$classes = 'azura_articlesgrid';

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$articlesgridstyle = self::buildStyle($atts);

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}

switch ($columngrid) {
	case '1':
		$colClass = 'azp_col-md-12';
		break;
	case '2':
		$colClass = 'azp_col-md-6 azp_col-sm-12';
		break;
	case '3':
		$colClass = 'azp_col-md-4 azp_col-sm-6';
		break;
	case '4':
		$colClass = 'azp_col-md-3 azp_col-sm-6';
		break;
	case '6':
		$colClass = 'azp_col-md-2 azp_col-sm-6';
		break;

	default:
		$colClass = 'azp_col-md-4 azp_col-sm-6';
		break;
}

$classes = 'class="'.$classes.'"';

// Required if show readmore or show more post
require_once JPATH_SITE.'/components/com_content/helpers/route.php';

?>
<?php if(count($articles)) : ?>
	<?php if($showfilter === '1') :?>
	<!-- portfolio filters -->
	<div class="azp_row">
		<div class="azp_col-md-12 text-center azuraFilterWrapper">

		<?php if(isset($tagsFilter)):  ?>
		<div class="azura_filter active" data-filter="*"><?php echo JText::_('COM_AZURAPAGEBUILDER_FILTER_SHOW_ALL_TEXT');?></div>
	    <?php foreach($tagsFilter as $tag): ?>
	        <div class="azura_filter" data-filter=".<?php echo strtolower(str_replace(" ","-",$tag)); ?>"><?php echo $tag; ?></div>
		<?php endforeach;  ?>
		<?php endif;?>
		</div>
	</div>
	<?php endif;?>

    <div <?php echo $classes.' '.$articlesgridstyle.' '.$animationData;?>>
		
		<?php foreach ($articles as $key => $article) : 

		?>

		<div class="<?php echo $colClass;?> articleWrapper <?php //echo ElementParser::getArticleTagsFilter($article);?>">
            <div class="articlesGridItem">
            <?php if($showthumbnail === '1') :?>
            	<?php
            		$artImages = json_decode($article->images);
            		if(!empty($artImages->image_intro)) :
            	?>
            		<a href="<?php echo ContentHelperRoute::getArticleRoute($article->id,$category);?>"><img src="<?php echo JURI::root(true).'/'.$artImages->image_intro;?>" alt="<?php echo ElementParser::slug($article->title);?>"></a>
        		<?php endif;?>
        	<?php endif;?>
        	<?php if($showtitle === '1') :?>
				<div class="articleTitle">
					<h3><a href="<?php echo ContentHelperRoute::getArticleRoute($article->id,$category);?>"><?php echo $article->title;?></a></h3>
				</div>
			<?php endif;?>
			<?php if($showdate === '1') :?>
				<div class="articleDetail">
					<span class="glyphicon glyphicon-calendar"></span> <?php echo JHtml::_('date',$article->created,'d F, Y');?>
				</div>
			<?php endif;?>
			<?php if($showintrotext === '1') :?>
                <div class="articleIntro">
                	<?php if(!empty($article->fulltext)):?>
	                	<?php echo $article->introtext;?>
	                <?php else:?>
	                	<?php echo JHtml::_('string.truncate',strip_tags($article->introtext),100);?>
	                <?php endif;?>
                </div>
            <?php endif;?>
            </div>
        </div>
			
		<?php endforeach;?>


    </div>
    <?php if($showmore === '1') :?>
    <div class="azp_row">
    	<div class="azp_col-md-12 text-center">
			<br>
			<a href="<?php echo ContentHelperRoute::getCategoryRoute($category);?>" class="btn btn-primary"><?php echo JText::_('COM_AZURAPAGEBUILDER_SHOW_MORE_POSTS_TEXT');?></a>
		</div>
    </div>
	<?php endif;?>

<?php endif;?>