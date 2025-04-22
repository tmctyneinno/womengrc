<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Edit & Update Career</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
               
                <form method="POST" action="{{ isset($career) ? route('admin.career.update', $career->id) : route('admin.career.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($career))
                        @method('PUT')
                    @endif  
                    <div class="row">
                        
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Content</label>
                            <textarea  id="ckeditor"  class="form-control" name="content" spellcheck="false" required> {{ isset($career) ? $career->content : '' }}</textarea>
                        </div>
                        
                        
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($career) ? 'Update' : 'Add' }}</button>

                    
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize CKEditor
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