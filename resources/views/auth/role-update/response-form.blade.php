@extends('layouts.app')

<style>
    .navbar-custom {
        background-color: #2a2a2a !important;
    }
    .form-group select {
        padding-top: 50px !important;
    }
    .response-option {
        margin-bottom: 20px;
    }
    .response-option input[type="radio"] {
        margin-right: 10px;
    }
    #rejection-reason {
        display: none;
        margin-top: 15px;
        transition: all 0.3s ease;
    }
    .role-change-info {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>

@section('content')
<div class="user-area">
    <div class="container-fluid m-0">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-xl-6 p-0">
                <div class="user-img">
                    <img src="{{ asset('assets/img/login-img.jpg') }}" alt="Login Image">
                </div>
            </div>
 
            <div class="col-lg-5 col-xl-6">
                <div class="user-section text-center">
                    <div class="user-content pt-5"></div> 
                    <div class="tab user-tab">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content current active">
                                    <div class="tabs_item current"> 
                                        <div class="user-all-form">
                                            <div class="contact-form">
                                                <form method="POST" action="{{ route('admin.role-update.process-response', $token) }}" id="roleUpdateForm">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center mb-4">
                                                            <h4>Respond to Role Update Request</h4>
                                                            <div class="role-change-info text-start">
                                                                <p><strong>Current Role:</strong> {{ $pendingUpdate->getRoleDisplayName($pendingUpdate->current_role) }}</p>
                                                                <p><strong>Proposed New Role:</strong> {{ $pendingUpdate->getNewRoleDisplayAttribute() }}</p>
                                                                <p><strong>Request Expires:</strong> {{ $pendingUpdate->expires_at->format('M j, Y g:i A') }}</p>
                                                            </div>
                                                        </div>

                                                        <!-- Response Options -->
                                                        <div class="form-group row justify-content-center">
                                                            <div class="col-md-8">
                                                                <div class="response-option">
                                                                    <input type="radio" id="approve" name="response" value="approve" checked>
                                                                    <label for="approve" class="text-success">Approve this role change</label>
                                                                </div>
                                                                
                                                                <div class="response-option">
                                                                    <input type="radio" id="reject" name="response" value="reject">
                                                                    <label for="reject" class="text-danger">Reject this role change</label>
                                                                </div>
                                                                
                                                                <div id="rejection-reason">
                                                                    <label for="reason" class="form-label">Reason for rejection:</label>
                                                                    <textarea id="reason" style="padding: 5px"class="form-control @error('reason') is-invalid @enderror" 
                                                                        name="reason" rows="3" placeholder="Please provide a reason for rejecting this role change"></textarea>
                                                                    @error('reason')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <div class="col-lg-12 col-md-12 text-center mt-3">
                                                            <button type="submit" class="default-btn user-all-btn">Submit Response</button>
                                                        </div>

                                                        <!-- Back to Login Link -->
                                                        <div class="col-lg-12 col-sm-6 text-center mt-4">
                                                            <a style="color: #dc3545" href="{{ route('login') }}">Back to Login</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const approveRadio = document.getElementById('approve');
        const rejectRadio = document.getElementById('reject');
        const reasonField = document.getElementById('rejection-reason');
        const reasonTextarea = document.getElementById('reason');
        const form = document.getElementById('roleUpdateForm');
        
        // Function to handle visibility of reason field
        function toggleReasonField() {
            if (rejectRadio.checked) {
                reasonField.style.display = 'block';
                reasonTextarea.setAttribute('required', 'required');
            } else {
                reasonField.style.display = 'none';
                reasonTextarea.removeAttribute('required');
                reasonTextarea.value = ''; // Clear the field when not needed
            }
        }
        
        // Initialize the state
        toggleReasonField();
        
        // Listen for changes on both radio buttons
        approveRadio.addEventListener('change', toggleReasonField);
        rejectRadio.addEventListener('change', toggleReasonField);
        
        // Form submission validation
        form.addEventListener('submit', function(e) {
            if (rejectRadio.checked && !reasonTextarea.value.trim()) {
                e.preventDefault();
                reasonField.style.display = 'block';
                reasonTextarea.focus();
                alert('Please provide a reason for rejecting the role change');
            }
        });
    });
</script>
@endsection