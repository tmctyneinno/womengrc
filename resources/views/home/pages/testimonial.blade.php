<!-- Testimonial Area -->
@php
    // Cache translations for 24 hours
    $testimonialSectionTitle = cache()->remember('testimonial_section_title_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Testimonials', app()->getLocale()) 
               ?: 'Testimonials';
    });
    $testimonialSectionSubtitle = cache()->remember('testimonial_section_subtitle_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('What Our Clients Say', app()->getLocale()) 
               ?: 'What Our Clients Say';
    });
@endphp
<section class="testimonial-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>{{ $testimonialSectionTitle }}</span>
            <h2>{{ $testimonialSectionSubtitle }}</h2>
        </div>
 
        <div class="testimonial-slider owl-carousel owl-theme">
            @forelse ($testimonials as $item)
                @php
                    // Single cache call for all testimonial item translations
                    $itemTranslations = cache()->remember("testimonial_item_{$item->id}_translations_".app()->getLocale(), 86400, function() use ($item) {
                        return [
                            'title'        => GoogleTranslate::trans($item->title ?? '', app()->getLocale()) ?: ($item->title ?? ''),
                            'author_title' => GoogleTranslate::trans($item->author_title ?? '', app()->getLocale()) ?: ($item->author_title ?? ''),
                            'content'      => GoogleTranslate::trans(Str::limit(strip_tags($item->content ?? ''), 150), app()->getLocale()) ?: Str::limit(strip_tags($item->content ?? ''), 150),

                            // 'author_image_alt' => GoogleTranslate::trans($item->author_title.' testimonial photo', app()->getLocale()) ?: $item->author_title.' testimonial photo' // Example if an author image was present
                        ];
                    });
                @endphp
                <div class="testimonial-item testimonial-item-bg">
                    <h3>{{ $itemTranslations['title'] }}</h3>
                    <span>{{ $itemTranslations['author_title'] }}</span>
                    <p>
                        {{ $itemTranslations['content'] }}
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
                @php
                    $noTestimonialsText = cache()->remember('no_testimonials_text_'.app()->getLocale(), 86400, function() {
                        return GoogleTranslate::trans('No testimonials available at the moment.', app()->getLocale()) ?: 'No testimonials available at the moment.';
                    });
                @endphp
                <div class="col-12">
                    <p class="text-center">{{ $noTestimonialsText }}</p>
                </div>
            @endforelse

            

            
        </div>
    </div>
</section>
<!-- Testimonial Area End -->
