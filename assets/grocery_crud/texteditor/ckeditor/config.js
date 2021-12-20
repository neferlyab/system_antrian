/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
var newURL = window.location.protocol + "//" + window.location.host + "/";
CKEDITOR.editorConfig = function( config )
{
              
        config.filebrowserBrowseUrl =           newURL +'assets/kcfinder/browse.php?type=files';
        config.filebrowserImageBrowseUrl =      newURL +'assets/kcfinder/browse.php?type=images';
        config.filebrowserFlashBrowseUrl =      newURL +'assets/kcfinder/browse.php?type=flash';
        config.filebrowserUploadUrl =           newURL +'assets/kcfinder/upload.php?type=files';
        config.filebrowserImageUploadUrl =      newURL +'assets/kcfinder/upload.php?type=images';
        config.filebrowserFlashUploadUrl =      newURL +'assets/kcfinder/upload.php?type=flash';
        config.toolbar_Medium = [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Print', '-' ] },
               // { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
               // { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
               
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                { name: 'insert', items: [ 'Flash', 'Table', 'HorizontalRule', 'Smiley','Image' ] },
                '/',
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                //{ name: 'others', items: [ '-' ] },
               // { name: 'about', items: [ 'About' ] }
            ]; 

        config.toolbar_Basic =
            [
               
                { name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
                { name: 'paragraph', items : [ 'NumberedList','BulletedList',
                    '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
                { name: 'links', items : [ 'Link','Unlink'] },
                { name: 'insert', items : [ 'Image'] },
                '/',
            ];

        config.toolbar_Color =
            [
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                '/',
            ];
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
