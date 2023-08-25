const EditingFunction = function () {

    const _initEditInputs = function (element) {
        return new Promise((resolve, reject) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/add-data-form",
                method: "POST",
                data: element,
                success: function (response) {
                    resolve(response.data);
                },
                error: function (error) {
                    console.log(error);
                    reject(error); // Reject the promise with the error
                }
            })
        });
    };

    return {
        // Public functions
        init: function () {
            _initEditInputs();
        },
    };
}
