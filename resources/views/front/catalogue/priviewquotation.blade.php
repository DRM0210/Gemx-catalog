<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="main-container" id="container">
                    <div class="overlay"></div>
                    <div class="search-overlay"></div>
                    <!--  BEGIN CONTENT AREA  -->
                    <div class="row invoice layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="doc-container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="invoice-container">
                                            <div class="invoice-inbox">
                                                <div id="ct" class="">
                                                    <div class="invoice-00001">
                                                        <div class="content-section">
                                                            <div class="inv--head-section inv--detail-section">
                                                                <div class="row">
                                                                    
                                                                    <div class="col-sm-6 align-self-center mt-3">
                                                                        <h4>From:-</h4>
                                                                        <p class="inv-street-addr">{{$companyaccount->company_name}}</p>
                                                                        <p class="inv-email-address">{{$companyaccount->company_email}}</p>
                                                                        <p class="inv-email-address">{{$companyaccount->company_address}}</p>
                                                                        <p class="inv-email-address">{{$companyaccount->company_phone}}</p>
                                                                        {{-- <p class="inv-email-address">(120) 456 789</p> --}}
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-6 align-self-center mt-3 text-sm-left">
                                                                        <div
                                                                        class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                        <p class="inv-to">Invoice To</p>
                                                                    </div>
                                                                 
                                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                        <p class="inv-customer-name" id="priviewcust_name"></p>
                                                                        <p class="inv-street-addr" id="priviewcust_address"></p>
                                                                        <p class="inv-email-address" id="priviewcust_email">
                                                                        </p>
                                                                        <p class="inv-email-address" id="priviewcust_mobile"> </p>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        

                                                            <div class="inv--product-table-section" id="invoiceviewdata">
                                                                {{-- <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="">
                                                                            <tr>
                                                                                <th class="">Name</th>
                                                                                <th>Image</th>
                                                                                <th>Colour</th>
                                                                                <th>Material</th>
                                                                                <th>Size</th>
                                                                                <th class="">Rate</th>
                                                                                <th class="">Qty</th>
                                                                                <th class="text-right">Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($products as $product)
                                                                            <tr>
                                                                                <td>{{$product->name}}</td>
                                                                                <td><img class="img-thumbnail "
                                                                            src="{{ asset('product_images/'.$product->product_themlin) }}"
                                                                            alt="" width="70px"></td>
                                                                        <td>red</td>
                                                                        <td>Gold</td>
                                                                        <td>xl</td>
                                                                               
                                                                                <td>{{$product->selling_price}}</td>
                                                                                <td class="text-right qty" id="priviewqty">4</td>
                                                                                <td class="text-right amount"><span class="editable-amount"><span class="currency">$</span> <span class="amount">120.00</span></span></td>
                                                                          
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div> --}}
                                                            </div>

                                                           

                                                            <div class="inv--note">
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                      Notes:  <p id="notes">
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  END CONTENT AREA  -->
                </div>
            </div>
            <div class="modal-footer">
                <button class="badge badge-dark border-0" data-dismiss="modal"><i class="flaticon-cancel-12" id="dismispriviewdata"></i>
                    Close</button>
            </div>
        </div>
    </div>
</div>
