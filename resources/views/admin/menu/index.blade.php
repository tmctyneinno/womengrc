@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li > / <b>Menu</b></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-12 align-center mt-2">
                            @if(session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    {{-- Use Bootstrap's standard close button --}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- Move script to @push for consistency --}}

                    <div class="card-header border-0 pb-0">
                        <div class="clearfix">
                            <h3 class="card-title">Menu List</h3>
                        </div>
                        <div class="clearfix text-center"> {{-- Consider text-end for alignment --}}
                            <a href="{{route('admin.menu.create')}}" class="btn btn-primary">Add Menu</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Menu items</th>
                                        <th>Dropdown Items & Sub-items</th> {{-- Updated Header --}}
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($menuItems as $index => $menuItem)
                                        <tr>
                                            <td><strong>{{ $loop->iteration }}</strong></td> {{-- Use $loop->iteration --}}
                                            <td>{{ $menuItem->name }}</td>
                                            <td>
                                                {{-- Check if there are any top-level dropdown items --}}
                                                @if ($menuItem->dropdownItems && $menuItem->dropdownItems->isNotEmpty())
                                                    <ul class="list-unstyled mb-0"> {{-- Use <ul> for semantic list --}}
                                                        {{-- Loop through top-level items and include the partial --}}
                                                        @foreach ($menuItem->dropdownItems as $dropdownItem)
                                                            @include('admin.menu._dropdown_item', ['item' => $dropdownItem])
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-muted">None</span> {{-- Indicate no dropdowns --}}
                                                @endif
                                            </td>
                                            <td>{{ $menuItem->created_at->format('d M Y') }}</td> {{-- Short month format --}}
                                            <td>
                                                <div class="d-flex">
                                                    {{-- Use encrypt helper if your route expects encrypted ID --}}
                                                    <a class="btn btn-primary btn-sm me-2" href="{{ route('admin.menu.edit', encrypt($menuItem->id)) }}">Edit</a>
                                                    {{-- Add form for DELETE method --}}
                                                    <form action="{{ route('admin.menu.destroy', encrypt($menuItem->id)) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Menu and all its items?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No menu items found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-hide success alert
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
