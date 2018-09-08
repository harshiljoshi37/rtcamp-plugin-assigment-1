(function() {

    tinymce.PluginManager.add('rt-plugin', function( editor, url ) {
        editor.addButton('rt-plugin', {
                    type: 'button',
                    text: 'AApdu Button',
                    id: 'btnShrt',
                    icon: false,
                    onclick: function() {
                      // change the shortcode as per your requirement
                       editor.insertContent('[do-it]');

                   }
          });
    });
})();