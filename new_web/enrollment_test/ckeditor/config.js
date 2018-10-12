/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.font_names = "新細明體;標楷體;微軟正黑體;" +config.font_names ;
	config.filebrowserBrowseUrl = 'https://www.hksm.com.hk/enrollment/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'https://www.hksm.com.hk/enrollment/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = 'https://www.hksm.com.hk/enrollment/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl = 'https://www.hksm.com.hk/enrollment/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'https://www.hksm.com.hk/enrollment/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'https://www.hksm.com.hk/enrollment/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
