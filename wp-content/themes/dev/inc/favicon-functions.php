<?php
/**
 * Add custom favicon for the dev theme.
 */
function dev_custom_favicon() {
  // Array of favicon types
  $favicons = array(
      'favicon.ico',
      'favicon-16x16.png',
      'favicon-32x32.png',
      'favicon-96x96.png',
      'apple-touch-icon.png',
      'ms-icon-144x144.png',
      'android-icon-36x36.png',
      'android-icon-48x48.png',
      'android-icon-72x72.png',
      'android-icon-144x144.png',
      'android-icon-192x192.png',
      'apple-icon-57x57.png',
      'apple-icon-60x60.png',
      'apple-icon-72x72.png',
      'apple-icon-76x76.png',
      'apple-icon-114x114.png',
      'apple-icon-152x152.png',
      'apple-icon-180x180.png',
      'apple-icon.png',
      'apple-icon-precomposed.png',
  );

  // Favicon tags
  foreach ($favicons as $favicon) {
      $type = pathinfo($favicon, PATHINFO_EXTENSION);
      $size = rtrim($favicon, '.' . $type);
      $type = $type == 'ico' ? 'image/x-icon' : 'image/png';
      $rel  = $type == 'image/x-icon' ? 'shortcut icon' : ($type == 'image/png' ? 'apple-touch-icon' : 'icon');

      printf('<link rel="%s" type="%s" href="%s/assets/favicons/%s">', $rel, $type, get_stylesheet_directory_uri(), $favicon);

      if ($favicon == 'ms-icon-144x144.png') {
          echo '<meta name="msapplication-TileColor" content="#ffffff">';
          echo '<meta name="msapplication-TileImage" content="' . get_stylesheet_directory_uri() . '/assets/favicons/' . $favicon . '">';
      }
  }
}

add_filter('wp_get_attachment_image_attributes', 'change_attachement_image_attributes', 20, 2);

function change_attachement_image_attributes($attr, $attachment) {
    $attr['loading'] = 'lazy';
    return $attr;
}

