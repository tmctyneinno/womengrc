@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <!-- dashboard container -->
        <div class="dashboard__container ">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-calendar-alt me-2"></i>My Training Requirements</h2>
                <div class="training-stats">
                    <span class="badge bg-primary">
                        {{ $trainingCertifications->total() }} Pending Certifications
                    </span>
                </div>
            </div>

           <!-- Empty State -->
           {{$trainingCertifications}}
            @if($trainingCertifications->isEmpty())
                <div class="training-empty">
                    <div class="empty-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>All Caught Up!</h3>
                    <p>You have no pending training requirements at this time.</p>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                        Return to Dashboard
                    </a>
                </div>
            @else
                <!-- Certification List -->
                <div class="training-list">
                    @foreach($trainingCertifications as $certification)
                        <div class="certification-card">
                            <div class="certification-header">
                                <h3>{{ $certification->name }}</h3>
                                <span class="due-date">
                                    <i class="far fa-calendar-alt"></i>
                                    Due: {{ $certification->due_date->format('M j, Y') }}
                                </span>
                            </div>
                            
                            <p class="certification-desc">
                                {{ Str::limit($certification->description, 200) }}
                            </p>
                            
                            <div class="progress-container">
                                <div class="progress-labels">
                                    <span>Progress</span>
                                    <span>{{ $certification->users[0]->pivot->progress ?? 0 }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" 
                                        role="progressbar" 
                                        style="width: {{ $certification->users[0]->pivot->progress ?? 0 }}%"
                                        aria-valuenow="{{ $certification->users[0]->pivot->progress ?? 0 }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="certification-footer">
                                <a href="{{ route('user.training.show', $certification->id) }}" 
                                class="btn btn-outline-primary">
                                    <i class="fas fa-book-open"></i> Continue Training
                                </a>
                                
                                @if($certification->users[0]->pivot->progress >= 100)
                                    <button class="btn btn-success mark-complete" disabled>
                                        <i class="fas fa-check-circle"></i> Completed
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="training-pagination">
                    {{ $trainingCertifications->links() }}
                </div>
            @endif

        </div>
    </main>
</div>
@endsection
<style>
    .training-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    .training-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    
    .training-title {
        font-weight: 600;
        color: #2c3e50;
    }
    
    .training-title i {
        margin-right: 10px;
        color: #4e73df;
    }
    
    .training-empty {
        text-align: center;
        padding: 4rem 2rem;
        background: #f8f9fa;
        border-radius: 10px;
    }
    
    .empty-icon {
        font-size: 3rem;
        color: #28a745;
        margin-bottom: 1rem;
    }
    
    .training-list {
        display: grid;
        gap: 1.5rem;
    }
    
    .certification-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        padding: 1.5rem;
        transition: transform 0.2s;
    }
    
    .certification-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .certification-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    
    .due-date {
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .certification-desc {
        color: #495057;
        margin-bottom: 1.5rem;
    }
    
    .progress-container {
        margin-bottom: 1.5rem;
    }
    
    .progress-labels {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
    }
    
    .progress {
        height: 10px;
        background: #e9ecef;
        border-radius: 5px;
        overflow: hidden;
    }
    
    .progress-bar {
        background: #4e73df;
        transition: width 0.3s ease;
    }
    
    .certification-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .training-pagination {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }
    
    @media (max-width: 768px) {
        .training-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .certification-header {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .certification-footer {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>


@section('scripts')
<script>
    // Animation for progress bars
    document.addEventListener('DOMContentLoaded', function() {
        const progressBars = document.querySelectorAll('.progress-bar');
        progressBars.forEach(bar => {
            const targetWidth = bar.style.width;
            bar.style.width = '0';
            setTimeout(() => {
                bar.style.width = targetWidth;
            }, 100);
        });
    });
</script>
@endsection