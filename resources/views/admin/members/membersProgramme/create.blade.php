<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Edit & Update Members Programme</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
               
                <form method="POST" action="{{ isset($membersProgramme) ? route('admin.membersProgramme.update', $membersProgramme->id) : route('admin.membersProgramme.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($membersProgramme))
                        @method('PUT')
                    @endif  
                    <div class="row">
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Title</label>
                            <input  class="form-control" name="title" required value=" {{ isset($membersProgramme) ? $membersProgramme->title : '' }}" />
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Content</label>
                            <textarea id="ckeditor"  class="form-control" name="content" spellcheck="false" required> {{ isset($membersProgramme) ? $membersProgramme->content : '' }}</textarea>
                        </div>
                        
                       
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($membersProgramme) ? 'Update' : 'Add' }}</button>

                    
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