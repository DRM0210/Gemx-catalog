<script>


    // Edid profile

    $('#profilebtn').on('click', function() {
        // Get form data
        var formData = $('#editprofile').serialize();


        $.ajax({
            type: 'POST',
            url: '{{ route('user.catalogue.editprofile') }}',
            data: formData,
            success: function(response) {
                $('#message').text(response);
            },

        });
    });

    // Edid profile
    $(document).on('click', '.toggle-password', function() {
        var input = $($(this).attr('toggle'));
        if (input.attr('type') == 'password') {
            input.attr('type', 'text');
        } else {
            input.attr('type', 'password');
        }
    });

    $(document).on('click', '.toggle-password2', function() {
        var input = $($(this).attr('toggle'));
        if (input.attr('type') == 'password') {
            input.attr('type', 'text');
        } else {
            input.attr('type', 'password');
        }
    });


    $('#updatepassword').on('click', function() {
        // Get form data
        var formData = $('#passwordform').serialize();
        var new_pass = $('[name="new_pass"]').val();
        var confirm_pass = $('[name="confirm_pass"]').val();
        if (new_pass == confirm_pass) {
            $.ajax({
                type: 'POST',
                url: '{{ route('user.catalogue.editpassword') }}',
                data: formData,
                success: function(response) {
                    $('#message').text(response);
                },
            });
        } else {
            $('#message').html("<span>Don't Match New Password And Confirm Password</span>");
        }
    });
    // email verification
    $(document).ready(function() {

        // Qotation
        $('#emailverfication').on('submit', function(e) {
            e.preventDefault();
            var myform = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('user.emailverification') }}",
                data: myform,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log('Response:', response);

                    if (response.msg == 1) {
                        var securitycode = response.catid;
                        var userid = response.userid;
                        window.location.href =
                            '{{ route('user.allproduct', [':securitycode', ':userid']) }}'
                            .replace(':securitycode', securitycode)
                            .replace(':userid', userid);

                        // console.log('Response is 1');
                        // $('#exampleModal').hide();
                        // $('.modal-backdrop').hide();
                        // $('#allproductpage').show();
                    } else {
                        
                        alertify.success(response.error);
                        $('#error_login').text(response.error);
                    }
                }
            });
        });
    });



    // Quotation select
    $('.quotation').on('click', function() {
        var catid = $('#catid').val();
        var pid = $('input[name="shortlist[]"]:checked').map(function() {
            return this.value;
        }).get();

        var userid = document.getElementById('userid').value;

        if (pid.length > 0) {

            // Redirect to the route with the pid value as a parameter
            window.location.href = '{{ route('user.quotation', [':pid', ':userid', ':catid']) }}'
    .replace(':pid', pid)
    .replace(':userid', userid)
    .replace(':catid', catid);

        }

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
</script>


<script>
    $(document).on('click', '.pricegraf', function() {
        var pid = $(this).attr('data-id');
        $('#prod_idgraf').val(pid);
        $.ajax({
            type: 'POST',
            url: "{{ route('user.pricegraf') }}",
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
            url: "{{ route('user.addamount') }}",
            dataType: 'JSON',
            data: {
                'qty1': qty,
                'pid': pid,
                'sellprice': sellprice,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#prod_qty'+pid).val(qty);
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
    })


// send order inquiry

$(document).on('click', '.sendorder', function() { 
    var tabledata = $('#invoicedata').html();
    var catid = $('#catid').val();
    var notes = $('#invoice_detail_notes').val();
    var company_id = $('#company_id').val();
    var product_id = $("input[name='product_id[]'][type='hidden']").map(function() {
            return this.value;
        }).get();
    var prod_qty = $("input[name='prod_qty[]'][type='hidden']").map(function() {
            return this.value;
        }).get();
        var button = $(this);
        // Show the loader
        button.find('.spinner-border').removeClass('d-none');
        button.prop('disabled', true);
    $.ajax({
            type: 'POST',
            url: "{{ route('user.quotationsend') }}",
            dataType: 'JSON',
            data: {
                'company_id': company_id,
                'product_id': product_id,
                'prod_qty': prod_qty,
                'notes': notes,
                'tabledata': tabledata,
                'catid': catid,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {

                button.find('.spinner-border').addClass('d-none');
                 button.prop('disabled', false);
               if(response.success){
                    alertify.success(response.success);
               }else{
                    alertify.error(response.error)
               }
           setTimeout(function() {
            window.location.href = '{{ route('user.catalogue.deshbored') }}'
          }, 5000);
          

            }
        });
});


// sendinvoice 

$(document).on('click', '.sendinvoice', function() { 
    var tabledata = $('#invoicedata').html();
    var catid = $('#catid').val();
    var total = $('#gtotal').text();
    var alldiscount = $('#alldiscount').text();
    var grandtotal = $('#grandtotal').text();
    var notes = $('#invoice_detail_notes').val();
    var company_id = $('#company_id').val();
    var product_id = $("input[name='product_id[]'][type='hidden']").map(function() {
            return this.value;
        }).get();
    var quantity = $("input[name='quantity[]'][type='hidden']").map(function() {
            return this.value;
        }).get();
  var status = $(this).attr('data-id');

        var button = $(this);
       // Show the loader
        button.find('.spinner-border').removeClass('d-none');
        button.prop('disabled', true);
    $.ajax({
            type: 'POST',
            url: "{{ route('user.doneinvoice') }}",
            dataType: 'JSON',
            data: {
                'company_id': company_id,
                'product_id': product_id,
                'quantity': quantity,
                'status': status,
                'total': total,
                'grandtotal': grandtotal,
                'notes': notes,
                'tabledata': tabledata,
                'alldiscount': alldiscount,
                'catid': catid,
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {

                button.find('.spinner-border').addClass('d-none');
                 button.prop('disabled', false);
               if(response.success){
                    alertify.success(response.success);
               }else{
                    alertify.error(response.error)
               }
           setTimeout(function() {
            window.location.href = '{{ route('user.catalogue.deshbored') }}'

          }, 5000);
          

            }
        });
});


</script>
