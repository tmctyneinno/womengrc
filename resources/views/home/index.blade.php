@extends('layouts.app')



@section('content')


<!-- Slider Area -->
<div class="slider-area owl-carousel owl-theme">
    @foreach ($sliders as $slider)
        <div class="slider-item" style="background-image: url({{ asset($slider->image) }})">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="slider-content">
                            <h1>{{ $slider->title }}</h1>
                            <p><b>{{ $slider->caption }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Slider Area End -->


<div class="application-area-two pt-100" >
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="application-content">
                    <div class="section-title" style="text-align: justify">
                        <h2>
                            About us
                        </h2>
                        <p style="text-align: justify" class="pb-3">
                            {!! Str::limit($aboutUs->content, 500) !!}
                        </p>
                        <a href="{{ route('about')}}" class="default-btn border-radius ">
                            Read more
                        </a>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-5">
                <div class="application-img-two">
                    <img src="{{ asset($aboutUs->image) }}" alt="Images">
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Category Area -->
{{-- <section class="category-area pt-100 pb-70">
    <div class="container">
        
        
        <div class="row category-bg">
            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-bake"></i>
                    </a>
                   
                    <a href="category.html">
                        <h3>Restaurant</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-hotel"></i>
                    </a>
                    <a href="category.html">
                        <h3>Hotel & Resort</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-barbell"></i>
                    </a>
                    <a href="category.html">
                        <h3>Fitness Club</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-store"></i>
                    </a>
                    <a href="category.html">
                        <h3>Shops & Stores</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-event"></i>
                    </a>
                    <a href="category.html">
                        <h3>Events & Programme</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-flower"></i>
                    </a>
                    <a href="category.html">
                        <h3>Beauty & Spa</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Category Area End -->

<!-- Place List Area -->
<section class="place-list-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>Events Lists</span>
            <h2>The Latest Events Added</h2>
        </div>
        <div class="row  pt-45">
            @forelse ($recentEvent as $event)
                <div class="col-lg-4 place-list-item">
                    <div class="images">
                        <a href="{{ route('events.show', $event->slug) }}" class="images-list">
                            <img src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                        </a>
                        <div class="place-tag"> 
                            <h3 class="title"><a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a></h3>
                        </div>
                    </div>

                    <div class="content">
                        <a href="{{ route('events.show', $event->slug) }}">
                            <h3>{{ $event->title }}</h3>
                        </a> 
                        <p>
                            {!! Str::limit($event->content, 60) !!}
                        </p>

                    </div>
                </div>

            @empty
                <p>No data available</p>    
            @endforelse
        </div>
    </div>
</section>
<!-- Place List Area End -->




<!-- Video Area -->
<div class="video-area video-area-bg">
    <div class="container"> 
        <div class="video-content">
            <h2>Are You  Ready To Start Your Journey?</h2>
            <a href="{{ route('register') }}" class="default-btn border-radius">
                Sign up
                <i class='bx bx-plus'></i>
            </a>
        </div>
    </div>
</div>
<!-- Video Area End -->

<!-- Counter Area -->
<div class="counter-area">
    <div class="container">
        <div class="counter-bg">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="single-counter">
                        <h3>1254</h3>
                        <span>Women Empowered Globally</span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="single-counter">
                        <h3>23165</h3>
                        <span>Resources Accessed by Members</span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="single-counter">
                        <h3>4563</h3>
                        <span>Awards Celebrating Excellence</span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="single-counter">
                        <h3>880</h3>
                        <span>Successful Mentorship Connections</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Area End -->

<!-- Place Area -->
<div class="place-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-md-6">
                <div class="section-title mb-45">
                    <span>Blog</span>
                    <h2>Most Popular Blog</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="place-btn">
                    <a href="{{ route('home.pages', 'blog') }}" class="default-btn border-radius">
                        Check out all Blog
                        <i class='bx bx-plus'></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row pt-45">
            @forelse ($recentBlog as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <a href="{{ route('blog.detail', $blog->slug) }}">
                            <img src="{{ asset($blog->image) }}" alt="Images">
                        </a> 
                        <div class="content" >
                            <span>{{ $blog->created_at->format('F d, Y') }}</a></span>
                            <h3 >
                                <a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
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
<!-- Place Area End -->


@include('home.pages.testimonial')

    
@endsection