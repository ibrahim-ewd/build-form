const buildForm = function () {
    const _initActions = function (index,element) {
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


        $.each(element,(index,elements)=>{
            let htmlRow = '';
            $.each(elements['champ'], (key, attr) => {
                htmlRow += `<div class="col-6 mb-3">
                                    <label for="${attr.id}" class="form-label">${key}</label>
                                    <input type="${attr.type}" placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                 </div>`;
            });

            htmlBody += ` <div class="my-2">
                             <span>${buildForm().callInitActions(index,elements)}</span>
                                <div class="row"> ${htmlRow} </div>
                           </div>`

        } )

        $('.dest-list').html(htmlBody);
        return true;
    };

    const _initEdit = function (element) {

            let htmlBody = `	<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Left Sidebar</h4>
				</div>

				<div class="modal-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</p>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->`


        $('.editFields').html(htmlBody);
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

        callInitActions: function (index,element) {
            return _initActions(index,element);
        },

        callInitEdit: function (index,element) {
            return _initEdit(index,element);
        }
    };
}
