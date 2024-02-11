@extends('admin.layout.main')

@section('content')
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN CONTENT AREA  -->
    <div class="layout-px-spacing">
        <div class="page-header">
            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <div class="title">
                    <h3>Payment Invoice</h3>
                </div>
            </nav>
        </div>

        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>
            <!--  BEGIN CONTENT AREA  -->
            <div class="layout-px-spacing">
                <div class="row invoice layout-top-spacing layout-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="doc-container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="invoice-content">
                                        <div class="invoice-detail-body">
                                            <form id="addaccountform" action="{{ route('payment.create') }}" method="POST"
                                                enctype="multipart/form-data">

                                                @csrf
                                                <input type="hidden" value="" id="customerid" name="customerid">
                                                <div class="invoice-detail-header">
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-12 ">
                                                            <h4 class="mb-3 titleform"
                                                                style="font-size: 20px;
                                                            font-weight: 600;">
                                                                Add New Company Account:-</h4>
                                                            <div class="invoice-address-company-fields ">

                                                                <div class="form-group row">
                                                                    <label for="company-name"
                                                                        class="col-sm-3 col-form-label col-form-label-sm">Company
                                                                        Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="company_name" name="company_name"
                                                                            value="">
                                                                        <div class="text-danger" id="company_name_error">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="company-email"
                                                                        class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="company_email" name="company_email"
                                                                            value="">
                                                                        <div class="text-danger" id="company_email_error">
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="company-address"
                                                                        class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="company_address" name="company_address"
                                                                            value="">
                                                                        <div class="text-danger" id="company_address_error">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="company-phone"
                                                                        class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="company_phone" name="company_phone"
                                                                            value="">
                                                                        <div class="text-danger" id="company_phone_error">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row invoice-created-by">
                                                                <label for="payment-method-account"
                                                                    class="col-sm-3 col-form-label col-form-label-sm">Bank
                                                                    Account #:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="bank_account" name="bank_account"
                                                                        value="">
                                                                    <div class="text-danger" id="bank_account_error"></div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row invoice-created-by">
                                                                <label for="payment-method-bank-name"
                                                                    class="col-sm-3 col-form-label col-form-label-sm">Bank
                                                                    Name:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm" id="bank_name"
                                                                        name="bank_name" value="">
                                                                    <div class="text-danger" id="bank_name_error"></div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row invoice-created-by">
                                                                <label for="payment-method-code"
                                                                    class="col-sm-3 col-form-label col-form-label-sm">IFSC
                                                                    code:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="ifsc_code" name="ifsc_code" value="">
                                                                    <div class="text-danger" id="ifsc_code_error"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row invoice-created-by">
                                                                <label for="payment-method-country"
                                                                    class="col-sm-3 col-form-label col-form-label-sm">Country:</label>
                                                                <div class="col-sm-9">
                                                                    <select name="country_name"
                                                                        class="form-control country_code  form-control-sm nested"
                                                                        id="country_name">
                                                                        <option value="">Choose Country
                                                                        </option>
                                                                        <option value="United States">
                                                                            United
                                                                            States</option>
                                                                        <option value="United Kingdom">United
                                                                            Kingdom</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Australia">Australia
                                                                        </option>
                                                                        <option value="Germany">Germany</option>
                                                                        <option value="Sweden">Sweden</option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="New-Zealand">New Zealand
                                                                        </option>
                                                                        <option value="Afghanistan">Afghanistan
                                                                        </option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American-Samoa">Andorra
                                                                        </option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Antigua Barbuda">Antigua
                                                                            &amp; Barbuda</option>
                                                                        <option value="Argentina">Argentina
                                                                        </option>
                                                                        <option value="Armenia">Armenia</option>
                                                                        <option value="Aruba">Aruba</option>
                                                                        <option value="Austria">Austria</option>
                                                                        <option value="Azerbaijan">Azerbaijan
                                                                        </option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bahrain">Bahrain</option>
                                                                        <option value="Bangladesh">Bangladesh
                                                                        </option>
                                                                        <option value="Barbados">Barbados</option>
                                                                        <option value="Belarus">Belarus</option>
                                                                        <option value="Belgium">Belgium</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermuda">Bermuda</option>
                                                                        <option value="Bhutan">Bhutan</option>
                                                                        <option value="Bolivia">Bolivia</option>
                                                                        <option value="Bosnia">Bosnia &amp;
                                                                            Herzegovina</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British">British Virgin
                                                                            Islands</option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina">Burkina Faso
                                                                        </option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Cape">Cape Verde</option>
                                                                        <option value="Cayman">Cayman Islands
                                                                        </option>
                                                                        <option value="Central-African">Central
                                                                            African Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Costa-Rica">Costa Rica
                                                                        </option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czechia">Czechia</option>
                                                                        <option value="Côte">Côte d’Ivoire
                                                                        </option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican">Dominican
                                                                            Republic</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El-Salvador">El Salvador
                                                                        </option>
                                                                        <option value="Equatorial-Guinea">
                                                                            Equatorial Guinea</option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="Gabon">Gabon</option>
                                                                        <option value="Georgia">Georgia</option>
                                                                        <option value="Ghana">Ghana</option>
                                                                        <option value="Greece">Greece</option>
                                                                        <option value="Grenada">Grenada</option>
                                                                        <option value="Guatemala">Guatemala
                                                                        </option>
                                                                        <option value="Guernsey">Guernsey</option>
                                                                        <option value="Guinea">Guinea</option>
                                                                        <option value="Guinea-Bissau">Guinea-Bissau
                                                                        </option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong-Kong">Hong Kong SAR
                                                                            China</option>
                                                                        <option value="Hungary">Hungary</option>
                                                                        <option value="Iceland">Iceland</option>
                                                                        <option value="India">India</option>
                                                                        <option value="Indonesia">Indonesia
                                                                        </option>
                                                                        <option value="Iran">Iran</option>
                                                                        <option value="Iraq">Iraq</option>
                                                                        <option value="Ireland">Ireland</option>
                                                                        <option value="Israel">Israel</option>
                                                                        <option value="Italy">Italy</option>
                                                                        <option value="Jamaica">Jamaica</option>
                                                                        <option value="Japan">Japan</option>
                                                                        <option value="Jordan">Jordan</option>
                                                                        <option value="Kazakhstan">Kazakhstan
                                                                        </option>
                                                                        <option value="Kenya">Kenya</option>
                                                                        <option value="Kuwait">Kuwait</option>
                                                                        <option value="Kyrgyzstan">Kyrgyzstan
                                                                        </option>
                                                                        <option value="Laos">Laos</option>
                                                                        <option value="Latvia">Latvia</option>
                                                                        <option value="Lebanon">Lebanon</option>
                                                                        <option value="Lesotho">Lesotho</option>
                                                                        <option value="Liberia">Liberia</option>
                                                                        <option value="Libya">Libya</option>
                                                                        <option value="Liechtenstein">Liechtenstein
                                                                        </option>
                                                                        <option value="Lithuania">Lithuania
                                                                        </option>
                                                                        <option value="Luxembourg">Luxembourg
                                                                        </option>
                                                                        <option value="Macedonia">Macedonia
                                                                        </option>
                                                                        <option value="Madagascar">Madagascar
                                                                        </option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Mauritania">Mauritania
                                                                        </option>
                                                                        <option value="Mauritius">Mauritius
                                                                        </option>
                                                                        <option value="Mexico">Mexico</option>
                                                                        <option value="Moldova">Moldova</option>
                                                                        <option value="Monaco">Monaco</option>
                                                                        <option value="Mongolia">Mongolia</option>
                                                                        <option value="Montenegro">Montenegro
                                                                        </option>
                                                                        <option value="Morocco">Morocco</option>
                                                                        <option value="Mozambique">Mozambique
                                                                        </option>
                                                                        <option value="Myanmar">Myanmar (Burma)
                                                                        </option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands
                                                                        </option>
                                                                        <option value="Nicaragua">Nicaragua
                                                                        </option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="North-Korea">North Korea
                                                                        </option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestinian">Palestinian
                                                                            Territories</option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua">Papua New Guinea
                                                                        </option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines
                                                                        </option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russia">Russia</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Réunion">Réunion</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="San-Marino">San Marino
                                                                        </option>
                                                                        <option value="Saudi-Arabia">Saudi Arabia
                                                                        </option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Serbia">Serbia</option>
                                                                        <option value="Seychelles">Seychelles
                                                                        </option>
                                                                        <option value="Sierra-Leone">Sierra Leone
                                                                        </option>
                                                                        <option value="Singapore">Singapore
                                                                        </option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon-Islands">Solomon
                                                                            Islands</option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South-Africa">South Africa
                                                                        </option>
                                                                        <option value="South-Korea">South Korea
                                                                        </option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri-Lanka">Sri Lanka
                                                                        </option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Swaziland">Swaziland
                                                                        </option>
                                                                        <option value="Switzerland">Switzerland
                                                                        </option>
                                                                        <option value="Syria">Syria</option>
                                                                        <option value="Sao-Tome-and-Principe">São
                                                                            Tomé &amp; Príncipe</option>
                                                                        <option value="Tajikistan">Tajikistan
                                                                        </option>
                                                                        <option value="Tanzania">Tanzania</option>
                                                                        <option value="Thailand">Thailand</option>
                                                                        <option value="Timor-Leste">Timor-Leste
                                                                        </option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Tonga">Tonga</option>
                                                                        <option value="Trinidad-and-Tobago">
                                                                            Trinidad &amp; Tobago</option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan
                                                                        </option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="UAE">United Arab Emirates
                                                                        </option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="Uzbekistan">Uzbekistan
                                                                        </option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Venezuela">Venezuela
                                                                        </option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                    <script>
                                                                        $(".nested").select2({
                                                                            tags: true
                                                                        });
                                                                    </script>
                                                                    <div class="text-danger" id="country_name_error">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row invoice-created-by">

                                                                <div class="col-12 text-right">
                                                                    <button type="submit"
                                                                        class="badge badge-dark border-0 p-2 bg-dark"
                                                                        id="add_company_acc" value=""> Add
                                                                        Account
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="invoice-detail-items mt-2" id="views_account">
                                                <div id="successmsg" class="text-danger text-center"></div>
                                                {{-- all account section --}}
                                                @include('admin.pages.payment.accounts')
                                                {{-- all account section --}}

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


    <!--  END CONTENT AREA  -->

    {{--  priview quotation --}}
@endsection

@section('script')
    @include('admin.pages.payment.script')
@endsection
