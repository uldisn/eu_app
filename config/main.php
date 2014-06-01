<?php

define('ROLE_ADMIN', 'Admin');
define('ROLE_USER', 'User');
define('ROLE_FINANCES', 'Finance');
define('ROLE_CURRENCY_EDITOR', 'CurrencyEditor');
define('ROLE_FUEL_OPERATOR', 'FuelOperator');
define('ROLE_DATA_CARD_EDITOR', 'DataCardEditor');
define('ROLE_CUSTOMER', 'Customer');

define('FQNT_LITER', 1);
define('FVAT_NONE', 1);
define('FPRC_DYZ002', 1);

define('FCRN_LTL', 12);
define('FCRN_RUB', 10);

define('FCSR_LB_LT', 2);


/**
 * Phundament 3 Application Config File
 * All modules and components have to be declared before installing a new package via composer.
 * See also config.php, for composer installation and update "hooks"
 */

// configuration files precedence: main-local, main-{env}, main

// also includes environment config file, eg. 'development' or 'production', we merge the files (if available!) at the botton
$localConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main-local.php';
$prodConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main-poduction.php';
$devConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main-development.php';

//Yii::setPathOfAlias('vendor', "/home/chroot/websites/parkoil.wap4.org/yii/vendor");

// convenience variables
$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
$baseUrl              = (dirname($_SERVER['SCRIPT_NAME']) == '/' || dirname($_SERVER['SCRIPT_NAME']) == '\\') ? '' :
    dirname($_SERVER['SCRIPT_NAME']);

