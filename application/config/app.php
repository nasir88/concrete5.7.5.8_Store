<?php

return array(

    /**
     * Route themes
     */
    'theme_paths'         => array(
        //'/dashboard'        => 'dashboard',
        //'/dashboard/*'      => 'dashboard',
        '/account'          => 'theme_nsr',
        '/account/*'        => 'theme_nsr',
        //'/install'          => VIEW_CORE_THEME,
        '/login'            => array(
            VIEW_CORE_THEME,
            VIEW_CORE_THEME_TEMPLATE_BACKGROUND_IMAGE
        ),
        '/register'            => array(
            VIEW_CORE_THEME,
            VIEW_CORE_THEME_TEMPLATE_BACKGROUND_IMAGE
        ),
        //'/register'         => VIEW_CORE_THEME,
        //'/maintenance_mode' => VIEW_CORE_THEME,
        //'/upgrade'          => VIEW_CORE_THEME
    ),
	
	
);
