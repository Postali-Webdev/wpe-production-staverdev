(function() {
    tinymce.PluginManager.add('phone_number_button', function(editor, url) {
        editor.addButton('phone_number_button', {
            text: 'Add Related Post',
            icon: false,
            onclick: function () {

                editor.windowManager.open({
                    title: 'Add Related Post',
                    body: [
                        {
                            type: 'textbox',
                            name: 'link',
                            label: 'Post URL',
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'title',
                            label: 'Post Title',
                            value: ''
                        }
                    ],
                    onsubmit: function (e) {
                        editor.insertContent(`<div class="related-post-wrapper"><p class="related-title">Related Link</p><div class="related-post"><a href="${e.data.link}">${e.data.title}</a></div></div>`);
                    }
                });
            },
            classes: 'postali-mceu-button'
        });
    });
})();