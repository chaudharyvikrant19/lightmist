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

//1. [Accordion]
if(!function_exists('azuraaccordion_sc')) {
	
	$accordionItemsArray = array();

	function azuraaccordion_sc( $atts, $content="" ) {

		global $accordionItemsArray;
	
		extract(cth_shortcode_atts(array(
			   'id' => '',
			   'class' => '',
			   'defaultactive'=>'1',
			   'acctype'=>'',
			   'layout'=>''
		 ), $atts));

    $accordionstyle = AzuraShortcode::buildStyle($atts);

    $animation_data = AzuraShortcode::buildAnimation($atts,'animate');

    $shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuraaccordion');
    
    
    $buffer = ob_get_clean();
    
    ob_start();
    
    if($shortcodeTemp !== false) require $shortcodeTemp;
    
    $content = ob_get_clean();
    
    ob_start();
    
    echo $buffer;

    $accordionItemsArray = array();
    
    return $content;
		
	}
		
	ElementParser::add_shortcode( 'AzuraAccordion', 'azuraaccordion_sc' );

	function azuraaccordionitem_sc( $atts, $content="" ) {

		global $accordionItemsArray;


		$accordionItemsArray[] = array(
      //'id'=>$atts['id'],
      'class'=>$atts['class'],
      'title'=>$atts['title'],
      //'subtitle'=>$atts['subtitle'],
      'content'=>$content
    );

		
	}
		
	ElementParser::add_shortcode( 'AzuraAccordionItem', 'azuraaccordionitem_sc' );
}
//[2. Alert]
if(!class_exists('AzuraShortcode_azuraalert')){
  class AzuraShortcode_azuraalert extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraAlert', 'azuraalert_sc' );
}
//[3. Article Grid]
if(!class_exists('AzuraShortcode_azuraarticlesgrid')){
  class AzuraShortcode_azuraarticlesgrid extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraArticlesGrid', 'azuraarticlesgrid_sc' );
}
//[4. Article Slider]
if(!class_exists('AzuraShortcode_azuraarticlesslider')){
  class AzuraShortcode_azuraarticlesslider extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraArticlesSlider', 'azuraarticlesslider_sc' );
}
//5.[Bs Carousel]
if(!function_exists('azurabscarousel_sc')) {
	
	$bsCarouselItemsArray = array();

	function azurabscarousel_sc( $atts, $content="" ) {
		global $bsCarouselItemsArray;
		
	
		extract(cth_shortcode_atts(array(
			   'id' => '',
			   'class' => '',
			   'interval'=>'5000',
			   'pause'=>'hover',
			   'wrap'=>'1',
			   'keyboard'=>'1',
			   'navigation'=>'1',
			   'pagination'=>'1',
			   'layout'=>''
		 ), $atts));

    $bscarouselstyle = AzuraShortcode::buildStyle($atts);

    $animation_data = AzuraShortcode::buildAnimation($atts,'animate');

    $shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azurabscarousel');
    
    
    $buffer = ob_get_clean();
    
    ob_start();
    
    if($shortcodeTemp !== false) require $shortcodeTemp;
    
    $content = ob_get_clean();
    
    ob_start();
    
    echo $buffer;

    $bsCarouselItemsArray = array();
    
    return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraBsCarousel', 'azurabscarousel_sc' );


	//[Bs Carousel Item]
	function azurabscarousel_item_sc( $atts, $content="" ) {

		global $bsCarouselItemsArray;

		$bsCarouselItemsArray[] = array(
      'id'=>$atts['id'],
      'class'=>$atts['class'],
      'image'=>$atts['image'],
      'content'=>$content
    );
	
		
	}
		
	ElementParser::add_shortcode( 'AzuraBsCarouselItem', 'azurabscarousel_item_sc' );
}
//6.[Button]
if(!class_exists('AzuraShortcode_azurabutton')){
  class AzuraShortcode_azurabutton extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraButton', 'azurabutton_sc' );
}
//7.[Button Link]
if(!class_exists('AzuraShortcode_azurabuttonlink')){
  class AzuraShortcode_azurabuttonlink extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraButtonLink', 'azurabuttonlink_sc' );
}
//8.[Custom heading]
if(!class_exists('AzuraShortcode_azuraheading')){
  class AzuraShortcode_azuraheading extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraHeading', 'azuraheading_sc' );
}
//[9. Contact Form]
if(!class_exists('AzuraShortcode_azuracontactform')){
  class AzuraShortcode_azuracontactform extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraContactForm', 'azuracontactform_sc' );
}
//[10. Container]
if(!class_exists('AzuraShortcode_azuracontainer')){
  class AzuraShortcode_azuracontainer extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraContainer', 'azuracontainer_sc' );
}
//11.[Call to action]
if(!class_exists('AzuraShortcode_azuracta')){
  class AzuraShortcode_azuracta extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraCTA', 'azuracta_sc' );
}
//12.[Facebook Like box]
if(!class_exists('AzuraShortcode_azurafacebooklike')){
  class AzuraShortcode_azurafacebooklike extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraFacebookLike', 'azurafacebooklike_sc' );
}
//13.[Flex Slider]
if(!function_exists('azuraflexslider_sc')) {
	
	$flexSliderItemsArray = array();

	function azuraflexslider_sc( $atts, $content="" ) {
		global $flexSliderItemsArray;
		
	
		extract(cth_shortcode_atts(array(
			   'id' => '',
			   'class' => 'flexslider',
			   'flexanimation'=>'fade',
			   'direction'=>'horizontal',
			   'slideshow'=>'1',
			   'slideshowspeed'=>'700',
			   'animationspeed'=>'600',
			   // 'pagination'=>'1',
			   'layout'=>''
		 ), $atts));

    $flexsliderstyle = AzuraShortcode::buildStyle($atts);

    $animation_data = AzuraShortcode::buildAnimation($atts,'animate');

    $shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuraflexslider');
    
    
    $buffer = ob_get_clean();
    
    ob_start();
    
    if($shortcodeTemp !== false) require $shortcodeTemp;
    
    $content = ob_get_clean();
    
    ob_start();
    
    echo $buffer;

    $flexSliderItemsArray = array();
    
    return $content;


		
	}
		
	ElementParser::add_shortcode( 'AzuraFlexSlider', 'azuraflexslider_sc' );


	//[Bs Carousel Item]
	function azuraflexslider_item_sc( $atts, $content="" ) {

		global $flexSliderItemsArray;

		$flexSliderItemsArray[] = array(
      /*'id'=>$atts['id'],*/
      'class'=>$atts['class'],
      'slideimage'=>$atts['slideimage'],
      'content'=>$content
    );
	
		
	}
		
	ElementParser::add_shortcode( 'AzuraFlexSliderItem', 'azuraflexslider_item_sc' );
}
//14.[Flickr Feed]
if(!class_exists('AzuraShortcode_azuraflickr')){
  class AzuraShortcode_azuraflickr extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraFlickr', 'azuraflickr_sc' );
}
//15.[Gallery]
if(!function_exists('azuragallery_sc')) {
	
	$galleryItemsArray = array();

	function azuragallery_sc( $atts, $content="" ) {

		global $galleryItemsArray;
	
		extract(cth_shortcode_atts(array(
			   'id' => '',
			   'extraclass' => '',
			   'gridwidth'=>'20',
			   'gallery'=>'',
			   'layout'=>''
		 ), $atts));

    $gallerystyle = AzuraShortcode::buildStyle($atts);

    $animation_data = AzuraShortcode::buildAnimation($atts,'animate');

    $shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuragallery');
    
    
    $buffer = ob_get_clean();
    
    ob_start();
    
    if($shortcodeTemp !== false) require $shortcodeTemp;
    
    $content = ob_get_clean();
    
    ob_start();
    
    echo $buffer;

    $galleryItemsArray = array();
    
    return $content;
		
	}
		
	ElementParser::add_shortcode( 'AzuraGallery', 'azuragallery_sc' );

	function azuragalleryitem_sc( $atts, $content="" ) {

		global $galleryItemsArray;


		$galleryItemsArray[] = array(
									'slideimage'=>$atts['slideimage'],
									'usepretty'=>$atts['usepretty'],
									'largeimage'=>$atts['largeimage'],
									'imagelink'=>$atts['imagelink'],
									'extraclass'=>$atts['extraclass'],
									'content'=>$content);

		
	}
		
	ElementParser::add_shortcode( 'AzuraGalleryItem', 'azuragalleryitem_sc' );
}
//16.[Azura Gmap]
if(!class_exists('AzuraShortcode_azuragmap')){
  class AzuraShortcode_azuragmap extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraGMap', 'azuragmap_sc' );
}
//17.[Google plus button]
if(!function_exists('azuragoogleplus_sc')) {

	function azuragoogleplus_sc( $atts, $content="" ) {
	
		extract(cth_shortcode_atts(array(
			   // 'id' => '',
			'url'=>'',
			   'size' => 'standard',
			   'annotation' => 'bubble',
			   'extraclass'=>'',
			   'layout'=>''
		 ), $atts));

		$styleArr = cth_shortcode_atts(array(

               'margin_top'=>'',
               'margin_right' => '',
			   'margin_bottom'=>'',
               'margin_left'=>'',

               'border_top_width'=>'',
               'border_right_width' => '',
			   'border_bottom_width'=>'',
               'border_left_width'=>'',

               'padding_top'=>'',
               'padding_right' => '',
			   'padding_bottom'=>'',
               'padding_left'=>'',

               'border_color'=>'',
               'border_style' => '',

			   'background_color'=>'',
               'background_image'=>'',
               'background_repeat'=>'',
               'background_attachment'=>'',
               'background_size'=>'',
               'additional_style'=>'',
               'simplified'=>''

		 ), $atts);

		$styleTextArr = ElementParser::parseStyle($styleArr);

		$googleplusstyle = '';

		$styleText = implode(" ", $styleTextArr);
		
		$styleTextTest = trim($styleText);
		if(!empty($styleTextTest)){
			$googleplusstyle .= trim($styleText);
		}

		if(!empty($googleplusstyle)){
			$googleplusstyle = 'style="'.$googleplusstyle.'"';
		}

		$animationArgs = cth_shortcode_atts(array(

               'animation'=>'0',
               'trigger' => 'animate-in',
			   'animationtype'=>'',
			   'hoveranimationtype'=>'',
			   'infinite'=>'0',
               'animationdelay'=>'0',
               'animationduration'=>'',

		 ), $atts);


		$shortcodeTemp = false;

		if(stripos($layout, '_:') !== false){
			$shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR . '/elements/shortcodes_template/'.substr($layout, 2).'.php';
		}else{
			if(stripos($layout, ':') !== false){
				$shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
			}else{
				$shortcodeTemp = ElementParser::addShortcodeTemplate('azuragoogleplus');
			}
		}


		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraGooglePlus', 'azuragoogleplus_sc' );
}
//18.[Html]
if(!class_exists('AzuraShortcode_azurahtml')){
  class AzuraShortcode_azurahtml extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraHtml', 'azurahtml_sc' );
}
//19.[Single Image]
if(!class_exists('AzuraShortcode_azuraimage')){
  class AzuraShortcode_azuraimage extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraImage', 'azuraimage_sc' );
}
//20.[Raw JS]
if(!function_exists('azurajs_sc')) {

	function azurajs_sc( $atts, $content="" ) {
	 
        return $content;
	}
		
	ElementParser::add_shortcode( 'AzuraJS', 'azurajs_sc' );
}
//21.[Joomla Module]
if(!class_exists('AzuraShortcode_azuramodule')){
    class AzuraShortcode_azuramodule extends AzuraShortcode{}
    ElementParser::add_shortcode( 'AzuraModule', 'azuramodule_sc' );
}

//22.[Nivo Slider]
if(!function_exists('azuranivoslider_sc')) {
	
	$nivosliderItemsArray = array();

	function azuranivoslider_sc( $atts, $content="" ) {

		global $nivosliderItemsArray;
	
		extract(cth_shortcode_atts(array(
			   'id' => '',
			   'extraclass' => '',
			   'defaultactive'=>'1',
			   'acctype'=>'',
			   'layout'=>''
		 ), $atts));

		$styleArr = cth_shortcode_atts(array(

               'margin_top'=>'',
               'margin_right' => '',
			   'margin_bottom'=>'',
               'margin_left'=>'',

               'border_top_width'=>'',
               'border_right_width' => '',
			   'border_bottom_width'=>'',
               'border_left_width'=>'',

               'padding_top'=>'',
               'padding_right' => '',
			   'padding_bottom'=>'',
               'padding_left'=>'',

               'border_color'=>'',
               'border_style' => '',

			   'background_color'=>'',
               'background_image'=>'',
               'background_repeat'=>'',
               'background_attachment'=>'',
               'background_size'=>'',
               'additional_style'=>'',
               'simplified'=>''

		 ), $atts);

		$styleTextArr = ElementParser::parseStyle($styleArr);

		$nivosliderstyle = '';

		$styleText = implode(" ", $styleTextArr);
		
		$styleTextTest = trim($styleText);
		if(!empty($styleTextTest)){
			$nivosliderstyle .= trim($styleText);
		}

		if(!empty($nivosliderstyle)){
			$nivosliderstyle = 'style="'.$nivosliderstyle.'"';
		}

		$animationArgs = cth_shortcode_atts(array(

               'animation'=>'0',
               'trigger' => 'animate-in',
			   'animationtype'=>'',
			   'hoveranimationtype'=>'',
			   'infinite'=>'0',
               'animationdelay'=>'0',
               'animationduration'=>'',

		 ), $atts);



		$shortcodeTemp = false;

		if(stripos($layout, '_:') !== false){
			$shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR.'/elements/shortcodes_template/'.substr($layout, 2).'.php';
		}else{
			if(stripos($layout, ':') !== false){
				$shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
			}else{
				$shortcodeTemp = ElementParser::addShortcodeTemplate('azuranivoslider');
			}
		}


		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;

		$nivosliderItemsArray = array();
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraNivoSlider', 'azuranivoslider_sc' );

	function azuranivoslideritem_sc( $atts, $content="" ) {

		global $nivosliderItemsArray;


		$nivosliderItemsArray[] = array('slideimage'=>$atts['slideimage'],'imagelink'=>$atts['imagelink'],'extraclass'=>$atts['extraclass'],'content'=>$content);

		
	}
		
	ElementParser::add_shortcode( 'AzuraNivoSliderItem', 'azuranivoslideritem_sc' );
}
//23.[Pinterest button]
if(!function_exists('azurapinterest_sc')) {

	function azurapinterest_sc( $atts, $content="" ) {
	
		extract(cth_shortcode_atts(array(
			   // 'id' => '',
				'url'=>'',
			   'size' => '28',
			   'shape'=>'rect',
			   'annotation' => 'above',
			   'extraclass'=>'',
			   'layout'=>''
		 ), $atts));

		$styleArr = cth_shortcode_atts(array(

               'margin_top'=>'',
               'margin_right' => '',
			   'margin_bottom'=>'',
               'margin_left'=>'',

               'border_top_width'=>'',
               'border_right_width' => '',
			   'border_bottom_width'=>'',
               'border_left_width'=>'',

               'padding_top'=>'',
               'padding_right' => '',
			   'padding_bottom'=>'',
               'padding_left'=>'',

               'border_color'=>'',
               'border_style' => '',

			   'background_color'=>'',
               'background_image'=>'',
               'background_repeat'=>'',
               'background_attachment'=>'',
               'background_size'=>'',
               'additional_style'=>'',
               'simplified'=>''

		 ), $atts);

		$styleTextArr = ElementParser::parseStyle($styleArr);

		$pintereststyle = '';

		$styleText = implode(" ", $styleTextArr);
		
		$styleTextTest = trim($styleText);
		if(!empty($styleTextTest)){
			$pintereststyle .= trim($styleText);
		}

		if(!empty($pintereststyle)){
			$pintereststyle = 'style="'.$pintereststyle.'"';
		}

		$animationArgs = cth_shortcode_atts(array(

               'animation'=>'0',
               'trigger' => 'animate-in',
			   'animationtype'=>'',
			   'hoveranimationtype'=>'',
			   'infinite'=>'0',
               'animationdelay'=>'0',
               'animationduration'=>'',

		 ), $atts);


		$shortcodeTemp = false;

		if(stripos($layout, '_:') !== false){
			$shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR . '/elements/shortcodes_template/'.substr($layout, 2).'.php';
		}else{
			if(stripos($layout, ':') !== false){
				$shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
			}else{
				$shortcodeTemp = ElementParser::addShortcodeTemplate('azurapinterest');
			}
		}


		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;
		
		return $content;

		
	}
		
	ElementParser::add_shortcode( 'AzuraPinterest', 'azurapinterest_sc' );
}
//24.[Progress]
if(!class_exists('AzuraShortcode_azuraprogress')){
    class AzuraShortcode_azuraprogress extends AzuraShortcode{}
    ElementParser::add_shortcode( 'AzuraProgress', 'azuraprogress_sc' );
}
//[25.Row - Column]
if(!function_exists('azurarow_sc')) {

  $rowColumnsArray = array();

  function azurarow_sc( $atts, $content="" ) {
  
    extract(cth_shortcode_atts(array(
         'id' => '',
         'secclass'=>'',
         'class' => '',
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
//26.[Separator]
if(!class_exists('AzuraShortcode_azuraseparator')){
    class AzuraShortcode_azuraseparator extends AzuraShortcode{}
    ElementParser::add_shortcode( 'AzuraSeparator', 'azuraseparator_sc' );
}
//27.[Separator Text]
if(!class_exists('AzuraShortcode_azuraseparatortext')){
    class AzuraShortcode_azuraseparatortext extends AzuraShortcode{}
    ElementParser::add_shortcode( 'AzuraSeparatorText', 'azuraseparatortext_sc' );
}

//28.[Spacer]
if(!function_exists('azuraspacer_sc')) {

	function azuraspacer_sc( $atts, $content="" ) {

        extract(cth_shortcode_atts(array(
                'id' => '',
                'extraclass'=>'',
                'height'=>'35',
        ), $atts));

        $classes = 'azura_spacer';

        if(!empty($extraclass)){
            $classes .= ' '.$extraclass;
        }

        $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';

        $regexr = preg_match($pattern,$height,$matches);

        $value = isset( $matches[1] ) ? (float) $matches[1] : '35';
        $unit = isset( $matches[2] ) ? $matches[2] : 'px';
        $height = $value . $unit;

        $stylecss = ( (float) $height >= 0.0 ) ? ' style="height: '.$height.'"' : '';

        $html = '<div class="'.$classes.'" '.$stylecss.'><span class="azura_spacer_inner"></span></div>';

        
	 
        return $html;
	}
		
	ElementParser::add_shortcode( 'AzuraSpacer', 'azuraspacer_sc' );
}
//29.[Subscribe form]
if(!function_exists('azurasubscribeform_sc')) {

	function azurasubscribeform_sc( $atts, $content="" ) {
	
		extract(cth_shortcode_atts(array(
               'receiveemail'=>'',
               'emailsubject'=>'',
			   'thanksmessage'=>'',
			   'id'=>'',
			   'extraclass'=>'',
			   'layout'=>''
		 ), $atts));

		$styleArr = cth_shortcode_atts(array(

               'margin_top'=>'',
               'margin_right' => '',
			   'margin_bottom'=>'',
               'margin_left'=>'',

               'border_top_width'=>'',
               'border_right_width' => '',
			   'border_bottom_width'=>'',
               'border_left_width'=>'',

               'padding_top'=>'',
               'padding_right' => '',
			   'padding_bottom'=>'',
               'padding_left'=>'',

               'border_color'=>'',
               'border_style' => '',

			   'background_color'=>'',
               'background_image'=>'',
               'background_repeat'=>'',
               'background_attachment'=>'',
               'background_size'=>'',
               'additional_style'=>'',
               'simplified'=>''

		 ), $atts);

		$styleTextArr = ElementParser::parseStyle($styleArr);

		$subscribestyle = '';

		$styleText = implode(" ", $styleTextArr);
		

		$styleTextTest = trim($styleText);
		if(!empty($styleTextTest)){
			$subscribestyle .= trim($styleText);
		}

		if(!empty($subscribestyle)){
			$subscribestyle = 'style="'.$subscribestyle.'"';
		}

		$animationArgs = cth_shortcode_atts(array(

               'animation'=>'0',
               'trigger' => 'animate-in',
			   'animationtype'=>'',
			   'hoveranimationtype'=>'',
			   'infinite'=>'0',
               'animationdelay'=>'0',
               'animationduration'=>'',

		 ), $atts);

		$shortcodeTemp = false;

		if(stripos($layout, '_:') !== false){
			$shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR . '/elements/shortcodes_template/'.substr($layout, 2).'.php';
		}else{
			if(stripos($layout, ':') !== false){
				$shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
			}else{
				$shortcodeTemp = ElementParser::addShortcodeTemplate('azurasubscribe');
			}
		}


		
		
		$buffer = ob_get_clean();
		
		ob_start();
		
		if($shortcodeTemp !== false) require $shortcodeTemp;
		
		$content = ob_get_clean();
		
		ob_start();
		
		echo $buffer;
		
		return $content;

	 
	}
		
	ElementParser::add_shortcode( 'AzuraSubscribe', 'azurasubscribeform_sc' );
}
//30.[Tab]
if(!function_exists('azuratabs_sc')) {

	$tabsItemsArray = array();

	function azuratabs_sc( $atts, $content="" ){

		global $tabsItemsArray;

		extract(cth_shortcode_atts(array(
			  'id' => '',
			  'class'=>'',
			  'tabstyle'=>'tab',
			  'usejustified'=>'0',
			  'fade'=>'1',
			  'defaultactive'=>'1',
			  'layout'=>''
		 ), $atts));

    $tabsstyle = AzuraShortcode::buildStyle($atts);

    $animation_data = AzuraShortcode::buildAnimation($atts,'animate');

    $shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuratabs');
    
    
    $buffer = ob_get_clean();
    
    ob_start();
    
    if($shortcodeTemp !== false) require $shortcodeTemp;
    
    $content = ob_get_clean();
    
    ob_start();
    
    echo $buffer;

    $tabsItemsArray = array();
    
    return $content;
	}


	ElementParser::add_shortcode( 'AzuraTabs', 'azuratabs_sc' );

	//Tab Items
	function azuratabs_item_sc( $atts, $content="" ){
		global $tabsItemsArray;

		$tabsItemsArray[] = array(
      'id'=>$atts['id'],
      'class'=>$atts['class'],
      'title'=>$atts['title'],
      /*'iconclass'=>$atts['iconclass'],*/
      'content'=>$content
    );
		
	}

	ElementParser::add_shortcode( 'AzuraTabsItem', 'azuratabs_item_sc' );
		
}
//31.[Text]
if(!class_exists('AzuraShortcode_azuratext')){
  class AzuraShortcode_azuratext extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraText', 'azuratext_sc' );
}
//32.[Tour]
if(!function_exists('azuratour_sc')) {

	$tabsItemsArray = array();

	function azuratour_sc( $atts, $content="" ){

		global $tourItemsArray;

		extract(cth_shortcode_atts(array(
			  'id' => '',
			  'class'=>'',
			  'tabstyle'=>'tab',
			  'tabposition'=>'left',
			  'verticaltext'=>'0',
			  'fade'=>'1',
			  'defaultactive'=>'1',
			  'layout'=>''
		 ), $atts));

    $tourstyle = AzuraShortcode::buildStyle($atts);

    $animation_data = AzuraShortcode::buildAnimation($atts,'animate');

    $shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azuratour');
    
    
    $buffer = ob_get_clean();
    
    ob_start();
    
    if($shortcodeTemp !== false) require $shortcodeTemp;
    
    $content = ob_get_clean();
    
    ob_start();
    
    echo $buffer;

    $tourItemsArray = array();
    
    return $content;

	}


	ElementParser::add_shortcode( 'AzuraTour', 'azuratour_sc' );

	//Tab Items
	function azuratour_item_sc( $atts, $content="" ){
		global $tourItemsArray;

		$tourItemsArray[] = array(
      'id'=>$atts['id'],
      'class'=>$atts['class'],
      'title'=>$atts['title'],
      'iconclass'=>$atts['iconclass'],
      'content'=>$content
    );
		
	}

	ElementParser::add_shortcode( 'AzuraTourItem', 'azuratour_item_sc' );
	
		
}
//33.[Tweets Feed]
// if(!function_exists('azuratweets_sc')) {

// 	function azuratweets_sc( $atts, $content="" ) {
	
// 		extract(cth_shortcode_atts(array(
// 				'twittername' 				=>	'Cththemes',
// 				'consumer_key'				=>	'b1gNFU5p55j7GR0vACWyZf0j8',
// 				'consumer_key_secret' 		=>	'V0a7UkD0XTuP4zdoJoBPlpbQC9TtGk8ucotXRZZZP4MYv7TkK2',
// 				'access_token'				=>	'2549127786-T8zZA3d7cJcgDkI2kwbfQ2XeU8exphGZu3hZVvK',
// 				'access_token_secret' 		=>	'pQXlpkL9CSCIsEnGF5xgsjKObDRWcD77thGkFG9RLzgjs',
// 				'count'						=>	'3',
// 				'layout'=>''
// 		), $atts));

// 		$params = array(
// 				'twittername'=>$twittername,
// 				'consumer_key'=>$consumer_key,
// 				'consumer_key_secret'=>$consumer_key_secret,
// 				'access_token'=>$access_token,
// 				'access_token_secret'=>$access_token_secret,
// 				'counts'=>$count
// 		);
// 		require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/cthtweetshelper.php';

// 		$tweetsHelper = new CthTweetsHelper($params);

// 		$tweetsFeed = $tweetsHelper->fetch();

// 		$styleArr = cth_shortcode_atts(array(

//                'margin_top'=>'',
//                'margin_right' => '',
//                'margin_bottom'=>'',
//                'margin_left'=>'',

//                'border_top_width'=>'',
//                'border_right_width' => '',
//                'border_bottom_width'=>'',
//                'border_left_width'=>'',

//                'padding_top'=>'',
//                'padding_right' => '',
//                'padding_bottom'=>'',
//                'padding_left'=>'',

//                'border_color'=>'',
//                'border_style' => '',

//                'background_color'=>'',
//                'background_image'=>'',
//                'background_repeat'=>'',
//                'background_attachment'=>'',
//                'background_size'=>'',
//                'additional_style'=>'',
//                'simplified'=>''

//         ), $atts);

//         $styleTextArr = ElementParser::parseStyle($styleArr);

//         $tweetsstyle = '';

//         $styleText = implode(" ", $styleTextArr);
        
//         $styleTextTest = trim($styleText);
//         if(!empty($styleTextTest)){
//             $tweetsstyle .= trim($styleText);
//         }

//         if(!empty($tweetsstyle)){
//             $tweetsstyle = 'style="'.$tweetsstyle.'"';
//         }

//         // animation
//         $animationArgs = cth_shortcode_atts(array(

//                'animation'=>'0',
//                'trigger' => 'animate-in',
// 			   'animationtype'=>'',
// 			   'hoveranimationtype'=>'',
// 			   'infinite'=>'0',
//                'animationdelay'=>'0',
//                'animationduration'=>'',

// 		), $atts);

//         $shortcodeTemp = false;

// 		if(stripos($layout, '_:') !== false){
// 			$shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR . '/elements/shortcodes_template/'.substr($layout, 2).'.php';
// 		}else{
// 			if(stripos($layout, ':') !== false){
// 				$shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
// 			}else{
// 				$shortcodeTemp = ElementParser::addShortcodeTemplate('azuratweets');
// 			}
// 		}


		
		
// 		$buffer = ob_get_clean();
		
// 		ob_start();
		
// 		if($shortcodeTemp !== false) require $shortcodeTemp;
		
// 		$content = ob_get_clean();
		
// 		ob_start();
		
// 		echo $buffer;

// 		$accordionItem = null;
		
// 		return $content;
	 
// 	}
		
// 	ElementParser::add_shortcode( 'AzuraTweets', 'azuratweets_sc' );
// }
//33.[Azura Tweets]
if(!class_exists('AzuraShortcode_azuratweets')){
    class AzuraShortcode_azuratweets extends AzuraShortcode{}
    ElementParser::add_shortcode( 'AzuraTweets', 'azuratweets_sc' );
}
//34.[Twitter button]
// if(!function_exists('azuratwittershare_sc')) {

// 	function azuratwittershare_sc( $atts, $content="" ) {
	
// 		extract(cth_shortcode_atts(array(
// 			   // 'id' => '',
// 			'url'=>'',
// 			   'screenname' => '',
// 			   'related' => '',
// 			   'count' => 'horizontal',
// 			   'extraclass'=>'',
// 			   'layout'=>''
// 		 ), $atts));

// 		$styleArr = cth_shortcode_atts(array(

//                'margin_top'=>'',
//                'margin_right' => '',
// 			   'margin_bottom'=>'',
//                'margin_left'=>'',

//                'border_top_width'=>'',
//                'border_right_width' => '',
// 			   'border_bottom_width'=>'',
//                'border_left_width'=>'',

//                'padding_top'=>'',
//                'padding_right' => '',
// 			   'padding_bottom'=>'',
//                'padding_left'=>'',

//                'border_color'=>'',
//                'border_style' => '',

// 			   'background_color'=>'',
//                'background_image'=>'',
//                'background_repeat'=>'',
//                'background_attachment'=>'',
//                'background_size'=>'',
//                'additional_style'=>'',
//                'simplified'=>''

// 		 ), $atts);

// 		$styleTextArr = ElementParser::parseStyle($styleArr);

// 		$twittersharestyle = '';

// 		$styleText = implode(" ", $styleTextArr);
		
// 		$styleTextTest = trim($styleText);
// 		if(!empty($styleTextTest)){
// 			$twittersharestyle .= trim($styleText);
// 		}

// 		if(!empty($twittersharestyle)){
// 			$twittersharestyle = 'style="'.$twittersharestyle.'"';
// 		}

// 		$animationArgs = cth_shortcode_atts(array(

//                'animation'=>'0',
//                'trigger' => 'animate-in',
// 			   'animationtype'=>'',
// 			   'hoveranimationtype'=>'',
// 			   'infinite'=>'0',
//                'animationdelay'=>'0',
//                'animationduration'=>'',

// 		 ), $atts);


// 		$shortcodeTemp = false;

// 		if(stripos($layout, '_:') !== false){
// 			$shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR . '/elements/shortcodes_template/'.substr($layout, 2).'.php';
// 		}else{
// 			if(stripos($layout, ':') !== false){
// 				$shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
// 			}else{
// 				$shortcodeTemp = ElementParser::addShortcodeTemplate('azuratwittershare');
// 			}
// 		}


		
		
// 		$buffer = ob_get_clean();
		
// 		ob_start();
		
// 		if($shortcodeTemp !== false) require $shortcodeTemp;
		
// 		$content = ob_get_clean();
		
// 		ob_start();
		
// 		echo $buffer;
		
// 		return $content;

		
// 	}
		
// 	ElementParser::add_shortcode( 'AzuraTwitterShare', 'azuratwittershare_sc' );
// }
//34.[Twitter Share]
if(!class_exists('AzuraShortcode_azuratwittershare')){
    class AzuraShortcode_azuratwittershare extends AzuraShortcode{}
    ElementParser::add_shortcode( 'AzuraTwitterShare', 'azuratwittershare_sc' );
}
//35.[video]
if(!class_exists('AzuraShortcode_azuravideo')){
  class AzuraShortcode_azuravideo extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraVideo', 'azuravideo_sc' );
}

// if(!function_exists('azuravideo_sc')) {
// 	function azuravideo_sc( $atts, $content="" ){
	
// 		extract(cth_shortcode_atts(array(
// 				'id'=>'',
// 				'class'=>'',
// 				'autoplay'=>'0',
// 				'loop'=>'0',
// 				'width'=>'',
// 				'height'=>'',
// 				'fitvids'=>'0',
// 				'layout' => ''
// 		), $atts));

// 		$styleArr = cth_shortcode_atts(array(

//                	'margin_top'=>'',
//                	'margin_right' => '',
//          		'margin_bottom'=>'',
//                	'margin_left'=>'',

//                	'border_top_width'=>'',
//                	'border_right_width' => '',
//          		'border_bottom_width'=>'',
//                	'border_left_width'=>'',

//                	'padding_top'=>'',
//                	'padding_right' => '',
//          		'padding_bottom'=>'',
//                	'padding_left'=>'',

//                	'border_color'=>'',
//                	'border_style' => '',

//          		'background_color'=>'',
//                	'background_image'=>'',
//                	'background_repeat'=>'',
//                	'background_attachment'=>'',
//                	'background_size'=>'',
//                	'additional_style'=>'',
//                	'simplified'=>''

// 	    ), $atts);

// 	    $styleTextArr = ElementParser::parseStyle($styleArr);

// 	    $videostyle = '';

// 	    $styleText = implode(" ", $styleTextArr);
	    

// 	    $styleTextTest = trim($styleText);

// 	    if(!empty($styleTextTest)){
// 	      	$videostyle .= trim($styleText);
// 	    }

// 	    if(!empty($videostyle)){
// 	      	$videostyle = 'style="'.$videostyle.'"';
// 	    }

// 		$animationArgs = cth_shortcode_atts(array(

// 		       'animation'=>'0',
// 		       'trigger' => 'animate-in',
// 			   'animationtype'=>'',
// 			   'hoveranimationtype'=>'',
// 			   'infinite'=>'0',
// 		       'animationdelay'=>'0',
// 		       'animationduration'=>'',

// 	 	), $atts);

// 		$video = parse_url($content);
			
// 		switch($video['host']) {
// 				case 'youtu.be':
// 					$vid = trim($video['path'],'/');
// 					$src = 'https://www.youtube.com/embed/' . $vid;
// 				break;
				
// 				case 'www.youtube.com':
// 				case 'youtube.com':
// 					parse_str($video['query'], $query);
// 					$vid = $query['v'];
// 					$src = 'https://www.youtube.com/embed/' . $vid;
// 				break;
				
// 				case 'vimeo.com':
// 				case 'www.vimeo.com':
// 					$vid = trim($video['path'],'/');
// 					$src = "http://player.vimeo.com/video/{$vid}";
// 		}

// 		$shortcodeTemp = false;

// 		if(stripos($layout, '_:') !== false){
// 			$shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR . '/elements/shortcodes_template/'.substr($layout, 2).'.php';
// 		}else{
// 			if(stripos($layout, ':') !== false){
// 				$shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
// 			}else{
// 				$shortcodeTemp = ElementParser::addShortcodeTemplate('azuravideo');
// 			}
// 		}
		
// 		$buffer = ob_get_clean();
		
// 		ob_start();
		
// 		if($shortcodeTemp !== false) require $shortcodeTemp;
		
// 		$content = ob_get_clean();
		
// 		ob_start();
		
// 		echo $buffer;
		
// 		return $content;

// 	}
	
// 	ElementParser::add_shortcode( 'AzuraVideo', 'azuravideo_sc' );
// }
//36.[Awesome Icon]
// if(!function_exists('faicon_sc')) {
// 	function faicon_sc( $atts, $content="" ){
	
// 		extract(cth_shortcode_atts(array(
// 				'name'=>'magic',
// 				'extraclass'=>'',
// 		), $atts));

// 		$html = '';
// 		$class = 'fa fa-'.$name;
// 		if(!empty($extraclass)){
// 			$class .=' '.$extraclass;
// 		}

// 		$html = '<i class="'.$class.'"></i>';
// 		return $html;
// 	}
	
// 	ElementParser::add_shortcode( 'FaIcon', 'faicon_sc' );
// }
//37.[Glyphicon Icon]
if(!function_exists('glyphicon_sc')) {
	function glyphicon_sc( $atts, $content="" ){
	
		extract(cth_shortcode_atts(array(
				'name'=>'ok-sign',
				'extraclass'=>'',
		), $atts));

		$html = '';
		$class = 'glyphicon glyphicon-'.$name;
		if(!empty($extraclass)){
			$class .=' '.$extraclass;
		}

		$html = '<i class="'.$class.'"></i>';
		return $html;
	}
	
	ElementParser::add_shortcode( 'glyphicon', 'glyphicon_sc' );
}
// //38.[VideoBg]
// if(!function_exists('azuravideobg_sc')) {
//   function azuravideobg_sc( $atts, $content="" ){
  
//     extract(cth_shortcode_atts(array(
//       'id'=>'',
//       'class'=>'player',
//       'link'=>'V2rifmjZuKQ',
//       'autoplay'=>'1',
//       'loop'=>'1',
//       'mute'=>'1',
//       'vol'=>'50',
//       'quality'=>'default',
//       'ratio'=>'4/3',
//       'opacity'=>'1',
//       'containment'=>'self',
//       'startat'=>'20',
//       'showcontrols'=>'1',
//       'layout' => '','scrollreveal'=>''
//     ), $atts));

//     $styleArr = cth_shortcode_atts(array(

//                'margin_top'=>'',
//                'margin_right' => '',
//          'margin_bottom'=>'',
//                'margin_left'=>'',

//                'border_top_width'=>'',
//                'border_right_width' => '',
//          'border_bottom_width'=>'',
//                'border_left_width'=>'',

//                'padding_top'=>'',
//                'padding_right' => '',
//          'padding_bottom'=>'',
//                'padding_left'=>'',

//                'border_color'=>'',
//                'border_style' => '',

//          'background_color'=>'',
//                'background_image'=>'',
//                'background_repeat'=>'',
//                'background_attachment'=>'',
//                'background_size'=>'',
//                'additional_style'=>'',
//                'simplified'=>''

//      ), $atts);

//     $styleTextArr = ElementParser::parseStyle($styleArr);

//     $videostyle = '';

//     $styleText = implode(" ", $styleTextArr);
    

//     $styleTextTest = trim($styleText);
//     if(!empty($styleTextTest)){
//       $videostyle .= trim($styleText);
//     }

//     if(!empty($videostyle)){
//       $videostyle = 'style="'.$videostyle.'"';
//     }

//     $shortcodeTemp = false;

//     if(stripos($layout, '_:') !== false){
//       $shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR . '/elements/shortcodes_template/'.substr($layout, 2).'.php';
//     }else{
//       if(stripos($layout, ':') !== false){
//         $shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
//       }else{
//         $shortcodeTemp = ElementParser::addShortcodeTemplate('azuravideobg');
//       }
//     }
    
//     $buffer = ob_get_clean();
    
//     ob_start();
    
//     if($shortcodeTemp !== false) require $shortcodeTemp;
    
//     $content = ob_get_clean();
    
//     ob_start();
    
//     echo $buffer;
    
//     return $content;

//   }
  
//   ElementParser::add_shortcode( 'AzuraVideoBg', 'azuravideobg_sc' );
// }
//[38. Video Bg]
if(!class_exists('AzuraShortcode_azuravideobg')){
  class AzuraShortcode_azuravideobg extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraVideoBg', 'azuravideobg_sc' );
}
//[39. TinyMce]
if(!class_exists('AzuraShortcode_azuratinymce')){
  class AzuraShortcode_azuratinymce extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraTinyMce', 'azuratinymce_sc' );
}
//[39. Faicon]
if(!class_exists('AzuraShortcode_faicon')){
  class AzuraShortcode_faicon extends AzuraShortcode {}
  ElementParser::add_shortcode( 'faicon', 'faicon_sc' );
}
// //[25.Row - Column]
// if(!function_exists('azurarow_sc')) {

//   $rowColumnsArray = array();

//   function azurarow_sc( $atts, $content="" ) {
  
//     extract(cth_shortcode_atts(array(
//          'id' => '',
//          'secclass'=>'',
//          'class' => '',
//          'isfullwidth'=>'0',
//          'stellar'=>'',
//          'layout'=>''
//      ), $atts));

//     global $rowColumnsArray;


    

    
//   }
    
//   ElementParser::add_shortcode( 'AzuraRow', 'azurarow_sc' );

//   function azuracolumn_sc( $colatts, $content="" ) {

//     global $rowColumnsArray;

    

//   }

//   ElementParser::add_shortcode( 'AzuraColumn', 'azuracolumn_sc' );
// }
//41.[Rowinner]
if(!function_exists('azurarowinner_sc')) {

  $rowInnerColumnsArray = array();

  function azurarowinner_sc( $atts, $content="" ) {
  
    extract(cth_shortcode_atts(array(
         'id' => '',
         'class' => '',
         'layout'=>''
     ), $atts));

    global $rowInnerColumnsArray;

    $rowinnerstyle = AzuraShortcode::buildStyle($atts);

    $animation_data = AzuraShortcode::buildAnimation($atts,'animate');

    $shortcodeTemp = AzuraShortcode::getTemplate( $atts, $content ,'azurarowinner');
    
    
    $buffer = ob_get_clean();
    
    ob_start();
    
    if($shortcodeTemp !== false) require $shortcodeTemp;
    
    $content = ob_get_clean();
    
    ob_start();
    
    echo $buffer;

    $rowInnerColumnsArray = array();
    
    return $content;

    
  }
    
  ElementParser::add_shortcode( 'AzuraRowInner', 'azurarowinner_sc' );

  function azuracolumninner_sc( $colatts, $content="" ) {

    global $rowInnerColumnsArray;
    $responsiveTxt = AzuraShortcode::buildResponsive($colatts, 'azp_');

    $colinnerStyle = AzuraShortcode::buildStyle($colatts);

    $animation_data = AzuraShortcode::buildAnimation($colatts,'animate');

    extract(cth_shortcode_atts(array(

            'id'=>'',
            'class' => '',
            //'wrapclass'=>'',
            'columnwidthclass'=>'col-md-12',
    ), $colatts));

    $rowInnerColumnsArray[] = array(
      'animationtrigger'=>$animation_data['trigger'],
      'animationdata'=>$animation_data['data'],

      'columnstyle'=> $colinnerStyle,

      //'id'=>$id,
      'class'=>$class,
      //'wrapclass'=>$wrapclass,
      'columnwidthclass'=>$columnwidthclass,
      'responsivetext'=>$responsiveTxt,
      'content'=>$content
    );

  }

  ElementParser::add_shortcode( 'AzuraColumnInner', 'azuracolumninner_sc' );
}

// Linstar Templates
//[1. Icon Box]
// if(!function_exists('azuraiconbox_sc')) {


//   function azuraiconbox_sc( $atts, $content="" ) {
  
//     extract(cth_shortcode_atts(array(
//          'iconclass' => '',
//          'image' => '',
//          'title'=>'',
//          'link'=>'',
//          'isactive'=>'0',
//          'extraclass'=>'',
//          'layout'=>''
//      ), $atts));

//     $styleArr = cth_shortcode_atts(array(

//                'margin_top'=>'',
//                'margin_right' => '',
//          'margin_bottom'=>'',
//                'margin_left'=>'',

//                'border_top_width'=>'',
//                'border_right_width' => '',
//          'border_bottom_width'=>'',
//                'border_left_width'=>'',

//                'padding_top'=>'',
//                'padding_right' => '',
//          'padding_bottom'=>'',
//                'padding_left'=>'',

//                'border_color'=>'',
//                'border_style' => '',

//          'background_color'=>'',
//                'background_image'=>'',
//                'background_repeat'=>'',
//                'background_attachment'=>'',
//                'background_size'=>'',
//                'additional_style'=>'',
//                'simplified'=>''

//      ), $atts);

//     $styleTextArr = ElementParser::parseStyle($styleArr);

//     $iconboxstyle = '';

//     $styleText = implode(" ", $styleTextArr);
    

//     $styleTextTest = trim($styleText);
//     if(!empty($styleTextTest)){
//       $iconboxstyle .= trim($styleText);
//     }

//     if(!empty($iconboxstyle)){
//       $iconboxstyle = 'style="'.$iconboxstyle.'"';
//     }

//     $animationArgs = cth_shortcode_atts(array(

//                'animation'=>'0',
//                'trigger' => 'animate-in',
//          'animationtype'=>'',
//          'hoveranimationtype'=>'',
//          'infinite'=>'0',
//                'animationdelay'=>'0',
//                'animationduration'=>'',

//      ), $atts);

//     $shortcodeTemp = false;

//     if(stripos($layout, '_:') !== false){
//       $shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR.'/elements/shortcodes_template/'.substr($layout, 2).'.php';
//     }else{
//       if(stripos($layout, ':') !== false){
//         $shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
//       }else{
//         $shortcodeTemp = ElementParser::addShortcodeTemplate('azuraiconbox');
//       }
//     }


    
    
//     $buffer = ob_get_clean();
    
//     ob_start();
    
//     if($shortcodeTemp !== false) require $shortcodeTemp;
    
//     $content = ob_get_clean();
    
//     ob_start();
    
//     echo $buffer;
    
//     return $content;

    
//   }
    
//   ElementParser::add_shortcode( 'AzuraIconBox', 'azuraiconbox_sc' );

// }

//2.[Divider]
// if(!function_exists('azuradivider_sc')) {

//   function azuradivider_sc( $atts, $content="" ) {
  
//     extract(cth_shortcode_atts(array(
//         'id' => '',
//         'type'=>'divider_line',
//         'extraclass' => '',
//         'layout'=>''
//      ), $atts));

//         $styleArr = cth_shortcode_atts(array(

//                'margin_top'=>'',
//                'margin_right' => '',
//                 'margin_bottom'=>'',
//                'margin_left'=>'',

//                'border_top_width'=>'',
//                'border_right_width' => '',
//          'border_bottom_width'=>'',
//                'border_left_width'=>'',

//                'padding_top'=>'',
//                'padding_right' => '',
//          'padding_bottom'=>'',
//                'padding_left'=>'',

//                'border_color'=>'',
//                'border_style' => '',

//          'background_color'=>'',
//                'background_image'=>'',
//                'background_repeat'=>'',
//                'background_attachment'=>'',
//                'background_size'=>'',
//                'additional_style'=>'',
//                'simplified'=>''

//      ), $atts);

//     $styleTextArr = ElementParser::parseStyle($styleArr);

//     $dividerstyle = '';

//     $styleText = implode(" ", $styleTextArr);
    

//     $dividerstyle = trim($styleText);
//     if(!empty($dividerstyle)){
//       $dividerstyle .= trim($dividerstyle);
//     }

//     if(!empty($dividerstyle)){
//       $dividerstyle = 'style="'.$dividerstyle.'"';
//     }
      
//     $animationArgs = cth_shortcode_atts(array(

//      'animation'=>'0',
//      'trigger' => 'animate-in',
//      'animationtype'=>'',
//      'hoveranimationtype'=>'',
//      'infinite'=>'0',
//       'animationdelay'=>'0',
//       'animationduration'=>'',

//      ), $atts);

//     $classes = 'clearfix '.$type;

//     $animationData = '';
//     if($animationArgs['animation'] == '1'){
//       if($animationArgs['trigger'] == 'animate'){
//         $classes .= ' animate';
//         $animationData = 'data-anim-type="'.$animationArgs['animationtype'].'" data-anim-delay="'.$animationArgs['animationdelay'].'"';
//       }
      
      
//     }


//     if(!empty($extraclass)){
//       $classes .= ' '.$extraclass;
//     }

//     if(!empty($classes)){
//       $classes = 'class="'.$classes.'"';
//     }
        
//          $html = '<div '.$dividerstyle.' '.$classes.' '.$animationData.'></div>';
//          //if(!empty($wrapper)){
//             //$html .= '<div '.$textstyle.' '.$classes.' '.$animationData;
            
//             // if(!empty($id)){
//             //     $html .= ' id="'.$id.'"';
//             // }
//             //$html .='>';
//          //}
//          //$html .= ElementParser::do_shortcode($content);
        
//         //$html .= '</div>';
   
//         return $html;
//   }
    
//   ElementParser::add_shortcode( 'AzuraDivider', 'azuradivider_sc' );
// }

//[Azura Counter]
if(!class_exists('AzuraShortcode_azuracounter')){
  class AzuraShortcode_azuracounter extends AzuraShortcode{}
  ElementParser::add_shortcode( 'AzuraCounter', 'azuracounter_sc' );
}
// //[Azura Counter]
// if(!function_exists('azuracounter_sc')) {

//   function azuracounter_sc( $atts, $content="" ) {
  
//     extract(cth_shortcode_atts(array(
//          'stopvalue' => '100',
//          'title'=>'',
//          //'skill_bg' => '#e5e5e5',
//          'speed'=>'10000',
//          'class'=>'',
//          'layout'=>''
//      ), $atts));

//     $shortcodeTemp = false;

//     if(stripos($layout, '_:') !== false){
//       $shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR.'/elements/shortcodes_template/'.substr($layout, 2).'.php';
//     }else{
//       if(stripos($layout, ':') !== false){
//         $shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
//       }else{
//         $shortcodeTemp = ElementParser::addShortcodeTemplate('azuracounter');
//       }
//     }
    
//     $buffer = ob_get_clean();
    
//     ob_start();
    
//     if($shortcodeTemp !== false) require $shortcodeTemp;
    
//     $content = ob_get_clean();
    
//     ob_start();
    
//     echo $buffer;
    
//     return $content;

    
//   }
    
//   ElementParser::add_shortcode( 'AzuraCounter', 'azuracounter_sc' );
// }
// //[Azura Team Member]
// if(!function_exists('azurateammember_sc')) {

//   function azurateammember_sc( $atts, $content="" ) {
  
//     extract(cth_shortcode_atts(array(
//          'name' => 'CTHthemes',
//          'job'=>'Developer',
//          'photo' => '',
//          'imgwidth'=>'169',
//          'imgheight'=>'212',
//          'extraclass'=>'',
//          'layout'=>''
//      ), $atts));

//     $shortcodeTemp = false;

//     if(stripos($layout, '_:') !== false){
//       $shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR.'/elements/shortcodes_template/'.substr($layout, 2).'.php';
//     }else{
//       if(stripos($layout, ':') !== false){
//         $shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
//       }else{
//         $shortcodeTemp = ElementParser::addShortcodeTemplate('azurateammember');
//       }
//     }
    
//     $buffer = ob_get_clean();
    
//     ob_start();
    
//     if($shortcodeTemp !== false) require $shortcodeTemp;
    
//     $content = ob_get_clean();
    
//     ob_start();
    
//     echo $buffer;
    
//     return $content;

    
//   }
    
//   ElementParser::add_shortcode( 'AzuraTeamMember', 'azurateammember_sc' );
// }

//[1. Feature Box]
// if(!function_exists('azurafeaturebox_sc')) {


//   function azurafeaturebox_sc( $atts, $content="" ) {
  
//     extract(cth_shortcode_atts(array(
//          'iconclass' => '',
//          'image' => '',
//          'title'=>'',
//          'link'=>'',
//          'isactive'=>'0',
//          'extraclass'=>'',
//          'layout'=>''
//      ), $atts));

//     $styleArr = cth_shortcode_atts(array(

//                'margin_top'=>'',
//                'margin_right' => '',
//          'margin_bottom'=>'',
//                'margin_left'=>'',

//                'border_top_width'=>'',
//                'border_right_width' => '',
//          'border_bottom_width'=>'',
//                'border_left_width'=>'',

//                'padding_top'=>'',
//                'padding_right' => '',
//          'padding_bottom'=>'',
//                'padding_left'=>'',

//                'border_color'=>'',
//                'border_style' => '',

//          'background_color'=>'',
//                'background_image'=>'',
//                'background_repeat'=>'',
//                'background_attachment'=>'',
//                'background_size'=>'',
//                'additional_style'=>'',
//                'simplified'=>''

//      ), $atts);

//     $styleTextArr = ElementParser::parseStyle($styleArr);

//     $featureboxstyle = '';

//     $styleText = implode(" ", $styleTextArr);
    

//     $styleTextTest = trim($styleText);
//     if(!empty($styleTextTest)){
//       $featureboxstyle .= trim($styleText);
//     }

//     if(!empty($featureboxstyle)){
//       $featureboxstyle = 'style="'.$featureboxstyle.'"';
//     }

//     $animationArgs = cth_shortcode_atts(array(

//                'animation'=>'0',
//                'trigger' => 'animate-in',
//          'animationtype'=>'',
//          'hoveranimationtype'=>'',
//          'infinite'=>'0',
//                'animationdelay'=>'0',
//                'animationduration'=>'',

//      ), $atts);

//     $shortcodeTemp = false;

//     if(stripos($layout, '_:') !== false){
//       $shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR.'/elements/shortcodes_template/'.substr($layout, 2).'.php';
//     }else{
//       if(stripos($layout, ':') !== false){
//         $shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
//       }else{
//         $shortcodeTemp = ElementParser::addShortcodeTemplate('azurafeaturebox');
//       }
//     }


    
    
//     $buffer = ob_get_clean();
    
//     ob_start();
    
//     if($shortcodeTemp !== false) require $shortcodeTemp;
    
//     $content = ob_get_clean();
    
//     ob_start();
    
//     echo $buffer;
    
//     return $content;

    
//   }
    
//   ElementParser::add_shortcode( 'AzuraFeatureBox', 'azurafeaturebox_sc' );

// }
//[Azura Cir Skill]
// if(!function_exists('azuracirskill_sc')) {

//   function azuracirskill_sc( $atts, $content="" ) {
  
//     extract(cth_shortcode_atts(array(
//          'percent' => '50',
//          //'title'=>'',
//          //'skill_bg' => '#e5e5e5',
//          'skill_val'=>'#13afeb',
//          'extraclass'=>'',
//          'layout'=>''
//      ), $atts));

//     $shortcodeTemp = false;

//     if(stripos($layout, '_:') !== false){
//       $shortcodeTemp = JPATH_COMPONENT_ADMINISTRATOR.'/elements/shortcodes_template/'.substr($layout, 2).'.php';
//     }else{
//       if(stripos($layout, ':') !== false){
//         $shortcodeTemp = JPATH_THEMES .'/'.JFactory::getApplication()->getTemplate(). '/html/com_azurapagebuilder/plugin/shortcodes_template/'.substr($layout, stripos($layout, ':')+1).'.php';
//       }else{
//         $shortcodeTemp = ElementParser::addShortcodeTemplate('azuracirskill');
//       }
//     }
    
//     $buffer = ob_get_clean();
    
//     ob_start();
    
//     if($shortcodeTemp !== false) require $shortcodeTemp;
    
//     $content = ob_get_clean();
    
//     ob_start();
    
//     echo $buffer;
    
//     return $content;

    
//   }
    
//   ElementParser::add_shortcode( 'AzuraCirSkill', 'azuracirskill_sc' );
// }
