<div class="view">

    <table>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
            <td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?></th>
            <td><?php echo CHtml::encode($data->alias); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('title')); ?></th>
            <td><?php echo CHtml::encode($data->title); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('abbreviation')); ?></th>
            <td><?php echo CHtml::encode($data->abbreviation); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('is_main')); ?></th>
            <td>
                <?php if ((boolean)$data->is_main == true) : ?>
                <span title="Основная" class="true">&nbsp;</span>
                <?php else : ?>
                <span title="Не основная" class="false">&nbsp;</span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?></th>
            <td><?php echo CHtml::encode($data->created_at); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?></th>
            <td><?php echo CHtml::encode($data->created_by); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('created_ip')); ?></th>
            <td><?php echo CHtml::encode($data->created_ip); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?></th>
            <td><?php echo CHtml::encode($data->modified_at); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?></th>
            <td><?php echo CHtml::encode($data->modified_at); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?></th>
            <td><?php echo CHtml::encode($data->modified_by); ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('modified_ip')); ?></th>
            <td><?php echo CHtml::encode($data->modified_ip); ?></td>
        </tr>
    </table>

</div>