@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Advisory Board Member</a></li>
                
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
                            <h3 class="card-title">Advisory Board Member List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.advisoryBoardMember.create')}}" class="btn btn-primary">Add Advisory Board Member</a>
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
                                    @forelse ($advisoryBoardMember as $index => $data)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $data->name }}</td>
                                            <td>{!! Str::limit($data->content, 30) !!}</td>
                                            <td>
                                                <img style=" width: 100px; height: 100px; object-fit: cover; " src="{{ asset($data->image) }}" class="img-thumbnail" height="30" alt="{{ $data->title }}"  style="max-width: 100px;"/>
                                            </td>
                                            <td>{{ $data->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.advisoryBoardMember.edit',  encrypt($data->id) ) }}">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('admin.advisoryBoardMember.destroy', encrypt($data->id) )  }}" onclick="return confirm('Are you sure you want to delete this data?');">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Post items found.</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $advisoryBoardMember->currentPage() }} of {{ $advisoryBoardMember->lastPage() }}, showing {{ $advisoryBoardMember->count() }} records out of {{ $advisoryBoardMember->total() }} total, starting on record {{ $advisoryBoardMember->firstItem() }}, ending on record {{ $advisoryBoardMember->lastItem() }}
                                </p>  
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                 
                                    <li class="page-item {{ $advisoryBoardMember->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $advisoryBoardMember->previousPageUrl() }}">
                                       
                                        <i>Previous</i>
                                      </a>
                                    </li>
                                    @for ($i = 1; $i <= $advisoryBoardMember->lastPage(); $i++)
                                      <li class="page-item {{ $advisoryBoardMember->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $advisoryBoardMember->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor
                          
                                    <li class="page-item {{ $advisoryBoardMember->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $advisoryBoardMember->nextPageUrl() }}">
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