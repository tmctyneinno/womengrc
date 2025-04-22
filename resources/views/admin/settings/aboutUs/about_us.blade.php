<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> About us</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                
                <form method="POST" action="{{ isset($aboutUs) ? route('admin.aboutus.update', $aboutUs->id) : route('admin.aboutus.store') }}" enctype="multipart/form-data">
                    @csrf  
                    @if(isset($aboutUs))
                        @method('PUT')
                    @endif
                    <div class="row"> 
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="title" value=" {{ isset($aboutUs) ? $aboutUs->title : '' }}" required>
                         </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Content</label>
                            <textarea id="ckeditor" name="content" class="form-control" placeholder="Content" rows="8" spellcheck="false" required> {{ isset($aboutUs) ? $aboutUs->content : '' }}</textarea>
                        </div>
                       
                        <div class="mb-3 col-md-10">
                            <label class="form-label"> Image </label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  onchange="previewImage(event)">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(isset($aboutUs))
                            <img src="{{ asset($aboutUs->image) }}" alt="{{ $aboutUs->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                           
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Header Image </label>
                            <input id="header_image" type="file" class="form-control @error('image') is-invalid @enderror" name="header_image"  onchange="previewImagebg(event)">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(isset($aboutUs))
                            <img src="{{ asset($aboutUs->header_image) }}" alt="{{ $aboutUs->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="image-previewbg" src="" alt="Image Previewbg" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>

                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($aboutUs) ? 'Update' : 'Add' }}</button>
                </form>
                <script>
                    function previewImage(event) {
                        const input = event.target;
                        const preview = document.getElementById('image-preview');
                        
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                            };
                            
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    function previewImagebg(event) {
                        const input = event.target;
                        const preview = document.getElementById('image-previewbg');
                        
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                            };
                            
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('ckeditor');
</script>