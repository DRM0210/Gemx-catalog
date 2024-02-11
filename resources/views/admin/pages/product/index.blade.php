@extends('admin.layout.main')

@section('content')
 
   <style>
    .choices__inner {
        border-radius: 0px;
    }
    .choices__list--multiple .choices__item {
        background-color: #0071BC;
        border: 1px solid #0071BC;
        border-radius: 0px;
    }
    .btn-group {
        width: 100% !important;
    }
   </style>
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Product List</h3>
            </div>

            <div class="toggle-switch">

            </div>
        </div>

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                            aria-controls="ex1-tabs-1" aria-selected="true">Products</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                            aria-controls="ex1-tabs-2" aria-selected="false">Categorys</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab"
                            aria-controls="ex1-tabs-3" aria-selected="false">Units</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-4" data-mdb-toggle="tab" href="#ex1-tabs-4" role="tab"
                            aria-controls="ex1-tabs-4" aria-selected="false">Brand</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-5" data-mdb-toggle="tab" href="#ex1-tabs-5" role="tab"
                            aria-controls="ex1-tabs-5" aria-selected="false">Group</a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-6" data-mdb-toggle="tab" href="#ex1-tabs-6" role="tab"
                            aria-controls="ex1-tabs-6" aria-selected="false">Color</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-7" data-mdb-toggle="tab" href="#ex1-tabs-7" role="tab"
                            aria-controls="ex1-tabs-7" aria-selected="false">Size</a>
                    </li> --}}
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-8" data-mdb-toggle="tab" href="#ex1-tabs-8" role="tab"
                            aria-controls="ex1-tabs-5" aria-selected="false">Product Variant Attributes </a>
                    </li>
                </ul>
                <!-- Tabs navs -->
 
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    {{-- product tab --}}
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Products</h3>
                            </div>

                            <div class="toggle-switch">
                                <a href="#addprod" target="_modal" class=" badge badge-dark border-0 px-4 py-2 addProdd1"
                                    type="button">Add</a>
                                <a href="{{route('excel.productexporet')}}" class=" badge badge-dark border-0 px-4 py-2 mx-3 " id="exportfile"
                                    type="button">Export</a>
                                {{-- <button class=" badge badge-info border-0 px-4 py-2" type="button">Action</button> --}}
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="product-table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Brand Name</th>
                                                <th>Category Name</th>
                                                <th>Group Name</th>
                                                <th>Tax(%)</th>
                                                <th>Purchase Price</th>
                                                <th>Selling Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                    </div>

                    {{-- categorys tab --}}
                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Categorys</h3>
                            </div>

                            <div class="toggle-switch">
                                <a href="#addCategory" target="_modal"
                                    class=" badge badge-dark border-0 px-4 py-2 addCategory11" type="button"
                                    data-url="{{ route('category.store') }}">Add</a>
                                <a href="{{route('excel.categoryexporet')}}" class="badge badge-dark border-0 px-4 py-2 mx-3 " id="exportfile"
                                    type="button">Export</a>
                                <button class=" badge badge-dark border-0 px-4 py-2" type="button">Action</button>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="category_table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- unit tab --}}
                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Units</h3>
                            </div>

                            <div class="toggle-switch">
                                <a class=" badge badge-dark border-0 px-4 py-2 addUnit11" href="#addUnit" target="_modal"
                                    data-url="{{ route('unit.store') }}">Add</a>
                                <a href="{{route('excel.unitsexporet')}}" class=" badge badge-dark border-0 px-4 py-2 mx-3 " id=""
                                    type="button">Export</a>
                                <button class=" badge badge-dark border-0 px-4 py-2" type="button">Action</button>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="unit_table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Sort Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- brand tab --}}
                    <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Brand</h3>
                            </div>

                            <div class="toggle-switch">
                                <a class=" badge badge-dark border-0 px-4 py-2 addBrand11" href="#addBrand"
                                    target="_modal" data-url="{{ route('brand.store') }}">Add</a>
                                <a href="{{route('excel.brandexporet')}}" class=" badge badge-dark border-0 px-4 py-2 mx-3 " id=""
                                    type="button">Export</a>
                                <button class=" badge badge-dark border-0 px-4 py-2" type="button">Action</button>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="brand_table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- group tab --}}
                    <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Group</h3>
                            </div>

                            <div class="toggle-switch">
                                <a class=" badge badge-dark border-0 px-4 p-2 addGroup11" href="#addGroup"
                                    target="_modal" data-url="{{ route('group.store') }}">Add</a>
                                <a href="{{route('excel.groupsexporet')}}" class=" badge badge-dark border-0 px-4 py-2 mx-3 " id=""
                                    type="button">Export</a>
                                <button class=" badge badge-dark border-0 px-4 py-2" type="button">Action</button>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="group_table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- color tab --}}
                    <div class="tab-pane fade" id="ex1-tabs-6" role="tabpanel" aria-labelledby="ex1-tab-6">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Colors</h3>
                            </div>

                            <div class="toggle-switch">
                                <a class=" badge badge-dark border-0 px-4 p-2 addColor11" href="#addColor"
                                    target="_modal" data-url="{{ route('color.store') }}">Add</a>
                                <a href="{{route('excel.colorexporet')}}" class=" badge badge-dark border-0 px-4 py-2 mx-3 " id=""
                                    type="button">Export</a>
                                <button class=" badge badge-dark border-0 px-4 py-2" type="button">Action</button>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="color_table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- size tab --}}
                    <div class="tab-pane fade" id="ex1-tabs-7" role="tabpanel" aria-labelledby="ex1-tab-7">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Sizes</h3>
                            </div>

                            <div class="toggle-switch">
                                <a class=" badge badge-dark border-0 px-4 p-2 addSize11" href="#addSize" target="_modal"
                                    data-url="{{ route('size.store') }}">Add</a>
                                <button class=" badge badge-dark border-0 px-4 py-2 mx-3 " id=""
                                    type="button">Export</button>
                                <button class=" badge badge-dark border-0 px-4 py-2" type="button">Action</button>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="size_table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Product Variant Attributes--}}
                    <div class="tab-pane fade" id="ex1-tabs-8" role="tabpanel" aria-labelledby="ex1-tab-8">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Product Variant Attributes </h3>
                            </div>

                            <div class="toggle-switch">
                                <a class=" badge badge-dark border-0 px-4 p-2 variantAttr11" href="#addvariantAttr" target="_modal"
                                    data-url="{{ route('variantAttr.store') }}">Add</a>
                                <a href="{{route('excel.variantexporet')}}" class=" badge badge-dark border-0 px-4 py-2 mx-3 " id=""
                                    type="button">Export</a>
                                <button class=" badge badge-dark border-0 px-4 py-2" type="button">Action</button>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="variantAttr_table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabs content -->
            </div>

        </div>



    </div>
@endsection
@section('script')

    @include('admin.pages.product.model')
    @include('admin.pages.product.script')
@endsection
