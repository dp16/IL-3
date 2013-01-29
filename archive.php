<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="content-bg">
<div id="wrapper">
<div id="home-deck">
<div id="slider">
<?php echo slider_pro(1); ?>
</div>

<div id="slider-right">
<div class="widget-featured">
<div id="flightsoffancy"></div>
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
					featured_posts_YIW( $args );
					 
					?>	</div>
<!--<div id="home300-c">     --><div id="home300"> <p>ADVERTISEMENT</p>  <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ad300.jpg"></a></li>
<!--</div>--></div></div>

</div>

<div id="infinite-articles"></div>
<div id="fullhome">
<div id="fullhomeposts">
<?php if ( have_posts() ): ?>
<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<div class="featured-home"><a href="<?php esc_url( the_permalink() ); ?>"><?php

			the_post_thumbnail( 'custom-post-image' ); // insert "custom size" image

			?></a></div>
								<div class="cat"><?php $parentscategory ="";
								foreach((get_the_category()) as $category) {
								if ($category->category_parent == 0) {
								$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
								}
								}
								echo substr($parentscategory,0,-2); ?></div>

					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

										<div class="post-info">By <?php the_author(); ?> on <?php the_time('M. j'); ?><b> |</b> <?php comments_popup_link('0 Shares', '1 Share', '% Comments'); ?><b> |</b> Paris</div>


				<?php the_content( __( '...', 'twentyten' ) ); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php else: ?>
<h2>No posts to display</h2>
<?php endif; ?>
</div>
<div id="pagination"><?php next_posts_link('Load More Articles') ?></div>

<div id="infinite-footer">

<div id="footer-left">

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

</div>

<div id="footer-mid">
		<div id="facebookwidget"><h2 class="hide">Facebook</h2></div>

<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fhypebeast&amp;send=false&amp;layout=standard&amp;width=335&amp;show_faces=true&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=80&amp;appId=162246747192992" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:335px; height:80px;" allowTransparency="true"></iframe>
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
<form action="http://kicksdeals.us5.list-manage1.com/subscribe/post?u=d5902ca22ea79a564fb64787b&amp;id=85c80acf8d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>

<!--End mc_embed_signup-->


</div>
<div id="footer-right">
		<div id="popularcities"><h2 class="hide">Popular Cities</h2></div>
<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
<?php wp_nav_menu( array('menu' => 'city-footer-right' )); ?> 

</div>


</div>
</div>
</div>

</div>


</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>

