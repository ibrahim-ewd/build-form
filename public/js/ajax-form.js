const ajaxFunction = function () {

    const getDataForm = function (element) {
        return new Promise((resolve, reject) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: URLGETDATAFORM,
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
                url: URL_GET_VIEWEDIT,
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
                url: URL_UPLOAD_IMAGE,
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
                url: URL_DELETE_IMAGE,
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
                url: URL_ADD_DATAFORM,
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

    const _initDataFormJson = function () {

        return new Promise((resolve, reject) => {
                $.ajax({
                    url: URL_FIlE_DATAINIT_JSON,
                    dataType: 'json',
                    success: function (data) {
                        resolve(data.data_form);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('Error fetching JSON data:', errorThrown);
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
        _initDataFormJson: async function () {
            return await _initDataFormJson();
        },
        // Expose _initBuild as a public function
        deleteImagesForm: function (element) {
            return deleteImagesForm(element);
        },


    };
}
