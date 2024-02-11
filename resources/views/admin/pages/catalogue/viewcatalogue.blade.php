@extends('admin.layout.main')

@section('content')
    <img src="{{ asset('assets/img/goldwoman.jpg') }}" alt="" width="100%" height="273px">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-12">
                <div class="d-flex mt-4 justify-content-between"">
                  <div class="detailcatalog d-flex ">
                    <img src="{{ asset('assets/img/diamond.png') }}" alt="" width="70px">
                    <div class="pl-3">
                            <h3 class="heddingmain">ACP jewellery Pvt Ltd</h3>
                            <p>Spring Collection</p>
                    </div>
                  </div>
                  <div class="buttonhelp">
                    <button class="badge badge-dark border-0 pl-4 pr-4 pt-2 pb-2"  data-toggle="modal" data-target="#helpbox">Help</button>
                  </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12 col-12">
                <div class="text-center border-top mt-4 pt-4">
                    <button class="viewcatbtn" data-toggle="modal" data-target="#exampleModal">View Catalogues </button>
                    <p>We have partnered up with Sourcewiz to enhance your browing experience ans help you send your queries
                        easily</p>
                </div>
            </div>
        </div>
    </div>
    {{--   email verification start --}}
    <section id="emailvrifysec">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <div class="modalheader">
                            <h5 class="modal-title" id="exampleModalLabel">Enter the following details to continue</h5>

                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form id="emailverfication">
                            @csrf
                            <input type="hidden" name="catid" id="catid" value="{{$catid}}">
                            <h3 class="text-center text-danger" id="message"></h3>
                            <div class="form-group mb-3">
                                <label for="#email">Email ID</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="John@gmail.com">

                            </div>
                            <div class="form-group mb-4">
                                <label for="">Passcode </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Required to view ">
                            </div>
                            <div class="form-group mb-4 text-right">
                                <button type="button" class="badge badge-primary border-0 mt-3 p-2"
                                    id="confirm">Confirm</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
              
            </div> --}}
                </div>
            </div>
        </div>
    </section>
    {{--   email verification end --}}


    {{--   help box start --}}
    <div class="modal fade" id="helpbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Read For View Catalogue Help</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quod voluptatem ipsum facilis saepe minus exercitationem iusto voluptates fuga veniam.  </p>
                </div>
                <div class="modal-footer">
                    {{-- <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button> --}}
                    <button type="button" class="badge badge-primary border-0 p-2">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{--   help box end --}}

   
@endsection

@section('script')
    @include('admin.pages.catalogue.script')
@endsection
