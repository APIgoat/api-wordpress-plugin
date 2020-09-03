<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    apigoat_doc
 * @subpackage apigoat_doc/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    apigoat_doc
 * @subpackage apigoat_doc/public
 * @author     Your Name <email@example.com>
 */
class apigoat_doc_Public
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
	 * @param      string    $apigoat_doc       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($apigoat_doc, $version)
	{

		$this->apigoat_doc = $apigoat_doc;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->apigoat_doc, plugin_dir_url(__FILE__) . 'css/apigoat_doc-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->apigoat_doc, plugin_dir_url(__FILE__) . 'js/apigoat_doc-public.js', array('jquery'), $this->version, false);
	}

	public function register_session()
	{
		if (!session_id()) {
			session_start();
		}
	}
}
