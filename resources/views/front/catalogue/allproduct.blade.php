@extends('layouts.app')
@section('content')

<div class="layout-px-spacing">
  <input type="hidden" id="catid" value="{{$catid}}">
    <div class=" mt-5 pt-5"></div>
    <div class="page-header">
        <div class="page-title">
            <div class="d-flex mt-4">
                <img src="{{ asset('assets/img/diamond.png') }}" alt="" width="70px">
                <div class="pl-3">
                    <h3 class="heddingmain">{{$companyaccount->company_name}}</h3>
                    <p>{{$companyaccount->worktype}}</p>
                </div>
            </div>
        </div>

        <div class="toggle-switch togalswithbox">
            <button class=" badge badge-dark bg-success border-0 px-4 py-2 mx-3 " id="downloadppt"
            type="button" height="36px">Download PPT</button>
        <a  class=" badge badge-dark border-0 bg-dark px-4 py-2 quotation" type="button" >Quotation</a> 
        </div>
    </div>
    <div class="container">
        <div class="row">
            <input type="hidden" id="userid" value="{{$userid}}">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="sortlistbox">
                                <h5 style="color : #00e509;">{{$product->bname}}</h5>
                               <div class="sortlistbtn">
                                <input type="checkbox" class="badge-check d-none" id="shortlist{{$product->product_id}}" name="shortlist[]" value="{{$product->product_id}}">
                                <label class="badge badge-primary text-white " id='toggleElement{{$product->product_id}}' for="shortlist{{$product->product_id}}" style="cursor: pointer;">Shortlist</label>
                               </div>
                            </div>
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('product_images/' . $product->product_themlin) }}" alt="First slide" height="186px">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('product_images/' . $product->product_themlin ?? '') }}" alt="Second slide" height="186px">
                                      
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('product_images/' . $product->product_themlin ?? '') }}" alt="Third slide" height="186px">
                                    </div>
                                  
                                </div>
                                
                              
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next text-dark" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon  text-dark" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="code-section-container d-flex justify-content-between">

                     <span>{{$product->pname}}</span>
                     <span>${{$product->selling_price}}</span>

                       
                    </div>

                </div>
            </div>

            <script>
                $(document).ready(function() {
           $('#quotation').hide();
               })
               document.addEventListener('DOMContentLoaded', function() {
    var toggleElement{{$product->product_id}} = document.getElementById('toggleElement{{$product->product_id}}');
    var colorCheckbox = document.getElementById('colorCheckbox');

    // Toggle color on element click
    toggleElement{{$product->product_id}}.addEventListener('click', function() {
        toggleElement{{$product->product_id}}.classList.toggle('checked-color');
       
        $('#quotation').show();
    });

    // Toggle color on checkbox change
    colorCheckbox.addEventListener('change', function() {
        if (colorCheckbox.checked) {
            toggleElement{{$product->product_id}}.classList.add('checked-color');
        } else {
            toggleElement{{$product->product_id}}.classList.remove('checked-color');
        }
    });
});

            </script>
            
            @endforeach
           
        </div>
        <button  class=" badge badge-dark border-0 px-4 py-2 quotation bg-dark float-end" type="button" id="quotation"   width="150px">Add Quotation</button> 
        <div class="text-center mt-4"><b class="text-dark">Yay! You have seen it all</b></div>
    </div>
</div>
@include('front.catalogue.script')
@endsection
