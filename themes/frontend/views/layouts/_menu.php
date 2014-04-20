<?php


$user = User::model()->findByPk(Yii::app()->user->id);

$this->widget('application.widgets.TbAceMenu', array(
    'type' => '',
    'stacked' => false, 
    'htmlOptions' => array('class' => 'nav-list'),
    'items' => array(
        array(
            'label' => Yii::t('dbr_app', 'Administration'),
            'icon' => 'icon-cogs',            
            'visible' => Yii::app()->user->checkAccess('Company.*'),
            'submenuOptions' => array('class' => 'multi-level'),
            'items' => array(
                array(
                    'label' => Yii::t('dbr_app', 'Company Custom Fields'),
                    'url' => array('/d2company/cccfCustomField'),
                    'visible' => Yii::app()->user->checkAccess('Company.*'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Fuel type'),
                    'url' => array('/fueling/bcftFuelType'),
                    'visible' => Yii::app()->user->checkAccess('Fueltype'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Users'),
                    'url' => array('/user/admin'),
                    'visible' => Yii::app()->user->checkAccess('UserAdmin'),
                ),
            )
        ),
        array(
            'label' => Yii::t('dbr_app', 'Office'),
            'visible' => Yii::app()->user->checkAccess('Company.*'),
            'icon' => 'building',
            'items' => array(
                array(
                    'label' => Yii::t('dbr_app', 'Companies'),
                    'url' => array('/d2company/ccmpCompany'),
                    'visible' => Yii::app()->user->checkAccess('Company.*'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Persons'),
                    'url' => array('/d2person/pprsPerson'),
                    'visible' => Yii::app()->user->checkAccess('DataCardEditor'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Countries'),
                    'url' => array('/d2company/ccntCountry'),
                    'visible' => Yii::app()->user->checkAccess('DataCardEditor'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Trucks'),
                    'url' => array('/trucks/vtrcTruck'),
                    'visible' => Yii::app()->user->checkAccess('DataCardEditor'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Trailers'),
                    'url' => array('/trucks/vtrlTrailer'),
                    'visible' => Yii::app()->user->checkAccess('DataCardEditor'),
                ),
            )
        ),
        array(
            'label' => Yii::t('dbr_app', 'Voyages'),
            'visible' => Yii::app()->user->checkAccess('Company.*'),
            'icon' => 'road',
            'items' => array(
                array(
                    'label' => Yii::t('dbr_app', 'Voyages'),
                    'url' => array('/vvoy/vvoyVoyage'),
                    'visible' => Yii::app()->user->checkAccess('Company.*'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Points'),
                    'url' => array('/vvoy/vpntPoint'),
                    'visible' => Yii::app()->user->checkAccess('Company.*'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Expense positions'),
                    'url' => array('/vvoy/vepoExpensesPositions'),
                    'visible' => Yii::app()->user->checkAccess('Company.*'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Contracts'),
                    'url' => array('/vvoy/vcntContract'),
                    'visible' => Yii::app()->user->checkAccess('Company.*'),
                ),
            )
        ),
        array(
            'label' => Yii::t('dbr_app', 'Finances'),
            'icon' => 'money',
            'visible' => Yii::app()->user->checkAccess(ROLE_FINANCES),
            'items' => array(
                array(
                    'label' => Yii::t('dbr_app', 'Currency rates'),
                    'url' => array('/fcrn/fcrtCurrencyRate'),
                    'visible' => Yii::app()->user->checkAccess(ROLE_FINANCES),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Invoices'),
                    'url' => array('/finv/FinvInvoice'),
                    'visible' => Yii::app()->user->checkAccess(ROLE_FINANCES),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Periods'),
                    'url' => array('/fueling/BprdPeriod'),
                    'visible' => Yii::app()->user->checkAccess('Periods'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Payments'),
                    'url' => array('/fueling/Invoice'),
                    'visible' => Yii::app()->user->checkAccess(ROLE_FINANCES),
                ),
            )
        ),
        array(
            'label' => Yii::t('dbr_app', 'Fueling'),
            'icon'=>'tint',
            'visible' => Yii::app()->user->checkAccess('Fueling'),
            'items' => array(
                array(
                    'label' => Yii::t('dbr_app', 'Fuel statements'),
                    'url' => array('/fueling/bcbdCompanyBranchDay'),
                    'visible' => Yii::app()->user->checkAccess('Fueling'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Refueling'),
                    'url' => array('/fueling/bfrfFuelRefill'),
                    'visible' => Yii::app()->user->checkAccess('Fueling'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Cars'),
                    'url' => array('/fueling/bcarId'),
                    'visible' => Yii::app()->user->checkAccess('Fueling'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Fuel price'),
                    'url' => array('/fueling/bfprFuelPrice'),
                    'visible' => Yii::app()->user->checkAccess('Fuelprice'),
                ),
            )
        ),
        array(
            'label' => Yii::t('dbr_app', 'Reports'),
            'icon'=>'book',
            'visible' => Yii::app()->user->checkAccess('Reports'),
            'items' => array(
                array(
                    'label' => Yii::t('dbr_app', 'Weekly report'),
                    'url' => array('/fueling/reportGrid/GridClientWeek'),
                    'visible' => Yii::app()->user->checkAccess('Reports'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Daily report by Customer'),
                    'url' => array('/fueling/reportGrid/Grid&interval=daily'),
                    'visible' => Yii::app()->user->checkAccess('Reports'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Daily report by FS'),
                    'url' => array('/fueling/reportGrid/Grid&group=station&interval=daily'),
                    'visible' => Yii::app()->user->checkAccess('Reports'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Monthly report by Customer'),
                    'url' => array('/fueling/reportGrid/Grid&interval=monthly'),
                    'visible' => Yii::app()->user->checkAccess('Reports'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Actual period'),
                    'url' => array('/fueling/reportGrid/gridAzsCustomer'),
                    'visible' => Yii::app()->user->checkAccess('Periods'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Actual period by company'),
                    'url' => array('/fueling/reportGrid/gridAzsCustomer2'),
                    'visible' => Yii::app()->user->checkAccess('Periods'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Actual period by station'),
                    'url' => array('/fueling/reportGrid/gridAzsActual'),
                    'visible' => Yii::app()->user->checkAccess('Periods'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Daily report by customers'),
                    'url' => array('/fueling/reportGrid/reportCustomers&type=daily'),
                    'visible' => Yii::app()->user->checkAccess('Periods'),
                ),
                array(
                    'label' => Yii::t('dbr_app', 'Monthly report by customers'),
                    'url' => array('/fueling/reportGrid/reportCustomers&type=monthly'),
                    'visible' => Yii::app()->user->checkAccess('Periods'),
                ),
            )
        ),
    ),
        )
);
?>
<div class="sidebar-collapse" id="sidebar-collapse">
    <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
</div>

<script type="text/javascript">
    try {
        ace.settings.check('sidebar', 'collapsed')
    } catch (e) {
    }
</script>
