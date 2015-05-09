<?php

/**
 * Phundament 3 Console Config File
 * Containes predefined yiic console commands for Phundament.
 * Define composer hooks by the following name schema: <vendor>/<packageName>-<action>

 */

// for testing purposes
$webappCommand = array(
    'yiic',
    'webapp',
    'create',
    realpath(dirname(__FILE__) . '/../../../'),
    'git',
    '--interactive=' . (getenv('PHUNDAMENT_TEST') ? '0' : '1')
);

// gets merged automatically if available
$localConsoleConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'console-local.php';

// merge compnents and modules from main config
$mainConfig = require('main.php');

$consoleConfig = array(
    'aliases'    => array(
        'vendor' => $applicationDirectory . '/../../../vendor',
        'webroot' => $applicationDirectory . '/../../../www',
        //'gii-template-collection'              => 'vendor.phundament.gii-template-collection', // TODO
        'audittrail' => 'vendor.dbrisinajumi.audittrail',
    ),
    'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'       => 'Phundament Console Application',
    'components' => CMap::mergeArray(
        $mainConfig['components'],
        array()
    ),
    'modules'    => $mainConfig['modules'],
    'commandMap' => array(
        // dev command
        'database'      => array(
            'class' => 'vendor.schmunk42.database-command.EDatabaseCommand',
        ),
        // composer callback
        'migrate'       => array(
            // alias of the path where you extracted the zip file
            'class'                 => 'vendor.yiiext.migrate-command.EMigrateCommand',
            // this is the path where you want your core application migrations to be created
            'migrationPath'         => 'application.migrations',
            // the name of the table created in your database to save versioning information
            'migrationTable'        => 'migration',
            // the application migrations are in a pseudo-module called "core" by default
            'applicationModuleName' => 'core',
            // define all available modules (if you do not set this, modules will be set from yii app config)
            'modulePaths'           => array(
                'd2finv'                  => 'vendor.dbrisinajumi.d2finv.migrations',
				'vvoy'                    => 'vendor.uldisn.vvoy.migrations',
				'trucks'                  => 'vendor.dbrisinajumi.trucks.migrations',
                'd2fixr'                  => 'vendor.dbrisinajumi.d2fixr.migrations',
                'yeeki'                   => 'vendor.dbrisinajumi.yeeki.migrations',
                'd2files'                 => 'vendor.dbrisinajumi.d2files.migrations',
                'd2person'                 => 'vendor.dbrisinajumi.d2person.migrations',
                'd2company'               => 'vendor.dbrisinajumi.d2company.migrations',    
                'd2company'               => 'vendor.dbrisinajumi.fcrn.migrations',    
                'yii-user'                => 'vendor.uldisn.yii-user.migrations',                         
                //'d2tasks'                 => 'vendor.dbrisinajumi.d2tasks.migrations',    
                
            ),
            // you can customize the modules migrations subdirectory which is used when you are using yii module config
            'migrationSubPath'      => 'migrations',
            // here you can configure which modules should be active, you can disable a module by adding its name to this array
            'disabledModules'       => array(),
            // the name of the application component that should be used to connect to the database
            'connectionID'          => 'db',
            // alias of the template file used to create new migrations
            #'templateFile' => 'system.cli.migration_template',
        ),
    ),
    'params'     => 
    CMap::mergeArray(
            $mainConfig['params'],
            array(
    ))
);

// return merged config, from highest to lowest precedence: console-local, console
if (is_file($localConsoleConfigFile)) {
    return CMap::mergeArray($consoleConfig, require($localConsoleConfigFile));
} else {
    return $consoleConfig;
}
