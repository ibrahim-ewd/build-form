const creatForm = function () {

    let dataForm = [];

    const getDataForm = function () {
        return new Promise((resolve, reject) => {
            resolve(
                ajaxFunction().getDataForm({id: 1}).then(data => {
                    buildForm().callInitBuild(JSON.parse(data));
                    dataForm = JSON.parse(data) ?? [];
                })
            )
        })
    }

    const addDataForm = function (dataForm) {

        let dataAjax = {
            'data': JSON.stringify(dataForm),
            'id': 1,
        }

        ajaxFunction().addData(dataAjax).then(data => {
            buildForm().callInitBuild(JSON.parse(data));
            deleteChumpForm();
            duplicateChumpForm();
            editChumpForm();
        })

    }

    // Private functions
    const _collapse = function () {
        $("#accordion").accordion();

        $('.dest-list').sortable({
            update: function (e, ui) {
                pos = $('.dest-list').children().length;
            },
            start: function (event, ui) {
                ui.item.startPos = ui.item.index();
            },
            stop: function (event, ui) {
                const newPos = ui.item.index();
                const movedItem = dataForm.splice(ui.item.startPos, 1)[0];
                dataForm.splice(newPos, 0, movedItem);
                addDataForm(dataForm)
            }

        })
        $(".dest-list").disableSelection();
    };

    const dragstart = event => {
        $('.btn-drag').on('dragstart', function (event) {
            let type = $(this).attr('data-type');
            let text = $(this).attr('data-name');
            event.originalEvent.dataTransfer.setData('text', text);
            event.originalEvent.dataTransfer.setData('type', type);
        });
    };

    const drop = event => {
        $('.dest-list').on('drop', function (event) {
            event.preventDefault();
            let text = event.originalEvent.dataTransfer.getData('text');
            let type = event.originalEvent.dataTransfer.getData('type');

            dataForm.push(element[type][text]);
            addDataForm(dataForm)
        });
    };

    const dragover = event => {
        $('.dest-list').on('dragover', function (event) {
            event.preventDefault();
        });
    };


    const deleteChumpForm = function () {
        $('.delete-button').on('click', function (e) {

            const index = $(this).attr('data-index');
            console.log(index, dataForm);

            if (index > -1) { // only splice array when item is found
                dataForm.splice(index, 1); // 2nd parameter means remove one item only
            }

            addDataForm(dataForm)

        })
    }


    const duplicateChumpForm = function () {
        $('.duplicate-button').on('click', function (e) {

            const index = $(this).attr('data-index');

            dataForm.push(dataForm[index]);

            addDataForm(dataForm)

        })
    }

    const editChumpForm = function () {

        $('.edit-button').on('click', function (e) {
            e.stopPropagation()
            const name = $(this).attr('data-name');
            const index = $(this).attr('data-index');
            $('#overlay').addClass('display_block');
            $('#editFields').addClass('display_block')
            // buildForm().callInitEdit(index, dataForm)

            ajaxFunction().getViewEditField({'id': 1, 'name': name, 'index': index}).then(data => {
                buildForm().callInitEdit(name, data)
            })


        })

        function removeModal() {
            $('#overlay').removeClass('display_block');
            $('#editFields').removeClass('display_block');
        }

        $('.overlay').on('click', function (e) {
            removeModal()
        });

        $(document).on('click', '.close-edit-button', function (e) {
            removeModal()
        });

    }


    const editInputsForm = function () {

        $(document).on('keyup', '.input-edit-form', function (e) {
            const index = $(this).attr('data-index');
            const name = $(this).attr('name');
            const value = $(this).val();

            dataForm = dataForm[index].name
            console.log(dataForm,name, value)

            // $('#overlay').addClass('display_block');
            // $('#editFields').addClass('display_block')
            // // buildForm().callInitEdit(index, dataForm)
            //
            // ajaxFunction().getViewEditField({'id': 1, 'name': name, 'index': index}).then(data => {
            //     buildForm().callInitEdit(name, data)
            // })

        })
    }


    return {
        // Public functions
        init: function () {

            getDataForm().then(data => {
                deleteChumpForm();
                duplicateChumpForm();
                editChumpForm();
            });

            editInputsForm();
            _collapse();
            dragstart();
            drop();
            dragover();
        }
    };
}();

jQuery(document).ready(function () {
    creatForm.init();
});
