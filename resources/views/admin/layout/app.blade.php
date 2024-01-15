<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/fontawesome/css/all.min.css') }}" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugin/toastr/toastr.min.css') }}">
    <!-- Tags input -->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" />
    <!--Data Table css-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
    <!--Toast message css file-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!--Dropify -->
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


    <title>@yield('title')</title>
</head>
<style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white !important;
      background-color: #0d6efd;
      padding: 0.2rem;
    }
</style>
<body class="body" id="body">

    <!-- Sidebar Starts Here -->
    @include('admin.layout.sidebar')
    <!-- Sidebar Ends Here -->


    <!-- Header Starts Here -->
    @include('admin.layout.header')
    <!-- Header Ends Here -->

    <!-- Main Content Starts Here -->
    <main class="main px-sm-4 py-5" id="main">

        <!-- Main content Starts Here -->
        @yield('content')
        <!-- Main content Ends Here -->

        <!-- Footer Starts Here -->
        @include('admin.layout.footer')
        <!-- Footer Ends Here -->

    </main>
    <!-- Main Content Ends Here -->


    <!-- Search Modal -->
    <div class="modal fade p-0" id="searchModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 py-5 rounded-0">

                <div class="text-end px-5">
                    <span class="fs-1" role="button" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>

                <div class="modal-body text-center p-4 py-5 p-sm-5">

                    <h1 class="text-color-dark text-capitalize font-weight-500 mb-5">Search Here</h1>

                    <form action="" class="search-form">
                        <div class="input-group">
                            <input type="search" class="form-control fs-3 px-4 py-2" placeholder="Search..."
                                aria-describedby="basic-addon2">
                            <span class="input-group-text fs-3 bg-brand text-white" id="basic-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <!--Data Table JS -->
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <!--Tost message js --->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Tags input js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('admin/assets/plugin/toastr/toastr.min.js') }}"></script>
    <!--Dropify js-->
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script type="text/javascript">
        $('.dropify').dropify();  //dropify image
    </script>
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150
            });
            $('#summernote2').summernote({height: 150});
            $('#page_text').summernote({height: 250});
        });
    </script>
    <!-- AJAX CSRF Token -->
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script>
        let table = new DataTable('#dataTable');
        // $('#dataTable').DataTable();

    </script>
    @yield('script')
    {{-- Toast message --}}
    <script>
        @if(session()->has('success'))
            toastr.success(" {{ session()->get('message') }} ");
        @elseif (session()->has('warning'))
            toastr.warning(" {{ session()->get('message') }} ");
        @elseif(session()->has('error'))
            toastr.error(" {{ session()->get('message') }} ");
        @endif
    </script>
</body>

</html>
