<?php

$mainConfig = require('main.php');

return CMap::mergeArray(
    $mainConfig,
    array(
        
         'components' => array(
             'assetManager' => array(
                 'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . "../../www/assets",
                 // needed when running from global codecept.phar installation
             ),
             'fixture'      => array(
                 'class' => 'system.test.CDbFixtureManager',
             ),
             // provide test database connection
             //'db'           => $mainConfig['components']['dbTest'],
         ),
    )
);
