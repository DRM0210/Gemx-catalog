<script>
    //product 
    $(document).ready(function() {

        const productImg = document.getElementById('productImg');
        const imagePreview = document.getElementById('imagePreview');
        productImg.addEventListener('change', function() {
            const file = productImg.files[0]; // Get the selected file
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
            }
        });
        $(function() {
            jQuery(document).ready(function() {
                $('#addprod').modally('addprod', {
                    max_width: 1200
                });
                $('#addCategory').modally('addCategory', {
                    max_width: 600
                });
                $('#addUnit').modally('addUnit', {
                    max_width: 600
                });
                $('#addGroup').modally('addGroup', {
                    max_width: 600
                });
                $('#addBrand').modally('addBrand', {
                    max_width: 600
                });
                $('#addColor').modally('addColor', {
                    max_width: 600
                });
                $('#addSize').modally('addSize', {
                    max_width: 600
                });
                $('#addvariantAttr').modally('addvariantAttr', {
                    max_width: 600
                });

                // $('#edit_modal').modally('edit_modal', {
                //     max_width: 1100
                // });
                // $('#edit_workman').modally();
                // $('#view_jury').modally();
            });
        })

        //add product 
        $(document).on('click', '.addProdd1', function() {
            $('#qyt_table').html('');
            $('#productbtn').text('');
            $('#productbtn').text('Save');
            $('#productform')[0].reset();
            $('#prodTitle').text('');
            $('#prodTitle').text('Add Product');
            $('.qtyPreview').html('');
            $('#price_details').val('');
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = '';
            $('#variant').show();
            $('#standrad').hide();
            $('#varint_list_table').hide();
            $('#productform').attr('action', '')
            $('#productform').attr('action', '{{ route('product.store') }}')
            getCategory()
            getUnit()
            getGroup()
            getBrand()
            getVariantAttribute();
            selectColor = [];
            updateHiddenField()

        })

        //product form error
        function error() {

            if ($('#name').val() != '') {
                $('#name_error').text('');
            }
            if ($('#description').val() != '') {
                $('#description_error').text('');
            }
            if ($('#category_id').val() != 'yes') {
                $('#category_id_error').text('');
            }
            if ($('#brand_id').val() != 'yes') {
                $('#brand_id_error').text('');
            }
            if ($('#group_id').val() != 'yes') {
                $('#group_id_error').text('');
            }
            if ($('#unit_id').val() != 'yes') {
                $('#unit_id_error').text('');
            }
            if ($('#name').val() != '') {
                $('#quantity_error').text('');
            }
            if ($('#tax').val() != '') {
                $('#tax_error').text('');
            }
            if ($('#productImg').val() != '') {
                $('#productImg_error').text('');
            }
            if ($('#product_multi').val() != '') {
                $('#product_multi_error').text('');
            }
            if ($('#purchase_price').val() != '') {
                $('#purchase_price_error').text('');
            }
            if ($('#selling_price').val() != '') {
                $('#selling_price_error').text('');
            }
            if ($('#sku').val() != '') {
                $('#sku_error').text('');
            }
            if ($('#color_mult').val() != 'yes') {
                $('#color_mult_error').text('');
            }
            if ($('#size_mult').val() != 'yes') {
                $('#size_mult_error').text('');
            }

        }
        $(document).on('click', '.gridRadios', function() {
            var get = $(this).val();
            if (get == 'standrad') {
                $('#standrad').hide();
                $('#varint_list_table').hide();
                $('#varint_table').html('');
                $('#variant_details').val('');
                $('#variant').show();
                $('#purchase_price').val('')
                $('#selling_price').val('')
                $('#sku').val('');
            }
            if (get == 'variant') {
                $('#standrad').show();
                $('#varint_list_table').show();
                $('#variant').hide();
                // getColor();
                // getSize();

            }

        });

        //save product
        $('#productform').on('submit', function(e) {
            e.preventDefault();
            getPrice()
            varintDetails();
            error();
            //var catform = new FormData(this);
            var modal_product = document.querySelector(".modally-wrap.addprod.open");
            var catform = new FormData($('#productform')[0]);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: catform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        modal_product.style.display = "none";
                        $('#product-table').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_product.style.display = "none";
                        $('#product-table').DataTable().draw();
                    } else {
                        var errors = response.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }
            });
        })

        //edit product 
        $(document).on('click', '.editProduct', function() {

            $('#productbtn').text('');
            $('#productbtn').text('Update');
            $('#productform')[0].reset();
            $('#prodTitle').text('');
            $('#prodTitle').text('Edit Product');
            var editUrl = $(this).attr('data-edit');
            var storUrl = $(this).attr('data-update')
            $('#productform').attr('action', '');
            $('#productform').attr('action', storUrl);
            $('#standrad').hide();
            $('#variant').show();
            $('#qyt_table').html('');
            $('#varint_table').html('');
            editProduct(editUrl);
            selectColor = [];
            updateHiddenField()
        });

        function editProduct(editUrl) {
            $.ajax({
                type: 'get',
                url: editUrl,
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    editQty(response.quantity);
                    editProductData(response)
                    //setVariantData(response.variants);
                    var edit = response.variants;
                    var editColorIds = [];
                    var editSizeIds = [];
                    $.each(edit, function(key, value) {
                        if (!editColorIds.includes(value.color_id)) {
                            editColorIds.push(value
                                .color_id); // Add unique 'color_id' to 'editColorIds' array
                        }
                        if (!editSizeIds.includes(value.size_id)) {
                            editSizeIds.push(value
                                .size_id); // Add unique 'size_id' to 'editSizeIds' array
                        }
                    })

                    var outputString = '';
                    selectvariant_1.forEach(function(item, index) {
                        outputString += index + '[' + item[0] + ',' + item[1] + ']';
                        if (index < selectvariant_1.length - 1) {
                            outputString += ' ';
                        }
                    });
                    $('#variantdetails_1').val('')
                    $('#variantdetails_1').val(outputString)
                    var editv = editColorIds + ',' + editSizeIds;
                    getVariantAttribute(editv, edit);

                }
            })
        }



        function editProductData(response) {
            $('#name').val(response.name);
            $('#description').val(response.description);
            $('#tax').val(response.tax);
            $('#productImg_hidden').val(response.product_themlin);
            $('#purchase_price').val(response.purchase_price)
            $('#selling_price').val(response.selling_price)
            $('#sku').val(response.sku);
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = '{{ asset('product_images/') }}/' + response.product_themlin;
            getUnit(response.unit_id)
            getCategory(response.category_id);
            getGroup(response.group_id);
            getBrand(response.brand_id);

            if (response.product_type === 'standrad') {
                $('#standrad').hide();
                $('#gridRadios1').prop('checked', true);
                $('#variant').show();
            } else if (response.product_type === 'variant') {
                $('#gridRadios2').prop('checked', true);
                $('#standrad').show();
                $('#varint_list_table').show();
                $('#variant').hide();

            }
            error();
            $('#category_id_error').text('');
            $('#brand_id_error').text('');
            $('#group_id_error').text('');
            $('#unit_id_error').text('');
        }

        function editQty(response) {

            $('#qyt_table').html('');
            $.each(response, function(key, value) {
                alert(value.selling_price)
                $('#qyt_table').append(
                    ' <tr>\
                                            <td>\
                                               <div class="form-row">\
                                                    <label class="col-md-2" for="">></label>\
                                                    <input type="text" class="form-control-sm col-md-8 quantity" name="quantity" id="quantity" value="' +
                                                        value.qty +
                                                        '">\
                                                    <div class="text-danger " id="quantity_error"></div>\
                                               </div>\
                                            </td>\
                                            <td>\
                                                <div class="form-row">\
                                                    <label class="col-md-3" for="">$</label>\
                                                    <input type="text" class="form-control-sm col-md-7 selling_price" name="selling_price" id="selling_price" value="' +
                                                    value.selling_price + '">\
                                                    <div class="text-danger " id="selling_price_error"></div>\
                                               </div>\
                                            </td>\
                                            <td>\
                                                <div class="form-row">\
                                                    <label class="col-md-3" for="">$</label>\
                                                    <input type="text" class="form-control-sm col-md-7 price" name="price" id="price" value="' +
                                                    value.price + '">\
                                                    <div class="text-danger " id="price_error"></div>\
                                               </div>\
                                            </td>\
                                            <td>\
                                                <i class="fa-solid fa-trash text-danger removeRow" "></i>\
                                            </td>\
                </tr>');
            });
            getPrice()

        }
        //add qty input 
        $(document).on('click', '.addQty', function() {
           
            $('#qyt_table').append(' <tr>\
                                            <td>\
                                               <div class="form-row">\
                                                    <label class="col-md-2" for="">></label>\
                                                    <input type="text" class="form-control-sm col-md-8 quantity" name="quantity" id="quantity" placeholder="">\
                                                    <div class="text-danger " id="quantity_error"></div>\
                                               </div>\
                                            </td>\
                                            <td>\
                                                <div class="form-row">\
                                                    <label class="col-md-3" for="">$</label>\
                                                    <input type="text" class="form-control-sm col-md-7 selling_price"\
                                                        name="selling_price" id="selling_price" placeholder="">\
                                                    <div class="text-danger " id="selling_price_error"></div>\
                                                </div>\
                                            </td>\
                                            <td>\
                                                <div class="form-row">\
                                                    <label class="col-md-3" for="">$</label>\
                                                    <input type="text" class="form-control-sm col-md-7 price" name="price" id="price" placeholder="">\
                                                    <div class="text-danger " id="price_error"></div>\
                                               </div>\
                                            </td>\
                                            <td>\
                                                <i class="fa-solid fa-trash text-danger removeRow" "></i>\
                                            </td>\
                                        </tr>');

        })
        
        //on key change preview qty
        $(document).on('keyup', '.price', function(){
            getPrice();
        })
        //
        $(document).on('change', '.color_mult', function() {
            sizeTable(); // Call sizeTable directly
        });

        $(document).on('change', '.size_mult', function() {
            sizeTable(); // Call sizeTable directly
        });

        function varintDetails() {
            var variant_details = [];
            $('#varint_table > tr').each(function() {
                var variant = {};
                variant['sizeId'] = $(this).closest('tr').find('.sizeId').val();
                variant['colorId'] = $(this).closest('tr').find('.colorId').val();
                variant['variant_val1'] = $(this).closest('tr').find('.variant_val1').val()
                variant['variant_val2'] = $(this).closest('tr').find('.variant_val2').val()
                variant['purchase_price'] = $(this).closest('tr').find('.purchase_price').val();
                variant['selling_price'] = $(this).closest('tr').find('.selling_price').val();
                variant['var_sku'] = $(this).closest('tr').find('.var_sku').val();
                variant['img_hidden'] = $(this).closest('tr').find('.img_hidden').val();

                var files = $(this).closest('tr').find('.var_img')[0].files;
                variant['var_img'] = [];

                for (var i = 0; i < files.length; i++) {
                    variant['var_img'].push(files[i]);
                }

            

                variant_details.push(variant);
            });
            $('#variant_details').html('');
            $('#variant_details').val(JSON.stringify(variant_details));
        }


      
        function getPrice() {

            var price_details = {};
            var count = 0;

            $('#qyt_table > tr').each(function() {

                price_details[count] = {};
                price_details[count]['qty'] = $(this).closest('tr').find('.quantity').val();
                price_details[count]['selling_price'] = $(this).closest('tr').find('.selling_price').val();
                price_details[count]['price'] = $(this).closest('tr').find('.price').val();
                count++;

            })
            $('#price_details').val('');
            $('#price_details').val(JSON.stringify(price_details));
            getPreview(price_details);
        }

        function getPreview(price_details) {
            $('.qtyPreview').html('');
            const dataArray = Object.values(price_details);
            dataArray.sort((a, b) => parseInt(a.qty) - parseInt(b.qty));
            let html = '<tbody class="qtyPreview">';
            for (let i = 0; i < dataArray.length; i++) {
                const current = dataArray[i];
                const next = dataArray[i + 1];
                const qtyRange = next && parseInt(current.qty) !== parseInt(next.qty) ?
                    `${current.qty}-${next.qty - 1}` :
                    current.qty;
                const price = current.price;
                html += `<tr>
                    <td>${qtyRange}</td>
                    <td>US <span class="text-danger">$${price}</span></td>
                    </tr> `;
            }
            html += '</tbody>';
            $('.qtyPreview').append(html);
        }

        // product display data
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('product.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'brand_name',
                    name: 'brand_name'
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'group_name',
                    name: 'group_name'
                },
                {
                    data: 'tax',
                    name: 'tax',
                    render: function(data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            // Format the value with two decimal places and add "rs"
                            return parseFloat(data).toFixed(2) + '(<b>%</b>)';
                        }
                        return data;
                    }
                },
                {
                    data: 'purchase_price',
                    name: 'purchase_price',
                    render: function(data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            // Format the value with two decimal places and add "rs"
                            return parseFloat(data).toFixed(2) + '(<b>RS</b>)';
                        }
                        return data;
                    }
                },
                {
                    data: 'selling_price',
                    name: 'selling_price',
                    render: function(data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            // Format the value with two decimal places and add "rs"
                            return parseFloat(data).toFixed(2) + '(<b>RS</b>)';
                        }
                        return data;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [0, 'desc'] // Order by the first column ('id') in descending order
            ],
            initComplete: function() {
                $('#product-table').on('click', '.delete-product', function(e) {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete this product?')) {
                        var url = $(this).attr('data-url');
                        $.ajax({
                            url: url,
                            type: 'get',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                // Handle success, e.g., remove the row from the table
                                // $('#product-table').DataTable().ajax.reload();
                                alertify.warning(response.success);
                                $('#product-table').DataTable().draw();
                            }
                        });
                    }
                });
            }
        });

        $(document).on('click', '.removeRow', function() {
            var row = $(this).closest("tr");

            if (row) {
                row.remove();
            }
            getPrice()
        })


        //category start->>>>>>>>>>>>>>>>>>>>>>>
        //add category 
        $(document).on('click', '.addCategory11', function() {

            $('#catTitle').text('');
            $('#catTitle').text('Add Category');
            $('#catBtn1').text('');
            $('#catBtn1').text('Save');
            $('#catform')[0].reset();
            var url = $(this).attr('data-url');
            $('#catform').attr('action', '')

            $('#catform').attr('action', url)
        });

        //save category
        $('#catform').on('submit', function(e) {
            e.preventDefault();
            if ($('#cat_name').val() != '') {
                $('#cat_name_error').text('');
            }
            var modal_cat = document.querySelector(".modally-wrap.addCategory.open");
            var catform = new FormData(this);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: catform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        getCategory();
                        modal_cat.style.display = "none";
                        $('#category_table').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_cat.style.display = "none";
                        $('#category_table').DataTable().draw();
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

        //edit category
        $(document).on('click', '.editCategory', function() {
            $('#catTitle').text('');
            $('#catTitle').text('Edit Category');
            $('#catBtn1').text('');
            $('#catBtn1').text('Update');
            $('#catform')[0].reset();
            var name = $(this).attr('data-name');
            $('#cat_name').val(name);
            var update = $(this).attr('data-update');
            $('#catform').attr('action', '')
            $('#catform').attr('action', update)

        });
        // display category table 
        $('#category_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('category.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'sr_number',
                    name: 'sr_number'
                },
                {
                    data: 'cat_name',
                    name: 'cat_name'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ]
        });

        // category delete 
        $(document).on('click', '.catDelete', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#category_table').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });

        //unitte ->>>>>>>>>>>>>>>>>>>>
        //add unit 
        $(document).on('click', '.addUnit11', function() {
            $('#unitTitle').text('');
            $('#unitTitle').text('Add Unit');
            $('#unitBtn').text('');
            $('#unitBtn').text('Save');
            $('#unitform')[0].reset();
            var url = $(this).attr('data-url');
            $('#unitform').attr('action', '')
            $('#unitform').attr('action', url)
        });

        //save unit
        $('#unitform').on('submit', function(e) {
            e.preventDefault();
            if ($('#unit_name').val() != '') {
                $('#unit_name_error').text('');
            }
            if ($('#sort_name').val() != '') {
                $('#sort_name_error').text('');
            }
            var modal_unit = document.querySelector(".modally-wrap.addUnit.open");
            var catform = new FormData(this);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: catform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        getUnit();
                        modal_unit.style.display = "none";
                        $('#unit_table').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_unit.style.display = "none";
                        $('#unit_table').DataTable().draw();
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

        //edit unit
        $(document).on('click', '.editUnit', function() {
            $('#unitTitle').text('');
            $('#unitTitle').text('Edit Unit');
            $('#unitBtn').text('');
            $('#unitBtn').text('Update');
            $('#unitform')[0].reset();
            var name = $(this).attr('data-name');
            $('#unit_name').val(name);
            var sort = $(this).attr('data-sort');
            $('#sort_name').val(sort);
            var update = $(this).attr('data-update');
            $('#unitform').attr('action', '')
            $('#unitform').attr('action', update)

        });
        // display unit table 
        $('#unit_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('unit.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'sr_number',
                    name: 'sr_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'sort_name',
                    name: 'sort_name'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ]
        });

        // unit delete 
        $(document).on('click', '.unitDelete', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#unit_table').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });

        //brand ->>>>>>>>>>>>>>>>>
        //add brand 
        $(document).on('click', '.addBrand11', function() {
            $('#brandTitle').text('');
            $('#brandTitle').text('Add Brand');
            $('#brandBtn').text('');
            $('#brandBtn').text('Save');
            $('#brandform')[0].reset();
            var url = $(this).attr('data-url');
            $('#brandform').attr('action', '')
            $('#brandform').attr('action', url)
        });

        //save brand
        $('#brandform').on('submit', function(e) {
            e.preventDefault();
            if ($('#brand').val() != '') {
                $('#brand_error').text('');
            }
            var modal_branch = document.querySelector(".modally-wrap.addBrand.open");
            var brandform = new FormData(this);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: brandform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        getBrand();
                        modal_branch.style.display = "none";
                        $('#brand_table').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_branch.style.display = "none";
                        $('#brand_table').DataTable().draw();
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

        //edit brand
        $(document).on('click', '.editBrand', function() {
            $('#brandTitle').text('');
            $('#brandTitle').text('Edit Brand');
            $('#brandBtn').text('');
            $('#brandBtn').text('Update');
            $('#brandform')[0].reset();
            var name = $(this).attr('data-name');
            $('#brand').val(name);

            var update = $(this).attr('data-update');
            $('#brandform').attr('action', '')
            $('#brandform').attr('action', update)

        });
        // display brand table 
        $('#brand_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('brand.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'sr_number',
                    name: 'sr_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ]
        });

        // brand delete 
        $(document).on('click', '.branDelete', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#brand_table').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });

        //group ->>>>>>>>>>>>>>>>
        //add group 
        $(document).on('click', '.addGroup11', function() {
            $('#groupTitle').text('');
            $('#groupTitle').text('Add Group');
            $('#groupBtn').text('');
            $('#groupBtn').text('Save');
            $('#groupform')[0].reset();
            var url = $(this).attr('data-url');
            $('#groupform').attr('action', '')
            $('#groupform').attr('action', url)
        });

        //save group
        $('#groupform').on('submit', function(e) {
            e.preventDefault();
            if ($('#group').val() != '') {
                $('#group_error').text('');
            }
            var modal_group = document.querySelector(".modally-wrap.addGroup.open");
            var brandform = new FormData(this);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: brandform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        getGroup()
                        modal_group.style.display = "none";
                        $('#group_table').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_group.style.display = "none";
                        $('#group_table').DataTable().draw();
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

        //edit group
        $(document).on('click', '.editGroup', function() {
            $('#groupTitle').text('');
            $('#groupTitle').text('Edit Group');
            $('#groupBtn').text('');
            $('#groupBtn').text('Update');
            $('#groupform')[0].reset();
            var name = $(this).attr('data-name');
            $('#group').val(name);

            var update = $(this).attr('data-update');
            $('#groupform').attr('action', '')
            $('#groupform').attr('action', update)

        });
        // display group table 
        $('#group_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('group.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'sr_number',
                    name: 'sr_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ]
        });

        // group delete 
        $(document).on('click', '.groupDelete', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#group_table').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });

        // <!--color -->>>>>>>>>>>>>>>>>
        //add color 
        $(document).on('click', '.addColor11', function() {
            $('#colorTitle').text('');
            $('#colorTitle').text('Add color');
            $('#colorBtn').text('');
            $('#colorBtn').text('Save');
            $('#colorform')[0].reset();
            var url = $(this).attr('data-url');
            $('#colorform').attr('action', '')
            $('#colorform').attr('action', url)
        });

        //save color
        $('#colorform').on('submit', function(e) {
            e.preventDefault();
            if ($('#color').val() != '') {
                $('#color_error').text('');
            }
            var modal_color = document.querySelector(".modally-wrap.addColor.open");
            var brandform = new FormData(this);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: brandform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        getColor()
                        modal_color.style.display = "none";
                        $('#color_table').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_color.style.display = "none";
                        $('#color_table').DataTable().draw();
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

        //edit color
        $(document).on('click', '.editColor', function() {
            $('#colorTitle').text('');
            $('#colorTitle').text('Edit color');
            $('#colorBtn').text('');
            $('#colorBtn').text('Update');
            $('#colorform')[0].reset();
            var name = $(this).attr('data-name');
            $('#color').val(name);

            var update = $(this).attr('data-update');
            $('#colorform').attr('action', '')
            $('#colorform').attr('action', update)
        });
        // display color table 
        $('#color_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('color.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'sr_number',
                    name: 'sr_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ]
        });

        // color delete 
        $(document).on('click', '.colorDelete', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#color_table').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });

        //size ->>>>>>>>>>>>>>>>>>>>>>>>
        //add size 
        $(document).on('click', '.addSize11', function() {
            $('#sizeTitle').text('');
            $('#sizeTitle').text('Add size');
            $('#sizeBtn').text('');
            $('#sizeBtn').text('Save');
            $('#sizeform')[0].reset();
            var url = $(this).attr('data-url');
            $('#sizeform').attr('action', '')
            $('#sizeform').attr('action', url)
        });

        //save size
        $('#sizeform').on('submit', function(e) {
            e.preventDefault();
            if ($('#size').val() != '') {
                $('#size_error').text('');
            }
            var modal_size = document.querySelector(".modally-wrap.addSize.open");
            var sizeform = new FormData(this);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: sizeform,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        getSize()
                        modal_size.style.display = "none";
                        $('#size_table').DataTable().draw();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_size.style.display = "none";
                        $('#size_table').DataTable().draw();
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

        //edit size
        $(document).on('click', '.editSize', function() {
            $('#sizeTitle').text('');
            $('#sizeTitle').text('Edit Size');
            $('#sizeBtn').text('');
            $('#sizeBtn').text('Update');
            $('#sizeform')[0].reset();
            var name = $(this).attr('data-name');
            $('#size').val(name);
            var update = $(this).attr('data-update');
            $('#sizeform').attr('action', '')
            $('#sizeform').attr('action', update)
        });

        // display size table 
        $('#size_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('size.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'sr_number',
                    name: 'sr_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

        // size delete 
        $(document).on('click', '.sizeDelete', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#size_table').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });






        function getCategory(ids) {
            if (ids === undefined) {
                ids = ''; // Set a default empty array if not provided
            }
            $.ajax({
                type: 'get',
                url: '{{ route('category.getCategory') }}',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {

                    $('.category_id').html('');
                    $('.category_id').html(
                        '<option value="yes" selected>Choose...</option>');
                    $.each(response, function(key, value) {
                        var option = $('<option></option>');
                        option.val(value.id);
                        option.text(value.cat_name);
                        // Check if the value.id exists in the ids array
                        if (value.id == ids) {
                            option.prop('selected', true);
                        }
                        $('.category_id').append(option);
                    });
                }
            });
        }

        function getUnit(ids) {
            if (ids === undefined) {
                ids = ''; // Set a default empty array if not provided
            }
            $.ajax({
                type: 'get',
                url: '{{ route('unit.getUnit') }}',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('.unit_id').html('');
                    $('.unit_id').html('<option value="yes">Choose...</option>');
                    $.each(response, function(key, value) {
                        var option = $('<option></option>');
                        option.val(value.id);
                        option.text(value.name);
                        // Check if the value.id exists in the ids array
                        if (value.id == ids) {
                            option.prop('selected', true);
                        }
                        $('.unit_id').append(option);
                    });
                }
            });
        }

        function getGroup(ids) {
            if (ids === undefined) {
                ids = ''; // Set a default empty array if not provided
            }
            $.ajax({
                type: 'get',
                url: '{{ route('group.getGroup') }}',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('.group_id').html('');
                    $('.group_id').html('<option value="yes" selected>Choose...</option>');
                    $.each(response, function(key, value) {
                        var option = $('<option></option>');
                        option.val(value.id);
                        option.text(value.name);
                        // Check if the value.id exists in the ids array
                        if (value.id == ids) {
                            option.prop('selected', true);
                        }
                        $('.group_id').append(option);
                    });
                }
            });
        }

        function getBrand(ids) {
            if (ids === undefined) {
                ids = ''; // Set a default empty array if not provided
            }
            $.ajax({
                type: 'get',
                url: '{{ route('brand.getBrand') }}',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('.brand_id').html('');
                    $('.brand_id').html(
                        '<option value="yes" selected>Choose...</option>');
                    $.each(response, function(key, value) {
                        var option = $('<option></option>');
                        option.val(value.id);
                        option.text(value.name);
                        // Check if the value.id exists in the ids array
                        if (value.id == ids) {
                            option.prop('selected', true);
                        }
                        $('.brand_id').append(option);
                    });
                }
            });
        }


        //Product Variant Attributes->>>>>>>>>>>>>>>>>>>>>>>>
        //add variantAttr 
        $(document).on('click', '.variantAttr11', function() {
            $('#variantAttrTitle').text('');
            $('#variantAttrTitle').text('Add Product Attribute');
            $('#variantAttrBtn').text('');
            $('#variantAttrBtn').text('Save');
            $('#variantAttrFrom')[0].reset();
            var url = $(this).attr('data-url');
            $('#variantAttrFrom').attr('action', '')
            $('#variantAttrFrom').attr('action', url)
        });

        //save variantAttr
        $('#variantAttrFrom').on('submit', function(e) {
            e.preventDefault();
            if ($('#variantAttrName').val() != '') {
                $('#variantAttrName_error').text('');
            }
            var modal_size = document.querySelector(".modally-wrap.addvariantAttr.open");
            var variantAttrFrom = new FormData(this);
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: variantAttrFrom,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.success);
                        modal_size.style.display = "none";
                        $('#variantAttr_table').DataTable().draw();
                        getVariantAttribute();
                    } else if (response.update) {
                        alertify.success(response.update);
                        modal_size.style.display = "none";
                        $('#variantAttr_table').DataTable().draw();
                    } else {
                        var errors = response.errors;
                        // Loop through the errors and display them on the page
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }
            });
        });

        //edit variantAttr
        $(document).on('click', '.editvariantAttr', function() {
            $('#variantAttrTitle').text('');
            $('#variantAttrTitle').text('Edit roduct Attribute');
            $('#variantAttrBtn').text('');
            $('#variantAttrBtn').text('Update');
            $('#variantAttrFrom')[0].reset();
            var name = $(this).attr('data-name');
            $('#variantAttrName').val(name);
            var update = $(this).attr('data-update');
            $('#variantAttrFrom').attr('action', '')
            $('#variantAttrFrom').attr('action', update)
        });


        // display variantAttr table 
        $('#variantAttr_table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: {
                url: '{{ route('variantAttr.index') }}',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'sr_number',
                    name: 'sr_number',
                    orderable: false
                },
                {
                    data: 'variant_name',
                    name: 'variant_name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ]
        });

        // variantAttr delete 
        $(document).on('click', '.variantAttrDelete', function() {
            var url = $(this).attr('data-url');
            alertify.confirm("Deleted?", "Do you want to delete",
                function() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'JSON',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.warning(response.success);
                            $('#variantAttr_table').DataTable().draw();
                        }
                    })

                },
                function() {
                    alertify.error('Cancel');
                });
        });



        var selectColor = [];

        function getVariantAttribute(editvariant, edit) {
            if (editvariant === undefined) {
                editvariant = []; // Set a default empty array if not provided
            }

            $.ajax({
                type: 'get',
                url: '{{ route('variantAttr.getVariantAttr') }}',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    const variantMultSelect = $('.variant_mulit');
                    variantMultSelect.empty(); // Clear existing options

                    $.each(response, function(key, value) {

                        const option = $('<option></option>');
                        option.attr('data-color', value.variant_name);
                        option.attr('value', value.id);
                        option.text(value.variant_name);
                        // Check if the current option is selected for editing
                        if (editvariant.includes(value.id)) {
                            option.prop('selected', true);
                            //edit size table 
                            var id = value.id;
                            var name = value.variant_name;
                            selectColor.push([id, name]);
                        }
                        variantMultSelect.append(option);
                    });
                    selectColor = [];
                    updateHiddenField();
                    variantMultSelect.multiselect('destroy');
                    variantMultSelect.multiselect({

                        includeSelectAllOption: false, // Disable the "Select All" option
                        selectAllText: '', // Remove the "Select All" text
                        selectAllValue: '', // Remove the "Select All" value

                        onChange: function(element, checked) {
                            var id = element.val();
                            var name = element.attr('data-color');

                            if (checked) {
                                if (selectColor.length < 2) {
                                    selectColor.push([id, name]);
                                  
                                } else {
                                    variantMultSelect.multiselect('deselect', element
                                        .val());
                                        
                                }
                            } else {
                                selectColor = selectColor.filter(function(item) {
                                    return !(item[0] === id && item[1] ===
                                        name);
                                });
                            }
                            updateHiddenField();
                           
                        }
                    });


                }
            });

            if (edit === undefined) {
                edit = []
            }
            editvariantTable(edit)
        }

        function updateHiddenField() {
            $('#showvariant').html('');
            const arrayUniqueByKey = [...new Map(selectColor.map(item => [Number(item[0]), item])).values()];
            arrayUniqueByKey.forEach(function(item, index) {
                // Generate a unique ID for each input field
                var inputId = 'variantName_' + index;
                var addvariantAt = 'addvariantAt_' + index;
                var addvariantLable = 'variantLable_' + index;

                $('#showvariant').append('<div class="col-md-12 mt-3">\
                        <label for=""><b> ' + item[1] + '</b></label>\
                        <span class="' + addvariantLable + '"></span>\
                        <div class="input-group">\
                            <input type="text" class="form-control" id="' + inputId + '" placeholder="Enter variant name">\
                            <div class="input-group-append">\
                                <button class="badge badge-dark border-0 ' + addvariantAt + '" data-variantId="' +
                    item[0] +
                    '" data-inputId="' + inputId + '" type="button">\
                                    <i class="fa-2x px-3 fa-regular fa-square-plus" style="color: #fcfcfc;"></i>\
                                </button>\
                                <button class="badge border-0 remove" type="button">\
                                    <i class="fa-solid fa-trash-can text-danger px-3" style="font-size: 17px;"></i>\
                                </button>\
                            </div>\
                        </div>\
                    </div>');

                $('#showvariant .remove:last').on('click', function() {
                    removeVariant(index);
                });
            });
        }

        function removeVariant(index) {
            selectColor.splice(index, 1);
            updateHiddenField();
        }
        var selectvariant_0 = [];
        $(document).on('click', '.addvariantAt_0', function() {
            var variantId = $(this).attr('data-variantId');
            var inputId = $(this).attr('data-inputId');
            var name = $('#' + inputId).val();
            selectvariant_0.push([variantId, name]);

            $('.variantLable_0').append(
                '<label style=" background-color: #a3a7aa6e" class="badge  badge-pills p-2  mr-3"> ' +
                name +
                ' <span style="font-weight: 100 !important;" class="fa-2xl text-danger removeColor">X</span></label>'
            );
            $('#' + inputId).val('');
            var outputString = '';
            selectvariant_0.forEach(function(item, index) {
                outputString += index + '[' + item[0] + ',' + item[1] + ']';
                if (index < selectvariant_0.length - 1) {
                    outputString += ' ';
                }
            });
            $('#variantdetails').val('')
            $('#variantdetails').val(outputString)
            variantTable()
        });
        var selectvariant_1 = [];
        $(document).on('click', '.addvariantAt_1', function() {
            var variantId = $(this).attr('data-variantId');
            var inputId = $(this).attr('data-inputId');
            var name = $('#' + inputId).val();
            selectvariant_1.push([variantId, name]);
            $('.variantLable_1').append(
                '<label style=" background-color: #a3a7aa6e" class="badge  badge-pills p-2  mr-3"> ' +
                name +
                ' <span style="font-weight: 100 !important;" class="fa-2xl text-danger removeSize">X</span></label>'
            );

            $('#' + inputId).val('');
            var outputString = '';
            selectvariant_1.forEach(function(item, index) {
                outputString += index + '[' + item[0] + ',' + item[1] + ']';
                if (index < selectvariant_1.length - 1) {
                    outputString += ' ';
                }
            });
            $('#variantdetails_1').val('')
            $('#variantdetails_1').val(outputString)
            variantTable()
        });


        function variantTable() {
            var variantdetails = $('#variantdetails').val();
            var selectSize = $('#variantdetails_1').val();
            var variantData = variantdetails.split(' ');
            var sizeData = selectSize.split(' ');

            $('#varint_table').html('');

            for (var i = 0; i < sizeData.length; i++) {
                var sizeInfo = sizeData[i].match(/\[(\d+),(.+?)\]/);

                for (var l = 0; l < variantData.length; l++) {
                    var colorInfo = variantData[l].match(/(\d+)\[(\d+,[^,]+)]/);

                    if (sizeInfo && colorInfo) {
                        var sizeId = sizeInfo[1];
                        var size = sizeInfo[2];



                        var colorId = colorInfo[2].split(',')[0];
                        var color = colorInfo[2].split(',')[1];

                        $('#varint_table').append('<tr>\
                            <td scope="row"> <i class="fa-solid fa-trash-can text-danger px-3 remove11" style="font-size: 17px;"></i></td>\
                            <td> <input type="hidden" class="colorId" value="' + colorId + '">\
                                <input class="form-control-sm variant_val1" type="text" value="' + color + '">\
                            <td><input type="hidden" class="sizeId" value="' + sizeId + '">\
                                <input class="form-control-sm variant_val2" type="text"  value="' + size + '"></td>\
                            <td><input class="form-control-sm purchase_price" type="text" name="purchase_price" value=""></td>\
                            <td><input class="form-control-sm selling_price" type="text" name="selling_price" value=""></td>\
                            <td><input class="form-control-sm var_sku" type="text" name="var_sku" value=""></td>\
                            <td><input type="hidden" class="img_hidden" name="img_hidden[]"  value=""><input class="form-control-file var_img" type="file" name="var_img[]" multiple=""></td>\
                        </tr>');
                    }
                }
            }
        }

        function editvariantTable(variants) {
            // Assuming variants is an array of variant objects

            $('#varint_table').html(''); // Clear the table
            $('.variantLable_0').html(''); // Clear the table
            $('.variantLable_1').html(''); // Clear the table

            for (var i = 0; i < variants.length; i++) {
                var variant = variants[i];

                // Extracting variant details
                var colorId = variant.color_id;
                var color = variant.varian_1;
                var sizeId = variant.size_id;
                var size = variant.varian_2;
                var sale_price = variant.selling_price;
                var purchase_price = variant.purchase_price;
                var sku = variant.sku;
                var image = variant.image;
                  var imgpath =   '{{ asset("storage/product_images/") }}/' + image;

                $('.variantLable_0').append(
                    '<label style=" background-color: #a3a7aa6e" class="badge  badge-pills p-2  mr-3"> ' +
                    color +
                    ' <span style="font-weight: 100 !important;" class="fa-2xl text-danger removeColor">X</span></label>'
                );
                $('.variantLable_1').append(
                    '<label style=" background-color: #a3a7aa6e" class="badge  badge-pills p-2  mr-3"> ' +
                    size +
                    ' <span style="font-weight: 100 !important;" class="fa-2xl text-danger removeSize">X</span></label>'
                );
                // Appending row to the table
                $('#varint_table').append('<tr>\
                    <td scope="row"> <i class="fa-solid fa-trash-can text-danger px-3 remove11" style="font-size: 17px;"></i></td>\
                    <td> <input type="hidden" class="colorId" value="' + colorId + '">\
                        <input class="form-control-sm variant_val1" type="text" value="' + color + '"></td>\
                    <td><input type="hidden" class="sizeId" value="' + sizeId + '">\
                        <input class="form-control-sm variant_val2" type="text"  value="' + size + '"></td>\
                    <td><input class="form-control-sm purchase_price" type="text" name="purchase_price" value="'+purchase_price+'"></td>\
                    <td><input class="form-control-sm selling_price" type="text" name="selling_price" value="'+sale_price+'"></td>\
                    <td><input class="form-control-sm var_sku" type="text" name="var_sku" value="'+sku+'"></td>\
                    <td><input type="hidden" class="img_hidden" name="img_hidden[]"  value="'+image+'"><input class="form-control-file var_img" type="file" name="var_img[]" multiple=""><img width="50px;" src="'+imgpath+'" ></td>\
                </tr>');
            }
        }
        
        $(document).on('click', '.remove11', function() {
            var rowIndex = $(this).closest('tr').index();
            $(this).closest('tr').remove();
            if ($(this).closest('table').attr('id') === 'varint_table') {
                selectvariant_0.splice(rowIndex, 1);
            } else {
                selectvariant_1.splice(rowIndex, 1);
                var outputString = '';
                selectvariant_1.forEach(function(item, index) {
                    outputString += index + '[' + item[0] + ',' + item[1] + ']';
                    if (index < selectvariant_1.length - 1) {
                        outputString += ' ';
                    }
                });
                $('#variantdetails_1').val('')
                $('#variantdetails_1').val(outputString)
            }

            // Update the table and arrays
            //variantTable();
        });

        // For removeColor
        $(document).on('click', '.removeColor', function() {
            var index = $(this).closest('label').index();
            selectvariant_0.splice(index, 1);
            updateVariantDetails('#variantdetails', selectvariant_0);
            $(this).closest('label').remove();
            variantTable();
        });

        // For removeSize
        $(document).on('click', '.removeSize', function() {
            var index = $(this).closest('label').index();
            selectvariant_1.splice(index, 1);
            updateVariantDetails('#variantdetails_1', selectvariant_1);
            $(this).closest('label').remove();
            variantTable();
        });

        function updateVariantDetails(elementId, array) {
            var outputString = '';
            array.forEach(function(item, index) {
                outputString += index + '[' + item[0] + ',' + item[1] + ']';
                if (index < array.length - 1) {
                    outputString += ' ';
                }
            });
            $(elementId).val(outputString);
        }


    });
</script>
