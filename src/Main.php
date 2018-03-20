<?php
/**
 * Created by IntelliJ IDEA.
 * User: e074820
 * Date: 20/03/2018
 * Time: 14:33
 */

namespace BHAA_EE;

class Main {

    /**
     * The unique identifier of this plugin.
     */
    protected $plugin_name;
    /**
     * The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     */
    public function __construct() {
        $this->plugin_name = 'bhaa_ee_plugin';
        $this->version = '1.0.0';
    }

    public function run() {
        add_filter( 'admin_footer_text', 'bhaa_ee_remove_footer_text', 11 );
        add_action( 'pre_get_posts', 'bhaa_ee_add_espresso_events_to_posts', 10 );
    }

    // https://eventespresso.com/wiki/useful-php-code-snippets/
    function bhaa_ee_remove_footer_text() {
        remove_filter( 'admin_footer_text', array( 'EE_Admin', 'espresso_admin_footer' ), 10 );
    }

    // Add events to the post feed. via https://eventespresso.com/wiki/useful-php-code-snippets/
    function bhaa_ee_add_espresso_events_to_posts( $WP_Query ) {
        if ( $WP_Query instanceof WP_Query && ( $WP_Query->is_feed || $WP_Query->is_posts_page
                || ( $WP_Query->is_home && ! $WP_Query->is_page ) ||  ( isset( $WP_Query->query_vars['post_type'] )
                    && ( $WP_Query->query_vars['post_type'] == 'post' || is_array( $WP_Query->query_vars['post_type'] )
                        && in_array( 'post', $WP_Query->query_vars['post_type'] ) ) ) ) ) {
            //if post_types ARE present and 'post' is not in that array, then get out!
            if ( isset( $WP_Query->query_vars['post_type'] ) && $post_types = (array) $WP_Query->query_vars['post_type'] ) {
                if ( ! in_array( 'post', $post_types ) ) {
                    return;
                }
            } else {
                $post_types = array( 'post' );
            }
            if ( ! in_array( 'espresso_events', $post_types )) {
                $post_types[] = 'espresso_events';
                $WP_Query->set( 'post_type', $post_types );
            }
            return;
        }
    }
}