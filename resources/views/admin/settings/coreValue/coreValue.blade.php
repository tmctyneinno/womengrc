<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Core value </h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                
                <form method="POST" action="{{ isset($coreValue) ? route('admin.coreValue.update', $coreValue->id) : route('admin.coreValue.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($coreValue))
                        @method('PUT')
                    @endif  
                    <div class="row">
                         
                        
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Our core value </label>
                            <textarea id="ckeditor" class="form-control" placeholder="" name="core_value" rows="8" spellcheck="false" required> {{ isset($coreValue) ? $coreValue->core_values : '' }} </textarea>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Mission statement</label>
                            <textarea id="caption" class="form-control" placeholder="Mission Statements" name="mission" rows="8" spellcheck="false" required> {{ isset($coreValue) ? $coreValue->mission : '' }} </textarea>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Vision statement</label>
                            <textarea id="caption" class="form-control" placeholder="Vision Statements" name="vision" rows="8" spellcheck="false" required> {{ isset($coreValue) ? $coreValue->vision : '' }} </textarea>
                        </div> 
                        <div class="mb-3 col-md-10">
                            <label class="form-label"> Image </label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  onchange="previewImage(event)">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(isset($executiveSummary))
                            <img src="{{ asset($executiveSummary->image) }}" alt="{{ $executiveSummary->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                        <br>
                        <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        @if(empty($coreValue->image))
                        @else
                            <img src="{{ asset($coreValue->image) }}" alt="{{ $coreValue->title }}" class="img-thumbnail mt-2" width="200px"  style=" max-width: 200px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($coreValue) ? 'Update' : 'Add' }}</button>
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