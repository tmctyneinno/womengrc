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
                    <p class="mb-0">Welcome to Company Name backend</p>
                </div>
                <a href="{{route('admin.menu.index')}}" class="btn btn-primary rounded light">View Menu</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Menu</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <form method="POST"  action="{{ route('admin.menu.update', $menuItem->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Menu Item Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Menu Item Name" value="{{ $menuItem->name }}" name="name" id="name" required>
                                        </div>
                                    </div>
                                   
                                    <div class="mb-3 row align-items-center" >
                                        <label class="col-sm-3 col-form-label form-label">Dropdown Items</label>
                                        
                                        <div class="col-sm-9" id="dropdown-items">
                                            <button type="button" class="btn btn-danger" onclick="addDropdownItem()">Add Dropdown Item</button>
                                            @foreach ($menuItem->dropdownItems as $dropdownItem)
                                                <div class="input-group mb-2 mt-3">
                                                    <input type="text" class="form-control" name="dropdown_items[]" value="{{ $dropdownItem->name }}">
                                                    <button type="button" class="btn btn-danger" onclick="removeDropdownItem(this)">Remove</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                  
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update Menu Item</button>
                                        </div>
                                    </div>
                                   
                                </form>
                                <script>
                                    function addDropdownItem() {
                                        const dropdownItemsDiv = document.getElementById('dropdown-items');

                                        const itemDiv = document.createElement('div');
                                        itemDiv.className = 'input-group mb-2 mt-2';

                                        const input = document.createElement('input');
                                        input.type = 'text';
                                        input.name = 'dropdown_items[]';
                                        input.className = 'form-control';

                                        const buttonDiv = document.createElement('div');
                                        buttonDiv.className = 'input-group-append';
                                        const removeButton = document.createElement('button');
                                        removeButton.type = 'button';
                                        removeButton.className = 'btn btn-danger';
                                        removeButton.innerHTML = 'Remove';
                                        removeButton.onclick = function() {
                                            dropdownItemsDiv.removeChild(itemDiv);
                                        };

                                        buttonDiv.appendChild(removeButton);
                                        itemDiv.appendChild(input);
                                        itemDiv.appendChild(buttonDiv);
                                        dropdownItemsDiv.appendChild(itemDiv);
                                    }
                                    function removeDropdownItem(button) {
                                        const divToRemove = button.parentNode;
                                        divToRemove.parentNode.removeChild(divToRemove);
                                    }
                                </script>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
</div>
@endsection