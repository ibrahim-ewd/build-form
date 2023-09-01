const creatForm = function () {

    let dataForm = [];
    var urlParams = new URLSearchParams(window.location.search);

    let formId = urlParams.get('form');

    const getDataForm = function () {

        return new Promise((resolve, reject) => {
            resolve(
                ajaxFunction().getDataForm({slug: formId}).then(data => {

                    buildForm().callInitBuild(data ? JSON.parse(data) : []);
                    dataForm = data ? JSON.parse(data) : [];
                })
            )
        })
    }

    const addDataForm = function (dataForm) {

        let dataAjax = {
            'data': JSON.stringify(dataForm),
            'id': formId,
            'name': 'form one',
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


    const deleteChumpForm = () => {
        $('.delete-button').on('click', function (e) {

            const index = $(this).attr('data-index');

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

            ajaxFunction().getViewEditField({'slug': formId, 'name': name, 'index': index}).then(data => {
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

        $(document).on('change', '.input-edit-form', function (e) {

            const index = $(this).parents('.field-edit').attr('data-index');
            const name = $(this).attr('name');
            const champ = $(this).parents('.field-edit').attr('data-name');


            dataForm[index]['champ'][champ][name] = $(this).val();

            if ($(this).attr('data-type') == 'boolean') {
                dataForm[index]['champ'][champ][name] = $(this).is(":checked")
            }


            if ($(this).attr('data-type') == 'boolean' || $(this).attr('type') == 'radio') {
                $(this).parents('.btn-group').find('.btn').removeClass('active')
                if ($(this).is(":checked") == true) {
                    $(this).parents('.btn').addClass('active')
                }
            }

            console.log(dataForm[index]['champ']['visibility'])
            if ($(this).attr('name') == "visibility") {

                let precedingKey = "";
                let advancedKey = "";
                let advancedReplace = "";
                let precedingReplace = "";

                const keys = Object.keys(dataForm[index]['champ']);
                const currentIndex_ = keys.indexOf(champ);


                advancedKey = keys[currentIndex_ + 1];
                precedingKey = keys[currentIndex_ - 1];

                if (dataForm[index]['champ'][advancedKey] != undefined && dataForm[index]['champ'][precedingKey] != undefined) {

                    let advancedClass = dataForm[index]['champ'][advancedKey]['class_group']
                    let precedingClass = dataForm[index]['champ'][precedingKey]['class_group']

                    if (currentIndex_ % 2 === 0) {

                        //++++++++++++++++++
                        advancedReplace = advancedClass.replace("col-6", "col-12");
                        precedingReplace = precedingClass.replace("col-12", "col-6");
                    } else {

                        //-----------------
                        advancedReplace = advancedClass.replace("col-12", "col-6");
                        precedingReplace = precedingClass.replace("col-6", "col-12");
                    }

                    dataForm[index]['champ'][advancedKey]['class_group'] = advancedReplace
                    dataForm[index]['champ'][precedingKey]['class_group'] = precedingReplace
                }
            }

            addDataForm(dataForm)
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
