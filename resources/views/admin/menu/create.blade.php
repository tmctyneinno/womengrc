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
                <div class="col-xl-8 col-lg-12 align-center"> {{-- Increased width slightly --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Menu</h4>
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
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin.menu.store') }}">
                                    @csrf
                                    {{-- Main Menu Item Name --}}
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Menu Item Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Main Menu Item Name (e.g., Services)" name="name" id="name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>

                                    {{-- Dynamic Dropdown Items Section --}}
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label form-label">Dropdown Items</label>
                                        <div class="col-sm-9">
                                            <div id="dropdown-items-container">
                                                {{-- Dynamically added items will go here --}}
                                            </div>
                                            {{-- Button to add a new main dropdown item --}}
                                            <button type="button" class="btn btn-success mt-2" onclick="addDropdownItem()">Add Dropdown Item</button>
                                        </div>
                                    </div>

                                    {{-- Submit Button --}}
                                    <div class="mb-3 row">
                                        <div class="col-sm-9 offset-sm-3"> {{-- Align with inputs --}}
                                            <button type="submit" class="btn btn-primary">Create Menu Item</button>
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

@push('scripts') {{-- Use @push for cleaner script management if your layout has @stack('scripts') --}}
<script>
    // Counter for main dropdown items to ensure unique names
    let mainItemIndex = 0;

    // Function to add a main dropdown item
    function addDropdownItem() {
        const container = document.getElementById('dropdown-items-container');

        // Create a div to hold the main item and its sub-items
        const mainItemWrapper = document.createElement('div');
        mainItemWrapper.className = 'main-item-wrapper border p-3 mb-3 rounded'; // Added styling

        // --- Main Item Input Group ---
        const mainInputGroup = document.createElement('div');
        mainInputGroup.className = 'input-group mb-2';

        // Main item input field
        const mainInput = document.createElement('input');
        mainInput.type = 'text';
        // Use nested array notation for the name
        mainInput.name = `items[${mainItemIndex}][name]`;
        mainInput.className = 'form-control';
        mainInput.placeholder = 'Dropdown Item Name (e.g., Consulting)';
        mainInput.required = true;

        // Remove button for the main item
        const removeMainBtn = document.createElement('button');
        removeMainBtn.type = 'button';
        removeMainBtn.className = 'btn btn-danger';
        removeMainBtn.innerHTML = 'Remove Item';
        removeMainBtn.onclick = function() {
            container.removeChild(mainItemWrapper);
            // Note: Re-indexing isn't strictly necessary if the backend handles gaps,
            // but could be added if needed.
        };

        mainInputGroup.appendChild(mainInput);
        mainInputGroup.appendChild(removeMainBtn);
        // --- End Main Item Input Group ---

        // --- Sub-items Section ---
        const subItemsContainer = document.createElement('div');
        subItemsContainer.className = 'sub-items-container ms-4 mt-2'; // Indent sub-items

        // Button to add a sub-item to *this* main item
        const addSubItemBtn = document.createElement('button');
        addSubItemBtn.type = 'button';
        addSubItemBtn.className = 'btn btn-secondary btn-sm mb-2';
        addSubItemBtn.innerHTML = 'Add Sub-item';
        // Pass the container and the current main item index to the addSubItem function
        const currentMainIndex = mainItemIndex; // Capture index for the closure
        addSubItemBtn.onclick = function() {
            addSubItem(subItemsContainer, currentMainIndex);
        };
        // --- End Sub-items Section ---


        // Append elements to the main item wrapper
        mainItemWrapper.appendChild(mainInputGroup);
        mainItemWrapper.appendChild(addSubItemBtn); // Add button below main input
        mainItemWrapper.appendChild(subItemsContainer); // Add container for future sub-items

        // Append the whole main item wrapper to the main container
        container.appendChild(mainItemWrapper);

        // Increment the index for the next main item
        mainItemIndex++;
    }

    // Function to add a sub-item
    function addSubItem(subContainer, parentIndex) {
        // Create div for the sub-item input group
        const subItemDiv = document.createElement('div');
        subItemDiv.className = 'input-group input-group-sm mb-2'; // Smaller input group

        // Sub-item input field
        const subInput = document.createElement('input');
        subInput.type = 'text';
        // Use nested array notation including the parent index
        subInput.name = `items[${parentIndex}][sub_items][]`; // Note the [] for array of sub-items
        subInput.className = 'form-control';
        subInput.placeholder = 'Sub-item Name';
        subInput.required = true; // Decide if sub-items are required

        // Remove button for the sub-item
        const removeSubBtn = document.createElement('button');
        removeSubBtn.type = 'button';
        removeSubBtn.className = 'btn btn-outline-danger'; // Less prominent remove button
        removeSubBtn.innerHTML = 'Remove';
        removeSubBtn.onclick = function() {
            subContainer.removeChild(subItemDiv);
        };

        // Append input and button to the sub-item div
        subItemDiv.appendChild(subInput);
        subItemDiv.appendChild(removeSubBtn);

        // Append the sub-item div to its container
        subContainer.appendChild(subItemDiv);
    }

    // Auto-hide success alert
    window.setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            // Use Bootstrap's dismiss method if available, otherwise just remove
            if (typeof bootstrap !== 'undefined' && bootstrap.Alert) {
                 const bsAlert = bootstrap.Alert.getInstance(alert);
                 if (bsAlert) {
                     bsAlert.close();
                 } else {
                     alert.remove(); // Fallback
                 }
            } else {
                alert.remove(); // Fallback if Bootstrap JS isn't loaded
            }
        }
    }, 5000); // Increased timeout slightly

</script>
@endpush
