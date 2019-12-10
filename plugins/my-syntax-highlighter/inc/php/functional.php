<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Shortcode-Processor. Functionality to set up shortcode correctly
 */
function spacexchimp_p010_shortcode_processor( $content ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Retrieve options from database and declare variables
    $options = get_option( $plugin['settings'] . '_settings' );
    $convert_special_characters = ( !empty( $options['convert_special_characters'] ) && ( $options['convert_special_characters'] == "on" ) ) ? 'true' : 'false';

    // Convert special characters to HTML entities
    if ( $convert_special_characters == "true" ) {
        $content = htmlspecialchars( $content );
    }

    global $shortcode_tags;

    // Backup and clear out the shortcodes list
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();

    // Get the shortcode names
    $shortcodes_names = spacexchimp_p010_get_shortcode_names();

    // Create different shortcodes
    foreach ( $shortcodes_names as $shortcode_name ) {
        add_shortcode( $shortcode_name, 'spacexchimp_p010_shortcode' );
    }

    // Run the shortcodes function on the content now that it's just this plugin's shortcodes
    $content = do_shortcode( $content );

    // Put the shortcodes back to normal
    $shortcode_tags = $orig_shortcode_tags;

    // Convert special HTML entities back to characters
    if ( $convert_special_characters == "true" ) {
        $content = htmlspecialchars_decode( $content );
    }

    return $content;
}
add_filter( 'the_content', 'spacexchimp_p010_shortcode_processor', 7 );

/**
 * Callback for shortcodes. Uses in Shortcode-Processor
 */
function spacexchimp_p010_shortcode( $atts, $content = null, $lang ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Retrieve options from database and declare variables
    $options = get_option( $plugin['settings'] . '_settings' );

    // Default language for the [code] shortcode
    $default_language = !empty( $options['defaultLanguage'] ) ? $options['defaultLanguage'] : '';
    if ( $lang == "code" ) {
        $lang = $default_language;
    }

    // Enqueue CodeMirror library
    wp_enqueue_style( $plugin['prefix'] . '-codemirror-css' );
    wp_enqueue_script( $plugin['prefix'] . '-codemirror-js' );
    wp_enqueue_script( $plugin['prefix'] . '-codemirror-settings-js' );

    // Enqueue CodeMirror addons
    $addons = array( 'autorefresh' );
    foreach ( $addons as $addon ) {
        wp_enqueue_script( $plugin['prefix'] . '-codemirror-addon-' . $addon . '-js' );
    }

    // Enqueue CodeMirror modes
    $modes = spacexchimp_p010_get_codemirror_mode_names();
    foreach ( $modes as $mode ) {
        wp_enqueue_script( $plugin['prefix'] . '-codemirror-mode-' . $mode . '-js' );
    }

    // Enqueue CodeMirror theme
    $theme = !empty( $options['theme'] ) ? $options['theme'] : 'default';
    if ( $theme != "default" ) {
        wp_enqueue_style( $plugin['prefix'] . '-codemirror-theme-css' );
    }

    // Cleaning
    $content = rtrim( $content );

    return '<div class="my-syntax-highlighter"><pre><textarea id="mshighlighter" class="mshighlighter" language="' . $lang . '" name="mshighlighter" >' . $content . '</textarea></pre></div>';

}

/**
 * Allow shortcodes in the text widget
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Callback for getting a list of CodeMirror modes
 * by scanning the CodeMirror library included in the plugin
 * @return array of mode names located in the CodeMirror library
 */
function spacexchimp_p010_get_codemirror_mode_names() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    $cm_dir = $plugin['path'] . 'inc/lib/codemirror/mode/';
    $modes = array_filter( glob( $cm_dir . '*' ), 'is_dir' );
    return array_map( 'basename', $modes );
}

/**
 * Callback for getting a list of all shortcode names
 * @return array of shortcode names
 */
function spacexchimp_p010_get_shortcode_names() {
    return array(
                  'code',
                  'php',
                  'javascript',
                  'js',
                  'xml',
                  'html',
                  'css',
                  'scss',
                  'less',
                  'sass',
                  'markdown',
                  'perl',
                  'sql',
                  'mysql',
                  'shell'
    );
}

/**
 * Callback for getting a list of CodeMirror modes
 * @return array of pairs "Language Name" => "mode" of the CodeMirror modes
 * @TODO These pairs can be extracted from lib/codemirror/mode/meta.js
 */
