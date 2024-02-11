<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')

<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('admin.layout.topslide')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            @yield('content')
        </div>
        <!--  END CONTENT PART  -->
        @include('admin.layout.footer')
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @include('admin.layout.script')
    @yield('script')
</body>

</html>
