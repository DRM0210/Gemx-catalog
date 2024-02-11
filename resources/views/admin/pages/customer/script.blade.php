<script>
    $(document).ready(function() {
     

        //add customer
        $(document).on('click', '.addCustomer', function() {
            $('#addTitle').text('');
            $('#addTitle').text('Add Customer');
            $('#addBtn').text('');
            $('#addBtn').text('Save');
            $('#myform')[0].reset();
            var url = $(this).attr('data-url');
            $('#myform').attr('action', '')
            $('#myform').attr('action', url)
            $('#addCustomer').modal('show');
        });

        //save form
        $('#myform').on('submit', function(e) {
            e.preventDefault();
            var myform = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: myform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);

                        $('#addCustomer').modal('hide');
                        $('#datatable').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        $('#addCustomer').modal('hide');
                        $('#datatable').DataTable().draw();
                    } else {
                        var errors = response.errors;
                        // Loop through the errors and display them on the page
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }
            });
        })

        $(document).on('click', '.edit', function() {
            $('#addTitle').text('');
            $('#addTitle').text('Edit Customer');
            $('#addBtn').text('');
            $('#addBtn').text('Update');
            $('#myform')[0].reset();
            var url = $(this).attr('data-update');
            var edit = $(this).attr('data-edit');
            $('#myform').attr('action', '');
            $('#myform').attr('action', url);

            $.ajax({
                type: 'post',
                url: edit,
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#fname').val(response.name);
                    $('#lname').val(response.lName);
                    $('#email').val(response.email);
                    $('#phone').val(response.mobile);
                    $('#addresh').val(response.address);
                    $('#tin').val(response.pinno);
                    $('#company').val(response.company);

                    $('#addCustomer').modal('show');
                }
            })

            $('#addCustomer').modal('show');
        })

        //delete 
        $(document).on('click', '.delete', function() {
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
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });

        //excel file
        $(document).on('click', '#exportfile', function() {
            //  var table = $("#datatable");
            var cid = $("input[name='checkbox[]']:checked").map(function() {
            return $(this).val();
        }).get();
       
            $.ajax({
                        type: 'POST',
                        url: '{{Route('excel.exporetdata')}}',
                        dataType: 'JSON',
                        data: {
                            cid: cid,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.success(response.success);
                        }
                    })
            //const table = document.getElementById("datatable");
            // const ws = XLSX.utils.table_to_sheet(table);
            // const wb = XLSX.utils.book_new();
            // XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

            // XLSX.writeFile(wb, "table.xlsx");
        })
        //customer table
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('admin.customer') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            }, 
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false
                },
                {
                    data: 'sr_number',
                    name: 'sr_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'address',
                    name: 'address'
                },

                {
                    data: 'pinno',
                    name: 'pinno'
                },
                {
                    data: 'company',
                    name: 'company'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ]
        });

    // selectall
    $(document).on('click', '#selectall', function() { 
    $('.checkbox').prop('checked', $(this).prop('checked'));
});

    $(document).on('click', '.closemodal', function() { 
    $('#addCustomer').modal('hide');
   });


   //delete all
    $(document).on('click', '.deleteall', function() { 
        var cid = $("input[name='checkbox[]']:checked").map(function() {
            return $(this).val();
        }).get();
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('customer.deletecheck')}}',
                        dataType: 'JSON',
                        data: {
                            cid: cid,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#datatable').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
    });

   // update all
   
    })


</script>
