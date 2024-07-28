(function ($) {
    $(document).ready(function () {
        var savedValue = [109,73];
        // Select all elements with class 'dnxte-pp-sub-sel'
        var dnxteElements = $('.dnxte-pp-sub-sel');

        // Bind a change event handler to the selected elements
        dnxteElements.on('change', function() {
            // Your code to handle the change event here
            // console.log($(this).val()); // Example: Log the selected value
            let data_id = this.dataset.id;
            // console.log(data_id);
            let page_name = $(this).val();
            // console.log(page_name);
            if('sitewide' == page_name){
                $(`.dnxte-multiple-select-sitearea${data_id}`).addClass('dnxte-hide');
            }else{
                $(`.dnxte-multiple-select-sitearea${data_id}`).removeClass('dnxte-hide');
            }
            // $(`.dnxte-condition-render${data_id}`).select2();
            $(`.dnxte-condition-render${data_id}`).select2({
                ajax: {
                    url: ajaxurl, // AJAX URL is predefined in WordPress admin
                    dataType: 'json',
                    method: 'POST',
                    delay: 250, // delay in ms while typing when to perform a AJAX search
                    data: function (params) {
                        // console.log(params);
                        return {
                            q: params?.term,
                            select_page: page_name,
                            json: 1,
                            action: 'get_post_sitearea' // AJAX action for admin-ajax.php
                        };
                    },
                    processResults: function (data) {
                        // console.log(data);
                        var options = [];
                        if (data) {
// console.log(data)
                            // data is the array of arrays, and each of them contains ID and the Label of the option
                            $.each(data.items, function (index, text) { // do not forget that "index" is just auto incremented value
                                // console.log(text)
                                options.push({id: text.id, text: text.post_title});
                            });
                        }
                        return {
                            results: options
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1 // the minimum of symbols to input before perform a search
            });
        });

        // Trigger the change event on all elements with class 'dnxte-pp-sub-sel'
        dnxteElements.trigger('change');
        // $(`.dnxte-condition-render0`).select2();
        var display_id = display_sitearea_obj.condition_count;
        // console.log(display_id);
        $(".cs-wp-color-picker").wpColorPicker();
        $(".dnxte-datetime-input").datetimepicker();
        // $(".dnxte-list-exceptionpages").select2();
        selectedOption = $("#dnxte_sub_set_sitearea_settings").find(":selected").val();

        toggleDataVisibility($('#dnxte_sitearea_at_pages'));

        // On change event
        $('#dnxte_sitearea_at_pages').on('change', function () {
            toggleDataVisibility($(this));
        });

        $("#dnxte-sitearea-add-button").on('click', function () {
            // Select the existing <select> elements by their IDs.
            var dnste_json_decode = JSON.parse(display_sitearea_obj.dnxte_post_type);
            // console.log(dnste_json_decode);
            var option_val = $.map(dnste_json_decode, function (val, i) {
                return '<option value="' + i + '">' + val + '</option>';
            }).join(", ");

            // var select_value =  dnste_json_decode.map((item,value)=>{
            //     console.log(item);
            // })

            // console.log(option_val.replace(',', ''));

            var base_row = '<div class="dnxte_pp-sub dnxte_pp-sub' + display_id + '">'
                + '<div class= "type" >'
                + '<select class = "include" name="dnxte_config_display[' + display_id + '][display_condition]">'
                + '<option value = "include" > Include </option>'
                + '<option value="exclude"> Exclude</option>'
                + '</select>'
                + '</div>'
                + '<div class="dnxte-post-type">'
                + '<select data-id=' + display_id + ' class="dnxte-pp-sub-sel" name="dnxte_config_display[' + display_id + '][display_config_post_type]">'
                + option_val
                + '</select>'
                + '</div>'
                + '<div class="dnxte-ppro-multiple-select dnxte-hide dnxte-multiple-select-sitearea' + display_id + '">'
                + '<select multiple="multiple" name="dnxte_config_display[' + display_id + '][dnxte_display_page][]" class="dnxte-condition-render dnxte-condition-render' + display_id + '" data-select2-id=' + display_id + '>'
                +'<option value="" selected="selected">all</option>'
                +'</select>'
                + '</div>'
                + '<span class="dashicons dashicons-trash dnxte-remove-row"></span>'
                + '</div>';
            display_id++
            $(".dnxte-sitearea").append(base_row)
            // Append the existing <select> elements to the container.
        });

        $(".dnxte-sitearea").on('click', '.dnxte-remove-row', function (e) {
            e.preventDefault();
            $(this).closest('.dnxte_pp-sub').remove();
        });

        $(this).on('change', '.dnxte-pp-sub-sel', function () {
            let data_id = this.dataset.id;
            // console.log(data_id);
            let page_name = this.value;
            // console.log(page_name);
            if('sitewide' == page_name){
                $(`.dnxte-multiple-select-sitearea${data_id}`).addClass('dnxte-hide');
            }else{
                $(`.dnxte-multiple-select-sitearea${data_id}`).removeClass('dnxte-hide');
            }
            $(`.dnxte-condition-render${data_id}`).select2();
            $(`.dnxte-condition-render${data_id}`).select2({
                ajax: {
                    url: ajaxurl, // AJAX URL is predefined in WordPress admin
                    dataType: 'json',
                    method: 'POST',
                    delay: 250, // delay in ms while typing when to perform a AJAX search
                    data: function (params) {
                        // console.log(params);
                        return {
                            q: params?.term,
                            select_page: page_name,
                            json: 1,
                            action: 'get_post_sitearea' // AJAX action for admin-ajax.php
                        };
                    },
                    processResults: function (data) {
                        // console.log(data);
                        var options = [];
                        if (data) {
// console.log(data)
                            // data is the array of arrays, and each of them contains ID and the Label of the option
                            $.each(data.items, function (index, text) { // do not forget that "index" is just auto incremented value
                                // console.log(text)
                                options.push({id: text.id, text: text.post_title});
                            });
                        }
                        return {
                            results: options
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1 // the minimum of symbols to input before perform a search
            });
        });
// console.log(dnxte_post_type);

    });

    function toggleDataVisibility(element) {

        var siteareapostvalue = $('#dnxte_sitearea_at_pages').val();

        $(".dnxte-add-exeption").removeClass('dnxte-show')
        $(".dnxte-add-exeption").removeClass('dnxte-hide')
        $(".dnxte-add-popup-selected").removeClass('dnxte-show')
        $(".dnxte-add-popup-selected").removeClass('dnxte-hide')

        if ($.trim(siteareapostvalue) === 'all') {

            $(".dnxte-add-exeption").addClass('dnxte-show')
            $(".dnxte-add-popup-selected").addClass('dnxte-hide')
        } else {
            $(".dnxte-add-exeption").addClass('dnxte-hide')
            $(".dnxte-add-popup-selected").addClass('dnxte-show')
        }
    }

    $(document).ready(function () {
        $('.allcheckboxlimituser').on('change', function () {

            var parentDiv = $(this).closest(".dnxte-pp-user-cap");

            if ($(this).prop("checked")) {
                $(".allcheckboxlimituser").not(this).prop("checked", false);
                parentDiv.addClass("allchecked");
            } else {
                parentDiv.removeClass("allchecked");
            }

        });

        $(".dnxte-copy-class").on("click", function () {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(".dxnte-manual-trigger-id-label").text()).select();
            document.execCommand("copy");
            $temp.remove();

            // replacing alert
            $(this)
                .removeClass("dashicons-clipboard")
                .addClass("dashicons-saved");

            const timerRef = setTimeout(() => {
                $(this)
                    .removeClass("dashicons-saved")
                    .addClass("dashicons-clipboard");
                clearTimeout(timerRef);
            }, 1000);
            // Alert the copied text
            //   alert("Copied the text: " + $(".dxnte-manual-trigger-id-label").text());
        });

        $('#dnxte_sub_set_sitearea_settings').on('change', function () {
            selectedOption = $("#dnxte_sub_set_sitearea_settings").find(":selected").val();
            // console.log(selectedOption);
            $('#dnxte_sitearea_at_pages_suggestion').val(null).trigger('change'); // empty selection of select2
            $('#dnxte-add-exeption-select').val(null).trigger('change'); // empty selection of select2
            // Hide all content divs
            var siteareaContentDiv = document.querySelectorAll(".dnxte_sitearea");
            // console.log(siteareaContentDiv)
            for (var i = 0; i < siteareaContentDiv.length; i++) {
                siteareaContentDiv[i].style.display = "none";
            }
            // Show the selected content div
            var selectedDiv = document.getElementById('dnxte_sitearea_' + selectedOption);
            // console.log(selectedDiv);
            if (selectedDiv) {
                selectedDiv.style.display = "block";
            }
        });

        $('#dnxte_sitearea_at_pages_suggestion').select2({
            ajax: {
                url: ajaxurl, // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                method: 'POST',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    // console.log(params);
                    return {
                        q: params.term,
                        select_page: selectedOption,
                        json: 1,
                        action: 'get_post_sitearea' // AJAX action for admin-ajax.php
                    };
                },
                processResults: function (data) {
                    // console.log(data);
                    var options = [];
                    if (data) {
// console.log(data)
                        // data is the array of arrays, and each of them contains ID and the Label of the option
                        $.each(data.items, function (index, text) { // do not forget that "index" is just auto incremented value
                            // console.log(text)
                            options.push({id: text.id, text: text.post_title});
                        });
                    }
                    return {
                        results: options
                    };
                },
                cache: true
            },
            minimumInputLength: 1 // the minimum of symbols to input before perform a search
        });


        $('#dnxte-add-exeption-select').select2({
            ajax: {
                url: ajaxurl, // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                method: 'POST',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    // console.log(params);
                    return {
                        q: params.term,
                        select_page: selectedOption,
                        json: 1,
                        action: 'get_post_sitearea' // AJAX action for admin-ajax.php
                    };
                },
                processResults: function (data) {
                    // console.log(data);
                    var options = [];
                    if (data) {
// console.log(data)
                        // data is the array of arrays, and each of them contains ID and the Label of the option
                        $.each(data.items, function (index, text) { // do not forget that "index" is just auto incremented value
                            // console.log(text)
                            options.push({id: text.id, text: text.post_title});
                        });
                    }
                    return {
                        results: options
                    };
                },
                cache: true
            },
            minimumInputLength: 1 // the minimum of symbols to input before perform a search
        });

        $("input[name=dnxte_close_overlay_click]").on('click', function(){
            if(true == $(this).is(':checked')){
                $("input[name=dnxte_clickable_under_overlay]").attr('disabled','');
                $("input[name=dnxte_clickable_under_overlay]").prop('checked', false);
                $("#dnxte-close-msg").html('This option won\'t work if the "Close On Overlay Click" option is enabled.')
            }else{
                $("input[name=dnxte_clickable_under_overlay]").removeAttr('disabled');
                $("#dnxte-close-msg").html('')
            }
        });

        $('#dnxte-layout-dropdown').on('change', function () {
            var element = $("#dnxte-layout-dropdown").val();
            if ("full_width" === element) {
                $(".dnxte-popup-position").addClass("dnxte-hide");
            } else {
                $(".dnxte-popup-position").removeClass("dnxte-hide");
            }
        });

    });
})(jQuery);

/*
    Showing tigger event for popup maker pro
    Added by nazmul
*/
function showContent(value) {
    var select = document.getElementById("dnxteppro_sub_triggering_settings");
    var selectedOption = select.value;
    // Hide all content divs
    var contentDivs = document.querySelectorAll("[id^='trigger_on']");
    for (var i = 0; i < contentDivs.length; i++) {
        contentDivs[i].style.display = "none";
    }
    // Show the selected content div
    var selectedDiv = document.getElementById(selectedOption);
    if (selectedDiv) {
        selectedDiv.style.display = "block";
    }
    // Show content except none selected content
    if (value === "trigger_on_none") {
        document.getElementById("dnxte-autotrigger").style.display = "none";
    } else {
        document.getElementById("dnxte-autotrigger").style.display = "block";
    }
}

// Start js for popup tab(Custom Metabox tab)
const tabs = document.querySelectorAll("[data-tab-target]");
const tabContents = document.querySelectorAll("[data-tab-content]");

tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        const target = document.querySelector(tab.dataset.tabTarget);
        tabContents.forEach((tabContent) => {
            tabContent.classList.remove("active");
        });
        tabs.forEach((tab) => {
            tab.classList.remove("active");
        });
        tab.classList.add("active");
        target.classList.add("active");
    });
});

// End JS for Popup tab(Custom metabox tab)

function dnxte_trigger_check(value) {
    var element = document.querySelector(".periodicity-once_per_period");
    if ("once_per_period" === value.trim()) {
        element.classList.remove("dnxte-hide");
        element.classList.add("dnxte-show");
    } else {
        element.classList.remove("dnxte-show");
        element.classList.add("dnxte-hide");
    }
}

function dnxte_activity_show_condition(value) {
    // console.log(value);
    var element = document.querySelector(".dxnte-activity-show");
    if ("certain_period" === value.trim()) {
        element.classList.remove("dnxte-hide");
    } else {
        element.classList.remove("dnxte-show");
        element.classList.add("dnxte-hide");
    }
}

