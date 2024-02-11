@extends('layouts.app')
@section('content')
<div class=" mt-5 pt-5"></div>
    <!--  BEGIN CONTENT AREA  -->

    <div class="layout-px-spacing">
        <div class="page-header">
            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <div class="title">
                    <h3>Quotation</h3>
                </div>

            </nav>
        </div>

        <div class="row invoice layout-top-spacing layout-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="doc-container">

                    <div class="row">
                        <div class="col-xl-12">

                            <div class="invoice-content">

                                <div class="invoice-detail-body">

<input type="hidden" id="catid" name="catid" value="{{$catid}}">

                                    <div class="invoice-detail-header">

                                        <div class="row justify-content-between">
                                            <div class="col-xl-5 invoice-address-company">

                                                <h4>From:-</h4>

                                                <div class="invoice-address-company-fields">


                                                    <input type="hidden" name="company_id" id="company_id" value="{{$companyaccount->id}}">
                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Company
                                                            Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="name" name="name"
                                                                value="{{ $companyaccount->company_name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Company
                                                            Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="email" name="email"
                                                                value="{{ $companyaccount->company_email }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="company_address"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Company
                                                            Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="company_address" name="company_address"
                                                                value="{{ $companyaccount->company_address }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="company_phone"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Company
                                                            Phone</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="company_phone" name="company_phone"
                                                                value="{{ $companyaccount->company_phone }}" disabled>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="col-xl-5 invoice-address-client">

                                                <h4>Bill To:-</h4>

                                                <div class="invoice-address-client-fields">

                                                    <div class="form-group row">
                                                        <label for="client-name"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="client_name" name="client-name" value="{{$users->name}}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client-email"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="client_email" name="client_email"
                                                                value="{{$users->email}}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client-address"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="client_address" name="client_address"
                                                                value="405 Mulberry Rd. Mc Grady, NC, 28649" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client-phone"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="client_phone" name="client_phone"
                                                                value="(128) 666 070" disabled>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>

                                    </div>




                                    <div class="invoice-detail-items" id="invoicedata">

                                        <div class="table-responsive">
                                            <table class="table table-bordered item-table">
                                                <thead>
                                                    <tr>
                                                        <th class="">Name</th>
                                                        <th>Image</th>
                                                        <th>Colour</th>
                                                        <th>Material</th>
                                                        <th>Size</th>
                                                        <th class="">Rate</th>
                                                        <th class="">Qty</th>
                                                        <th class="text-right">Amount</th>
                                                        <th class="text-right">Discount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $gtotal = 0;
                                                    @endphp
                                                    @foreach ($products as $product)
                                                        @php
                                                            $gtotal = $gtotal + $product->selling_price;
                                                        @endphp
                                                        <tr>
                                                            <input type="hidden" name="product_id[]" id="product_id" value="{{$product->id}}">
                                                            <td>{{ $product->name }}</td>
                                                            <td><img class="img-thumbnail "
                                                                    src="{{ asset('product_images/' . $product->product_themlin) }}"
                                                                    alt="" width="70px"></td>
                                                            <td>red</td>
                                                            <td>Gold</td>
                                                            <td>xl</td>

                                                            <td id="selling_price{{ $product->id }}">
                                                                {{ $product->selling_price }}</td>
                                                            <td class="text-right qty">
                                                             <input type="hidden" id="prod_qty{{ $product->id }}" value="1" name="prod_qty[]"> 
                                                                <button class="badge badge-light-dark border-0 p-2 pricegraf text-dark" data-id="{{ $product->id }}">View
                                                                    Price Graf</button>
                                                            </td>
                                                            <td class="text-right amount"><span
                                                                    class="editable-amount"><span
                                                                        class="currency">$</span>
                                                                    <span class="amount_2"
                                                                        id="amount_1{{ $product->id }}">{{ $product->selling_price }}</span></span>
                                                            </td>

                                                            <td id="discount{{ $product->id }}" class="text-center"></td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Total:</td>
                                                        <td id="gtotal">{{ $gtotal }}</td>
                                                        <td id="discount" class="text-center"></td>


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>




                                    <div class="invoice-detail-note">

                                        <div class="row">

                                            <div class="col-md-12 align-self-center">

                                                <div class="form-group row invoice-note">
                                                    <label for="invoice-detail-notes"
                                                        class="col-sm-12 col-form-label col-form-label-sm">Notes:</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" id="invoice_detail_notes"
                                                            placeholder='Notes - For example, "Thank you for doing business with us"' name="notes" style="height: 88px;">Thank you for doing business with us.</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-between  mt-4 invoicedashboredbtn">

                                            <div >
                                                <a href="" class="badge badge-dark badge-preview p-2"
                                                    data-toggle="modal" data-target=".bd-example-modal-xl"
                                                    id="priviewinvoice" >Preview</a>
                                            </div>
                                            <div >
                                                <a href="javascript:void(0);" class="badge badge-primary badge-send p-2 sendorder"><span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Send
                                                </a>
                                            </div>
                                            {{-- <div class="">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-download">Save</a>
                                                    </div> --}}
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
    {{--  view price graf --}}

<!-- Modal -->
<div class="modal fade" id="pricegraf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
              <div class="modalheader">
                <h5 class="modal-title" id="exampleModalLabel">Price Graf</h5>
              </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get">
                    <div class="row">
                    <div class="col-md-12">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th> Quntity</th>
                                    <th> Price</th>
                                </tr>
                            </thead>
                            <tbody id="qty_datatable">
                             
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <input type="hidden" value="" id="prod_idgraf">
                </form>
                <div class="d-flex"><input type="text" class="form-control form-control-sm changeamount" value="1" id="quantity" placeholder="Enter Quantity">
                    <h6 id="totalprice" class="w-25 text-center pt-2 pb-2 ">$ </h6>
                    </div>
            </div>
            {{-- <div class="modal-footer">
                
                 <button type="button" class="badge badge-dark" data-dismiss="modal">Done</button>
              
            </div> --}}
        </div>
    </div>
</div>

    {{--  priview quotation --}}
    @include('front.catalogue.priviewquotation')
    @include('front.catalogue.script')
@endsection


    

