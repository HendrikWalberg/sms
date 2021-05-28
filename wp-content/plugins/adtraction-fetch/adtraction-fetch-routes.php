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

    $wpdb->query('TRUNCATE TABLE ' . $table_name);

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
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1091548601&as=1230659788&t=2&tk=1";
            break;

        case "Cashbuddy SE":
            $program["ansok_utan_uc"] = false;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=368423649&as=1230659788&t=2&tk=1";
            break;

        case "Daypay":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1065957440&as=1230659788&t=2&tk=1";
            break;

        case "Everydayplus SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1517452588&as=1230659788&t=2&tk=1";
            break;

        case "Expresskredit":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=56815250&as=1230659788&t=2&tk=1";
            break;

        case "Ferratum SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=679911485&as=1230659788&t=2&tk=1";
            break;

        case "Flexkontot SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1177156373&as=1230659788&t=2&tk=1";
            break;

        case "GF Money SE":
            $program["ansok_utan_uc"] = false;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1400909618&as=1230659788&t=2&tk=1";
            break;

        case "Kontantfinans":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1080729337&as=1230659788&t=2&tk=1";
            break;

        case "Kredit 365":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=24257802&as=1230659788&t=2&tk=1";
            break;

        case "Kundfinans":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=44108850&as=1230659788&t=2&tk=1";
            break;

        case "Loanstep":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1082866297&as=1230659788&t=2&tk=1";
            break;

        case "Lumify":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1278835897&as=1230659788&t=2&tk=1";
            break;

        case "Merax SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1184128142&as=1230659788&t=2&tk=1";
            break;

        case "Mobillån SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=285859820&as=1230659788&t=2&tk=1";
            break;

        case "Monetti SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=23696960&as=1230659788&t=2&tk=1";
            break;

        case "Northmill SE":
            $program["ansok_utan_uc"] = false;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = true;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1105916291&as=1230659788&t=2&tk=1";
            break;

        case "Slantar":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1206899685&as=1230659788&t=2&tk=1";
            break;

        case "SMSPengar":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=56814276&as=1230659788&t=2&tk=1";
            break;

        case "Tryggkredit":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = false;
            $program["direktutbetalning"] = false;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1156145509&as=1230659788&t=2&tk=1";
            break;

        case "ViaConto SE":
            $program["ansok_utan_uc"] = true;
            $program["ansok_med_bankid"] = true;
            $program["laneskydd_kan_tecknas"] = true;
            $program["direktutbetalning"] = true;
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=485150298&as=1230659788&t=2&tk=1";
            break;

        case "Klicklån SE":
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1061611421&as=1230659788&t=2&tk=1";
            break;

        case "Viiga Lån SE":
            $program["affiliate"] = "https://track.adtraction.com/t/t?a=1477774333&as=1230659788&t=2&tk=1";
            break;

        default:
            echo "Problem with value injection loop";
    }

    return $program;
}