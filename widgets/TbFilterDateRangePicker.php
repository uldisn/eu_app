<?php

/**
 * @see http://www.yiiframework.ru/forum/viewtopic.php?f=3&t=11966
 * @see http://www.dangrossman.info/2012/08/20/a-date-range-picker-for-twitter-bootstrap/
 * @see https://github.com/clevertech/YiiBooster/issues/366
 * @see https://github.com/clevertech/YiiBooster/issues/248 ?????
 */
class TbFilterDateRangePicker extends TbDateRangePicker {

    /**
     * ### .init()
     *
     * Initializes the widget.
     */
    public function init() {

        //htmloptions
        $this->htmlOptions = array(
            'size' => 20,
            'class' => 'date20',
            'title' => Yii::t('TbFilterDateRangePicker', 'Date from-to'));


        //callbach triger change input field
        list($name, $id) = $this->resolveNameID();
        $callback = 'function(start, end){
                        $("#' . $id . '" ).trigger("change");
                    }';
        $this->callback = new CJavaScriptExpression($callback);
        parent::init();

        //options
        $this->options = array(
            'showButtonPanel' => true,
            'changeYear' => true,
            'format' => 'YYYY-MM-DD',
            'ranges' => array(
                Yii::t('TbFilterDateRangePicker', 'Today') => array(
                    new CJavaScriptExpression('moment()'),
                    new CJavaScriptExpression('moment()')
                ),
                Yii::t('TbFilterDateRangePicker', 'Yesterday') => array(
                    new CJavaScriptExpression("moment().subtract('days', 1)"),
                    new CJavaScriptExpression("moment().subtract('days', 1)")
                ),
                Yii::t('TbFilterDateRangePicker', 'Last 7 Days') => array(
                    new CJavaScriptExpression("moment().subtract('days', 6)"),
                    new CJavaScriptExpression("moment()")
                ),
                Yii::t('TbFilterDateRangePicker', 'Last 30 Days') => array(
                    new CJavaScriptExpression("moment().subtract('days', 29)"),
                    new CJavaScriptExpression("moment()")
                ),
                Yii::t('TbFilterDateRangePicker', 'This Month') => array(
                    new CJavaScriptExpression("moment().startOf('month')"),
                    new CJavaScriptExpression("moment().endOf('month')"),
                ),
                Yii::t('TbFilterDateRangePicker', 'Last Month') => array(
                    new CJavaScriptExpression("moment().subtract('month', 1).startOf('month')"),
                    new CJavaScriptExpression("moment().subtract('month', 1).endOf('month')"),
                ),
            ),
            'locale' => array(
                'applyLabel' => Yii::t('TbFilterDateRangePicker', 'Apply'),
                'clearLabel' => Yii::t('TbFilterDateRangePicker', 'Clear'),
                'fromLabel' => Yii::t('TbFilterDateRangePicker', 'From'),
                'toLabel' => Yii::t('TbFilterDateRangePicker', 'To'),
                'customRangeLabel' => Yii::t('TbFilterDateRangePicker', 'Custom range'),
            ),
        );
    }

    /**
     * ### .run()
     *
     * Runs the widget.
     */
    public function run() {
        if ($this->selector) {
            $this->registerDateRangePlugin($this->selector, $this->options, $this->callback);
        } else {
            list($name, $id) = $this->resolveNameID();

            if ($this->hasModel()) {
                if ($this->form) {
                    echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
                } else {
                    echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
                }
            } else {
                echo CHtml::textField($name, $this->value, $this->htmlOptions);
            }

            $this->setLocaleSettings();
            $this->registerDateRangePlugin('#' . $id, $this->options, $this->callback);
        }
    }

    /**
     * Registers the Bootstrap daterange plugin
     * create function and call of this function
     *
     * @param string $selector the CSS selector
     * @param array $options the plugin options
     * @param string $callback the javascript callback function
     *
     * @see  http://www.dangrossman.info/2012/08/20/a-date-range-picker-for-twitter-bootstrap/
     * @since 1.1.0
     * @deprecated 3.0.0
     */
    public function registerDateRangePlugin($selector, $options = array(), $callback = null) {
        list($name, $id) = $this->resolveNameID();
        Yii::app()->clientScript->registerScript(
                $id, 'function filter_' . $id . '_init(){
                $("' . $selector . '").daterangepicker(' . CJavaScript::encode($options) . ($callback ? ', ' . CJavaScript::encode($callback) : '') . ');
                }
                filter_' . $id . '_init();'
        );
    }

    /**
     * ### .setLocaleSettings()
     *
     * If user did not provided the names of weekdays and months in $this->options['locale']
     *  (which he should not care about anyway)
     *  then we populate this names from Yii's locales database.
     *
     *  This method works with the local properties directly, beware.
     */
    private function setLocaleSettings() {
        $this->setDaysOfWeekNames();
        $this->setMonthNames();
    }

    /**
     * ### .setDaysOfWeekNames()
     */
    private function setDaysOfWeekNames() {
        if (empty($this->options['locale']['daysOfWeek'])) {
            $this->options['locale']['daysOfWeek'] = Yii::app()->locale->getWeekDayNames('narrow', true);
        }
    }

    /**
     * ### .setMonthNames()
     */
    private function setMonthNames() {
        if (empty($this->options['locale']['monthNames'])) {
            $this->options['locale']['monthNames'] = array_values(
                    Yii::app()->locale->getMonthNames('wide', true)
            );
        }
    }

}
