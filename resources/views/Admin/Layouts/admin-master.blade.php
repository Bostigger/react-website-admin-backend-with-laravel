<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reasite </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css' )}}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->

<div id="main-wrapper">


    @include('Admin.Layouts.header')
    @include('Admin.Layouts.topbar')
    @include('Admin.Layouts.sidebar')

    <!--**********************************
        Content body start
    ***********************************-->


    @yield('content')


    <!--**********************************
        Content body end
    ***********************************-->

    @include('Admin.Layouts.footer')







</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('assets/vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{asset('assets/vendor/apexchart/apexchart.js')}}I"></script>

<!-- Dashboard 1 -->
<script src="{{asset('assets/js/dashboard/dashboard-1.js')}}"></script>

<script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
<script src="{{asset('assets/vendor/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/custom.min.js')}}"></script>
<script src="{{asset('assets/js/deznav-init.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/validate.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function (){
        $(document).on('click','#delete',function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'danger',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        });
    });
</script>

<script type="text/javascript">
        @if(Session::has('message')){
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
        }

    }
    @endif
</script>


</body>
</html>
