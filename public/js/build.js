const buildForm = function () {
    const _initActions = function (index, element) {
        let htmlActions = `
                                 <div class="buttons" >
                                    <button type="button"  data-index="${index}" class="delete-button btn-sm btn btn-outline-danger">d</button>
                                    <button type="button"  data-index="${index}" class="duplicate-button btn-sm btn btn-outline-success">d</button>
                                    <button type="button"  data-name="${element.name}"  data-toggle="modal" data-target="#myModal" data-index="${index}" class="edit-button btn btn-sm btn-outline-primary">e</button>
                                  </div>
                        `;
        return htmlActions;
    }
    const _initBuild = function (element) {
        let htmlBody = '';


        $.each(element, (index, elements) => {
            let htmlRow = '';
            $.each(elements['champ'], (key, attr) => {
                htmlRow += `<div class="col-6 mb-3">
                                    <label for="${attr.id}" class="form-label">${attr.label}</label>
                                    <input type="${attr.type}" placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                 </div>`;
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
