<script>
      $(document).ready(function() {
        $(document).on('keyup', '#discauntinput', function() {
    var discountPercentage = parseFloat($(this).val());

    if (isNaN(discountPercentage)) {
        console.error('Invalid discount percentage');
        return;
    }

    var originalPrice = parseFloat($('#gtotal').text());

    if (isNaN(originalPrice)) {
        console.error('Invalid original price');
        return;
    }

    var discountDecimal = discountPercentage / 100; // Convert percentage to decimal
    var discountAmount = originalPrice * discountDecimal; // Calculate the discount amount
    var discountedPrice = originalPrice - discountAmount; // Calculate the discounted price

    $('#alldiscount').text(discountedPrice.toFixed(2)); // Display the discounted price with two decimal places
});

     });


// send mail and invoice send 

     $(document).on('click', '.sendemail', function() { 
    var tabledata = $('#invoicedata').html();
    var catid = $('#catid').val();
    var discount = $('#discauntinput').val();
    var gtotal = $('#gtotal').text();
    var grandtotal = $('#alldiscount').text();
    var notes = $('#invoice_detail_notes').val();
    var company_id = $('#company_id').val();
    var product_id = $("input[name='product_id[]'][type='hidden']").map(function() {
            return this.value;
        }).get();
  var status = $(this).attr('data-id');
  if(status == 3){
    var url  = "{{ route('user.doneinvoice') }}";
  }else{
    var url  = "{{ route('quotation.send') }}";

  }
        var button = $(this);
       // Show the loader
        button.find('.spinner-border').removeClass('d-none');
        button.prop('disabled', true);
    $.ajax({
            type: 'POST',
            url: url,
            dataType: 'JSON',
            data: {
                'company_id': company_id,
                'product_id': product_id,
                'status': status,
                'gtotal': gtotal,
                'grandtotal': grandtotal,
                'discount': discount,
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
            window.location.href = '{{ route('quotation.index') }}'
          }, 5000);
          

            }
        });
});

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

</script>