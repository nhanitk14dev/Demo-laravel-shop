@if(!empty($btn_view_datatable))
    <a class="btn btn-success btn-detail">{!! trans('button.view') !!}</a>
@endif

@if(!empty($link_show))
    <a class="btn btn-success" href="{!! $link_show !!}"
       title="{!!  trans("button.view") !!}">{!! trans("button.view") !!}</a>
@endif

@if(!empty($link_show_ajax))
    <a class="btn btn-success btn-show-item" data-href="{!! $link_show_ajax !!}"
       title="{!!  trans("button.view") !!}">{!! trans("button.view") !!}</a>
@endif

@if(!empty($create_company_share))
    <button type="button" class="btn btn-info btn-create-record"
       title="{!! trans('button.new_share') !!}">{!! trans('button.new_share') !!}</button>
@endif

@if(!empty($link_edit))
    <a class="btn btn-info btn-edit-record" href="{!! $link_edit !!}"
       title="{!!  trans("button.edit") !!}">{!! !empty($link_edit_text) ? $link_edit_text : trans("button.edit") !!}</a>
@endif

@if(!empty($link_group_phone_user))
    <button type="button" class="btn bg-light-green waves-effect btn_edit" data-href="{!! $link_group_phone_user !!}"
            title="{!!  trans("button.edit") !!}">{!! trans("button.edit") !!}</button>
@endif

@if(!empty($link_delete) && !empty($id_delete))
    <button type="button" class="btn btn-danger btn-delete-record"
       data-title="{!! trans("admin_message.alert_delete", ["attr"=> $id_delete]) !!}"
       data-url="{!! $link_delete !!}"
       title="{!! trans("button.delete") !!}">{!! trans("button.delete") !!}</button>
@endif

@if(!empty($pay_interest_confirm))
    <button type="button" class="btn bg-light-green waves-effect btn-block btn-confirm-interest" data-href="{!! $pay_interest_confirm !!}"
       title="{!!  trans("button.pay_interest_confirm") !!}">{!! trans("button.pay_interest_confirm") !!}</button>
@endif

@if(!empty($pay_interest_history))
    <button type="button" class="btn bg-cyan waves-effect btn-block btn-show-history" data-href="{!! $pay_interest_history !!}"
       title="{!!  trans("button.pay_interest_history") !!}">{!! trans("button.pay_interest_history") !!}</button>
@endif

@if(!empty($add_user_to_list))
    <button type="button" class="btn bg-light-green waves-effect btn-block btn-add-user-to-list" data-type="{{ $type }}"
            title="{!!  trans("button.add_user_to_list") !!}">{!! trans("button.add_user_to_list") !!}</button>
@endif