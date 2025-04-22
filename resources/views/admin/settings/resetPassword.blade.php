<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Reset Password</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <script>
                    window.setTimeout(function() {
                       var alert = document.getElementById('success-alert');
                       if (alert) {
                           alert.remove();
                       }
                   }, 3000);
               </script>

                 {{ $admin }}
                <form method="POST" action="{{ route('admin.password.update') }}" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row">
                            <div class="mb-3 col-md-10">
                                <label class="form-label"> Current Password </label>
                                <input autocomplete="off" type="password" class="form-control" placeholder=" Current Password" name="current_password" required>
                                @error('current_password')
                                    <span>{{ $message }}</span>
                                @enderror
                    
                            </div>
                            <div class="mb-3 col-md-10">
                                <label class="form-label">New Password </label>
                                <input autocomplete="off" type="password" class="form-control" placeholder=" New Password " name="password"  required>
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                    
                            </div>
                            <div class="mb-3 col-md-10">
                                <label class="form-label">Confirm New Password </label>
                                <input autocomplete="off" type="password" class="form-control" placeholder=" Confirm New Password  " name="password_confirmation"  required>
                                @error('password_confirmation')
                                    <span>{{ $message }}</span>
                                @enderror
                    
                            </div>
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
               
            </div>
        </div>
    </div>
</div>