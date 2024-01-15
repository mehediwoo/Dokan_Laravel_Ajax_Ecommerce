@extends('admin.layout.app')
@section('title', $site_title.' | Brand')
@section('content')
<div class="container" id="loader">
    <img src="{{ asset('admin/images/loader.gif') }}" style="width: 200px; height:200px">
</div>

<div class="container d-none" id="mainContent">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">Customer Order</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Order</li>
            </ol>
        </nav>
    </div>


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <div class="d-flex justify-content-between border-bottom text-capitalize fw-medium px-4 py-4 mb-2">
                <div class="">Customer Order</div>
                <div class="">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Order Filter</label>
                            <select name="order" id="orderFilter" class="form-control">
                                <option value="pending">Pending Order</option>
                                <option value="shipped">Shipped Order</option>
                                <option value="cancle">Cancle Order</option>
                            </select>
                        </div>
                    </form>
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
                        style="min-width: 95rem">
                        <thead>
                            <tr class="text-uppercase">
                                <td>SL</td>
                                <td width="20%">Information</td>
                                <td>Thumbnail</td>
                                <td>Title</td>
                                <td>Size</td>
                                <td>Color</td>
                                <td>Quantity</td>
                                <td>Price</td>
                                <td>Total Price</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="OrderBody">

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
                url: '{{ route("pending.order") }}',
                success : function(data){
                    $('#OrderBody').html(data);
                }
            });
        }
        loadTable();

        // order filter
        $(document).on('change','#orderFilter', function(){
            let value = $(this).val();
            $.ajax({
                url:"{{ route('order.filter') }}",
                data:{filterData:value},
                success:function(data){
                    $('#OrderBody').html(data);
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
                    $.each(err.errors,function(index,value){
                        toastr.error('<h3>'+value+'</h3>');
                    });
                }
            });
        });

    });


</script>
@endsection
