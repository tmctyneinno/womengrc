<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Why Choose us statement</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
               
               

                
                <form method="POST" action="{{ isset($whyChooseUs) ? route('admin.settings.update_why_choose_us', $whyChooseUs->id) : route('admin.settings.store_why_choose_us') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($whyChooseUs))
                        @method('PUT')
                    @endif  
                    <div class="row">
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">First Title</label>
                            <input class="form-control" placeholder="First Title" name="first_title" required value="{{ isset($whyChooseUs) ? $whyChooseUs->first_title : '' }} "/>
                        </div>
                        <div class="mb-3 col-md-10">  
                            <label class="form-label">First Content</label>
                            <textarea  class="form-control" name="first_content" rows="5" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->first_content : '' }}</textarea>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Second Title</label>
                            <input class="form-control" placeholder="Second Title" name="second_title" required value="{{ isset($whyChooseUs) ? $whyChooseUs->second_title : '' }} "/>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Second Content</label>
                            <textarea  class="form-control" name="second_content" rows="5" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->second_content : '' }}</textarea>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Third Title</label> 
                            <input class="form-control" placeholder="Third Title" name="third_title" required value="{{ isset($whyChooseUs) ? $whyChooseUs->third_title : '' }} "/>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Third Content</label>
                            <textarea  class="form-control" name="third_content" rows="5" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->third_content : '' }}</textarea>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Four Title</label>
                            <input class="form-control" placeholder="Four Title" name="four_title" required value="{{ isset($whyChooseUs) ? $whyChooseUs->four_title : '' }} "/>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Four Content</label>
                            <textarea  class="form-control" name="four_content" rows="5" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->four_content : '' }}</textarea>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Why Choose Us Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  onchange="previewImage(event)">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                            <br>
                            <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                            @if(empty($whyChooseUs->image))
                            @else
                                <img src="{{ asset($whyChooseUs->image) }}" alt="{{ $whyChooseUs->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($whyChooseUs) ? 'Update' : 'Add' }}</button>

                    
            </div>
        </div>
    </div>
</div>

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
</script> 