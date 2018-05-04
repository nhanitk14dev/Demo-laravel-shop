(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else if (typeof module === "object" && module.exports) {
		module.exports = factory( require( "jquery" ) );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: VI (Vietnamese; Tiếng Việt)
 */
$.extend( $.validator.messages, {
	required: "Thông tin bắt buộc.",
	remote: "Vui lòng sửa cho đúng.",
	email: "Vui lòng nhập email.",
	url: "Vui lòng nhập URL.",
	date: "Vui lòng nhập ngày.",
	dateISO: "Vui lòng nhập ngày (ISO).",
	number: "Vui lòng nhập số.",
	digits: "Vui lòng nhập chữ số.",
	creditcard: "Vui lòng nhập số thẻ tín dụng.",
	equalTo: "Vui lòng nhập thêm lần nữa.",
	extension: "Phần mở rộng không đúng.",
	maxlength: $.validator.format( "Vui lòng nhập từ {0} kí tự trở xuống." ),
	minlength: $.validator.format( "Vui lòng nhập từ {0} kí tự trở lên." ),
	rangelength: $.validator.format( "Vui lòng nhập từ {0} đến {1} kí tự." ),
	range: $.validator.format( "Vui lòng nhập từ {0} đến {1}." ),
	max: $.validator.format( "Vui lòng nhập từ {0} trở xuống." ),
	min: $.validator.format( "Vui lòng nhập từ {0} trở lên." )
} );

}));