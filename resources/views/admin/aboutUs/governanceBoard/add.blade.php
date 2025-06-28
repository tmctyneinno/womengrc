<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Governance Board</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                
                <form method="POST" action="{{ isset($governanceBoard) ? route('admin.governanceBoard.update', $governanceBoard->id) : route('admin.governanceBoard.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($governanceBoard))
                        @method('PUT')
                    @endif  
                    <div class="row">
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Title</label>
                            <input class="form-control"  name="title" value="{{ isset($governanceBoard) ? $governanceBoard->title : '' }}" required />
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Content</label>
                            <textarea id="content" class="form-control"  name="content" rows="8" spellcheck="false" required> {{ isset($governanceBoard) ? $governanceBoard->content : '' }} </textarea>
                        </div> 
                        <div class="mb-3 col-md-10">
                            <label class="form-label"> Image</label>
                            <input type="file" class="form-control @error('vision_img') is-invalid @enderror" name="image" onchange="previewImage(event, 'vision_img')">
                            @error('vision_img')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            @if(isset($governanceBoard) && $governanceBoard->image)
                                <img src="{{ asset($governanceBoard->image) }}" alt="Current Vision Image" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="vision_img" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($governanceBoard) ? 'Update' : 'Add' }}</button>
                </form>
                <script>
                   function previewImage(event, imgId) {
                        const input = event.target;
                        const preview = document.getElementById(imgId);
                        
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

{{-- CKEditor CDN --}}
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script>
    // Initialize CKEditor
    ClassicEditor.create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor.create( document.querySelector( '#mission' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
     CKEDITOR.replace('ckeditor');
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
</script> 