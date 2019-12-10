<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Upgrade plugin data in the database to version 2.9
 */
function spacexchimp_p010_upgrade_2_9() {

    // Upgrade number
    $upgrade_number_new = '0001';
    $prefix_old = 'mshighlighter';
    $prefix_new = 'spacexchimp_p010';

    ///////////////////////////////////////////////////////////////////
    //                          SEEVICE INFO                         //
    ///////////////////////////////////////////////////////////////////

    // Read plugin service info from the database
    $service_info_old = get_option( $prefix_old . '_service_info' );
    $service_info_current = get_option( $prefix_new . '_service_info' );
    $upgrade_number_current = !empty( $service_info_current['upgrade'] ) ? $service_info_current['upgrade'] : '0000';

    // Setting array with new data
    $service_info_new = is_array( $service_info_old ) ? $service_info_old : array();
    $service_info_new['upgrade'] = $upgrade_number_new;

    // Exit if the upgrade is not needed or already done
    if ( $upgrade_number_current >= $upgrade_number_new ) return;

    // Update service info in the database
    delete_option( $prefix_old . '_service_info' );
    update_option( $prefix_new . '_service_info', $service_info_new );

    ///////////////////////////////////////////////////////////////////
    //                            SETTINGS                           //
    ///////////////////////////////////////////////////////////////////

    // Read plugin settings from the database
    $settings_current = get_option( $prefix_old . '_settings' );

    // Setting array with new data
    $settings_new = is_array( $settings_current ) ? $settings_current : array();

    // Exit if the upgrade is not needed or already done
    if ( empty( $settings_current ) ) return;

    // Update plugin setting in the database
    delete_option( $prefix_old . '_settings' );
    update_option( $prefix_new . '_settings', $settings_new );

}
spacexchimp_p010_upgrade_2_9();
