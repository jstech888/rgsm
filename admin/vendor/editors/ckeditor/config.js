/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert', groups: ['Image', 'Youtube'] },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'media' , groups: ['Image'] },
		{ name: 'document',	groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup', 'justify' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' }
	];

	config.skin = 'flat';

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	//config.removeButtons = 'Underline,Subscript,Superscript';

	config.baseFloatZIndex = 102000;
	config.defaultLanguage = 'zh-tw';
	config.language = 'zh-tw';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	// Simplify the dialog windows.
	config.extraPlugins = 'colorbutton,justify,forms,youtube,oembed,widget,image2,font';

	config.oembed_maxWidth = '560';
	config.oembed_maxHeight = '315';
	config.oembed_WrapperClass = 'embededContent';

	config.allowedContent = true;
	config.extraAllowedContent = 'iframe[*] style script class p';

};

CKEDITOR.config.allowedContent = true;
