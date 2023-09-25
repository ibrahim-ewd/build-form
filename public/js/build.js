const buildForm = function () {
    const _initActions = function (index, element) {
        let htmlActions = `
                                 <div class="buttons" >
                                    <button type="button"  data-index="${index}" class="delete-button btn-sm btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    <button type="button"  data-index="${index}" class="duplicate-button btn-sm btn btn-outline-success"><i class="fa-solid fa-clone"></i></button>
                                    <button type="button"  data-name="${element.name}"  data-toggle="modal" data-target="#myModal" data-index="${index}" class="edit-button btn btn-sm btn-outline-primary"><i class="fa-solid fa-gear"></i></button>
                                  </div>
                        `;
        return htmlActions;
    }

    const _initBuild = function (element) {
        let htmlBody = '';
        let helpField = ''

        $.each(element, (index, elements) => {
            let htmlRow = '';


            $.each(elements['champ'], (key, attr) => {
                let required = ''
                let inputsElement = ''
                let conditionLabel = '';

                if (attr.notice != undefined) {
                    helpField = `<small class="form-text text-muted" style="${attr.notic_style ?? ''}">${attr.notice}</small>`
                }

                if (attr.required == true) {
                    required = `<sub class="form-text text-danger"> *</sub>`
                }

                if (attr.visibility) {

                    if (attr.type == 'text') {

                        inputsElement += this.buildText(attr)

                    } else if (attr.type == 'select') {

                        inputsElement += this.buildSelect(attr);

                    } else if (attr.type === 'textarea') {
                        inputsElement += this.buildTextArea(attr);
                    } else {
                        inputsElement += `
                                    <input type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                     placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                   `;
                    }

                    if (attr.label && attr.label !== "") {
                        conditionLabel = `<label for="${attr.id}" style="${attr.label_style ?? ''}" class="form-label">${attr.label}${required}</label>`
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
        return true;
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
    this.buildSelect = (attr) => {
        let htmlOption = "";
        if (attr.placeholder !== '') {
            htmlOption = `<option value="">${attr.placeholder}</option>`
        }
        $.each(attr.element, (elementKey, elementValue) => {
            htmlOption += `<option value="${elementValue[0]}">${elementValue[1]}</option>`
        })
        return `<select type="${attr.type}"
                                     ${attr.required ? 'required' : ''}
                                     ${attr.readonly ? 'readonly' : ''}
                                      value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                      ${htmlOption}
                                      </select>`;
    }


    this.buildText = (attr) => {
        return `<div style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                    ${attr.value}  </div>`;
    }


    this.buildTextArea = (attr) => {
        return `<textarea type="${attr.type}"
                 ${attr.required ? 'required' : ''}
                 ${attr.readonly ? 'readonly' : ''}
                 placeholder="${attr.placeholder}"
                 style="${attr.style}" class="${attr.class}" id="${attr.id}">${attr.value}</textarea>`;;
    }


    return {
        // Public functions
        init: function () {
            _initBuild();
            _initEdit();
            _initActions();
        },
        // Expose _initBuild as a public function
        callInitBuild: function (element) {
            return _initBuild(element);
        },

        callInitActions: function (index, element) {
            return _initActions(index, element);
        },

        callInitEdit: function (index, element) {
            return _initEdit(index, element);
        }
    };
}
