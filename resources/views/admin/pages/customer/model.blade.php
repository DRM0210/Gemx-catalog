{{-- add customer --}}
<!-- Modal -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="border: 3px solid #1b1b1b; border-radius: 10px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTitle">Modal title</h5>
               
            </div>
            <div class="modal-body">
                <form action="" method="post" id="myform">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">First Name <span class="text-danger">*</span></label>
                                <input type="text"
                                  class="form-control" name="fname" id="fname"  placeholder="Enter Name">
                                  <div class="text-danger" id="name_error"></div>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text"
                                  class="form-control" name="lname" id="lname"  placeholder="Enter Last Name">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email"
                                  class="form-control" name="email" id="email"  placeholder="Enter Email">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text"
                                  class="form-control" name="phone" id="phone"  placeholder="Enter Phone Number">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text"
                                  class="form-control" name="addresh" id="addresh"  placeholder="Enter Addresh">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tin</label>
                                <input type="text"
                                  class="form-control" name="tin" id="tin"  placeholder="Enter Tin Number">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Company</label>
                                <input type="text"
                                  class="form-control" name="company" id="company"  placeholder="Enter Company">
                              </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="badge badge-dark col-4 border-0 p-2 closemodal" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                        <button type="submit" class="badge badge-dark col-4 border-0 p-2" id="addBtn"></button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>