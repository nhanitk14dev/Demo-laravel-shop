<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attribute phải được chấp nhận.",
     "active_url"       => ":attribute không phải là một URL hợp lệ.",
    "after"            => ":attribute phải sau ngày :date.",
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    "alpha"            => ":attribute chỉ có thể chứa ký tự chữ",
     "alpha_dash"       => ":attribute chỉ có thể chứa ký tự chữ, số và dấu gạch ngang (-)",
     "alpha_num"        => ":attribute chỉ có thể chứa ký tự chữ và số",
    'array'                => ':attribute phải là một mảng.',
    "before"           => ":attribute phải trước ngày :date.",
    'before_or_equal'      => ':attribute phải là ngày trước hoặc bằng :date.',
    'between'              => [
        "numeric" => ":attribute phải có giá trị trong khoản :min - :max.",
         "file"    => ":attribute phải có kích thước trong khoản :min - :max kilobytes.",
         "string"  => ":attribute phải có từ :min đến :max ký tự.",
        'array'   => ':attribute phải ở giữa :min và :max mục.',
    ],
    'boolean'              => ':attribute phải là Đúng hoặc Sai.',
    "confirmed"        => "Giá trị xác nhận :attribute không trùng khớp.",
     "date"             => ":attribute không phải là một ngày hợp lệ.",
     "date_format"      => ":attribute không phù hợp với định dạng :format.",
     "different"        => ":attribute và :other phải khác nhau.",
     "digits"           => ":attribute phải có :digits chữ số.",
     "digits_between"   => ":attribute phải nằm trong khoản :min và :max chữ số.",
    'dimensions'           => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => ':attribute có giá trị trùng lặp.',
    "email"            => "Định dạng :attribute không hợp lệ.",
     "exists"           => ":attribute đã chọn không hợp lệ.",
    'file'                 => ':attribute phải là một file.',
    'filled'               => ':attribute phải có giá trị.',
    "image"            => ":attribute phải là một tập tin ảnh.",
    "in"               => ":attribute đã chọn không hợp lệ.",
    'in_array'             => ':attribute không tồn tại trong :other.',
    "integer"          => ":attribute phải là một số nguyên.",
     "ip"               => ":attribute phải là một địa chỉ IP hợp lệ.",
    'ipv4'                 => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6'                 => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json'                 => ':attribute phải là một chuỗi JSON hợp lệ',
    'max'                  => [
        "numeric" => ":attribute không được lớn hơn :max.",
         "file"    => ":attribute không được lớn hơn :max kilobytes.",
         "string"  => ":attribute không được dài hơn :max ký tự.",
        'array'   => ':attribute có thể không có nhiều hơn :max mục.',
    ],
    'mimes'                => ':attribute phải là một tập tin loại: :values.',
    'mimetypes'            => ':attribute phải là một tập tin loại: :values.',
    'min'                  => [
        "numeric" => ":attribute nhỏ nhất là :min.",
         "file"    => ":attribute nhỏ nhất là :min kilobytes.",
         "string"  => ":attribute ngắn nhất là :min ký tự.",
        'array'   => ':attribute phải có ít nhất :min mục.',
    ],
    'not_in'               => ':attribute đã chọn không hợp lệ.',
    'numeric'              => ':attribute Phải là một số.',
    'present'              => ':attribute phải có mặt.',
    'regex'                => ':attribute định dạng không chính xác.',
    "required"         => ":attribute bắt buộc phải có giá trị.",
    "required_with"    => ":attribute bắt buộc phải nhập khi :values có giá trị.",
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        "numeric" => ":attribute phải bằng :size.",
        "file"    => ":attribute phải bằng :size kilobytes.",
         "string"  => ":attribute phải dài :size ký tự.",
        'array'   => ':attribute phải chứa :size mục.',
    ],
    'string'               => ':attribute nên là một chuỗi.',
    'timezone'             => ':attribute nên là một vùng hợp lệ.',
    'unique'               => ":attribute đã được sử dụng.",
    'uploaded'             => ':attribute failed to upload.',
    'url'                  => ':attribute định dạng không hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
