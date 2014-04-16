<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('pprs_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->pprs_id), array('d2person/pprsPerson/view', 'pprs_id' => $data->pprs_id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('pprs_first_name')); ?>:</b>
    <?php echo CHtml::encode($data->pprs_first_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('pprs_second_name')); ?>:</b>
    <?php echo CHtml::encode($data->pprs_second_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('pprs_declared_place_of_residence')); ?>:</b>
    <?php echo CHtml::encode($data->pprs_declared_place_of_residence); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('pprs_real_pleace_of_residence')); ?>:</b>
    <?php echo CHtml::encode($data->pprs_real_pleace_of_residence); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('pprs_salary')); ?>:</b>
    <?php echo CHtml::encode($data->pprs_salary); ?>
    <br />

    <?php if (Yii::app()->user->checkAccess('PprsPerson.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('D2personModule.model', 'Update {model}', array('{model}' => Yii::t('D2personModule.model', 'Pprs Person'))), array('d2person/pprsPerson/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
