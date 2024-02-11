@extends('admin.layout.main')

@section('content')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Sales Dashboard</h3>
            </div>

            <div class="toggle-switch">

            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-md-12">
                <div class="input-group mb-4 d-flex col-md-4 col-12">
                    <label for="datesearch" class="pr-3 col-md-5 col-12"> Data Overview</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon5"><i class="fa fa-calendar"
                                aria-hidden="true"></i></span>
                    </div>
                    <select name="" id="datesearch" class="form-control">
                        <option value="">Select Any</option>
                        <option value="{{ $today->format('Y/m/d') }}">Today</option>
                        <option value="{{ $yesterday->format('Y/m/d') }}">Yesterday</option>
                        <option value="{{ $sevenDaysAgo->format('Y/m/d') }}">7 Days</option>
                        <option value="{{ $thirtyDaysAgo->format('Y/m/d') }}">30 Days</option>
                        <option value="{{ $oneYearAgo->format('Y/m/d') }}">1 Year</option>
                        <option value="all time">All Time</option>
                    </select>

                </div>


            </div>







        </div>
        <div class="row bg-white m-2 p-4">
            <div class="col-md-4">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-cube iconscard"></i>
                        </div>
                        <span class="ml-4">
                            <h5 class="card-title allproducts">{{ $products ?? 0 }}</h5>
                            <p class="card-text">ADD PRODUCT</p>
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-bag-shopping iconscard"></i>
                        </div>
                        <span class="ml-4">
                            <h5 class="card-title allproducts">{{ $products ?? 0 }}</h5>
                            <p class="card-text">TOTAL PRODUCT</p>
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-eye iconscard"></i>
                        </div>
                        <span class="ml-4">
                            <h5 class="card-title allprodview">1500</h5>
                            <p class="card-text">PRODUCT VIEWED</p>
                        </span>
                    </div>
                </div>

            </div>

        </div>
        <div class="row bg-white m-2 p-4">
            <div class="col-md-3">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-file-circle-plus iconscard"></i>
                        </div>
                        <span class="ml-3">
                            <h5 class="card-title allcataloggenrate">{{ $catalogs ?? 0 }}</h5>
                            <p class="card-text">Catalogue Generate</p>
                        </span>
                    </div>
                </div>


            </div>
            <div class="col-md-3">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-file-export iconscard"></i>
                        </div>
                        <span class="ml-3">
                            <h5 class="card-title allquotation">{{ $quotations ?? 0 }}</h5>
                            <p class="card-text">Quotation Generate</p>
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-receipt iconscard"></i>
                        </div>
                        <span class="ml-3">
                            <h5 class="card-title allinvoice">{{ $invoices ?? 0 }}</h5>
                            <p class="card-text">Invoice Generate</p>
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-user iconscard"></i>
                        </div>
                        <span class="ml-3">
                            <h5 class="card-title allclient">{{ $users ?? 0 }}</h5>
                            <p class="card-text">Total Clients</p>
                        </span>
                    </div>
                </div>

            </div>


        </div>
        <div class="row bg-white m-2 p-4">
            <div class="col-md-3">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-cart-arrow-down iconscard"></i>
                        </div>
                        <span class="ml-3">
                            <h5 class="card-title allsoldprod">80</h5>
                            <p class="card-text">Product Sold</p>
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-list-ul iconscard"></i>
                        </div>
                        <span class="ml-3">
                            <h5 class="card-title allorder">12</h5>
                            <p class="card-text">Order</p>
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card component-card_1 desboredcared1">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon-svg">
                            <i class="fa-solid fa-percent iconscard"></i>
                        </div>
                        <span class="ml-3">
                            <h5 class="card-title allrevenue">6778</h5>
                            <p class="card-text">Revenue</p>
                        </span>
                    </div>
                </div>

            </div>
        </div>

    </div>
  
@endsection
@section('script')
<script>
 $(document).ready(function() {
    $('#datesearch').on('change', function() {
        // Get form data
        var filterdate = $(this).val();

        // Send AJAX request
        $.ajax({
            url: '{{ route('admin.filterdashbored') }}',
            type: 'post',
            data: {
                'filterdate': filterdate,
                _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('.allproducts').text('');
                    $('.allcataloggenrate').text('');
                    $('.allquotation').text('');
                    $('.allinvoice').text('');
                    $('.allclient').text('');
                    //   $('.allsoldprod').text('');
                    //   $('.allorder').text('');

                    $('.allproducts').text(response.products);
                    $('.allcataloggenrate').text(response.catalogs);
                    $('.allquotation').text(response.quotations);
                    $('.allinvoice').text(responrese.invoices);
                    $('.allclient').text(response.users);
                    //   $('.allsoldprod').text(response);
                    //   $('.allorder').text(sponse);

                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    })
</script>
@endsection