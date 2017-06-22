<?php
/*
Plugin Name: Redirect to User Site
Plugin URI: https://github.com/mirhec/redirect-to-user-site
Description: ...
Version: 1.0
Author: Mirko Hecky
Author URI: none
License: GPL2
*/

add_action('init', 'redirect_to_user_site_register_shortcodes');

function redirect_to_user_site_register_shortcodes() {
    // register shortcode [redirect_to_user_site]
    add_shortcode('redirect_to_user_site', 'do_redirect_to_user_site');
}

function do_redirect_to_user_site($args, $content) {
    if(!is_multisite()) return;

    $uid = get_current_user_id();
    if($uid == 0) return;

    $currurl = get_site_url();
    $sites = get_blogs_of_user($uid);
    $numsites = count($sites);
    foreach ($sites as $key => $site) break;

    if($currurl != $site->siteurl)
        return "<script>location.href = '$site->siteurl';</script>";
    return '';
}

?>
