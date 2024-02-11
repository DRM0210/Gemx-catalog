@extends('admin.layout.main')

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <div class="page-title">
                    <div class="d-flex mt-4">
                        <img src="{{ asset('assets/img/diamond.png') }}" alt="" width="70px">
                        <div class="pl-3">
                            <h3 class="heddingmain">ACP jewellery Pvt Ltd</h3>
                            <p>Spring Collection</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="toggle-switch">
                <a href="{{ route('export.ppt',['catid'=>$catid,'token'=>$token]) }}" class="badge badge-dark border-0 pt-2 col-6 mx-3" id="downloadppt" type="button"
                    height="36px">Download PPT</a>
                <a href="{{ route('excel.catalogexporet',['catid'=>$catid,'token'=>$token]) }}" class="badge badge-dark pt-2 border-0 col-6" id="downloadppt" type="button"
                    height="36px">Download Excel</a>
            </div>
        </div>
   
        <div class="container">
            <div class="row">
                <input type="hidden" id="userid" value="{{ $userid }}">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-12">
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    {{-- <div class="sortlistbox">
                                <input type="checkbox" class="badge-check d-none" id="shortlist{{$product->product_id}}" name="shortlist[]" value="{{$product->product_id}}">
                                <label class="badge badge-primary text-white " id='toggleElement{{$product->product_id}}' for="shortlist{{$product->product_id}}">Shortlisted</label>
                            </div> --}}
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active">
                                            </li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" height="135px"
                                                    src="{{ asset('product_images/' . $product->product_themlin) }}"
                                                    alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" height="135px"
                                                    src="{{ asset('product_images/' . $product->product_themlin ?? '') }}"
                                                    alt="Second slide">

                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" height="135px"
                                                    src="{{ asset('product_images/' . $product->product_themlin ?? '') }}"
                                                    alt="Third slide">
                                            </div>

                                        </div>


                                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next text-dark" href="#carouselExampleCaptions"
                                            role="button" data-slide="next">
                                            <span class="carousel-control-next-icon  text-dark" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="code-section-container">

                                <span>{{ $product->pname }}</span>


                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4"><b class="text-dark">Yay! You have seen it all</b></div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.pages.catalogue.script')
@endsection
