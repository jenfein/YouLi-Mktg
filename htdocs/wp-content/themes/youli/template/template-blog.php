<?php

/**

 * Template Name: Blog Page

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */
 get_header();
 ?>	 
  
  
<div class="content_holder subpages">
    <div class="content sm_padded">
        <div class="cd-post">
            <div class="cd-post-items">
                <?php   $args = array( 'post_type' => 'blog_post', 'order'=>'ASC','posts_per_page'=> '-1','suppress_filters' => false);?>
                    <?php $the_query = new WP_Query( $args ); 	?>
                    
                    <?php if ( $the_query->have_posts() ) :  ?>
        
                 <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="p-part">
                    <a class="cd-faq-trigger" href="<?php echo get_permalink( $post->ID ); ?>"><?php twentysixteen_post_thumbnail(); ?></a>
                    <div class="post-deta">
                    	<p><?php the_time('F jS, Y') ?></p>
                        <a class="cd-post-trigger" href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title();?></a>
                        <?php /*?><div class="cd-faq-content">
                            <?php the_content();?>
                        </div><?php */?> <!-- cd-faq-content -->
                    </div>    
                    </div>
                    <?php endwhile; ?>
                        
                    
            <?php endif; ?>
                
            </div> 
        </div>  
    </div>
</div>



 
 
<?php get_sidebar( 'content-bottom' ); ?>
 <?php  get_footer();?>