<?php

namespace LittleBizzy\PluginNamespace\Includes\Classes;

use LittleBizzy\PluginNamespace as PluginRoot;

class PluginView
{
    /**
     * Locate template.
     *
     * Locate the called template.
     * Search Order:
     * 1. /themes/theme/your-theme-name/$template_name
     * 2. /themes/theme/$template_name
     * 3. /plugins/your-plugin-name/resources/views/$template_name.
     *
     * @param 	string 	$template_name			Template to load.
     * @param 	string 	$string $template_path	Path to templates.
     * @param 	string	$default_path			Default path to template files.
     * @return 	string 							Path to the template file.
     */
    protected function locate_template(
        $template_name,
        $template_path = PluginRoot\PREFIX,
        $default_path = ''
    ) {

        if ( empty($default_path) ) {
            $default_path = dirname( PluginRoot\FILE ) . '/views/';
        }

        // Search template file in theme folder.
        $template = locate_template([
            $template_path . '/' . $template_name,
            $template_name
        ]);

        // Get plugins template file.
        if ( ! $template ) :
            $template = $default_path . $template_name;
        endif;

        return $template;
    }

	/**
	 * Function for render views
	 * @param null|string $template   file name to be rendered
	 * @param array $params     array of variables to be passed to the view file
	 * @return null|string
	 */
	public function render( $template, $params = [] )
	{
        if ( is_array( $params ) && isset( $params ) ) :
            extract( $params );
        endif;

        $template_file = $this->locate_template( $template ) . ".php";

        if ( file_exists( $template_file ) ) {
            include $template_file;

            wp_die();
        }

        return null;
	}
}
