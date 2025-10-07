@extends('layouts.app')

@section('content')

@php
    // Cache translations for the inner banner and resource section
    $resourcePageTitle =  'Resource';
    $homeText = 'Home';
    $pagesText = 'Pages';
    $resourcesSectionSubtitle = 'Resources';
    $resourcesSectionTitle = 'Women in GRC & Financial Crime Prevention';
    $noDataFoundText = 'No resources found at the moment.';
    $closeButtonArialLabel = 'Close';

    // Handle header image with fallback
    $headerImageUrl = (isset($aboutUs) && !empty($aboutUs->banner_one)) ? asset($aboutUs->banner_one) : asset('images/default-header-placeholder.jpg'); // Fallback header image
@endphp

<div class="inner-banner" style="background-image: url({{ $headerImageUrl }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ $resourcePageTitle }}</h3>
            <ul>
                <li>
                    <a href="{{ route('home')}}">{{ $homeText }}</a>
                </li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>{{ $pagesText }}</li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>{{ $resourcePageTitle }}</li>
            </ul>
        </div>
    </div>
</div>
 
 <!-- Team Area -->
 <div class="team-area pt-100 pb-70"> {{-- Consider renaming class if not displaying a "team" --}}
    <div class="container">
        <div class="section-title text-center">
            <span>{{ $resourcesSectionSubtitle }}</span>
            <h2>{{ $resourcesSectionTitle }}</h2>
        </div>
        <div class="row pt-45">
            {{-- Removed redundant inner row div --}}
            @forelse ($resource as $item) {{-- Changed variable name to $item to avoid conflict with outer $resource --}}
                <div class="col-lg-6 col-md-6">
                    <div class="city-item">
                        <a href="#" class="city-img">
                            @php
                                $resourceImageAlt = cache()->remember('resource_item_alt_'.$item->id.'_'.app()->getLocale(), 86400, function() use ($item, $resourcesSectionSubtitle) {
                                    // Attempt to use a title or name field from $item for better alt text, otherwise fallback
                                    $altBase = $item->title ?? $item->name ?? $resourcesSectionSubtitle;
                                    return $altBase;
                                });
                            @endphp
                            <img src="{{ asset($item->image) }}" alt="{{ $resourceImageAlt }}">
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">{{ $noDataFoundText }}</p>
                </div>
            @endforelse
        </div>
    </div> 
</div>
<!-- Team Area End -->

<div class="modal modal-dialog-scrollable " id="exampleModalManagement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ $closeButtonArialLabel }}"></button>
            </div>
            <div class="modal-body">
                <h6 id="modalPosition"></h6>
                <p id="modalContent"></p>
            </div>
        </div>
    </div>
</div>



@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModalManagement = document.getElementById('exampleModalManagement');
        
        exampleModalManagement.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            
            var name = button.getAttribute('data-name');
            var position = button.getAttribute('data-position');
            var content = button.getAttribute('data-content');
            
            var modalTitle = exampleModalManagement.querySelector('.modal-title');
            var modalPosition = exampleModalManagement.querySelector('#modalPosition');
            var modalContent = exampleModalManagement.querySelector('#modalContent');
            
            modalTitle.textContent = name;
            modalPosition.textContent = position;
            modalContent.innerHTML = content;
        });
    });
</script>