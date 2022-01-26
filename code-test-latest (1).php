

/* ============================================================================================================
            Show logo , socail value
=============================================================================================================*/

<?php bloginfo('template_directory'); ?>/

<a href="<?php echo site_url(); ?>"><?php echo $options['logo']  ?></a>


<?php wp_nav_menu( array( 'menu'=>'Faqs/HElp', 'container' => 'ul', 'menu_class' => 'ft-links', ) ); ?> 
 
 
/* ============================================================================================================
        Custom Post Call 
=============================================================================================================*/

<?php $index_query = new WP_Query(array( 'post_type' => 'photogallery')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
    
       <?php  $title = get_the_title();  echo multiColor($title, '2') ?>
    <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
      $url = $thumb['0'];
  ?>
        <a href="<?=$url; ?>" class="fancybox" title="<?=the_title(); ?>">
      <?php
            if ( has_post_thumbnail() ) {
            the_post_thumbnail();
            }
            else {
            echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
            } ?>
        </a>
        
         <?php $content = strip_tags(get_the_content()); echo  substr($content, 0, 100); ?>
        
        
        <a href="<?php the_permalink(); ?>" > Read More</a> </p>
    <?php endwhile; wp_reset_query(); ?>
  


<?php echo  get_post_meta(get_the_id(), 'wpcf-google-adsense' , true);  ?>
/* ============================================================================================================
        Post  Post Call 
=============================================================================================================*/
    
    
<?php $index_query = new WP_Query(array( 'post_type' => 'post', 'p' => '12' , 'posts_per_page' => '1')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
   
    <?php endwhile; wp_reset_query(); ?>
    
    
/* ============================================================================================================
        category  Post Call 
=============================================================================================================*/

<?php $latestArticles = new WP_Query( 'category_name=latest-guest-post&posts_per_page=1' ); ?>  
          <?php while( $latestArticles->have_posts() ) : $latestArticles->the_post();  ?>
  
    
    <?php endwhile; wp_reset_query(); ?>
    
    
/* ================================================================
        Tool Set post type code for pages and posts
==================================================================*/
<?php $index_query = new WP_Query(array('post_type'=>'page', 'p'=>'29')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?> 
        <?php
    $csmTitle = get_post_meta(get_the_ID(), 'wpcf-custom-title', true);
        $subHead  = get_post_meta(get_the_ID(), 'wpcf-subheading', true);
    $expIcon  = get_post_meta(get_the_ID(), 'wpcf-excerpt-icon', true);
    $expImg   = get_post_meta(get_the_ID(), 'wpcf-excerpt-image', true);
        $expText  = get_post_meta(get_the_ID(), 'wpcf-excerpt-text', true);
        $expMore  = get_post_meta(get_the_ID(), 'wpcf-excerpt-more', true);
        $expLink  = get_post_meta(get_the_ID(), 'wpcf-excerpt-link', true);
    $expImg   = get_bloginfo('template_directory').'/images/placeholder.png';
        ?>
        <div class="thumb" style="background-image:url('<?php if(!empty($expImg)){ echo $expImg; } else { echo $dfImg; } ?>')"></div>
        <?php if(!empty($expIcon)){ echo '<img src="'.$expIcon.'" alt="" />'; } ?>
        <?php if(!empty($expImg)){ echo '<img src="'.$expImg.'" alt="" />'; } ?>
        <h2><?php if(!empty($csmTitle)){ echo $csmTitle; } else { the_title(); } ?></h2>
        <?php if(!empty($subHead)){ echo "<h3>$subHead</h3>"; } ?>
    <?php if(!empty($expText)){ echo "<p>$expText</p>"; } ?>
        <?php the_content(); ?>
        <a class="moreTag" href="<?php if(!empty($expLink)){ echo $expLink; } else { the_permalink(); } ?>"><?php if(!empty($expMore)){ echo $expMore; } else { echo 'Read More'; } ?></a>

    <?php endwhile; wp_reset_query(); ?> 

/************* by category *******************/
    <?php $index_query = new WP_Query(array('post_type'=>'the-team', 'cat' => '6' )); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?> 

      <?php endwhile; wp_reset_query(); ?>     
    
    
    
  
/* ============================================================================================================
      Change WordPress post date format to time ago using custom template function   
             Facebook style like posted “10 minutes ago”, “1 hour ago”, “3 hours ago”,
=============================================================================================================*/
   
 <?php    
 // add function file
function meks_time_ago() {
  return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

?>

<?php 
// Call where u want 
echo meks_time_ago(); /* post date in time ago format */ ?>


/* ============================================================================================================
                Get Server Url
=============================================================================================================*/

<?php
$array = $_SERVER['REQUEST_URI']; 
//echo $array; 

$parts = explode("/", $array);
$cat_name = $parts[3];

?>
/* ============================================================================================================
    
=============================================================================================================*/
<script >

//alert(popular);
$('a[rel="tag"]').each(function() {
  var tag_anc = $(this).html(); 
  $(this).addClass(tag_anc);    
});


var sidebar_adultside_bar = $('.sidebar-adultside-bar').width(); 
$('.sidebar-adultside-bar iframe').css({width:sidebar_adultside_bar}); 


</script>



/* ============================================================================================================
                         if custom field is exist
=============================================================================================================*/
<script >
 $(window).bind('scroll', function () {
     $('.header-area').on("mousewheel", function() {
      // alert($(document).scrollTop());
    });
    if ($(window).scrollTop() > 805) {
    
    
        $('.header-area').addClass('fixed fixed-menu');
    } else {
        $('.header-area').removeClass('fixed fixed-menu');
    }
});
</script>

/* ============================================================================================================
                         if custom field is exist
=============================================================================================================*/
<?php
$key = 'field_name';
$themeta = get_post_meta($post->ID, $key, TRUE);
if($themeta != '') {
echo 'your text';
}
?>

/* ============================================================================================================
                        Page navi
=============================================================================================================*/

    <?php

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    
     $index_query = new WP_Query(array( 'post_type' => 'blog' , 'posts_per_page' => '1','paged'=> $paged)); ?>

      <?php $x=1; while ($index_query->have_posts()) : $index_query->the_post(); ?>

    <?php $x++; endwhile; wp_reset_query(); ?>
        <div class="navigation">
      <div class="nav-page-area"> <?php echo wp_pagenavi( array( 'query' => $index_query ) ); ?></div>
      </div>


/* ============================================================================================================
                        user login status 
=============================================================================================================*/

<?php
    $current_user = wp_get_current_user();
    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
?>


/* ============================================================================================================
                        Remove Css from Woo commerce  
=============================================================================================================*/
go to function file and add this code
<?php 
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
  unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
  unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
  return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

?>

/* ============================================================================================================
                         Woo commerce Featured Product
=============================================================================================================*/

<?php
 $args = array( 'post_type' => 'product', 'meta_key' => '_featured', 'meta_value' => 'yes', 'posts_per_page' => 1 ); 
  $index_query = new WP_Query($args);
    
  while ($index_query->have_posts()) : $index_query->the_post(); ?>
    <h3><?php the_title(); ?></h3>
          <p><?php echo $product->get_price_html();  ?></p>
          <?php  the_post_thumbnail('full' , array( 'class' => 'product-img-right1' ) ); ?>
      
            <?php endwhile; wp_reset_query(); ?>
      
            

/* ============================================================================================================
                         Woo commerce Top Sales
=============================================================================================================*/
<?php
 $args = array( 'post_type' => 'product', 'meta_key' => 'total_sales', 'orderby' => 'meta_value_num', 'posts_per_page' => 2 ); 
  $index_query = new WP_Query($args);
    
  while ($index_query->have_posts()) : $index_query->the_post(); ?>
    <h3><?php the_title(); ?></h3>
          <p><?php echo $product->get_price_html();  ?></p>
          <?php  the_post_thumbnail('full' , array( 'class' => 'product-img-right1' ) ); ?>
      
            <?php endwhile; wp_reset_query(); ?>
      
 
 
 
/* ============================================================================================================
                    WordPress & Woo commerce Thumbnail
=============================================================================================================*/
<?php            
            //Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)
 
//With WooCommerce
the_post_thumbnail( 'shop_thumbnail' ); // Shop thumbnail (180 x 180 hard cropped)
the_post_thumbnail( 'shop_catalog' );   // Shop catalog (300 x 300 hard cropped)
the_post_thumbnail( 'shop_single' );    // Shop single (600 x 600 hard cropped)

?>



/* ============================================================================================================
                   cart number show on 
=============================================================================================================*/
ref link :: http://www.boshanka.co.uk/web-design-tutorials-resources/ajaxify-woocommerce-shopping-cart-widget/

<?php 

//add in function file
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php

$fragments['a.cart-contents'] = ob_get_clean();

return $fragments;

}

// call on header or every u want

global $woocommerce; ?>

<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>

//-------------MENU NAVIGATION CSS

header nav li.current-menu-item a {color: #2d57a6;}


//===================== woocommerce =========================//

<?php $index_query = new WP_Query(array( 'post_type' => 'product' , 'posts_per_page' => '4')); ?>

      <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>

        <li>
          <div class="products-image"><?php the_post_thumbnail(); ?> </div>
          <div class="products-cont">
        <img src="<?php the_post_thumbnail_url('full'); ?>">
            <h2><?php the_title(); ?></h2>
            <?php wpautop(the_content()); ?>
                <?php edit_post_link('edit' , '<p>' , '</p>'); ?>
             <?php the_excerpt(); ?>
            <h4>
              <?php $sale_price =   get_post_meta(get_the_id(), '_sale_price' , true);  
              $regular_price =   get_post_meta(get_the_id(), '_regular_price' , true);

              if($sale_price){
                $price = $sale_price;
              }else{
                $price = $regular_price;
              }  ?>

              <?php echo get_woocommerce_currency_symbol() . ' ' .  $price; ?>
            </h4>
            <a href="<?php the_permalink(); ?>" href="#scroll-to-top">Add to Cart</a> </div>
          </li>
        <?php endwhile; wp_reset_query(); ?>





/* ============================================================================================================
                                             Woo Commerce Star Rating ...
=============================================================================================================*/


<?php global $product;
if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
  return;
}
$review_count = $product->get_review_count();
$average      = $product->get_average_rating(); 
$score = ($average/5)*100;
?>

<div class="review-stats"><span style="width:<?php echo $score; ?>%"><img /></span></div>
<div class="review-count"><?php echo $review_count; ?> Reviews </div>


.review-stats span {
    display: block;
    background: url(images/star-full.jpg) no-repeat 0 0 transparent;
    width: 108px;
    height: 18px;
}
.review-stats {
    background: url(images/star-bg.jpg);
    width: 108px;
    height: 18px;
    float: left;
    position: relative;
}

http://jkp.pixelslogodesign.net/wp-content/themes/jkp/images/star-bg.jpg
http://jkp.pixelslogodesign.net/wp-content/themes/jkp/images/star-full.jpg

/* ============================================================================================================
                                            Page Content ...
=============================================================================================================*/


 <?php  $page = basename(get_permalink()); ?>
<?php $content = get_posts(array('name' => '"'.$page.'"','post_type' => 'page'));
// FOR ID
$content = get_posts(array('page_id' => '27','post_type' => 'page')); 

$image = wp_get_attachment_image_src( get_post_thumbnail_id($content[0]->ID), 'full' ); ?>

<?php echo $content[0]->post_title; ?>
<?php echo wpautop($content[0]->post_content); ?>
<?php echo $image[0]; ?>

<?php echo the_field('designation', get_the_ID()); ?>

/////------------------------ TABLE

    <div class="group-table">
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td width="8%">S.no</td>
          <td width="47%">Art Day at School</td>
          <td width="45%">Age Criteria</td>
        </tr>
        <tr>
          <td width="8%">1</td>
          <td width="47%">Day care</td>
          <td width="45%">6 months- 12 months</td>
        </tr>
        

      </table>
    </div>

.group-table{width:67%; margin:0 auto; padding:30px 0 60px;}
.group-table table{width:100%;}
.group-table tr{width:100%;}
.group-table tr:first-child td{background:#2d3091; font-size:14px; font-weight:bold; color:#FFF;}
.group-table tr td{ border:1px solid #dddddd; font-family: 'Segoe UI';color:#666666;font-size:14px;font-weight: normal; padding:7px 15px;}


///========================= WOOCOMMERCE ADD FILTER CODE


-------Add In function file

// Add Woocommerce Customization
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
function my_theme_wrapper_start() {
  echo '<section class="wooContent"><div class="wrapper">';
    if (!is_product()) {
    get_sidebar('woobar'); 
  } 
}
function my_theme_wrapper_end() {

  echo '</div></section>';
}

---------------- add in function file (register_sidebar postion)

register_sidebar( array(
    'name' => __( 'Woocommerce Sidebar', 'squared' ),
    'id' => 'sidebar-2',
    'description' => __( 'Appears in woocommerce', 'squared' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));

  --------------- add file in root theme folder 

  sidebar-woobar.php

  //////--- SLIDER BULLWTS


  .slider-area  .tp-bullets.simplebullets.round .bullet { background-image:none; border:2px solid #fff; border-radius:50%; width:12px; height:12px; margin:0 3px; }
.slider-area  .tp-bullets.simplebullets.round .bullet.selected { background:#0e509a !important; border-color:#fff; }


           <?php echo do_shortcode( '[contact-form-7 id="129" title="contact form"]' ); ?>
         <?php  echo do_shortcode('[rev_slider home_slider]'); ?>
               header nav li.current-menu-item a {color: #ff6600;}

$image = get_field('image');

if( !empty($image) ): ?>

  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>
              


///========================= GET CATEGORY CUSTOM TYPE POST

      <?php
$post = 'products';
$categories = get_categories(array('post_type' => $post,  'orderby' => 'ID',
'order' => 'ASC',
'include' => '1,2,3,4,5,6,7'));
$x=1;
foreach ( $categories as $category ) {
$id = $category->term_id;
if($x==1){$class="full-width"; ?> 

<div class="col-8">
<ul class="products">
<?php }elseif($x==5){ 
$class="height249"; ?>
</ul>
</div>
 <div class="col-4">
      <ul class="products fullwidth">
       <?php }elseif($x==4){$class="full-width mtop";}elseif($x==6){$class="height534";}else{
  $class="";
}
?>

  <li class="<?php echo $class; ?>"> 
    <?php z_taxonomy_image($id);  ?>
          <h4><?php echo $category->name; ?></h4>
          <div class="products-content">
            <div class="inner">
              <h5><a href="<?php echo get_site_url(). '/category/?id='.$id; ?>"> <?php echo $category->name; ?></a></h5>
              <div> </div>
            </div>
          </div>
        </li>

<?php $x++; } ?>

///========================= CUSTOM TAB SELECTION JQUERY FUNCTION

$(".categories-content-main > div:not(:first)").hide();
$(".categories-tab > ul li").click(function () {
var $index = $(this).index();
$(".categories-content-main > div").eq($index).fadeIn('fast').siblings("div").hide();
$(this).addClass("activetab").siblings().removeClass("activetab");
});

<section class="categories-main">
<div class="section-wrapper">
<div class="categories-tab">
<ul>

<?php $count=0; $index_query = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' => '7' , 'order'=>'desc')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); 
    if($count==0){ $class="activetab"; }else{ $class=""; } ?>
    <li class="<?php echo $class; ?>"><a href="#tab-<?php echo get_the_id(); ?>" > <?php the_title(); ?></a>
        <a href="<?php echo get_site_url(). '/portfolio/'; ?>" class="view-all">View All</a></li>
    <?php $count++; endwhile; wp_reset_query(); ?>

</ul>
</div>
<div class="categories-content-main">

 <?php $count=0; $index_query = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' => '7', 'order'=>'desc')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>

<div class="categories-content" id="tabs-<?php echo get_the_id(); ?>">

<div class="col-6 category-image-big">
<?php the_post_thumbnail(); ?>
</div>
<div class="col-6 category-image-small">
<ul class="thumbnails">


<?php $attachments = new Attachments( 'my_attachments' ,  get_the_id() ); ?>
              <?php if( $attachments->exist() ) : ?>
          <?php while( $attachments->get() ) : ?>

<li><?php echo $attachments->image( 'full' ); ?></li>

          <?php endwhile; ?>
          <?php endif; ?>
</ul>
<?php the_content(); ?>
</div>
</div>

    <?php endwhile; wp_reset_query(); ?> 

</div>
</div>
</section>


///========================= GET ATYTACHMENTS
<?php $count=0; $index_query = new WP_Query(array( 'post_type' => 'portfolio',  'posts_per_page' => '-1')); ?>
    <?php  while ($index_query->have_posts()) : $index_query->the_post(); ?>

      <?php $attachments = new Attachments( 'my_attachments',  get_the_id()  ); ?>
          <?php if( $attachments->exist() ) : ?>
          <?php while( $attachments->get() ) : ?>
            <li><a class="gallery-lida-box" rel="prettyPhoto[1]"   href="<?php echo $attachments->url(); ?>" > <?php echo $attachments->image( 'full' ); ?> </a></li>
          <?php endwhile; ?>
          <?php endif; ?>

    <?php  endwhile; wp_reset_query(); ?>


    //WOOCOMMERCE PRODUCT GALLERY

    add_theme_support('wc-product-gallery-slider');


    //WOOCOMMERCE CHECK PRODUCT IS FEATURE OR NOT

    function wc_add_featured_product_flash() {
  global $product;

  if ( $product->is_featured() ) {
    echo '<img class="star" src="http://webserver-03:901/wp-content/uploads/2017/09/star-1.png">';
  }else{
    echo '<img class="star" src="http://webserver-03:901/wp-content/uploads/2017/09/star2.png">';
  }
}
add_action( 'woocommerce_before_shop_loop_item_title', 'wc_add_featured_product_flash' );
add_action( 'woocommerce_before_single_product_summary', 'wc_add_featured_product_flash' );

///========================= RESPONSIVE

@media only screen and (max-width: 768px) and (orientation: portrait) { }
@media only screen and (max-width: 768px) and (orientation: landscape) { }
@media ( min-width: 1020px )and ( max-width: 1030px) { }
@media ( min-width: 768px )and ( max-width: 900px) { }


//======== RESPONSIVE MENU

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <nav>
    <ul>
      <li><a href="">Home</a></li>
      <li><a href="">Company </a></li>
      <li><a href="">Technology</a></li>
      <li><a href="">Case Studies</a></li>
      <li><a href="">Blog</a></li>
      <li><a href="">Connect With US</a></li>
    </ul>
  </nav>
</div>

<nav class="home-menu-bar">
  <ul>
    <li><a href="">Home</a></li>
    <li><a href="">Company </a></li>
    <li><a href="">Technology</a></li>
    <li><a href="">Case Studies</a></li>
    <li><a href="">Blog</a></li>
    <li><a href="">Connect With US</a></li>
  </ul>
</nav>

//CSS FOR RESPONSIVE MENU

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#mySidenav nav ul {width: 100%; display: inline-block; padding-left: 8%; padding-right: 8%;}
#mySidenav nav ul li{list-style: none; width:100%; border-bottom: 1px solid #7d7d7d; padding-bottom: 4%; padding-top: 8%; }
#open {color:#fff; display: none;}
.sidenav {  height: 100%;  width: 0;  position: fixed; z-index: 1; top: 0;left: 0; background-color: #111; overflow-x: hidden;  transition: 0.5s;  padding-top: 60px;}
.sidenav a {  font-weight: 400;   color: #ffffff;   font-size: 16px;   text-decoration: none;  text-transform: uppercase;  display: block;transition: 0.3s;}
.sidenav a:hover { color: #f1f1f1;}
.sidenav .closebtn { position: absolute; top: 0; right: 25px; font-size: 36px; margin-left: 50px;}

@media only screen and (max-width: 768px) {
    #open {display: block; float: right;}
    .home-menu-bar {display: none;}

    }

//FUNCTION FOR RESPONSIVE MENU

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

<?php 

add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, &$wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}

function aventurine_child_wc_support() {
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'aventurine_child_wc_support' );


     
          $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => '4',
            'tax_query'             => array(
              array(
                'taxonomy'      => 'product_cat',
            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
            'terms'         => 15,
            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            )
              )
            );

            
?>

//woocommerce css

.woo-container { padding-top: 4%; padding-bottom: 4%; }

.woocommerce .woocommerce-breadcrumb { display: none; }
h1.product_title.entry-title {font-family: 'Montserrat', sans-serif;font-weight: 600;color: #1f1f1f;font-size: 17px;text-transform: uppercase;}

.woocommerce div.product p.price, .woocommerce div.product span.price { color: #003c78;}
.single-product p { font-family: 'Open Sans', sans-serif; color: #585858; font-size: 14px; }
.woocommerce .star-rating::before , .star-rating , .woocommerce p.stars a { color: #ffcc00; }
a.woocommerce-review-link {font-family: 'Montserrat', sans-serif;font-weight: 300;color: #1f1f1f;font-size: 13px;}
.woocommerce div.product .stock { font-family: 'Montserrat', sans-serif;font-weight: 400; font-size: 13px; color: #03406e;  }

button.single_add_to_cart_button.button.alt { display: inline-block;padding: 12px 21px;font-family: 'Open Sans', sans-serif;font-weight: 700;color: #fff;font-size: 14px;text-transform: uppercase;text-decoration: none;background-color: #008081; border:2px solid #008081;}
button.single_add_to_cart_button.button.alt:hover { background-color: #fff; color: #008081; }

input.qty {  padding: 7px;}
.variations .label label { margin: 0; font-family: 'Montserrat', sans-serif;  font-weight: 400 ; color: #000000; font-size: 14px; display: block; width: 100%; }
td.label {
    width: 100%;
    display: block;
}
td.value {
    width: 100%;
    display: block;
}
button.single_add_to_cart_button.button.alt.disabled.wc-variation-selection-needed { background-color: #013d76 !important; }

span.sku_wrapper { display: none; }

span.posted_in , span.tagged_as { display: block;  width: 100%; font-family: 'Open Sans', sans-serif;  font-weight: 300; color:#999999; font-size: 15px;}
span.posted_in a , span.tagged_as a { color: #666666; text-decoration: none;}

.share label {font-family: 'Montserrat', sans-serif;font-weight: 700;color: #333333;font-size: 14px;text-transform: uppercase;margin-right: 20px;margin-top: 50px;}
.share a i { color: #fff; background-color: #cccccc; font-size: 16px;  border-radius: 100%; }

.share a i.fa.fa-twitter {  padding: 7px 8px;}
.share a i.fa.fa-facebook {  padding: 7px 11px;}
.share a i.fa.fa-pinterest-p {  padding: 7px 10px;}
.share a i.fa.fa-instagram {  padding: 7px 9px;}
.share a i.fa.fa-dribbble { padding: 7px 9px;}

.share a i:hover { background-color: #000; }

.woocommerce div.product .woocommerce-tabs ul.tabs li.active {border-radius: 0 !important;border-bottom: 2px solid #008081 !important;border: none;}
.woocommerce div.product .woocommerce-tabs ul.tabs li { border: none ; background: #fff; border-radius: 0 !important;  }

.woocommerce div.product .woocommerce-tabs ul.tabs li::before {
    left: 0 !important;
    border-bottom-right-radius: 0 !important;
    border-width: 0!important;
    box-shadow:none !important;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li::after, .woocommerce div.product .woocommerce-tabs ul.tabs li::before {
    border: none !important;
    position: absolute;
    bottom: 0 !important;
    width: 0 !important;
    height: 0 !important;

}

.woocommerce div.product .woocommerce-tabs ul.tabs li a {font-family: 'Roboto', sans-serif;font-weight: 600;color: #898989;font-size: 17px;text-transform: uppercase;}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a {font-family: 'Roboto', sans-serif;font-weight: 600;color: #008081;font-size: 17px;text-transform: uppercase;}
section.related ,  .wc-tab h2{display: none !important;}
.wc-tab p {font-family: 'Roboto', sans-serif; font-weight: 400; color:#4f4f4f; font-size: 16px;}
.woocommerce-tabs {padding-top: 4%;}
.woocommerce div.product .woocommerce-tabs ul.tabs { padding-left: 0; }
textarea#comment {
    resize: none;
    height: 200px;
    width: 100%;
    padding: 10px;
    border: 1px solid #e1e1e1;
}

input#author {
    width: 100%;
    padding: 10px;
    border: 1px solid #e1e1e1;
}

input#email {
    width: 100%;
    padding: 10px;
    border: 1px solid #e1e1e1;
}

.woocommerce #review_form #respond .form-submit input { display: inline-block;padding: 12px 21px;font-family: 'Open Sans', sans-serif;font-weight: 700;color: #fff;font-size: 14px;text-transform: uppercase;text-decoration: none;background-color: #013d76; border:2px solid #013d76;}
.woocommerce #review_form #respond .form-submit input:hover { background-color: #fff; color: #013d76; }
span.onsale {
    background-color: #008081 !important;
    text-transform: uppercase;
    padding: 5px 10px !important;
}

.woocommerce-product-gallery.woocommerce-product-gallery--with-images.woocommerce-product-gallery--columns-4.images {
    border: 1px solid #dad9d9;
}

.woocommerce div.product p.price, .woocommerce div.product span.price {color: #1f1f1f;}

.woocommerce div.product form.cart .variations select {     padding-left: 12px; }


.woocommerce-product-details__short-description {
    border-top: 1px solid #eeeeee;
    padding-top: 4%;
    margin-top: 4%;
    border-bottom: 1px solid #eee;
    padding-bottom: 4%;
    margin-bottom: 4%;
}

.woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea {
    padding: 5px;
    border-radius: 4px;
    border: 1px solid #aaa;

    }


nav.woocommerce-MyAccount-navigation ul { padding: 0; list-style: none; width: 100%; display: inline-block; }
nav.woocommerce-MyAccount-navigation ul li  { width: 100%; padding: 2% !important; border-bottom: 1px solid #ebebeb; }
nav.woocommerce-MyAccount-navigation ul li a { text-decoration: none; text-transform: capitalize; font-family: 'Raleway', sans-serif; font-weight: 400; color: #606060; font-size: 14px; }
nav.woocommerce-MyAccount-navigation ul li.is-active a { color: #0f3053; }

<?php 
///DEACTIVE PLUGIN CODE (add in functions file)

# Disable WP>3.0 core updates
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

# Disable WP>3.0 plugin updates
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

# Disable WP>3.0 theme updates
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );

# disable core updates:
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

//REMOVE SHOP PAGE ADD TO CART BUTTON

function remove_loop_button(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

//REMOVE SHOP PAGE IMAGE 

function remove_woocommerce_actions() {
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
}

add_action( 'after_setup_theme', 'remove_woocommerce_actions' );
 
 remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );



//REMOVE SHOP PAGE PRICE 

add_filter( 'woocommerce_variable_sale_price_html', 'businessbloomer_remove_prices', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'businessbloomer_remove_prices', 10, 2 );
add_filter( 'woocommerce_get_price_html', 'businessbloomer_remove_prices', 10, 2 );
 
 remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


function businessbloomer_remove_prices( $price, $product ) {
$price = '';
return $price;
}

//ADD CUSTOM STYLE SHOP PAGE

function skyverge_shop_display_skus() {

    global $product;
    $link = $product->get_permalink();
   
     $sale_price =   get_post_meta($product->get_ID(), '_sale_price' , true);  
              $regular_price =   get_post_meta($product->get_ID(), '_regular_price' , true);

              if($sale_price){
                $price = $sale_price;
              }else{
                $price = $regular_price;
              } 

              $product_cats = wp_get_post_terms( $product->get_ID(), 'product_cat' );
 
 foreach($product_cats as $category){
  $cat = $category->name;
 }

 ?>

    <div class="item shopImage"> 
      <div class="image">
         <img class="prod-img" alt="" src="<?php the_post_thumbnail_url('full'); ?>" />  

         <div class="box">
         <a href="/wishlist/?add_to_wishlist=<?php echo $product->get_ID(); ?>" class="fa fa-heart-o"></a>
                  <a href="/cart/?add-to-cart=<?php echo $product->get_ID(); ?>" class="fa fa-shopping-basket buck"></a>
                  <a  href="<?php the_permalink(); ?>"  class="fa fa-eye"></a>
      </div>
      </div>

      <div class="cont">
        <div class="row">
          <div class="col-md-7 left">
            <h3 class="product-title">
                <a href="<?php the_permalink(); ?>"> <span class="light-font"> <?php the_title(); ?> </span></a>
                </h3>

          </div>
          <div class="col-md-5 right">
            <h4>
                  <?php echo $cat; ?>
                </h4>
          </div>
        </div>
      </div>

      <div class="shopPrice">
      <div class="row">
        <div class="col-md-8 left">
          <strong class="clr-txt"><label>Price:&nbsp;</label><?php echo get_woocommerce_currency_symbol(); ?><?php echo $price ?></strong> 
        </div>
        <div class="col-md-4 right">
          <div class="woocommerce-product-rating">
            
             <?php
                if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
                    return;
                }
                
                $rating_count = $product->get_rating_count();
                $review_count = $product->get_review_count();
                $average      = $product->get_average_rating();
                
                if ( $rating_count > 0 ) : ?>
                
                  
                        <?php echo wc_get_rating_html( $average, $rating_count ); ?>
                   
                
                <?php endif; ?>
           
</div>
        </div>
      </div>
        
      </div>
      
    </div>

  <?php 
}
add_action( 'woocommerce_after_shop_loop_item', 'skyverge_shop_display_skus', 11 );

//REMOVE SHOP PAGE TITLE

remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);


/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}

//NEWSLETTER
 dynamic_sidebar('sidebar-2'); 

 /// EVEN ODD LOOP


  if ($i % 2 == 0)
  {
    echo "even";
  }
  else
  {
    echo "odd";
  }



 $("a[rel^='prettyPhoto']").prettyPhoto();


 https://www.siamcomm.com/how-tos/adding-custom-sharing-buttons-facebook-twitter-linkedin-wordpress/
 ?>

 ////SUBMENU

 header .main-head nav ul li.menu-item-has-children {
    position: relative;
    z-index: 9999999999;
}
header .main-head nav ul li.menu-item-has-children:hover > ul {
    display: block;
}
header .main-head nav ul li.menu-item-has-children > ul{
  display: none;
  position: absolute;
  top: 15px;
  left: -30px;
  text-align: left;
  background: #0d47a1;
  width: 255px;
  padding: 30px 0 0;
  z-index: 2;
}
header .main-head nav ul li.menu-item-has-children > ul li{display: inline-block;background-color: #0d47a1;width: 100%;padding: 10px;}
header .main-head nav ul li.menu-item-has-children > ul li a{font-weight: 400;color: #fff;font-size: 13px;}
header .main-head nav ul li.menu-item-has-children > ul li a label { color: #f7941d; }

header .main-head nav ul li.menu-item-has-children > ul li:first-child{ position: relative;  }
header .main-head nav ul li.menu-item-has-children > ul li:last-child{ border:none;  }
header .main-head nav ul li.menu-item-has-children > ul li:first-child:before { content: url(images/up.png); position: absolute; top:-16px; left: 42px; }

header .main-head nav ul li.menu-item-has-children > ul li:hover { background-color: #e00201; }
header .main-head nav ul li.menu-item-has-children > ul li a:hover:after{ background-color: transparent; height: 0; }

//---- Animation Code

<script>

  wow = new WOW(
    {
    animateClass: 'animated',
    offset:       100,
    callback:     function(box) {
      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
    }
  );
  wow.init();

</script>

class="header wow fadeInDown" data-wow-duration="2s"

//Zoom in image hover

.home-service .list .box:hover img { transform: scale(1.1);    -webkit-transition: all 2s; /* Safari */   transition: all 2s;}


<!-- CUSTOM WOOCOMMERCE FUNCTION START -->

<?php 


function custom_variation_form($id) {

$product = wc_get_product( $id );

if( $product->is_type( 'variable' )) {
  
  wp_enqueue_script('wc-add-to-cart-variation');

  $attribute_keys = array_keys( $product->get_variation_attributes() );

  ?>

  <form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $product->get_available_variations() ) ) ?>">
    <?php do_action( 'woocommerce_before_variations_form' ); ?>

    <?php if ( empty( $product->get_available_variations() ) && false !== $product->get_available_variations() ) : ?>
      <p class="stock out-of-stock">
        <?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?>
      </p>
    <?php else : ?>
      <table class="variations" cellspacing="0">
        <tbody>
          <?php foreach ( $product->get_variation_attributes() as $attribute_name => $options ) : ?>
          <tr>
            <!-- <td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td> -->
            <td class="value">
              <?php
                $selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );
                wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
              ?>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>

      <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

      <div class="single_variation_wrap">
        <?php
          /**
           * woocommerce_before_single_variation Hook.
           */
          do_action( 'woocommerce_before_single_variation' );

          /**
           * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
           * @since 2.4.0
           * @hooked woocommerce_single_variation - 10 Empty div for variation data.
           * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
           */
          do_action( 'woocommerce_single_variation' );

          /**
           * woocommerce_after_single_variation Hook.
           */
          do_action( 'woocommerce_after_single_variation' );
        ?>
      </div>

      <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
      
    <?php endif; ?>

    <?php do_action( 'woocommerce_after_variations_form' ); ?>
    
  </form>

  <?php } else { ?>
   
    <form class="cart" action="<?php echo esc_url( get_permalink() ); ?>" method="post" enctype='multipart/form-data'>
    
      <?php
       echo '<h5 class="qntyt">Quantity:</h5><button type="button" class="minus" ><i class="fas fa-minus"></i></button>';
        woocommerce_quantity_input( array(
          'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
          'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
          'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
        ) );
        
          echo '<button type="button" class="plus" ><i class="fas fa-plus"></i></button>';
      ?>
      <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

    </form>
    
<?php } 

}


/**
 * @snippet       Plus Minus Quantity Buttons @ WooCommerce Single Product Page
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=90052
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// -------------
// 1. Show Buttons
  
add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" ><i class="fas fa-plus"></i></button>';
}
  
add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<h5 class="qntyt">Quantity:</h5><button type="button" class="minus" ><i class="fas fa-minus"></i></button>';
}
 
// Note: to place minus @ left and plus @ right replace above add_actions with:
// add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
// add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
// -------------
// 2. Trigger jQuery script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript">
           
      jQuery(document).ready(function($){   
           
         $('form.cart').on( 'click', 'button.plus, button.minus', function() {
  
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
  
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
              
         });
           
      });
           
      </script>
   <?php
}


function aventurine_child_wc_support() {
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'aventurine_child_wc_support' );