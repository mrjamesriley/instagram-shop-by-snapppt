(function() {

  tinymce.create('tinymce.plugins.snappptEmbedSelector', {

    init : function(editor, url) {

      editor.addCommand('openSnappptEmbedSelector', function() {
        editor.windowManager.open({
          file : url + '/editor_plugin.html',
          inline : 1,
          width : 450,
          height : 80
        },
        {
          plugin_url : url,
          editor: editor,
          jQuery: jQuery
        });
      });

    },

    getInfo : function() {
      return {
        longname : 'Snapppt Embed Selector',
        author : 'Snapppt',
        authorurl : 'http://snapppt.com',
        infourl : 'http://snapppt.com',
        version : '1.0.0'
      };
    }
  });

  // Register plugin
  tinymce.PluginManager.add('snappptEmbedSelector', tinymce.plugins.snappptEmbedSelector);

})();
