/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.font_names = "新細明體;標楷體;微軟正黑體;" +config.font_names ;
	config.filebrowserBrowseUrl = 'https://www.a1driving.com.hk/enrollment_test2/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'https://www.a1driving.com.hk/enrollment_test2/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = 'https://www.a1driving.com.hk/enrollment_test2/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl = 'https://www.a1driving.com.hk/enrollment_test2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'https://www.a1driving.com.hk/enrollment_test2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'https://www.a1driving.com.hk/enrollment_test2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
