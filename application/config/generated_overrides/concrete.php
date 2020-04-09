<?php

/**
 * -----------------------------------------------------------------------------
 * Generated 2020-04-09T16:31:53+08:00
 *
 * DO NOT EDIT THIS FILE DIRECTLY
 *
 * @item      misc.do_page_reindex_check
 * @group     concrete
 * @namespace null
 * -----------------------------------------------------------------------------
 */
return array(
    'site' => 'concrete5.7.5.6',
    'version_installed' => '5.7.5.8',
    'misc' => array(
        'access_entity_updated' => 1459012155,
        'do_page_reindex_check' => false,
        'latest_version' => '5.7.5.13',
        'favicon_fid' => '5',
        'login_redirect' => 'HOMEPAGE',
        'login_redirect_cid' => 0,
        'login_admin_to_dashboard' => 1,
        'user_timezones' => false,
    ),
    'accessibility' => array(
        'toolbar_titles' => false,
        'toolbar_large_font' => false,
        'display_help_system' => false,
    ),
    'permissions' => array(
        'model' => 'advanced',
    ),
    'upload' => array(
        'extensions' => '*.flv;*.jpg;*.gif;*.jpeg;*.ico;*.docx;*.xla;*.png;*.psd;*.swf;*.doc;*.txt;*.xls;*.xlsx;*.csv;*.pdf;*.tiff;*.rtf;*.m4a;*.mov;*.wmv;*.mpeg;*.mpg;*.wav;*.3gp;*.avi;*.m4v;*.mp4;*.mp3;*.qt;*.ppt;*.pptx;*.kml;*.xml;*.svg;*.webm;*.ogg;*.ogv',
    ),
    'urls' => array(
        'background_url' => '/concrete5.7.5.6/application/files/3914/5932/5849/bg_login2.jpg',
    ),
    'white_label' => array(
        'background_url' => true,
    ),
    'user' => array(
        'registration' => array(
            'email_registration' => false,
            'type' => 'enabled',
            'captcha' => true,
            'enabled' => true,
            'validate_email' => false,
            'approval' => false,
            'notification' => null,
            'notification_email' => false,
        ),
    ),
    'mail' => array(
        'method' => 'php_mail',
        'methods' => array(
            'smtp' => array(
                'server' => 'smtp.gmail.com',
                'username' => 'nasir.roney88@gmail.com',
                'password' => 'n@s663726',
                'port' => '465',
                'encryption' => 'SSL',
            ),
        ),
    ),
    'cache' => array(
        'blocks' => false,
        'assets' => false,
        'theme_css' => false,
        'overrides' => false,
        'pages' => '0',
        'full_page_lifetime' => 'custom',
        'full_page_lifetime_value' => '1',
    ),
    'theme' => array(
        'compress_preprocessor_output' => false,
        'generate_less_sourcemap' => false,
    ),
    'debug' => array(
        'detail' => 'debug',
        'display_errors' => true,
    ),
);
