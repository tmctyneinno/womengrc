@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard /</li>
                <li class="breadcrumb"><a href="javascript:void(0)"> Users</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6 align-center mt-2">
                            @if(session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            @if(session('error'))
                                <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-header border-0 pb-0">
                        <div class="clearfix"> 
                            <h3 class="card-title">User List</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <form id="multiDeleteForm" action="{{ route('admin.users.multi-delete') }}" method="POST">
                                @csrf
                                {{-- @method('DELETE') --}}
                                
                                <div class="d-flex justify-content-between mb-3">
                                    <button type="button" id="selectAllBtn" class="btn btn-sm btn-outline-primary">Select All</button>
                                    <button type="submit" id="deleteSelectedBtn" class="btn btn-sm btn-danger" disabled>
                                        Delete Selected (<span id="selectedCount">0</span>)
                                    </button>
                                </div>

                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th width="50"><input type="checkbox" id="selectAllCheckbox"></th>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>LinkedIn</th> 
                                            {{-- <th>Admin access</th>  --}}
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $index => $user)
                                            <tr>
                                                <td><input type="checkbox" name="selected_ids[]" value="{{ $user->id }}" class="user-checkbox"></td>
                                                <td><strong>{{ $users->firstItem() + $index }}</strong></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td> 
                                                    @switch($user->role)
                                                        @case('advisory_member') <span class="badge bg-primary">Advisory Member</span> @break
                                                        @case('facilitator') <span class="badge bg-success">Facilitator</span> @break
                                                        @case('guests') <span class="badge bg-warning text-dark">Guest</span> @break
                                                        @case('admin') <span class="badge bg-danger">Admin</span> @break
                                                        @default <span class="badge bg-secondary">{{ ucfirst($user->role) }}</span>
                                                    @endswitch
                                                </td>
                                
                                                <td>
                                                    @if (!empty($user->linkedin))
                                                        <a href="{{ $user->linkedin }}" target="_blank" class="text-decoration-none">
                                                            <i class="fab fa-linkedin text-primary"></i> View Profile
                                                        </a>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @if(!$user->is_admin)
                                                        <a href="#" class="btn btn-sm btn-success">Make Admin</a>
                                                    @else
                                                        <a href="#" class="btn btn-sm btn-danger">Remove Admin</a>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $user->created_at->format('d F Y') }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('admin.users.edit', encrypt($user->id)) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4">No users found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                
                            </form>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Alert timeout
                                    setTimeout(() => {
                                        const alerts = document.querySelectorAll('.alert');
                                        alerts.forEach(alert => {
                                            alert.remove();
                                        });
                                    }, 3000);
                                
                                    // Multi-delete functionality
                                    const selectAllCheckbox = document.getElementById('selectAllCheckbox');
                                    const userCheckboxes = document.querySelectorAll('.user-checkbox');
                                    const selectAllBtn = document.getElementById('selectAllBtn');
                                    const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
                                    const selectedCount = document.getElementById('selectedCount');
                                    const multiDeleteForm = document.getElementById('multiDeleteForm');
                                
                                    // Update selected count and button state
                                    function updateSelectedCount() {
                                        const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
                                        const count = checkedBoxes.length;
                                        
                                        selectedCount.textContent = count;
                                        deleteSelectedBtn.disabled = count === 0;
                                        selectAllCheckbox.checked = count > 0 && count === userCheckboxes.length;
                                    }
                                
                                    // Individual checkbox event
                                    userCheckboxes.forEach(checkbox => {
                                        checkbox.addEventListener('change', updateSelectedCount);
                                    });
                                
                                    // Select all checkbox
                                    selectAllCheckbox.addEventListener('change', function() {
                                        const isChecked = this.checked;
                                        userCheckboxes.forEach(checkbox => {
                                            checkbox.checked = isChecked;
                                        });
                                        updateSelectedCount();
                                    });
                                
                                    // Select all button
                                    selectAllBtn.addEventListener('click', function() {
                                        const allChecked = Array.from(userCheckboxes).every(checkbox => checkbox.checked);
                                        const newState = !allChecked;
                                        
                                        userCheckboxes.forEach(checkbox => {
                                            checkbox.checked = newState;
                                        });
                                        
                                        selectAllCheckbox.checked = newState;
                                        updateSelectedCount();
                                    });
                                
                                    // Form submission
                                    multiDeleteForm.addEventListener('submit', function(e) {
                                        const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
                                        if (checkedBoxes.length === 0) {
                                            e.preventDefault();
                                            alert('Please select at least one user to delete');
                                            return false;
                                        }
                                        
                                        if (!confirm(`Are you sure you want to delete ${checkedBoxes.length} selected users?`)) {
                                            e.preventDefault();
                                            return false;
                                        }
                                        
                                        // Add loading state
                                        deleteSelectedBtn.disabled = true;
                                        deleteSelectedBtn.innerHTML = `
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Deleting...
                                        `;
                                    });
                                });
                                </script>

                            @if($users->hasPages())
                            <div class="d-flex align-items-center justify-content-between flex-wrap mt-3">
                                <p class="mb-2 me-3">
                                    Page {{ $users->currentPage() }} of {{ $users->lastPage() }},
                                    showing {{ $users->count() }} records out of {{ $users->total() }},
                                    starting on record {{ $users->firstItem() }}, ending on {{ $users->lastItem() }}
                                </p>
                            
                                <nav aria-label="Page navigation">
                                    <ul class="pagination mb-0">
                                        <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        
                                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                                            <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        
                                        <li class="page-item {{ !$users->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush