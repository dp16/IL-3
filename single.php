<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="bg">
<div id="single-posts">
<div id="single-post-share">
				<a class="tooltip" href="#"><img class="tooltip" src="<?php bloginfo('template_directory'); ?>/images/facebook-b.png"><span class="classic"><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=162246747192992" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></span></a>
			
			<a class="tooltip" href="#"><img class="tooltip" src="<?php bloginfo('template_directory'); ?>/images/twitter-b.png"><span class="classic"><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=162246747192992" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></span></a>
			
			<a class="tooltip" href="#"><img class="tooltip" src="<?php bloginfo('template_directory'); ?>/images/pinterest-b.png"><span class="classic"><!-- Place this tag where you want the share button to render. -->
			<div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?php the_permalink(); ?>"></div>
			
			<!-- Place this tag after the last share tag. -->
			<script type="text/javascript">
			  (function() {
			    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			    po.src = 'https://apis.google.com/js/plusone.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script></span></a>
			

				</div>

<h1><?php the_title(); ?></h1>

<?php

	if( get_post_type( $post->ID ) == 'dp_module' ){
		$parents = get_post_ancestors( $post->ID );
		$parent_id = $parents[count($parents) - 1];
	} else {
		$parent_id = $post->ID;
	}

	$parent_post = get_post($parent_id);
	$excerpt = apply_filters( 'get_the_excerpt', $parent_post->post_excerpt );

?>

<div class="excerpt"><?php echo $excerpt; ?></div>
<div class="postinfo">
Posted by <?php the_author(); ?> in <?php the_category(', ') ?> on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>. <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?> <?php if(function_exists('the_field')) the_field('line'); ?><?php if(function_exists('the_field')) the_field('city'); ?>  
</div>

 	
	 
<div id="wrapper">
<div id="leftcol">
<article>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="atrak-gallery-image-wrap<?php if(get_dp_sections($post->ID)) echo ' dp-gallery-post'; ?>">
	<?php if(get_dp_sections($post->ID)){ ?>
		<span class="dp_carousel_nav_prev" data-tooltip="Shift + ←" original-title=""></span>
		<span class="dp_carousel_nav_next" data-tooltip="Shift + →" original-title=""></span>
	<?php } ?>
	
	<?php 
	// The featured image and module feature images
	if( has_post_thumbnail() ){
		the_post_thumbnail( 'dp-full' ); 
	} elseif( get_dp_module_media( $post ) ){
		echo dp_module_media( $post );
	} ?>
</div>

<?php if(get_dp_sections($post->ID)){ ?>
	<span class="dp-carousel-count"><span class="dp-carousel-count-current"></span><span class="dp-carousel-count-total"></span></span>
<?php } ?>

<?php 
// The slider + navigation
dp_carousel( $post->ID ); ?>


<!--	<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>-->
	
				<div class="entry">
					<?php 
					// Normal post description
					the_content();
	
					// Module post descriptions
					dp_module_contents(); ?>
				</div>
				
				<?php if( get_post_type( $post->ID ) != 'dp_module' ){ ?>		
			
			<?php } ?>
			
							</article>
			<div class="post-end-logo"><a href="http://infinitelegroom.com"><img src="<?php bloginfo('template_directory'); ?>/images/IL.png" width="30px" height="30px"/></a></div>
						
						<div class="post-end-twitter"><a href="https://twitter.com/infinitelegroom" class="twitter-follow-button" data-show-count="false">Follow @infinitelegroom</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
			

<!--	<?php if ( get_the_author_meta( 'description' ) ) : ?>-->
<!--	<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>-->
<!--	<h3>About <?php echo get_the_author() ; ?></h3>-->
<!--	<?php the_author_meta( 'description' ); ?>-->
<!--	<?php endif; ?>-->
<div class="relatedposts">
<div id="relatedstories"><h2 class="hide">Related Stories - Why Stop Here?</h2></div>

<?php if(function_exists('related_posts')) related_posts()?></div>

	<div id="comments"><div id="infinitecomments"><h2 class="hide">Infinite Comments - Tell Us How You Really Feal!</h2></div>
	<?php comments_template( '', true ); ?></div>


<?php endwhile; ?>
</div>
</div></div>
<div id="rightcol"><?php get_sidebar(); ?></div>
</div><!--</div>-->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>