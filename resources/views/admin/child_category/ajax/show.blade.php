@if (!empty($child_cat) && $child_cat->count() > 0)
    @foreach ($child_cat as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td >{{ $row->title }}</td>
        <td >
            {{ $row->subCat->title }}
        </td>

        <td>
            @if ($row->status != '' && $row->status==1)
            <span class="status-completed" data="{{ $row->id }}" id="childCatStatus" style="cursor: pointer">Enable</span>
            @else
            <span class="status-cancelled" data="{{ $row->id }}" id="childCatStatus" style="cursor: pointer">Disable</span>
            @endif

        </td>
        <td >
            <a href="" data='{{ $row->id }}' subCatId="{{ $row->sub_cat_id }}" subCatName="{{ $row->subCat->title }}" title="{{ $row->title }}" id="editSubCate" class="d-inline-block">
                <span class="p-2 brand-color me-3">
                    <i class="fa-regular fa-pen-to-square"></i>
                </span>
            </a>
            <a href="" data='{{ $row->id }}' id="deleteCate" class="d-inline-block">
                <span class="p-2 red-color">
                    <i class="fa-regular fa-trash-can"></i>
                </span>
            </a>
        </td>
    </tr>
    @endforeach
@endif

