<?php

use QEEMA\models\Languages;

if (!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

define('APP_PATH', realpath(__DIR__) .DS.'..');
define('VIEWS_PATH', [
    'public'    =>  APP_PATH . DS . 'views' . DS,
    'dashboard' =>  APP_PATH . DS . 'views' . DS . 'dashboard' . DS
]);
define('TEMPLATE_PATH', [
    'public'    =>  APP_PATH . DS . 'template' . DS,
    'dashboard' =>  APP_PATH . DS . 'template' . DS . 'dashboard' . DS
]);

define('LANG_PATH', APP_PATH . DS . 'languages' . DS);


define('CSS', '/assets/css/');
define('JS', '/assets/js/');
define('IMG',   [
                    'default'   => '/assets/images/',
                    'client'    => '/assets/images/clients/',
                    'service'   => '/assets/images/services/',
                    'dashboard' => '/assets/static/images/'
                ]);

define('AUD',[
    'voice'     => '/assets/audio/voice/',
]);

define('INI','../app/ini/');

defined('DATABASE_HOST_NAME')? null : define('DATABASE_HOST_NAME','localhost'); //business29.web-hosting.com
defined('DATABASE_DB_NAME')? null : define('DATABASE_DB_NAME','progwlfo_qeemav2_16122020');
defined('DATABASE_USER_NAME')? null : define('DATABASE_USER_NAME','root');
defined('DATABASE_PASSWORD')? null : define('DATABASE_PASSWORD','');
defined('DATABASE_PORT_NUMBER')? null : define('DATABASE_PORT_NUMBER',3306);
defined('DATABASE_CONN_DRIVER')? null : define('DATABASE_CONN_DRIVER',1);

defined('DEFAULT_LANG')? null : define('DEFAULT_LANG','en');


$langs = Languages::getAll();
if(is_array($langs))
{
    $arr = [];
    foreach ($langs as $lang)
    {
        $arr[] = $lang->name;
    }
}else{
    $arr = ['en'];
}

defined('LANGS')? null : define('LANGS',$arr);

define('API_VER', ['V1']);
define('CURRENT_VER', 'V1');
define('SUPPORTED_LANGS',LANGS);
define('REQUEST_SCHEME',['https']);


define('ROLE',[
    'paragraph' =>  [
        'start' =>  '{',
        'end'   =>  '}'
    ],

    'underline' =>  [
        'start' =>  '[',
        'end'   =>  ']'
    ],

    'bold'  =>  [
        'start' =>  '<...',
        'end'   =>  '...>'
    ]
]);

define('KEY','ThesIsAKeyTHaTIHaveToKEePprIVATEFromThEOThErPeOleToKeEpITSaFEHerE');
define('TOK_KEY','@!#TRPOINTONFOTRFISISVONOPopahunqpvnq56486%*$');

define('TOKEN',array(
    "iat" => time(),
    "iss" => 'Qeema.co'
));

define("API_Name","Qeema");
define("SPECIALS",["api",'dashboard']);

define("ADMIN_SES_NAME",'qeema_admin_session');
define("ADMIN_COK",'qeema_cookie');
define("EMAIL_NAME",'Qeema Co.');
