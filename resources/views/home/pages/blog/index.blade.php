@extends('layouts.app')



@section('content')

 <!-- Inner Banner -->
 <div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/conference.jpg') }});">
    <div class="container">
        <div class="inner-banner-title text-center">
            <h3>Blog</h3>
            <p>Empowering Women, Transforming Leadership, Driving Innovation</p>
        </div> 
        
        <div class="banner-list">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <ul class="list">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li class="active">Blog</li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-5">
                    @include('home.pages.social_link')
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- Inner Banner End -->

<!-- Blog Area -->
<div class="blog-area pt-100 pb-70">
    <div class="container">
         <div class="section-title text-center">
             <span>Blog</span>
             <h2>Latest Blog <b>Post</b></h2>
         </div>
        <div class="row pt-45">
            @forelse ($blogs as $blog)
                <div class="col-lg-3 col-md-6">
                    <div class="blog-card">
                        <a href="{{ route('blog.detail', $blog->slug) }}">
                            <img src="{{ asset($blog->image) }}" alt="Team Images" style="display: block; width: 100%; height: 150px; object-fit:contain;">
                            {{-- <img src="{{ asset($blog->image) }}" alt="Images" style="object-fit: contain; max-width:100%; height:400px;"> --}}
                        </a> 
                        <div class="content" >
                            <span>{{ $blog->created_at->format('F d, Y') }}</a></span>
                            <h3 >
                                <a href="{{ route('blog.detail', $blog->slug) }}">{!! Str::limit( $blog->title , 40) !!}</a>
                            </h3>  
                            <p>{!! Str::limit($blog->content, 100) !!}</p>
                            <a href="{{ route('blog.detail', $blog->slug) }}" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No data available</p>    
            @endforelse
 
            <div class="col-lg-12 col-md-12">
                <div class="pagination-area text-center">
                    <!-- Previous Page Link -->
                    @if ($blogs->onFirstPage())
                        <a href="#" class="prev page-numbers disabled">
                            <i class="bx bx-chevron-left"></i>
                        </a>
                    @else
                        <a href="{{ $blogs->previousPageUrl() }}" class="prev page-numbers">
                            <i class="bx bx-chevron-left"></i>
                        </a>
                    @endif

                    <!-- Pagination Numbers -->
                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="page-numbers {{ $page == $blogs->currentPage() ? 'current' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}" class="next page-numbers">
                            <i class="bx bx-chevron-right"></i>
                        </a>
                    @else
                        <a href="#" class="next page-numbers disabled">
                            <i class="bx bx-chevron-right"></i>
                        </a>
                    @endif
                </div>
            </div>


        </div>
    </div>
 </div>
 
<!-- Blog Area End -->
    
@endsection