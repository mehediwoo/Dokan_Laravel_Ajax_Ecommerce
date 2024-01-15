@extends('admin.layout.app')
@section('title', $site_title.' | Category')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Category</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">All Category</div>
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
                                <td>Title</td>
                                <td>Icon</td>
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
@include('admin.category.ajax.add')
@include('admin.category.ajax.edit')

@endsection
@section('script')
<script>
    // Load category Table
    $(document).ready(function(){
        $('#mainContent').removeClass('d-none');
        $('#loader').addClass('d-none');
        function loadTable(){
            $.ajax({
                url: '{{ route("getCategory") }}',
                success : function(data){
                    $('#cateBody').html(data);
                }
            });
        }
        loadTable();
        // insert Category
        $(document).on('click','#saveCate',function(){
            let title = $('#title').val();
            let name = document.getElementById('title').value;
            alert(name);
            let icon = $('#icon').val();
            $('#saveCate').addClass('d-none');
            $('#spinner').removeClass('d-none');
            $.ajax({
                url: '{{ route("category.store") }}',
                method: 'POST',
                data:{title:title,icon:icon},
                success:function(response){
                    $('#saveCate').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                    $('#addModal').modal('hide');
                    loadTable();
                    $('#catForm').trigger('reset');
                    // toastr.success('<h3>Success</h3>');
                    Swal.fire(
                    'Good job! Category added successfully!',
                    'You clicked the button!',
                    'ok'
                    )
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#saveCate').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                }
            });
        });
        // delete category
        $(document).on('click','#deleteCate',function(){
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
                        url:'{{ route("deleteCategory") }}',
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
        // Edit modal
        $(document).on('click','#editCate',function(){
            event.preventDefault();
            let id   = $(this).attr('data');
            let icon = $(this).attr('icon');
            let title = $(this).attr('title');

            $('#editId').val(id);
            $('#catTitle').val(title);
            $('#catIcon').val(icon);


            $('#editModal').modal('show')
        });
        // update modal
        $(document).on('click','#updateCate',function(){
            let id = $('#editId').val();
            let title = $('#catTitle').val();
            let icon = $('#catIcon').val();
            $('#saveCate').addClass('d-none');
            $('#spinner').removeClass('d-none');
            $.ajax({
                url: '{{ route("updateCategory") }}',
                method: 'POST',
                data:{id:id,title:title,icon:icon},
                success:function(response){
                    $('#saveCate').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                    $('#editModal').modal('hide');
                    loadTable();
                    toastr.success('<h3>Updated Success</h3>');

                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error('<h3>'+value+'</h3>');
                    });
                    $('#saveCate').removeClass('d-none');
                    $('#spinner').addClass('d-none');
                }
            });
        });
        // change status
        $(document).on('click','#catStatus',function(){
            let id = $(this).attr('data');
            $.ajax({
                url: '{{ route("CategoryStatus") }}',
                data: {id:id},
                success: function(data){
                    if (data==1) {
                        toastr.success('<h3>Category is enable!</h3>');
                    }else{
                        toastr.warning('<h3>Category is disable!</h3>');
                    }
                    loadTable();
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error('<h3>'+value+'</h3>');
                    });
                }
            });
        });

    });


</script>
@endsection
