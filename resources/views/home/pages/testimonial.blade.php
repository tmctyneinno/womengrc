<!-- Testimonial Area -->

<section class="testimonial-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>Testimonials</span>
            <h2>What Our Clients Say</h2>
        </div>
 
        <div class="testimonial-slider owl-carousel owl-theme">
            @forelse ($testimonials as $item)
                
                <div class="testimonial-item testimonial-item-bg">
                    <h3>{{ $item->title }}</h3>
                    <span>{{ $item->author_title }}</span>
                    <p>
                        {{ Str::limit(strip_tags($item->content ?? ''), 150) }}
                    </p>
                    <ul class="rating">
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                        </li>
                    </ul>

                    <div class="testimonial-top">
                        <i class='bx bxs-quote-left'></i>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">{{ 'No testimonials available at the moment.' }}</p>
                </div>
            @endforelse

            

            
        </div>
    </div>
</section>
<!-- Testimonial Area End -->
