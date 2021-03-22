<?php

add_action('rest_api_init', 'financialData');

function financianData() {
    register_rest_route('financial/v1, lender', array(
        'method' => WP_REST_SERVER::READABLE,
		'callback' => 'return_lenders',
		'permission_callback' => __return_false(),
    ));
}