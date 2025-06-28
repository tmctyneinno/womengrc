@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class=""><a href="javascript:void(0)">Dashboard / </a></li>
                <li class=" active"><a href="javascript:void(0)"> Certification List</a></li>
                
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
                            <h3 class="card-title">Certification List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.certifications.create')}}" class="btn btn-primary">Add Certification</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Duration</th>
                                        <th>Required</th>
                                        <th>Assigned To</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($certifications as $certification)
                                    <tr>
                                        <td>{{ $certification->name }}</td>
                                        <td>{{ $certification->certification_code }}</td>
                                        <td>{{ $certification->duration_hours }} hours</td>
                                        <td>
                                            @if($certification->is_required)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $certification->users_count }} users</td>
                                        <td>
                                            <a href="{{ route('admin.certifications.edit', $certification->id) }}" 
                                            class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.certifications.destroy', $certification) }}" 
                                                method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete this certification?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $certifications->currentPage() }} of {{ $certifications->lastPage() }}, showing {{ $certifications->count() }} records out of {{ $certifications->total() }} total, starting on record {{ $certifications->firstItem() }}, ending on record {{ $certifications->lastItem() }}
                                </p>  
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                 
                                    <li class="page-item {{ $certifications->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $certifications->previousPageUrl() }}">
                                       
                                        <i>Previous</i>
                                      </a>
                                    </li>
                                    @for ($i = 1; $i <= $certifications->lastPage(); $i++)
                                      <li class="page-item {{ $certifications->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $certifications->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor
                          
                                    <li class="page-item {{ $certifications->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $certifications->nextPageUrl() }}">
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