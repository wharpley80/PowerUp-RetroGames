<div class="foot-cont">
	<div class="footer-head">
		<a href="<?php bloginfo('url'); ?>"><img class="foot-logo" src="<?php bloginfo('template_directory'); ?>/img/My_Logo.png"></a>
	</div>
	<div class="small-12 columns">
		<div class="small-12 medium-3 columns">
			<h4 id="retro-foot">Game Systems</h4>
			<hr>
			<?php 
        $defaults = array(
          'container' => false,
          'theme_location' => 'game-menu',
          'menu_id' => 'foot-menu'
        );

        wp_nav_menu( $defaults );
      ?>
		</div>
		<div class="small-12 medium-3 columns">
			<h4 id="retro-foot">Company</h4>
			<hr>
			<?php 
        $defaults = array(
          'container' => false,
          'theme_location' => 'company-menu',
          'menu_id' => 'foot-menu'
        );

        wp_nav_menu( $defaults );
      ?>
		</div>
		<div class="small-12 medium-3 columns foot-grid">
			<h4 id="retro-foot">Blog</h4>
			<hr>
			<h5 class="small-head">Recent Posts</h5>
			<ul>
			<?php
				$recent_posts = wp_get_recent_posts();
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
				}
			?>
			</ul>
			<h5 class="small-head">Category</h5>
			<ul>
				<?php wp_list_categories('orderby=name&title_li'); ?>
			</ul>
		</div>
		<div class="small-12 medium-3 columns foot-grid">
			<h4 id="retro-foot">Social</h4>
			<hr>
			<ul>
				<li>
					<a href=""><img src="<?php bloginfo('template_directory'); ?>/img/social/Facebook.png" class="social-icon">Facebook</a>
				</li>
				<li>
					<a href="http://twitter.com/PowerUpRetroGms/"><img src="<?php bloginfo('template_directory'); ?>/img/social/Twitter.png" class="social-icon">Twitter</a>
				</li>
				<li>
					<a href="https://www.youtube.com/channel/UCyxa1OESMqK7V68zRscpHdA"><img src="<?php bloginfo('template_directory'); ?>/img/social/Youtube.png" class="social-icon">Youtube</a>
				</li>
				<li>
					<a href="mailto:PowerUpRetroGames@gmail.com"><img src="<?php bloginfo('template_directory'); ?>/img/social/Email.png" class="social-icon">Email</a>
				</li>
			</ul>
		</div>
	</div>
	<footer>  
		<div class="small-6 columns">
			<p>&copy; <?php bloginfo('name'); ?><?php echo date(' Y'); ?> by
	      <a href="http://williamharpleyportfolio.com/">William Harpley</a>
	    </p>
		</div>
		<div class="small-6 columns right">
			<p><?php do_action( 'wpt_footer' ); ?></p>
		</div>       
	</footer>
  <?php wp_footer(); ?>
  <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-68657371-9', 'auto');
	  ga('send', 'pageview');

	</script>
  </body>
</html>