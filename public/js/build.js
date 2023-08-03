const buildForm = function () {
    const _initBuild = function (element) {
        let htmlBody = '';

        $.each(element,(index,elements)=>{
            $.each(elements['champ'],(key,attr)=>{
                console.log(attr);

                // htmlChamps +=
            });



            htmlBody += `
                <div class="row">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">${element.name}</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                     </div>
                </div>
            `;
        } )

        return htmlBody;
    };

    return {
        // Public functions
        init: function () {
            _initBuild();
        },
        // Expose _initBuild as a public function
        callInitBuild: function (element) {
           return _initBuild(element);
        }
    };
}
