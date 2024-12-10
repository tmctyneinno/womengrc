@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Projects</a></li>
                
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
                            <h3 class="card-title">Projects List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.project.create')}}" class="btn btn-primary">Add Projects</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Project Type</th>
                                        <th>Land Size</th>
                                        <th>Banner Image</th>
                                        <th>Flyer Image</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($projects as $index => $project)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $project->title }}</td>
                                            <td>{!! Str::limit($project->content, 30) !!}</td>
                                            <td>{{ $project->projectMenu->name ?? 'null' }}</td>
                                            <td>{{ $project->land_size }}</td>
                                            <td>
                                                <img src="{{ asset($project->image_banner) }}" class="img-thumbnail" height="30" alt="{{ $project->title }}"  style="max-width: 100px;"/>
                                            </td>
                                            <td>
                                                <img src="{{ asset($project->image) }}" class="img-thumbnail" height="30" alt="{{ $project->title }}"  style="max-width: 100px;"/>
                                            </td>
                                            <td>{{ $project->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.project.edit',  encrypt($project->id) ) }}">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('admin.project.destroy', encrypt($project->id) )  }}" onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                                                </div>
                                               
                                            </td>
                                        </tr> 
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Project items found.</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                                
                                
                            </table>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $projects->currentPage() }} of {{ $projects->lastPage() }}, showing {{ $projects->count() }} records out of {{ $projects->total() }} total, starting on record {{ $projects->firstItem() }}, ending on record {{ $projects->lastItem() }}
                                </p> 
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                    <!-- Previous Page Link -->
                                    <li class="page-item {{ $projects->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $projects->previousPageUrl() }}">
                                        {{-- <i class="fa-solid fa-angle-left"></i> --}}
                                        <i>Previous</i>
                                      </a>
                                    </li>

                                    <!-- Pagination Elements -->
                                    @for ($i = 1; $i <= $projects->lastPage(); $i++)
                                      <li class="page-item {{ $projects->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $projects->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor

                                    <!-- Next Page Link -->
                                    <li class="page-item {{ $projects->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $projects->nextPageUrl() }}">
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