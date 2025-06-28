@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Advisory</a></li>
                 
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
                            <h3 class="card-title">Advisory List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.advisory.create')}}" class="btn btn-primary">Add Advisory</a>
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
                                        <th>Image</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($advisory as $index => $advisory)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $advisory->name }}</td>
                                            <td>{!! Str::limit($advisory->content, 30) !!}</td>
                                            <td>
                                                <img style=" width: 100px; height: 100px; object-fit: cover; " src="{{ asset($advisory->image) }}" class="img-thumbnail" height="30" alt="{{ $advisory->title }}"  style="max-width: 100px;"/>
                                            </td>
                                            <td>{{ $advisory->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.advisory.edit',  encrypt($advisory->id) ) }}">Edit</a>
                                                    <form method="POST" action="{{ route('admin.advisory.destroy', encrypt($advisory->id)) }}" onsubmit="return confirm('Are you sure you want to delete this Advisory?');" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Advisory items found.</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>

                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $blogs->currentPage() }} of {{ $blogs->lastPage() }}, showing {{ $blogs->count() }} records out of {{ $blogs->total() }} total, starting on record {{ $blogs->firstItem() }}, ending on record {{ $blogs->lastItem() }}
                                </p>  
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                 
                                    <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $blogs->previousPageUrl() }}">
                                       
                                        <i>Previous</i>
                                      </a>
                                    </li>
                                    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                      <li class="page-item {{ $blogs->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor
                          
                                    <li class="page-item {{ $blogs->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $blogs->nextPageUrl() }}">
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