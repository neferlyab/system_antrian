$(function(){
	$( 'textarea.texteditor' ).ckeditor({toolbar:'Full'});
	$( 'textarea.medium-texteditor' ).ckeditor({toolbar:'Medium',width:700});
	$( 'textarea.color-texteditor' ).ckeditor({toolbar:'Color',height:100});
	$( 'textarea.mini-texteditor' ).ckeditor({toolbar:'Basic',width:700});
});