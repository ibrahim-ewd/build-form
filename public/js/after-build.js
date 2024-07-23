const afterBuildForm = function () {
    var defaults = {
        calendarWeeks: true,
        // showClear: true,
        // showClose: true,
        allowInputToggle: true,
        useCurrent: false,
        ignoreReadonly: true,
        toolbarPlacement: 'top',
        defaultDate: new Date(),
        locale: 'en',
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
        var optionsTime = $.extend({}, defaults, {format: 'HH:mm'});

        $('.datepicker').datetimepicker(optionsDate);
        $('.timepicker').datetimepicker(optionsTime);
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

    $(document).ready(function () {
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
