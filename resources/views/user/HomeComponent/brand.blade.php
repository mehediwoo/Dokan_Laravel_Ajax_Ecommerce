@php
    $brand =  App\Models\brand::latest()->take(36)->get();
@endphp
<div class="characteristics">
    <div class="container">
        <div class="row">
           @foreach($brand as $row)
            <div class="col-lg-1 col-md-3 char_col" style="border:1px solid grey; padding:5px; margin:3px">
                <div class="brands_item">
                   <a href="{{ route('brand.product',$row->slug) }}" title="{{ $row->brand_name }}">
                    <img src="{{ asset('storage/'.$row->brand_logo) }}" alt="{{ $row->brand_name }}" height="100%" width="100%">
                   </a>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</div>
