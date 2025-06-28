@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        @php
            // Cache translations for the inner banner and initiatives section
            $initiativesPageTitle = 'Initiatives';
            $homeText = 'Home';
            $pagesText = 'Pages';
            $keyInitiativesSubtitle = 'Key Initiatives';

            // Handle header image with fallback
            $headerImageUrl = (isset($aboutUs) && !empty($aboutUs->header_image)) ? asset($aboutUs->header_image) : asset('images/default-header-placeholder.jpg'); // Fallback header image

            // Define initiative items
            $initiativeItems = [
                [
                    'route_param' => 'mentorship-sponsorship-program',
                    'image_src' => 'assets/images/initialtive1.png',
                    'alt_key' => 'mentorship_alt',
                    'alt_default' => 'Mentorship Sponsorship Program',
                    'title_key' => 'mentorship_title',
                    'title_default' => 'Mentorship Sponsorship Program',
                ],
                [
                    'route_param' => 'training-certification',
                    'image_src' => 'assets/images/initialtive2.png',
                    'alt_key' => 'training_alt',
                    'alt_default' => 'Training Certification Program', // Made slightly more descriptive
                    'title_key' => 'training_title',
                    'title_default' => 'Training Certification',
                ],
                [
                    'route_param' => 'annual-summit-conferences',
                    'image_src' => 'assets/images/initialtive3.png',
                    'alt_key' => 'summit_alt',
                    'alt_default' => 'Annual Summit Conferences',
                    'title_key' => 'summit_title',
                    'title_default' => 'Annual Summit Conferences',
                ],
                [
                    'route_param' => 'advocacy-policy-influence',
                    'image_src' => 'assets/images/initialtive4.png',
                    'alt_key' => 'advocacy_alt',
                    'alt_default' => 'Advocacy Policy Influence',
                    'title_key' => 'advocacy_title',
                    'title_default' => 'Advocacy Policy Influence',
                ],
                [
                    'route_param' => 'scholarships-grants',
                    'image_src' => 'assets/images/initialtive5.png',
                    'alt_key' => 'scholarships_alt',
                    'alt_default' => 'Scholarships Grants',
                    'title_key' => 'scholarships_title',
                    'title_default' => 'Scholarships Grants',
                ],
            ];

            // Translate initiative items
            foreach ($initiativeItems as &$item) { // Use reference to modify array directly
                $item['translated_alt'] = $item['alt_default'];
                $item['translated_title'] = $item['title_default'];
            }
            unset($item); // Unset reference to last item

        @endphp
        <div class="inner-banner"  style="background-image: url({{ $headerImageUrl }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>{{ $initiativesPageTitle }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">{{ $homeText }}</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>{{ $pagesText }}</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>{{ $initiativesPageTitle }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->
        <!-- Category Area -->
        <section class="category-area pt-100 pb-70">
            <div class="container">
                <div class="section-title ">
                    <span>{{ $keyInitiativesSubtitle }}</span>
                </div>
                
                <div class="row pt-45">
                    @foreach ($initiativeItems as $item)
                        <div class="col-lg-4 col-sm-6">
                            <div class="category-box">
                                {{-- Assuming the first link is for the image itself or a direct page, and the second for the text link --}}
                                {{-- You might want to consolidate these if they point to the same place --}}
                                <a href="{{ route('home.pages', $item['route_param']) }}"> {{-- Changed route to home.pages for consistency --}}
                                    <img src="{{ asset($item['image_src']) }}" alt="{{ $item['translated_alt'] }}" style="width: 100px; height: 100px;">
                                </a>
                                
                                <a href="{{ route('home.pages', $item['route_param']) }}">
                                    <h3>{{ $item['translated_title'] }}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Category Area End -->
@endsection