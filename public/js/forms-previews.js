const previewsForm = function () {
    var dataForm = [];
    var hasError = 0;
    var dataImag = "";
    var currentTab = 0; // Current tab is set to be the first tab (0)


    ////////////////
    // change required by data-required to allow js validate form

    $('input[required]').removeAttr("required").attr("data-required", "true")
    $('select[required]').removeAttr("required").attr("data-required", "true")
    $('textarea[required]').removeAttr("required").attr("data-required", "true")

    ////////////////

    function regexTele(myInputs, i) {
        var phoneInternational = new RegExp('^[+]([0-9]{2}[\\ ]?){4,}[0-9]{1,2}$');
        var phoneNational = new RegExp('^([0-9]{2}[\\ ]?){4,}[0-9]{1,2}$');

        if ($(myInputs).eq(i).attr('data-condition') === 'international' && phoneInternational.test($(myInputs).eq(i).val()) === false) {
            errorDisplay('Le format correcte est (+0011223344556)', $(myInputs[i]))
            valid = false;
        }

        if (myInputs[i].getAttribute('data-condition') === 'national' && phoneNational.test($(myInputs).eq(i).val()) === false) {
            myInputs[i].className += " invalid";
            errorDisplay('Le format correcte est (112233445566)', $(myInputs[i]))
            valid = false;
        }

    }

    function validCheckbox(myInputs, i) {
        if ($(myInputs[i]).is(':checked') === false && $(myInputs[i]).attr('data-required') !== "false") {
            myInputs[i].className += " invalid";
            errorDisplay('Vous devez accepter les conditions.', $(myInputs[i]));
            $(myInputs).eq(i).parents('.form-group').append(`<!--<span class="text-danger error_Form">Attention, ce champ est requis.</span>-->`);
            return false;
        }
        return true;
    }


    function errorDisplay(_messag, _this) {
        _this.parents('.form-group').find('.error_Form').remove();
        _this.parents('.form-group').append(`<small class="text-danger error_Form">${_messag}</small>`);
        return hasError++;
    }


    function validateForm(submitting) {
        return new Promise((resolve, reject) => {

            var myForm, myInputs, i, valid = true;

            myForm = $(".fieldsForm");
            myInputs = $(myForm).find('.myInputs');


            for (i = 0; i < myInputs.length; i++) {

                if (myInputs[i].getAttribute('data-name') === 'reponsecourte' && $(myInputs[i]).val().length > myInputs[i].getAttribute('data-condition')) {
                    myInputs[i].className += " invalid";
                    errorDisplay('les données de format sont incorrectes ' + $(myInputs[i]).attr('data-condition') + ')', $(myInputs[i]))

                    valid = false;
                }


                if (myInputs[i].getAttribute('data-name') === 'paragraphe' && $(myInputs[i]).val().length > myInputs[i].getAttribute('data-condition')) {
                    myInputs[i].className += " invalid";
                    errorDisplay('les données de format sont incorrectes (max : ' + myInputs[i].getAttribute('data-condition') + ')', $(myInputs[i]))
                    valid = false;
                }

                if ($(myInputs[i]).attr('type') === "checkbox") {

                    valid = validCheckbox(myInputs, i)
                }


                if ($(myInputs[i]).attr('type') !== "checkbox" && $(myInputs[i]).val() === "" && myInputs[i].getAttribute('data-required') !== null && $(myInputs[i]).attr('data-required') !== "false") {
                    myInputs[i].className += " invalid";

                    errorDisplay('Attention, ce champ est requis.', $(myInputs[i]));
                    $(myInputs).eq(i).parents('.form-group').append(`<!--<span class="text-danger error_Form">Attention, ce champ est requis.</span>-->`);
                    valid = false;
                }

            }
            submitting = false;
            resolve(valid);

        })
    }

    var formData = [];
    let submitting = false;
    var list = [];

    function getSeparatorDate(date, dataMatch) {
        let elem = null;
        $.each(dataMatch, function (ind, ele) {
            if (date.match(ele) != null) {
                elem = ele;
            }
        })
        return elem

    }

    function editOptions() {
        if (PAGE_NAME === "previews") {

            $('.FormSaveData').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                $('.form-group').find('.error_Form').remove();

                validateForm(submitting).then(data => {

                    let da = "";
                    if (data === true) {
                        const d = $('.FormSaveData').serializeArray();
                        let sepa = "";
                        let hostName = "";
                        $.each(d, function (i, field) {
                            if (field.name.match('dateDropDown') == null && field.name.match('joined') == null) {
                                if (field.name.match('caseacocher') != null && field.value != null) {
                                    list[i] = field.value
                                    casec = field.name
                                }
                                formData[field.name] = field.value
                            } else {

                                da = $('input[name = "joined"]').attr('data-name') ?? "date//Date";
                                let _Date = $('input[name="joined"]').val()
                                _Date = _Date.replace("dd", $('select[name="dateDropDown[day]"]').val())
                                _Date = _Date.replace("mm", $('select[name="dateDropDown[month]"]').val())
                                _Date = _Date.replace("yyyy", $('select[name="dateDropDown[year]"]').val())
                                formData[da] = _Date;
                            }

                        });
                        // if (casec.match('caseacocher') != null) {
                        //     formData[casec] = (list)
                        // }

                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'), // Get the action URL from the form
                            data: {'data': Object.entries(formData)},
                            success: function (data) {
                                submitting = false;

                                if (data['status'] === '200') {

                                    $('.form_stepper').find('.progress_bar').css('width', '100%')

                                    if (data['type_notifiy'] === 'Text') {

                                        if ($(".sig").length != 0) {
                                            $(".sig").jSignature("reset")
                                        }
                                        $('.FormSaveData')[0].reset();
                                        $('.FormSaveData select').val(null).trigger('change');
                                        //$('.FormSaveData input[type="radio"]').val(null).trigger('change');

                                        $('.FormSaveData .itemsStarsremovecolor .fa').attr("style",'');
                                        sessionStorage.removeItem('satisfaction');
                                        notificationSide('alert-light-success active show', data['message'], 3000)
                                    } else {
                                        location.href = "/confirmation/" + data['id'];
                                    }

                                } else {
                                    notificationSide('alert-light-danger active show', 'Merci pour voutre contacte', 3000)
                                }
                            },
                            error: function (xhr) {
                                console.log('<p>An error occurred: ' + xhr.responseText + '</p>');
                            }
                        });
                    }
                    return false;
                })
            });
        }
        // if (PAGE_NAME === "previews") {
        //     var numberStep = $('#templates_v').find('.fieldsForm').length
        //     var casec = "";
        //
        //     if ($('.btn_Envoyer').attr('listener') !== 'yes') {
        //         $('.btn_Envoyer').attr('listener', 'yes');
        //         var submitting = false;
        //
        //         $('.btn_Envoyer').click(function (event) {
        //
        //             console.log("sdfdg")
        //             if (!validateForm(submitting)) return false;
        //
        //             if (submitting) {
        //                 return;
        //             }
        //             submitting = true;
        //
        //
        //             var list = [];
        //
        //
        //             var d = $('.FormSaveData').serializeArray();
        //
        //             return;
        //             let hostName = "";
        //             $.each(d, function (i, field) {
        //                 if (field.name.match('caseacocher') != null && field.value != null) {
        //                     list[i] = field.value
        //                     casec = field.name
        //                 }
        //                 dataForm[field.name] = field.value
        //             });
        //
        //             if (casec.match('caseacocher') != null) {
        //                 dataForm[casec] = (list)
        //             }
        //
        //             if ($('.joined').length != 0) {
        //                 chosseTypeDisplayDateSelect();
        //             }
        //
        //
        //             function resetData() {
        //                 $('input[type="radio"]').prop('checked', false);
        //                 sessionStorage.removeItem('satisfaction')
        //             }
        //
        //             resetData()
        //             console.log("00000000000")
        //             $.ajax({
        //                 url: $(".FormSaveData").attr('action'),
        //                 method: 'POST',
        //                 // data: formData,
        //                 data: {'data': Object.entries(dataForm), 'from_host': hostName},
        //                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        //
        //                 success: function (data) {
        //                     console.log(error)
        //                     submitting = false;
        //
        //                     if (data['status'] == '200') {
        //
        //                         $('.form_stepper').find('.progress_bar').css('width', '100%')
        //                         $('.NumberStep2').text(numberStep + "/" + numberStep)
        //
        //                         if (data['type_notifiy'] == 'Text') {
        //
        //                             $('.FormSaveData')[0].reset();
        //                             notificationSide('alert-light-success active show', data['message'], 3000)
        //
        //                         } else {
        //                             location.href = "/confirmation/" + data['id'];
        //                         }
        //
        //                     } else {
        //
        //                         notificationSide('alert-light-danger active show', 'Merci pour voutre contacte', 3000)
        //                     }
        //                 },
        //                 error: function (error) {
        //                     submitting = false;
        //                     console.log(error)
        //                     // rest of your error code here
        //                 }
        //             })
        //
        //         })
        //     }
        //
        //     setTimeout(() => {
        //         if ($('.joined').attr('required')) {
        //             $('.date_deroulante_Cl01').find('.form-control').attr("required", "true")
        //             $('.date_deroulante_Cl01').find('.form-control').addClass('myInputs')
        //         }
        //     }, 200)
        // }
    }


    function checkFile() {
        $(document).on('change', '.wf_upload_file_input', function (e) {
            thisFile = $(this)
            filesTOUpload = files = $(this.files)

            var names = ""
            var dataLength = $(thisFile).attr('data-length');
            var dataExtension = $(thisFile).attr('data-extension');
            var dataSize = $(thisFile).attr('data-size');
            var dataTitle = $(thisFile).attr('data-title');


            var Ext = dataExtension.replace(/ /g, "").split(',');

            var msg = "";
            var reader = "";
            var file = [];
            var uploadImage = [];

            if (files.length <= dataLength) {


                $.each(files, function (i, v) {

                    var n = i + 1;
                    var File = new FileReader();

                    if ($('.myInputs_importFile').find('input[name="import_file_each[]"]').length >= dataLength) {
                        $(thisFile).parents('.Element_importfichier').find('.error_Form').remove();
                        $(thisFile).parents('.Element_importfichier').append(`<span class="text-danger ml-3 error_Form">vous pouvez importer just ` + dataLength + ` fichier</span>`);
                        return false;
                    }
                    var bg = "";
                    File.onload = function (event) {

                        if ((event.target.result.split(';base64')[0]).split(':')[1] === 'text/csv') {
                            bg = "/media/bg/excel.png"

                        }
                        if ((event.target.result.split(';base64')[0]).split(':')[1] === 'application/pdf') {
                            bg = "/media/bg/pdf.png"
                        } else {
                            bg = event.target.result
                        }
                        var htmlImages = `
							<div class="dz-preview dz-processing dz-image-preview  dz-image-preview-${i} dz-success dz-complete">
							<div class="dz-image" style="background-image:
								url('${bg}');
								background-size: cover;background-position: center"></div>
							 <div class="dz-details">
							 <div class="dz-size">
							 <span data-dz-size="">${formatBytes(dataSize, decimals = 2)}</span>
							 </div>
							 <div class="dz-filename">
							 <span data-dz-name="">${files[i].name}</span>
							 </div>
							 </div>
                                        <span data-parent="${i}" class="dz-remove mt-3 text-danger">remove</span>
						      </div>`


                        $('.myInputs_importFile').append(htmlImages)


                        $('.dz-remove').click((r) => {
                            $(".myInputs_importFile").find('.dz-image-preview-' + $('.dz-remove').attr('data-parent')).remove();
                        })

                        $('<input/>').attr({
                            type: 'hidden',
                            name:  dataTitle + '//' + i,
                            class: 'import_file',
                            value: event.target.result,
                            id: 'img-' + n + '-val'
                        }).appendTo('.myInputs_importFile .dz-preview');
                    };
                    File.readAsDataURL(files[i]);

                    var extensionFile = files[i].type

                    if (files[i].size >= dataSize) {
                        msg += `<p class="m-0 p-0"> image ${i + 1} ne doit pas être plus grand que  ${formatBytes(dataSize, decimals = 2)} </p>`;
                    }

                    // if(jQuery.inArray(extensionFile,JSON.parse(Ext)) !== 0){
                    // 	msg += `<p class="m-0 p-0"> image ${i+1} il doit être un extension ( ${dataExtension} )</p>`;
                    // }
                })


                errorDisplay_(msg, $(thisFile));

            } else {
                $(thisFile).wrap('<form>').closest('form').get(0).reset()
                $(thisFile).unwrap();
                errorDisplay_('vous pouvez importer just  ' + $(thisFile).attr("data-length") + ' fichier', $(thisFile));
            }
        })

        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';

            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }

        function errorDisplay_(_messag, _this) {
            _this.parents('.child_importfichier').find('.error_Form').remove();
            _this.parents('.child_importfichier').append(`<span class="text-danger error_Form">${_messag}</span>`);
        }

    }

    $(document).ready(function () {
        editOptions();
        checkFile();
    });
}



