import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, EffectFade, Navigation, Pagination } from 'swiper';

const slides = [
    'images/slider/slider_1.jpg',
    'images/slider/slider_2.jpg',
    'images/slider/slider_3.jpg',
    'images/slider/slider_4.jpg',
    'images/slider/slider_5.jpg',
];

const SliderComponent = () => {
    return (
        <Swiper
            effect={"fade"}
            navigation={true}
            loop={true}
            pagination={{
                clickable: true,
            }}
            autoplay={{
                delay: 3000,
                disableOnInteraction: false,
            }}
            modules={[Autoplay, EffectFade, Navigation, Pagination]}
            slidesPerView={1}
            onSlideChange={() => console.log('slide change')}
            onSwiper={(swiper) => console.log(swiper)}
        >
            {slides.map(image => <SwiperSlide key={image}><img src={image} /> </SwiperSlide>)}
        </Swiper>
    );
};

export default SliderComponent;
