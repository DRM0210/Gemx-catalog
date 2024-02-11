<style>
    .form-control-sm {
        width: 120px !important;
    }
</style>
{{-- add product model  --}}
<div id="addprod" class="mt-5">
    <h5 class="text-center" id="prodTitle"></h5>
    <form action="{{ route('product.store') }}" method="post" id="productform" enctype="multipart/form-data">
        @csrf
        <div class="row layout-top-spacing">
            <div class=" col-md-3 col-sm-12 col-12 layout-spacing">
                <img class="mx-auto d-block" id="imagePreview" style="max-width: 250px; max-height: 250px;">

            </div>
            <div class=" col-md-9 col-sm-12 col-12 layout-spacing">
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

                                <a class="badge badge-dark pt-2 addCategory11" href="#addCategory" target="_modal"
                                    data-url="{{ route('category.store') }}">Add</a>
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
                                <a class="badge badge-dark pt-2 addBrand11" data-url="{{ route('brand.store') }}"
                                    href="#addBrand" target="_modal">Add</a>
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
                                <a class="badge badge-dark pt-2 addGroup11" data-url="{{ route('group.store') }}"
                                    href="#addGroup" target="_modal">Add</a>
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
                                <a class="badge badge-dark pt-2 addUnit11" data-url="{{ route('unit.store') }}"
                                    href="#addUnit" target="_modal">Add</a>
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
                            <input type="hidden" class="" id="productImg_hidden" name="productImg_hidden">
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
                                            <th>Purchase price</th>
                                            <th>Selling price</th>
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
                                                    <input type="text" class="form-control-sm col-md-7 selling_price"
                                                        name="selling_price" id="selling_price" placeholder="">
                                                    <div class="text-danger " id="selling_price_error"></div>
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
                    {{-- <div class="form-group col-md-6">
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
                    </div> --}}
                </div>
                <div class="form-row" id="standrad" style="display:none">

                    {{-- <div class="form-group col-md-8">
                        <label for="">Color <span class="text-danger">*</span> </label>
                        <a class=" badge badge-dark p-2 addColor11"  href="#addColor"  target="_modal"
                            data-url="{{ route('color.store') }}">Add</a><br>
                        <select class=" form-control color_mult" id="color_mult" name="color_mult"
                            style="width: 100%;" multiple="multiple" >
                        </select>
                       
                     
                        <div class="text-danger " id="color_mult_error"></div>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">Size <span class="text-danger">*</span></label>
                        <a class=" badge badge-dark p-2 addSize11" href="#addSize"  target="_modal"
                            data-url="{{ route('size.store') }}">Add</a>
                        <br>
                        <select class="form-select size_mult" id="size_mult" name="size_mult" style="width: 100%;"
                            data-placeholder="Choose anything" multiple>
                            
                        </select>
                        <div class="text-danger " id="size_mult_error"></div>
                    </div> --}}

                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label for="">Variant Attribute <span
                                        class="text-danger">*</span></label></div>
                            <div class="col-md-1"> <a class=" badge badge-dark p-2 variantAttr11"
                                    href="#addvariantAttr" target="_modal"
                                    data-url="{{ route('variantAttr.store') }}">Add</a></div>
                            <div class="col-md-8">
                                <select class="form-select variant_mulit" id="variant_mulit" name="variant_mulit"
                                    style="width: 100%;" data-placeholder="Choose anything" multiple>
                                </select>
                                <div class="text-danger " id="variant_mulit_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-row mt-5" id="showvariant">

                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display: none" id="varint_list_table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Value1</th>
                                <th>Value2</th>
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
                <button class="badge badge-primary border-0 float-right py-2 px-4 " id="productbtn"
                    type="submit"></button>
            </div>
        </div>
        <input type="hidden" id="price_details" name="price_details">
        <input type="hidden" id="selectColor" name="selectColor">
        <input type="hidden" id="selectSize" name="selectSize">
        <input type="hidden" id="variant_details" name="variant_details">

        <input type="hidden" name="editselectcolor" id="editselectcolor">
        <input type="hidden" name="editselectsize" id="editselectsize">
        <input type="hidden" name="allprices" id="allprices">
        <input type="hidden" name="variantdetails" id="variantdetails">
        <input type="hidden" name="variantdetails_1" id="variantdetails_1">

    </form>
