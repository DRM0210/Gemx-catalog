<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-content p-4" style="border-radius: 20px;">
                        <div class="modal-header bg-white">
                            <div class="modalheader">
                                <h5 class="modal-title" id="exampleModalLabel">Customize Buyer View</h5>
                                <p>Select the details you want to share with the buyer for the 1 categories .You can
                                    always edit later
                                </p>
                            </div>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                        </div>
                        <div class="modal-body">
                            <p>Select fields to show for <b>Rugs</b></p>

                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="selling_price" id="selling_price" name="selling_price">
                                            <label class="form-check-label pl-3" for="selling_price">
                                                Selling Price
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox" value="name"
                                                id="name" name="name">
                                            <label class="form-check-label pl-3" for="name">
                                                Name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="descripation" id="descripation" name="descripation">
                                            <label class="form-check-label pl-3" for="descripation">
                                                Descripation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox" value="color"
                                                id="color" name="color">
                                            <label class="form-check-label pl-3" for="color">
                                                Color
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="production_technique" id="production_technique"
                                                name="production_technique">
                                            <label class="form-check-label pl-3" for="production_technique">
                                                Production Technique
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="material" id="material" name="material">
                                            <label class="form-check-label pl-3" for="material">
                                                Material
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox" value="size"
                                                id="size" name="size">
                                            <label class="form-check-label pl-3" for="size">
                                                Size
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox" value="shape"
                                                id="shape" name="shape">
                                            <label class="form-check-label pl-3" for="shape">
                                                Shape
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="sampling_time" id="sampling_time" name="sampling_time">
                                            <label class="form-check-label pl-3" for="sampling_time ">
                                                Sampling Time
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="production_time" id="production_time" name="production_time">
                                            <label class="form-check-label pl-3" for="production_time ">
                                                Production Time
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="moq" id="moq" name="moq">
                                            <label class="form-check-label pl-3" for="moq">
                                                MOQ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input checkboksize" type="checkbox"
                                                value="remarks" id="remarks" name="remarks">
                                            <label class="form-check-label pl-3" for="remarks">
                                                Remarks
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            {{-- data-dismiss="modal" --}}
                            <button type="button"
                                class="badge badge-dark border-0 p-2 bg-dark pl-4 pr-4 doneprmition">Done</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade bd-example-modal-lg" id="variantview" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">VARIANTS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsiv">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Attribute 1</th>
                                <th> Attribute 2</th>
                            </tr>
                        </thead>
                        <tbody class="variantdata">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" class="btn btn-primary">Save</button> --}}
            </div>
        </div>
    </div>
</div>
