/**
 * in Options the value is 1 and title is 0
 * @type {{init: creatForm.init}}
 */



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
        return new Promise((resolve, reject) => {


            let dataAjax = {
                'data': JSON.stringify(dataForm),
                'id': formId,
                'name': 'form one',
            }

            ajaxFunction().addData(dataAjax).then(data => {
                buildForm().callInitBuild(JSON.parse(data));
                deleteFieldForm();
                duplicateFieldForm();
                editFieldForm();
            })
            console.log(dataForm)
            resolve(true);
        })
    }

    // Private functions
    const _collapse = function () {
        $("#accordion").accordion();

        $('.sortable-element').sortable({
            update: function (e, ui) {
                pos = $('.sortable-element').children().length;
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


    const clickHandler = event => {
        $('.btn-drag').on('click', function (eve) {
            let type = $(this).attr('data-type');
            let text = $(this).attr('data-name');

            let newItem = {...element[type][text]};
            newItem.id = `${text}${Date.now()}${dataForm.length}`;
            dataForm.push(JSON.parse(JSON.stringify(newItem)));

            addDataForm(dataForm)
        });
    }
    const dragstart = event => {

        $('.btn-drag').on('dragstart', function (eve) {
            let type = $(this).attr('data-type');
            let text = $(this).attr('data-name');
            eve.originalEvent.dataTransfer.setData('text', text);
            eve.originalEvent.dataTransfer.setData('type', type);
        });

    };
    const drop = event => {
        $('.dest-list').on('drop', function (event) {
            event.preventDefault();
            let text = event.originalEvent.dataTransfer.getData('text');
            let type = event.originalEvent.dataTransfer.getData('type');
            let newItem = {...element[type][text]}
            newItem.id = `${text}${Date.now()}${dataForm.length}`;
            dataForm.push(JSON.parse(JSON.stringify(newItem)));
            addDataForm(dataForm)
        });
    };

    const dragover = event => {
        $('.dest-list').on('dragover', function (event) {
            event.preventDefault();
        });
    };


    const deleteFieldForm = () => {
        $('.delete-button').on('click', function (e) {

            const index = $(this).attr('data-index');
            const id = dataForm[index]['id'];


            if (index > -1) { // only splice array when item is found
                dataForm.splice(index, 1); // 2nd parameter means remove one item only
            }

            ajaxFunction().deleteImagesForm({
                // "photo":photo,
                "type": "folder",
                "dir": "image/forms/" + formId + "/" + id,
                // "name": $(this).parents('.row-change-image').find('.picture-src').attr('title')
            })
            addDataForm(dataForm)

        })
    }

    const duplicateFieldForm = function () {

        $('.duplicate-button').on('click', function (e) {
            const index = $(this).attr('data-index');
            const newData = JSON.parse(JSON.stringify(dataForm[index])); // Deep copy of the object
            dataForm.push(newData);
            addDataForm(dataForm);
        });
    }

    const editFieldForm = function () {

        return new Promise((resolve, reject) => {


            $('.edit-button').on('click', function (e) {
                e.stopPropagation()
                const name = $(this).attr('data-name');
                const index = $(this).attr('data-index');
                $('#overlay').addClass('display_block');
                $('#editFields').addClass('display_block')
                // buildForm().callInitEdit(index, dataForm)
                resolve(ajaxFunction().getViewEditField({'slug': formId, 'name': name, 'index': index})
                    .then(data => {
                        buildForm().callInitEdit(name, data)
                    }));
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

        });
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    const editSelectForm = function () {


        $(document).on('change', '.input-select-form', function (e) {
            e.preventDefault();
            const index = $(this).parents('.field-edit').attr('data-index');
            const name = $(this).attr('name');
            const champ = $(this).parents('.field-edit').attr('data-name');


            dataForm[index]['champ'][champ][name] = $(this).val();

            addDataForm(dataForm)
        })
    }

    const editFieldGlobal = function () {
        /**
         * to change Display labels of the Field
         */


        $(document).on('change', '.input-edit-form-global', function (e) {
            e.preventDefault();
            const index = $(this).parents('.field-edit').attr('data-index');
            const name = $(this).attr('name');

            dataForm[index][name] = $(this).val();


            if ($(this).attr('data-type') === 'boolean') {
                dataForm[index][name] = $(this).is(":checked")
            }


            if ($(this).attr('data-type') === 'boolean' || $(this).attr('type') === 'radio') {
                $(this).parents('.btn-group').find('.btn').removeClass('active')
                if ($(this).is(":checked") === true) {
                    $(this).parents('.btn').addClass('active')
                }
            }

            addDataForm(dataForm)
        })
    }

    const editInputsForm = function () {


        $(document).on('change', '.input-edit-form', function (e) {
            e.preventDefault();
            const index = $(this).parents('.field-edit').attr('data-index');
            const name = $(this).attr('name');
            const champ = $(this).parents('.field-edit').attr('data-name');

            dataForm[index]['champ'][champ][name] = $(this).val();

            if ($(this).attr('data-type') === 'boolean') {
                dataForm[index]['champ'][champ][name] = $(this).is(":checked")
            }

            if ($(this).attr('data-type') === 'boolean' || $(this).attr('type') === 'radio') {
                $(this).parents('.btn-group').find('.btn').removeClass('active')
                if ($(this).is(":checked") === true) {
                    $(this).parents('.btn').addClass('active')
                }
            }
            addDataForm(dataForm)
        })
    }


    const editOptions = function () {


        $(document).on('change', '.input-edit-option', function (e) {
            e.preventDefault();
            const index = $(this).parents('.field-edit').attr('data-index');
            const name = $(this).attr('name');
            const field = $(this).parents('.field-edit').attr('data-name');
            const indexOption = $(this).parents('.row-edit-option').attr('data-index-option');
            const isGlobal = $(this).attr('data-option-global');

            if ($(this).attr('required') === "required" && $(this).val() === "") {

                addDataForm(dataForm).then(data => {
                    setTimeout(() => {
                        ajaxFunction().getViewEditField({
                            'slug': formId,
                            'name': field,
                            'index': index,
                            'action': 'option'
                        }).then(data => {
                            $('#wrap-list-option-edit').html(data);
                        })

                    }, 100)
                })
                alert("this field must not be empty")
            } else {
                if (isGlobal && isGlobal === "size-image") {
                    $.each(dataForm[index]['champ'][field]['options'], function (ind,elem) {
                        console.log(ind,elem);
                        console.log($(this).val());
                        dataForm[index]['champ'][field]['options'][ind]['img']['size'] = $(this).val();
                    })
                } else {
                    dataForm[index]['champ'][field]['options'][indexOption][name] = $(this).val();
                }
                addDataForm(dataForm).then(data => {
                    setTimeout(() => {
                        ajaxFunction().getViewEditField({
                            'slug': formId,
                            'name': field,
                            'index': index,
                            'action': 'option'
                        }).then(data => {
                            $('#wrap-list-option-edit').html(data);
                        })

                    }, 100)
                })
            }
        })

        $(document).on("click", '.btnDeleteOption', function (e) {
            e.preventDefault();
            const index = $(this).parents('.field-edit').attr('data-index');

            const indexOption = $(this).parents('.row-edit-option').attr('data-index-option');
            const field = $(this).parents('.field-edit').attr('data-name');
            const imageName = $(this).parents('.row-edit-option').find(".image_icon_options").attr('alt');

            if (indexOption > -1) { // only splice array when item is found
                (dataForm[index]['champ'][field]['options']).splice(indexOption, 1); // 2nd parameter means remove one item only
            }

            if ((dataForm[index]['champ'][field]['options']).length === 0) {
                const defaultOption = {value: "option 1", title: "option 1", img: []};
                (dataForm[index]['champ'][field]['options']).push(defaultOption)
            }

            ajaxFunction().deleteImagesForm({
                "dir": "image/forms/" + formId + "/" + dataForm[index]['id'],
                "name": imageName
            }).then(data => {
                if (data['status'] !== 'success') {
                    console.error("error")
                }
            })
            addDataForm(dataForm).then(data => {
                setTimeout(() => {
                    ajaxFunction().getViewEditField({
                        'slug': formId,
                        'name': field,
                        'index': index,
                        'action': 'option'
                    }).then(data => {
                        $('#wrap-list-option-edit').html(data);
                    })

                }, 100)
            })
        })

        $(document).on("click", '.btn-options-plus', function (e) {
            e.preventDefault();
            const index = $(this).parents('.field-edit').attr('data-index');
            const field = $(this).parents('.field-edit').attr('data-name');

            let optinLength = (dataForm[index]['champ'][field]['options']).length;
            const defaultOption = {
                "title": "option " + (optinLength + 1),
                "value": "option " + (optinLength + 1),
                "img": {src: "", name: ""}
            };

            (dataForm[index]['champ'][field]['options']).push(JSON.parse(JSON.stringify(defaultOption)))

            addDataForm(dataForm).then(data => {

                setTimeout(() => {
                    ajaxFunction().getViewEditField({
                        'slug': formId,
                        'name': field,
                        'index': index,
                        'action': 'option'
                    }).then(data => {

                        $('#wrap-list-option-edit').html(data);
                    })
                }, 100)

            })
        })

        $(document).on("click", ".btnUploadImage", function (e) {
            e.preventDefault();
            const indexOption = $(this).parents('.row-edit-option').attr('data-index-option');

            $('.row-change-image').addClass("d-none")
            $('.row-change-image_' + indexOption).toggleClass("d-none")

        })

        $(document).on("change", ".upload-image-option", function (e) {
            e.preventDefault();

            const index = $(this).parents('.field-edit').attr('data-index');
            const indexOption = $(this).parents('.row-change-image').attr('data-index-option');
            const field = $(this).parents('.field-edit').attr('data-name');
            var photo = $(this).prop('files')[0];


            ajaxFunction().uploadImagesForm({
                "photo": photo,
                "dir": "image/forms/" + formId + "/" + dataForm[index]['id'],
                "name": $(this).parents('.picture-container').find('.picture-src').attr('title')
            }).then(data => {

                dataForm[index]['champ'][field]['options'][indexOption]["img"]["src"] = data.img
                dataForm[index]['champ'][field]['options'][indexOption]["img"]["name"] = data.name

                addDataForm(dataForm).then(dataF => {
                    setTimeout(() => {
                        ajaxFunction().getViewEditField({
                            'slug': formId,
                            'name': field,
                            'index': index,
                            'action': 'option'
                        }).then(dataHtml => {
                            $('#wrap-list-option-edit').html(dataHtml);

                        })

                    }, 100)
                })
            });

        })

        $(document).on("click", ".btnDeleteImageOption", function (e) {
            e.preventDefault();

            const index = $(this).parents('.field-edit').attr('data-index');
            const indexOption = $(this).parents('.row-change-image').attr('data-index-option');
            const field = $(this).parents('.field-edit').attr('data-name');
            // var photo = $(this).prop('files')[0];

            ajaxFunction().deleteImagesForm({
                // "photo":photo,
                "dir": "image/forms/" + formId + "/" + dataForm[index]['id'],
                "name": $(this).parents('.row-change-image').find('.picture-src').attr('title')
            }).then(data => {
                if (data['status'] == 'success') {

                    // (dataForm[index]['champ'][field]['options'][indexOption]).splice(2, 1);
                    dataForm[index]['champ'][field]['options'][indexOption]["img"]["src"] = ""
                    dataForm[index]['champ'][field]['options'][indexOption]["img"]["name"] = ""
                    addDataForm(dataForm).then(dataF => {
                        setTimeout(() => {
                            ajaxFunction().getViewEditField({
                                'slug': formId,
                                'name': field,
                                'index': index,
                                'action': 'option'
                            }).then(dataHtml => {
                                $('#wrap-list-option-edit').html(dataHtml);
                            })

                        }, 100)
                    })
                }
            });

        })
    }


    // const buildCkeditore = function () {
    //
    //     const editorElement = document.querySelector('#value_ckedit');
    //
    //     const editor = ClassicEditor
    //         .create(editorElement)
    //         .then(editor => {
    //             // Add an event listener for the "change:data" event
    //             editor.model.document.on('change:data', () => {
    //                 // This function will be called whenever the editor's content changes

    //                 const editorElement = editor.ui.view.element;
    //
    //                 // Retrieve the attributes
    //                 const name = editorElement;
    //                 const id = editorElement.getAttribute('id');
    //                 // const dataIndex = editorElement.getAttribute('data-index');
    //
    //             });
    //         })
    //         .catch(error => {
    //             console.error(error);
    //         });
    // }


    return {
        // Public functions
        init: function () {

            getDataForm().then(data => {
                deleteFieldForm();
                duplicateFieldForm();
                editFieldForm().then(data => {
                    // buildCkeditore();
                });
            });

            editInputsForm();
            editFieldGlobal();
            editSelectForm();
            editOptions();
            _collapse();
            dragstart();
            clickHandler();
            drop();
            dragover();
        }
    };
}();

jQuery(document).ready(function () {
    creatForm.init();
});
