@extends('layouts.app')
@section('content')
<div class=" mt-5 pt-5"></div>
 
 
    <!--  BEGIN CONTENT AREA  -->

    <div class="layout-px-spacing ">
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



                                    <div class="invoice-detail-header">

                                        <div class="row justify-content-between">
                                            <div class="col-xl-5 invoice-address-company">

                                                <h4>From:-</h4>

                                                <div class="invoice-address-company-fields">



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
                                                                id="client_name" name="client-name"
                                                                value="{{ $user->name }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client-email"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="client_email" name="client_email"
                                                                value="{{ $user->email }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client-address"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="client_address" name="client_address"
                                                                placeholder="XYZ Street"
                                                                value="405 Mulberry Rd. Mc Grady, NC, 28649">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="client-phone"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="client_phone" name="client_phone"
                                                                placeholder="(123) 456 789" value="(128) 666 070">
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
                                                        <th>Size</th>
                                                        <th class="">Rate</th>
                                                        <th class="text-center">Qty</th>
                                                        <th class="text-right">Amount</th>
                                                        <th class="text-center">Save</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total = 0;
                                                        $grandtotal = 0;
                                                    @endphp
                                                    @foreach ($products as $product)
                                                        @php
                                                            $total += (int) $product->total_amount;
                                                            $grandtotal += (int) $product->grandtotal;
                                                        @endphp
                                                        <tr>
                                                            <input type="hidden" name="product_id[]" id="product_id"
                                                                value="{{ $product->prod_id }}">
                                                            <input type="hidden" name="quantity[]" id="quantity"
                                                                value="{{ $product->quantity }}">

                                                            <td>{{ $product->name }}</td>
                                                            <td><img class="img-thumbnail "
                                                                    src="{{ asset('product_images/' . $product->product_themlin) }}"
                                                                    alt="" width="70px"></td>
                                                            <td>red</td>
                                                            <td>xl</td>

                                                            <td id="selling_price{{ $product->qutationid }}">
                                                                {{ $product->selling_price }}</td>
                                                            <td class="text-center qty">
                                                                {{ $product->quantity }}

                                                            </td>
                                                            <td class="text-right amount"><span
                                                                    class="editable-amount"><span
                                                                        class="currency">$</span>
                                                                    <span class="amount_2"
                                                                        id="amount_1{{ $product->qutationid }}">{{ $product->total_amount }}</span></span>
                                                            </td>

                                                            <td id="discount{{ $product->qutationid }}"
                                                                class="text-center">{{ $product->discount }}%</td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="w-auto">
                                                            <p>Total:</p>
                                                            <p style="width: 107px; margin-bottom: 9px;">Total Discaunt :
                                                            </p>
                                                            <p>Grand Total :</p>
                                                        </td>
                                                        <td class="w-auto">
                                                            <p id="gtotal">{{ $total }} </p>
                                                           
                                                            <span class="d-flex"><p id="alldiscount">{{ $notedata->totaldiscount }}</p>%</span>
                                                            <p id="grandtotal"> {{ $notedata->grandtotal }}</p>
                                                        </td>
                                                        <td class="text-center"></td>


                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="buyernotes d-flex">
                                                <strong>Admin Note :- </strong>
                                                <p>{{ $notedata->notes }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-detail-note">

                                        <div class="row">

                                            <div class="col-md-12 align-self-center">

                                                <div class="form-group row invoice-note">
                                                    <label for="invoice-detail-notes"
                                                        class="col-sm-12 col-form-label col-form-label-sm">Notes:</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" id="invoice_detail_notes" value="" style="height: 88px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="company_id" id="company_id"
                                            value="{{ $companyaccount->id }}">

                                        <input type="hidden" id="catid" name="catid"
                                            value="{{ $catid }}">

                                        <div class="row d-flex justify-content-between  mt-4 invoicedashboredbtn">

                                            <div class="">

                                                {{-- <a href="javascript:void(0);" class="badge badge-dark badge-preview sendemail" data-id="1" id="priviewinvoice" ><span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Cancel Recommendation </a> --}}
                                            </div>
                                            <div class="">


                                                <a href="javascript:void(0);"
                                                    class="badge border-0 badge-dark p-2 badge-send sendinvoice float-end px-4 float-end"
                                                    data-id="3">
                                                    <span class="spinner-border spinner-border-sm d-none" role="status"
                                                        aria-hidden="true"></span>
                                                    Send
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

    {{--  priview quotation --}}
@endsection

@section('script')
    @include('front.catalogue.script')
@endsection
