@extends('layouts.admin')
@section('content')

<div id="main-wrapper">
     <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
                <div class="me-auto d-lg-block d-block">
                    <h2 class="text-black font-w600">Menu</h2>
                    <p class="mb-0">Welcome to {{ $contactUs ? $contactUs->company_name : ''}} backend</p>
                </div>
                <a href="{{route('admin.menu.index')}}" class="btn btn-primary rounded light">View Menu</a>
            </div>
            <div class="row justify-content-center">
                {{-- Increased width to accommodate potentially complex structure --}}
                <div class="col-xl-8 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Menu</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @if(session('success'))
                                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <h5 class="alert-heading">Errors!</h5>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                {{-- Use encrypt helper if your route expects encrypted ID --}}
                                <form method="POST" action="{{ route('admin.menu.update', encrypt($menuItem->id)) }}">
                                    @csrf
                                    @method('PUT') 

                                    {{-- Main Menu Item Name --}}
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Menu Item Name</label>
                                        <div class="col-sm-9">
                                            {{-- Use old() helper to retain value on validation error --}}
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Main Menu Item Name" value="{{ old('name', $menuItem->name) }}" name="name" id="name" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Dynamic Dropdown Items Section --}}
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label form-label">Dropdown Items</label>
                                        <div class="col-sm-9">
                                            <div id="dropdown-items-container">
                                                {{-- Loop through existing top-level dropdown items --}}
                                                @php $itemIndex = 0; @endphp
                                                @foreach (old('items', $menuItem->dropdownItems->toArray()) as $index => $itemData)
                                                    {{-- Ensure itemData is an array and has a name --}}
                                                    @if(is_array($itemData) && isset($itemData['name']))
                                                        <div class="main-item-wrapper border p-3 mb-3 rounded">
                                                            {{-- Main Item Input Group --}}
                                                            <div class="input-group mb-2">
                                                                <input type="text" name="items[{{ $itemIndex }}][name]" class="form-control @error('items.'.$itemIndex.'.name') is-invalid @enderror" placeholder="Dropdown Item Name" value="{{ $itemData['name'] ?? '' }}" required>
                                                                <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove Item</button>
                                                                @error('items.'.$itemIndex.'.name')
                                                                    <div class="invalid-feedback w-100">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            {{-- Button to add sub-item --}}
                                                            <button type="button" class="btn btn-secondary btn-sm mb-2" onclick="addSubItem(this.nextElementSibling, {{ $itemIndex }})">Add Sub-item</button>

                                                            {{-- Sub-items Container --}}
                                                            <div class="sub-items-container ms-4 mt-2">
                                                                {{-- Loop through existing sub-items for this item --}}
                                                                {{-- Check if 'children' exists from eager loading OR if 'sub_items' exists from old() data --}}
                                                                @php
                                                                    $subItems = $itemData['children'] ?? ($itemData['sub_items'] ?? []);
                                                                @endphp
                                                                @if (!empty($subItems))
                                                                    @foreach ($subItems as $subIndex => $subItem)
                                                                        @php
                                                                            // Handle both object (from DB) and string (from old input)
                                                                            $subItemName = is_array($subItem) ? ($subItem['name'] ?? '') : $subItem;
                                                                        @endphp
                                                                        @if(!empty($subItemName))
                                                                            <div class="input-group input-group-sm mb-2">
                                                                                <input type="text" name="items[{{ $itemIndex }}][sub_items][]" class="form-control @error('items.'.$itemIndex.'.sub_items.'.$subIndex) is-invalid @enderror" placeholder="Sub-item Name" value="{{ $subItemName }}" required>
                                                                                <button type="button" class="btn btn-outline-danger" onclick="removeItem(this)">Remove</button>
                                                                                 @error('items.'.$itemIndex.'.sub_items.'.$subIndex)
                                                                                    <div class="invalid-feedback w-100">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @php $itemIndex++; @endphp
                                                    @endif
                                                @endforeach
                                            </div>
                                            {{-- Button to add a new main dropdown item --}}
                                            <button type="button" class="btn btn-success mt-2" onclick="addDropdownItem()">Add Dropdown Item</button>
                                        </div>
                                    </div>

                                    {{-- Submit Button --}}
                                    <div class="mb-3 row">
                                        <div class="col-sm-9 offset-sm-3"> {{-- Align with inputs --}}
                                            <button type="submit" class="btn btn-primary">Update Menu Item</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Initialize counter based on existing items to prevent index collision
    // Use the count of rendered items (which might differ from DB count if old() data is present)
    let mainItemIndex = {{ $itemIndex ?? 0 }}; // Start index after the last rendered item

    // Function to add a main dropdown item (Same as in create.blade.php)
    function addDropdownItem() {
        const container = document.getElementById('dropdown-items-container');
        const currentMainIndex = mainItemIndex; // Capture index for the closure

        const mainItemWrapper = document.createElement('div');
        mainItemWrapper.className = 'main-item-wrapper border p-3 mb-3 rounded';

        const mainInputGroup = document.createElement('div');
        mainInputGroup.className = 'input-group mb-2';

        const mainInput = document.createElement('input');
        mainInput.type = 'text';
        mainInput.name = `items[${currentMainIndex}][name]`;
        mainInput.className = 'form-control';
        mainInput.placeholder = 'Dropdown Item Name (e.g., Consulting)';
        mainInput.required = true;

        const removeMainBtn = document.createElement('button');
        removeMainBtn.type = 'button';
        removeMainBtn.className = 'btn btn-danger';
        removeMainBtn.innerHTML = 'Remove Item';
        removeMainBtn.onclick = function() { removeItem(this); }; // Use unified remove function

        mainInputGroup.appendChild(mainInput);
        mainInputGroup.appendChild(removeMainBtn);

        const subItemsContainer = document.createElement('div');
        subItemsContainer.className = 'sub-items-container ms-4 mt-2';

        const addSubItemBtn = document.createElement('button');
        addSubItemBtn.type = 'button';
        addSubItemBtn.className = 'btn btn-secondary btn-sm mb-2';
        addSubItemBtn.innerHTML = 'Add Sub-item';
        addSubItemBtn.onclick = function() { addSubItem(subItemsContainer, currentMainIndex); };

        mainItemWrapper.appendChild(mainInputGroup);
        mainItemWrapper.appendChild(addSubItemBtn);
        mainItemWrapper.appendChild(subItemsContainer);
        container.appendChild(mainItemWrapper);

        mainItemIndex++; // Increment index for the *next* item
    }

    // Function to add a sub-item (Same as in create.blade.php)
    function addSubItem(subContainer, parentIndex) {
        const subItemDiv = document.createElement('div');
        subItemDiv.className = 'input-group input-group-sm mb-2';

        const subInput = document.createElement('input');
        subInput.type = 'text';
        subInput.name = `items[${parentIndex}][sub_items][]`;
        subInput.className = 'form-control';
        subInput.placeholder = 'Sub-item Name';
        subInput.required = true;

        const removeSubBtn = document.createElement('button');
        removeSubBtn.type = 'button';
        removeSubBtn.className = 'btn btn-outline-danger';
        removeSubBtn.innerHTML = 'Remove';
        removeSubBtn.onclick = function() { removeItem(this); }; // Use unified remove function

        subItemDiv.appendChild(subInput);
        subItemDiv.appendChild(removeSubBtn);
        subContainer.appendChild(subItemDiv);
    }

    // Unified function to remove either a main item wrapper or a sub-item input group
    function removeItem(button) {
        // Find the closest parent wrapper to remove
        // For main items, it's '.main-item-wrapper'
        // For sub-items, it's '.input-group'
        const wrapperToRemove = button.closest('.main-item-wrapper, .input-group');
        if (wrapperToRemove) {
            wrapperToRemove.remove();
            // Note: Re-indexing on removal is complex and often unnecessary if the backend
            // handles potentially non-sequential keys (like PHP arrays do).
            // If strict sequential indexing is required by the backend after removal,
            // a more complex re-indexing logic would be needed here.
        }
    }

    // Auto-hide success alert (Same as in create.blade.php)
    window.setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Alert) {
                 const bsAlert = bootstrap.Alert.getInstance(alert);
                 if (bsAlert) {
                     bsAlert.close();
                 } else {
                     alert.remove();
                 }
            } else {
                alert.remove();
            }
        }
    }, 5000);

</script>
@endpush
@endsection
