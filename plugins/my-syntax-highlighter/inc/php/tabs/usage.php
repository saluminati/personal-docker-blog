<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Usage Tab Content
 */
?>
    <div class="postbox">
        <h3 class="title"><?php _e( 'Usage Instructions', $plugin['text'] ); ?></h3>
        <div class="inside">
            <p><?php _e( 'To add the syntax highlighting to your code in any post, simply follow these steps:', $plugin['text'] ); ?></p>
            <ol class="custom-counter">
                <li><?php _e( 'Go to the "Settings" tab on this page.', $plugin['text'] ); ?></li>
                <li><?php _e( 'Select the desired settings.', $plugin['text'] ); ?></li>
                <li><?php _e( 'Click the "Save changes" button.', $plugin['text'] ); ?></li>
                <li>
                    <?php _e( 'On the WordPress Post/Page Editor page switch to the Text/HTML editor and wrap your source code in one of the supported shortcodes (like <code>[code]...[/code]</code> that is universal shortcode).', $plugin['text'] ); ?>
                    <?php _e( 'Example:', $plugin['text'] ); ?>
                    <br><br>

<pre><code>[code]
This

is

an "example"!
[/code]</code></pre>
                    <p><?php _e( 'In this case, the shortcode will prevent WordPress from inserting paragraph breaks between `This`, `is` and `an "example"`, as well as ensure that the double quotes around `example` are not converted to typographic (curly) quotes.', $plugin['text'] ); ?></p>
                    <p class="note">
                        <b><?php _e( 'Note!', $plugin['text'] ); ?></b>
                        <?php _e( 'To avoid problems, edit posts that contain your source code only in Text/HTML mode.', $plugin['text'] ); ?>
                    </p>
                    <p><?php _e( 'You can use the following shortcodes:', $plugin['text'] ); ?><p>
                    <?php spacexchimp_p010_get_shortcode_table(); ?>
                    <p class="note">
                        <b><?php _e( 'Note!', $plugin['text'] ); ?></b>
                        <?php
                            printf(
                                __( 'The PRO version supports 154 programming languages and 125 shortcodes. %s Learn more %s', $plugin['text'] ),
                                '<a href="https://www.spacexchimp.com/plugins/my-syntax-highlighter-pro.html" target="_blank">',
                                '&rarr; </a>'
                            );
                        ?>
                    </p>
                </li>
                <li><?php _e( 'Enjoy the fancy syntax highlighting on your website.', $plugin['text'] ); ?> <?php _e( 'It\'s that simple!', $plugin['text'] ); ?></li>
            </ol>
            <p class="note">
                <?php
                    printf(
                        __( 'If you want more options, then %s let us know %s and we will be happy to add them.', $plugin['text'] ),
                        '<a href="https://www.spacexchimp.com/contact.html" target="_blank">',
                        '</a>'
                    );
                ?>
            </p>
        </div>
    </div>
<?php
