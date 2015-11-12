			</div>
		</div>
		<footer>
			<div class="container">
				<div class="copyright">
					<?php echo sprintf( __( '%1$s %2$s %3$s. ' . $lang[ 'all rights reserved' ], 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/javascript/lib/bootstrap.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>