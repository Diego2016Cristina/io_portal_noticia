/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//..
	config.filebrowserBrowseUrl = './assets/ckeditor/ckfinder/ckfinder.html',
	config.filebrowserImageBrowseUrl = './assets/ckeditor/ckfinder/ckfinder.html?type=Images',
	config.filebrowserFlashBrowseUrl = './assets/ckeditor/ckfinder/ckfinder.html?type=Flash',
	config.filebrowserUploadUrl = './assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	config.filebrowserImageUploadUrl = './assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	config.filebrowserFlashUploadUrl = './assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
};
