<!-- Place List Area -->
@php
    // Cache translations for 24 hours
    $jointheConversation = cache()->remember('join_the_conversation'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Join the Conversation', app()->getLocale()) 
               ?: 'Join the Conversation';
    });
    $socialmedia = cache()->remember('socialmedia_text_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('See the latest from our community on social media', app()->getLocale()) 
               ?: 'See the latest from our community on social media';
    });
@endphp
<section class="place-list-area pt-50 pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>{{ $jointheConversation }}</span>
            <h2>{{ $socialmedia }}</h2>
        </div>
        <div class="row  pt-45">
           
            <div class="col-lg-4 place-list-item">
                <div class="content">
                    <script src="https://static.elfsight.com/platform/platform.js" async></script>
                    <div class="elfsight-app-0955ada4-fab8-4640-ad23-4ee8e059e624" data-elfsight-app-lazy></div>
                </div> 
            </div>

            <div class="col-lg-4 place-list-item">
                <div class="content">
                    <script src="https://static.elfsight.com/platform/platform.js" async></script>
                    <div class="elfsight-app-a4f8d829-59f3-49f0-9f85-91d2248da1cd" data-elfsight-app-lazy></div>
                </div>
                
            </div>

            <div class="col-lg-4 place-list-item">
                <div class="content">
                    <script src="https://static.elfsight.com/platform/platform.js" async></script>
                    <div class="elfsight-app-a7145314-87cd-41f5-b577-b75e852aaf99" data-elfsight-app-lazy></div>
                </div> 
            </div>

        </div>
    </div>
</section>
<!-- Place List Area End -->