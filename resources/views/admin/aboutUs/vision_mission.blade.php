<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Vision / Mission </h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                
                <form method="POST" action="{{ isset($visionMission) ? route('admin.visionMission.update', $visionMission->id) : route('admin.visionMission.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($visionMission))
                        @method('PUT')
                    @endif  
                    <div class="row">
                         
                        
                        
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Vision statement</label>
                            <textarea id="content" class="form-control"  name="vision" rows="8" spellcheck="false" required> {{ isset($visionMission) ? $visionMission->vision : '' }} </textarea>
                        </div> 
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Vision Statement Image</label>
                            <input type="file" class="form-control @error('vision_img') is-invalid @enderror" name="vision_img" onchange="previewImage(event, 'vision_img')">
                            @error('vision_img')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            @if(isset($visionMission) && $visionMission->vision_img)
                                <img src="{{ asset($visionMission->vision_img) }}" alt="Current Vision Image" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="vision_img" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Mission statement</label>
                            <textarea id="mission" class="form-control"  name="mission" rows="8" spellcheck="false" required> {{ isset($visionMission) ? $visionMission->mission : '' }} </textarea>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Mission Statement Image</label>
                            <input type="file" class="form-control @error('mission_img') is-invalid @enderror" name="mission_img" onchange="previewImage(event, 'mission_img')">
                            @error('mission_img')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            @if(isset($visionMission) && $visionMission->mission_img)
                                <img src="{{ asset($visionMission->mission_img) }}" alt="Current Mission Image" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="mission_img" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($visionMission) ? 'Update' : 'Add' }}</button>
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