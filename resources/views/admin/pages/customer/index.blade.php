@extends('admin.layout.main')

@section('content')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Customer</h3>
            </div>

            <div class="toggle-switch">
                <button class="badge badge-dark col-4 border-0 p-2 addCustomer" type="button" data-url="{{ route('admin.customer.store') }}">Add</button>
                <button class="badge badge-dark col-4 border-0 p-2 mx-3 " id="exportfile"  type="button">Export</button>
                <button id="btnOutline" type="button" class="badge badge-dark border-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                                        <div class="dropdown-menu" aria-labelledby="btnOutline">
                                                            <a href="javascript:void(0);" class="dropdown-item deleteall"><i class="flaticon-home-fill-1 mr-1"></i>Delete</a>
                                                            {{-- <a href="javascript:void(0);" class="dropdown-item updateall"><i class="flaticon-gear-fill mr-1"></i>Update</a> --}}
                                                        </div>
            </div>
        </div>

        <div class="row layout-top-spacing">
           
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-left pl-2"><input type="checkbox" name="selectall" id="selectall"></th>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Tin Number</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>



        </div>



    </div>
    
@endsection

@section('script')
@include('admin.pages.customer.model')
@include('admin.pages.customer.script')
@endsection
