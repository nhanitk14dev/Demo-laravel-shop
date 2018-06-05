<?php if(!empty($btn_view_datatable)): ?>
    <a class="btn btn-success btn-detail"><?php echo trans('button.view'); ?></a>
<?php endif; ?>

<?php if(!empty($link_show)): ?>
    <a class="btn btn-success" href="<?php echo $link_show; ?>"
       title="<?php echo trans("button.view"); ?>"><?php echo trans("button.view"); ?></a>
<?php endif; ?>

<?php if(!empty($link_show_ajax)): ?>
    <a class="btn btn-success btn-show-item" data-href="<?php echo $link_show_ajax; ?>"
       title="<?php echo trans("button.view"); ?>"><?php echo trans("button.view"); ?></a>
<?php endif; ?>

<?php if(!empty($create_company_share)): ?>
    <button type="button" class="btn btn-info btn-create-record"
       title="<?php echo trans('button.new_share'); ?>"><?php echo trans('button.new_share'); ?></button>
<?php endif; ?>

<?php if(!empty($link_edit)): ?>
    <a class="btn btn-info btn-edit-record" href="<?php echo $link_edit; ?>"
       title="<?php echo trans("button.edit"); ?>"><?php echo !empty($link_edit_text) ? $link_edit_text : trans("button.edit"); ?></a>
<?php endif; ?>

<?php if(!empty($link_group_phone_user)): ?>
    <button type="button" class="btn bg-light-green waves-effect btn_edit" data-href="<?php echo $link_group_phone_user; ?>"
            title="<?php echo trans("button.edit"); ?>"><?php echo trans("button.edit"); ?></button>
<?php endif; ?>

<?php if(!empty($link_delete) && !empty($id_delete)): ?>
    <button type="button" class="btn btn-danger btn-delete-record"
       data-title="<?php echo trans("admin_message.alert_delete", ["attr"=> $id_delete]); ?>"
       data-url="<?php echo $link_delete; ?>"
       title="<?php echo trans("button.delete"); ?>"><?php echo trans("button.delete"); ?></button>
<?php endif; ?>

<?php if(!empty($pay_interest_confirm)): ?>
    <button type="button" class="btn bg-light-green waves-effect btn-block btn-confirm-interest" data-href="<?php echo $pay_interest_confirm; ?>"
       title="<?php echo trans("button.pay_interest_confirm"); ?>"><?php echo trans("button.pay_interest_confirm"); ?></button>
<?php endif; ?>

<?php if(!empty($pay_interest_history)): ?>
    <button type="button" class="btn bg-cyan waves-effect btn-block btn-show-history" data-href="<?php echo $pay_interest_history; ?>"
       title="<?php echo trans("button.pay_interest_history"); ?>"><?php echo trans("button.pay_interest_history"); ?></button>
<?php endif; ?>

<?php if(!empty($add_user_to_list)): ?>
    <button type="button" class="btn bg-light-green waves-effect btn-block btn-add-user-to-list" data-type="<?php echo e($type); ?>"
            title="<?php echo trans("button.add_user_to_list"); ?>"><?php echo trans("button.add_user_to_list"); ?></button>
<?php endif; ?>