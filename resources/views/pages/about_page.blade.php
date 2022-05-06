@extends('layout.index')

@section('content')
    <section class="contact-page">
        <div class="container">
            <h2 class="contact-page-title">О&nbsp;нас</h2>
            <div class="contact-page-text">
                <div class="about-wrapper-text">
                    <p class="contact-page-paragraph">
                        В нашем&nbsp; 
                    </p>
                    <p class="contact-page-paragraph">
                        уютном&nbsp; 
                    </p>
                    <p class="contact-page-paragraph">
                        магазинчике,&nbsp; 
                    </p>
                    <p class="contact-page-paragraph">
                        вы найдете&nbsp; 
                    </p>
                    <p class="contact-page-paragraph">
                        много классных&nbsp;
                    </p>
                    <p class="contact-page-paragraph">
                        подарков,&nbsp; 
                    </p>
                    <p class="contact-page-paragraph">
                        игрушек и&nbsp; 
                    </p>
                    <p class="contact-page-paragraph">
                        милых вещей,&nbsp; 
                    </p>
                    <p class="contact-page-paragraph">
                        сделанных вручную.
                    </p>
                </div>
                <br class="contact-page-br"/>
                <div class="about-wrapper-text">
                    <p class="contact-page-paragraph">
                        Также, вы можете&nbsp;
                    </p>
                    <p class="contact-page-paragraph">
                        <a href="{{ route('shop_page') }}" class="about-link">создать свою витрину</a>&nbsp;
                    </p>
                    <p class="contact-page-paragraph">
                        у нас в магазине&nbsp;
                    </p>
                    <p class="contact-page-paragraph">
                        и продавать&nbsp;
                    </p>
                    <p class="contact-page-paragraph">
                        свои шедевры&nbsp;
                        <svg width="31"  height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.25 16.6667H21.9167C21.9167 20.3486 18.9319 23.3333 15.25 23.3333C11.5681 23.3333 8.58333 20.3486 8.58333 16.6667H10.25C10.25 19.4281 12.4886 21.6667 15.25 21.6667C18.0114 21.6667 20.25 19.4281 20.25 16.6667ZM15.25 30C23.5343 30 30.25 23.2843 30.25 15C30.25 6.71573 23.5343 0 15.25 0C6.96573 0 0.25 6.71573 0.25 15C0.25 23.2843 6.96573 30 15.25 30ZM15.25 28.3333C22.6138 28.3333 28.5833 22.3638 28.5833 15C28.5833 7.6362 22.6138 1.66667 15.25 1.66667C7.8862 1.66667 1.91667 7.6362 1.91667 15C1.91667 22.3638 7.8862 28.3333 15.25 28.3333ZM10.25 13.3333C11.1705 13.3333 11.9167 12.5871 11.9167 11.6667C11.9167 10.7462 11.1705 10 10.25 10C9.32952 10 8.58333 10.7462 8.58333 11.6667C8.58333 12.5871 9.32952 13.3333 10.25 13.3333ZM20.25 13.3333C21.1705 13.3333 21.9167 12.5871 21.9167 11.6667C21.9167 10.7462 21.1705 10 20.25 10C19.3295 10 18.5833 10.7462 18.5833 11.6667C18.5833 12.5871 19.3295 13.3333 20.25 13.3333Z" fill="black"/>
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection