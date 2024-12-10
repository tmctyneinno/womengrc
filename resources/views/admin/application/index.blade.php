@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Application Form</a></li>
                
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
                            <h3 class="card-title">Aplication List</h3>
                        </div>
                        
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Qualification</th>
                                        <th>Membership Category</th>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Payment Option</th>
                                        <th>Payment Status</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $data)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->user->email }}</td> 
                                            <td>{{ $data->phone_number }}</td>
                                            <td>{{ $data->qualification }}</td>
                                            <td>{{ $data->membership_category }}</td>
                                            <td>{{ $data->reference }}</td>
                                            <td>₦{{ number_format($data->amount, 2) }}</td>
                                            <td>{{ $data->payment_option }}</td>
                                            <td>
                                                @if($data->payment_status === 'pending')
                                                    <button class="btn btn-warning btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                                @elseif($data->payment_status === 'completed')
                                                    <button class="btn btn-success btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                                @elseif($data->payment_status === 'failed')
                                                    <button class="btn btn-danger btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                                @elseif($data->payment_status === 'cancelled')
                                                    <button class="btn btn-danger btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                                @endif
                                                    
                                            </td>
                                            {{-- <td>
                                                <img style=" width: 100px; height: 100px; object-fit: cover; " src="{{ asset($data->image) }}" class="img-thumbnail" height="30" alt="{{ $data->title }}"  style="max-width: 100px;"/>
                                            </td> --}}
                                            <td>{{ $data->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.application.show',  encrypt($data->id) ) }}">View</a>
                                                    <!-- Delete Button with Form -->
                                                    {{-- 
                                                        <form action="{{ route('admin.application.destroy', encrypt($data->id)) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form> 
                                                    --}}
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

                            {{-- <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $datas->currentPage() }} of {{ $datas->lastPage() }}, showing {{ $datas->count() }} records out of {{ $datas->total() }} total, starting on record {{ $datas->firstItem() }}, ending on record {{ $datas->lastItem() }}
                                </p>  
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                 
                                    <li class="page-item {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $datas->previousPageUrl() }}">
                                       
                                        <i>Previous</i>
                                      </a>
                                    </li>
                                    @for ($i = 1; $i <= $datas->lastPage(); $i++)
                                      <li class="page-item {{ $datas->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $datas->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor
                          
                                    <li class="page-item {{ $datas->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $datas->nextPageUrl() }}">
                                        <i>Next</i>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
           
          
           
            
           
        </div>
    </div>
</div>
    @endsection