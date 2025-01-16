<style>
    .uploaded-file-image {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
    }

    .uploaded-file-link {
        display: inline-block;
        margin-top: 10px;
        color: #007bff;
        text-decoration: underline;
    }

</style>
<div>
    
    <div class="page__body--wrapper" id="dashbody__page--body__wrapper">
        <main class="main__content_wrapper">
            <!-- dashboard container -->
            <div class="dashboard__container dashboard__chat--container d-flex">
            
                <div class="chat__inbox">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="chat">
                            <div class="chat__inbox--content">
                                <div class="chat__inbox--header d-flex align-items-center justify-content-between">
                                    <h2 class="chat__inbox--header__title">Chats {{ $acceptedUsers->find($mentorId)->name ??''}} </h2>
                                    <button class="chat__inbox--popup__btn" data-bs-toggle="modal" data-bs-target="#modaladdcontact" aria-label="popup button"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.99984 18.3334C14.5832 18.3334 18.3332 14.5834 18.3332 10.0001C18.3332 5.41675 14.5832 1.66675 9.99984 1.66675C5.4165 1.66675 1.6665 5.41675 1.6665 10.0001C1.6665 14.5834 5.4165 18.3334 9.99984 18.3334Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.6665 10H13.3332" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 13.3334V6.66675" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="chat__inbox--search">
                                    <form action="#">
                                        <input class="chat__inbox--search__input" placeholder="Search Chat ...." type="text">
                                        <button class="chat__inbox--search__btn"  aria-label="search button" type="submit"><svg width="12" height="12" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79171 8.74992C6.97783 8.74992 8.75004 6.97771 8.75004 4.79159C8.75004 2.60546 6.97783 0.833252 4.79171 0.833252C2.60558 0.833252 0.833374 2.60546 0.833374 4.79159C0.833374 6.97771 2.60558 8.74992 4.79171 8.74992Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.16671 9.16659L8.33337 8.33325" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="chat__inbox--wrapper">
                                    <ul class="chat__inbox--menu">
                                        <li class="chat__inbox--menu__list"><span class="chat__inbox--menu__title">Recent Chats</span></li>
                                        @forelse($acceptedUsers as $user)
                                            <li class="chat__inbox--menu__list">
                                                <a class="chat__inbox--menu__link" href="{{ route('user.chat.show', ['mentorId' => $user->id]) }}">
                                                    <div class="chat__inbox--menu__wrapper d-flex justify-content-between">
                                                        <div class="chat__inbox--author d-flex align-items-center">
                                                            <div class="chat__inbox--author__thumbnail">
                                                                <img 
                                                                src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('assets/admin/img/dashboard/avater.jpg') }}" 
                                                                style="border-radius:50px; max-height: 100%; max-width:100%; width:30px; height:30px; object-fit: cover;"
                                                                alt="img">
                                                                <span class="chat__inbox--author__badge"></span>
                                                            </div>
                                                            <div class="chat__inbox--author__content">
                                                                <h3 class="chat__inbox--author--name">{{ $user->name }}</h3>
                                                                <p class="chat__inbox--author__desc active">
                                                                    @php
                                                                        $latestMessage = $user->messages()
                                                                            ->where(function ($query) use ($user) {
                                                                                $query->where('user_id', Auth::id())
                                                                                    ->where('receiver_id', $user->id);
                                                                            })
                                                                            ->orWhere(function ($query) use ($user) {
                                                                                $query->where('user_id', $user->id)
                                                                                    ->where('receiver_id', Auth::id());
                                                                            })
                                                                            ->latest()
                                                                            ->first();
                                                                    @endphp
                                        
                                                                    @if ($latestMessage)
                                                                        {{ $latestMessage->content }}
                                                                    @else
                                                                        No messages yet
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <span class="chat__inbox--date-time">
                                                            {{ $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->format('d M Y, h:i A') : 'Never logged in' }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            <li>
                                                <div class="chat__inbox--author__content">
                                                    <p class="chat__inbox--author__desc active">
                                                        No mentor has been added. Please select a mentor to proceed.
                                                    </p>
                                                </div>
                                            </li>
                                        @endforelse

                                       
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                @if($mentorId)
                    <div class="chat__message--box">
                        <div class="chat__message--header d-flex align-items-center justify-content-between">
                            <div class="chat__message--author d-flex align-items-center">
                                <div class="chat__message--author__thumbnail">
                                    <img 
                                    style="border-radius:50px; max-height: 100%; max-width:100%; width:30px; height:30px;  object-fit: cover;"
                                    src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('assets/admin/img/dashboard/avater.jpg') }}" 
                                    alt="img">
                                    <span class="chat__message--author__badge"></span>
                                </div>
                                <div class="chat__message--author__text">
                                    <h3 class="chat__message--author__title">{{ $acceptedUsers->find($mentorId)->name }} </h3>
                                    <span class="chat__message--author__subtitle">Online</span>
                                </div>
                            </div>
                            <ul class="chat__message--account d-flex">
                                <li class="chat__message--account__items"><a class="chat__message--account__btn"  data-bs-toggle="modal" data-bs-target="#modaladdcalls" href="#"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.4775 13.7475C16.4775 14.0175 16.4175 14.295 16.29 14.565C16.1625 14.835 15.9975 15.09 15.78 15.33C15.4125 15.735 15.0075 16.0275 14.55 16.215C14.1 16.4025 13.6125 16.5 13.0875 16.5C12.3225 16.5 11.505 16.32 10.6425 15.9525C9.78 15.585 8.9175 15.09 8.0625 14.4675C7.2 13.8375 6.3825 13.14 5.6025 12.3675C4.83 11.5875 4.1325 10.77 3.51 9.915C2.895 9.06 2.4 8.205 2.04 7.3575C1.68 6.5025 1.5 5.685 1.5 4.905C1.5 4.395 1.59 3.9075 1.77 3.4575C1.95 3 2.235 2.58 2.6325 2.205C3.1125 1.7325 3.6375 1.5 4.1925 1.5C4.4025 1.5 4.6125 1.545 4.8 1.635C4.995 1.725 5.1675 1.86 5.3025 2.055L7.0425 4.5075C7.1775 4.695 7.275 4.8675 7.3425 5.0325C7.41 5.19 7.4475 5.3475 7.4475 5.49C7.4475 5.67 7.395 5.85 7.29 6.0225C7.1925 6.195 7.05 6.375 6.87 6.555L6.3 7.1475C6.2175 7.23 6.18 7.3275 6.18 7.4475C6.18 7.5075 6.1875 7.56 6.2025 7.62C6.225 7.68 6.2475 7.725 6.2625 7.77C6.3975 8.0175 6.63 8.34 6.96 8.73C7.2975 9.12 7.6575 9.5175 8.0475 9.915C8.4525 10.3125 8.8425 10.68 9.24 11.0175C9.63 11.3475 9.9525 11.5725 10.2075 11.7075C10.245 11.7225 10.29 11.745 10.3425 11.7675C10.4025 11.79 10.4625 11.7975 10.53 11.7975C10.6575 11.7975 10.755 11.7525 10.8375 11.67L11.4075 11.1075C11.595 10.92 11.775 10.7775 11.9475 10.6875C12.12 10.5825 12.2925 10.53 12.48 10.53C12.6225 10.53 12.7725 10.56 12.9375 10.6275C13.1025 10.695 13.275 10.7925 13.4625 10.92L15.945 12.6825C16.14 12.8175 16.275 12.975 16.3575 13.1625C16.4325 13.35 16.4775 13.5375 16.4775 13.7475Z" stroke="currentColor" stroke-miterlimit="10"/>
                                    </svg>
                                    </a>
                                </li>
                                <li class="chat__message--account__items"><a class="chat__message--account__btn" href="#"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.3975 15.3151H4.6575C2.2875 15.3151 1.5 13.7401 1.5 12.1576V5.84256C1.5 3.47256 2.2875 2.68506 4.6575 2.68506H9.3975C11.7675 2.68506 12.555 3.47256 12.555 5.84256V12.1576C12.555 14.5276 11.76 15.3151 9.3975 15.3151Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.6402 12.8251L12.5552 11.3626V6.6301L14.6402 5.1676C15.6602 4.4551 16.5002 4.8901 16.5002 6.1426V11.8576C16.5002 13.1101 15.6602 13.5451 14.6402 12.8251Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.625 8.25C9.24632 8.25 9.75 7.74632 9.75 7.125C9.75 6.50368 9.24632 6 8.625 6C8.00368 6 7.5 6.50368 7.5 7.125C7.5 7.74632 8.00368 8.25 8.625 8.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                
                                    </a>
                                </li>
                                <li class="chat__message--account__items"><a class="chat__message--account__btn" href="#"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.625 15.75C12.56 15.75 15.75 12.56 15.75 8.625C15.75 4.68997 12.56 1.5 8.625 1.5C4.68997 1.5 1.5 4.68997 1.5 8.625C1.5 12.56 4.68997 15.75 8.625 15.75Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.5 16.5L15 15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                                                
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="chat__message--wrapper">
                            <div>
                                {{-- {{ Auth::user()->id }} --}}
                                @foreach($messages as $message)
                                    @if($message->user_id !=Auth::user()->id)
                                        {{-- <p>{{ $message->message }}</p> --}}
                                        <div class="chat__message--list message__out">
                                            <div class="chat__message--list__inner">
                                                <div class="message__out--content">
                                                    <div class="message__out--text">
                                                        @if($message->message)
                                                            <p  class="chatting__message--desc">{{ $message->message }}</p>
                                                        @endif
                                                        <br>
                                                        @if($message->file_path)
                                                            @if (str_starts_with($message->file_type, 'image/'))
                                                                <img src="{{ $message->file_path }}" alt="Uploaded Image" style="max-width: 100px;">
                                                            @else
                                                                <a href="{{ $message->file_path }}" target="_blank">Download File</a>
                                                            @endif
                                                        @endif
                                                    
                                                    </div>
                                                    <span class="message__out--author">Sent by <span>{{$message->user->name}}</span></span>
                                                    <span class="chatting__message--date">{{ $message->created_at->format('D h:i A') }}</span>
                                                </div>
                                                <div class="chatting__message--thumb">
                                                    <img 
                                                    src="{{ Auth::user()->profile_picture ? asset('storage/'.Auth::user()->profile_picture) : asset('assets/admin/img/dashboard/avater.jpg') }}" 
                                                    style="border-radius:50px; max-height: 100%; max-width:100%; width:30px; height:30px;  object-fit: cover;"
                                                   
                                                    alt="img">
                                                </div>
                                            </div>
                                        
                                        </div>
                                    @else
                                        {{-- <p>{{ $message->message }}</p> --}}
                                        <div class="chat__message--list message__in">
                                            <span class="chatting__message--date">{{ $message->created_at->format('D h:i A') }}</span>
                                            <div class="chat__message--list__inner">
                                                <div class="chatting__message--thumb">
                                                    <img 
                                                    src="{{ Auth::user()->profile_picture ? asset('storage/'.Auth::user()->profile_picture) : asset('assets/admin/img/dashboard/avater.jpg') }}" 
                                                    style="border-radius:50px; max-height: 100%; max-width:100%; width:30px; height:30px;  object-fit: cover;"
                                                    alt="img">
                                                </div>
                                                <div class="chatting__message--content">
                                                    <div class="chatting__message--text">
                                                        @if($message->message)
                                                            <p  class="chatting__message--desc">{{ $message->message }}</p>
                                                        @endif
                                                        <br>
                                                        <!-- Display file if available -->
                                                        @if($message->file_path)
                                                            @if (str_starts_with($message->file_type, 'image/'))
                                                                <img src="{{ $message->file_path }}" alt="Uploaded Image" style="max-width: 100px;">
                                                            @else
                                                                <a href="{{ $message->file_path }}" target="_blank">Download File</a>
                                                            @endif
                                                        @endif
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    
                                @endforeach
                            </div>

                        </div>
                        <div class="chat__message--footer">
                            <form class="chat__message--form" wire:submit.prevent="sendMessage">
                                <input 
                                    class="chat__message--input__field" 
                                    type="text" 
                                    wire:model.defer="message" 
                                    placeholder="Type your message..."
                                >
                            
                                <!-- File Upload Button -->
                                <button type="button" class="chat__message--btn__option two" aria-label="upload button">
                                    <label for="file-upload" style="cursor: pointer;">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.22012 8.09995L6.57345 9.74661C5.66012 10.6599 5.66012 12.1333 6.57345 13.0466C7.48678 13.9599 8.96012 13.9599 9.87345 13.0466L12.4668 10.4533C14.2868 8.63328 14.2868 5.67328 12.4668 3.85328C10.6468 2.03328 7.68678 2.03328 5.86678 3.85328L3.04012 6.67995C1.48012 8.23995 1.48012 10.7733 3.04012 12.3399" 
                                                stroke="currentColor" 
                                                stroke-opacity="0.9" 
                                                stroke-linecap="round" 
                                                stroke-linejoin="round" />
                                        </svg>
                                    </label>
                                    <input id="file-upload" type="file" wire:model="uploadedFile" style="display: none;" />
                                </button>
                            
                                <!-- Submit Button -->
                                <button class="chat__message--btn__option three" type="submit">Send</button>
                            </form>
                            
                        </div>
                    </div>
                @endif
            
            </div>
            <!-- dashboard container .\ -->

        </main>
    </div>
 

</div>
