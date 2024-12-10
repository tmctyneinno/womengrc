<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Privacy Policy</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                
                <form method="POST" action="{{ isset($policies) ? route('admin.privacy.update', $policies->id) : route('admin.privacy.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($policies))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Privacy Policy</label>
                            <textarea id="ckeditor" class="form-control" placeholder="Privacy Policy" name="content" rows="8" spellcheck="false" required>{{ isset($policies) ? $policies->content : '' }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($policies) ? 'Update' : 'Add' }}</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('ckeditor');
</script>