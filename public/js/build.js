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
                                    <button type="button"  data-index="${index}" class="delete-button btn-sm btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    <button type="button"  data-index="${index}" class="duplicate-button btn-sm btn btn-outline-success"><i class="fa fa-clone"></i></button>
                                    <button type="button"  data-name="${element.name}" ${unique_edit}  data-toggle="modal" data-target="#myModal" data-index="${index}" class="edit-button btn btn-sm btn-outline-primary">
                                    <i class="fas fa-cog p-0"></i></button>
                                  </div>
                        `;
        return htmlActions;
    }


    const _initBuild = function (elementForm) {

        return new Promise((resolve, reject) => {
            let htmlBody = '';
            let helpField = ''
            try {


                $.each(elementForm, (index, elements) => {
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

                            } else if (attr.type === 'media') {
                                inputsElement += elementsBuild().buildMedias(elements, attr);

                            } else if (attr.type === 'textarea') {
                                inputsElement += elementsBuild().buildTextArea(elements, attr);

                            } else if (attr.type === "radio") {
                                inputsElement += elementsBuild().buildRadioInput(elements, attr);

                            } else if (attr.type === 'privacy') {
                                inputsElement += elementsBuild().buildPrivacyPolicy(elements, attr);

                            } else if (attr.type === 'checkbox') {
                                inputsElement += elementsBuild().buildCheckbox(elements, attr);

                            } else if (attr.type === 'date' || attr.type === 'time') {
                                inputsElement += elementsBuild().buildDate(elements, attr);

                            } else if (attr.type === 'signature') {
                                inputsElement += elementsBuild().buildSignature(elements, attr);

                            } else if (attr.type === 'satisfaction') {
                                inputsElement +=  elementsBuild().buildSatisfaction(elements, attr,index);

                            } else if (attr.type === 'import') {
                                inputsElement += elementsBuild().buildImportFile(elements, attr);

                            } else if (attr.type === 'recaptcha') {
                                inputsElement += elementsBuild().builRrecaptcha(elements, attr);

                            } else if (attr.type === 'separator') {
                                inputsElement += elementsBuild().buildSeparator(elements, attr);

                            } else if (attr.type === 'submit') {
                                inputsElement += elementsBuild().buildSubmit(elements, attr);

                            } else {
                                inputsElement += ``;
                            }

                            if (attr.label && attr.label !== "" && elements['display_labels'] === true) {

                                conditionLabel = `<label for="${attr.id}" style="${attr.label_style ? attr.label_style : ''}" class="form-label d-flex">${attr.label}${_required}</label>`

                            }


                            htmlRow += `<div class="${attr.class_group ? attr.class_group : 'col-6 mb-3'} ">
                                     ${conditionLabel}
                                    ${inputsElement}
                                    ${helpField}
                                 </div>`
                        }

                    });

                    let buildAction = "";
                    let fieldTitle = "";

                    if (PAGE_NAME === "builder") {
                        buildAction = `<span>${buildForm().callInitActions(index, elements)}</span>`;
                    }

                    if (elements.display_title === true || elements.champ['titre']) {
                        fieldTitle = `<h4>${elements['name']}</h4>`;
                    }

                    htmlBody += ` <div class="my-2 boder-dote-field fieldsForm">
                                    ${buildAction}
                                    ${fieldTitle}
                                <div class="row"> ${htmlRow} </div>
                           </div>`

                })
                $('.dest-list').html(htmlBody);
                resolve(true)
            } catch (e) {
                reject(e)
                console.log(e);
            }
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

    const fetchDataMedias = function (formId, field, index) {
        return new Promise((resolve, reject) => {

            resolve(ajaxFunction().getViewEditField({
                    'slug': formId,
                    'name': field,
                    'index': index,
                    'action': 'media'
                }).then(data => {
                    $('#wrap-list-media-edit').html(data);
                })
            )
        });
    }

    return {
        // Public functions
        init: function () {
            _initBuild().then(data => {
                console.log({data})
                afterBuildForm();
                previewsForm();
            }).catch((error) => {
                console.error(error); // "Operation failed."
            });
            _initEdit();

            _initActions();

        },
        // Expose _initBuild as a public function
        callInitBuild: function (element) {
            return _initBuild(element).then(data => {
                afterBuildForm();
                previewsForm();
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
        },

        fetchDataMedias: function (formId, field, index) {
            return fetchDataMedias(formId, field, index);
        },
    };
}
