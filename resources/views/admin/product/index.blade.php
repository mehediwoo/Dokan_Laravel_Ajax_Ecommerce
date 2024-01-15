@extends('admin.layout.app')
@section('title', $site_title.' | Product')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Product</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">Product iteam</div>
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
                                <td>Code</td>
                                <td>Image</td>
                                <td>Cost</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="productBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Table Ends Here -->


</div>
{{-- Add Modal  --}}
@include('admin.product.ajax.add')
@include('admin.product.ajax.edit')

@endsection
@section('script')
<script>
    $(document).ready(function(){

        // get sub category to category
        $('#p_cat').on('change',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getSubCat') }}",
                data:{id:id},
                success:function(data){
                    $('#subcat').empty();
                    $('#childCat').empty();
                    $.each(data,function(key,value){
                        $('#subcat').append('<option value='+value.id+'>'+value.title+'</option>');
                    });
                }
            });
        });
        // get child category to sub category
        $('#subcat').on('change',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getChildCat') }}",
                data:{id:id},
                success:function(data){
                    $('#childCat').empty();
                    $.each(data,function(key,value){
                        $('#childCat').append('<option value='+value.id+'>'+value.title+'</option>')
                    });
                }
            });
        });

    });
    // Get category & sub category for edit
    $(document).ready(function(){

        // get sub category to category
        $('#edit_p_cat').on('change',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getSubCat') }}",
                data:{id:id},
                success:function(data){
                    $('#editsubcat').empty();
                    $('#edit_childCat').empty();
                    $.each(data,function(key,value){
                        $('#editsubcat').append('<option value='+value.id+'>'+value.title+'</option>');
                    });
                }
            });
        });
        // get child category to sub category
        $('#editsubcat').on('change',function(){
            let id = $(this).val();
            $.ajax({
                url: "{{ route('getChildCat') }}",
                data:{id:id},
                success:function(data){
                    $('#edit_childCat').empty();
                    $.each(data,function(key,value){
                        $('#edit_childCat').append('<option value='+value.id+'>'+value.title+'</option>')
                    });
                }
            });
        });

    });
    // Load product Table
    $(document).ready(function(){
        $('#mainContent').removeClass('d-none');
        $('#loader').addClass('d-none');
        function loadTable(){
            $.ajax({
                url: '{{ route("product.show") }}',
                success : function(data){
                    $('#productBody').html(data);
                }
            });
        }
        loadTable();
        // insert product
        $(document).on('submit','#productForm',function(event){
            event.preventDefault();
            $('#saveProduct').addClass('d-none');
            $('#p_spinner').removeClass('d-none');
            let formData = new FormData(this);
            $.ajax({
                url: '{{ route("pro.store") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#saveProduct').removeClass('d-none');
                    $('#p_spinner').addClass('d-none');
                    $('#addModal').modal('hide');
                    loadTable();
                    $('#productForm').trigger('reset');
                    Swal.fire(
                    'Good job! Product added successfully!',
                    'clicked the "ok" button!',
                    'ok'
                    )
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                    toastr.error('<h4>'+value+'</h4>');
                    });
                    $('#saveProduct').removeClass('d-none');
                    $('#p_spinner').addClass('d-none');
                }
            });
        });
        // delete Product
        $(document).on('click','#deleteProduct',function(){
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
                        url:'{{ route("pro.delete") }}',
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
        // Edit product modal
        $(document).on('click','#editProduct',function(){
            event.preventDefault();
            let id   = $(this).attr('data');
            let title = $(this).attr('title');
            let catName = $(this).attr('cat_name');
            let catId = $(this).attr('cat_id');
            let subcatName = $(this).attr('subCat_name');
            let subcatId = $(this).attr('subCat_id');
            let childcatName = $(this).attr('childCat_name');
            let childcatId = $(this).attr('childCat_id');
            let brandName = $(this).attr('brand_name');
            let brandId = $(this).attr('brand_id');
            let units = $(this).attr('units');
            let tags = $(this).attr('tag');
            let size = $(this).attr('size');
            let color = $(this).attr('color');
            let qty = $(this).attr('qty');
            let alrt_qty = $(this).attr('alrt_qty');
            let p_cost = $(this).attr('cost');
            let price = $(this).attr('price');
            let d_price = $(this).attr('d_price');
            let meta_desc = $(this).attr('meta_desc');
            let short_desc = $(this).attr('short_desc');
            let desc = $(this).attr('desc');
            let thumbnail = $(this).attr('thumbnail');
            let multipleImg = $(this).attr('multipleImg');
            let feature = $(this).attr('p_feature');
            let hot_deal = $(this).attr('hot_deal');
            let today_deal = $(this).attr('today_deal');
            let flash_deal = $(this).attr('flash_deal');
            let treandy = $(this).attr('treandy');

            $('#p_id').val(id);
            $('#p_title').val(title);
            $('#current_cat').html(catName);
            $('#current_cat').val(catId);
            $('#current_subcat').html(subcatName);
            $('#current_subcat').val(subcatId);
            $('#current_childcat').html(childcatName);
            $('#current_childcat').val(childcatId);
            $('#brand').html(brandName);
            $('#brand').val(brandId);
            $('#p_tags').val(tags);
            $('#p_units').val(units);
            $('#size').val(size);
            $('#color').val(color);
            $('#qty').val(qty);
            $('#alrt_qty').val(alrt_qty);
            $('#cost').val(p_cost);
            $('#price').val(price);
            $('#d_price').val(d_price);
            $('#meta_desc').val(meta_desc);
            $('#short_desc').val(short_desc);
            $('#summernote2').summernote('code',desc);
            let mainThumb = "{{ asset('storage') }}/"+thumbnail;
            $('#mainThumb').attr('src',mainThumb);

            let data =multipleImg.split(',');
            $('.allMultiIMg').empty();
            $.each(data,function(key,value){
                let mulThumb = "{{ asset('storage') }}/"+value;
                $('.allMultiIMg').append("<img src="+mulThumb+" style='height:80px' >");
            });
            // checkbox unchack
            $("#p_feature").prop("checked", false)
            $("#hot_deal").prop("checked", false)
            $("#today_deal").prop("checked", false)
            $("#flash_deal").prop("checked", false)
            $("#trendy").prop("checked", false)
            if (feature =='on') {
                $("#p_feature").prop("checked", true)
            }
            if(hot_deal =='on'){
                $("#hot_deal").prop("checked", true)
            }
            if (today_deal =='on') {
                $("#today_deal").prop("checked", true)
            }
            if(flash_deal=='on'){
                $("#flash_deal").prop("checked", true)
            }
            if(treandy=='on'){
                $("#trendy").prop("checked", true)
            }


            $('#editModal').modal('show');
            $('#p_tags').show();
            $('#size').show();
            $('#color').show();
        });
        // update modal
        $(document).on('submit','#updateForm',function(){
            event.preventDefault();
            $('#updateProduct').addClass('d-none');
            $('#updateSpinner').removeClass('d-none');
            let formData= new FormData(this);

            $.ajax({
                url: '{{ route("pro.update") }}',
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(response){
                    $('#updateProduct').removeClass('d-none');
                    $('#updateSpinner').addClass('d-none');
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
                    $('#updateProduct').removeClass('d-none');
                    $('#updateSpinner').addClass('d-none');
                }
            });
        });
        // change status
        $(document).on('click','#productStatus',function(){
            let id = $(this).attr('data');
            $.ajax({
                url: '{{ route("pro.status") }}',
                data: {id:id},
                success: function(data){
                    if (data==1) {
                        toastr.success('<h3>Product is enable!</h3>');
                    }else{
                        toastr.warning('<h3>Product is disable!</h3>');
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
