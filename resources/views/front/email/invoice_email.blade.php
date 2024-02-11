<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="layout-px-spacing">
            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <div class="title">
                        <h3>Quotation</h3>
                    </div>

                </nav>
            </div>

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
                                                                <p class="inv-street-addr">
                                                                    {{ $companyaccount->company_name }}</p>
                                                                <p class="inv-email-address">
                                                                    {{ $companyaccount->company_email }}</p>
                                                                <p class="inv-email-address">
                                                                    {{ $companyaccount->company_address }}</p>
                                                                <p class="inv-email-address">
                                                                    {{ $companyaccount->company_phone }}</p>
                                                                {{-- <p class="inv-email-address">(120) 456 789</p> --}}
                                                            </div>
                                                            <div class="col-sm-6 align-self-center mt-3 text-sm-left">
                                                                <div
                                                                    class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                    <p class="inv-to">Invoice To</p>
                                                                </div>

                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                    <p class="inv-customer-name" id="priviewcust_name">
                                                                        {{$users->name}}
                                                                    </p>
                                                                    <p class="inv-street-addr" id="priviewcust_address">
                                                                        {{$users->email}}
                                                                    </p>
                                                                    <p class="inv-email-address" id="priviewcust_email">
                                                                    </p>
                                                                    <p class="inv-email-address"
                                                                        id="priviewcust_mobile"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="invoice-detail-items" id="invoicedata">
                                                    @php echo $products ; @endphp
                                                     
                                                    </div>

                                                    <div class="amountinvoice float-right">
                                                    <span> <strong>Total:</strong> {{$total}}</span>
                                                    <span> <strong>Discount:</strong> {{$discount}}</span>
                                                    <span> <strong>Grand Total:</strong> {{$grandtotal}}</span>
                                                    </div>

                                                    <div class="inv--note">
                                                        <div class="row mt-4">
                                                            <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                Notes: <p id="notes"> {{$notes}}
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
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
