@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <!-- dashboard container -->
        <div class="dashboard__container dashboard__chat--container d-flex">
           
            <div class="chat__inbox">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="chat">
                        <div class="chat__inbox--content">
                            <div class="chat__inbox--header d-flex align-items-center justify-content-between">
                                <h2 class="chat__inbox--header__title">Chats</h2>
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
                                    
                                    <li class="chat__inbox--menu__list">
                                        <a class="chat__inbox--menu__link" href="#">
                                            <div class="chat__inbox--menu__wrapper d-flex justify-content-between">
                                                <div class="chat__inbox--author d-flex align-items-center">
                                                    <div class="chat__inbox--author__thumbnail">
                                                        <img src="./assets/img/dashboard/inbox-author9.png" alt="img">
                                                        <span class="chat__inbox--author__badge"></span>
                                                    </div>
                                                    <div class="chat__inbox--author__content">
                                                        <h3 class="chat__inbox--author--name">Pope Johnson</h3>
                                                        <p class="chat__inbox--author__desc active">You are need to be appreacia</p>
                                                    </div>
                                                </div>
                                                <span class="chat__inbox--date-time">15 Jan</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="chat__inbox--menu__list">
                                        <a class="chat__inbox--menu__link" href="#">
                                            <div class="chat__inbox--menu__wrapper d-flex justify-content-between">
                                                <div class="chat__inbox--author d-flex align-items-center">
                                                    <div class="chat__inbox--author__thumbnail">
                                                        <img src="./assets/img/dashboard/inbox-author2.png" alt="img">
                                                        <span class="chat__inbox--author__badge"></span>
                                                    </div>
                                                    <div class="chat__inbox--author__content">
                                                        <h3 class="chat__inbox--author--name">Kara Miller</h3>
                                                        <p class="chat__inbox--author__desc">Hey, how's it going?</p>
                                                    </div>
                                                </div>
                                                <span class="chat__inbox--date-time">1:32PM</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="chat__message--box">
                <div class="chat__message--header d-flex align-items-center justify-content-between">
                    <div class="chat__message--author d-flex align-items-center">
                        <div class="chat__message--author__thumbnail">
                            <img src="./assets/img/dashboard/message-author.png" alt="img">
                            <span class="chat__message--author__badge"></span>
                        </div>
                        <div class="chat__message--author__text">
                            <h3 class="chat__message--author__title">Marie Prohaska</h3>
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
                    <div class="chat__message--list message__in">
                        <span class="chatting__message--date">Tues 23:14</span>
                        <div class="chat__message--list__inner">
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author.png" alt="img">
                            </div>
                            <div class="chatting__message--content">
                                <div class="chatting__message--text">
                                    <p class="chatting__message--desc">Nice to meet you</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="chat__message--list message__out">
                        <div class="chat__message--list__inner">
                            <div class="message__out--content">
                                <div class="message__out--text">
                                    <p class="message__out--desc">It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout</p>
                                </div>
                                <span class="message__out--author">Sent by <span>Rïm Öń</span></span>
                                <span class="chatting__message--date">21:05</span>
                            </div>
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author2.png" alt="img">
                            </div>
                        </div>
                       
                    </div>
                    <div class="chat__message--list message__in">
                        <span class="chatting__message--date">Fri 23:14</span>
                        <div class="chat__message--list__inner">
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author.png" alt="img">
                            </div>
                            <div class="chatting__message--content">
                                <div class="chatting__message--text">
                                    <p class="chatting__message--desc line1">Who are you ?</p> <br>
                                    <p class="chatting__message--desc line2">I don't know anyone named jeremiah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat__message--list message__out">
                        <div class="chat__message--list__inner">
                            <div class="message__out--content">
                                <div class="message__out--text">
                                    <p class="message__out--desc">Some of the recent images taken are nice 👌</p>
                                </div>
                                <span class="message__out--author">Sent by <span>Rïm Öń</span></span>
                                <span class="chatting__message--date">17:05</span>
                            </div>
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author2.png" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="chat__message--list message__in">
                        <span class="chatting__message--date">Sun 19:14</span>
                        <div class="chat__message--list__inner">
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author.png" alt="img">
                            </div>
                            <div class="chatting__message--content">
                                <div class="chatting__message--text">
                                    <p class="chatting__message--desc">Here are some of them have a look</p>
                                </div>
                                <div class="chatting__clint--display">
                                    <img src="./assets/img/dashboard/clint-thumbnail.png" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat__message--list message__out">
                        <div class="chat__message--list__inner">
                            <div class="message__out--content">
                                <div class="message__out--text">
                                    <p class="message__out--desc">Sorry, William. O.K. We have a few things to talk about today. would you
                                        like to give your report.</p>
                                </div>
                                <span class="message__out--author">Sent by <span>Rïm Öń</span></span>
                                <span class="chatting__message--date">15:05</span>
                            </div>
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author2.png" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="chat__message--list message__in">
                        <span class="chatting__message--date">Tues 23:14</span>
                        <div class="chat__message--list__inner">
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author.png" alt="img">
                            </div>
                            <div class="chatting__message--content">
                                <div class="chatting__message--text">
                                    <p class="chatting__message--desc">Yes, thank you 🤩. I have a sales graph I would like to show everyone. This
                                        shows how well we are selling our products this year.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat__message--list message__out">
                        <div class="chat__message--list__inner">
                            <div class="message__out--content">
                                <div class="message__out--text">
                                    <p class="message__out--desc">Sorry, William. O.K. We have a few things to talk about today. would you
                                        like to give your report.</p>
                                </div>
                                <span class="message__out--author">Sent by <span>Rïm Öń</span></span>
                                <span class="chatting__message--date">15:05</span>
                            </div>
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author2.png" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="chat__message--list message__in">
                        <span class="chatting__message--date">Tues 23:14</span>
                        <div class="chat__message--list__inner">
                            <div class="chatting__message--thumb">
                                <img src="./assets/img/dashboard/message-author.png" alt="img">
                            </div>
                            <div class="chatting__message--content">
                                <div class="chatting__message--text">
                                    <p class="chatting__message--desc">Yes, thank you 🤩. I have a sales graph I would like to show everyone. This
                                        shows how well we are selling our products this year.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat__message--footer">
                    <form class="chat__message--form" action="#">
                        <input class="chat__message--input__field" placeholder="Type a message here......." type="text">
                        <button class="chat__message--btn__option one" aria-label="chat button"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.00016 14.6666H10.0002C13.3335 14.6666 14.6668 13.3333 14.6668 9.99992V5.99992C14.6668 2.66659 13.3335 1.33325 10.0002 1.33325H6.00016C2.66683 1.33325 1.3335 2.66659 1.3335 5.99992V9.99992C1.3335 13.3333 2.66683 14.6666 6.00016 14.6666Z" stroke="currentColor" stroke-opacity="0.9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.3335 6.5C10.8858 6.5 11.3335 6.05228 11.3335 5.5C11.3335 4.94772 10.8858 4.5 10.3335 4.5C9.78121 4.5 9.3335 4.94772 9.3335 5.5C9.3335 6.05228 9.78121 6.5 10.3335 6.5Z" stroke="currentColor" stroke-opacity="0.9" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.6665 6.5C6.21879 6.5 6.6665 6.05228 6.6665 5.5C6.6665 4.94772 6.21879 4.5 5.6665 4.5C5.11422 4.5 4.6665 4.94772 4.6665 5.5C4.6665 6.05228 5.11422 6.5 5.6665 6.5Z" stroke="currentColor" stroke-opacity="0.9" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.6 8.8667H10.4C10.7333 8.8667 11 9.13337 11 9.4667C11 11.1267 9.66 12.4667 8 12.4667C6.34 12.4667 5 11.1267 5 9.4667C5 9.13337 5.26667 8.8667 5.6 8.8667Z" stroke="currentColor" stroke-opacity="0.9" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button class="chat__message--btn__option two" aria-label="chat button"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.22012 8.09995L6.57345 9.74661C5.66012 10.6599 5.66012 12.1333 6.57345 13.0466C7.48678 13.9599 8.96012 13.9599 9.87345 13.0466L12.4668 10.4533C14.2868 8.63328 14.2868 5.67328 12.4668 3.85328C10.6468 2.03328 7.68678 2.03328 5.86678 3.85328L3.04012 6.67995C1.48012 8.23995 1.48012 10.7733 3.04012 12.3399" stroke="currentColor" stroke-opacity="0.9" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                    
                        </button>
                        <button class="chat__message--btn__option three" aria-label="chat button"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00016 10.3333C9.4735 10.3333 10.6668 9.13992 10.6668 7.66659V3.99992C10.6668 2.52659 9.4735 1.33325 8.00016 1.33325C6.52683 1.33325 5.3335 2.52659 5.3335 3.99992V7.66659C5.3335 9.13992 6.52683 10.3333 8.00016 10.3333Z" stroke="currentColor" stroke-opacity="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.8999 6.43335V7.56668C2.8999 10.38 5.18657 12.6667 7.9999 12.6667C10.8132 12.6667 13.0999 10.38 13.0999 7.56668V6.43335" stroke="currentColor" stroke-opacity="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.07324 4.28658C7.67324 4.06658 8.32658 4.06658 8.92658 4.28658" stroke="currentColor" stroke-opacity="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.4668 5.69988C7.82013 5.60655 8.1868 5.60655 8.54013 5.69988" stroke="currentColor" stroke-opacity="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 12.6667V14.6667" stroke="currentColor" stroke-opacity="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                                                       
                        </button>
                    </form>
                </div>
            </div>
         
        </div>
        <!-- dashboard container .\ -->

        
        </main>
    </div>
@endsection



