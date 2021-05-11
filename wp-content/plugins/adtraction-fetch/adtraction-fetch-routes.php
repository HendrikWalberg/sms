<?php

/* ROUTES */
add_action('rest_api_init', function() {
    register_rest_route('adtraction-fetch/v1', 'update-programs', [
        'method' => 'GET',
        'callback' => 'tbs_adtraction_update',
        'permission_callback' => __return_false(),
    ]);
    register_rest_route('adtraction-fetch/v1', 'get-all-programs', [
        'method' => 'GET',
        'callback' => 'tbs_return_all_programs',
        'permission_callback' => __return_false()
    ]);
    register_rest_route('adtraction-fetch/v1', 'get-one-program', [
        'method' => 'GET',
        'callback' => 'tbs_return_one_program',
        'permission_callback' => __return_false()
    ]);

    register_rest_route('adtraction-fetch/v1', 'get-filter-programs', [
        'method' => 'GET',
        'callback' => 'tbs_return_filtered_programs',
        'permission_callback' => __return_false()
    ]);
});

/* CALLBACKS */

/* UPDATES DATABASE WITH NEW DATA */

function tbs_adtraction_update() 
{
    global $wpdb;

    $url = "https://api.adtraction.com/v2/public/compare/paydayloans/";

    $body = [
        "channelId" => 1611686045,
        "currency" => "SEK",
        "market" => "SE"
    ];

    $headers = [
        "Content-Type" => "application/json",
    ];

    $options = [
        'body' => wp_json_encode($body),
        'headers' => $headers
    ];

    $response = wp_remote_post($url, $options);
    
    $table_name = $wpdb->prefix . 'tbsprograms';

    $programs = json_decode($response["body"], true);

    foreach ($programs as $key => $program)
    {
        $final = tbs_include_unincluded_data($program);
      
        $experiment = $wpdb->replace($table_name, $final);
    };
}

/* RETURNS ALL DATA IN DATABASE */

function tbs_return_all_programs()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'tbsprograms';

    $query = $wpdb->prepare('SELECT * FROM ' . $table_name);

    $results = $wpdb->get_results($query);

    $programs = json_decode(json_encode($results), true);

    return $programs;
}

/* RETURNS ONE ROW OF DATABASE */

function tbs_return_one_program( $data )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'tbsprograms';

    $query_string = $data['string'];

    $query = $wpdb->prepare('SELECT * FROM ' . $table_name . ' WHERE programName = %s', $query_string);

    $results = $wpdb->get_results($query);

    $program = json_decode(json_encode($results), true);

    return $program;
}

/* RETURN FILTERED DATA */

function tbs_return_filtered_programs( $data )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'tbsprograms';

    $query = $wpdb->prepare('SELECT * FROM ' . $table_name . ' WHERE ansok_utan_uc = %s AND acceptsRemarks = %s', $data['uc'], $data['remark']);

    $results = $wpdb->get_results($query);

    $programs = json_decode(json_encode($results), true);
    
    return $programs;
}

/* INSERT NOT INCLUDED DATA */

function tbs_include_unincluded_data($program)
{
    switch ($program['programName'])
    {
        case "Brixo":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = true;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Cashbuddy SE":
            $program["ansok_utan_uc"] = false;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;

        case "Daypay":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Everydayplus SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;
        
        case "Expresskredit":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Ferratum SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;
        
        case "Flexkontot SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "GF Money SE":
            $program["ansok_utan_uc"] = false;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Kontantfinans":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;
        
        case "Kredit 365":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;
        
        case "Kundfinans": 
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Loanstep": 
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;
        
        case "Lumify": 
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Merax SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;
        
        case "Mobillån SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;
        
        case "Monetti SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Northmill SE":
            $program["ansok_utan_uc"] = false;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = true;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Slantar":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "SMSPengar": 
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;           
            break;
        
        case "Tryggkredit": 
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;           
            break;

        case "ViaConto SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true; 
            $program["laneskydd_kan_tecknas"] = true;
            $program["direktutbetalning"] = true;           
            break;
        
        default:
            echo "Problem with value injection loop";     
    }
    
    return $program;
}