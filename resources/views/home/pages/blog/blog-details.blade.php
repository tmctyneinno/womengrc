@extends('layouts.app')



@section('content')

 <!-- Inner Banner -->
 <div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/conference.jpg') }});">
    <div class="container">
        <div class="inner-banner-title text-center">
            <h3>{!! Str::limit($postItem->title, 30, '...') !!}</h3>
            <p>Empowering Women, Transforming Leadership, Driving Innovation</p>
        </div>
        
        <div class="banner-list">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <ul class="list">
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li class="active">Blog Details</li>
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

<!-- Blog Details Area -->
<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-article">
                    <div class="article-comment-area">
                        <div class="article-img">
                            <img src="{{ asset($postItem->image)}}" class="w-100" style="object-fit: cover; width: 100%; height: 600px;" alt="business-area">

                        </div>

                        <ul class="article-comment">
                            <li>
                                <div class="image">
                                 </div>
                                <div class="content">
                                    <h3>By Admin</h3>
                                    <span>{{ $postItem->created_at->format('F d, Y') }}</span>
                                </div>
                            </li>

                            <li>
                                <div class="content-list">
                                    
                                </div>
                            </li>

                            <li>
                                <div class="content-list">
                                   
                                </div>
                            </li>
                        </ul>
                    </div>
            
                    <div class="article-content">
                        <h3>{{$postItem->title }} </h3>
                       
                        <div class="content-text">
                            {!! $postItem->content !!} 
                        </div>
                    </div>

                  

                    <div class="comments-wrap">
                        <h3 class="title">Comments ({{ $postItem->comments->count()}})</h3>
                        <ul>
                            @foreach ($postItem->comments as $comment)
                                @include('home.pages.blog.comment', ['comment' => $comment])
                            
                            @endforeach

                        </ul>
                    </div>

                    <div class="comments-form">
                        <div class="contact-form">
                            <span>Reply</span>
                            <h2>Leave a Reply</h2>
                            
                            <form id="commentForm_{{ $postItem->id }}">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-user'></i>
                                            <input type="text" name="author_name" class="form-control" required data-error="Please enter name*" placeholder="Name*">
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-mail-send'></i>
                                            <input type="email" name="author_email" class="form-control" required data-error="Please enter your email" placeholder="Your Email Address*">
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <i class='bx bx-envelope'></i>
                                            <textarea name="content" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                            
                                    <input type="hidden" name="blog_id" value="{{ $postItem->id }}">
                                    <input type="hidden" name="parent_id" value="">
                            
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn border-radius">
                                            Post A Comment
                                            <i class='bx bx-plus'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script>
                                jQuery(document).ready(function ($) {
                                    $('[id^="commentForm_"]').submit(function(event) {
                                        event.preventDefault(); // Prevent the default form submission
                                        
                                        var formId = $(this).attr('id'); // Get the ID of the form being submitted
                                        
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is set for Ajax request
                                            }
                                        });
                                        
                                        const formData = new FormData(this); // Get the form data
                                        alert(formData);
                                        $.ajax({
                                            type: 'POST',
                                            url: '{{ route("comments.store") }}', // Ensure this route exists and is correct
                                            data: formData,
                                            dataType: 'json',
                                            processData: false,
                                            contentType: false,
                                            success: function(response) {
                                                toastr.success("Comment submitted successfully");
                                                setTimeout(function() {
                                                    window.location.reload(); // Refresh the page after 2 seconds
                                                }, 2000); 
                            
                                                $('#' + formId)[0].reset(); // Reset the form after successful submission
                                            },
                                            error: function(error) {
                                                toastr.error('Error submitting comment. Please check your input.');
                                                console.error('Error:', error);
                                            }
                                        });
                                    });
                                });
                            </script>
                            


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-widget-left">
                    <div class="blog-widget ">
                        <h3 class="title">Search</h3>
                        <div class="search-widget">
                            <form class="search-form">
                                <input type="search" class="form-control" placeholder="Search...">
                                <button type="submit">
                                    <i class="bx bx-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Navigation</h3>
                        <div class="widget_categories">
                            <ul>
                                @forelse ($randomMenuItems as $menuItem)
                                    <li>
                                        <a href="{{ route('home.pages', $menuItem->slug) }}">{{ $menuItem->name }} </a>
                                    </li>
                                @empty
                                    <p>No data found</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Related Posts</h3>
                        <div class="widget-popular-post">
                            @forelse ($relatedPost as $relatedPost)
                                <article class="item"> 
                                    <a href="{{ route('blog.detail', $relatedPost->slug ) }}" class="thumb">
                                        <span 
                                        style="background-image: url({{ asset($relatedPost->image)}});"
                                        class="full-image cover" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <span>
                                            {{ $relatedPost->created_at->format('F d, Y') }}
                                        </span>
                                        <h4 class="title-text">
                                            <a href="{{ route('blog.detail', $relatedPost->slug) }}">
                                                {{ $relatedPost->title }}
                                            </a> 
                                        </h4>
                                    </div>
                                </article>
                                <!-- single categoris End -->
                            @empty
                                <p>No data found</p>
                            @endforelse

                           
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Related Events</h3>
                        <div class="widget-popular-post">
                            @forelse ($recentEvent as $relatedEvent)
                                <article class="item">
                                    <a href="{{ route('events.show', $relatedEvent->slug) }}" class="thumb">
                                        <span 
                                        style="background-image: url({{ asset($relatedEvent->image)}});"
                                        class="full-image cover" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <span>
                                            {{ $relatedEvent->created_at->format('F d, Y') }}
                                        </span>
                                        <h4 class="title-text">
                                            <a href="{{ route('events.show', $relatedEvent->slug) }}">
                                                {{ $relatedEvent->title }}
                                            </a> 
                                        </h4>
                                    </div>
                                </article>
                                <!-- single categoris End -->
                            @empty
                                <p>No data found</p>
                            @endforelse

                           
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Join us</h3>
                        <div class="widget-popular-post">
                            <div class="content">
                                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                                <div class="elfsight-app-a7145314-87cd-41f5-b577-b75e852aaf99" data-elfsight-app-lazy></div>
                            </div> 
                           
                        </div>
                    </div>

                  


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Details Area End -->


@endsection

