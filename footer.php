<?php global $redux_demo; ?>
			</div> <!-- /container -->
			<footer>
			<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
				<div class="footer-menu">
					<div class="container">
						<?php wp_nav_menu( array(
							'menu'              => 'footer-menu',
							'theme_location'    => 'footer-menu',
							'depth'             => 2,
							'container'         => false,
							'container_class'   => 'navbar',
							'menu_class'        => 'nav nav-pills',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						); ?> 
					</div>
				</div>
			<?php endif; ?>
				<div class="footer-widgets-panel">
					<div class="container">
						<div class="row">
							<div class="col-md-3"><?php dynamic_sidebar( 'footer-column-1' ); ?></div>
							<div class="col-md-3"><?php dynamic_sidebar( 'footer-column-2' ); ?></div>
							<div class="col-md-3"><?php dynamic_sidebar( 'footer-column-3' ); ?></div>
							<div class="col-md-3"><?php dynamic_sidebar( 'footer-column-4' ); ?></div>
						</div>
					</div>
				</div>
				<div class="footer-credits">
					<div class="container">
						<h6 class="pull-left">&copy; <?php echo date('Y'); ?> <?php echo $redux_demo['footer-copyright-text']; ?></h6>
						<h5 class="pull-right"><a href="#top"><i class="fa fa-arrow-circle-up"></i> Back to top</a></h5>
					</div>
				</div>
			</footer>
			<?php wp_footer(); ?>
			<script type="text/javascript"><?php echo $redux_demo['tracking-code']; ?></script>
		</div> <!-- /mmenu wrapper -->
	</body>
</html>