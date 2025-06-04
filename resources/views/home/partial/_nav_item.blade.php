@php
    $link = route('home.pages', $navItem->slug);
    $children = $navItem instanceof \App\Models\MenuItem ? $navItem->dropdownItems : $navItem->children;
    $hasChildren = $children && $children->isNotEmpty();
@endphp

<li class="nav-item {{ $hasChildren ? 'dropdown' : '' }}">
    <a href="{{ $link }}" class="nav-link {{ $hasChildren ? 'dropdown-toggle' : '' }}">
        {{$navItem->name }}

        @if($hasChildren)
            {{-- <i class='bx bx-chevron-down'></i> --}}
            {{-- <i class='bx bx-plus'></i> --}}
        @endif
    </a>

    @if($hasChildren)
        <ul class="dropdown-menu"> 
            @foreach ($children as $child)
                 @include('home.partial._nav_item', ['navItem' => $child])
            @endforeach
        </ul>
    @endif
</li>
