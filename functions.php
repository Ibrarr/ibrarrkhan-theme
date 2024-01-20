<?php

// Define Globals
define( 'IBRARR_THEME_PREFIX', 'ibrarrkhan' );
define( 'IBRARR_TEMPLATE_URI', get_template_directory_uri() );
define( 'IBRARR_TEMPLATE_DIR', get_template_directory() );
define( 'IBRARR_INC_PATH', IBRARR_TEMPLATE_DIR . '/inc' );

define( 'DISALLOW_FILE_EDIT', true );

// Actions
require IBRARR_INC_PATH . '/actions.php';

// Filters
require IBRARR_INC_PATH . '/filters.php';

// Remove Functions
require IBRARR_INC_PATH . '/remove.php';

// Style and Scripts
require IBRARR_INC_PATH . '/styles-scripts.php';

// ACF
require IBRARR_INC_PATH . '/acf.php';

// Ajax Calls
require IBRARR_INC_PATH . '/ajax-calls.php';