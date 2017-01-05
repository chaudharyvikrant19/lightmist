<?php
/**
 * @package Azura Joomla Pagebuilder
 * @author Cththemes - www.cththemes.com
 * @date: 15-07-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
//no direct accees
defined ('_JEXEC') or die('resticted aceess');

//[Row - Column]
if(!function_exists('azurarow_sc')) {

	$rowColumnsArray = array();

	function azurarow_sc( $atts, $content="" ) {
	
		extract(cth_shortcode_atts(array(
			   'id' => '',
			   'secclass'=>'',
			   'class' => '',
			   'overlayclass' => '',
			   'overlaybackground' => '',
			   'isfullwidth'=>'0',
			   'stellar'=>'',
			   'layout'=>''
		 ), $atts));

		global $rowColumnsArray;


		$rowstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azurarow');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$rowColumnsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraRow', 'azurarow_sc' );

	function azuracolumn_sc( $colatts, $content="" ) {

	 	global $rowColumnsArray;

	 	$responsiveTxt = AzuraShortcode::buildResponsive($colatts, 'azp_');

	 	$colStyle = AzuraShortcode::buildStyle($colatts);

	 	$animation_data = AzuraShortcode::buildAnimation($colatts,'animate');

		extract(cth_shortcode_atts(array(

           	'id'=>'',
           	'class' => '',
           	'wrapclass'=>'',
           	'columnwidthclass'=>'col-md-12',
		), $colatts));

	 	$rowColumnsArray[] = array(
	 		'animationtrigger'=>$animation_data['trigger'],
	 		'animationdata'=>$animation_data['data'],

	 		'columnstyle'=> $colStyle,

	 		'id'=>$id,
	 		'class'=>$class,
	 		'wrapclass'=>$wrapclass,
	 		'columnwidthclass'=>$columnwidthclass,
	 		'responsivetext'=>$responsiveTxt,
	 		'content'=>$content
	 	);

	}

	ElementParser::add_shortcode( 'AzuraColumn', 'azuracolumn_sc' );
}
//[master slider]
if(!function_exists('azuramasterslider_sc')) {
	$masterSliderItemsArray = array();
	function azuramasterslider_sc( $atts, $content="" ){
		global $masterSliderItemsArray;

		extract(cth_shortcode_atts(array(
			  'id' => '',
			  'class'=>'',
			  'skin'=>'',
			  'layout'=>''
		 ), $atts));

		$mastersliderstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramasterslider');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$masterSliderItemsArray = array();
		
		return $content;

	}
	
	ElementParser::add_shortcode( 'AzuraMasterSlider', 'azuramasterslider_sc' );


	function azuramasterslider_item_sc( $atts, $content="" ) {

		global $masterSliderItemsArray;


		$masterSliderItemsArray[] = array(
			'class'=>$atts['class'],
			'slidebackground'=>$atts['slidebackground'],
			'content'=>$content
		);

		
	}
		
	ElementParser::add_shortcode( 'AzuraMasterSliderItem', 'azuramasterslider_item_sc' );
		
			
}

//[Work01]
if(!function_exists('azurawork01_sc')) {

	$work01ItemsArray = array();

	function azurawork01_sc( $atts, $content="" ) {

	 	global $work01ItemsArray;
	
		extract(cth_shortcode_atts(array(
				// 'textcolor' => 'white',
			   	'id' => '',
			   	'isfullwidth'=>'1',
			   	'showfilter'=>'0',
			   	'class' => '',
			   	// cube portfolio
			   	'defaultfilter'=>'*',
			   	'animationtype'=>'fadeOut',
			   	'gaphorizontal'=>'10',
			   	'gapvertical'=>'10',
			   	'gridadjustment'=>'responsive',
			   	'caption'=>'pushTop',
			   	'displaytype'=>'lazyLoading',
			   	'displaytypespeed'=>'400',
			   	'mediaqueries'=>'false',


			   	'layout'=>''
		), $atts));

		$work01style = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azurawork01');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$work01ItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraWork01', 'azurawork01_sc' );

	function azurawork01_item_sc( $atts, $content="" ) {

	 	global $work01ItemsArray;

	 	$work01ItemsArray[] = array(
	 		'thumb'=>$atts['thumb'],
	 		'full'=>$atts['full'],
	 		'title'=>$atts['title'],
	 		'subtitle'=>$atts['subtitle'],
	 		'filter'=>$atts['filter'],
	 		'extraclass'=>$atts['extraclass'],
	 		'content'=>$content
	 	);

	}

	ElementParser::add_shortcode( 'AzuraWork01Item', 'azurawork01_item_sc' );
}
//[Owl Carousel]
if(!function_exists('azuraowlcarousel_sc')) {

	$owlCarouselItemsArray = array();

	function azuraowlcarousel_sc( $atts, $content="" ) {

	 	global $owlCarouselItemsArray;
	
		extract(cth_shortcode_atts(array(

				'id' => '',
			  	'class'=>'',
			  	'transtyle'=>'',
			  	'sliderspeed'=>'200',
			  	'rewindspeed'=>'1000',
			  	'items'=>'5',
			  	'issingle'=>'0',
			  	'itemscustom'=>'',
			  	'autoplay'=>'false',
			  	'pagination'=>'1',
			  	'paginationspeed'=>'800',
			  	'navigation'=>'0',
			  	'autoheight'=>'0',
			  	'mousedrag'=>'1',
			  	'touchdrag'=>'1',
			  	
			  	'stoponhover'=>'1',
				
			   	'layout'=>''
		), $atts));

		$owlcarouselstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuraowlcarousel');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$owlCarouselItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraOwlCarousel', 'azuraowlcarousel_sc' );	

	//owlcarousel Items
	function azuraowlcarousel_item_sc( $atts, $content="" ){
		global $owlCarouselItemsArray;
		$owlCarouselItemsArray[] = array( 
			'extraclass'=>$atts['extraclass'] ,
			'slideimage'=>$atts['slideimage'] , 
			'content'=>$content
		);
	}

	ElementParser::add_shortcode( 'AzuraOwlCarouselItem', 'azuraowlcarousel_item_sc' );	

}
//[Who We Are Slider]
if(!function_exists('azuramistwhoweareslide_sc')) {

	$WhoWeAreItemsArray = array();

	function azuramistwhoweareslide_sc( $atts, $content="" ) {

	 	global $whoWeAreItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'headertag' => '',
			   	'class' => '',
			   	'extraclass' => '',
			   	'layout'=>''
		), $atts));

		$whoweareslidestyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistwhoweareslide');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$WhoWeAreItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistWhoWeAreSlide', 'azuramistwhoweareslide_sc' );

	function azuramistwhoweareslide_item_sc( $atts, $content="" ) {

	 	global $whoWeAreItemsArray;

	 	$whoWeAreItemsArray[] = array(
	 		'content'=>$content
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistWhoWeAreSlideItem', 'azuramistwhoweareslide_item_sc' );
}
//[Testimonial Slider]
if(!function_exists('azuramisttestimonial_sc')) {

	$testimonialItemsArray = array();

	function azuramisttestimonial_sc( $atts, $content="" ) {

	 	global $testimonialItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'items' => '',
			   	'pagination' => '',
			   	'autoplay' => '',
			   	'navigation' => '',
			   	'layout'=>''
		), $atts));

		$testimonialstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramisttestimonial');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$testimonialItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistTestimonial', 'azuramisttestimonial_sc' );

	function azuramisttestimonial_item_sc( $atts, $content="" ) {

	 	global $testimonialItemsArray;

	 	$testimonialItemsArray[] = array(
	 		'avatar'=>$atts['avatar'],
	 		'name'=>$atts['name'],
	 		'position'=>$atts['position'],
	 		'content'=>$content
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistTestimonialItem', 'azuramisttestimonial_item_sc' );
}
//[Team Member]
if(!function_exists('azuramistteammember_sc')) {

	$teamMemberItemsArray = array();

	function azuramistteammember_sc( $atts, $content="" ) {

	 	global $teamMemberItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'useslider' => '',
			   	'items' => '',
			   	'pagination' => '',
			   	'autoplay' => '',
			   	'navigation' => '',
			   	'layout'=>''
		), $atts));

		$teammemberstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistteammember');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$teamMemberItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistTeamMember', 'azuramistteammember_sc' );

	function azuramistteammember_item_sc( $atts, $content="" ) {

	 	global $teamMemberItemsArray;

	 	$teamMemberItemsArray[] = array(
	 		'avatar'=>$atts['avatar'],
	 		'name'=>$atts['name'],
	 		'position'=>$atts['position'],
	 		'description'=>$atts['description'],
	 		'content'=>$content
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistTeamMemberItem', 'azuramistteammember_item_sc' );
}
//[Process Bar]
if(!function_exists('azuramistprocessbar_sc')) {

	$processBarItemsArray = array();

	function azuramistprocessbar_sc( $atts, $content="" ) {

	 	global $processBarItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'layout'=>''
		), $atts));

		$processbarstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistprocessbar');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$processBarItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistProcessBar', 'azuramistprocessbar_sc' );

	function azuramistprocessbar_item_sc( $atts, $content="" ) {

	 	global $processBarItemsArray;

	 	$processBarItemsArray[] = array(
	 		'name'=>$atts['name'],
	 		'percent'=>$atts['percent']
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistProcessBarItem', 'azuramistprocessbar_item_sc' );
}
//[Accordion]
if(!function_exists('azuramistaccordion_sc')) {

	$accordionItemsArray = array();

	function azuramistaccordion_sc( $atts, $content="" ) {

	 	global $accordionItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'layout'=>''
		), $atts));

		$accordionstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistaccordion');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$accordionItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistAccordion', 'azuramistaccordion_sc' );

	function azuramistaccordion_item_sc( $atts, $content="" ) {

	 	global $accordionItemsArray;

	 	$accordionItemsArray[] = array(
	 		'icontitle'=>$atts['icontitle'],
	 		'title'=>$atts['title'],
	 		'active'=>$atts['active'],
	 		'content'=>$content
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistAccordionItem', 'azuramistaccordion_item_sc' );
}
//[Clients Slider]
if(!function_exists('azuramistclientsslider_sc')) {

	$clientsSliderItemsArray = array();

	function azuramistclientsslider_sc( $atts, $content="" ) {

	 	global $clientsSliderItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'items' => '',
			   	'itemwidth' => '',
			   	'itemheight' => '',
			   	'pagination' => '',
			   	'autoplay' => '',
			   	'navigation' => '',
			   	'layout'=>''
		), $atts));

		$clientssliderstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistclientsslider');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$clientsSliderItemsArray = array();
		
		return $content;

	}
		
	ElementParser::add_shortcode( 'AzuraMistClientsSlider', 'azuramistclientsslider_sc' );

	function azuramistclientsslider_item_sc( $atts, $content="" ) {

	 	global $clientsSliderItemsArray;

	 	$clientsSliderItemsArray[] = array(
	 		'logo'=>$atts['logo'],
	 		'link'=>$atts['link']
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistClientsSliderItem', 'azuramistclientsslider_item_sc' );
}
//[Services Timeline]
if(!function_exists('azuramistservicestimeline_sc')) {

	$servicesTimelineItemsArray = array();

	function azuramistservicestimeline_sc( $atts, $content="" ) {

	 	global $servicesTimelineItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'layout'=>''
		), $atts));

		$servicestimelinestyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistservicestimeline');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$servicesTimelineItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistServicesTimeline', 'azuramistservicestimeline_sc' );

	function azuramistservicestimeline_item_sc( $atts, $content="" ) {

	 	global $servicesTimelineItemsArray;

	 	$servicesTimelineItemsArray[] = array(
	 		'date'=>$atts['date'],
	 		'img'=>$atts['img'],
	 		'width'=>$atts['width'],
	 		'height'=>$atts['height'],
	 		'title'=>$atts['title'],
	 		'content'=>$content
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistServicesTimelineItem', 'azuramistservicestimeline_item_sc' );
}
//[Screenshots]
if(!function_exists('azuramistscreenshots_sc')) {

	$screenshotsItemsArray = array();

	function azuramistscreenshots_sc( $atts, $content="" ) {

	 	global $screenshotsItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'items' => '',
			   	'pagination' => '',
			   	'autoplay' => '',
			   	'navigation' => '',
			   	'layout'=>''
		), $atts));

		$screenshotsstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistscreenshots');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$screenshotsItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistScreenshots', 'azuramistscreenshots_sc' );

	function azuramistscreenshots_item_sc( $atts, $content="" ) {

	 	global $screenshotsItemsArray;

	 	$screenshotsItemsArray[] = array(
	 		'img'=>$atts['img']
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistScreenshotsItem', 'azuramistscreenshots_item_sc' );
}
//[Masonry Grid]
if(!function_exists('azuramistmasonrygrid_sc')) {

	$masonryGridItemsArray = array();

	function azuramistmasonrygrid_sc( $atts, $content="" ) {

	 	global $masonryGridItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'class' => '',
			   	'cols' => '',
			   	'layout'=>''
		), $atts));

		$masonrygridstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistmasonrygrid');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$masonryGridItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistMasonryGrid', 'azuramistmasonrygrid_sc' );

	function azuramistmasonrygrid_item_sc( $atts, $content="" ) {

	 	global $masonryGridItemsArray;

	 	$masonryGridItemsArray[] = array(
	 		'img'=>$atts['img'],
	 		'width'=>$atts['width'],
	 		'height'=>$atts['height'],
	 		'title'=>$atts['title']
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistMasonryGridItem', 'azuramistmasonrygrid_item_sc' );
}
//[Bakery Header Menu Tab]
if(!function_exists('azuramistbakeryheader_sc')) {

	$bakeryHeaderItemsArray = array();

	function azuramistbakeryheader_sc( $atts, $content="" ) {

	 	global $bakeryHeaderItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'class' => '',
			   	'layout'=>''
		), $atts));

		$bakeryheaderstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistbakeryheader');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$bakeryHeaderItemsArray = array();
		
		return $content;

	}
		
	ElementParser::add_shortcode( 'AzuraMistBakeryHeader', 'azuramistbakeryheader_sc' );

	function azuramistbakeryheader_item_sc( $atts, $content="" ) {

	 	global $bakeryHeaderItemsArray;

	 	$bakeryHeaderItemsArray[] = array(
	 		'tabname'=>$atts['tabname'],
	 		'childid'=>$atts['childid'],
	 		'icon'=>$atts['icon'],
	 		'isactive'=>$atts['isactive']
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistBakeryHeaderItem', 'azuramistbakeryheader_item_sc' );
}
//[Bakery Menu Tab]
if(!function_exists('azuramistbakerymenu_sc')) {

	$bakeryMenuItemsArray = array();

	function azuramistbakerymenu_sc( $atts, $content="" ) {

	 	global $bakeryMenuItemsArray;
	
		extract(cth_shortcode_atts(array(
			   	'id' => '',
			   	'isactive' => '',
			   	'class' => '',
			   	'layout'=>''
		), $atts));

		$bakerymenustyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistbakerymenu');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$bakeryMenuItemsArray = array();
		
		return $content;

	}
		
	ElementParser::add_shortcode( 'AzuraMistBakeryMenu', 'azuramistbakerymenu_sc' );

	function azuramistbakerymenu_item_sc( $atts, $content="" ) {

	 	global $bakeryMenuItemsArray;

	 	$bakeryMenuItemsArray[] = array(
	 		'img'=>$atts['img'],
	 		'menuname'=>$atts['menuname'],
	 		'menuprice'=>$atts['menuprice'],
	 		'description'=>$atts['description']
	 	);

	}

	ElementParser::add_shortcode( 'AzuraMistBakeryMenuItem', 'azuramistbakerymenu_item_sc' );
}
//[Mist Owl Carousel]
if(!function_exists('azuramistcarousel_sc')) {

	$carouselItemsArray = array();

	function azuramistcarousel_sc( $atts, $content="" ) {

	 	global $carouselItemsArray;
	
		extract(cth_shortcode_atts(array(
				'id' => '',
			  	'class'=>'',
			  	'width'=>'',
			  	'height'=>'',
			   	'layout'=>''
		), $atts));

		$carouselstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistcarousel');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$carouselItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistCarousel', 'azuramistcarousel_sc' );	

	//owlcarousel Items
	function azuramistcarousel_item_sc( $atts, $content="" ){
		global $carouselItemsArray;
		$carouselItemsArray[] = array( 
			'img'=>$atts['img'],
			'caption'=>$atts['caption']
		);
	}

	ElementParser::add_shortcode( 'AzuraMistCarouselItem', 'azuramistcarousel_item_sc' );	

}

//[Mist Carousel Main Slider]
if(!function_exists('azuramistcarouselmainslider_sc')) {

	$carouselMainSliderItemsArray = array();

	function azuramistcarouselmainslider_sc( $atts, $content="" ) {

	 	global $carouselMainSliderItemsArray;
	
		extract(cth_shortcode_atts(array(
				'id' => '',
			  	'class'=>'',
			  	'width'=>'',
			  	'height'=>'',
			   	'layout'=>''
		), $atts));

		$carouselmainsliderstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistcarouselmainslider');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$carouselMainSliderItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistCarouselMainSlider', 'azuramistcarouselmainslider_sc' );	

	//owlcarousel Items
	function azuramistcarouselmainslider_item_sc( $atts, $content="" ){
		global $carouselMainSliderItemsArray;
		$carouselMainSliderItemsArray[] = array( 
			'img'=>$atts['img'],
			'captionclass'=>$atts['captionclass'],
			'content'=>$content
		);
	}

	ElementParser::add_shortcode( 'AzuraMistCarouselMainSliderItem', 'azuramistcarouselmainslider_item_sc' );	

}

//[Mist Owl Carousel Main Slider]
if(!function_exists('azuramistowlcarouselmainslider_sc')) {

	$owlCarouselMainSliderItemsArray = array();

	function azuramistowlcarouselmainslider_sc( $atts, $content="" ) {

	 	global $owlCarouselMainSliderItemsArray;
	
		extract(cth_shortcode_atts(array(
				'id' => '',
			  	'class'=>'',
			  	'animate'=>'',
			  	'width'=>'',
			  	'height'=>'',
			   	'layout'=>''
		), $atts));

		$owlcarouselmainsliderstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistowlcarouselmainslider');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$owlCarouselMainSliderItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistOwlCarouselMainSlider', 'azuramistowlcarouselmainslider_sc' );	

	//owlcarousel Items
	function azuramistowlcarouselmainslider_item_sc( $atts, $content="" ){
		global $owlCarouselMainSliderItemsArray;
		$owlCarouselMainSliderItemsArray[] = array( 
			'img'=>$atts['img'],
			'captionclass'=>$atts['captionclass'],
			'content'=>$content
		);
	}

	ElementParser::add_shortcode( 'AzuraMistOwlCarouselMainSliderItem', 'azuramistowlcarouselmainslider_item_sc' );	

}

//[Mist Tabs]
if(!function_exists('azuramisttab_sc')) {

	$tabItemsArray = array();

	function azuramisttab_sc( $atts, $content="" ) {

	 	global $tabItemsArray;
	
		extract(cth_shortcode_atts(array(
				'id' => '',
			  	'class'=>'',
			   	'layout'=>''
		), $atts));

		$tabstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramisttab');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$tabItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistTab', 'azuramisttab_sc' );	

	//owlcarousel Items
	function azuramisttab_item_sc( $atts, $content="" ){
		global $tabItemsArray;
		$tabItemsArray[] = array(
			'id'=>$atts['id'],
			'title'=>$atts['title'],
			'icontitle'=>$atts['icontitle'],
			'active'=>$atts['active'],
			'img'=>$atts['img'],
			'content'=>$content
		);
	}

	ElementParser::add_shortcode( 'AzuraMistTabItem', 'azuramisttab_item_sc' );	

}

//[Mist Images Grid]
if(!function_exists('azuramistimagegrid_sc')) {

	$imageGridItemsArray = array();

	function azuramistimagegrid_sc( $atts, $content="" ) {

	 	global $imageGridItemsArray;
	
		extract(cth_shortcode_atts(array(
				'id' => '',
			  	'class'=>'',
			  	'width'=>'',
			  	'height'=>'',
			  	'rows'=>'',
			  	'cols'=>'',
			  	'interval'=>'',
			  	'animspeed'=>'',
			  	'step'=>'',
			   	'layout'=>''
		), $atts));

		$imagegridstyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistimagegrid');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$imageGridItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistImageGrid', 'azuramistimagegrid_sc' );	

	//owlcarousel Items
	function azuramistimagegrid_item_sc( $atts, $content="" ){
		global $imageGridItemsArray;
		$imageGridItemsArray[] = array(
			'img'=>$atts['img'],
			'link'=>$atts['link']
		);
	}

	ElementParser::add_shortcode( 'AzuraMistImageGridItem', 'azuramistimagegrid_item_sc' );	

}

//[Mist Images Grid]
if(!function_exists('azuramistmap3_sc')) {

	//$imageGridItemsArray = array();

	function azuramistmap3_sc( $atts, $content="" ) {

	 	//global $imageGridItemsArray;
	
		extract(cth_shortcode_atts(array(
				'selectMap' => '',
			  	'gmaplat'=>'',
			  	'gmaplog'=>'',
			  	'zoom'=>'',
			  	'scrollwheel'=>'',
			  	'zoomcontrol'=>'',
			  	'draggable'=>'',
			  	'mapType'=>'',
			  	'hue'=>'',
			   	'title'=>'',
                'height'=>''
		), $atts));

		$map3style = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistmap3');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		//$imageGridItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistMap3', 'azuramistmap3_sc' );	

}

//[Mist Images Grid]
if(!function_exists('azuramistvideo_sc')) {

	//$imageGridItemsArray = array();

	function azuramistvideo_sc( $atts, $content="" ) {

	 	//global $imageGridItemsArray;
	
		extract(cth_shortcode_atts(array(
				'id' => '',
                'link' => '',
                'containment'=>'',
                'startat'=>'0',
                'mute'=>'',
                'autoplay'=>'',
                'showcontrols'=>''
		), $atts));

		$videostyle = AzuraShortcode::buildStyle($atts);

		$animation_data = AzuraShortcode::buildAnimation($atts,'animate');

		$shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuramistvideo');
		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		//$imageGridItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraMistVideo', 'azuramistvideo_sc' );	

} 

//[Azura Divider]
if(!class_exists('AzuraShortcode_azuradivider')){
  class AzuraShortcode_azuradivider extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraDivider', 'azuradivider_sc' );
}
//[Iconbox]
if(!class_exists('AzuraShortcode_azuraiconbox')){
	class AzuraShortcode_azuraiconbox extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraIconBox', 'azuraiconbox_sc' );
}
//[Team Member]
if(!class_exists('AzuraShortcode_azurateammember')){
	class AzuraShortcode_azurateammember extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraTeamMember', 'azurateammember_sc' );
}
//[Feature box]
if(!class_exists('AzuraShortcode_azurafeaturebox')){
	class AzuraShortcode_azurafeaturebox extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraFeatureBox', 'azurafeaturebox_sc' );
}
//[K2 Item View]
if(!class_exists('AzuraShortcode_azurak2itemview')){
	class AzuraShortcode_azurak2itemview extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraK2ItemView', 'azurak2itemview_sc' );
}
//[Work MistK2CatView]
if(!class_exists('AzuraShortcode_azuramistk2catview')){
	class AzuraShortcode_azuramistk2catview extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistK2CatView', 'azuramistk2catview_sc' );
}
//[Circle Skill]
if(!class_exists('AzuraShortcode_azuracirskill')){
	class AzuraShortcode_azuracirskill extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraCirSkill', 'azuracirskill_sc' );
}
//[Work K2]
if(!class_exists('AzuraShortcode_azuraworkk2')){
	class AzuraShortcode_azuraworkk2 extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraWorkK2', 'azuraworkk2_sc' );
}
//[Work K3]
if(!class_exists('AzuraShortcode_azuraworkk3')){
	class AzuraShortcode_azuraworkk3 extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraWorkK3', 'azuraworkk3_sc' );
}
//[Mist Title]
if(!class_exists('AzuraShortcode_azuramisttitle')){
	class AzuraShortcode_azuramisttitle extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistTitle', 'azuramisttitle_sc' );
}

//[K2 List Items View]
if(!class_exists('AzuraShortcode_azuramistk2catview')){
	class AzuraShortcode_azuramistk2catview extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistK2CatView', 'azuramistk2catview_sc' );
}
//[Skill Circle]
if(!class_exists('AzuraShortcode_azuramistskillscircle')){
	class AzuraShortcode_azuramistskillscircle extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistSkillsCircle', 'azuramistskillscircle_sc' );
}
//[Single Image]
if(!class_exists('AzuraShortcode_azuramistsingleimage')){
	class AzuraShortcode_azuramistsingleimage extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistSingleImage', 'azuramistsingleimage_sc' );
}
//[Pricing Table With Image]
if(!class_exists('AzuraShortcode_azuramistpricing')){
	class AzuraShortcode_azuramistpricing extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistPricing', 'azuramistpricing_sc' );
}
//[Bakery Product]
if(!class_exists('AzuraShortcode_azuramistbakeryproduct')){
	class AzuraShortcode_azuramistbakeryproduct extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistBakeryProduct', 'azuramistbakeryproduct_sc' );
}
//[Bakery Product]
if(!class_exists('AzuraShortcode_azuramistcareersregister')){
	class AzuraShortcode_azuramistcareersregister extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistCareersRegister', 'azuramistcareersregister_sc' );
}

//[Real Estate Produc]
if(!class_exists('AzuraShortcode_azuramistrealestateproduct')){
	class AzuraShortcode_azuramistrealestateproduct extends AzuraShortcode{}
	ElementParser::add_shortcode( 'AzuraMistRealEstateProduct', 'azuramistrealestateproduct_sc' );
}