    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
    $cs = Yii::app()->getClientScript();
    $cs->registerMetaTag('width=device-width, initial-scale=1.0', 'viewport');

    $ace_path = realpath(Yii::getPathOfAlias('vendor.responsiweb') . '/ace-v1.2--bs-v2.3.x/assets');

    $asset_link = Yii::app()->assetManager->publish(
            $ace_path, false, // hash by name
            -1, // level
            false); // forceCopy

    $cs->registerCssFile($asset_link . '/css/bootstrap.min.css');
    $cs->registerCssFile($asset_link . '/css/bootstrap-responsive.min.css');
    $cs->registerCssFile($asset_link . '/css/font-awesome.min.css');

    // CSS files
    $cs->registerCssFile($asset_link . '/css/ace-fonts.css');
    $cs->registerCssFile($asset_link . '/css/ace.min.css');
    $cs->registerCssFile($asset_link . '/css/ace-responsive.min.css');
    $cs->registerCssFile($asset_link . '/css/ace-skins.min.css');
    $cs->registerCssFile($app_asset_path . '/parkoil-ace.css');    
    $cs->registerCssFile($app_asset_path . '/parkoil.css');    

    // JS files    
    $cs->registerScriptFile($asset_link . '/js/ace-extra.min.js');
    $cs->registerScriptFile($asset_link . '/js/ace-elements.min.js',CClientScript::POS_END);
    $cs->registerScriptFile($asset_link . '/js/ace.min.js',CClientScript::POS_END);

    $user = User::model()->findByPk(Yii::app()->user->id);    
    ?>
</head>

<body>
		<div class="navbar  navbar-fixed-top" id="navbar">
			<script type="text/javascript">
            try {
                ace.settings.check('navbar', 'fixed')
            } catch (e) {
            }
			</script>

                                        

        <?php
        $aMenuOfficeCompanies = array();
        if (Yii::app()->sysCompany->getActiveCompanyName()) {
$aMenuOfficeCompanies = array(
                'label' => Yii::app()->sysCompany->getActiveCompanyName(),
    'url' => '#',
    'items' => array(
                    array('label' => Yii::t('app', 'Your companies'),
                    ),
                )
    );

            foreach (Yii::app()->sysCompany->getClientCompanies() as $mCcmp) {
                $aMenuOfficeCompanies['items'][] = array(
                'label' => $mCcmp->ccucCcmp->ccmp_name,
                            'url' => array_merge(array(''), $_GET, array(Yii::app()->sysCompany->data_key => $mCcmp->ccucCcmp->ccmp_id)),
    );
}
        }
$this->widget(
    'TbNavbar', array(
    'collapse' => true,
           // 'brand' => '<img alt="" src="/assets/7d883f12/img/ParkOilLogoTransparent.png">',
            'brandOptions' => array('class' => 'parkoil_logo'),
    'fixed' => false,
            'htmlOptions' => array('class' => 'pull-left'),
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
                        array(
                            'label' => UserModule::t('Change password'),
                            'icon' => 'icon-certificate',
                            'url' => array('/user/profile/changepassword'),
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
?>
		</div>                        
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar sidebar-fixed" id="sidebar">
				<script type="text/javascript">
                try {
                    ace.settings.check('sidebar', 'fixed')
                } catch (e) {
                }
				</script>
       
    <?php
    //menu
    $this->renderFile(
            Yii::getPathOfAlias('application.themes.frontend.views.layouts') . DIRECTORY_SEPARATOR . '_menu.php'
        );

   ?>
			</div>

			<div class="main-content">
				<div class="page-content ">
					<div class="row-fluid">
						<div class="span12"> 
                            <?=$content?>
                        </div><!-- /.span -->
					</div><!-- /.row-fluid -->
				</div><!-- /.page-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

        
       

<!-- /container -->

<?php

if (Yii::app()->user->checkAccess('Editor')) {
    ?>
<div id="backend">
    <?php
    $cs->registerCssFile($app_asset_path . '/backend.css');
    $this->renderFile(
        Yii::getPathOfAlias('application.themes.backend2.views.layouts') . DIRECTORY_SEPARATOR . '_navbar.php'
    );
    ?>
</div>
    <?php
}
