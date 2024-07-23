const loc = $(location).attr("origin");
const hostName = $(location).attr("origin");

const buildForm = function () {
    const _initActions = function (index, element) {
        let unique_edit = "";

        if (element.unique_edit === true) {
            unique_edit = "data-unique-edit='true'"
        }
        let htmlActions = `
                                 <div class="buttons" >
                                    <button type="button"  data-index="${index}" class="delete-button btn-sm btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    <button type="button"  data-index="${index}" class="duplicate-button btn-sm btn btn-outline-success"><i class="fa-solid fa-clone"></i></button>
                                    <button type="button"  data-name="${element.name}" ${unique_edit}  data-toggle="modal" data-target="#myModal" data-index="${index}" class="edit-button btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-gear"></i></button>
                                  </div>
                        `;
        return htmlActions;
    }

    const _initBuild = function (element) {
        return new Promise((resolve, reject) => {
            let htmlBody = '';
            let helpField = ''

            $.each(element, (index, elements) => {
                let htmlRow = '';


                $.each(elements['champ'], (key, attr) => {
                    let _required = ''
                    let inputsElement = ''
                    let conditionLabel = '';

                    if (attr.notice !== undefined) {
                        helpField = `<small class="form-text text-muted" style="${attr.notic_style ?? ''}">${attr.notice}</small>`
                    }

                    if (attr.required === true) {
                        _required = `<sub class="form-text text-danger"> *</sub>`
                    }

                    if (attr.visibility) {

                        if (attr.type === 'text') {
                            inputsElement += elementsBuild().buildText(elements, attr)
                        } else if (attr.type === 'paragraph') {
                            inputsElement += elementsBuild().buildParagraph(elements, attr)
                        } else if (attr.type === 'select') {
                            inputsElement += elementsBuild().buildSelect(elements, attr);
                        } else if (attr.type === 'textarea') {
                            inputsElement += elementsBuild().buildTextArea(elements, attr);
                        } else if (attr.type === "radio") {
                            inputsElement += elementsBuild().buildRadioInput(elements, attr);
                        } else if (attr.type === 'checkbox') {
                            inputsElement += elementsBuild().buildCheckbox(elements, attr);
                        } else if (attr.type === 'date' || attr.type === 'time') {
                            inputsElement += elementsBuild().buildDate(elements, attr);
                        } else if (attr.type === 'satisfaction') {
                            inputsElement += elementsBuild().buildSatisfaction(elements, attr);
                        } else {
                            inputsElement += ``;
                        }

                        if (attr.label && attr.label !== "" && elements['display_labels'] === true) {

                            conditionLabel = `<label for="${attr.id}" style="${attr.label_style ?? ''}" class="form-label">${attr.label}${_required}</label>`

                        }


                        htmlRow += `<div class="${attr.class_group ?? 'col-6 mb-3'} ">
                                     ${conditionLabel}
                                    ${inputsElement}
                                    ${helpField}
                                 </div>`
                    }

                });

                let buildAction = "";
                if ($(location).attr('pathname') === "/form/build") {
                    buildAction = `<span>${buildForm().callInitActions(index, elements)}</span>`;
                }

                htmlBody += ` <div class="my-2 boder-dote-field">
                                ${buildAction}
                                <h4>${elements['name']}</h4>
                                <div class="row"> ${htmlRow} </div>
                           </div>`

            })
            $('.dest-list').html(htmlBody);
            resolve(true)
        })


    };

    const _initEdit = function (index, element) {

        let htmlBody = `<div class="contain-modal">
		    <div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="field-name">${index}</h4>
					<span class="btn btn-outline-danger close-edit-button">&times;</span>
				</div>

				<div class="modal-body mt-5">
					${element}
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->`

        $('#editFields').html(htmlBody);
        return true;
    };


    const fetchDataEdit = function (formId, field, index) {
        return new Promise((resolve, reject) => {
            resolve(ajaxFunction().getViewEditField({'slug': formId, 'name': field, 'index': index})
                .then(data => {
                    buildForm().callInitEdit(field, data)
                })
            );
        });
    }

    const fetchDataOptions = function (formId, field, index) {
        return new Promise((resolve, reject) => {

            resolve(ajaxFunction().getViewEditField({
                    'slug': formId,
                    'name': field,
                    'index': index,
                    'action': 'option'
                }).then(data => {
                    $('#wrap-list-option-edit').html(data);
                })
            )
        });
    }

    return {
        // Public functions
        init: function () {
            _initBuild().then(data => {
                afterBuildForm();
            });
            _initEdit();

            _initActions();

        },
        // Expose _initBuild as a public function
        callInitBuild: function (element) {
            return _initBuild(element).then(data => {
                afterBuildForm();
            });
        },

        callInitActions: function (index, element) {

            return _initActions(index, element);

        },

        callInitEdit: function (index, element) {
            return _initEdit(index, element);
        },

        fetchDataEdit: function (formId, field, index) {
            return fetchDataEdit(formId, field, index);
        },

        fetchDataOptions: function (formId, field, index) {
            return fetchDataOptions(formId, field, index);
        }
    };
}
