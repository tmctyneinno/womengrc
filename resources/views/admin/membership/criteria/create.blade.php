<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Membership Criteria</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="POST" action="{{ isset($membershipCriteria) ? route('admin.membershipCriteria.update', $membershipCriteria->id) : route('admin.membershipCriteria.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($membershipCriteria))
                        @method('PUT')
                    @endif  
                    <div class="row">
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Title</label>
                            <input  class="form-control" name="title" required value=" {{ isset($membershipCriteria) ? $membershipCriteria->title : '' }}" />
                        </div>
                        
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Content</label>
                            <textarea id="ckeditor" class="form-control" name="content" spellcheck="false" required>{{ isset($membershipCriteria) ? $membershipCriteria->content : '' }}
                            </textarea>
                        </div>
                        
                        
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Image</label>
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
                            @if(empty($membershipCriteria->image))
                            @else
                           
                                <img src="{{ asset($membershipCriteria->image) }}" alt="{{ $membershipCriteria->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($membershipCriteria) ? 'Update' : 'Add' }}</button>

                    
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (document.getElementById('ckeditor')) {
            CKEDITOR.replace('ckeditor');
        }
    });
    
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