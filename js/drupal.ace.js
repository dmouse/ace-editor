(function (Drupal, debounce, $, ace) {
  "use strict";

  Drupal.editors.ace_editor = {

    attach: function (element, format) {
      var textarea = $("#edit-body-0-value");
      var mode = textarea.data('editor');

      var editDiv = $('<div>', {
          position: 'absolute',
          width: textarea.width(),
          height: textarea.height(),
          'class': textarea.attr('class')
      }).insertBefore(textarea);

      textarea.css('visibility', 'hidden');
      var aceEditor = ace.edit(editDiv[0]);
      aceEditor.setTheme("ace/theme/monokai");
      aceEditor.getSession().setMode("ace/mode/markdown");
      editor.setOption("enableEmmet", true);
    },

    detach: function (element, format, trigger) {},

    onChange: function (element, callback) {},

    attachInlineEditor: function (element, format, mainToolbarId, floatedToolbarId) {},

  };

})(Drupal, Drupal.debounce, jQuery, ace);
