<form id="{{ $form_id ?? 'form-form' }}" method="POST"
      action="{{ $form_url }}"
      enctype="multipart/form-data">

    <input type="hidden" name="_method" value="{{ $form_method }}">
    {{ csrf_field() }}

    {{ $slot }}

</form>