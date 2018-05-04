/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.removeButtons = 'Underline,Subscript,Superscript,Find,Replace,SelectAll,Form,Checkbox,Radio,TextFiled,Textarea,SelectionField,Button,ImageButton,HiddenField,CopyFormat,RemoveFormat,SetLanguage,Anchor,Flash,About';
    config.format_tags = 'p;h1;h2;h3;pre';
    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.enterMode = CKEDITOR.ENTER_DIV;
    config.allowedContent = true;
    config.extraAllowedContent = 'div(col-*,row)';
    config.removeDialogTabs = 'link:upload;image:Upload'
};
