<?php
$I = new WebGuy($scenario);
$I->wantTo('create a widget translation');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=site/index&lang=en');
$I->See('Translation for','.alert');
$I->click("//div[@id='widget-1']//a[contains(@href,'p3widgets/p3WidgetTranslation/create')]");
$I->see('Widgets','h1');
#$I->fillField('P3WidgetTranslation_content','Hello World!');
$I->click('Save');
$I->dontSee('Translation for widget #1 CWidget not found');// TODO: temporarily removed, codeception bug?: ,'.alert');
