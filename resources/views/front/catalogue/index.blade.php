


@include('front.catalogue.header')


<!-- ======= Hero Section ======= -->
<section id="deshboredmain" class="deshboredmain mt-5 pt-5">

    <div id="exTab3" class="container">
        <div class="container">
            <div class="row">
              <div class="col-md-3">
                <ul class="sidenav nav-pills">
                    <li class="active">
                        <a href="#1b" data-toggle="tab">Dashboard</a>
                    </li>
                    <li><a href="#2b" data-toggle="tab">Edit Profile</a>
                    </li>
                    <li><a href="#3b" data-toggle="tab">Change Password</a>
                    </li>
                    <li><a href="#4b" data-toggle="tab">My Orders</a>
                    </li>
                    <li><a href="#5b" data-toggle="tab">Support Ticket</a>
                    </li>
                    <li><a href="#6b" data-toggle="tab">Shipping Address</a>
                    </li>
                    <li><a href="{{route('user.logout')}}">Logout</a>
                    </li>
                </ul>
            
              </div>
                <div class="col-md-9">
                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1b">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="user-dashboard-card style-01 ">
                                        <div class="icon"><i class="las la-calendar-alt"></i></div>
                                        <div class="content">
                                            <h4 class="title">Total Orders</h4>
                                            <span class="number">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="user-dashboard-card style-01 ">
                                        <div class="icon"><i class="las la-calendar-alt"></i></div>
                                        <div class="content">
                                            <h4 class="title">Support Tickets</h4>
                                            <span class="number">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2b">
                           @include('front.catalogue.editprofile')
                        </div>
                        <div class="tab-pane" id="3b">
                           @include('front.catalogue.changepass')
                        </div>
                        <div class="tab-pane" id="4b">
                            @include('front.catalogue.myorders')
                        </div>
                        <div class="tab-pane" id="5b">
                            <h3>We use css to change the background color of the content to be equal to the tab</h3>
                           
                        </div>
                        <div class="tab-pane" id="6b">
                           
                        </div>
                     
                       
                    </div>
                </div>
            </div>
        </div>
        </div>

  
</section><!-- End Hero Section -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>














@include('front.catalogue.footer')
