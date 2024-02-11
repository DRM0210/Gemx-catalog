<!-- Modal -->
<div class="modal fade" id="generate_cataloguemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content p-2" style="border-radius: 20px;">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="exampleModalLabel">Confirm all details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form id='formElement'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="catalogue_name" class="form-label">Select Buyer</label>
                                <select class="custom-select inputhight" id="buyerid" name="buyerid" onchange="buyeridOnChange(this.value)">
                                    <option value="">Choose...</option>
                                    @foreach ($buyers as $buyer)
                                    <option value="{{$buyer['id']}}">{{$buyer['name']}}</option>
                                    @endforeach
                                  </select>
                             
                            </div>
                            <div class="mb-3">
                                <label for="catalogue_name" class="form-label"><span
                                        class="text-danger">*</span>Catalogue name</label>
                                <input type="text" class="form-control inputhight" id="catalogue_name" name="catalogue_name"
                                    placeholder="Spring Collection" required>
                            </div>
                            <div class="mb-3">
                                <label for="buyer_name" class="form-label"><span
                                        class="text-danger">*</span>Buyer name</label>
                                <input type="text" class="form-control inputhight" id="buyer_name"
                                    name="buyer_name" placeholder="Target" required>
                            </div>
                            <div class="mb-3">
                                <label for="buyer_email" class="form-label"><span class="text-danger">*</span>Buyer
                                    Email ID</label>
                                <input type="text" class="form-control inputhight" id="buyer_email" name="buyer_email" required>
                            </div>
                            <div class="mb-3">
                                <div class="container">
                                    <div class="row imagenotification">
                                        <div class="col-md-10">
                                            <p class="pt-2 pb-0"><b>Presentation template</b></p>
                                            <p class="pt-0 m-0 pb-2">Each slide will have upto 2 images of a single product along with Id and
                                                other details</p>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="buttonscat d-flex mt-4 float-right">
                                                <a href="#"> <i class="fa-solid fa-gear"></i></a>
                                                <a href="#" class="pl-2"> Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="container">
                                    <div class="row emailnotification">
                                        <div class="col-md-10">
                                            <p class="pt-2 pb-0"><b>Link Settings</b></p>
                                            <p class="pt-0 m-0 pb-2">Email id is NOT required to view catalogue</p>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="buttonscat d-flex mt-4 float-right">
                                                <a href="#"> <i class="fa-solid fa-gear"></i></a>
                                                <a href="#" class="pl-2"> Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <button class="badge" data-toggle="modal" data-target="#priviewmodel" style="background: #d1ffc7b8;
                                    border: 1px solid lightgrey;
                                    padding: 10px;"> Preview catalogue</button>
                                    <button class="badge-dark bg-dark" onclick="genrate_catalogue()" type="button" > Generate
                                        catalogue</button>
                                </div>
                            </div>

                        </div>



                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
              
            </div> --}}
        </div>
    </div>
</div>
