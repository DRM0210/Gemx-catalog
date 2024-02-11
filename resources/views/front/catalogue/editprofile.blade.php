<div class="row layout-top-spacing">
    <form class="row g-3" id="editprofile">
        @csrf
        <div class="col-12 pb-3">
            <strong class=" ">Edit Your Profile</strong>
        </div>
          <h3 class="text-center text-danger" id='message'> </h3>
        <div class="col-12 mt-2">
            <label for="inputPassword4" class="form-label"><strong> Name</strong></label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>
        <div class="col-12 mt-2">
            <label for="inputAddress" class="form-label"><strong> Email ID</strong></label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
        </div>

        {{-- <div class="col-12 mt-2">
            <label for="inputEmail4" class="form-label"><strong> Password</strong></label>
            <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" disabled>
        </div> --}}


        <div class="col-12 text-right mt-4 mb-3">

            <button class="px-5 badge p-2 badge-dark bg-dark" id="profilebtn"
                type="button">Submit</button>
        </div>
    </form>

</div>