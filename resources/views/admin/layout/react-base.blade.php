@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row wrapper">
            <aside class="col-2 aside">
                <a href="{{ route('admin.home') }}" class="title-home-link">Hand Made Admin</a>
                <div class="menu">
                    <a href="{{ route('admin.users') }}" class="menu-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg" class="menu-link-svg menu-link-svg_user">
                            <path d="M13.0061 0.5C9.56879 0.5 6.74817 3.31086 6.74817 6.74817C6.74817 10.1855 9.56879 13.0061 13.0061 13.0061C16.4434 13.0061 19.2518 10.1855 19.2518 6.74817C19.2518 3.31086 16.4434 0.5 13.0061 0.5ZM8.00317 14.2513C4.25037 14.2513 0.5 16.7516 0.5 20.4971V23.2757C0.738205 24.8386 1.75012 25.5024 3.00269 25.5H22.9998C24.2523 25.5025 25.0792 24.4568 25.5 23.2757V20.4971C25.5025 15.5015 21.7521 14.2513 17.9968 14.2513H8.00317Z" />
                        </svg>
                        Пользователи
                    </a>
                    <a href="{{ route('admin.categories') }}" class="menu-link {{ request()->routeIs('admin.categories') ? 'active' : '' }}">
                        <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" class="menu-link-svg">
                            <path d="M26.25 23.4375H13.125V25.3125H26.25V23.4375Z" />
                            <path d="M6.72207 24.375L4.30332 26.7937L5.6252 28.125L9.3752 24.375L5.6252 20.625L4.29395 21.9469L6.72207 24.375Z" />
                            <path d="M26.25 14.0625H13.125V15.9375H26.25V14.0625Z" />
                            <path d="M6.72207 15L4.30332 17.4187L5.6252 18.75L9.3752 15L5.6252 11.25L4.29395 12.5719L6.72207 15Z" />
                            <path d="M26.25 4.6875H13.125V6.5625H26.25V4.6875Z" />
                            <path d="M6.72207 5.625L4.30332 8.04375L5.6252 9.375L9.3752 5.625L5.6252 1.875L4.29395 3.19688L6.72207 5.625Z" />
                        </svg>
                        Категории
                    </a>
                    <a href="{{ route('admin.materials') }}" class="menu-link {{ request()->routeIs('admin.materials') ? 'active' : '' }}">
                        <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" class="menu-link-svg">
                            <path d="M20.1839 0.882355H6.06621C5.71518 0.882355 5.37854 1.0218 5.13033 1.27001C4.88212 1.51822 4.74268 1.85486 4.74268 2.20588V27.7941C4.74268 28.1451 4.88212 28.4818 5.13033 28.73C5.37854 28.9782 5.71518 29.1176 6.06621 29.1176H20.1839C20.5349 29.1176 20.8715 28.9782 21.1197 28.73C21.3679 28.4818 21.5074 28.1451 21.5074 27.7941V2.20588C21.5074 1.85486 21.3679 1.51822 21.1197 1.27001C20.8715 1.0218 20.5349 0.882355 20.1839 0.882355ZM20.625 27.7941C20.625 27.9111 20.5785 28.0233 20.4958 28.1061C20.4131 28.1888 20.3009 28.2353 20.1839 28.2353H6.06621C5.9492 28.2353 5.83698 28.1888 5.75425 28.1061C5.67151 28.0233 5.62503 27.9111 5.62503 27.7941V2.20588C5.62503 2.08888 5.67151 1.97666 5.75425 1.89393C5.83698 1.81119 5.9492 1.76471 6.06621 1.76471H20.1839C20.3009 1.76471 20.4131 1.81119 20.4958 1.89393C20.5785 1.97666 20.625 2.08888 20.625 2.20588V27.7941Z" />
                            <path d="M16.6544 4.41177C16.1309 4.41177 15.6191 4.56701 15.1838 4.85788C14.7485 5.14874 14.4092 5.56215 14.2088 6.04584C14.0085 6.52953 13.9561 7.06176 14.0582 7.57524C14.1603 8.08872 14.4124 8.56038 14.7826 8.93058C15.1528 9.30078 15.6245 9.55289 16.138 9.65503C16.6515 9.75716 17.1837 9.70474 17.6674 9.50439C18.1511 9.30404 18.5645 8.96476 18.8553 8.52945C19.1462 8.09415 19.3015 7.58237 19.3015 7.05883C19.3015 6.35678 19.0226 5.68349 18.5261 5.18707C18.0297 4.69065 17.3564 4.41177 16.6544 4.41177ZM16.6544 8.82353C16.3054 8.82353 15.9642 8.72004 15.674 8.52613C15.3838 8.33222 15.1576 8.05661 15.024 7.73415C14.8904 7.41169 14.8555 7.05687 14.9236 6.71455C14.9917 6.37223 15.1598 6.05779 15.4066 5.81099C15.6534 5.56419 15.9678 5.39612 16.3101 5.32803C16.6524 5.25994 17.0073 5.29488 17.3297 5.42845C17.6522 5.56202 17.9278 5.7882 18.1217 6.07841C18.3156 6.36861 18.4191 6.7098 18.4191 7.05883C18.4191 7.52686 18.2332 7.97572 17.9022 8.30666C17.5713 8.63761 17.1224 8.82353 16.6544 8.82353Z" />
                            <path d="M9.59579 4.41177C9.07225 4.41177 8.56047 4.56701 8.12516 4.85788C7.68986 5.14874 7.35058 5.56215 7.15023 6.04584C6.94988 6.52953 6.89746 7.06176 6.99959 7.57524C7.10173 8.08872 7.35384 8.56038 7.72404 8.93058C8.09423 9.30078 8.5659 9.55289 9.07938 9.65503C9.59285 9.75716 10.1251 9.70474 10.6088 9.50439C11.0925 9.30404 11.5059 8.96476 11.7967 8.52945C12.0876 8.09415 12.2428 7.58237 12.2428 7.05883C12.2428 6.35678 11.964 5.68349 11.4675 5.18707C10.9711 4.69065 10.2978 4.41177 9.59579 4.41177ZM9.59579 8.82353C9.24676 8.82353 8.90558 8.72004 8.61537 8.52613C8.32517 8.33222 8.09898 8.05661 7.96541 7.73415C7.83185 7.41169 7.7969 7.05687 7.86499 6.71455C7.93308 6.37223 8.10116 6.05779 8.34796 5.81099C8.59475 5.56419 8.90919 5.39612 9.25151 5.32803C9.59383 5.25994 9.94866 5.29488 10.2711 5.42845C10.5936 5.56202 10.8692 5.7882 11.0631 6.07841C11.257 6.36861 11.3605 6.7098 11.3605 7.05883C11.3605 7.52686 11.1746 7.97572 10.8436 8.30666C10.5127 8.63761 10.0638 8.82353 9.59579 8.82353Z" />
                            <path d="M16.6544 12.3529C16.1309 12.3529 15.6191 12.5082 15.1838 12.7991C14.7485 13.0899 14.4092 13.5033 14.2088 13.987C14.0085 14.4707 13.9561 15.0029 14.0582 15.5164C14.1603 16.0299 14.4124 16.5016 14.7826 16.8718C15.1528 17.242 15.6245 17.4941 16.138 17.5962C16.6515 17.6983 17.1837 17.6459 17.6674 17.4456C18.1511 17.2452 18.5645 16.9059 18.8553 16.4706C19.1462 16.0353 19.3015 15.5235 19.3015 15C19.3015 14.298 19.0226 13.6247 18.5261 13.1282C18.0297 12.6318 17.3564 12.3529 16.6544 12.3529ZM16.6544 16.7647C16.3054 16.7647 15.9642 16.6612 15.674 16.4673C15.3838 16.2734 15.1576 15.9978 15.024 15.6753C14.8904 15.3529 14.8555 14.998 14.9236 14.6557C14.9917 14.3134 15.1598 13.999 15.4066 13.7522C15.6534 13.5054 15.9678 13.3373 16.3101 13.2692C16.6524 13.2011 17.0073 13.2361 17.3297 13.3696C17.6522 13.5032 17.9278 13.7294 18.1217 14.0196C18.3156 14.3098 18.4191 14.651 18.4191 15C18.4191 15.468 18.2332 15.9169 17.9022 16.2478C17.5713 16.5788 17.1224 16.7647 16.6544 16.7647Z" />
                            <path d="M9.59579 12.3529C9.07225 12.3529 8.56047 12.5082 8.12516 12.7991C7.68986 13.0899 7.35058 13.5033 7.15023 13.987C6.94988 14.4707 6.89746 15.0029 6.99959 15.5164C7.10173 16.0299 7.35384 16.5016 7.72404 16.8718C8.09423 17.242 8.5659 17.4941 9.07938 17.5962C9.59285 17.6983 10.1251 17.6459 10.6088 17.4456C11.0925 17.2452 11.5059 16.9059 11.7967 16.4706C12.0876 16.0353 12.2428 15.5235 12.2428 15C12.2428 14.298 11.964 13.6247 11.4675 13.1282C10.9711 12.6318 10.2978 12.3529 9.59579 12.3529ZM9.59579 16.7647C9.24676 16.7647 8.90558 16.6612 8.61537 16.4673C8.32517 16.2734 8.09898 15.9978 7.96541 15.6753C7.83185 15.3529 7.7969 14.998 7.86499 14.6557C7.93308 14.3134 8.10116 13.999 8.34796 13.7522C8.59475 13.5054 8.90919 13.3373 9.25151 13.2692C9.59383 13.2011 9.94866 13.2361 10.2711 13.3696C10.5936 13.5032 10.8692 13.7294 11.0631 14.0196C11.257 14.3098 11.3605 14.651 11.3605 15C11.3605 15.468 11.1746 15.9169 10.8436 16.2478C10.5127 16.5788 10.0638 16.7647 9.59579 16.7647Z" />
                            <path d="M16.6544 20.2941C16.1309 20.2941 15.6191 20.4494 15.1838 20.7402C14.7485 21.0311 14.4092 21.4445 14.2088 21.9282C14.0085 22.4119 13.9561 22.9441 14.0582 23.4576C14.1603 23.9711 14.4124 24.4427 14.7826 24.8129C15.1528 25.1831 15.6245 25.4352 16.138 25.5374C16.6515 25.6395 17.1837 25.5871 17.6674 25.3867C18.1511 25.1864 18.5645 24.8471 18.8553 24.4118C19.1462 23.9765 19.3015 23.4647 19.3015 22.9412C19.3015 22.2391 19.0226 21.5658 18.5261 21.0694C18.0297 20.573 17.3564 20.2941 16.6544 20.2941ZM16.6544 24.7059C16.3054 24.7059 15.9642 24.6024 15.674 24.4085C15.3838 24.2146 15.1576 23.939 15.024 23.6165C14.8904 23.294 14.8555 22.9392 14.9236 22.5969C14.9917 22.2546 15.1598 21.9401 15.4066 21.6933C15.6534 21.4465 15.9678 21.2785 16.3101 21.2104C16.6524 21.1423 17.0073 21.1772 17.3297 21.3108C17.6522 21.4444 17.9278 21.6706 18.1217 21.9608C18.3156 22.251 18.4191 22.5921 18.4191 22.9412C18.4191 23.4092 18.2332 23.8581 17.9022 24.189C17.5713 24.52 17.1224 24.7059 16.6544 24.7059Z" />
                            <path d="M9.59579 20.2941C9.07225 20.2941 8.56047 20.4494 8.12516 20.7402C7.68986 21.0311 7.35058 21.4445 7.15023 21.9282C6.94988 22.4119 6.89746 22.9441 6.99959 23.4576C7.10173 23.9711 7.35384 24.4427 7.72404 24.8129C8.09423 25.1831 8.5659 25.4352 9.07938 25.5374C9.59285 25.6395 10.1251 25.5871 10.6088 25.3867C11.0925 25.1864 11.5059 24.8471 11.7967 24.4118C12.0876 23.9765 12.2428 23.4647 12.2428 22.9412C12.2428 22.2391 11.964 21.5658 11.4675 21.0694C10.9711 20.573 10.2978 20.2941 9.59579 20.2941ZM9.59579 24.7059C9.24676 24.7059 8.90558 24.6024 8.61537 24.4085C8.32517 24.2146 8.09898 23.939 7.96541 23.6165C7.83185 23.294 7.7969 22.9392 7.86499 22.5969C7.93308 22.2546 8.10116 21.9401 8.34796 21.6933C8.59475 21.4465 8.90919 21.2785 9.25151 21.2104C9.59383 21.1423 9.94866 21.1772 10.2711 21.3108C10.5936 21.4444 10.8692 21.6706 11.0631 21.9608C11.257 22.251 11.3605 22.5921 11.3605 22.9412C11.3605 23.4092 11.1746 23.8581 10.8436 24.189C10.5127 24.52 10.0638 24.7059 9.59579 24.7059Z" />
                            <path d="M25.1471 8.60294H24.4522V28.2353H24.1875V8.60294H23.4927C23.4278 8.60257 23.3638 8.58788 23.3052 8.55993V28.2353C23.3052 28.4693 23.3981 28.6937 23.5636 28.8592C23.7291 29.0247 23.9535 29.1176 24.1875 29.1176H24.4522C24.6862 29.1176 24.9107 29.0247 25.0762 28.8592C25.2416 28.6937 25.3346 28.4693 25.3346 28.2353V8.55993C25.276 8.58788 25.212 8.60257 25.1471 8.60294Z" />
                            <path d="M25.0874 5.07353C25.2589 4.51335 25.3422 3.92991 25.3344 3.34412C25.3344 2.31618 24.8359 1.43382 24.5381 0.992647C24.5127 0.957998 24.4795 0.929821 24.4412 0.910399C24.4029 0.890977 24.3605 0.880856 24.3175 0.880856C24.2746 0.880856 24.2322 0.890977 24.1939 0.910399C24.1556 0.929821 24.1223 0.957998 24.0969 0.992647C23.7991 1.43382 23.3006 2.31618 23.3006 3.34522C23.2944 3.93087 23.3792 4.51393 23.5521 5.07353H25.0874ZM24.3153 2.52794C24.4004 2.79137 24.445 3.06619 24.4477 3.34301C24.4517 3.74905 24.4073 4.15412 24.3153 4.54963C24.2234 4.15412 24.179 3.74905 24.183 3.34301C24.187 3.06597 24.2331 2.79114 24.3197 2.52794H24.3153Z" />
                            <path d="M25.1469 5.07353H23.4924C23.3754 5.07353 23.2632 5.12001 23.1805 5.20275C23.0978 5.28548 23.0513 5.3977 23.0513 5.5147V8.16176C23.0513 8.27877 23.0978 8.39099 23.1805 8.47372C23.2632 8.55646 23.3754 8.60294 23.4924 8.60294H25.1469C25.2639 8.60294 25.3761 8.55646 25.4588 8.47372C25.5416 8.39099 25.588 8.27877 25.588 8.16176V5.5147C25.588 5.3977 25.5416 5.28548 25.4588 5.20275C25.3761 5.12001 25.2639 5.07353 25.1469 5.07353ZM24.7057 7.72059H23.9336V5.95588H24.7057V7.72059Z" />
                        </svg>
                        Материалы
                    </a>
                    <a href="{{ route('admin.logs') }}" class="menu-link {{ request()->is('admin/logs*') ? 'active' : '' }}">
                        <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"  class="menu-link-svg menu-link-svg_logs">
                            <g clip-path="url(#clip0_242_3)">
                                <path d="M18.75 2.8125V4.6875H11.25V2.8125V0.9375H18.75V2.8125Z"  stroke-width="2" stroke-linejoin="round"/>
                                <path d="M11.25 2.8125H4.6875V16.875V29.0625H25.3125V25.3125"  stroke-width="2" stroke-linejoin="round"/>
                                <path d="M18.75 2.8125H25.3125V16.875V21.5625"  stroke-width="2" stroke-linejoin="round"/>
                                <path d="M14.0625 25.3125H25.3125H29.0625V21.5625H25.3125H14.0625V25.3125Z"  stroke-width="2" stroke-linejoin="round"/>
                                <path d="M14.0625 21.5625L9.375 23.4375L14.0625 25.3125"  stroke-width="2" stroke-linejoin="round"/>
                                <path d="M7.5 9.375H22.5"  stroke-width="2" stroke-linejoin="round"/>
                                <path d="M7.5 13.125H22.5"  stroke-width="2" stroke-linejoin="round"/>
                                <path d="M7.5 16.875H22.5"  stroke-width="2" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_242_3">
                                    <rect width="30" height="30" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Логи
                    </a>
                    @yield('log-files')
                </div>
            </aside>
            <section class="col-8 workspace" id="admin-left-field"
                data-dataAdmin =   "{{ $dataAdmin }}"
            ></section>
            @push('footer-scripts')
                <script src="{{ mix('/js/admin.js') }}"></script>
            @endpush
        </div>
    </div>
@endsection