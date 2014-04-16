<?php
$aMenuOfficeCompanies = array(
    'label' => Yii::app()->userCompany->getActiveCompanyName(),
    'icon' => 'globe white',
    'url' => '#',
);
$aMenuOfficeCompanies['items'] = array(
    array('label' => Yii::t('app', 'Your companies')),
);

foreach (Yii::app()->userCompany->getClientCompanies() as $mCcmp) {
    $aMenuOfficeCompanies['items'][] =
            array(
                'label' => $mCcmp->ccucCcmp->ccmp_name,
                'url' => array_merge(array(''), $_GET, array('company' => $mCcmp->ccucCcmp->ccmp_id)),
    );
}

$user = User::model()->findByPk(Yii::app()->user->id);


$this->widget(
    'TbNavbar', array(
    'collapse' => true,
    'brand' => false,       
    'fixed' => false,
    'htmlOptions'=>array('class'=>'pull-right'),
        
    'items' => array(
        array(
            'class' => 'TbMenu',
            'items' => array(
                array(
                    'label' => Yii::t('dbr_app', 'My company'),
                    'url' => array('/d2company/ccmpCompany/view'),
                    'visible' => DbrUser::isCustomerOfficeUser(),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Cars'),
                    'url' => array('/fueling/bcarId'),
                    'visible' => DbrUser::isCustomerOfficeUser(),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Refueling'),
                    'url' => array('/fueling/bfrfFuelRefill'),
                    'visible' => DbrUser::isCustomerOfficeUser(),
                ),
            ),
        ),
        array(
            'class' => 'TbMenu',
            'htmlOptions' => array('class' => 'pull-right light-blue'),
            'items' => array(
                $aMenuOfficeCompanies,
                array(
                    'label' => Yii::app()->language,
                    'icon' => 'globe white',
                    'url' => '#',
                    'items' => array(
                        array('label' => Yii::t('app', 'Languages')),
                        array(
                            'label' => 'English',
                            'url' => array_merge(array(''), $_GET, array('lang' => 'en'))
                        ),
                        array(
                            'label' => 'Latviešu',
                            'url' => array_merge(array(''), $_GET, array('lang' => 'lv'))
                        ),
                        array(
                            'label' => 'Lietuvos',
                            'url' => array_merge(array(''), $_GET, array('lang' => 'lt'))
                        ),
                        array(
                            'label' => 'Русский',
                            'url' => array_merge(array(''), $_GET, array('lang' => 'ru'))
                        ),
                    ),
                ),
                array(
                    'label' => (Yii::app()->user->isGuest?Yii::app()->user->name:$user->profile->first_name." ".$user->profile->last_name."(".ucfirst(Yii::app()->user->name).")"),
                    'visible' => !Yii::app()->user->isGuest,
                    'icon' => 'user white',
                    'items' => array(
                        array('label' => Yii::t('app', 'User')),
                        array(
                            'label' => Yii::t('app', 'Profile'),
                            'icon' => 'icon-user',
                            'url' => array('/user/profile'),
                        ),
                        '---',
                        array(
                            'label' => Yii::t('app', 'Logout'),
                            'icon' => 'icon-off',
                            'url' => array('/site/logout'),
                            'visible' => !Yii::app()->user->isGuest
                        ),
                    )
                ),
            ),
        ),
    )
        )
);