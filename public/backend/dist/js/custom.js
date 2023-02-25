$(document).ready(function () {

    if ($('.tooltips').length) {
        $('.tooltips').tooltipster({
            theme: 'tooltipster-punk'
        });
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#reload-application').on('click', function () {
        $(this).html('Reloading...!').removeClass('btn-info').addClass('btn-danger');
        window.location.reload();
    });

    if ($('.placeholder-cls').val() == '' || $('.placeholder-cls').val() == null) {
        $('.placeholder-cls').val('alt="ARTEMYST"');
    }

    if ($('.fancy').length > 0) {
        $("a.fancy").fancybox({
            'zoomSpeedIn': 300, 'zoomSpeedOut': 300, 'overlayShow': false
        });
    }

    $('.deal_type_drop').on('change', function () {
        if ($(this).val() == 'Deal') {
            $('#section_drop').hide();
            $('#deal_type_div').removeClass('col-md-6').addClass('col-md-12');
            $('#section_id').removeClass('required');
        } else {
            $('#section_drop').show();
            $('#deal_type_div').removeClass('col-md-12').addClass('col-md-6');
            $('#section_id').addClass('required');
        }
    });

    $(document).on('change', '.deal-product-type', function () {
        if ($(this).val() == 'Category') {
            $('#category-div').show();
            $('#brand-div').hide();
        } else {
            $('#category-div').hide();
            $('#brand-div').show();
        }
    });

    $('#main_category_type').on('change', function () {
        if ($(this).val() == "Category") {
            $('.divLength').removeClass('col-md-4').addClass('col-md-6');
            $('.subCategoryDiv').hide();
        } else {
            $('.divLength').removeClass('col-md-6').addClass('col-md-4');
            $('.subCategoryDiv').show();
        }
    });

    if ($('.daterange').length > 0) {
        $('.daterange').daterangepicker();
    }

    $(document).on('click', '#order-detail-search-result', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST', dataType: 'html', data: $('#order-detail-filter-form').serialize(), headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/report/order_detail_filter', success: function (response) {
                if (response != '0') {
                    $('#filter-detailed-result').html(response);
                    $('#clear-search-result').attr('disabled', false);
                } else {
                    swal({
                        title: "Error", text: response.message, type: 'error'
                    });
                }
            }
        });
    });

    $(document).on('change', '.product-selection-drop', function () {
        var type = $('.deal-product-type').val();
        var type_value = $(this).val();
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: base_url + '/deal/deal-products/',
            data: {type: type, _token: _token, type_value: type_value},
            success: function (data) {
                if (data.status == false) {
                    swal('Error !', data.message, 'error');
                } else {
                    var resp = data.message;
                    var len = resp.length;
                    $("#products").empty();
                    $("#products").append("<option value=''>Select Option</option>")
                    for (var i = 0; i < len; i++) {
                        var id = resp[i]['id'];
                        var title = resp[i]['title'];
                        $("#products").append("<option value='" + id + "'>" + title + "</option>");
                    }
                    $('#products_error').html('');
                }
            }
        });
    });

    if ($('.copy-clipboard').length > 0) {
        new Clipboard('.copy-clipboard');

        $('.copy-clipboard').on('click', function () {
            swal('Success !', 'Deal URL copied successfully', 'success');
        });
    }


    $(document).on('change', '#media_type', function () {
        if ($(this).val() == "Video") {
            $('.video-div').show();
            $('#video_url').addClass('required');
            $('#image').attr('name', 'image').attr('multiple', false);
        } else {
            $('.video-div').hide();
            $('#video_url').removeClass('required');
            $('#image').attr('name', 'image[]').attr('multiple', true);
        }
    });

    //todo:  to remove after common ajax form submit function
    $("#forgot_password_btn").click(function (e) {
        e.preventDefault();
        $this = $(this);
        $(".error_message").html('');
        var email = $('#forgot_email').val();
        var _token = token;
        if (email == '') {
            $("#forgot_email").attr("placeholder", "Please enter email").css({'border': '1px solid #F15C25'});
        } else {
            $this.val('Please wait...!');
            $.ajax({
                url: base_url + '/admin/forgot-password',
                type: "POST",
                userType: 'json',
                data: {email: email, _token: _token},
                success: function (data) {
                    $this.val('Submit');
                    if (data.status == true) {
                        $(".error_message").html("<b>" + data.message + "</b>").css({'color': '#527234'});
                        swal({
                            title: 'Success !',
                            text: data.message,
                            type: 'success',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    } else {
                        $(".error_message").html("<b>" + data.message + "</b>").css({'color': '#F15C25'});
                        swal('Error !', data.message, 'error');
                    }
                }
            });
        }
    });

    //todo:  to remove after common ajax form submit function
    $('#password_reset').on('click', function (e) {
        e.preventDefault();
        $('form input').removeClass('is-invalid is-valid');
        $('span.error').remove();
        $('.error_message').html('');
        var form_id = $(this).closest("form").attr('id');
        var password = $('#password').val();
        var auth_token = $('#token').val();
        var id = $('#id').val();
        var _token = token;
        var password_confirmation = $('#password_confirmation').val();
        if (password == '' || password_confirmation == '') {
            $('#password').addClass('is-invalid');
            $('#password_confirmation').addClass('is-invalid');
        } else {
            if (password != password_confirmation) {
                $('#password_confirmation').val('');
                $('.error_message').html("New Password and Confirm Password doesn't match").css({'color': '#F15C25'});
            } else {
                $('#password_reset').val('Please wait..!');
                $('#password').addClass('is-valid');
                $('#password_confirmation').addClass('is-valid');
                $.ajax({
                    url: base_url + '/admin/reset-password/' + auth_token,
                    type: "POST",
                    dataType: 'json',
                    data: {password, password_confirmation, _token, id},
                    success: function (response) {
                        $('#password_reset').val('Reset Password');
                        if (response.status == true) {
                            $('.error_message').html('');
                            swal({
                                title: "Done it!", text: response.message, type: "success"
                            }, function () {
                                window.location.href = base_url + '/admin';
                            });
                        } else {
                            swal('Error !', data.message, 'error');
                        }
                    },
                    error: function (response) {
                        $('#password_reset').val('Reset Password');
                        $.each(response.responseJSON.errors, function (field_name, error) {
                            var msg = '<span class="error" for="' + field_name + '">' + error + '</span>';
                            $("#" + form_id).find('input[name="' + field_name + '"], select[name="' + field_name + '"], textarea[name="' + field_name + '"]')
                                .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                        });
                    }
                });
            }
        }
    });

    $(document).on('change', '.common_sort_order', function (e) {
        e.preventDefault();
        $this = $(this)
        var sort_order = $this.val();
        var table = $this.data('table');
        var id = $this.data('id');
        var field = $this.data('field');
        var field_value = $this.data('field-value');
        var url = $this.data('url') ?? '/sort_order';
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {sort_order, table, id, field, field_value, _token},
            url: base_url + url,
            success: function (data) {
                if (data.status === false) {
                    swal('Error !', data.message, 'error',);
                } else {
                    swal({
                        title: 'Success !',
                        text: 'Sort order has been updated successfully',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1000,
                    });
                }
            }
        })
    });

    $('.for_canonical_url').on('blur', function () {
        var title = $(this).val();
        var cleaned_text = '';
        cleaned_text = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
        cleaned_text = cleaned_text.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
        $('#short_url').val(cleaned_text);
    });

    if ($('.tinyeditor').length > 0) {
        initTinyMceEditor();
    }
    if ($('.dataTable').length > 0) {
        load_table();
    }

    function load_table() {
        var table = $(".dataTable").DataTable({
            "fnDrawCallback": function () {
                if ($(".deal_status_check").length) {
                    $(".deal_status_check").bootstrapSwitch();
                }
            }, "responsive": true, "lengthChange": true, "autoWidth": false, "stateSave": true,
        });
        //todo:  clear datatable state after creation//
        // if (document.referrer.split('/').pop() == 'create') {
        //     table.state.clear();
        //     window.location.reload();
        // }
    }

    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');

    $('.login-reg-panel input[type="radio"]').on('change', function () {
        if ($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut();
            $('.login-info-box').fadeIn();

            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');

        } else if ($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();

            $('.white-panel').removeClass('right-log');

            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });

    $('#menu_type').on('change', function () {
        if ($(this).val() === "static") {
            $('.url_div').show();
         
        }else {
             $('.url_div').hide();
        }
    });
    $('#menu_id').on('change', function () {
        //get data type of menu
        var type = $('option:selected', this).attr('data-type');
 
        if (type=== "color") {
            $('.color').removeClass('d-none');
            $('.shape').addClass('d-none');
            $('.color').show();
            $('#slider-div').hide();
           
            $('.shape').hide();
         
        }else if(type=== "shape"){
            $('.color').removeClass('d-none');
            $('.shape').removeClass('d-none');
            $('.color').hide();
            $('.shape').show();
            $('#slider-div').show();
        }
    });

    $('.menu_category_id').on('change', function () {
        var url = $('option:selected', this).attr('data-url');
        if (typeof url !== 'undefined' && url !== false) {
            $('.menu_url').val($('option:selected', this).data('url'));
        } else {
            $('.menu_url').val('');
        }
    });

    $('#menu_id').on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        var _token = token;
        if (id) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + '/menu/sub-categories',
                data: {id: id, _token: _token},
                success: function (data) {
                    if (data.status === false) {
                        swal('Error !', data.message, 'error');
                    } else {
                        var resp = data.message;
                        var len = resp.length;
                        $(".sub-category-drop").empty();
                        $(".sub-category-drop").append("<option value=''>Select Option</option>")
                        for (var i = 0; i < len; i++) {
                            var id = resp[i]['id'];
                            var title = resp[i]['title'];
                            $(".sub-category-drop").append("<option value='" + id + "'>" + title + "</option>");
                        }
                        $('.sub-category-drop_error').html('');
                    }
                }
            });
        }
    });

    /** Deal**/
    $('.product_list_type').on('change', function (e) {
        e.preventDefault();
        if ($(this).val() == "Brand") {
            $('.brandDiv').show();
            $('.categoryDiv,.subCategoryDiv').hide();
            $('#brand_id').val();
        } else if ($(this).val() == "Category") {
            $('.categoryDiv').show();
            $('.subCategoryDiv,.brandDiv').hide();
            $('#deal_category_id').val();
        } else {
            $('.categoryDiv, .subCategoryDiv').show();
            $('.brandDiv').hide();
            $('#deal_sub_category_id').val();
            var parentId = $('#deal_category_id').val();
            if (parentId != '') {
                var _token = token;
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + '/deal/sub-category',
                    data: {parentId: parentId, _token: _token},
                    success: function (data) {
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            var resp = data.message;
                            var len = resp.length;
                            $("#deal_sub_category_id").empty().append("<option value=''>Select Option</option>")
                            for (var i = 0; i < len; i++) {
                                var id = resp[i]['id'];
                                var title = resp[i]['title'];
                                $("#deal_sub_category_id").append("<option value='" + id + "'>" + title + "</option>");
                            }
                            $('#deal_sub_category_id_error').html('');
                        }
                    }
                });
            }
        }
        $('#products').empty();
        $("#products").append("<option value=''>Select Option</option>")
    });

    $(document).on('change', '.productGetDrop', function (e) {
        e.preventDefault();
        var product_list_type = $('.product_list_type').val();
        var value = $(this).val();
        var deal_id = $(this).data('deal_id');
        var offer_option = $('#offer_option').val();
        var deal_type = $('#offer_type').val();
        var _token = token;
        if (product_list_type == "Sub-category") {
            var parentId = $('#deal_category_id').val();
            if (parentId != '') {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + '/deal/sub-category',
                    data: {parentId: parentId, _token: _token},
                    success: function (data) {
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            var resp = data.message;
                            var len = resp.length;
                            $("#deal_sub_category_id").empty().append("<option value=''>Select Option</option>")
                            for (var i = 0; i < len; i++) {
                                var id = resp[i]['id'];
                                var title = resp[i]['title'];
                                $("#deal_sub_category_id").append("<option value='" + id + "'>" + title + "</option>");
                            }
                            $('#deal_sub_category_id_error').html('');
                        }
                    }
                });
            }
        } else {
            $.ajax({
                type: 'POST',
                url: base_url + '/deal/product-by-type',
                data: {product_list_type, value, _token, deal_id, offer_option, deal_type},
                success: function (data) {
                    if (data.status == false) {
                        swal('Error !', data.message, 'error');
                    } else {
                        $("#min_price").val(data.min_price);
                        var resp = data.message;
                        var len = resp.length;
                        $("#products").empty().append("<option value=''>Select Product</option>");
                        for (var i = 0; i < len; i++) {
                            var id = resp[i]['id'];
                            var title = resp[i]['title'];
                            $("#products").append("<option value='" + id + "' selected>" + title + "</option>");
                        }
                    }
                }
            });
        }
    })

    $(document).on('change', '.productGetDropOffer', function () {
        var product_list_type = $('#product_list_type').val();
        if (product_list_type == 'Brand') {
            var value = $('#brand_id').val();
        } else if (product_list_type == "Category") {
            var value = $('#deal_category_id').val();
        } else {
            var value = $('#deal_sub_category_id').val();
        }
        var deal_id = $(this).data('deal_id');
        var offer_option = $('#offer_option').val();
        var deal_type = $('#offer_type').val();
        var _token = token;
        $.ajax({
            type: 'POST', url: base_url + '/deal/product-by-type', data: {
                product_list_type, value, _token, deal_id, offer_option, deal_type
            }, success: function (data) {
                if (data.status == false) {
                    swal('Error !', data.message, 'error');
                } else {
                    $("#min_price").val(data.min_price);
                    var resp = data.message;
                    var len = resp.length;
                    $("#products").empty().append("<option value=''>Select Product</option>")
                    for (var i = 0; i < len; i++) {
                        var id = resp[i]['id'];
                        var title = resp[i]['title'];
                        $("#products").append("<option value='" + id + "'>" + title + "</option>");
                    }
                }
            }
        });
    });

    $(document).on('change', '.productGetDropSub', function () {
        var product_list_type = $('#product_list_type').val();
        var value = $(this).val();
        var deal_id = $(this).data('deal_id');
        var offer_option = $('#offer_option').val();
        var deal_type = $('#offer_type').val();
        var _token = token;
        $.ajax({
            type: 'POST', url: base_url + '/deal/product-by-type', data: {
                product_list_type, value, _token, deal_id, offer_option, deal_type
            }, success: function (data) {
                if (data.status == false) {
                    swal('Error !', data.message, 'error');
                } else {
                    $("#min_price").val(data.min_price);
                    var resp = data.message;
                    var len = resp.length;
                    $("#products").empty().append("<option value=''>Select Product</option>")
                    for (var i = 0; i < len; i++) {
                        var id = resp[i]['id'];
                        var title = resp[i]['title'];
                        $("#products").append("<option value='" + id + "' selected>" + title + "</option>");
                    }
                }
            }
        });
    });

    $('#offer_type').on('change', function () {
        if ($('#offer_type').val() == "Normal") {
            $('#offer_value').attr('readonly', true).val(0);
        } else {
            $('#offer_value').attr('readonly', false);
        }
    });

    if ($('.deal_status_check').length) {
        $(document).on('switchChange.bootstrapSwitch', '.deal_status_check', function (event, state) {
            var table = $(this).attr('title');
            var primary_key = $(this).attr('ref');
            var field = $(this).data('field');
            var _token = token;
            state = state;
            $.ajax({
                type: 'POST',
                url: base_url + '/deal-status-change/',
                data: {state: state, table: table, primary_key: primary_key, _token: _token, field: field},
                success: function (response) {
                    if (response == "1") {
                        swal('Success !', 'Status has been changed succesfully', 'success');
                    } else if (response == "2") {
                        swal('Error !', 'Error while changing the status', 'error');
                    } else {
                        swal('Error !', 'Product tagged with an active deal, Please remove it and try again', 'error');
                    }
                }
            });
        });
    }

    $('#category').on('change', function () {
        var parentId = $(this).val();
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: base_url + '/sub-category',
            data: {parentId: parentId, _token: _token},
            success: function (data) {
                if (data.status == false) {
                    swal('Error !', data.message, 'error');
                } else {
                    var resp = data.message;
                    var len = resp.length;
                    $("#sub_category").empty().append("<option value=''>Select Option</option>")
                    for (var i = 0; i < len; i++) {
                        var id = resp[i]['id'];
                        var title = resp[i]['title'];
                        $("#sub_category").append("<option value='" + id + "'>" + title + "</option>");
                    }
                    $('#sub_category_error').html('');
                }
            }
        });
    });

    $(document).on('click', '.product_replica', function () {
        var product_id = $(this).data('id');
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {id: product_id, _token: _token},
            url: base_url + '/product/replica/',
            success: function (response) {
                console.log(response.id);
                if (response.status == true) {
                    window.location.href = base_url + "/product/edit/" + response.id;
                } else {
                    swal({
                        title: "Error", text: response.message, type: "error"
                    });
                }
            }


        });
    });
    $(document).on('change', '#country', function () {
        var country_id = $(this).val();
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: base_url + '/country/state/state_list',
            data: {country_id: country_id, _token: _token},
            success: function (data) {
                if (data.status == false) {
                    swal('Error !', data.message, 'error');
                } else {
                    if (data.states.length > 0) {
                        $("#state").empty();
                        $('#state').append('<option value="">Select State</option>');
                        $.each(data.states, function (key, value) {
                            $('#state').append('<option value="' + value.id + '"' + '>' + value.title + '</option>');
                        });
                    } else {
                        $('#state').append('<option value="">No States Available</option>');
                    }
                }
            }
        })
    });

    $("#check_all").click(function () {
        $(".single_box").prop('checked', $(this).prop('checked'));
        checkbox_array();
    });

    $(".single_box").change(function () {
        if (!$(this).prop("checked")) {
            $("#check_all").prop("checked", false);
        }
    });

    $(document).on('click', '.single_box', function () {
        checkbox_array();
    });

    function checkbox_array() {
        var service_ids = [];
        $('.single_box').each(function () {
            if ($(this).prop('checked') == true) {
                service_ids.push($(this).val());
            }
        });
        if (service_ids.length > 0) {
            var ids = service_ids.join(",");
            $('.delete_btn').show();
            $('#ids').val(ids);
        } else {
            $('.delete_btn').hide();
            $('#ids').val(0);
        }
    }

    $(document).on('click', '#delete_multiple_item_btn', function () {
        var _token = token;
        var id = $('#ids').val();
        var url = $(this).data('url');
        swal({
            title: "Are you sure?",
            text: "You will not be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + url,
                    data: {id: id, _token: _token},
                    success: function (data) {
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            swal({title: "Success", text: "Entry has been deleted!", type: "success"}, function () {
                                location.reload();
                            });
                        }
                    }
                })
            } else {
                swal("Cancelled", "Entry remain safe :)", "error");
            }
        });
    });

    $(document).on('click', '.reply_modal', function () {
        var enquiry = $(this).data('enquiry');
        var id = $(this).data('id');
        var reply = $(this).data('reply');
        $('#reply-modal').modal('show');
        $('#request_details').html('').html(enquiry);
        if (reply == '') {
            $('#id').val(id);
            $('#reply').html('');
            $('#reply_to_enquiry').show();
        } else {
            $('#reply').html(reply);
            $('#reply_to_enquiry').hide();
        }
    });

    $(document).on('click', '#reply_to_enquiry', function (e) {
        var url = $('#enquiry_url').val();
        e.preventDefault();
        $('#reply_to_enquiry').val('Please Wait..!');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: $('#formWizard').serialize(),
            url: base_url + '/enquiry/' + url,
            success: function (response) {
                $('#reply_to_enquiry').val('Update Reply');
                if (response.status == true) {
                    swal({title: "Success", text: response.message, type: "success"}, function () {
                        location.reload();
                    });
                } else {
                    swal('Error !', response.message, 'error');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $('#type').on('change', function () {
        var type = $(this).val();
        $('#free_shipping_type').val('na');
        if (type == "free") {
            $('.free').show();
            $('.flat').hide();
            $('#free_shipping_type').attr('required', true);
            $('#fixed_price').attr('required', false);
        } else {
            $('.free,.min').hide();
            $('.flat').show();
            $('#free_shipping_type').attr('required', false);
            $('#fixed_price').attr('required', true);
        }
    });
    $('#free_shipping_type').on('change', function () {
        var type = $(this).val();
        if (type == "na") {
            $('.min').hide();
            $('#min_amount,#fixed_price_min').attr('required', false);
        } else {
            $('.min').show();
            $('#min_amount,#fixed_price_min').attr('required', true);
        }
    });


    $(document).on('click', '.delete_entry', function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var _token = token;
        if (id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plz!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: base_url + '/' + url,
                        data: {id: id, _token: _token},
                        success: function (data) {
                            if (data.status == false) {
                                swal({
                                    showConfirmButton : false,
                                   title :  'Error !',
                                     text : data.message, 
                                     type : 'error'
                                     });
                                     setTimeout(() => {
                                        location.reload();
                                     }, 700);
                            } else {
                                swal({
                                    showConfirmButton : false,
                                    title: "Success", 
                                    text: "Entry has been deleted!", 
                                    type: "success"
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 700);
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Entry remain safe :)", "error");
                }
            });
        } else {
            swal('Error !', 'Entry not found', 'error');
        }
    });

    $('#login_email').on('keyup', function () {
        $('#username').val($(this).val());
    });

    //timeout for alerts
    $(".alert-success, .alert-danger").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert-success, .alert-danger").alert('close');
    });

    $(document).on('change', '.status_check', function () {
        
        $this = $(this);
        var state = $this.is(':checked');
        var table = $this.data('table');
        var primary_key = $this.data('pk');
        var field = $this.data('field');
        var limit = $this.data('limit');
        var limit_field = $this.data('limit-field');
        var limit_field_value = $this.data('limit-field-value');
        var url = $this.data('url');
        var _token = token;
        $.ajax({
            type: 'POST',
            url: base_url + url,
            data: {state, table, primary_key, _token, field, limit, limit_field, limit_field_value},
            success: function (response) {
                if (response.status == true) {
                    swal({
                        title: "Success !",
                        text: response.message,
                        type: "success",
                        showConfirmButton: false,
                        timer : 700
                    });

                } else {
                    $this.prop('checked', false);
                    swal({
                        showConfirmButton: false,
                        title: 'Error !', 
                        text: response.message, 
                        type:  'error',
                        timer : 700
                    });
                }
                if (response.reload == true) {
                    window.location.reload();
                }
            }
        });
    });


    $(document).on('change', '.bool_status', function () {
        var state = $(this).is(':checked');
        var table = $(this).data('table');
        var id = $(this).data('id');
        var field = $(this).data('field');
        var url = $(this).data('url');
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: base_url + '/' + url,
            data: {id, _token, state, table, field},
            success: function (response) {
                if (response.status == true) {
                    swal({
                        showConfirmButton: false,
                        title: "Done it!", text: response.message, type: "success", timer : 700,
                    });
                } else {
                    swal({
                        showConfirmButton: false,
                        title: "Error", text: response.message, type: "error",
                        timer : 700,
                    });
                }
            }
        });
    });

    $('#headingSubmit').on('click', function () {
        var type = $(this).data('type');
        var homeTitle = $('#home_title').val();
        var subtitle = $('#subtitle').val();
        var description = $('#is_description').val();
        if(description){
            var homeDescription = tinymce.get($('#home_description').attr('id')).getContent();
        }
        var buttonHtml = $('#headingSubmit').val();
        var _token = token;
        var url = $(this).data('url');
        var required = [];
        $('.required').each(function () {
            var id = $(this).attr('id');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id + '_error').html('This field is required').css({
                    'color': '#FF0000', 'font-size': '14px'
                });
            } else {
                $('#' + id + '_error').html('');
            }
        });
        if (required.length == 0) {
            $('.loadingImg').show();
            $('#headingSubmit').attr('disabled', true).val('Please wait...!');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + url,
                data: {_token, type, homeTitle,homeDescription,subtitle},
                success: function (response) {
                    if (response.status == true) {
                        swal({
                            title: "Done it!", text: response.message, type: "success"
                        });
                        $('.loadingImg').hide();
                        $('#headingSubmit').attr('disabled', false).val(buttonHtml);
                    } else {
                        swal('Error !', 'Error while updating the heading', 'error');
                    }
                }
            });
        }
    });

    /***************************** Validating form submission **********************************/

    $('#formWizard').on('submit', function (e) {
        var validation = [];
        var buttonHtml = $('.submitBtn').val();
        $('.loadingImg').show();
        $('.submitBtn').attr('disabled', true).val('Please wait...!');
        
        var required = [];
        $('.required').each(function () {
            var id = $(this).attr('id');
            var id_text = $(this).attr('placeholder');
            if ($(this).hasClass('tinyeditor')) {
                var editorContent = tinymce.get($(this).attr('id')).getContent();
                if (editorContent == '') {
                    required.push($('#' + id).val());
                    // $('#'+id+'_error').html('Please enter '+id_text).css({'color':'#FF0000','font-size':'14px'});
                    $('#' + id + '_error').html('This field is required').css({
                        'color': '#FF0000', 'font-size': '14px'
                    });
                } else {
                    $('#' + id + '_error').html('');
                }
            } else {
                if ($('#' + id).val() == '') {
                    required.push($('#' + id).val());
                    // $('#'+id+'_error').html('Please enter '+id_text).css({'color':'#FF0000','font-size':'14px'});
                    $('#' + id + '_error').html('This field is required').css({
                        'color': '#FF0000', 'font-size': '14px'
                    });
                } else {
                    $('#' + id + '_error').html('');
                }
                var id = $(this).attr('id');
                
                // if(id === 'short_url' || id === 'type'){
                //     var type = $('#type').val();
                //     var short_url = $('#short_url').val();
                //     $.ajax({
                //         type: 'POST',
                //         dataType: 'json',
                //         url: base_url + '/product/validate',
                //         data: {
                //             id: id,
                //             type: type,
                //             short_url: short_url,
                //             _token: token
                //         },
                //         success: function (response) {
                //             console.log(response);
                //             if (response == false) {
                //                 $('#' + id + '_error').html('');
                //             } else {
                //                 // validation.push(response.status);
                //                 $('#' + id + '_error').html(response.message).css({
                //                     'color': '#FF0000', 'font-size': '14px'
                //                 });
                //             }
                //         },
                //         error: function (data) {
                           
                //             if(data.responseJSON['errors']){
                                
                //                 let err = data.responseJSON['errors'];
    
                //                 $.each(err, (i,j)=>{
                //                     required.push(i);
                //                     $('#' + i + '_error').html(j).css({
                //                         'color': '#FF0000', 'font-size': '14px'
                //                     });
                //                     $('.'+i).append(j+'<br/>');
                //                 });
    
                //                 let errKeys = Object.keys(data.responseJSON['errors']);
    
                //                 errKeys.map((item) => {
                //                     required.push(item);
                                   
                //                 });
                //                 console.log(required.length);
                //             }
                //             validation.push($('#' + id).val());
                //         }
                        
                //     });
                // }
            }
          
        });
     
//   
        if (required.length == 0) {
            if ($('.file-error-message').is(":visible")) {
                e.preventDefault();
                $('.submitBtn').attr('disabled', false).val(buttonHtml);
                $('.loadingImg').hide();
            } else {
                $('.submitBtn').attr('disabled', true).val('Please wait...!');
                $('.loadingImg').show();
                $('#formWizard').submit();
            }
        } else {
            e.preventDefault();
            $('.loadingImg').hide();
            $('.submitBtn').attr('disabled', false).val(buttonHtml);
        }
    });

    /************* Validating form submission *******************/

    if ($('.select2').length > 0) {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    }


    /********************* Product Overviews clone menu *****************************/
    $(document).on('click', '.add_overview_row', function () {
        $('.submitBtn').val('Please wait..!').attr('disabled', true);
        var unique_id = $(this).attr('id');
        var plus_unique = parseFloat(unique_id) + 1;
        var _token = token;
        $.ajax({
            type: 'POST',
            data: {unique_id: unique_id, _token: _token},
            url: base_url + '/product/overview/add_row',
            success: function (response) {
                $('.add_overview_row').hide();
                $(response).hide().insertAfter("#append_result_" + unique_id).fadeIn(500);
                $('.submitBtn').val('Submit').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Error !', 'Some error occurred', 'error');
                $('.submitBtn').val('Submit').attr('disabled', false);
            }
        });
    });
    $(document).on('click', '.remove_overview_row', function () {
        $('.submitBtn').val('Please wait...').attr('disabled', true);
        var primary_key = $(this).attr('id');
        var data_key = $(this).attr('ref');
        var _token = token;
        if (data_key == 0) {
            $(this).closest('.form-row').fadeOut(300, function () {
                $(this).remove();
                $('.add_overview_row').hide();
                $('.add_overview_row:last').show();
                $('.submitBtn').val('Submit').attr('disabled', false);
            });
        } else {
            swal({
                title: "Are you sure?",
                text: "You will be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plz!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: base_url + '/product/overview/remove_row',
                        data: {id: data_key, _token: _token},
                        success: function (data) {
                            if (data.status == false) {
                                swal('Error !', data.message, 'error');
                            } else {
                                swal({title: "Success", text: "Entry has been deleted!", type: "success"}, function () {
                                    // location.reload();
                                    $('#append_result_' + primary_key).remove();
                                    $('.add_overview_row').hide();
                                    $('.add_overview_row:last').show();
                                    $('.submitBtn').val('Submit').attr('disabled', false);
                                    if ($('.add_overview_row').length == 0) {
                                        location.reload();
                                    }
                                });
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Entry remain safe :)", "error");
                    $('.submitBtn').val('Submit').attr('disabled', false);
                }
            });
        }
    });
    /********************* Product Overviews clone menu ends *************************/



    /************ Product Specification clone menu ***********/
    $(document).on('click', '.add_specification_row', function () {
        var unique_id = $(this).attr('id');
        var plus_unique = parseFloat(unique_id) + 1;
        var product_id = $(this).attr('product_id');
        var _token = token;
        $.ajax({
            type: 'POST',
            data: {unique_id: unique_id, _token: _token, product_id: product_id},
            url: base_url + '/product/specification/specification/extra_row',
            success: function (response) {
                $('.add_specification_row').hide();
                $(response).hide().insertAfter("#append_result_" + unique_id).fadeIn(500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal('Error !', 'Some error occurred', 'error');
            }
        });
    });
    $(document).on('click', '.remove_specification_row', function () {
        var primary_key = $(this).attr('id');
        var data_key = $(this).attr('ref');
        var _token = token;
        if (data_key == 0) {
            var previous_key = parseFloat(primary_key) - 1;
            $(this).closest('.form-row').fadeOut(300, function () {
                $(this).remove();
                $('.add_' + previous_key).show();
            });
        } else {
            swal({
                title: "Are you sure?",
                text: "You will be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plz!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: base_url + '/product/specification/specification/remove_extra_row',
                        data: {id: data_key, _token: _token},
                        success: function (data) {
                            if (data.status == false) {
                                swal('Error !', data.message, 'error');
                            } else {
                                swal({title: "Success", text: "Entry has been deleted!", type: "success"}, function () {
                                    location.reload();
                                });
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Entry remain safe :)", "error");
                }
            });
        }
    });
    /********************* Product Specification clone menu ends *************************/
    // product form availability
    $('#availability').on('change', function () {
        var availability = $(this).val();
        if (availability == "In Stock") {
            $('.availability_div').show();
            $('.stock,.alert_quantity').attr('required', true).addClass('required');
        } else {
            $('.availability_div').hide();
            $('.stock,.alert_quantity').attr('required', false).removeClass('required');
        }
    });
    $('#type').on('change', function () {
        // var type = $(this).val();
        // if (type == 1  || type == 3) {
        //     $('.mount_div').hide();
        //     $('.mount').attr('required', false).removeClass('required');
           
        // } else {
        //     $('.mount_div').show();
        //     $('.mount').attr('required', true).addClass('required');
           
        // }
    });
    //offer strip timer
    $('#is_timer_available').on('change', function () {
        if ($(this).val() == "Yes") {
            $('.timerEnabled').show();
            $('#date').addClass('required');
        } else {
            $('#date').val('').removeClass('required');
            $('.timerEnabled').hide();
        }
    });

    // $(document).on('click', '.filterLink', function (event) {
    //     var value = $(this).data('status');
    //     var table = $(this).data('table');
    //     if (table == undefined) {
    //         $('#DataTables_Table_0_filter input').val(value).trigger('keyup');
    //     } else {
    //         $('#' + table + '_filter input').val(value).trigger('keyup');
    //     }
    // });
    //
    // if ($('#filter_value').length > 0) {
    //     $('#DataTables_Table_0_filter input').val($('#filter_value').val()).trigger('keyup');
    // }
    //
    $('#refresh_code').on('click', function () {
        passwordGenerate();
    });


    /*********************** Coupon ********************************/

    $('.coupon_type').on('change', function () {
        if ($(this).val() == "Percentage") {
            $('.couponValueLimit').show();
            $('#coupon_value_limit').addClass('required').prop('disabled', false);
            $('#minimum_spend').removeClass('required');
        } else {
            $('.couponValueLimit').hide();
            $('#coupon_value_limit').removeClass('required').prop('disabled', true);
            $('#minimum_spend').addClass('required');
        }
    });

    $('#included_categories').on('change', function () {
        if ($(this).val().length) {
            $("#excluded_categories").prop('disabled', true).val();
            $("#included_products").prop('disabled', true).val();
        } else {
            $("#excluded_categories").prop('disabled', false).val();
            $("#included_products").prop('disabled', false).val();
        }
    });
    $('#excluded_categories').on('change', function () {
        if ($(this).val().length) {
            $("#included_categories").prop('disabled', true).val();
            $("#excluded_products").prop('disabled', true).val();
        } else {
            $("#included_categories").prop('disabled', false).val();
            $("#excluded_products").prop('disabled', false).val();
        }
    });
    $('#included_products').on('change', function () {
        var excluded_categories = $('#excluded_categories').val() ?? [];
        if (excluded_categories.length) {
            $("#included_categories").prop('disabled', true).val();
            $("#excluded_products").prop('disabled', true).val();
        } else {
            if ($(this).val().length) {
                $("#included_categories").prop('disabled', true).val();
                $("#excluded_categories").prop('disabled', true).val();
                $("#excluded_products").prop('disabled', true).val();
            } else {
                $("#included_categories").prop('disabled', false).val();
                $("#excluded_categories").prop('disabled', false).val();
                $("#excluded_products").prop('disabled', false).val();
            }
        }
    });
    $('#excluded_products').on('change', function () {
        var included_categories = $('#included_categories').val() ?? [];
        if (included_categories.length) {
            $("#excluded_categories").prop('disabled', true).val();
            $("#included_products").prop('disabled', true).val();
        } else {
            if ($(this).val().length) {
                $("#excluded_categories").prop('disabled', true).val();
                $("#included_categories").prop('disabled', true).val();
                $("#included_products").prop('disabled', true).val();
            } else {
                $("#excluded_categories").prop('disabled', false).val();
                $("#included_categories").prop('disabled', false).val();
                $("#included_products").prop('disabled', false).val();
            }
        }
    });


    $('#included_categories').on('change', function () {
        var categories = $(this).val() ?? [];
        $.ajax({
            type: 'POST', dataType: 'json', data: {categories}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/coupon/category-products', success: function (response) {
                if (response.status == true) {
                    if (response.products.length > 0) {
                        $("#excluded_products").empty();
                        $.each(response.products, function (key, value) {
                            $('#excluded_products').append('<option value="' + value.id + '"' + '>' + value.title + '</option>');
                        });
                    } else {
                        $('#excluded_products').append('<option value="">No Products Available</option>');
                    }
                } else {
                    swal('Error !', response.message, 'error');
                }
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $('#excluded_categories').on('change', function () {
        var categories = $(this).val() ?? [];
        $.ajax({
            type: 'POST', dataType: 'json', data: {categories}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/coupon/category-products', success: function (response) {
                if (response.status == true) {
                    if (response.products.length > 0) {
                        $("#included_products").empty();
                        $.each(response.products, function (key, value) {
                            $('#included_products').append('<option value="' + value.id + '"' + '>' + value.title + '</option>');
                        });
                    } else {
                        $('#included_products').append('<option value="">No Products Available</option>');
                    }
                } else {
                    swal('Error !', response.message, 'error');
                }
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $('#allow_public').on('change', function () {
        if ($(this).val() == "Yes") {
            $('.allowedMail').hide();
        } else {
            $('.allowedMail').show();
            $('#allowed_mails').val(['']).change();
        }
    });

    /********************* Reports ***********************/
    $(document).on('click', '#cart-list-search', function (e) {
        e.preventDefault();
        var _token = token;
        $.ajax({
            type: 'POST', dataType: 'html', data: $('#cart-list-filter-form').serialize(), headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/mail/cart_list_filter', success: function (response) {
                if (response != '0') {
                    $('#cart-list-html').html(response);
                    load_table();
                } else {
                    swal({
                        title: "Error", text: response.message, type: 'error'
                    });
                }
            }
        });
    });

    $(document).on('click', '#send_notify_btn', function (e) {
        e.preventDefault();
        var _token = token;
        var id = $('#ids').val();
        swal({
            title: "Are you sure?",
            text: "You will be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, send it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $('.confirm').prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + '/mail/send-multi-cart-notification',
                    data: {id: id, _token: _token},
                    success: function (data) {
                        $('.confirm').prop('disabled', false);
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            swal({
                                title: "Success", text: "Notification has been sent successfully!", type: "success"
                            }, function () {
                                location.reload();
                            });
                        }
                    }
                })
            } else {
                swal("Cancelled", "Entry remain safe :)", "error");
            }
        });
    });

    $(document).on('click', '.track-order-products', function (e) {
        e.preventDefault();
        var order_id = $(this).data('id');
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: base_url + '/order/track_order_products',
            data: {order_id: order_id, _token: _token},
            success: function (response) {
                if (response != 0) {
                    $('#order-product-modal-content').html(response);
                    $('#order-product-modal').modal('show');
                } else {
                    swal('Error !', 'Error while loading the product form', 'error');
                }
            }
        });
    });

    $(document).on('click', '.invoice_resend', function (e) {
        e.preventDefault();
        var order_id = $(this).data('id');
        var _token = token;
        swal({
            title: "Are you sure?",
            text: "Send Invoice again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, send!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $('.confirm').prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + '/order/invoice_resend',
                    data: {_token: _token, order_id: order_id},
                    success: function (data) {
                        $('.confirm').prop('disabled', false);
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            swal({
                                title: "Success", text: "Order invoice has been sent successfully", type: "success"
                            }, function () {
                                location.reload();
                            });
                        }
                    }
                })
            } else {
                swal("Cancelled", "Invoice not Sent", "error");
            }
        });
    });

    $(document).on('change', '#orderStatus', function (e) {
        e.preventDefault();
        var status = $(this).val();
        var product_id = $(this).data('id');
        var order_id = $(this).data('order_id');
        var coupon_min = $(this).data('coupon_min');
        var order_total = $(this).data('order_total');
        var price = $(this).data('price');
        var all_product_statuses = $(this).data('all_product_statuses').split(',');
        var message = "Are you sure want to change the status?";
        var url = '/order/order_status';
        if (status == "Cancelled" || status == "Refunded" || status == "Failed") {
            if (parseFloat(coupon_min) > parseFloat((order_total - price))) {
                if (all_product_statuses.includes('Shipped') || all_product_statuses.includes('Out For Delivery') || all_product_statuses.includes('Delivered') || all_product_statuses.includes('Completed') || all_product_statuses.includes('Returned') || all_product_statuses.includes('Refunded')) {
                    message = "Changing status of this product to " + status + " may break the coupon conditions.";
                } else {
                    message = "Changing status of this product to " + status + " may lead to cancellation of all products, as new price will be less than applied coupon minimum spend.";
                    url = '/order/cancel_all';
                }
            }
        }
        swal({
            title: "Are you sure?",
            text: message,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, change it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $('.confirm').prop('disabled', true);
                $.ajax({
                    type: 'POST', dataType: 'json', url: base_url + url, headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, data: {product_id: product_id, status: status, order_id: order_id}, success: function (data) {
                        $('.confirm').prop('disabled', false);
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            swal({
                                title: "Success",
                                text: data.message,
                                type: "success",
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            window.location.reload();
                        }
                    }
                })
            } else {
                swal("Cancelled", "Entry remain safe :)", "error");
            }
        });
    });

    $(document).on('click', '.refund-btn', function (e) {
        e.preventDefault();
        var status = 'Refunded';
        var product_id = $(this).data('id');
        var order_id = $(this).data('order_id');
        var _token = token;
        swal({
            title: "Are you sure?",
            text: "You will not be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, change it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: base_url + '/order/order_status',
                    data: {product_id: product_id, _token: _token, status: status, order_id: order_id},
                    success: function (data) {
                        if (data.status == false) {
                            swal('Error !', data.message, 'error');
                        } else {
                            swal({
                                title: "Success", text: "Order status has been changed succesfully", type: "success"
                            }, function () {
                                location.reload();
                            });
                        }
                    }
                })
            } else {
                swal("Cancelled", "Entry remain safe :)", "error");
            }
        });
    });

    $('#report_order_id').on('change', function () {
        var order_id = $(this).val();
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'html',
            data: {order_id: order_id, _token: _token},
            url: base_url + '/report/order-offer',
            success: function (response) {
                if (response != '0') {
                    $('#result-offer-table').html(response);
                    load_table();
                } else {
                    swal('Error !', 'Error while filter the element', 'error');
                }
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $('#filter-customer-report').on('click', function (e) {
        e.preventDefault();
        var customer = $('#order_customer_id').val();
        var status = $('#order_status').val();
        var _token = token;
        if ($('#order_customer_id').val() != '') {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                data: {_token: _token, customer: customer, status: status},
                url: base_url + '/report/customer/order-report',
                success: function (response) {
                    if (response != '0') {
                        $('#result-customer-table').html(response);
                        load_table();
                        swal('Success !', 'Filter completed', 'success');
                    } else {
                        swal('Error !', 'Error while filter the element', 'error');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        } else {
            swal('Error !', 'Please select any customer', 'error');
        }
    });


    $(document).on('change', '#banner_type', function () {
        if ($(this).val() == 'video') {
            $('#video-div').show();
            $('#thumbnail_div').show();
            $('#slider-div').hide();
        } else {
            $('#video-div').hide();
            $('#thumbnail_div').hide();
            $('#slider-div').show();
        }
    });


    $('#bannertypeSubmit').on('click', function () {
        var type = $(this).data('type');
        var bannerType = $('#banner_type').val();
        var buttonHtml = $('#bannertypeSubmit').val();
        var _token = token;
        var url = $(this).data('url');
        var required = [];
        $('.required').each(function () {
            var id = $(this).attr('id');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id + '_error').html('This field is required').css({
                    'color': '#FF0000', 'font-size': '14px'
                });
            } else {
                $('#' + id + '_error').html('');
            }
        });
        if (required.length == 0) {
            $('.loadingImg').show();
            $('#bannertypeSubmit').attr('disabled', true).val('Please wait...!');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + url,
                data: {_token, type, bannerType},
                success: function (response) {
                    if (response.status == true) {
                        swal({
                            title: "Done it!", text: response.message, type: "success"
                        });
                        $('.loadingImg').hide();
                        $('#bannertypeSubmit').attr('disabled', false).val(buttonHtml);
                    } else {
                        swal('Error !', 'Error while updating the heading', 'error');
                    }
                }
            });
        }
    });


});

function passwordGenerate() {
    var length = 8;
    var string = "abcdefghijklmnopqrstuvwxyz"; //to upper
    var numeric = '0123456789';
    var punctuation = '!@#$%^&*()_+~`|}{[]\:;?><,./-=';
    var password = "";
    var character = "";
    var crunch = true;
    while (password.length < length) {
        entity1 = Math.ceil(string.length * Math.random() * Math.random());
        entity2 = Math.ceil(numeric.length * Math.random() * Math.random());
        entity3 = Math.ceil(punctuation.length * Math.random() * Math.random());
        hold = string.charAt(entity1);
        hold = (password.length % 2 == 0) ? (hold.toUpperCase()) : (hold);
        character += hold;
        character += numeric.charAt(entity2);
        character += punctuation.charAt(entity3);
        password = character;
    }
    password = password.split('').sort(function () {
        return 0.5 - Math.random()
    }).join('');

    $("#password").val(password);
}

function initTinyMceEditor() {
    tinymce.init({
        selector: '.tinyeditor',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [{title: 'My page 1', value: 'https://www.tiny.cloud'}, {
            title: 'My page 2', value: 'http://www.moxiecode.com'
        }],
        image_list: [{title: 'My page 1', value: 'https://www.tiny.cloud'}, {
            title: 'My page 2', value: 'http://www.moxiecode.com'
        }],
        image_class_list: [{title: 'None', value: ''}, {title: 'Some class', value: 'class-name'}],
        importcss_append: true,
        templates: [{
            title: 'New Table',
            description: 'creates a new table',
            content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
        }, {title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...'}, {
            title: 'New list with dates',
            description: 'New List with dates',
            content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
        }],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 200,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        skin: 'oxide',
        content_css: 'default',
        relative_urls: false,
        document_base_url: fc_path,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        filebrowserUploadUrl: base_url + 'uploads/editor/',
        images_upload_base_path: base_url + 'public/uploads/editor/',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', base_url + '/home/image_process?_token=' + token);

            xhr.onload = function () {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };

            formData = new FormData();
            formData.append('upload', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },
    });
}


/*********************** Delete file while editing time ********************************/
// to delete an uploaded file
$(document).on('click', '.kv-file-remove', function (e) {
    e.preventDefault();
    var type = $(this).data('key');
    if (type) {
        swal({
                title: "Are you sure?",
                text: "You will be able to revert this!",
                type: "warning",
                showCancelButton: true,
                
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        dataType: 'json',
                        url: base_url + '/kv-delete-file',
                        data: {type},
                        success: function (data) {
                            if(data.status==false){
                                swal({ 
                                    showConfirmButton : false,
                                    title : 'Error !',
                                    text :  data.message, 
                                    type :   'error'
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 700);
                            }else{
                                swal({showConfirmButton : false, title: "Success", text: "Entry has been deleted!", type: "success"},
                                    function(){
                                        location.reload();
                                    }
                                );
                                setTimeout(() => {
                                    location.reload();
                                }, 700);
                            }
                        }
                    })
                } else {
                    swal("Cancelled", "Entry remain safe", "error");
                }
            });
    }else{
        swal( 'Error !', 'Entry not found', 'error' );
    }
});

