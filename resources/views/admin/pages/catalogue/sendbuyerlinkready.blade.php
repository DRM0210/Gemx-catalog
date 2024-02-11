@extends('admin.layout.main')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center pt-4">
        <img src="{{ asset('assets/img/link-share-img.jfif') }}" alt="">
     

        </div>
     <div class="col-md-12 col-12">
        <div class="text-center mt-3 mb-3">
            <h3 class="text-center" style="font-size: 21px;
            font-weight: 600;">Copy the link below and share it with the buyer on email</h3>
            <p class="text-center" style="font-size: 14px; color: black;">We will update you whenever the buyer opens the catalogue link,shortlists products or shares any queries
            </p>
           <div class="d-flex justify-content-center"> <h4 class="text-center border p-2" style="width: 463px;font-size: 17px;">{{ route('user.viewcatalogue', $scode) }} </h4></div>
           </div>
     </div>
        <div class="col-md-12 col-12">
            <div class="d-flex justify-content-between mt-5">
                <button class="badge col-2 border-0 badge-info bg-dark p-2">Send Email</button>
                <button class="badge col-2 border-0 badge-info bg-dark p-2" > Downlaod Excel Format </button>
                <button class="badge col-2 border-0 badge-info bg-dark p-2" > Download PDF Format</button>
            </div>
        </div>
    </div>
  </div>
  
 @endsection
 
 @section('script')
 @include('admin.pages.catalogue.script')
 @endsection
