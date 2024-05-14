const ajaxFunction = function () {

    const getDataForm = function (element) {
        return new Promise((resolve, reject) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/get-data-form",
                method: "GET",
                data: element,
                success: function (response) {
                    // let htmlBody = buildForm().callInitBuild(JSON.parse(response.data))
                    resolve(response.data);
                },
            })
        })
    };

    const getViewEditField = function (element) {

        return new Promise((resolve, reject) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/get-view-edit-field",
                method: "GET",
                data: element,
                success: function (response) {
                    resolve(response);
                },
            })
        })
    };
    const uploadImagesForm = function (element) {

        return new Promise((resolve, reject) => {
            // console.log();
            var formData = new FormData();
            formData.append('image', element['photo']);
            formData.append('name', element['name']);
            formData.append('dir', element['dir']);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/upload-images",
                method: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {

                    resolve(response);
                },
            })
        })
    };

    const deleteImagesForm = function (element) {

        return new Promise((resolve, reject) => {
            // console.log();
            var formData = new FormData();
            // formData.append('image', element['photo']);
            formData.append('type', element['type']);
            formData.append('name', element['name']);
            formData.append('dir', element['dir']);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/delete-images",
                method: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response) {
                    resolve(response);
                },
            })
        })
    };

    const _initAdd = function (element) {

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
                    reject(error); // Reject the promise with the error
                }
            })
        });
    };

    return {
        // Public functions
        init: function () {
            _initAdd();
            getDataForm();
            //getDataEditField();
        },
        // Expose _initBuild as a public function
        addData: function (element) {
            return _initAdd(element);
        },
        // Expose _initBuild as a public function
        getDataForm: function (element) {
            return getDataForm(element);
        },
        // Expose _initBuild as a public function
        getViewEditField: function (element) {
            return getViewEditField(element);
        },
        // Expose _initBuild as a public function
        uploadImagesForm: function (element) {
            return uploadImagesForm(element);
        },
        // Expose _initBuild as a public function
        deleteImagesForm: function (element) {
            return deleteImagesForm(element);
        },


    };
}
