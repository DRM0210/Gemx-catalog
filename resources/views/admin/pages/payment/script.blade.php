<script>
    $(document).ready(function() {
        //save form
        $('#addaccountform').on('submit', function(e) {
            e.preventDefault();
            var myform = new FormData(this);
            var id = $('#customerid').val();
            if (id != "") {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: myform,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            alertify.success(response.update);
                            $('#views_account').html(response.success);
                            $('#addaccountform')[0].reset();
                            $('#add_company_acc').text('Add Account');
                            $('.titleform').text('Add New Company Account:-');
                            $('#addaccountform').attr('action', '')
                            var url = '{{ route('payment.create') }}';
                            $('#addaccountform').attr('action', url)
                        } else {
                            var errors = response.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').text(value[0]);
                            });
                        }
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: myform,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            alertify.success('Added Successfully');
                            $('#views_account').html(response.success);
                            $('#addaccountform')[0].reset();

                        } else {
                            var errors = response.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').text(value[0]);
                            });
                        }
                    }
                });
            }

        })
    })




    $(document).on('click', '.deactive', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '{{ route('payment.activaccount') }}',
            dataType: 'JSON',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#views_account').html(response.filterView)
                alertify.success('Account has been changed successfully!');
            }
        });
    })



    $(document).on('click', '.editaccount', function() {
        $('#add_company_acc').text('Update');
        $('.titleform').text('Edit Company Account:-');

        $('#addaccountform')[0].reset();
        var url = $(this).attr('data-update');
        var edit = $(this).attr('data-edit');
        $('#addaccountform').attr('action', '');
        $('#addaccountform').attr('action', url);

        $.ajax({
            type: 'post',
            url: edit,
            dataType: 'JSON',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#company_name').val(response.company_name);
                $('#company_email').val(response.company_email);
                $('#company_address').val(response.company_address);
                $('#company_phone').val(response.company_phone);
                $('#bank_account').val(response.bank_account);
                $('#bank_name').val(response.bank_name);
                $('#ifsc_code').val(response.ifsc_code);
                $('#country_name').val(response.country_name);
                $('#customerid').val(response.id);


            }
        })


    })

      //delete 
      $(document).on('click', '.deleteaccount', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#datatable').DataTable().draw();
                            $('#views_account').html(response.outputdata)
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });
</script>
