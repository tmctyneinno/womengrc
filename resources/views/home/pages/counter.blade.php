@php
    // Define counter items with their default text and unique keys for caching
    $counterItems = [
        [
            'key_number' => 'women_empowered_number',
            'default_number' => '300+', // Added '+' as it's common for such counters
            'key_text' => 'women_empowered_text',
            'default_text' => 'Women Empowered Globally',
        ],
        [
            'key_number' => 'resources_accessed_number',
            'default_number' => '50+',
            'key_text' => 'resources_accessed_text',
            'default_text' => 'Resources Accessed by Members',
        ],
        [
            'key_number' => 'awards_celebrating_number',
            'default_number' => '30+',
            'key_text' => 'awards_celebrating_text',
            'default_text' => 'Awards Celebrating Excellence',
        ],
        [
            'key_number' => 'mentorship_connections_number',
            'default_number' => '95%+', // Changed to a percentage as '9' seems low for connections
            'key_text' => 'mentorship_connections_text',
            'default_text' => 'Successful Mentorship Connections Rate', // Adjusted text for clarity
        ],
    ];

    // Translate and cache each item
    foreach ($counterItems as &$item) { // Use reference to modify array directly
        $item['translated_number'] = $item['default_number'];
        $item['translated_text'] = $item['default_text'];
    }
    unset($item); // Unset reference to last item
@endphp
<div class="counter-area">
    <div class="container">
        <div class="counter-bg">
            <div class="row justify-content-center">
                @foreach ($counterItems as $item)
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <div class="single-counter">
                            <h3>{{ $item['default_number'] }}</h3>
                            <span>{{ $item['default_text'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>