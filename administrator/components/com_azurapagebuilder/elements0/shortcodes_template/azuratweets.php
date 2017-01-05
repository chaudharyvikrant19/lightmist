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

AzuraJs::addStyle('owlCarousel','/components/com_azurapagebuilder/assets/plugins/owlCarousel/owl.carousel.css');
AzuraJs::addJScript('jquery_easing','/components/com_azurapagebuilder/assets/plugins/owlCarousel/jquery.easing.1.3.min.js');
AzuraJs::addJScript('owlCarousel','/components/com_azurapagebuilder/assets/plugins/owlCarousel/owl.carousel.min.js');

extract(cth_shortcode_atts(array(
	'twittername' 				=>	'Cththemes',
	'consumer_key'				=>	'b1gNFU5p55j7GR0vACWyZf0j8',
	'consumer_key_secret' 		=>	'V0a7UkD0XTuP4zdoJoBPlpbQC9TtGk8ucotXRZZZP4MYv7TkK2',
	'access_token'				=>	'2549127786-T8zZA3d7cJcgDkI2kwbfQ2XeU8exphGZu3hZVvK',
	'access_token_secret' 		=>	'pQXlpkL9CSCIsEnGF5xgsjKObDRWcD77thGkFG9RLzgjs',
	'count'						=>	'3',
	'layout'=>''
), $atts));

$params = array(
	'twittername'=>$twittername,
	'consumer_key'=>$consumer_key,
	'consumer_key_secret'=>$consumer_key_secret,
	'access_token'=>$access_token,
	'access_token_secret'=>$access_token_secret,
	'counts'=>$count
);
require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/cthtweetshelper.php';

$tweetsHelper = new CthTweetsHelper($params);

$tweetsFeed = $tweetsHelper->fetch();
		
$classes = "azura_tweets";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$tweetsstyle = self::buildStyle($atts);

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}

$classes = 'class="'.$classes.'"';

?>

<div <?php echo $classes.' '.$tweetsstyle.' '.$animationData;?>>
	<span>
		<i class="icon-twitter"></i>
	</span>
<?php if(count($tweetsFeed)) :?>
	<div class="azura_tweet_slider tweet_list owl-carousel">
	<?php foreach ($tweetsFeed as $key => $feed) :?>
		<div class="item">
			<p class="tweet_text"><?php echo $tweetsHelper->prepareTweet($feed['text']);?></p>
		</div>
	<?php endforeach;?>
	</div>
<?php endif;?>
</div>