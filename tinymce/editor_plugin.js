(function() {

  tinymce.create('tinymce.plugins.snappptEmbedSelector', {

    init : function(ed, url) {
      // Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
      ed.addCommand('openSnappptEmbedSelector', function() {
        ed.windowManager.open({
          file : url + '/editor_plugin.php',
          inline : 1,
          width : 450,
          height : 80
        }, {
          plugin_url : url, // Plugin absolute URL
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
