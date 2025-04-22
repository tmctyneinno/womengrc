@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Projects status</a></li>
                
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
                            <h3 class="card-title">Projects Status List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.projects.status.create')}}" class="btn btn-primary">Add Projects Status</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($galleries as $index => $gallery)
                                        <tr>
                                            <td><strong>{{ $galleries->firstItem() + $index }}</strong></td>
                                            <td>{{ $gallery->title }}</td>
                                            <td>{{ $gallery->video_link }}</td>
                                            <td>
                                                @if ($gallery->images)
                                                    @foreach (json_decode($gallery->images, true) as $image)
                                                        <img style="width: 100px; height: 100px; object-fit: cover;" src="{{ asset($image) }}" class="img-thumbnail" alt="{{ $gallery->title }}">
                                                    @endforeach
                                                @else
                                                    <p>No images found</p>
                                                @endif
                                            </td>
                                             
                                            
                                            <td>{{ $gallery->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.projects.status.edit', encrypt($gallery->id)) }}">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('admin.projects.status.destroy', encrypt($gallery->id)) }}" onclick="return confirm('Are you sure you want to delete this project status?');">Delete</a>
                                                </div>
                                               
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Project status items found.</td>
                                        </tr>
                                    @endforelse
                                 </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $galleries->currentPage() }} of {{ $galleries->lastPage() }}, showing {{ $galleries->count() }} records out of {{ $galleries->total() }} total, starting on record {{ $galleries->firstItem() }}, ending on record {{ $galleries->lastItem() }}
                                </p> 
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                    <!-- Previous Page Link -->
                                    <li class="page-item {{ $galleries->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $galleries->previousPageUrl() }}">
                                        {{-- <i class="fa-solid fa-angle-left"></i> --}}
                                        <i>Previous</i>
                                      </a>
                                    </li>

                                    <!-- Pagination Elements -->
                                    @for ($i = 1; $i <= $galleries->lastPage(); $i++)
                                      <li class="page-item {{ $galleries->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $galleries->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor

                                    <!-- Next Page Link -->
                                    <li class="page-item {{ $galleries->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $galleries->nextPageUrl() }}">
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