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
                    <h3>{{ $item->author_name }}</h3>
                    <span>{{ $item->author_title }}</span>
                    <p>
                        {!! $item->content !!}
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
                
            @endforelse

            

            
        </div>
    </div>
</section>
<!-- Testimonial Area End -->
