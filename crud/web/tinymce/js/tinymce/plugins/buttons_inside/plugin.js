tinymce.PluginManager.add('buttons_inside', function(editor, url) {

    var button1, button2 = null;

    editor.on('init', function(e) {

        // Create and render a button to the body element
        button1 = tinymce.ui.Factory.create({
            type: 'button',
            text: 'Add',
            tooltip: 'Add iSpring content 1',
            onclick: processClick
        }).renderTo(editor.getContentAreaContainer());

        button2 = tinymce.ui.Factory.create({
            type: 'button',
            text: '',
            tooltip: 'Add iSpring content 2',
            onclick: processClick
        }).renderTo(editor.getContentAreaContainer());

        button2.$el.addClass('add_ispring_content');

    });

    function processClick(e)
    {
        e.control.$el.toggleClass('clicked');
    }

});