@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Booking inspection</a></li>
                
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
                            <h3 class="card-title">Booking inspection List</h3>
                        </div>
                      
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Project</th>
                                        <th>Inspection Date</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($inspections as $index => $inspection)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $inspection->full_name }}</td>
                                            <td>{{ $inspection->phone }}</td>
                                            <td>{{ $inspection->email }}</td>
                                            <td>{{ $inspection->project }}</td>
                                            <td>{{ \Carbon\Carbon::parse($inspection->inspectionDate)->format('d F Y') }}</td>
                                            <td>{{ $inspection->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.inspection.show', encrypt($inspection->id) )  }}">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('admin.inspection.destroy', encrypt($inspection->id) )  }}" onclick="return confirm('Are you sure you want to delete this Booking Inspection?');">Delete</a>
                                                </div>
                                               
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Booking Inspection items found.</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                                
                                
                            </table>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $inspections->currentPage() }} of {{ $inspections->lastPage() }}, showing {{ $inspections->count() }} records out of {{ $inspections->total() }} total, starting on record {{ $inspections->firstItem() }}, ending on record {{ $inspections->lastItem() }}
                                </p> 
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                    <!-- Previous Page Link -->
                                    <li class="page-item {{ $inspections->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $inspections->previousPageUrl() }}">
                                        {{-- <i class="fa-solid fa-angle-left"></i> --}}
                                        <i>Previous</i>
                                      </a>
                                    </li>

                                    <!-- Pagination Elements -->
                                    @for ($i = 1; $i <= $inspections->lastPage(); $i++)
                                      <li class="page-item {{ $inspections->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $inspections->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor

                                    <!-- Next Page Link -->
                                    <li class="page-item {{ $inspections->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $inspections->nextPageUrl() }}">
                                        {{-- <i class="fa-solid fa-angle-right"></i> --}}
                                        <i>Next</i>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
          
           
            
           
        </div>
    </div>
</div>
    @endsection