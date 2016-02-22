<div class="footer-widget">
	<?php
		global $solarize_config;
		switch($solarize_config['solarize-footer-number-widget'])
		{
			case '1':
				dynamic_sidebar('footer-widget-1');
			break;
			case '2':
				echo '<div class="col-lg-6 col-md-6 col-sm-6">';
					dynamic_sidebar('footer-widget-1');
				echo '</div>';
				echo '<div class="col-lg-6 col-md-6 col-sm-6 last">';
					dynamic_sidebar('footer-widget-2');
				echo '</div>';
			break;
			case '3':
				echo '<div class="col-lg-4 col-md-4 col-sm-6">';
					dynamic_sidebar('footer-widget-1');
				echo '</div>';
				echo '<div class="col-lg-4 col-md-4 col-sm-6">';
					dynamic_sidebar('footer-widget-2');
				echo '</div>';
				echo '<div class="col-lg-4 col-md-4 col-sm-6 last">';
					dynamic_sidebar('footer-widget-3');
				echo '</div>';
			break;
			case '4':
				echo '<div class="col-lg-3 col-md-3 col-sm-6">';
					dynamic_sidebar('footer-widget-1');
				echo '</div>';
				echo '<div class="col-lg-3 col-md-3 col-sm-6">';
					dynamic_sidebar('footer-widget-2');
				echo '</div>';
				echo '<div class="col-lg-3 col-md-3 col-sm-6">';
					dynamic_sidebar('footer-widget-3');
				echo '</div>';
				echo '<div class="col-lg-3 col-md-3 col-sm-6 last">';
					dynamic_sidebar('footer-widget-4');
				echo '</div>';
			break;
		}
	?>
</div>
