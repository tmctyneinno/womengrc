<li>
    {{ $item->name }}
    @if ($item->children && $item->children->isNotEmpty())
        <ul style="margin-left: 20px;"> 
            @foreach ($item->children as $child)
                @include('admin.menu._dropdown_item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>
