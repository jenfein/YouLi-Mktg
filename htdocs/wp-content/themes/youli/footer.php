<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
        	<div class="container">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'twentysixteen_credits' );
				?>
                <p>YouLi Travel Pty. Ltd. ©2016</p>
<?php /*?>				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a><?php */?>
			</div><!-- .site-info -->
			</div>
		</footer><!-- .site-footer -->
<script>
	jQuery(document).ready(function(e) {
		jQuery('.tabs-p .btn').click(function(e) {
            if(jQuery('.tabs-p .lft').hasClass('active'))
			{
				jQuery('.tabs-p .lft').removeClass('active');
				jQuery('.tabs-p .rft').addClass('active');				
			}else if(jQuery('.tabs-p .rft').hasClass('active')){
				jQuery('.tabs-p .rft').removeClass('active');
				jQuery('.tabs-p .lft').addClass('active');
				}
			if(jQuery('.tabs-p span.lft').hasClass('active'))
				{
					jQuery('.youli-box').css('display','block');
										jQuery('.tabs-p .btn .sla').css('right','0');
				}
			else
				{
					jQuery('.youli-box').css('display','none');
				}
				
			if(jQuery('.tabs-p span.rft').hasClass('active'))
				{
					jQuery('.testo-box').css('display','block');
					jQuery('.tabs-p .btn .sla').css('right','-41px');
				}
			else
				{
					jQuery('.testo-box').css('display','none');
				}
        });
		
		jQuery('.tabs-p span').click(function(e) {
			if(jQuery(this).hasClass('active')){
				//jQuery('.tabs-p span').removeClass('active');
			}
			else
			{
				jQuery('.tabs-p span').removeClass('active');
				jQuery(this).addClass('active');
			}
			if(jQuery('.tabs-p span.lft').hasClass('active'))
				{
					jQuery('.youli-box').css('display','block');
										jQuery('.tabs-p .btn .sla').css('right','0');
				}
			else
				{
					jQuery('.youli-box').css('display','none');
				}
				
			if(jQuery('.tabs-p span.rft').hasClass('active'))
				{
					jQuery('.testo-box').css('display','block');
					jQuery('.tabs-p .btn .sla').css('right','-41px');
				}
			else
				{
					jQuery('.testo-box').css('display','none');
				}						
		});	
	});
</script>
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
       <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.switchButton.js" type="text/javascript" ></script>
        <script>
 $(function() {
		
$(".switch-wrapper input[type=checkbox]").switchButton({
  on_label: 'yes',
  off_label: 'no'
});
  })
        
        </script>-->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
