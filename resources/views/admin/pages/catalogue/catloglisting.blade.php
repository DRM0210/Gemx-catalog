@extends('admin.layout.main')

@section('content')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Spring Collection</h3>
            </div>

            <div class="toggle-switch">
                <a href="#addprod" target="_modal" class=" badge badge-dark border-0 px-4 py-2 addProdd1" type="button">Add
                    More Products</a>
                <button class=" badge badge-primary border-0 px-4 py-2 mx-3 exampleModalbtn" id="exportfile"
                    type="button">Customize Buyer View</button>
                <button class=" badge badge-primary border-0 px-4 py-2 mx-3 " id="exportfile" type="button"
                    data-toggle="modal" data-target="#generate_cataloguemodal">Continue</button>

            </div>
        </div>
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <!-- Tabs content -->
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    {{-- product tab --}}
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="page-header">
                            <div class="page-title">
                                <strong>{{ $totalproduct }}</strong>
                            </div>

                        </div>
                        <div class="row layout-top-spacing" id="oldprivew">
                            <div class="col-md-12 ">
                                <div class="table-responsive">
                                    <table class="table" id="product-table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Delete </th>
                                                <th>Product Id</th>
                                                <th>Image</th>
                                                <th>Selling Price</th>
                                                <th>Purchasing Price</th>
                                                <th>Name</th>
                                                <th>Material</th>
                                                <th>Category</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td><a class="delete-product removprod"><span
                                                                class="badge rounded-pill bg-danger"><i
                                                                    class="fa-solid fa-trash"></i></span></a> <input
                                                            type="hidden" name="pid[]" id="pid"
                                                            value="{{ $product['id'] }}"></td>
                                                    <td>
                                                        <p>{{ $product['id'] }}</p>
                                                    </td>
                                                    <td><img class="img-thumbnail "
                                                            src="{{ asset('product_images/' . $product['product_themlin']) }}"
                                                            alt="" width="70px"></td>
                                                    <td>{{ $product['selling_price'] }}</td>
                                                    <td>{{ $product['purchase_price'] }}</td>
                                                    <td>{{ $product['name'] }}</td>
                                                    <td>{{ $product['group_name'] }}</td>
                                                    <td>{{ $product['category_name'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="row layout-top-spacing" id="newprivew">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table" id="product-table" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Delete </th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Descripation</th>
                                                <th>Brand </th>
                                                <th>Category </th>
                                                <th>Group </th>
                                                <th>Selling Price</th>
                                                <th>Variants</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td><a class="delete-product removprod"><span
                                                                class="badge rounded-pill bg-danger"><i
                                                                    class="fa-solid fa-trash"></i></span></a> </td>

                                                    <td><img class="img-thumbnail "
                                                            src="{{ asset('product_images/' . $product['product_themlin']) }}"
                                                            alt="" width="70px"></td>

                                                    <td width="170px" class="nametd">{{ $product['name'] }}</td>
                                                    <td class="descriptiontd">{{ $product['description'] }}</td>
                                                    <td class="brandnametd">{{ $product['brand_name'] }}</td>
                                                    <td class="categorytd">{{ $product['category_name'] }}</td>
                                                    <td class="grouptd">{{ $product['group_name'] }}</td>
                                                    <td width="140px" class="sellingtd">{{ $product['selling_price'] }}
                                                    </td>
                                                    <td class="buttonvarianttd"><button
                                                            class="badge badge-info border-0 variant_view"
                                                            data-id="{{ $product->id }}">view</button></td>

                                                </tr>
                                            @endforeach
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
    <section id="popup">
        <!-- permisans popup content -->
        @include('admin.pages.catalogue.popup')

        <!-- Gentate Catalogue form popup -->
        @include('admin.pages.catalogue.generate_catalogue')

        <!-- Priview Catalogue Shaps popup -->
        @include('admin.pages.catalogue.priview_catalogue')

    </section>
@endsection

@section('script')
    @include('admin.pages.catalogue.script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection
