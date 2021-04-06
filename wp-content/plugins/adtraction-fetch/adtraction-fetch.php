<?php
/**
 * Plugin Name: Tribusoft Adtraction Fetch
 */

require "adtraction-fetch-routes.php";

register_activation_hook( __FILE__, 'tbs_activation' );

function tbs_activation()
 {
    global $wpdb;
    $table_name = $wpdb->prefix . 'tbsprograms';

    $sql = "CREATE TABLE $table_name (
        programName VARCHAR(255),
        programId INT(9),
        programUrl VARCHAR(255),
        market VARCHAR(2),
        currency VARCHAR(255),
        logoUrl VARCHAR(255),
        trackingUrl VARCHAR(255),
        minAmount FLOAT,
        maxAmount FLOAT,
        minDuration FLOAT,
        maxDuration FLOAT,
        minInterest FLOAT,
        maxInterest FLOAT,
        minEffectiveInterest FLOAT,
        maxEffectiveInterest FLOAT,
        minAge INT(2),
        minIncomeRequired FLOAT,
        adminFee FLOAT,
        startFee FLOAT,
        firstLoanFree BOOLEAN,
        timeUnit VARCHAR(255),
        acceptsRemarks BOOLEAN,
        loanExample VARCHAR(255),
        ansok_utan_uc BOOLEAN,
        ansok_med_bankid BOOLEAN, 
        laneskydd_kan_tecknas BOOLEAN,
        direktutbetalning BOOLEAN,
        PRIMARY KEY (programName)
    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    /*** SCHEDULES DATABASE UPDATE TO RUN ONCE DAILY ***/

    wp_schedule_event( time(), 'daily', 'tbs_update_hook' );      
};

add_action( 'tbs_update_hook',  'tbs_adtraction_update' );

/*** DEACTIVATION FUNCTION ***/
register_deactivation_hook( __FILE__, 'tbs_deactivate' );

function tbs_deactivate()
{
    $timestamp = wp_next_scheduled('tbs_adtraction_update');
    wp_unschedule_event( $timestamp, 'tbs_adtraction_update' );
}