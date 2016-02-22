<?php global $solarize_config; ?>
<?php if($solarize_config['header-social-list']){ ?>
<ul class="solarize-social-header">
<?php foreach ($solarize_config['header-social-list'] as $value): ?>
  <li class="bounceIn animated"><a target="_blank" href="<?php echo esc_url( $value['url'] ); ?>"><i class="<?php echo esc_attr($value['title']); ?>"></i></a></li>
<?php endforeach ?>
</ul>
<?php } ?>