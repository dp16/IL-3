 <?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<!--<div id="social-post">

<p><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=box_count&amp;width=450&amp;show_faces=true&amp;font=tahoma&amp;colorscheme=light&amp;action=like&amp;height=90&amp;appId=470750729626581" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:45px; height:63px;" allowTransparency="true"></iframe></p>

<p><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-count="vertical" data-via="infinitelegroom">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>

<p><!-- Place this tag where you want the share button to render. --*>
<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60" data-href="<?php the_permalink(); ?>"></div>

<!-- Place this tag after the last share tag. --*>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></p>

<p><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=google.com&description=<?php the_excerpt(); ?>" class="pin-it-button" count-layout="vertical"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></p>

</div>-->

<div class="widget-featured">
<div id="flightsoffancy2"></div>
					<?php
					$args = array(
					       'title'        => '',
					       'numberposts'  => 4,
					       'orderby'      => 'DESC',
					       'widththumb'   => 40,
					       'heightthumb'  => 27,
					       'beforetitle'  => '<h4>',
					       'aftertitle'   => '</h4>'
					   );
					if(function_exists('featured_posts_YIW')) featured_posts_YIW( $args );
					 
					?>	</div>
					
					
					<div class="widget">										
									
					<div id="followus"><h2 class="hide">Follow Us</h2></div>
					<div id="followus-items">
					<a href="https://www.facebook.com/pages/Infinite-Legroom/441297992571193"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-sidebar.png"></a>				
				<a href="http://twitter.com/infinitelegroom"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-sidebar.png"></a>				
				<a href="http://www.instagram.com/infinitelegroom"><img src="<?php bloginfo('template_directory'); ?>/images/instagram-sidebar.png"></a>				
	
					</div>

      	<div class="widget">
      		<div id="newsletterwidget"><h2 class="hide">Newsletter</h2></div>
      <!-- Begin MailChimp Signup Form -->
      <link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
      <style type="text/css">
      	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
      	#mc_embed_signup .button {background-color: #484848;
      	}
      	#mc_embed_signup input.button{
      	
      	display: block;
      	
      	width: 30%;
      	
      	margin-top: -37px;
      	
      	margin-right:0px;
      	
      	margin-bottom:5px;
      	
      	
      	min-width: 9px;
      	float: right;
      	font-family: 'Borda-Medium';
      	}
      	
      	#mc_embed_signup input.email 	
      	{
      	
      	display: block;
      	
      	padding-top: 4px;
      	
      	padding-right: 0pt;
      	
      	padding-bottom: 8px;
      	
      	padding-left: 0pt;
      	
      	margin-top: 0pt;
      	
      	margin-right: 1%;
      	
      	margin-bottom: 5px;
      	
      	margin-left: -10px;
      	
      	text-indent: 5px;
      	
      	width: 40%;
      	
      	min-width: 230px;
      	font-family: 'Borda-Medium';
      	}
      	
      	#mc_embed_signup .button:hover {background-color: #000;}
      	#mc_embed_signup label {
      	
      	display: block;
      	
      	font-size: 13px;
      	
      	padding-bottom: 10px;
      	
      	font-weight: normal;
      	
      	}
      	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
      	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
      </style>
      <div id="mc_embed_signup">
       <form action="http://infinitelegroom.us6.list-manage1.com/subscribe/post?u=c676f3fddaf020f47fcb89d81&amp;id=a1e7751094" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
      	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
      	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
      </form>
      </div>
      
      <!--End mc_embed_signup-->
      </div>
      
      <div class="widget">
      <div id="post300"> <p>ADVERTISEMENT</p>  <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ad300.jpg"></a></li>
     </div></div>
      
	<div class="widget">
	<div id="infinitetips"><h2 class="hide">Infinite Tips</h2></div>
	<?php
								$the_query = new WP_Query('showposts=4&orderby=post_date&order=desc');
								while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<div class="twentyten-latest-post">
											<a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php the_post_thumbnail(array(40,27), array ('class' => 'alignleft')); ?></a>
											 <div class="wtf"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
											 <div class="clear"></div>
										</div>				
	
								<?php endwhile; ?>
								<?php wp_reset_query(); ?>
	        <!--<div id="search-bar"> 
	            <form method="get" id="searchform1" action="<?php bloginfo('url'); ?>"> 
	 <input type="text" value="SEARCH" onfocus="if (this.value=='SEARCH') this.value='';" name="s" id="searchinput" /> 
	                <input type="image" src="<?php bloginfo('template_directory'); ?>/images/search-submit.jpg" id="searchsubmit" /> 
	            </form> 
	        </div>--> <!-- #search-bar --> <!--</div>-->
				
	<div class="widget">										
				
<div id="facebookwidget"><h2 class="hide">Facebook</h2></div>

<iframe src="//www.facebook.com/plugins/like.php?href=https://www.facebook.com/pages/Infinite-Legroom/441297992571193&amp;send=false&amp;layout=standard&amp;width=335&amp;show_faces=true&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=80&amp;appId=162246747192992" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:335px; height:80px;" allowTransparency="true"></iframe></div>
			
				
<div class="widget">										
				
<div id="twitterwidget"><h2 class="hide">Twitter</h2></div>

<a href="https://twitter.com/infinitelegroom" class="twitter-follow-button" data-show-count="true" data-size="large">Follow @infinitelegroom</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'mainsidebar' ) ) : ?>
	
			
		<?php endif; // end primary widget area ?>


<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul></div>

<?php endif; ?>
