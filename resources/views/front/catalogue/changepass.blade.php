<div class="row layout-top-spacing">
    <form class="row g-3" id="passwordform">
        @csrf
        <div class="col-12 pb-3">
            <strong class=" ">Edit Your Password</strong>
        </div>
        <h3 class="text-center text-danger" id='message'> </h3>
        <div class="col-12 mt-2">
            <label for="inputEmail4" class="form-label"><strong> Password</strong></label>
            <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" disabled>
        </div>
        <div class="col-12 mt-2">
            <label for="inputEmail4" class="form-label"><strong>New Password</strong></label>
            <input type="password" class="form-control" id="new_pass" name="new_pass">
            <span toggle="#new_pass" class="eye-icon toggle-password"></span>
        </div>
        <div class="col-12 mt-2">
            <label for="inputEmail4" class="form-label"><strong>Confirm Password</strong></label>
            <input type="password" class="form-control" id="confirm_pass" name="confirm_pass">
            <span toggle="#confirm_pass" class="eye-icon toggle-password2"></span>
        </div>


        <div class="col-12 text-right mt-4 mb-3">

            <button class="px-5 badge p-2 badge-dark bg-dark" id="updatepassword"
                type="button">Update</button>
        </div>
    </form>

</div>