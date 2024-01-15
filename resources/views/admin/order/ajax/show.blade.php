@if (!empty($order) && $order->count() > 0)
    @foreach ($order as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td >
            <ul>
                <li class="fw-bold">Name      : {{ $row->shipping->name }}</li>
                <li>Cell Phone: {{ $row->shipping->cell_phone }}</li>
                <li class="fw-bold">Home Phone: {{ $row->shipping->home_phone }}</li>
                <li>Division  : {{ $row->shipping->division }}</li>
                <li class="fw-bold">City      : {{ $row->shipping->city }}</li>
                <li>Address   : {{ $row->shipping->address }}</li>
            </ul>
        </td>
        <td >
            <img src="{{ asset('storage/'.$row->product->thumbnail) }}" style="height: 50px;width:50px">
        </td>
        <td>{{ $row->product->p_title }}</td>
        <td>{{ $row->size }}</td>
        <td>{{ $row->color }}</td>
        <td>{{ $row->quantity }}</td>
        <td>{{ $setting->default_currency }} {{ $row->price }}</td>
        <td>{{ $setting->default_currency }} {{ $row->total_price }}</td>

        <td>
            @if ($row->status != '' && $row->status=='shipped')
            <span class="status-completed" style="cursor: pointer">Shipped</span>
            @elseif($row->status != '' && $row->status=='pending')
            <span class="status-pending" data="{{ $row->id }}" id="processToConfirm" style="cursor: pointer">Pending</span>
            @elseif($row->status != '' && $row->status=='cancle')
            <span class="status-cancelled" data="{{ $row->id }}" id="processToConfirm" style="cursor: pointer">Cancle</span>
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

