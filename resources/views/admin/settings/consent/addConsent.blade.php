<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">  Consent Note</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
              

                <form method="POST" action="{{ isset($consentNote) ? route('admin.consent.update', $consentNote->id) : route('admin.consent.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($consentNote))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-10">
                            <label class="form-label"> Content</label>
                            <textarea id="ckeditor" class="form-control" placeholder="" name="content" rows="8" spellcheck="false" required> {{ isset($consentNote) ? $consentNote->content : '' }}</textarea>
                        </div>
                       
                       
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($consentNote) ? 'Update' : 'Add' }}</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('ckeditor');
</script>