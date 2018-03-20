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
    public function __construct()
    {
        $this->plugin_name = 'bhaa_ee_plugin';
        $this->version = '1.0.0';
    }

    public function run() {
    }

}