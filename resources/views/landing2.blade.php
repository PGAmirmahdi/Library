<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('head2')
@include('style')
<body class="no-gutters">

<!-- Loader Start -->
<div id="loader" class="loader">
    <div id="loaderContent" class="loader__content">
        <div class="loader__shadow"></div>
        <div class="loader__box"></div>
    </div>
</div>
<!-- Loader End -->

<!-- Header Start -->
<header id="header" class="header d-flex justify-content-between">
    @include('header')
</header>
<!-- Header End -->

<!-- Gradient Background Start -->
<div class="gradient-background">
    <div class="blur"></div>
    <div class="blur"></div>
    <div class="blur"></div>
</div>
<!-- Gradient Background End -->

<!-- Avatar Side Block Start -->
<div id="avatar" class="avatar">
    @include('side')
</div>
<!-- Avatar Side Block End -->


<!-- Page Content Start -->
<div id="content" class="content no-gutters">
    <div class="content__wrapper">

        @include('content2')

        <div class="content__block">

            <!-- Testimonials Slider Start -->
            {{--            <div class="testimonials-slider">--}}
            {{--                <!-- slider main container -->--}}
            {{--                <div class="swiper-testimonials">--}}
            {{--                    <!-- additional required wrapper -->--}}
            {{--                    <div class="swiper-wrapper">--}}
            {{--                        <!-- slides -->--}}
            {{--                        <div class="swiper-slide">--}}
            {{--                            <div class="testimonials-card animate-in-up">--}}
            {{--                                <div class="testimonials-card__tauthor d-flex animate-in-up">--}}
            {{--                                    <div class="tauthor__avatar">--}}
            {{--                                        <img--}}
            {{--                                            src="https://mixdesign.club/themeforest/braxton/img/avatars/400x400_t01.webp"--}}
            {{--                                            alt="نویسنده نظر">--}}
            {{--                                    </div>--}}
            {{--                                    <div class="tauthor__info d-flex flex-column justify-content-center">--}}
            {{--                                        <p class="tauthor__name">الکس تومیتو</p>--}}
            {{--                                        <p class="tauthor__position">مدیر برند در--}}
            {{--                                            <a href="#0" class="text-link-bold" target="_blank">طراحی آنی</a>--}}
            {{--                                        </p>--}}
            {{--                                        <div class="tauthor__rating d-flex">--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="testimonials-card__descr animate-in-up">--}}
            {{--                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
            {{--                                        گرافیک است.--}}
            {{--                                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط--}}
            {{--                                        فعلی تکنولوژی--}}
            {{--                                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>--}}
            {{--                                </div>--}}
            {{--                                <div class="testimonials-card__btnholder animate-in-up">--}}
            {{--                                    <a class="btn mobile-vertical btn-line btn-transparent slide-right" href="#0">--}}
            {{--                                        <i class="ph-bold ph-arrow-right"></i>--}}
            {{--                                        <span class="btn-caption">صفحه پروژه</span>--}}
            {{--                                    </a>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="swiper-slide">--}}
            {{--                            <div class="testimonials-card animate-in-up">--}}
            {{--                                <div class="testimonials-card__tauthor d-flex animate-in-up">--}}
            {{--                                    <div class="tauthor__avatar">--}}
            {{--                                        <img--}}
            {{--                                            src="https://mixdesign.club/themeforest/braxton/img/avatars/400x400_t01.webp"--}}
            {{--                                            alt="نویسنده نظر">--}}
            {{--                                    </div>--}}
            {{--                                    <div class="tauthor__info d-flex flex-column justify-content-center">--}}
            {{--                                        <p class="tauthor__name">جنی آناناس</p>--}}
            {{--                                        <p class="tauthor__position">مدیر سئو در--}}
            {{--                                            <a href="#0" class="text-link-bold" target="_blank">افراد خلاق</a>--}}
            {{--                                        </p>--}}
            {{--                                        <div class="tauthor__rating d-flex">--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                            <i class="ph-fill ph-star"></i>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="testimonials-card__descr animate-in-up">--}}
            {{--                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
            {{--                                        گرافیک است.--}}
            {{--                                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط--}}
            {{--                                        فعلی تکنولوژی--}}
            {{--                                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>--}}
            {{--                                </div>--}}
            {{--                                <div class="testimonials-card__btnholder animate-in-up">--}}
            {{--                                    <a class="btn mobile-vertical btn-line btn-transparent slide-right" href="#0">--}}
            {{--                                        <i class="ph-bold ph-arrow-right"></i>--}}
            {{--                                        <span class="btn-caption">صفحه پروژه</span>--}}
            {{--                                    </a>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <!-- navigation buttons -->--}}
            {{--                    <div>--}}
            {{--                        <div class="swiper-button-prev mxd-slider-btn-square mxd-slider-btn-square-prev animate-in-up">--}}
            {{--                            <a class="btn btn-square btn-square-s btn-outline slide-left" href="#0">--}}
            {{--                                <i class="ph-bold ph-caret-left"></i>--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                        <div class="swiper-button-next mxd-slider-btn-square mxd-slider-btn-square-next animate-in-up">--}}
            {{--                            <a class="btn btn-square btn-square-s btn-outline slide-right" href="#0">--}}
            {{--                                <i class="ph-bold ph-caret-right"></i>--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!-- Testimonials Slider End -->--}}

            {{--        </div>--}}
            <!-- Content Block - Testimonials Slider End -->


            <!-- Contact Section Start -->
            <section id="contact" class="inner contact">
                @include('contact')
            </section>
            <!-- Contact Section End -->


        </div>
    </div>
    <!-- Page Content End -->

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
        It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close link-s" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share link-s" title="Share"></button>

                    <button class="pswp__button pswp__button--fs link-s" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom link-s" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader-active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left link-s" title="Previous (arrow left)"></button>

                <button class="pswp__button pswp__button--arrow--right link-s" title="Next (arrow right)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- Load Scripts Start -->
@include('script')
</body>

</html>
