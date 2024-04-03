<?php
function lang_non_mobile_plugins() {
    return array(
        'wp-parsidate/wp-parsidate.php',
    );
}


add_filter( 'option_active_plugins', 'lang_disable_plugins_for_mobiles' );
function lang_disable_plugins_for_mobiles( $plugins ) {

  if(strpos($_SERVER['REQUEST_URI'], '/en') === false) {
    return $plugins; // for non-mobile device do nothing
  }

  $not_allowed = lang_non_mobile_plugins(); // get non allowed plugins

  return array_values( array_diff( $plugins, $not_allowed ) );

}