</div>
{{-- add category --}}
<div class="" id="addCategory">
    <h5 class="text-center" id="catTitle"></h5>
    <form action="" method="post" id="catform">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Category Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="cat_name" id="cat_name"
                        placeholder="Enter Name">
                    <div class="text-danger" id="cat_name_error"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="badge badge-dark border-0 py-2 px-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button> --}}
            <button type="submit" class="badge badge-primary border-0 py-2 px-4" id="catBtn1"></button>
        </div>
    </form>
</div>

{{-- add unite --}}
<div class="" id="addUnit">
    <h5 class="text-center" id="unitTitle"></h5>
    <form action="" method="post" id="unitform">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Unit Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="unit_name" id="unit_name"
                        placeholder="Enter Name">
                    <div class="text-danger" id="unit_name_error"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Sort Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="sort_name" id="sort_name"
                        placeholder="Enter Name">
                    <div class="text-danger" id="sort_name_error"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="badge badge-dark border-0 py-2 px-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button> --}}
            <button type="submit" class="badge badge-primary border-0 py-2 px-4" id="unitBtn"></button>
        </div>
    </form>
</div>

{{-- add brand --}}
<div id="addBrand" href="#addBrand" target="_modal">
    <h5 class="text-center" id="brandTitle"></h5>
    <form action="" method="post" id="brandform">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Brand Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="brand" id="brand"
                        placeholder="Enter Name">
                    <div class="text-danger" id="brand_error"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="badge badge-dark border-0 py-2 px-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button> --}}
            <button type="submit" class="badge badge-primary border-0 py-2 px-4" id="brandBtn"></button>
        </div>
    </form>
</div>

{{-- add group --}}
<div id="addGroup" href="#addGroup" target="_modal">
    <h5 class="text-center" id="groupTitle"></h5>
    <form action="" method="post" id="groupform">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Group Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="group" id="group"
                        placeholder="Enter Name">
                    <div class="text-danger" id="group_error"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="badge badge-dark border-0 py-2 px-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button> --}}
            <button type="submit" class="badge badge-primary border-0 py-2 px-4" id="groupBtn"></button>
        </div>
    </form>
</div>


{{-- add color --}}
<div id="addColor" href="#addColor" target="_modal">
    <h5 class="text-center" id="colorTitle"></h5>
    <form action="" method="post" id="colorform">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Color Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="color" id="color"
                        placeholder="Enter Name">
                    <div class="text-danger" id="color_error"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="badge badge-dark border-0 py-2 px-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button> --}}
            <button type="submit" class="badge badge-primary border-0 py-2 px-4" id="colorBtn"></button>
        </div>
    </form>
</div>

{{-- add size --}}
<div id="addSize" href="#addSize" target="_modal">
    <h5 class="text-center" id="sizeTitle"></h5>
    <form action="" method="post" id="sizeform">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Size Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="size" id="size"
                        placeholder="Enter Name">
                    <div class="text-danger" id="size_error"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="badge badge-dark border-0 py-2 px-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button> --}}
            <button type="submit" class="badge badge-primary border-0 py-2 px-4" id="sizeBtn"></button>
        </div>
    </form>
</div>
{{-- Product Variant Attributes --}}
<div id="addvariantAttr" href="#addvariantAttr" target="_modal">
    <h5 class="text-center" id="variantAttrTitle"></h5>
    <form action="" method="post" id="variantAttrFrom">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Variant Attributes Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="variantAttrName" id="variantAttrName"
                        placeholder="Enter Name">
                    <div class="text-danger" id="variantAttrName_error"></div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="badge badge-dark border-0 py-2 px-4" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button> --}}
            <button type="submit" class="badge badge-primary border-0 py-2 px-4" id="variantAttrBtn"></button>
        </div>
    </form>
</div>
