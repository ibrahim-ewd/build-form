
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

                    if (attr.notice != undefined) {
                        helpField = `<small class="form-text text-muted" style="${attr.notic_style ?? ''}">${attr.notice}</small>`
                    }

                    if (attr.required == true) {
                        _required = `<sub class="form-text text-danger"> *</sub>`
                    }

                    if (attr.visibility) {
                        if (attr.type == 'text') {

                            inputsElement += this.buildText(elements, attr)

                        } else if (attr.type == 'paragraph') {

                            inputsElement += this.buildParagraph(elements, attr)

                        } else if (attr.type == 'select') {

                            inputsElement += this.buildSelect(elements, attr);

                        } else if (attr.type === 'textarea') {
                            inputsElement += this.buildTextArea(elements, attr);
                        } else if ( attr.type === "radio") {
                            inputsElement += this.buildRadioInput(elements, attr);
                        } else if (attr.type === 'checkbox' ) {
                            inputsElement += this.buildCheckbox(elements, attr);
                        } else if (attr.type === 'date' || attr.type === 'time') {
                            inputsElement += this.buildDate(elements, attr);
                        } else {
                            inputsElement += `
                                   `;
                        }

                        if (attr.label && attr.label !== "" && elements['display_label'] === true) {

                            conditionLabel = `<label for="${attr.id}" style="${attr.label_style ?? ''}" class="form-label">${attr.label}${_required}</label>`

                        }


                        htmlRow += `<div class="${attr.class_group ?? 'col-6 mb-3'} ">
                                     ${conditionLabel}
                                    ${inputsElement}
                                    ${helpField}
                                 </div>
                                `

                    }

                });

                htmlBody += ` <div class="my-2">
                             <span>${buildForm().callInitActions(index, elements)}</span>
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


    // Champs for Building Form
    this.buildSelect = (elements, attr) => {
        const req = (elements['display_label'] == false && attr.required == true) ? "*" : '';
        let htmlOption = "";
        let dataPlaceholder = "";
        if (attr.placeholder !== '') {
            htmlOption = `<option></option>`
            dataPlaceholder = `data-placeholder="${attr.placeholder} ${req}"`;
        }
        $.each(attr.options, (elementKey, elementValue) => {
            let imgOption = ""

            if (elementValue["img"] && elementValue["img"]["src"] !== "") {

                imgOption = `src = "${elementValue["img"]["src"]}"`;
            }
            htmlOption += `<option value="${elementValue["value"]}" ${imgOption}>${elementValue["title"]}</option>`
        })


        return `<select type="${attr.type}"
                                     ${dataPlaceholder}
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                      value="${attr.value}" style="${attr.style}" class="select2 ${attr.class}" id="${attr.id}_${elements['id']}">
                                      ${htmlOption}
                                      </select>`;
    }


    this.buildText = (elements, attr) => {
        const req = (elements['display_label'] == false && attr.required == true) ? "*" : '';

        return `<input type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     placeholder="${attr.placeholder} ${req}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">
                                   `;
    }


    this.buildParagraph = (elements, attr) => {
        return `<div style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">
                                    ${attr.value}  </div> `;
    }


    this.buildTextArea = (elements, attr) => {
        return `<textarea type="${attr.type}"
                 ${attr.required ? 'required' : ''}
                 ${attr.readonly ? 'readonly' : ''}
                 placeholder="${attr.placeholder}"
                 style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">${attr.value}</textarea>`;
        ;
    }


    this.buildCheckbox = (elements, attr) => {
        let checkHtml = "";
        $.each(attr.options, (index, element) => {
            if (element["img"] && element["img"]["src"] !== "") {
                console.log(element)
                checkHtml += `
                <span class="check-list-item-img col-4 d-flex align-items-center">
                    <input type="${attr.type}" id="${attr.id + elements['id'] + index}"
                                    ${attr.required ? 'required' : ''}
                                    ${attr.readonly ? 'readonly' : ''}
                                    value="${element.value}"/>
                    <label for="${attr.id + elements['id'] + index}">
                    <img src="${hostName}/storage/${element["img"]["src"]}" class="image-item-checkbox" />

                    </label>
                    <label class="mx-2" for="${attr.id + elements['id'] + index}">${element.title}</label>
                  </span>
                `;

            }else {
                checkHtml += `
                    <span class="check-list-item col-4 d-flex align-items-center">
                        <label for="${attr.id + elements['id'] + index}">
                            <input type="${attr.type}"
                                 ${attr.required ? 'required' : ''}
                                 ${attr.readonly ? 'readonly' : ''}
                                 value="${element.value}"
                                 name="${element.value}"
                                 style="${attr.style}" class="${attr.class}" id="${attr.id + elements['id'] + index}" />
                            <span class="mx-2">${element.title}</span>
                        </label>
                    </span>`;
            }
        })
        return  `<div class="check-list-warp row">${checkHtml}</div>`;
    }


    this.buildRadioInput = (elements, attr) => {
        let checkHtml = "";
        $.each(attr.options, (index, element) => {
            if (element["img"] && element["img"]["src"] !== "") {
                console.log(element)
                checkHtml += `
                <span class="check-list-item-img col-4 d-flex align-items-center">
                    <input type="${attr.type}" id="${attr.id + elements['id'] + index}"
                                    ${attr.required ? 'required' : ''}
                                    ${attr.readonly ? 'readonly' : ''}
                                     name="${attr.name}_${element['id']}"
                                    value="${element.value}"/>
                    <label for="${attr.id + elements['id'] + index}">
                    <img src="${hostName}/storage/${element["img"]["src"]}" class="image-item-checkbox" />

                    </label>
                    <label class="mx-2" for="${attr.id + elements['id'] + index}">${element.title}</label>
                  </span>
                `;

            }else {
                checkHtml += `
                    <span class="check-list-item col-4 d-flex align-items-center">
                        <label for="${attr.id + elements['id'] + index}">
                            <input type="${attr.type}"
                                 ${attr.required ? 'required' : ''}
                                 ${attr.readonly ? 'readonly' : ''}
                                 value="${element.value}"
                                 name="${attr.name}_${elements['id']}"
                                 style="${attr.style}" class="${attr.class}" id="${attr.id + elements['id'] + index}" />
                            <span class="mx-2">${element.title}</span>
                        </label>
                    </span>`;
            }
        })
        return  `<div class="check-list-warp row">${checkHtml}</div>`;
    }

    this.buildDate = (elements, attr) => {
        let buildInput = "";

        const _input = `<input type="text"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     data-format=" ${attr.format_date ?? ''}"

                                     placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}_${elements['id']}">
                                   `;

        if (attr.type == "time") {
            buildInput += `	<div class="input-group timepicker">
                                ${_input}
                                    <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>

                              </div>`
        } else {
            buildInput += `<div class="input-group date datepicker">
                                    ${_input}
                                 <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>

                              </div>`
        }
        return buildInput;
    }

    this.buildTime = (attr) => {
        return `<input type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     data-format=" ${attr.format_date ?? ''}"
                                     placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                   `;
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
        }
    };
}
