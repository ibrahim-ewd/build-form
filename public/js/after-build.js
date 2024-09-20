const afterBuildForm = function () {

    var defaults = {
        calendarWeeks: true,
        // showClear: true,
        // showClose: true,
        allowInputToggle: true,
        showMeridian: true,
        useCurrent: false,
        ignoreReadonly: true,
        toolbarPlacement: 'auto',
        defaultDate: new Date(),
        locale: 'fr',
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down',
            previous: 'fa fa-angle-left',
            next: 'fa fa-angle-right',
            today: 'fa fa-dot-circle-o',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        }
    };

    $(function () {
        var optionsDatetime = $.extend({}, defaults, {format: 'DD-MM-YYYY HH:mm'});
        var optionsDate = $.extend({}, defaults, {format: 'DD-MM-YYYY'});
        var optionsTime = $.extend({}, defaults, {format: 'HH:mm', showMeridian: false,});

        let format = $('.datepicker').attr('data-format');
        let formatInputmask = $('.kt_inputmask').attr('data-format');

        $('.datepicker').datepicker({
            rtl: KTUtil.isRTL(),
            calendarWeeks: false,
            todayHighlight: true,
            orientation: "auto",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
            format: format,
            language: "fr"
        });
        let mastFormat = "99/99/9999"
        switch (formatInputmask) {
            case 'dd/mm/yyyy':
            case 'mm/dd/yyyy':
                mastFormat = "99/99/9999";
                break;
            case 'dd-mm-yyyy':
            case 'mm-dd-yyyy':
                mastFormat = "99-99-9999";
                break;
            case 'dd.mm.yyyy':
            case 'mm.dd.yyyy':
                mastFormat = "99.99.9999";
                break;
            default:
                mastFormat = "99/99/9999";
        }
        $(".kt_inputmask").inputmask(mastFormat, {
            "placeholder": formatInputmask,
            autoUnmask: false
        });


        $('.timepicker').timepicker(optionsTime);
        $('.datetimepicker').datetimepicker(optionsDatetime);
    });

    function formatOption(option) {
        let optionWithImage;
        if (!option.id) {
            return option.text;
        }
        const imageUrl = '/storage/' + option.element.getAttribute('src');

        if (option.element.getAttribute('src')) {
            optionWithImage = $(
                '<span><img src="' + imageUrl + '" style="width: 25px;height: 25px ;margin-right: 10px" class="picture-sm img-flag" /> ' + option.text + '</span>'
            );
        } else {
            optionWithImage = $(
                '<span>' + option.text + '</span>'
            );
        }
        return optionWithImage;
    }

    function signature() {
        if ($(".sig") && PAGE_NAME == "previews") {
            $sigdiv = $(".sig").jSignature({
                lineWidth: 2,
                showLine: true,
                width: '100%',
                height: 250
            })
            var datapair = $sigdiv.jSignature("getData", "svgbase64")
            if (datapair !== undefined) {
                var i = new Image()
                i.src = "data:" + datapair[0] + "," + datapair[1]
                $sigdiv.bind('change', function (e) {
                    var dataToBeSaved = $sigdiv.jSignature("getData", "image");
                    $(this).parents(".form-group").find('.signatureArea').val("data:" + dataToBeSaved[0] + "," + dataToBeSaved[1])
                })

                $('#clear').click(function () {
                    $sigdiv.jSignature("reset")
                })


            }

        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($('.select_datebuild').length !== 0) {
        function getDaysInMonth(year, month) {
            month = parseInt(month, 10) + 1;
            var temp = new Date(year + "/" + month + "/1");
            return new Date(temp - 1).getDate();
        }

        function getYears(startYear, num) {
            var allYears = [];
            for (var i = 0; i < num; i++) {
                var theYear = startYear - i;
                allYears.push(theYear);
            }
            return allYears;
        }

        function datelize(year_select_id, month_select_id, date_select_id) {
            var now = new Date();
            var thisYear = now.getFullYear();
            var thisMonth = now.getMonth() + 1;
            var today = now.getDate();
            //
            var year_select = $('#' + year_select_id);
            var month_select = $('#' + month_select_id);
            var date_select = $('#' + date_select_id);
            //year
            var years = getYears(thisYear, 100);
            for (var y = 0; y < years.length; y++) {
                var year = years[y]
                year_select.get(0).options.add(new Option(year, year));
            }
            //month
            for (var m = 1; m <= 12; m++) {
                var optionm = new Option(m, m);
                if (m === thisMonth) {
                    optionm.selected = true;
                }
                month_select.get(0).options.add(optionm);
            }
            //date
            var days_in_month = getDaysInMonth(thisYear, thisMonth);
            for (var i = 1; i <= days_in_month; i++) {
                var option = new Option(i, i);
                if (i === today) {
                    option.selected = true;
                }
                date_select.get(0).options.add(option);
            }

            //change event
            year_select.change(function () {
                month_select.change();
            });
            month_select.change(function () {
                //current year month date
                var year = year_select.val();
                var month = month_select.val();
                var date = date_select.val();
                //clear date_select
                var days_in_month = getDaysInMonth(year, month);
                //reset date_select
                date_select.get(0).options.length = 0;
                var selected = false;
                for (var i = 1; i <= days_in_month; i++) {
                    var option = new Option(i, i);
                    if (i === parseInt(date)) {
                        option.selected = true;
                        selected = true;
                    }
                    date_select.get(0).options.add(option);
                }
                if (selected === false) {
                    var len = date_select.get(0).options.length;
                    var lastOption = date_select.get(0).options[len - 1];
                    lastOption.selected = true;

                }
            });
        }

        datelize('year', 'month', 'date');
    }

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($('.emojy_form_star')) {


        $('.emojy_form_star').hover(function () {
            var index__ = $(this).attr('data-index');

            $('.child_satisfaction').eq(index__).find('.emojy_form_star').css('color', "#B5B5C3")
            for (var i = 0; i <= $(this).attr('data-order') - 1; i++) {
                $('.child_satisfaction').eq(index__).find('.emojy_form_star').eq(i).css('color', "#ffb900")
            }
        })

        $('.emojy_form_star').mouseleave(function () {
            const index__ = $(this).parent().find('.emojy_form_star').attr('data-index');
            const dataStorage = sessionStorage.getItem('satisfaction');
            if ($(this).parents('.child_satisfaction').find('.myInput_Statisfaction').is(':checked') == false) {
                $('.child_satisfaction').eq(index__).find('.emojy_form_star').css('color', "#B5B5C3")
            } else {
                if (dataStorage && dataStorage.split('/')[1] === index__) {
                    $('.child_satisfaction').eq(index__).find('.emojy_form_star').css('color', "#B5B5C3")
                    for (var i = 0; i <= dataStorage.split('/')[0] - 1; i++) {
                        $('.child_satisfaction').eq(index__).find('.emojy_form_star').eq(i).css('color', "#ffb900")
                    }
                }
            }
        })

        $('.myInput_Statisfaction').change(function () {

            var index__ = $(this).parent().find('.emojy_form_star').attr('data-index');
            var value__ = $(this).val().split('/')[1];

            sessionStorage.setItem('satisfaction', value__ + '/' + index__);
            for (var i = 0; i <= value__ - 1; i++) {
                $('.child_satisfaction').eq(index__).find('.emojy_form_star').eq(i).css('color', "#ffb900")
            }
            console.log(sessionStorage.getItem('satisfaction'))
        })

    }


// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(document).ready(function () {
            signature()
            $('.select2').select2({
                theme: "bootstrap-5",
                allowClear: true,
                templateResult: formatOption,
                templateSelection: formatOption,

                minimumResultsForSearch: Infinity,
            });


        }
    );


}
