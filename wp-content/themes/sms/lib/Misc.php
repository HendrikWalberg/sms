<?php
$misc = new Misc();
class Misc
{
    function __construct()
    {
        // Allow SVG media upload
        add_filter('wp_check_filetype_and_ext', [$this, 'check_filetype_and_ext'], 10, 4);
        add_filter('upload_mimes', [$this, 'mime_types']);
        add_action('admin_head', [$this, 'fix_svg']);
    }

    /**
     * Allow SVG media upload
     */
    public function check_filetype_and_ext($data, $file, $filename, $mimes)
    {
        $filetype = wp_check_filetype($filename, $mimes);

        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename'],
        ];
    }

    public function mime_types($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    public function fix_svg()
    {
        echo '
            <style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
            </style>
            ';
    }
}