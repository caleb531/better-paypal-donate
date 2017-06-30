(function() {
var pluginId = 'better_paypal_donate';

tinymce.PluginManager.add( pluginId, function( editor, url ) {

	// Add actual button to toolbar
	editor.addButton( pluginId, {
		title: 'PayPal Donate Button',
		cmd: pluginId,
		image: url + '/button.png',
	});

	// Insert shortcode when button is clicked
	editor.addCommand( pluginId, function() {
		editor.execCommand( 'mceInsertContent', false, '[donate-button email="" purpose="" amount=""]Give[/donate-button]' );
	});

});
}());