// main application configuration
$mainConfig = array(
    'basePath'   => $applicationDirectory,
    'name'       => 'Trucks',
    'theme'      => 'frontend', // theme is copied eg. from vendor/p3bootstrap
    'language'   => 'en', // default language, see also components.langHandler
    'preload'    => array(
        'log',
        'langHandler',
        'bootstrap',
        //'userCompany',
    ),
    'aliases'    => array(
        // composer
        'root'                                 => $applicationDirectory . '/../../..',
        'webroot'                              => $applicationDirectory . '/../../../www',
        'vendor'                               => $applicationDirectory . '/../../../vendor',
        // componentns
        'bootstrap'                            => 'vendor.clevertech.yiibooster.src',
        'editable'                             => 'vendor.dbrisinajumi.x-editable-yii',
        // p3widgets
        'jsonEditorView'                       => 'vendor.phundament.p3extensions.widgets.jsonEditorView',
        'ckeditor'                             => 'vendor.phundament.p3extensions.widgets.ckeditor',
        // p3media
        'jquery-file-upload'                   => 'vendor.phundament.jquery-file-upload',
        'jquery-file-upload-widget'            => 'vendor.phundament.p3extensions.widgets.jquery-file-upload',
        'swiftMailer' => 'vendor.swiftmailer.swiftmailer.lib',
        // fixing 'hardcoded aliases' from extension (note: you have to use the full path)
        'application.modules.user.views.asset' => 'vendor.uldisn.yii-user.views.asset',
        'application.modules.user.components'  => 'vendor.uldisn.yii-user.components',
        'gii-template-collection'              => 'vendor.phundament.gii-template-collection',
        'echosen' => 'vendor.ifdattic.echosen', //++
        'audittrail' => 'vendor.dbrisinajumi.audittrail', //+
        'application.extensions.jqplot' => 'vendor.dbrisinajumi.yii-jqplot',
        'application.extensions.jqplot.assets' => 'vendor.dbrisinajumi.yii-jqplot.assets',
        'application.extensions.jqplot.JqplotWidget' => 'vendor.dbrisinajumi.yii-jqplot.JqplotWidget',
    ),
    // autoloading model and component classes
    'import'     => array(
        'application.models.*',
        'application.components.*',
        'zii.widgets.*',
        // TODO: should be handled by composer autoloader
        //'vendor.phundament.p3widgets.components.*', // P3WidgetContainer, P3Reference Widget
        //'vendor.phundament.p3extensions.components.*', // shared classes
        //'vendor.phundament.p3extensions.behaviors.*', // shared classes
        //'vendor.phundament.p3extensions.widgets.*', // shared classes
        //'vendor.phundament.p3extensions.helpers.*', // shared classes - P3StringHelper
        //'vendor.phundament.p3extensions.validators.*', // shared classes - P3StringHelper
        //'vendor.phundament.p3pages.models.*', // Meta description and keywords (P3Media)
        // imports for components from packages, which do not support composer autoloading
        //'vendor.dbrisinajumi.yii-user.models.*', // User Model
        'vendor.crisu83.yii-rights.components.*', // RWebUser
        'vendor.yiiext.fancybox-widget.*', // Fancybox Widget
        'vendor.clevertech.yiibooster.src.widgets.*', //
        'editable.*', // Include X-Editable for Yii classes
        'audittrail.models.*', //++
        'audittrail.behaviors.*', //++
        'vendor.schmunk42.relation.behaviors.*', //++
        'vendor.dbrisinajumi.d2company.models.*', //++
        'vendor.dbrisinajumi.fcrn.models.*', //++
        'vendor.uldisn.fuel.models.*', //++
        'vendor.dbrisinajumi.d2company.*',
        'vendor.dbrisinajumi.DbrLib.*',
        'vendor.dbrisinajumi.tlbexcelview.*',
        'vendor.pentium10.yii-remember-filters-gridview.src.protected.components.*',
        'vendor.pentium10.yii-clear-filters-gridview.src.protected.components.*',
        'vendor.dbrisinajumi.d2company.components.*',
        'vendor.dbrisinajumi.d1status.models.*',
        'vendor.dbrisinajumi.finv.models.*',
        'vendor.dbrisinajumi.finv.*',
        'vendor.dbrisinajumi.d1status.components.*',
		'vendor.uldisn.yii-user.models.*',
		'vendor.uldisn.yii-user.components.*',
		'vendor.dbrisinajumi.yii-jqplot.*',
        'vendor.dbrisinajumi.d1files.models.*',        
        'vendor.cornernote.yii-email-module.email.models.*',
        'vendor.cornernote.yii-email-module.email.components.*',
        'vendor.dbrisinajumi.person.models.*',        
        'vendor.dbrisinajumi.person.PersonModule',        
        'vendor.bwoester.yii-static-events-component.*',
        'vendor.bwoester.yii-event-interceptor.*',
        'vendor.dbrisinajumi.d2person.*',                
        'vendor.dbrisinajumi.d2person.models.*',                
        'vendor.dbrisinajumi.trucks.*',                
        'vendor.dbrisinajumi.trucks.models.*',                
        'vendor.uldisn.vvoy.*',                
        'vendor.uldisn.vvoy.models.*',                
        'vendor.uldisn.hill.models.*'
    ),
    'modules'    => array(
        'hill' => array( //++
            'class' => 'vendor.uldisn.hill.HillModule',
        ),
        'vvoy' => array( //++
            'class' => 'vendor.uldisn.vvoy.VvoyModule',
        ),
        'trucks' => array( //++
            'class' => 'vendor.dbrisinajumi.trucks.TrucksModule',
        ),
        'd2person' => array( //++
            'class' => 'vendor.dbrisinajumi.d2person.D2personModule',
        ),
        'd2finv' => array( //++
            'class' => 'vendor.dbrisinajumi.d2finv.D2finvModule',
        ),
//        'd2company'=> array( //++
//            'class' => 'vendor.dbrisinajumi.d2company.D2companyModule',//++
//        ),
        'fueling'=> array( //++
            'class' => 'vendor.uldisn.fuel.FuelingModule',//++
        ),
        'fcrn'=> array( //++
            'class' => 'vendor.dbrisinajumi.fcrn.FcrnModule',//++
        ),
        'd2company'=> array( //++
            'class' => 'vendor.dbrisinajumi.d2company.D2companyModule',//++
            'tabs' => array(
                'company_data',
                'company_custom_data',
                'company_group',
                //'company_branches',
                //'company_managers',
                //'company_customers',
                //'company_cars',
                'company_files',
            ),
        ),//++
        'D1Status'=> array( //++
            'class' => 'vendor.dbrisinajumi.d1status.D1StatusModule',//++
        ),
        'd1files' => array(
             'class' => 'vendor.dbrisinajumi.d1files.D1filesModule',
             'upload_dir' => 'root.parkoil_upload',
             'accept_file_types' => '/\.(gif|pdf|dat|jpe?g|png|doc|docx|xls|xlsx)$/i',
         ),          
        // backend for ckeditor styles and templates
        'person' => array(
            'class' => 'vendor.dbrisinajumi.person.PersonModule',
        ),
        'email' => array(
            // path to the EmailModule class
            'class' => 'vendor.cornernote.yii-email-module.email.EmailModule',
            // if you downloaded into modules
            //'class' => 'application.modules.email.EmailModule',

            // add a list of users who can access the email module
            'adminUsers' => array('Uldis'),

            // set this to false in production to improve performance
            'autoCreateTables' => false,
            'modelMap' => array('EmailActiveRecord' => 'email_spool'),
            'connectionID' => 'db',
            'yiiStrapPath' => realpath($applicationDirectory . '/../../../vendor/crisu83/yiistrap'),
        ),        
        
        'ckeditorConfigurator' => array(
            'class' => 'vendor.schmunk42.ckeditor-configurator.CkeditorConfiguratorModule',
        ),
        'p3admin'              => array(
            'class'  => 'vendor.phundament.p3admin.P3AdminModule',
            'params' => array('install' => false),
        ),
        'p3widgets'            => array(
            'class'  => 'vendor.phundament.p3widgets.P3WidgetsModule',
            'params' => array(
                'widgets' => array(
                    'CWidget'           => 'Basic HTML Widget',
                    'TbCarousel'        => 'Bootstrap Carousel',
                    'EFancyboxWidget'   => 'Fancy Box',
                    'P3ReferenceWidget' => 'Widget Copy'
                    // use eg. $> php composer.phar require yiiext/swf-object-widget to get the
                    // widget source; import widget class or set an alias.
                    #'ESwfObjectWidget' => 'SWF Object',
                ),
            ),
        ),
        /*
        'p3media'              => array(
            'class'  => 'vendor.phundament.p3media.P3MediaModule',
            'dataAlias'            => 'root.upload',
            'params' => array(
                'publicRuntimePath'    => 'www/runtime/p3media',
                'publicRuntimeUrl'     => '/runtime/p3media',
                'protectedRuntimePath' => 'runtime/p3media',
                'presets'              => array(
                    'large'            => array(
                        'name'     => 'Large 1600px',
                        'commands' => array(
                            'resize'  => array(1600, 1600, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'jpg',
                    ),
                    'medium'           => array(
                        'name'     => 'Medium 800px',
                        'commands' => array(
                            'resize'  => array(800, 800, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'jpg',
                    ),
                    'medium-crop'      => array(
                        'name'     => 'Medium cropped 800x600px',
                        'commands' => array(
                            'resize'  => array(800, 600, 7), // crop
                            'quality' => '85',
                        ),
                        'type'     => 'jpg',
                    ),
                    'small'            => array(
                        'name'     => 'Small 400px',
                        'commands' => array(
                            'resize'  => array(400, 400, 2), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type'     => 'jpg',
                    ),
                    'icon-32'          => array(
                        'name'     => 'Icon 32x32',
                        'commands' => array(
                            'resize' => array(32, 32),
                        ),
                        'type'     => 'png'
                    ),
                    'original'         => array(
                        'name'         => 'Original File',
                        'originalFile' => true,
                    ),
                    'original-public'  => array(
                        'name'         => 'Original File Public',
                        'originalFile' => true,
                        'savePublic'   => true,
                    ),
                    'download'         => array(
                        'name'         => 'Download File',
                        'originalFile' => true,
                        'attachment'   => true,
                    ),
                    'p3media-ckbrowse' => array(
                        'commands' => array(
                            'resize' => array(150, 120), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                    'p3media-manager'  => array(
                        'commands' => array(
                            'resize' => array(300, 200), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                    'p3media-upload'   => array(
                        'commands' => array(
                            'resize' => array(60, 30), // use third parameter for master setting, see Image constants
                            #'quality' => 80, // for jpegs
                        ),
                        'type'     => 'png'
                    ),
                )
            ),
        ),
         *
         */
        'p3pages'              => array(
            'class'  => 'vendor.phundament.p3pages.P3PagesModule',
            'params' => array(
                'availableLayouts' => array(
                    '//layouts/main' => 'Main Layout',
                ),
                'availableViews'   => array(
                    '//p3pages/column1' => 'One Column',
                    '//p3pages/column2' => 'Two Columns',
                )
            ),
        ),
        'rights'               => array(
            'class'        => 'vendor.crisu83.yii-rights.RightsModule',
            'appLayout'    => '//layouts/main',
            'userIdColumn' => 'id',
            'userClass'    => 'User',
            'cssFile'      => '/themes/backend/css/yii-rights.css'
            #'install' => true, // Enables the installer.
            #'superuserName' => 'admin'
        ),
		'user' => array(
			'class' => 'vendor.uldisn.yii-user.UserModule',
			'sendActivationMail' => FALSE,
			'activeAfterRegister' => FALSE,
			'allowGuestRegister' => FALSE,
			'showUserList' => FALSE,
			'allowUserEditProfile' => FALSE,
			'defaultGridView' => array(
				'path'=>'TbGridView',
				'options'=>array(),
				'buttonColumn' => 'TbButtonColumn',
			),
			'defaultDetailView' => array(
				'path'=>'TbDetailView',
				'options'=>array(),
			),
            'UserAdminRoles' => array('Accounting','Cars','DataCards','Finance','FuelOperator','UserAdmin',),
		),
        'audittrail' => array(//++
            'class' => 'vendor.dbrisinajumi.audittrail.AudittrailModule', 
        ),        
    ),
    // application components
    'components' => array(
        'events' => array(
          'class'  => 'vendor.bwoester.yii-static-events-component.EventRegistry',
          'attach' => array(
            // Attach to application events.
            // Again a stupid example. Since there will ever be only one
            // application instance, we could as well use normal per instance
            // event binding like it is done normally in Yii. But it shows how it
            // is meant to be done...
            'CApplication' => array(
              'onBeginRequest' => array(
                function( $event ) {
                  Yii::log( 'CApplication::onBeginRequest', CLogger::LEVEL_TRACE );
                },
              ),
              'onEndRequest' => array(
                function( $event ) {
                  Yii::log( 'CApplication::onEndRequest - first handler', CLogger::LEVEL_TRACE );
                },
                function( $event ) {
                  Yii::log( 'CApplication::onEndRequest - second handler', CLogger::LEVEL_TRACE );
                },
              ),
            ),
          ),
        ),
        
        'emailManager' => array(
            // path to the EmailManager class
            'class' => 'vendor.cornernote.yii-email-module.email.components.EEmailManager',

            // set this to false in production to improve performance
            'fromEmail' => 'uldis.nelsons@netcard.lv',

            // set this to false in production to improve performance
            'fromName' => 'Uldis Nelsons',

            // can be one of: php, db
            'templateType' => 'php',

            // when templateType=php this is the path to the email views
            // you may copy the default templates from email/views/emails
            'templatePath' => 'xxx',
            // email transport methods
            
            'swiftMailerPath' => realpath($applicationDirectory . '/../../../vendor/swiftmailer/swiftmailer/lib'),
            'transports' => array(

                // mail transport
                'mail' => array(
                    // can be Swift_MailTransport or Swift_SmtpTransport
                    'class' => 'Swift_MailTransport',
                ),         
                
                // another transport, can be named anything
                'smtp' => array(
                    // if you use smtp you may need to define the host, port, security and setters
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.hostnet.lv',
                    'port' => 25,
                    'security' => null,
//                    'setters' => array(
//                        'username' => 'your_username',
//                        'password' => 'your_password',
//                    ),
                ),
           ),
        ),        
        'vendor.dbrisinajumi.audittrail.behaviors.LoggableBehavior' => array(
            'class' => 'vendor.dbrisinajumi.audittrail.behaviors.LoggableBehavior',
            'tableAuditTrail' => 's_audit_trail',
        ),
        
        'authManager'   => array(
            'class'        => 'RDbAuthManager',
            // Provides support authorization item sorting.
            'defaultRoles' => array('Authenticated', 'Guest'),
            // see correspoing business rules, note: superusers always get checkAcess == true
        ),
        'bootstrap'     => array(
            'class'         => 'vendor.clevertech.yiibooster.src.components.Bootstrap',
            'coreCss'       => true, // whether to register any CSS at all, defaults to true
            'bootstrapCss'  => false, // use csutom css from theme
            'jqueryCss'     => false, // use csutom css from theme
            'responsiveCss' => false, // use csutom css from theme
            // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
            'plugins'       => array(),
            'fontAwesomeCss' => true,
            'minify' => FALSE,

        ),
        'cache'         => array(
            'class' => 'CDummyCache',
        ),
        
        'db'            => array(
            'tablePrefix'      => '',
            // MySQL
            'connectionString' => 'mysql:host=localhost;dbname=eu',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '111',
            'charset' => 'utf8',
            'enableProfiling'=>true,
            'enableParamLogging'=>true,
        ),
        //X-editable config
        'editable'      => array(
            'class'    => 'editable.EditableConfig',
            'form'     => 'yii_bootstrap',
            'mode'     => 'popup',
            'defaults' => array(
                'emptytext' => 'Click to edit',
                //'ajaxOptions' => array('dataType' => 'json') //useful for json exchange with server
            )
        ),
        'errorHandler'  => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'image'         => array(
            'class'  => 'vendor.phundament.p3extensions.components.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
        ),
        'returnUrl'     => array(
            'class' => 'vendor.phundament.p3extensions.components.P3ReturnUrl', // TODO: can this be removed?
        ),
        'langHandler'   => array(
            'class'     => 'vendor.phundament.p3extensions.components.P3LangHandler',
            'languages' => array('en', 'lt','lv','ru') // available languages 'ru', 'fr'
        ),
        'userCompany'   => array(
            'class'     => 'vendor.dbrisinajumi.d2company.components.companyHandler',
            'data_key' => 'company',
            'ccuc_status' => 'USER',
            'profiles_ccmp_field' => 'ccmp_id',  
        ),
        'sysCompany'   => array(
            'class'     => 'vendor.dbrisinajumi.d2company.components.companyHandler',
            'data_key' => 'sys_company',
            'ccuc_status' => 'SYS',
            'profiles_ccmp_field' => 'sys_ccmp_id',            
        ),
        'currency'      => array(
            'class'     => 'vendor.dbrisinajumi.fcrn.components.FcrnRate',
            'base'      => FCRN_LTL,
            'source'    => FCSR_LB_LT,
        ),
        'log'           => array(
            'class'  => 'CLogRouter',
            'enabled' => false,
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
            'class'=>'vendor.malyshev.yii-debug-toolbar.yii-debug-toolbar.YiiDebugToolbarRoute',
            'ipFilters'=>array('127.0.0.1','192.168.1.215'),
        ),
            ),
        ),
        'themeManager'  => array(
            'class'    => 'vendor.schmunk42.multi-theme.EMultiThemeManager',
            'basePath' => $applicationDirectory . '/themes',
            'baseUrl'  => $baseUrl . '/themes',
            'rules'    => array(
                // frontend
                '^p3pages/default/page'      => 'frontend',
                '^user/default/index'        => 'frontend',
                '^user/login/(.*)'           => 'frontend',
                '^user/profile/(.*)'         => 'frontend',
                '^user/registration/(.*)'    => 'frontend',
                '^user/recovery/(.*)'        => 'frontend',
                '^user/activation/(.*)'      => 'frontend',
                // backend
                '^user/(.*)'                 => 'frontend',
                '^rights/(.*)'               => 'backend2',
                '^sakila/(.*)'               => 'backend2',
                '^p3(.*)'                    => 'backend2',
                '^ckeditorConfigurator/(.*)' => 'backend2',
                '^D1Status/(.*)'             => 'backend2',
                '^d2company/ccgrGroup'       => 'backend2',
                '^d2company/ccgrGroup/(.*)'  => 'backend2',
                '^fcrn/fcsrCourrencySource/(.*)'  => 'backend2',
                '^fcrn/fcrnCurrency/(.*)'  => 'backend2',
                //'/fancybox(.*)'  =>           'fancybox',
                '/privatecab(.*)'  =>         'privatecab',
            )
        ),
        'urlManager'    => array(
            'class'          => 'vendor.phundament.p3extensions.components.P3LangUrlManager',
            'showScriptName' => true, // enable mod_rewrite in .htaccess if this is set to false
            'appendParams'   => false, // in general more error resistant
            'urlFormat'      => 'get', // use 'path', otherwise rules below won't work
            'rules'          => array(
                // backend
                'phundament'                             => 'p3admin/default/index',
                // standard login page URL
                '<lang:[a-z]{2}(_[a-z]{2})?>/site/login' => 'user/login',
                'site/login'                             => 'user/login',
                // p3pages - SEO
                '<lang:[a-z]{2}(_[a-z]{2})?>/<pageName:[a-zA-Z0-9-._]*>-<pageId:\d+>.html'
                                                         => 'p3pages/default/page',
                // p3media - SEO
                '<lang:[a-z]{2}(_[a-z]{2})?>/img/<preset:[a-zA-Z0-9-._]+>/<title:.+>_<id:\d+><extension:.[a-zA-Z0-9]{1,}+>'
                                                               => 'p3media/file/image',
                // Yii
                '<lang:[a-z]{2}(_[a-z]{2})?>/pages/<view:\w+>' => 'site/page',
                '<controller:\w+>/<id:\d+>'                    => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'       => '<controller>/<action>',
                // general language and route handling
                '<lang:[a-z]{2}(_[a-z]{2})?>'                  => '',
                '<lang:[a-z]{2}(_[a-z]{2})?>/<_c>'             => '<_c>',
                '<lang:[a-z]{2}(_[a-z]{2})?>/<_c>/<_a>'        => '<_c>/<_a>',
                '<lang:[a-z]{2}(_[a-z]{2})?>/<_m>/<_c>/<_a>'   => '<_m>/<_c>/<_a>',
            ),
        ),
        'user'          => array(
            // enable cookie-based authentication
            'class'          => 'RWebUser',
            // crisu83/yii-rights: Allows super users access implicitly.
            'behaviors'      => array(
                'vendor.schmunk42.web-user-behavior.WebUserBehavior',
                ),
            // compatibility behavior for yii-user and yii-rights
            'allowAutoLogin' => true,
            'loginUrl'       => array('/user/login'),
        ),
        'widgetFactory' => array(
            'class'      => 'CWidgetFactory',
            'enableSkin' => true,
            'widgets'=>array(
                'tlbExcelView' => array(
                    'libPath' => 'vendor.codeplex.phpexcel.Classes.PHPExcel',
                    'decimalSeparator' => '.',
                    'rowHeight' => 20,
                ),
                'TbBreadcrumbs' => array(
                    //ACE
                    'separator' => '<i class="icon-angle-right arrow-icon"></i>',  
                ),
            ),

        ),
        'request'=>array('enableCsrfValidation'=>false),

    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'     => array(
        // this is used in contact page
        'adminEmail'                => 'webmaster@example.com',
        // global Phundament 3 parameters
        'P3Page.fallbackLanguage'   => 'en', // defaults to 'en'
        'P3Widget.fallbackLanguage' => 'en', // defaults to 'en'
        'ext.ckeditor.options'      => array(
            'type'                            => 'fckeditor',
            'height'                          => 400,
            'filebrowserWindowWidth'          => '990',
            'filebrowserWindowHeight'         => '800',
            'resize_minWidth'                 => '150',
            /* Toolbar */
            'toolbar_Custom'                  => array(
                array(
                    'Templates',
                    '-',
                    'Maximize',
                    'Source',
                    'ShowBlocks',
                    '-',
                    'Undo',
                    'Redo',
                    '-',
                    'PasteText',
                    'PasteFromWord'
                ),
                array(
                    'JustifyLeft',
                    'JustifyCenter',
                    'JustifyRight',
                    'JustifyBlock',
                    'NumberedList',
                    'BulletedList',
                    '-',
                    'BidiLtr',
                    'BidiRtl'
                ),
                array('Table', 'Blockquote'),
                '/',
                array('Image', 'Flash', '-', 'Link', 'Unlink'),
                array('Bold', 'Italic', 'Underline', '-', 'UnorderedList', 'OrderedList', '-', 'RemoveFormat'),
                array('CreateDiv', 'Format', 'Styles')
            ),
            'toolbar'                         => "Custom",
            /* Settings */
            'startupOutlineBlocks'            => true,
            'pasteFromWordRemoveStyle'        => true,
            'pasteFromWordKeepsStructure'     => true,
            'templates_replaceContent'        => true,
            'ignoreEmptyParagraph'            => true,
            'autoParagraph'                   => true,
            'forcePasteAsPlainText'           => true,
            'enterMode'                       => 3,
            // use <div>s per default, since they usually have no height or margin
            'shiftEnterMode'                  => 2,
            'fillEmptyBlocks'                 => false,
            // do not insert &nbsp; into empty blocks
            'contentsCss'                     => $baseUrl . '/assets/e3ecaab1/ckeditor/ckeditor.css', // path is hashed by name
            'bodyId'                          => 'ckeditor',
            'bodyClass'                       => 'ckeditor',
            /* Assets will be published with publishAsset() */
            'templates_files'                 => array($baseUrl . '/index.php?r=ckeditorConfigurator/default/cktemplates'),
            'stylesCombo_stylesSet'           => 'my_styles:' . $baseUrl . '/index.php?r=ckeditorConfigurator/default/ckstyles',
            /* Standard-way to specify URLs - deprecated */
            /*'filebrowserBrowseUrl' => '/p3media/ckeditor',
              'filebrowserImageBrowseUrl' => '/p3media/ckeditor/image',
              'filebrowserFlashBrowseUrl' => '/p3media/ckeditor/flash',
              'filebrowserUploadUrl' => $baseUrl . '/p3media/import/ckeditorUpload',*/
            /* URLs will be parsed with createUrl() */
            'filebrowserBrowseCreateUrl'      => array('/p3media/ckeditor'),
            'filebrowserImageBrowseCreateUrl' => array('/p3media/ckeditor/image'),
            'filebrowserFlashBrowseCreateUrl' => array('/p3media/ckeditor/flash'),
            'filebrowserUploadCreateUrl'      => array('/p3media/import/ckeditorUpload'),
        ),
        'ext.ckeditor.dtd' => array(
            '$removeEmpty' => array(
                'span' => 0,
                'i' => 0
            ),
        ),
        'AuditTrail' => array(
            'table' =>'s_audit_trail',
        ),
    ),
);

if (is_file($localConfigFile)) { //localhost
    CMap::mergeArray($mainConfig, require($localConfigFile));
    return CMap::mergeArray($mainConfig, require($localConfigFile));
} else if (is_file($devConfigFile)) { //test/development
    CMap::mergeArray($mainConfig, require($devConfigFile));
    return CMap::mergeArray($mainConfig, require($devConfigFile));
} else if (is_file($prodConfigFile)) { //production
    CMap::mergeArray($mainConfig, require($prodConfigFile));
    return CMap::mergeArray($mainConfig, require($prodConfigFile));
} else {
    return $mainConfig;
}
