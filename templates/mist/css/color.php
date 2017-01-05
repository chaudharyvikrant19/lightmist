<?php 
header("Content-type: text/css; charset=utf-8");

$textColor = '#'.htmlspecialchars($_GET['textcolor']);
$borderColor = '#'.htmlspecialchars($_GET['bordercolor']);
$backgroundColor = '#'.htmlspecialchars($_GET['backgroundcolor']);

?>
@text-color: <?php echo $textColor;?>;
@border-color: <?php echo $borderColor;?>;
@background-color: <?php echo $backgroundColor;?>;

.btn-link,.btn-link:hover,
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover,
.navbar.navbar-bg-light .navbar-nav > li > a:hover, .navbar.navbar-bg-light .navbar-nav > li > a:focus, .navbar.navbar-bg-light .navbar-nav > li > a.active,
.navbar.navbar-bg-light .navbar-nav > li > a.highlighted,
.page-links div a:hover, .page-links div a:active, .page-links div a:focus,
.dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover, .dropdown-menu > li > a.active,
.text-color,
.item-box a:hover i,
.inverse i,
.item-box.icons-color i,
.pricing:hover .title,
.pricing:hover .title a,
.process-content:hover .title,
.pricing .price,
.post-meta  i,
.meta i,
.quote blockquote:before,
.quote blockquote:after,
.tweet_time a,
#video-controls a,
.link-hover-color a:hover,
.icons-hover-color i:hover,
.navbar-default .navbar-nav > li.active > a, 
.navbar-default .navbar-nav > li.active > a:focus, 
.navbar-default .navbar-nav > li.active > a:hover,
#page .breadcrumb > .active,
.timeliner li:hover .timeline-heading h4.subheading,
.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
.sitemap li a:hover,
.bakery-block:hover .fill-icon,
.pricing:hover .pricing-icon,
.travel-block i,
.side-navbar .top-contact.link-hover-black > a:hover,
.side-navbar .top-social-icon > a:hover i,
.nav .open > a.highlighted 
{
  color: @text-color;
}


.top-bar-section.top-bar-bg-color,
.product-count,
.nav > li > a:focus, .nav > li > a:hover,
.navbar-bg-color,
.top-bar-section.top-bar-bg-color,
.btn-default,
.section-title h1:before,
.section-title h2:before,
.special-feature .mask-top h4:before ,
.s-feature-box,
.s-feature-box:hover .mask-bottom,
.progress-bar,
.owl-prev .fa, .owl-next .fa,
h3.count-number:before,
h2.count-number:before,
.item-box.inverse a:hover i,
.work-process-box .item-number,
.name:before,
.inverse-bg-color i,
.icons-bg-color i,
.bg-color,
.gray-bg i:hover,
.features-list-item:hover i,
.bar,
.pagination > .active > span,
.pagination > .active > span:hover,
.blog.timeliner>li:hover .timeline-image,
.blog.timeliner>li:hover .timeline-icon,
div.count-number:before,
.static-color-icons span,
.fill-icon:after,
.bakery-menu .nav-tabs > li.active > a, 
.bakery-menu .nav-tabs > li.active > a:focus, 
.bakery-menu .nav-tabs > li.active > a:hover,
.travel-tab .input-group-addon,
.travel-tab .nav-tabs > .active > a,
.travel-tab .nav-tabs > .active > a:hover,
.travel-tab .nav-tabs > .active > a:focus,
.bootstrap-datetimepicker-widget table td.active, 
.bootstrap-datetimepicker-widget table td.active:hover,
.travel-tab .nav-tabs > li a > i ,
.hotel-tab .nav-tabs > li.active > a, 
.hotel-tab .nav-tabs > li.active > a:focus, 
.hotel-tab .nav-tabs > li.active > a:hover
{
  background-color: @background-color;
}

.dropdown-menu,
.desc-border,
.border-color,
.timeliner li:hover .timeline-image,
.pagination > .active > span,
.pagination > .active > span:hover,
.blog.timeliner  >li:hover .timeline-panel,
.form-control:focus
{
  border-color: @border-color;
}

.bottom-arrow:before{
  border-top-color: @border-color;
}
.rightGrip, 
.leftGrip{
  border-bottom: 10px solid @border-color !important;
}

.blog.timeliner >li:hover  .timeline-panel:before{
  border-left-color: @border-color;
  
}
.blog.timeliner  >li.timeline-inverted:hover .timeline-panel:before{
  border-right-color: @border-color;
  border-left-color: #ffffff;
}
.right.blog.timeliner  >li.timeline-inverted:hover .timeline-panel:before,
.right.blog.timeliner >li:hover  .timeline-panel:before{
  border-right-color: @border-color;
  border-left-color: #ffffff;
}
.pricing:hover i.icons-circle.medium.pricing-icon{
  text-shadow: 0px 0px 5px rgba(255, 196, 0, 0.5);
} 


@media (max-width: 767px) { 
  .blog.timeliner  >li.timeline-inverted:hover .timeline-panel:before,
  .blog.timeliner >li:hover  .timeline-panel:before{
    border-right-color: @border-color;
    border-left-color: #ffffff;
  }
}


.btn-default:hover,
.color-switch .owl-controls .owl-page span,
.tags li a{
 background-color: rgba(255,196,0,.8);
}


::-moz-selection {
    background: @background-color;
    color: #000000;
    text-shadow: none;
}

::selection {
    background: @background-color;
    color: #a4003a;
    text-shadow: none;
}

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    border-color: @background-color;
    background-color: @background-color;
}