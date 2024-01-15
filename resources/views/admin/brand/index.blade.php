@extends('admin.layout.app')
@section('title', $site_title.' | Brand')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Brand</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Brand</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">All Brand</div>
                <div class="">
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add +</a>
                </div>
            </div>




            <div class="px-5">
                <div class="table-product-filter d-sm-flex justify-content-between align-items-center text-color-muted mb-4">
                    <div class="select-product-entries text-nowrap d-flex align-items-center gap-1 mb-4 mb-sm-0">

                    </div>

                    {{-- <form action="">
                        <div class="search-box position-relative fs-3 overflow-hidden">
                            <input class="fs-4 w-100" type="search" name="" id="" placeholder="Search..."
                                style="min-width: 10rem">
                            <button type="submit"
                                class="btn fs-4 position-absolute top-0 end-0 h-100 px-4 pt-3 text-color-2">
                                <i class="fa-solid fa-magnifying-glass w-100 h-100"></i>
                            </button>
                        </div>
                    </form> --}}
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle fs-14 text-capitalize"
                        style="min-width: 90rem">
                        <thead>
                            <tr class="text-uppercase">
                                <td>SL</td>
                                <td>Brand Name</td>
                                <td>Logo</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="cateBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Table Ends Here -->


</div>
{{-- Add Modal  --}}
@include('admin.brand.ajax.add')
@include('admin.brand.ajax.edit')

@endsection
@section('script')
<script>
    // Load category Table
    $(document).ready(function(){
        $('#mainContent').removeClass('d-none');
        $('#loader').addClass('d-none');
        function loadTable(){
            $.ajax({
                url: '{{ route("brand.get") }}',
                success : function(data){
                    $('#cateBody').html(data);
                }
            });
        }
        loadTable();
        // insert Brand
        $(document).on('submit','#brandForm',function(event){
            event.preventDefault();

            let formData = new FormData(this);

            $('#saveBrand').addClass('d-none');
            $('#spinner').removeClass('d-none');
            $.ajax({
                url: '{{ route("brand.store") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#saveBrand').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                    $('#addModal').modal('hide');
                    loadTable();
                    $('#brandForm').trigger('reset');
                    $('#Brandlogo').val('');
                    Swal.fire(
                    'Good job! Brand added successfully!',
                    'You clicked the button!',
                    'ok'
                    )
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#saveBrand').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                }
            });
        });
        // delete brand
        $(document).on('click','#deleteBrand',function(){
            event.preventDefault();
            Swal.fire({
                title: 'Do you want to delete the iteam ?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't delete`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let id = $(this).attr('data');
                    $.ajax({
                        url:'{{ route("brand.delete") }}',
                        method:'POST',
                        data:{id:id},
                        success:function(data){
                            if(data==true){
                                Swal.fire('Delete!', '', 'success');
                                $(this).closest('tr').fadeOut();
                                loadTable();
                            }else{
                                Swal.fire('Iteam is not null!', '', 'error');
                                loadTable();
                            }
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Iteam is safe !', '', 'info')
                }
            });
        });
        // Edit brand modal
        $(document).on('click','#editBrand',function(){
            event.preventDefault();
            let id   = $(this).attr('data');
            let brandLogo = $(this).attr('brandLogo');
            let title = $(this).attr('title');

            let logo_images ="{{ asset('storage') }}/"+ brandLogo;

            $('#brandId').val(id);
            $('#editBLogo').attr('src',logo_images);
            $('#Btitle').val(title);


            $('#editModal').modal('show');
        });
        // update modal
        $(document).on('submit','#EditbrandForm',function(){
            event.preventDefault();
            $('#updateBrand').addClass('d-none');
            $('#Brandspinner').removeClass('d-none');
            let formData= new FormData(this);

            $.ajax({
                url: '{{ route("brand.update") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#updateBrand').removeClass('d-none');
                    $('#Brandspinner').addClass('d-none');
                    $('#editModal').modal('hide');
                    loadTable();
                    //toastr.success('<h3>Updated Success</h3>');
                    Swal.fire('Updated success!', '', 'success');

                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#updateBrand').removeClass('d-none');
                    $('#Brandspinner').addClass('d-none');
                }
            });
        });
        // change status
        $(document).on('click','#brandStatus',function(){
            let id = $(this).attr('data');
            $.ajax({
                url: '{{ route("brand.status") }}',
                data: {id:id},
                success: function(data){
                    if (data==1) {
                        toastr.success('<h3>Brand is enable!</h3>');
                    }else{
                        toastr.warning('<h3>Brand is disable!</h3>');
                    }
                    loadTable();
                },
                error:function(error){
                    let err = error.responseJSON;
                    // $.each(err.errors,function(index,value){
                    //     toastr.error('<h3>'+value+'</h3>');
                    // });
                    err.errors.forEach((index,value)=>{
                        toastr.error('<h3>'+value+'</h3>');
                    });
                }
            });
        });

    });


</script>
@endsection
