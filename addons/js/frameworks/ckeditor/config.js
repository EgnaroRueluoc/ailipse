/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Source,Save,NewPage,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Superscript,Subscript,CopyFormatting,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Flash,Table,HorizontalRule,SpecialChar,PageBreak,Iframe,Format,ShowBlocks,Styles,RemoveFormat,Templates';
	config.resize_enabled = false;
};
