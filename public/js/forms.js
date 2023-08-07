
const creatForm = function () {

    let dataForm = [];

    // Private functions
    const _collapse = function () {
        $( "#accordion" ).accordion();
    };

    const dragstart = event => {
        $('.btn-drag').on('dragstart', function(event) {
            let type = $(this).attr('data-type');
            let text = $(this).attr('data-name');
            event.originalEvent.dataTransfer.setData('text', text);
            event.originalEvent.dataTransfer.setData('type', type);
        });
    };

    const drop = event => {
        $('.dest-list').on('drop', function(event) {
            event.preventDefault();
            let text = event.originalEvent.dataTransfer.getData('text');
            let type = event.originalEvent.dataTransfer.getData('type');
            let item = $('<li data-name="'+text+'" class="delete-element">').text(text);
            dataForm.push(element[type][text]);

            let htmlBody = buildForm().callInitBuild(dataForm);
            console.log(dataForm)
            $(this).html(htmlBody);
        });
    };

    const dragover = event => {
        $('.dest-list').on('dragover', function(event) {
            event.preventDefault();
        });
    };

    return {
        // Public functions
        init: function () {
            _collapse();
            dragstart();
            drop();
            dragover();
        }
    };
}();

jQuery(document).ready(function() {

    creatForm.init();
});
