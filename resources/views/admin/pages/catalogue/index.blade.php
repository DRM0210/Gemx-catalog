@extends('admin.layout.main')
@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Catalogue/Quotation</h3>
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
                            aria-controls="ex1-tabs-1" aria-selected="true">Create a new Catalogue</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link allcatalogueShow" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2"
                            role="tab" aria-controls="ex1-tabs-2" aria-selected="false">All Catalogues</a>
                    </li>
                </ul>
                <!-- Tabs navs -->
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    {{-- product tab --}}
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>Create a new Catalogue</h3>
                            </div>
                            <div class="toggle-switch">
                                {{-- <a href="#addprod" target="_modal" class=" badge badge-dark border-0 px-4 py-2 addProdd1"
                                    type="button">Add</a>
                                <button class=" badge badge-primary border-0 px-4 py-2 mx-3 " id="exportfile"
                                    type="button">Export</button> --}}
                                {{-- <button class=" badge badge-info border-0 px-4 py-2" type="button">Action</button> --}}
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <form class="row g-3" id="buyerform">
                                @csrf
                                <div class="col-12 pb-3">
                                    <strong class=" ">Enter the following details</strong>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="inputEmail4" class="form-label"><strong>Name of the
                                            Catalogue</strong></label>
                                    <input type="text" class="form-control" id="catlog_name" name="catlog_name">
                                    <div class="text-danger " id="catlog_name_error"></div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="inputPassword4" class="form-label"><strong>Buyer Name</strong></label>
                                    <select class="form-control  basic" id="buyername" name="buyername" required>
                                       @foreach ($users as $user)
                                        <option>{{$user->name}}</option>
                                       @endforeach
                                     
                                    </select>
                                    <div class="text-danger " id="buyername_error"></div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="inputAddress" class="form-label"><strong>Buyer Email ID</strong></label>
                                
                                    <select class="form-control  nested" id="buyer_email" name="buyer_email" required>
                                        @foreach ($users as $user)
                                        <option>{{$user->email}}</option>
                                       @endforeach
                                    </select>
                                    <div class="text-danger " id="buyer_email_error"></div>
                                    <script>var ss = $(".basic").select2({
                                        tags: true,
                                    });</script>
                                    <script>var ss = $(".nested").select2({
                                        tags: true,
                                    });</script>
                                </div>
                                <div class="col-12 text-right mt-4">
                                    <button class="badge badge-primary border-0  py-2 px-4 " id="productbtn"
                                        type="button">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- categorys tab --}}
                    {{-- product tab --}}
                    <div class="tab-pane fade " id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        @include('admin.pages.catalogue.allcatalogue')
                    </div>
                    <div class="row layout-top-spacing" style="display: none" id="allcatalogue">
                        <div class="col-md-3 border ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group md-form form-sm form-1 pl-0 mt-4">
                                        <input class="form-control my-0 py-1 secondary-border" id="search_product"
                                            name="search_product" type="text" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                            <span class="input-group-text secondary lighten-3" id="basic-text1"><i
                                                    class="fas fa-search text-grey" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <ul class="list-unstyled mt-3" id="more" data-parent="#topAccordion">
                                    <li class="sub-sub-submenu-list border-bottom pb-2 pt-2">
                                        <a href="#page" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg> Category </a>
                                        <ul class="collapse list-unstyled sub-submenu animated pl-4 bg-white"
                                            id="page" data-parent="#more">
                                            @foreach ($category as $cat)
                                                <li>
                                                    <input type="checkbox" name="cat[]" id="cat{{ $cat['id'] }}"
                                                        value="{{ $cat['id'] }}" onclick="searchdata()">
                                                    <a class="text-center"> {{ $cat['cat_name'] }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                
                                    <li class="sub-sub-submenu-list border-bottom pb-2 pt-2">
                                        <a href="#page2" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg> Color </a>
                                        <ul class="collapse list-unstyled sub-submenu animated pl-4 bg-white"
                                            id="page2" data-parent="#more">
                                            @foreach ($colors as $color)
                                                <li>
                                                    <input type="checkbox" name="color[]" id="color{{ $color->cid }}"
                                                        value="{{ $color->cid}}" onclick="searchdata()">
                                                    <a class="text-center"> {{ $color->varian_1 }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="sub-sub-submenu-list border-bottom pb-2 pt-2">
                                        <a href="#page2" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg> Length </a>
                                        <ul class="collapse list-unstyled sub-submenu animated pl-4 bg-white"
                                            id="page2" data-parent="#more">
                                            @foreach ($lengths as $lenth)
                                                <li>
                                                    <input type="checkbox" name="lenth[]" id="lenth{{ $lenth->lid }}"
                                                        value="{{ $lenth->lid }}" onclick="searchdata()">
                                                    <a class="text-center"> {{ $lenth->varian_2 }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="sub-sub-submenu-list border-bottom pb-2 pt-2">
                                        <a href="#page2" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg> Unit </a>
                                        <ul class="collapse list-unstyled sub-submenu animated pl-4 bg-white"
                                            id="page2" data-parent="#more">
                                            @foreach ($units as $unit)
                                                <li>
                                                    <input type="checkbox" name="unit[]" id="unit{{ $unit['id'] }}"
                                                        value="{{ $unit['id'] }}" onclick="searchdata()">
                                                    <a class="text-center"> {{ $unit['name'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="sub-sub-submenu-list border-bottom pb-2 pt-2">
                                        <a href="#page3" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg> Group </a>
                                        <ul class="collapse list-unstyled sub-submenu animated pl-4 bg-white"
                                            id="page3" data-parent="#more">
                                            @foreach ($groups as $group)
                                            <li>
                                                <input type="checkbox" name="group[]" id="group{{ $group['id'] }}"
                                                    value="{{ $group['id'] }}" onclick="searchdata()">
                                                <a class="text-center"> {{ $group['name'] }} </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="sub-sub-submenu-list border-bottom pb-2 pt-2">
                                        <a href="#page4" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg> Brand </a>
                                        <ul class="collapse list-unstyled sub-submenu animated pl-4 bg-white"
                                            id="page4" data-parent="#more">
                                            @foreach ($brands as $brand)
                                                <li>
                                                    <input type="checkbox" name="brand[]" id="brand{{ $brand['id'] }}"
                                                        value="{{ $brand['id'] }}" onclick="searchdata()">
                                                    <a class="text-center"> {{ $brand['name'] }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="sub-sub-submenu-list  pb-2 pt-2">
                                        <a href="#page5" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg> Price </a>
                                    </li>
                                    <li class="sub-sub-submenu-list border-bottom pb-2 pt-2">
                                        <label class="mx-3" for="">MIN</label>
                                        <input class="form-control-sm customRange3" type="text" data-min="min"
                                            id="minInput"><br>

                                        <label class="mx-3" for="">MAX</label>
                                        <input class="form-control-sm customRange3" type="text" data-max="max"
                                            id="maxInput">


                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            {{-- new product listing --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mt-3 ml-5 pl-2">Search for products for the catalague</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="buttons text-right">
                                        <button class="badge badge-primary border p-2" data-toggle="#filtermodal">Filter</button>
                                        <label class="new-control new-checkbox checkbox-primary fs-5 labalmain" for="maincheckbox">
                                            Select All
                                            <input type="checkbox" class="new-control-input maincheckbox" id='maincheckbox'>
                                        </label> &nbsp;
                                        <i class="fa fa-th-large" id="showdiv1" aria-hidden="true"></i> &nbsp; <i
                                            class="fa fa-th-list" id="showdiv2" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>     
                            <!--Buttons of grid and list-->
                            <div id="views">
                                @include('admin.pages.catalogue.filter')
                            </div>
                            {{-- new product listing --}}
                        </div>
                    </div>
                    <!-- Tabs content -->
                </div>
            </div>
        </div>

       

    @endsection
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .buttons {
            font-size: 22px;
            margin-top: 2%;
            margin-left: 4.2%;
        }

        .fa:hover {
            color: darkcyan;
        }

        /*CSS Grid*/
        .section-grid {
            display: flex;
            padding-left: 25px;
            padding-right: 25px;
        }

        .grid-prod {
            flex: 1 1 auto;
            display: flex;
            flex-flow: row wrap;
        }

        .prod-grid {
            flex: 1 1 25%;
            margin: 15px 0 9px 0;
        }

        .prod-grid img {
            width: 100%;
            height: 186px;
        }

        h3,
        p {
            text-align: center;
            line-height: 1.5;
            letter-spacing: 1px;
        }

        .btn {
            background: darkcyan;
            border: 1px solid darkcyan;
            border-radius: 6px;
            color: white;
            font-size: 22px;
            width: 200px;
            height: 40px;
            position: right;
            margin: 10px;
            letter-spacing: 1px;
            display: inline-block;
        }

        .btn:hover {
            background: white;
            border: 2px solid darkcyan;
            border-radius: 6px;
            color: darkcyan;
            font-size: 22px;
            width: 200px;
            height: 40px;
            position: right;
            margin: 10px;
            letter-spacing: 1px;
            font-weight: bold;
            display: inline-block;
        }

        button {
            float: right;
        }

        /*CSS List*/
        .section-list {
            display: flex;
            padding: 2% 4%;
        }

        table {
            width: 100%;
            margin: 10px 10px;
            border: 2px solid #000;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .labalmain {
            display: inline-flex;
        }

        table tr td {
            padding: 10px;
            border-top: 2px solid #000;
        }

        tr td img {
            width: 100%;
        }

        .btn-list {
            background: darkcyan;
            border: 1px solid darkcyan;
            border-radius: 6px;
            color: white;
            font-size: 22px;
            width: 200px;
            height: 40px;
            position: right;
            margin: 10px;
            margin-top: 10%;
            letter-spacing: 1px;
            display: inline-block;
        }

        .btn-list:hover {
            background: white;
            border: 2px solid darkcyan;
            color: darkcyan;
            margin: 10%;
        }

        button {
            float: right;
        }

        @media (min-width : 320px) and (max-width : 480px) {

            .section-list,
            .buttons {
                display: none;
            }
        }

        @media (min-width : 1020px) and (max-width : 2500px) {
            .checkprod {
                position: absolute;
                float: right;
                margin: -5px 0px 0px 222px;
                width: 17px;
                height: 17px;
            }

            .checklistprod {
                position: absolute;
                margin: -47px 0px 0px 0px;
                right: 86px;
                width: 17px;
                height: 17px;
            }
        }

        .maincheckbox {
            width: 17px;
            height: 17px;
            margin-left: 10px;
        }

        .listproddetail {
            margin-left: 34px;
        }

        .titlprod {
            padding-left: 30px;
        }
    </style>
    @section('script')
        <script>
            $(function() {
                // Get the input element




                $('#showdiv1').click(function() {
                    $('div[id^=div]').hide();
                    $('#div1').show();
                });
                $('#showdiv2').click(function() {
                    $('div[id^=div]').hide();
                    $('#div2').show();
                });
            })
        </script>
        @include('admin.pages.catalogue.script')
    @endsection
