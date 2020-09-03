<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    apigoat_doc
 * @subpackage apigoat_doc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    apigoat_doc
 * @subpackage apigoat_doc/admin
 * @author     Your Name <email@example.com>
 */
class apigoat_doc_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $apigoat_doc    The ID of this plugin.
	 */
	private $apigoat_doc;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $apigoat_doc       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($apigoat_doc, $version)
	{

		$this->apigoat_doc = $apigoat_doc;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in apigoat_doc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The apigoat_doc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->apigoat_doc, plugin_dir_url(__FILE__) . 'css/apigoat_doc-admin.css', array(), $this->version, 'all');
		wp_enqueue_style($this->apigoat_doc, plugin_dir_url(__FILE__) . '../../wedocs/assets/css/frontend.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in apigoat_doc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The apigoat_doc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->apigoat_doc, plugin_dir_url(__FILE__) . 'js/apigoat_doc-admin.js', array('jquery'), $this->version, false);
	}

	public function register_session()
	{
		if (!session_id()) {
			session_start();
		}
	}
}