function spacexchimp_p010_get_codemirror_mode_pairs() {
    return array(
                  'CSS'        => 'css',
                  'HTML'       => 'html',
                  'JavaScript' => 'javascript',
                  'LESS'       => 'less',
                  'Markdown'   => 'markdown',
                  'MySQL'      => 'mysql',
                  'Perl'       => 'perl',
                  'PHP'        => 'php',
                  'SASS'       => 'sass',
                  'SCSS'       => 'scss',
                  'Shell'      => 'shell',
                  'SQL'        => 'sql',
                  'XML'        => 'xml'
    );
}

/**
 * Callback for getting a list of CodeMirror themes
 * @return array of pairs "theme" => "Theme Name" of the CodeMirror themes
 */
function spacexchimp_p010_get_codemirror_theme_pairs() {
    return array(
                  '3024-day'                => '3024 day',
                  '3024-night'              => '3024 night',
                  'ambiance-mobile'         => 'Ambiance mobile',
                  'ambiance'                => 'Ambiance',
                  'base16-dark'             => 'Base16 dark',
                  'base16-light'            => 'Base16 light',
                  'blackboard'              => 'Blackboard',
                  'cobalt'                  => 'Cobalt',
                  'colorforth'              => 'Colorforth',
                  'eclipse'                 => 'Eclipse',
                  'elegant'                 => 'Elegant',
                  'erlang-dark'             => 'Erlang dark',
                  'lesser-dark'             => 'Lesser dark',
                  'liquibyte'               => 'Liquibyte',
                  'mbo'                     => 'MBO',
                  'mdn-like'                => 'MDN-like',
                  'midnight'                => 'Midnight',
                  'monokai'                 => 'Monokai',
                  'neat'                    => 'Neat',
                  'neo'                     => 'Neo',
                  'night'                   => 'Night',
                  'paraiso-dark'            => 'Paraiso dark',
                  'paraiso-light'           => 'Paraiso light',
                  'pastel-on-dark'          => 'Pastel on dark',
                  'rubyblue'                => 'Rubyblue',
                  'solarized'               => 'Solarized',
                  'the-matrix'              => 'The matrix',
                  'tomorrow-night-bright'   => 'Tomorrow night bright',
                  'tomorrow-night-eighties' => 'Tomorrow night eighties',
                  'ttcn'                    => 'TTCN',
                  'twilight'                => 'Twilight',
                  'vibrant-ink'             => 'Vibrant ink',
                  'xq-dark'                 => 'XQ dark',
                  'xq-light'                => 'XQ light',
                  'zenburn'                 => 'Zenburn'
    );
}

/**
 * Callback for getting an HTML table of shortcodes
 * @return html code of 2 tables showing available shortcodes
 */
function spacexchimp_p010_get_shortcode_table() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Get array of shortcode names and sort it
    $array_1 = spacexchimp_p010_get_codemirror_mode_pairs();
    ksort( $array_1 );

    // Set array of additional shortcode names
    $array_2 = array(
                     'code'  => 'default language',
                     'js'    => 'javascript',
                     'scss'  => 'css',
                     'less'  => 'css',
                     'mysql' => 'sql'
                    );

    // Table titles
    $title_1 = __( 'Language &rarr; Shortcode', $plugin['text'] );
    $title_2 = __( 'Shortcode aliases', $plugin['text'] );

    // Generate list of items for tables
    $list_1 = '';
    $list_2 = '';
    foreach ( $array_1 as $shortcode_key => $shortcode_value ) {
        $list_1 .= '<tr><th>' . $shortcode_key . '</th><td><code>[' . $shortcode_value . ']</code></td></tr>';
    }
    foreach ( $array_2 as $shortcode_alias_key => $shortcode_alias_value ) {
        $list_2 .= '<tr><th>[' . $shortcode_alias_key . ']</th><td><code>[' . $shortcode_alias_value . ']</code></td></tr>';
    }

    // Generate tables
    $out = '<div class="panel panel-success">
                <div class="panel-heading">' . $title_1 . '</div>
                <table class="table table-striped">
                    <tbody>'
                        . $list_1 .
                    '</tbody>
                </table>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">' . $title_2 . '</div>
                <table class="table table-striped">
                    <tbody>'
                        . $list_2 .
                    '</tbody>
                </table>
            </div>
            <style>
                #tab-usage .panel {
                    display: inline-block;
                    min-width: 250px;
                    max-width: 400px;
                }
                #tab-usage .panel .panel-heading {
                    font-size: 16px;
                    text-align: center;
                }
            </style>';

    echo $out;
}
