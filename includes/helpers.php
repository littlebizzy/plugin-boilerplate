<?php

namespace LittleBizzy\PluginNamespace\Includes;

use LittleBizzy\PluginNamespace\Includes\Classes\PluginView;

if ( !function_exists('pluginRender') ) {
    /**
     * Render View Wrapper
     *
     * @param string $template
     * @param array $params
     * @param bool $view
     * @return string|null
     */
    function pluginRender( $template, $params = [], $view = true ) {
        $plugin_view = new PluginView();

        if ( $view ) {
            echo $plugin_view->render( $template, $params );
        } else {
            return $plugin_view->render( $template, $params );
        }
    }
}