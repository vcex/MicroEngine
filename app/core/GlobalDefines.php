<?php
/**
*
*Небольшой движок для блога
*
**encoding:utf-8
*
**Global system defines
*
*@package engine
*
*@subpackage app/core
*
*@author 0x00-dev
*
*@link <0x00.dev@gmail.com>
*
*@version 1.0.0
*
**/



/**
*
*Constants defines.
*
**/



/**
*
*Initialise constants file flag
*
**/

define('DEFINES_IS_INIT', 1);


/**
*
*SALT
*
**/

define('SALT',"$2a$ijqy7Kl92gpx8jSH5H0Qpi");

/**
*
*Secret key
*
**/

define('SKEY',"UytgI78k0");

/**
*
*Site address
*
**/

define('HTTPADDR',"http://{$_SERVER['HTTP_HOST']}");


/**
*
*Start dir
*
**/

define('PATH', $_SERVER['DOCUMENT_ROOT']);


/**
*
*App dir
*
**/

define('APP', PATH.'/app');


/**
*
*Models dir
*
**/

define('MODEL', APP.'/model');

/**
*
*Controllers dir
*
**/

define('CONTR', APP.'/controller');


/**
*
*Core files dir
*
**/

define('CORE', APP.'/core');


/**
*
*Controllers dir
*
**/

define('_PUBLIC', HTTPADDR."/public");


/**
*
*Local logs dir
*
**/

define('LOG', PATH.'/logs');


/**
*
*Local log file
*
**/

define('LOG_FILE', LOG.'/engine_errors.log');

/**
*
*Call methods controll
*
**/

define('CALL',LOG.'/ctrl.log');

/**
*
*Over lib dir
*
**/

define('LIB',APP.'/lib');

/**
*
*Factory dir
*
**/

define('FACTORY',APP.'/factory');

/**
*
*Css dir
*
**/

define('CSS',_PUBLIC.'/_css');

/**
*
*Js dir
*
**/

define('JS',_PUBLIC.'/_js');

/**
*
*Img dir
*
**/

define('IMG',_PUBLIC.'/_img');

/**
*
*Vendor dir
*
**/

define('VENDOR',PATH.'/vendor');

/**
*
*includes over path
*
**/

define('INC',PATH.'/inc');

/**
*
*Components path
*
**/

define('CT',APP.'/component');

/**
*
*Uploads img path
*
**/

define('UPLOAD_IMG', "http://{$_SERVER['HTTP_HOST']}/uploads/img");

/**
*
*Uploads path
*
**/

define('UPLOADS', PATH."/uploads");

//EOF
