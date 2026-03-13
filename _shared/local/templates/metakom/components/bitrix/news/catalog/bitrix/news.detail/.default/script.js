document.addEventListener('DOMContentLoaded', () => {

   const swiperThumbs = new Swiper('.catalog-detail__thumbs', {

        loop: false,
        slidesPerView: 'auto',
        direction: "vertical",
        //centered: true
       navigation: {
           nextEl: '.catalog-detail__thumbs-nav--next',
           prevEl: '.catalog-detail__thumbs-nav--prev',
       },
    })


    const catalogSwiper = new Swiper('.catalog-detail__swiper', {

        loop: true,
        slidesPerView: 1,
        thumbs: {
            swiper: swiperThumbs,
        },
        /*
            pagination: {
                el: '.swiper-pagination',
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            scrollbar: {
                el: '.swiper-scrollbar',
            },
         */


    })
})


