@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li > / <b>Membership Plans</b></li>
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
                                </div>
                            @endif
                        </div>
                    </div>
                    <script>
                         window.setTimeout(function() {
                            var alert = document.getElementById('success-alert');
                            if (alert) {
                                alert.remove();
                            }
                        }, 3000);
                    </script>
                    <div class="card-header border-0 pb-0">
                        <div class="clearfix">
                            <h3 class="card-title"> Membership Plans List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.membership.plan.create')}}" class="btn btn-primary">Add Membership Plans</a>
                        </div>
                    </div>
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

                      <!-- Individual Membership Tiers -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Individual Membership Tiers</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped verticle-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Tier</th>
                                                        <th>Annual Fee</th>
                                                        <th>Target Audience</th>
                                                        <th>Key Benefits</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($individualMemberships as $membership)
                                                    <tr>
                                                        <td>{{ $membership->name }}</td>
                                                        <td>£{{ number_format($membership->annual_fee, 2) }}</td>
                                                        <td>{{ $membership->target_audience }}</td>
                                                        <td>{{ Str::limit($membership->key_benefits, 100) }}</td>
                                                        <td>
                                                            <span class="badge light badge-{{ $membership->is_active ? 'success' : 'danger' }}">
                                                                {{ $membership->is_active ? 'Active' : 'Inactive' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('admin.membership.plan.edit', $membership->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <form action="{{ route('admin.membership.plan.destroy', $membership->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Corporate Membership Tiers -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Corporate & Institutional Membership</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped verticle-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Annual Fee</th>
                                                        <th>Ideal For</th>
                                                        <th>Key Benefits</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($corporateMemberships as $membership)
                                                    <tr>
                                                        <td>{{ $membership->name }}</td>
                                                        <td>£{{ number_format($membership->annual_fee, 2) }}</td>
                                                        <td>{{ $membership->target_audience }}</td>
                                                        <td>{{ Str::limit($membership->key_benefits, 100) }}</td>
                                                        <td>
                                                            <span class="badge light badge-{{ $membership->is_active ? 'success' : 'danger' }}">
                                                                {{ $membership->is_active ? 'Active' : 'Inactive' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('admin.membership.plan.edit', $membership->slug) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <form action="{{ route('admin.membership.plan.destroy', $membership->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
