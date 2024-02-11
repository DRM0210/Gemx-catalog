<script>
    $(document).ready(function() {

        $('#oldprivew').hide();
        $('#nextbutton').hide();

        $(document).on('click', '.removprod', function() {
            $(this).closest('tr').remove();
        })
    });

    function searchdata() {
        var catid = $("input[name='cat[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var unitid = $("input[name='unit[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var groupid = $("input[name='group[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var brandid = $("input[name='brand[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var colorid = $("input[name='color[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var lengthid = $("input[name='brand[]']:checked").map(function() {
            return $(this).val();
        }).get();

        $.ajax({

            type: "get",
            url: '{{ route('catalogue.index') }}',
            data: {
                'catid': catid,
                'unitid': unitid,
                'groupid': groupid,
                'brandid': brandid,
                'colorid': colorid,
                'lengthid': lengthid,
            },
            success: function(data1) {
                console.log(data1);
                $('#views').html(data1.filterView);

            }
        });
    }

    // search_product
  $(document).on('keyup','#search_product', function(){

        var searchdata =  $(this).val();
        var catid = $("input[name='cat[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var unitid = $("input[name='unit[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var groupid = $("input[name='group[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var brandid = $("input[name='brand[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var colorid = $("input[name='color[]']:checked").map(function() {
            return $(this).val();
        }).get();
        var lengthid = $("input[name='brand[]']:checked").map(function() {
            return $(this).val();
        }).get();

        $.ajax({

            type: "get",
            url: '{{ route('catalogue.index') }}',
            data: {
                'catid': catid,
                'unitid': unitid,
                'groupid': groupid,
                'brandid': brandid,
                'colorid': colorid,
                'lengthid': lengthid,
                'search': searchdata,
            },
            success: function(data1) {
                console.log(data1);
                $('#views').html(data1.filterView);

            }
        });
    })

    // Get buyer detail
    $('#productbtn').click(function() {
        // Get form data
        var formData = {
            catlog_name: $('#catlog_name').val(),
            buyername: $('#buyername').val(),
            buyer_email: $('#buyer_email').val(),
            // Add more fields as needed
        };

        // Send AJAX request
        $.ajax({
            url: '{{ route('catalogue.add_buyer') }}',
            type: 'GET',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#ex1-tabs-1').hide();
                    $('#allcatalogue').show();
                } else {
                    var errors = response.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });


    function checkprod() {
        var ids = $("input[name='checkprod[]']:checked").map(function() {
            return $(this).val();
        }).get();

        var url = "{{ route('catalogue.catloglisting', ':ids') }}";
        url = url.replace(':ids', ids.join(','));

        $('#nextbutton').show();

        $('#nextbutton').html('<a style="text-decoration: none; color: white;" href="' + url + '">Next</a>');
    }

    // show buyer data

    function buyeridOnChange(selectedValue) {
        $.ajax({
            url: '{{ route('catalogue.buyerdata') }}',
            method: 'get',
            data: {
                buyerid: selectedValue
            },
            success: function(response) {
                var catlogname = response.catlogname;
                var buyer = response.buyer;
                $('#catalogue_name').val(catlogname);
                $('#buyer_name').val(buyer.name);
                $('#buyer_email').val(buyer.email);
            },
        });
    }

    function genrate_catalogue() {
        var formData = $('#formElement').serialize();
        var selling_price = $('input[name="selling_price"]:checked').val();
        var name = $('input[name="name"]:checked').val();
        var descripation = $('input[name="descripation"]:checked').val();
        var color = $('input[name="color"]:checked').val();
        var production_technique = $('input[name="production_technique"]:checked').val();
        var material = $('input[name="material"]:checked').val();
        var size = $('input[name="size"]:checked').val();
        var shape = $('input[name="shape"]:checked').val();
        var sampling_time = $('input[name="sampling_time"]:checked').val();
        var production_time = $('input[name="production_time"]:checked').val();
        var moq = $('input[name="moq"]:checked').val();
        var remarks = $('input[name="remarks"]:checked').val();
        var pid = $("input[name='pid[]'][type='hidden']").map(function() {
            return this.value;
        }).get();

        var buyerid = $('[name="buyerid"]').val();
        var catalogueName = $('[name="catalogue_name"]').val();
        var buyername = $('[name="buyer_name"]').val();
        var buyeremail = $('[name="buyer_email"]').val();
        $.ajax({
            url: '{{ route('catalogue.genratecatalogue') }}',
            method: 'get',
            data: {
                catalogueName: catalogueName,
                buyername: buyername,
                buyeremail: buyeremail,
                selling_price: selling_price,
                name: name,
                descripation: descripation,
                color: color,
                production_technique: production_technique,
                material: material,
                size: size,
                shape: shape,
                sampling_time: sampling_time,
                production_time: production_time,
                moq: moq,
                remarks: remarks,
                pid: pid,
                buyerid: buyerid
            },
            success: function(response) {
                var maxId = response.max_id;
                var securityCode = response.securitycode;

                window.location.href =
                    '{{ route('catalogue.sendbuyerlinkready', [':maxId', ':securityCode']) }}'
                    .replace(':maxId', maxId)
                    .replace(':securityCode', securityCode);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
    //linknext
    $(document).ready(function() {
        $('.copylinkbtn').hide();

        $(document).on('mouseover', '.linknext', function() {
            var id = $(this).attr('data-id');
            $(this).hide();
            $('#copylinkbtn' + id).show();
        });
        $(document).on('mouseout', '.copylinkbtn', function() {
            var id = $(this).attr('data-id');

            $('#linknext' + id).show();
            $(this).hide();
        });
    });

    $(document).on('click', '.copylinkbtn', function() {
        var id = $(this).attr('data-id');
        var linkText = $('#linknext' + id).text();

        navigator.clipboard.writeText(linkText)
            .then(function() {
                alertify.warning('Link copied to clipboard');
                console.log('Link copied to clipboard');
            })
            .catch(function(err) {

                alertify.error('Unable to copy link to clipboard', err);

                console.error('Unable to copy link to clipboard', err);
            });
    });


    $('#priviewinvoice').on('click', function() {
        $('#quntitytext').css('display', 'block');
        $('#quantity').hide(); // Corrected line to hide the quantity element
        var invoicedata = $('#invoicedata').html();
        $('#invoiceviewdata').html(invoicedata);
        var client_name = $('#client_name').val();
        var client_email = $('#client_email').val();
        var client_address = $('#client_address').val();
        var client_phone = $('#client_phone').val();


        var invoice_detail_notes = $('#invoice_detail_notes').val();

        $('#priviewcust_name').text(client_name);
        $('#priviewcust_email').text(client_email);
        $('#priviewcust_address').text(client_address);
        $('#priviewcust_mobile').text(client_phone);
        $('#notes').text(invoice_detail_notes);
    });

    $('#dismispriviewdata').on('click', function() {
        $('#quntitytext').css('display', 'none');
        $('#quantity').show(); // Corrected line to hide the quantity element
    })

    $(document).on('click', '.sendemail', function() {
        var id = $('#catalogueId').val();
        var token = $('#token_id').val();
        var button = $(this);
        // Show the loader
        button.find('.spinner-border').removeClass('d-none');
        button.prop('disabled', true);
        $.ajax({
            type: 'post',
            url: '{{ route('catalogue.emailSend') }}',
            dataType: 'json',
            data: {
                id: id,
                cat_token: token,
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                // Hide the loader
                button.find('.spinner-border').addClass('d-none');
                button.prop('disabled', false);
                if (response.success) {
                    alertify.success(response.success);
                } else {
                    alertify.error(response.error)
                }
            }
        });
    });

    $(document).on('click', '.pdfGenerate', function() {

        var catId = $(this).attr('data-id');
        var cat_token = $(this).attr('data-token');
        var button = $(this);
        // Show the loader
        // button.find('.spinner-border').removeClass('d-none');
        // button.prop('disabled', true);
        $.ajax({
            type: 'post',
            url: '{{ route('admin.pdfGenerate') }}',
            dataType: 'JSON',
            data: {
                catId: catId,
                cat_token: cat_token,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                button.find('.spinner-border').addClass('d-none');
                button.prop('disabled', false);
                if (response.success) {
                    // Dynamically create a link and simulate a click to trigger the download
                    var downloadLink = document.createElement('a');
                    downloadLink.href = response.download_link;
                    downloadLink.download = 'quotation.pdf'; // Set the desired file name
                    downloadLink.click();

                    alertify.success('PDF successfully generated!');
                } else {
                    alertify.error('Failed to generate PDF');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alertify.error('Error: ' + xhr.responseText);
            }
        })
    });
</script>


<script>
    $(document).on('click', '.pricegraf', function() {
        var pid = $(this).attr('data-id');
        $('#prod_idgraf').val(pid);
        $.ajax({
            type: 'POST',
            url: "{{ route('catalogue.pricegraf') }}",
            dataType: 'JSON',
            data: {
                'pid': pid,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                //alert(response)
                $('#qty_datatable').html('');

                $.each(response, function(key, value) {
                    $('#qty_datatable').append(' <tr>\
                                <td> ' + value.qty + '</td>\
                                <td>' + value.price + ' </td>\
                              </tr>')
                })
                $('#pricegraf').modal('show');
            }
        });
    });

    $(document).on('keyup', '.changeamount', function() {
        var qty = $(this).val();
        var pid = $('#prod_idgraf').val();
        var sellprice = parseFloat($('#selling_price' + pid).text());
        var oldgtotal = parseFloat($('#gtotal').text());
        var oldtotal = parseFloat($('#amount_1' + pid).text());
        var allprice = oldgtotal - oldtotal;
        $.ajax({
            type: 'POST',
            url: "{{ route('catalogue.addamount') }}",
            dataType: 'JSON',
            data: {
                'qty1': qty,
                'pid': pid,
                'sellprice': sellprice,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#totalprice').text('$' + response.data);
                $('#amount_1' + pid).text(response.data);
                $('#discount' + pid).text(response.discount + '%');



                if (!isNaN(allprice)) {
                    var allgtotal = response.data +
                        allprice; // Assuming response is a numeric value
                    $('#gtotal').text(allgtotal);
                }


            }
        });
    })


    $(document).on('click', '.close', function() {
        $('#pricegraf').modal('hide');
        $('#variantview').modal('hide');

    })





    // variant_view
    $(document).on('click', '.variant_view', function() {
        $('.variantdata').html('');
        var pid = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: "{{ route('catalogue.productvariaint') }}",
            dataType: 'JSON',
            data: {
                'pid': pid,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response != '') {
                    $.each(response, function(key, value) {

                        $('.variantdata').append(' <tr>\
                <td> ' + value.varian_1 + '</td>\
                <td>' + value.varian_2 + ' </td>\
              </tr>')


                    })
                } else {
                    $('.variantdata').append('<p class="text-center">No Data Available</p>')
                }
                $('#variantview').modal('show');


            }
        });

    })

    $(document).ready(function() {

        $(document).on('click', '.exampleModalbtn', function() {
            $('#exampleModal').modal('show');
        });

        // show permission data
        $(document).on('click', '.doneprmition', function() {
            $('#exampleModal').modal('hide');
            alert(123);
            var selling_price = $('input[name="selling_price"]:checked').val();
            var name = $('input[name="name"]:checked').val();
            var descripation = $('input[name="descripation"]:checked').val();
            var color = $('input[name="color"]:checked').val();
            var production_technique = $('input[name="production_technique"]:checked').val();
            var material = $('input[name="material"]:checked').val();
            var size = $('input[name="size"]:checked').val();
            var shape = $('input[name="shape"]:checked').val();

            if (name != "") {
                $('.nametd').text('');
            }
            if (descripation != "") {
                $('.descriptiontd').text('');
            }
            if (selling_price != "") {
                $('.sellingtd').text('');
            }
            // if (color != "" && size != "") {
            //     $('.buttonvarianttd').text('');
            // }
        });


        $(document).on('click', '#maincheckbox', function() { 
    $('.checkprod').prop('checked', $(this).prop('checked'));
});
    });
</script>
