<?php

	defined('_JEXEC') or die;
?>
<?php if(count($data) ): ?>
    <div class="twitter-feed">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center icons-circle icons-bg-color fa-1x">
                    <h2 class="section-title white"><?php echo $module->title; ?></h2>
                    <i class="fa fa-twitter white-border border2-white"></i>
                    <div class="tweet">
                        <!-- Twitter Slider -->                
                        <div id="twitter-feed">
                            <ul class="twitter-slider">
                            <?php foreach($data as $key=>$value) : ?>
                            <li class="item">
                                <div class="tweet_text"><?php echo $twitter->prepareTweet($value['text'])?></div>
                                <div class="tweet_time"><a href="#"><?php echo  $twitter->getLC3Date($value['created_at']);?></a></div>
                            </li>
                            <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<script type="text/javascript">
jQuery(function($){
if ($("#twitter-feed").length) {
        $("#twitter-feed").find("ul").addClass("twitter-slider");
        $("#twitter-feed").find("ul li").addClass("item");
        var e = $(".twitter-slider");
        e.owlCarousel({
            navigation: false,
            slideSpeed: 500,
            pagination: false,
            autoHeight: true,
            singleItem: true,
            touchDrag: false,
            mouseDrag: true,
            autoPlay: 2000,
            stopOnHover : true
        });
        $(".twitter-holder .next-slide").click(function() {
            e.trigger("owl.next");
        });
        $(".twitter-holder .prev-slide").click(function() {
            e.trigger("owl.prev");
        });
    }
});
</script>