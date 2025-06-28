@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">livestream</a></li>
                
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
                            <h3 class="card-title">livestream List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.livestream.create')}}" class="btn btn-primary">Add livestream</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Title</th>
                                        <th>Url</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($livestream as $index => $livestream)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $livestream->title }}</td>
                                            <td>{{ $livestream->url }}</td>
                                         
                                            <td>{{ $livestream->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.livestream.edit',  encrypt($livestream->id) ) }}">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('admin.livestream.destroy', encrypt($livestream->id) )  }}" onclick="return confirm('Are you sure you want to delete this livestream?');">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No livestream items found.</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>

                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}, showing {{ $posts->count() }} records out of {{ $posts->total() }} total, starting on record {{ $posts->firstItem() }}, ending on record {{ $posts->lastItem() }}
                                </p>  
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                 
                                    <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $posts->previousPageUrl() }}">
                                       
                                        <i>Previous</i>
                                      </a>
                                    </li>
                                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                      <li class="page-item {{ $posts->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor
                          
                                    <li class="page-item {{ $posts->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $posts->nextPageUrl() }}">
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