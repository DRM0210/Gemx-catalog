<div class="container">
    <!--Product Grid-->
    <div id="div1">
        <section class="section-grid">
            <div class="grid-prod">
                @foreach ($products as $product)
                    <div class="prod-grid col-md-3"><input type="checkbox" class="new-control-input checkprod"
                            name="checkprod[]" onclick="checkprod()" value="{{ $product['id'] }}"><img
                            src="{{ asset('product_images/' . $product['product_themlin']) }}" alt="kalita">

                        <div class="d-flex justify-content-between bg-secondary detailprodlistin">
                            <p class="text-white">${{ $product['selling_price'] }}</p>
                            <p class="text-white">{{ $product['sku'] }}</p>
                            <p class="text-white">{{ $product['name'] }} </p>

                        </div>

                    </div>
                @endforeach

            </div>


        </section>

        <div class="col-12 text-right mt-4">

            <button class="badge badge-primary border-0  py-2 px-4 " id="nextbutton" type="submit">Next</button>
        </div>
    </div>
    <!--Product List-->
    <div id="div2" style="display:none;">
        <section class="section-list">
            {{-- <table>
                @foreach ($products as $product)
                    <tr>
                        <td> <img
                                src="{{ asset('product_images/' . $product['product_themlin']) }}"
                                alt="kalita" width="240px" height="160px">
                        <td>
                        <td>
                            <input type="checkbox"
                                class="new-control-input checklistprod" name="checkprod[]" onclick="checkprod()" value="{{ $product['id'] }}">
                            <p>{{ $product['name'] }}</p>
                            <div class="d-flex justify-content-evenly listproddetail">
                                <p>Rs.{{ $product['selling_price'] }}</p>
                                <p class="titlprod">{{ $product['category_name'] }} </p>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </table> --}}

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-12 border mt-3 p-3">
                        <div class="row">
                            <div class="col-3">
                                <img class="badge-pills img-thumbnail" src="{{ asset('product_images/' . $product['product_themlin']) }}" alt="kalita"
                                   >
                            </div>
                            <div class="col-7">
                                <b class="font-weight-bold text-black">{{ $product['name'] }}</b>
                                <p class="text-left"> {{$product['description']}} </p>
                                <div class="d-flex justify-content-evenly ">
                                   
                                    <b class="text-black">Rs.{{ $product['selling_price'] }}</b>
                                    <p class="titlprod">{{ $product['category_name'] }} </p>
                                </div>
                            </div>
                            <div class="col-2">
                                <input type="checkbox"
                                class="new-control-input checkprod" name="checkprod[]" onclick="checkprod()" value="{{ $product['id'] }}">
                                {{-- <input type="checkbox" class="float-right form-control-input checkprod" name="checkprod[]"
                                onclick="checkprod()" value="{{ $product['id'] }}"> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="col-12 text-right mt-4 ">

            <button class="badge badge-primary border-0  py-2 px-4 " id="nextbutton" type="submit"></button>
        </div>
    </div>
</div>
