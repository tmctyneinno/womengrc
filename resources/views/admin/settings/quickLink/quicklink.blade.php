
<div class="col-xl-12">

    <div class="basic-form">
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
                            <h3 class="card-title">Quicklink </h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.quicklink.create')}}" class="btn btn-primary">Add Quick link</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Name</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr> 
                                </thead> 
                                <tbody>
                                    @forelse ($quicklinks as $index => $quicklink)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $quicklink->name }}</td>
                                           
                                            <td>{{ $quicklink->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.quicklink.edit',  encrypt($quicklink->id) ) }}">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('admin.quicklink.destroy', encrypt($quicklink->id) )  }}" onclick="return confirm('Are you sure you want to delete this team?');">Delete</a>
                                                </div>
                                              
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Team items found.</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                                
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
</div>
   

