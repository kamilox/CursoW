<?php
/*
Plugin Name: Brankic Brand Icons Widget 
Plugin URI: http://www.brankic1979.com
Description: Showing social media icons - for more icons http://www.brankic1979.com/2011/12/free-social-media-icon-set/
Author: Brankic1979
Version: 3.0
Author URI: http://www.brankic1979.com/
*/

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget', 
 
// Widget name will appear in UI
__('Brankic Icon Widget', 'wpb_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Showing icons in widget', 'wpb_widget_domain' ), ) 
);

// Css rules for Color Picker
wp_enqueue_style( 'wp-color-picker' );
// Register javascript
add_action('admin_enqueue_scripts', array( $this, 'enqueue_admin_js' ) );
}

/**
 * Function that will add javascript file for Color Piker.
 */
public function enqueue_admin_js() { 
     
    // Make sure to add the wp-color-picker dependecy to js file
    wp_enqueue_script( 'brankic_icons_custom_js', plugins_url( 'brankic.custom.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  );
}
 


// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$icon_shape = $instance['icon_shape'];

$icon_color = $instance['icon_color'];
$icon_hover_color = $instance['icon_hover_color'];
$icon_bg_color = $instance['icon_bg_color'];
$icon_bg_hover_color = $instance['icon_bg_hover_color'];
$icon_border_color = $instance['icon_border_color'];
$icon_border_hover_color = $instance['icon_border_hover_color'];

$icon_1_url = $instance['icon_1_url'];
$icon_2_url = $instance['icon_2_url'];
$icon_3_url = $instance['icon_3_url'];
$icon_4_url = $instance['icon_4_url'];
$icon_5_url = $instance['icon_5_url'];
$icon_6_url = $instance['icon_6_url'];
$icon_7_url = $instance['icon_7_url'];
$icon_8_url = $instance['icon_8_url'];
$icon_1 = $instance['icon_1'];
$icon_2 = $instance['icon_2'];
$icon_3 = $instance['icon_3'];
$icon_4 = $instance['icon_4'];
$icon_5 = $instance['icon_5'];
$icon_6 = $instance['icon_6'];
$icon_7 = $instance['icon_7'];
$icon_8 = $instance['icon_8'];

if(function_exists('vc_icon_element_fonts_enqueue')) {
			vc_icon_element_fonts_enqueue( "fontawesome" );
		} 
//$brankic_brand_icons_id = 'brankic_brand_icons_' . brankic_string_to_class($instance);

$brankic_brand_icons_id = $this->id . '_brankic_brand_icons';

//print_r($instance);
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
?>
		<div id="<?php echo $brankic_brand_icons_id; ?>" class="social-bookmarks <?php echo $icon_shape ; ?>">                    
        <ul>
            <?php
            $i = 0;
            for ($i = 1 ; $i <= 8 ; $i++)
            {
                $icon_url = "icon_".$i."_url";
                $icon = "icon_".$i."";
                if ($$icon_url != "")
                { 
					if ($icon_shape == "circle" || $icon_shape == "diamond" || $icon_shape == "rectangle" || $icon_shape == "default") {
						?>
						<li><a href="<?php echo $$icon_url; ?>"><i class="fa fa-<?php echo $$icon; ?>"></i></a></li> 
						<?php
					}
					if ($icon_shape == "icon-text") {
						?>
						<li><a href="<?php echo $$icon_url; ?>" class="social-<?php echo $$icon; ?>"><i class="fa fa-<?php echo $$icon; ?>"></i><span><?php echo $$icon; ?></span></a></li>
						<?php
					}
					if ($icon_shape == "text") {
						?>
						<li><a href="<?php echo $$icon_url; ?>" class="social-<?php echo $$icon; ?>"><span><?php echo $$icon; ?></span></a></li>
						<?php
					}
                }
            }
            ?>                        
        </ul><!-- END UL-->
    </div><!--END SOCIAL BOOKMARKS-->
<?php




echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ];else $title = "";

if ( isset( $instance[ 'icon_shape' ] ) ) $icon_shape = $instance[ 'icon_shape' ];else {$icon_shape = "default"; $instance[ 'icon_shape' ] = "default";};

if ( isset( $instance[ 'icon_color' ] ) ) $icon_color = $instance[ 'icon_color' ];else {$icon_color = ""; $instance[ 'icon_color' ] = "";};
if ( isset( $instance[ 'icon_hover_color' ] ) ) $icon_hover_color = $instance[ 'icon_hover_color' ]; else { $icon_hover_color = ""; $instance[ 'icon_hover_color' ] = "";};
if ( isset( $instance[ 'icon_bg_color' ] ) ) $icon_bg_color = $instance[ 'icon_bg_color' ];else {$icon_bg_color = ""; $instance[ 'icon_bg_color' ] = "";};
if ( isset( $instance[ 'icon_bg_hover_color' ] ) ) $icon_bg_hover_color = $instance[ 'icon_bg_hover_color' ];else {$icon_bg_hover_color = ""; $instance[ 'icon_bg_hover_color' ] = "";};
if ( isset( $instance[ 'icon_border_color' ] ) ) $icon_border_color = $instance[ 'icon_border_color' ];else {$icon_border_color = ""; $instance[ 'icon_border_color' ] = "";};
if ( isset( $instance[ 'icon_border_hover_color' ] ) ) $icon_border_hover_color = $instance[ 'icon_border_hover_color' ];else {$icon_border_hover_color = ""; $instance[ 'icon_border_hover_color' ] = "";};

if ( isset( $instance[ 'icon_1' ] ) ) $icon_1 = $instance[ 'icon_1' ]; else { $icon_1 = ""; $instance[ 'icon_1' ] = "";};
if ( isset( $instance[ 'icon_2' ] ) ) $icon_2 = $instance[ 'icon_2' ];else {$icon_2 = ""; $instance[ 'icon_2' ] = "";};
if ( isset( $instance[ 'icon_3' ] ) ) $icon_3 = $instance[ 'icon_3' ];else {$icon_3 = ""; $instance[ 'icon_3' ] = "";};
if ( isset( $instance[ 'icon_4' ] ) ) $icon_4 = $instance[ 'icon_4' ];else {$icon_4 = ""; $instance[ 'icon_4' ] = "";};
if ( isset( $instance[ 'icon_5' ] ) ) $icon_5 = $instance[ 'icon_5' ];else {$icon_5 = ""; $instance[ 'icon_5' ] = "";};
if ( isset( $instance[ 'icon_6' ] ) ) $icon_6 = $instance[ 'icon_6' ];else {$icon_6 = ""; $instance[ 'icon_6' ] = "";};
if ( isset( $instance[ 'icon_7' ] ) ) $icon_7 = $instance[ 'icon_7' ];else {$icon_7 = ""; $instance[ 'icon_7' ] = "";};
if ( isset( $instance[ 'icon_8' ] ) ) $icon_8 = $instance[ 'icon_8' ];else {$icon_8 = ""; $instance[ 'icon_8' ] = "";};
if ( isset( $instance[ 'icon_1_url' ] ) ) $icon_1_url = $instance[ 'icon_1_url' ];else {$icon_1_url = ""; $instance[ 'icon_1_url' ] = "";};
if ( isset( $instance[ 'icon_2_url' ] ) ) $icon_2_url = $instance[ 'icon_2_url' ];else {$icon_2_url = ""; $instance[ 'icon_2_url' ] = "";};
if ( isset( $instance[ 'icon_3_url' ] ) ) $icon_3_url = $instance[ 'icon_3_url' ];else {$icon_3_url = ""; $instance[ 'icon_3_url' ] = "";};
if ( isset( $instance[ 'icon_4_url' ] ) ) $icon_4_url = $instance[ 'icon_4_url' ];else {$icon_4_url = ""; $instance[ 'icon_4_url' ] = "";};
if ( isset( $instance[ 'icon_5_url' ] ) ) $icon_5_url = $instance[ 'icon_5_url' ];else {$icon_5_url = ""; $instance[ 'icon_5_url' ] = "";};
if ( isset( $instance[ 'icon_6_url' ] ) ) $icon_6_url = $instance[ 'icon_6_url' ];else {$icon_6_url = ""; $instance[ 'icon_6_url' ] = "";};
if ( isset( $instance[ 'icon_7_url' ] ) ) $icon_7_url = $instance[ 'icon_7_url' ];else {$icon_7_url = ""; $instance[ 'icon_7_url' ] = "";};
if ( isset( $instance[ 'icon_8_url' ] ) ) $icon_8_url = $instance[ 'icon_8_url' ];else {$icon_8_url = ""; $instance[ 'icon_8_url' ] = "";};


//$brankic_brand_icons_id = 'brankic_brand_icons_' . brankic_string_to_class($instance);
$brankic_brand_icons_id = $this->id . '_brankic_brand_icons';

$inline_style = "";

if ($icon_color != "") $inline_style .= '#' . $brankic_brand_icons_id . '.social-bookmarks a { color: ' . $icon_color . '; }';
	
if ($icon_hover_color != "") $inline_style .= '#' . $brankic_brand_icons_id . '.social-bookmarks a:hover { color: ' . $icon_hover_color . '; }';
		
if ($icon_shape == "circle" || $icon_shape == "diamond" || $icon_shape == "rectangle" || $icon_shape == "default") {

	if ($icon_bg_color != "") $inline_style .= '#' . $brankic_brand_icons_id . '.social-bookmarks a:before { background: ' . $icon_bg_color . '; }';
	
	if ($icon_bg_hover_color != "") $inline_style .= '#' . $brankic_brand_icons_id . '.social-bookmarks a:hover:before { background: ' . $icon_bg_hover_color . '; }';

	if ($icon_border_color != "") $inline_style .= '#' . $brankic_brand_icons_id . '.social-bookmarks a:after { border-color: ' . $icon_border_color . '; }';
	
	if ($icon_border_hover_color != "") $inline_style .= '#' . $brankic_brand_icons_id . '.social-bookmarks a:hover:after { border-color: ' . $icon_border_hover_color . '; }';
	
	$old_db_css = get_option($brankic_brand_icons_id, "");
	
	if ($inline_style != $old_db_css){
		update_option( $brankic_brand_icons_id, $inline_style );
	}
	
}

$all = "500px,adn,amazon,android,angellist,apple,bandcamp,behance,behance-square,bitbucket,bitbucket-square,bitcoin,black-tie,bluetooth,bluetooth-b,btc,buysellads,cc-amex,cc-diners-club,cc-discover,cc-jcb,cc-mastercard,cc-paypal,cc-stripe,cc-visa,chrome,codepen,codiepie,connectdevelop,contao,css3,dashcube,delicious,deviantart,digg,dribbble,dropbox,drupal,edge,eercast,empire,envira,etsy,expeditedssl,fa,facebook,facebook-f,facebook-official,facebook-square,firefox,first-order,flickr,font-awesome,fonticons,fort-awesome,forumbee,foursquare,free-code-camp,ge,get-pocket,gg,gg-circle,git,git-square,github,github-alt,github-square,gitlab,gittip,glide,glide-g,google,google-plus,google-plus-circle,google-plus-official,google-plus-square,google-wallet,gratipay,grav,hacker-news,houzz,html5,imdb,instagram,internet-explorer,ioxhost,joomla,jsfiddle,lastfm,lastfm-square,leanpub,linkedin,linkedin-square,linode,linux,maxcdn,meanpath,medium,meetup,mixcloud,modx,odnoklassniki,odnoklassniki-square,opencart,openid,opera,optin-monster,pagelines,paypal,pied-piper,pied-piper-alt,pied-piper-pp,pinterest,pinterest-p,pinterest-square,product-hunt,qq,quora,ra,ravelry,rebel,reddit,reddit-alien,reddit-square,renren,resistance,safari,scribd,sellsy,share-alt,share-alt-square,shirtsinbulk,simplybuilt,skyatlas,skype,slack,slideshare,snapchat,snapchat-ghost,snapchat-square,soundcloud,spotify,stack-exchange,stack-overflow,steam,steam-square,stumbleupon,stumbleupon-circle,superpowers,telegram,tencent-weibo,themeisle,trello,tripadvisor,tumblr,tumblr-square,twitch,twitter,twitter-square,usb,viacoin,viadeo,viadeo-square,vimeo,vimeo-square,vine,vk,wechat,weibo,weixin,whatsapp,wikipedia-w,windows,wordpress,wpbeginner,wpexplorer,wpforms,xing,xing-square,y-combinator,y-combinator-square,yahoo,yc,yc-square,yelp,yoast,youtube,youtube-play,youtube-square";
	
$icons_array = explode(",", $all);

// Widget admin form
//print_r($instance);
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
					   name="<?php echo $this->get_field_name( 'title' ); ?>"  
					   value="<?php echo esc_attr( $title ); ?>" 
					   type="text"/>
</p>

<p data-id="<?php echo $this->get_field_id('icon_shape'); ?>">
	<label for="<?php echo $this->get_field_id('icon_shape'); ?>"><?php _e( 'Icons Shape:' ); ?></label>
	<select name="<?php echo $this->get_field_name('icon_shape'); ?>" 
		  id="<?php echo $this->get_field_id('icon_shape'); ?>"
		  class="widefat">

		<option <?php if ($icon_shape == 'default') echo 'selected="selected"' ?> value="default">Default</option>
		<option <?php if ($icon_shape == 'circle') echo 'selected="selected"' ?> value="circle">Circle</option>
		<option <?php if ($icon_shape == 'diamond') echo 'selected="selected"' ?> value="diamond">Diamond</option>
		<option <?php if ($icon_shape == 'rectangle') echo 'selected="selected"' ?> value="rectangle">Rectangle</option>
		<option <?php if ($icon_shape == 'text') echo 'selected="selected"' ?> value="text">Text Only</option>
		<option <?php if ($icon_shape == 'icon-text') echo 'selected="selected"' ?> value="icon-text">Icon & Text</option>
	</select> 
</p>

<p>
<label for="<?php echo $this->get_field_id('icon_color'); ?>"><?php _e( 'Color:' ); ?></label>
<input id="<?php echo $this->get_field_id('icon_color'); ?>"
       name="<?php echo $this->get_field_name('icon_color'); ?>"
       value="<?php echo $icon_color; ?>"
	   type="text"
       class="widefat brankic-icons-color-picker"/>
</p>

<p data-id="<?php echo $this->get_field_id('icon_hover_color'); ?>">
<label for="<?php echo $this->get_field_id('icon_hover_color'); ?>"><?php _e( 'Icon hover color (only for Default, Circle, Diamond & Rectangle shapes):' ); ?></label>
<input id="<?php echo $this->get_field_id('icon_hover_color'); ?>"
       name="<?php echo $this->get_field_name('icon_hover_color'); ?>"
       value="<?php echo $icon_hover_color; ?>"
	   type="text"
       class="widefat brankic-icons-color-picker"/>
</p>		

<p data-id="<?php echo $this->get_field_id('icon_bg_color'); ?>">
	<label for="<?php echo $this->get_field_id('icon_bg_color'); ?>"><?php _e( 'Background color (only for Default, Circle, Diamond & Rectangle shapes):' ); ?></label>
	<input id="<?php echo $this->get_field_id('icon_bg_color'); ?>"
       name="<?php echo $this->get_field_name('icon_bg_color'); ?>"
       value="<?php echo $icon_bg_color; ?>"
	   type="text"
       class="widefat brankic-icons-color-picker"/>
</p>

<p data-id="<?php echo $this->get_field_id('icon_bg_hover_color'); ?>">
	<label for="<?php echo $this->get_field_id('icon_bg_hover_color'); ?>"><?php _e( 'Background hover color (only for Default, Circle, Diamond & Rectangle shapes):' ); ?></label>
	<input id="<?php echo $this->get_field_id('icon_bg_hover_color'); ?>"
       name="<?php echo $this->get_field_name('icon_bg_hover_color'); ?>"
       value="<?php echo $icon_bg_hover_color; ?>"
	   type="text"
       class="widefat brankic-icons-color-picker"/>
</p>

<p data-id="<?php echo $this->get_field_id('icon_border_color'); ?>">
	<label for="<?php echo $this->get_field_id('icon_border_color'); ?>"><?php _e( 'Border color (only for Default, Circle, Diamond & Rectangle shapes):' ); ?></label>
	<input id="<?php echo $this->get_field_id('icon_border_color'); ?>"
       name="<?php echo $this->get_field_name('icon_border_color'); ?>"
       value="<?php echo $icon_border_color; ?>"
	   type="text"
       class="widefat brankic-icons-color-picker"/>
</p>

<p data-id="<?php echo $this->get_field_id('icon_border_hover_color'); ?>">
	<label for="<?php echo $this->get_field_id('icon_border_hover_color'); ?>"><?php _e( 'Border hover color (only for Default, Circle, Diamond & Rectangle shapes):' ); ?></label>
	<input id="<?php echo $this->get_field_id('icon_border_hover_color'); ?>"
       name="<?php echo $this->get_field_name('icon_border_hover_color'); ?>"
       value="<?php echo $icon_border_hover_color; ?>"
	   type="text"
       class="widefat brankic-icons-color-picker"/>
</p>



		<p>
        <label for="<?php echo $this->get_field_id('icon_1'); ?>"><?php _e( 'Icon 1:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_1'); ?>" 
                  id="<?php echo $this->get_field_id('icon_1'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_1 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_1_url'); ?>"><?php _e( 'URL 1: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_1_url'); ?>"
				name="<?php echo $this->get_field_name('icon_1_url'); ?>"
				value="<?php echo $icon_1_url; ?>"
                class="widefat"/>
        </p>
		
		<p>
        <label for="<?php echo $this->get_field_id('icon_2'); ?>"><?php _e( 'Icon 2:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_2'); ?>" 
                  id="<?php echo $this->get_field_id('icon_2'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_2 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_2_url'); ?>"><?php _e( 'URL 2: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_2_url'); ?>"
				name="<?php echo $this->get_field_name('icon_2_url'); ?>"
				value="<?php echo $icon_2_url; ?>"
                class="widefat"/>
        </p>
		
		<p>
        <label for="<?php echo $this->get_field_id('icon_3'); ?>"><?php _e( 'Icon 3:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_3'); ?>" 
                  id="<?php echo $this->get_field_id('icon_3'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_3 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_3_url'); ?>"><?php _e( 'URL 3: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_3_url'); ?>"
				name="<?php echo $this->get_field_name('icon_3_url'); ?>"
				value="<?php echo $icon_3_url; ?>"
                class="widefat"/>
        </p>
		
		<p>
        <label for="<?php echo $this->get_field_id('icon_4'); ?>"><?php _e( 'Icon 4:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_4'); ?>" 
                  id="<?php echo $this->get_field_id('icon_4'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_4 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_4_url'); ?>"><?php _e( 'URL 4: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_4_url'); ?>"
				name="<?php echo $this->get_field_name('icon_4_url'); ?>"
				value="<?php echo $icon_4_url; ?>"
                class="widefat"/>
        </p>
		
		<p>
        <label for="<?php echo $this->get_field_id('icon_5'); ?>"><?php _e( 'Icon 5:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_5'); ?>" 
                  id="<?php echo $this->get_field_id('icon_5'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_5 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_5_url'); ?>"><?php _e( 'URL 5: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_5_url'); ?>"
				name="<?php echo $this->get_field_name('icon_5_url'); ?>"
				value="<?php echo $icon_5_url; ?>"
                class="widefat"/>
        </p>
		
		<p>
        <label for="<?php echo $this->get_field_id('icon_6'); ?>"><?php _e( 'Icon 6:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_6'); ?>" 
                  id="<?php echo $this->get_field_id('icon_6'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_6 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_6_url'); ?>"><?php _e( 'URL 6: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_6_url'); ?>"
				name="<?php echo $this->get_field_name('icon_6_url'); ?>"
				value="<?php echo $icon_6_url; ?>"
                class="widefat"/>
        </p>
		
		<p>
        <label for="<?php echo $this->get_field_id('icon_7'); ?>"><?php _e( 'Icon 7:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_7'); ?>" 
                  id="<?php echo $this->get_field_id('icon_7'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_7 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_7_url'); ?>"><?php _e( 'URL 7: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_7_url'); ?>"
				name="<?php echo $this->get_field_name('icon_7_url'); ?>"
				value="<?php echo $icon_7_url; ?>"
                class="widefat"/>
        </p>
		
		<p>
        <label for="<?php echo $this->get_field_id('icon_8'); ?>"><?php _e( 'Icon 8:' ); ?></label>
          <select name="<?php echo $this->get_field_name('icon_8'); ?>" 
                  id="<?php echo $this->get_field_id('icon_8'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
				<?php 
				foreach ($icons_array as $icon)
				{
				?>
				<option <?php if ($icon_8 == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>" class="fa fa-<?php echo $icon; ?>"> <?php echo $icon; ?></option>
				<?php
				}
				?>
          </select> 
        
        </p>
		
		<p>
		<label for="<?php echo $this->get_field_id('icon_8_url'); ?>"><?php _e( 'URL 8: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('icon_8_url'); ?>"
				name="<?php echo $this->get_field_name('icon_8_url'); ?>"
				value="<?php echo $icon_8_url; ?>"
                class="widefat"/>
        </p>





<?php 
}


     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['icon_shape'] = ( ! empty( $new_instance['icon_shape'] ) ) ? strip_tags( $new_instance['icon_shape'] ) : 'default';

$instance['icon_color'] = ( ! empty( $new_instance['icon_color'] ) ) ? strip_tags( $new_instance['icon_color'] ) : '';
$instance['icon_hover_color'] = ( ! empty( $new_instance['icon_hover_color'] ) ) ? strip_tags( $new_instance['icon_hover_color'] ) : '';
$instance['icon_bg_color'] = ( ! empty( $new_instance['icon_bg_color'] ) ) ? strip_tags( $new_instance['icon_bg_color'] ) : '';
$instance['icon_bg_hover_color'] = ( ! empty( $new_instance['icon_bg_hover_color'] ) ) ? strip_tags( $new_instance['icon_bg_hover_color'] ) : '';
$instance['icon_border_color'] = ( ! empty( $new_instance['icon_border_color'] ) ) ? strip_tags( $new_instance['icon_border_color'] ) : '';
$instance['icon_border_hover_color'] = ( ! empty( $new_instance['icon_border_hover_color'] ) ) ? strip_tags( $new_instance['icon_border_hover_color'] ) : '';

$instance['icon_1_url'] = ( ! empty( $new_instance['icon_1_url'] ) ) ? strip_tags( $new_instance['icon_1_url'] ) : '';
$instance['icon_2_url'] = ( ! empty( $new_instance['icon_2_url'] ) ) ? strip_tags( $new_instance['icon_2_url'] ) : '';
$instance['icon_3_url'] = ( ! empty( $new_instance['icon_3_url'] ) ) ? strip_tags( $new_instance['icon_3_url'] ) : '';
$instance['icon_4_url'] = ( ! empty( $new_instance['icon_4_url'] ) ) ? strip_tags( $new_instance['icon_4_url'] ) : '';
$instance['icon_5_url'] = ( ! empty( $new_instance['icon_5_url'] ) ) ? strip_tags( $new_instance['icon_5_url'] ) : '';
$instance['icon_6_url'] = ( ! empty( $new_instance['icon_6_url'] ) ) ? strip_tags( $new_instance['icon_6_url'] ) : '';
$instance['icon_7_url'] = ( ! empty( $new_instance['icon_7_url'] ) ) ? strip_tags( $new_instance['icon_7_url'] ) : '';
$instance['icon_8_url'] = ( ! empty( $new_instance['icon_8_url'] ) ) ? strip_tags( $new_instance['icon_8_url'] ) : '';
$instance['icon_1'] = ( ! empty( $new_instance['icon_1'] ) ) ? strip_tags( $new_instance['icon_1'] ) : '';
$instance['icon_2'] = ( ! empty( $new_instance['icon_2'] ) ) ? strip_tags( $new_instance['icon_2'] ) : '';
$instance['icon_3'] = ( ! empty( $new_instance['icon_3'] ) ) ? strip_tags( $new_instance['icon_3'] ) : '';
$instance['icon_4'] = ( ! empty( $new_instance['icon_4'] ) ) ? strip_tags( $new_instance['icon_4'] ) : '';
$instance['icon_5'] = ( ! empty( $new_instance['icon_5'] ) ) ? strip_tags( $new_instance['icon_5'] ) : '';
$instance['icon_6'] = ( ! empty( $new_instance['icon_6'] ) ) ? strip_tags( $new_instance['icon_6'] ) : '';
$instance['icon_7'] = ( ! empty( $new_instance['icon_7'] ) ) ? strip_tags( $new_instance['icon_7'] ) : '';
$instance['icon_8'] = ( ! empty( $new_instance['icon_8'] ) ) ? strip_tags( $new_instance['icon_8'] ) : '';
return $instance;
}
} // Class wpb_widget ends here