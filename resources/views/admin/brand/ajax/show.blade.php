@if (!empty($brand) && $brand->count() > 0)
    @foreach ($brand as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td >{{ $row->brand_name }}</td>
        <td >
            <img src="{{ asset('storage/'.$row->brand_logo) }}" alt="">
        </td>

        <td>
            @if ($row->status != '' && $row->status==1)
            <span class="status-completed" data="{{ $row->id }}" id="brandStatus" style="cursor: pointer">Enable</span>
            @else
            <span class="status-cancelled" data="{{ $row->id }}" id="brandStatus" style="cursor: pointer">Disable</span>
            @endif

        </td>
        <td >
            <a href="" data='{{ $row->id }}' brandLogo="{{ $row->brand_logo }}" title="{{ $row->brand_name }}" id="editBrand" class="d-inline-block">
                <span class="p-2 brand-color me-3">
                    <i class="fa-regular fa-pen-to-square"></i>
                </span>
            </a>
            <a href="" data='{{ $row->id }}' id="deleteBrand" class="d-inline-block">
                <span class="p-2 red-color">
                    <i class="fa-regular fa-trash-can"></i>
                </span>
            </a>
        </td>
    </tr>
    @endforeach
@endif

