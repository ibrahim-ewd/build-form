const buildForm = function () {
    const _initActions = function (element) {
        let htmlActions = `
                                 <div class="" >
                                    <button  data-index="${element}">Edit</button>
                                  </div>
                        `;
        return htmlActions;
    }
    const _initBuild = function (element) {
        let htmlBody = '';


        $.each(element,(index,elements)=>{
            let htmlRow = '';
            $.each(elements['champ'],(key,attr)=>{
                htmlRow += `
                                 <div class="col-6 mb-3">
                                    <label for="${attr.id}" class="form-label">${key}</label>
                                    <input type="${attr.type}" placeholder="${attr.placeholder}" value="${attr.value}" style="${attr.style}" class="${attr.class}" id="${attr.id}">
                                 </div>
                        `;
            });
            htmlBody += ` <fieldset>
                             <legend>${buildForm().callInitActions(index)}</legend>
                                <div class="row">${htmlRow} </div>
                           </fieldset>`

        } )

        return htmlBody;
    };

    return {
        // Public functions
        init: function () {
            _initBuild();
            _initActions();
        },
        // Expose _initBuild as a public function
        callInitBuild: function (element) {
           return _initBuild(element);
        },
        callInitActions: function (element) {
           return _initActions(element);
        }
    };
}
