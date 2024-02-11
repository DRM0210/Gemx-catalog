@extends('admin.layout.main')

@section('content')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Create Product</h3>
            </div>

            <div class="toggle-switch">

            </div>
        </div>

        <form action="{{ route('product.store') }}" method="post" id="productform" enctype="multipart/form-data">
            @csrf
            <div class="row layout-top-spacing">
                <div class=" col-md-4 col-sm-12 col-12 layout-spacing">
                    <img class="mx-auto d-block" id="imagePreview" style="max-width: 300px; max-height: 300px;">

                </div>
                <div class=" col-md-8 col-sm-12 col-12 layout-spacing">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="">
                            <div class="text-danger " id="name_error"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            <div class="text-danger " id="description_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Category<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select category_id" id="category_id" name="category_id">
                                </select>
                                <div class="input-group-append">
                                    <button class="badge badge-dark border-0 addCategory"
                                        data-url="{{ route('category.store') }}" type="button">Add</button>
                                </div>
                            </div>
                            <div class="text-danger " id="category_id_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Brand<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select brand_id" id="brand_id" name="brand_id">
                                </select>
                                <div class="input-group-append">
                                    <button class="badge badge-dark border-0 addBrand" data-url="{{ route('brand.store') }}"
                                        type="button">Add</button>
                                </div>
                            </div>
                            <div class="text-danger " id="brand_id_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Group<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select group_id" id="group_id" name="group_id">
                                </select>
                                <div class="input-group-append">
                                    <button class="badge badge-dark border-0 addGroup" data-url="{{ route('group.store') }}"
                                        type="button">Add</button>
                                </div>
                            </div>
                            <div class="text-danger " id="group_id_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Unit<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="custom-select unit_id" id="unit_id" name="unit_id">
                                </select>
                                <div class="input-group-append">
                                    <button class="badge badge-dark border-0 addUnit" data-url="{{ route('unit.store') }}"
                                        type="button">Add</button>
                                </div>
                            </div>
                            <div class="text-danger " id="unit_id_error"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Tax(%)</label>
                            <input type="number" class="form-control" value="0" name="tax" id="tax"
                                placeholder="">
                            <div class="text-danger " id="tax_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Upload product image<span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="productImg" name="productImg">
                                <label class="custom-file-label" for="productImg">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>

                            <div class="text-danger mt-3" id="productImg_error"></div>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="inputState">Upload image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="product_multi" name="product_multi">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                            <div class="text-danger " id="product_multi_error"></div>
                        </div>
                        <div class="form-group col-md-12 mt-3 border p-3">
                            <label for="inputState">Quantity<span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-7">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>
                                                    <button type="button"
                                                        class="badge badge-info border-0 addQty">Add</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="qyt_table">
                                            <tr>
                                                <td>
                                                    <div class="form-row">
                                                        <label class="col-md-2" for="">></label>
                                                        <input type="text" class="form-control-sm col-md-8 quantity"
                                                            name="quantity" id="quantity" placeholder="">
                                                        <div class="text-danger " id="quantity_error"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-row">
                                                        <label class="col-md-3" for="">US $</label>
                                                        <input type="text" class="form-control-sm col-md-7 price"
                                                            name="price" id="price" placeholder="">
                                                        <div class="text-danger " id="price_error"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <i class="fa-solid fa-trash text-danger "></i> --}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <b>Preview(Unit piece/price)</b>
                                    <table class="table">
                                        <tbody class="qtyPreview">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 mt-3">
                            <label for="inputState">Choose Product Type<span class="text-danger">*</span></label><br>
                            <div class="form-check">
                                <input class="form-check-input gridRadios" type="radio" name="gridRadios"
                                    id="gridRadios1" value="standrad" checked>
                                <span class="form-check-label" for="gridRadios1">
                                    Standard product
                                </span>
                                <span class="mx-5">
                                    <input class="form-check-input gridRadios" type="radio" name="gridRadios"
                                        id="gridRadios2" value="variant">
                                    <span class="form-check-label" for="gridRadios2">
                                        Variant product
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" id="variant">
                        <div class="form-group col-md-6">
                            <label for="">Purchase price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="purchase_price" id="purchase_price"
                                placeholder="">
                            <div class="text-danger " id="purchase_price_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Selling price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="selling_price" id="selling_price"
                                placeholder="">
                            <div class="text-danger " id="selling_price_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">SKU</label>
                            <input type="text" class="form-control" name="sku" id="sku" placeholder="">
                            <div class="text-danger " id="sku_error"></div>
                        </div>
                    </div>
                    <div class="form-row" id="standrad" style="display:none">
                        <div class="form-group col-md-8">
                            <label for="">Color <span class="text-danger">*</span> </label>
                            <button class=" badge badge-dark border-0 addColor" type="button"
                                data-url="{{ route('color.store') }}">Add</button>
                            <select class="form-select color_mult" id="color_mult" name="color_mult"
                                style="width: 100%;" data-placeholder="Choose anything" multiple>
                            </select>
                            <div class="text-danger " id="color_mult_error"></div>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Size <span class="text-danger">*</span></label>
                            <button class=" badge badge-dark border-0 addSize" type="button"
                                data-url="{{ route('size.store') }}">Add</button>
                            <br>
                            <select class="form-select size_mult" id="size_mult" name="size_mult" style="width: 100%;"
                                data-placeholder="Choose anything" multiple>
                            </select>
                            <div class="text-danger " id="size_mult_error"></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12" style="display: none" id="varint_list_table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>sr</th>
                                    <th>Variants</th>
                                    <th>Purchase price</th>
                                    <th>Selling price</th>
                                    <th>SKU</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody id="varint_table">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <button class="badge badge-primary border-0 float-right py-2 px-4" type="submit">Save</button>
                </div>
            </div>
            <input type="hidden" id="price_details" name="price_details">
            <input type="hidden" id="selectColor" name="selectColor">
            <input type="hidden" id="selectSize" name="selectSize">
            <input type="text" id="variant_details" name="variant_details">
            
        </form>


    </div>
@endsection
@section('script')
    @include('admin.pages.product.model')
    @include('admin.pages.product.script')
    <script>
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
    </script>
@endsection
