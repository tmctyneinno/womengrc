
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
                            <h3 class="card-title">Teams List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.team.create')}}" class="btn btn-primary">Add Teams</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>DATE   </th>
                                        <th rowspan="2">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($teams as $index => $team)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $team->name }}</td>
                                            <td class="text-uppercase">{{ $team->position }}</td>
                                            <td>{!! Str::limit($team->content, 30) !!}</td>
                                            <td>
                                                <img src="{{ asset($team->image) }}" class="img-thumbnail" height="20" alt="{{ $team->title }}"  style="max-width: 100px;"/>
                                            </td>
                                            <td>{{ $team->created_at->format('d F Y') }}</td>
                                            <td >
                                                <div class="d-flex">
                                                    <a class="btn btn-primary" style="margin-right: 5px;" href="{{ route('admin.team.edit',  encrypt($team->id) ) }}">Edit</a>
                                                    <a class="btn btn-danger" href="{{ route('admin.team.destroy', encrypt($team->id) )  }}" onclick="return confirm('Are you sure you want to delete this team?');">Delete</a>
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
   

