<!-- Intro Section Start -->
<section id="home" class="main intro">

    <!-- شروع عنوان -->
    <div id="headline" class="headline d-flex align-items-start flex-column" data-speed="1">
        <p class="headline__subtitle animate-headline">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                 viewBox="0 0 13 13" fill="currentColor">
                <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
        C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
        C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z"/>
            </svg>
            <span>رزومه من!</span>
        </p>
        <h1 class="headline__title animate-headline"> من {{$user->name . ' ' . $user->family}} هستم
            <br>{{$user->role->label}}</h1>
        <div class="headline__btnholder d-flex flex-column flex-sm-row">
            <a class="btn mobile-vertical btn-default btn-hover btn-hover-accent-mobile animate-headline"
               href="#portfolio">
                <span class="btn-caption">نمونه کار هام</span>
                <i class="ph-bold ph-squares-four"></i>
            </a>
            @if(isset($resume) && is_iterable($resume))
                @foreach($resume as $resume6)
                    @if($resume6->file)
                        <a class="btn mobile-vertical btn-default btn-hover btn-hover-outline-mobile animate-headline"
                           href="{{ route('res.file.show', ['filename' => basename($resume6->file)]) }}">
                            <span class="btn-caption">دانلود رزومه</span>
                            <i class="ph-bold ph-download-simple"></i>
                        </a>
                    @else
                        <p class="btn mobile-vertical btn-default btn-hover btn-hover-outline-mobile animate-headline">
                            رزومه موجود نیست</p>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <!-- پایان عنوان -->


    <div class="rotating-btn">
        <a href="#portfolio" class="rotating-btn__link slide-down">
            <!-- SVG rotating text -->

            <!-- arrow icon -->
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 x="0px" y="0px" viewBox="0 0 120 120"
                 style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px) rotate(229.67deg);"
                 xml:space="preserve" class="animate-rotation" data-value="360">
                <defs>
                    <path id="textPath"
                          d="M110,59.5c0,27.6-22.4,50-50,50s-50-22.4-50-50s22.4-50,50-50S110,31.9,110,59.5z"></path>
                </defs>
                <g>
                    <use xlink:href="#textPath" fill="none"></use>
                    <text>
                        <!-- متن دکمه اینجا!!! -->
                        <textPath xlink:href="#textPath">بیشتر ببینید * بیشتر ببینید * بیشتر ببینید * بیشتر
                            ببینید *
                        </textPath>
                    </text>
                </g>
              </svg>
            <i class="ph-bold ph-arrow-down"></i>
        </a>
    </div>

</section>
<!-- Intro Section End -->

<!-- Portfolio Section Start -->
<section id="portfolio" class="inner inner-first portfolio">

    <!-- بلوک محتوا - عنوان H2 شروع -->
    <div class="content__block section-grid-title">
        <p class="h2__subtitle animate-in-up">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                 viewBox="0 0 13 13" fill="currentColor">
                <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
                  C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
                  C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z"/>
            </svg>
            <span>نمونه کارها</span>
        </p>
        <h2 class="h2__title animate-in-up">نمایش پروژه‌های ویژه‌ام</h2>
    </div>
    <!-- بلوک محتوا - عنوان H2 پایان -->

    <!-- بلوک محتوا - گالری اعمال شروع -->
    <div class="content__block grid-block">
        <div class="container-fluid px-0 inner__gallery">
            <div class="row gx-0 my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                @if(isset($example) && is_iterable($example))
                    @foreach($example as $examplee)
                        <!-- آیتم تک گالری کارها شروع -->
                        <div class="col-12 col-md-6 gallery__item grid-item animate-card-2"
                                itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            @if($examplee->file)
                                @php
                                    $fileExtension = pathinfo($examplee->file, PATHINFO_EXTENSION);
                                @endphp

                                @if(in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                    {{-- بررسی فرمت‌های ویدیو --}}
                                    <a href="#"
                                       data-size="1920x1080"
                                       data-type="video"
                                       data-video-url="{{ route('exa.file.show', ['filename' => basename($examplee->file)]) }}">
                                        <video height="1080" muted playsinline loop width="640px" autoplay>
                                            <source src="{{ route('exa.file.show', ['filename' => basename($examplee->file)]) }}" type="video/{{ $fileExtension }}">
                                            مرورگر شما از پخش ویدیو پشتیبانی نمی‌کند.
                                        </video>
                                    </a>
                                @else
                                    <a href="{{ route('exa.file.show', ['filename' => basename($examplee->file)]) }}"
                                       data-image="{{ route('exa.file.show', ['filename' => basename($examplee->file)]) }}"
                                       class="gallery__link"
                                       itemprop="contentUrl" data-size="1400x1400" data-type="image">
                                        <img
                                            src="{{ route('exa.file.show', ['filename' => basename($examplee->file)]) }}"
                                            class="gallery__image"
                                            itemprop="thumbnail" alt="توضیحات تصویر">
                                    </a>
                                @endif
                            @else
                                <a href="https://mixdesign.club/themeforest/braxton/img/works/800_w03-thumb.webp"
                                   data-image="https://mixdesign.club/themeforest/braxton/img/works/800_w03-thumb.webp"
                                   class="gallery__link"
                                   itemprop="contentUrl" data-size="1400x1400" data-type="image">
                                    <img
                                        src="https://mixdesign.club/themeforest/braxton/img/works/800_w03-thumb.webp"
                                        class="gallery__image"
                                        itemprop="thumbnail" alt="توضیحات تصویر">
                                </a>
                            @endif
                            <figcaption class="gallery__descr" itemprop="caption description">
                                <h5>{{ $examplee->title }}</h5>
                                <div class="card__tags d-flex flex-wrap">
                                    @php
                                        $properties = json_decode($examplee->properties, true);
                                    @endphp
                                    @foreach($properties as $property)
                                        <span class="rounded-tag opposite">{{$property}}</span>
                                    @endforeach

                                </div>
                                <p class="small">{{ $examplee->description}}
                                </p>
                            </figcaption>
                        </div>
                        <!-- آیتم تک گالری کارها پایان -->
                    @endforeach
                @endif
            </div>
            <!-- صفحه‌بندی -->
            <div class="pagination-wrapper d-flex justify-content-center mt-4">
                {{ $example->links() }}
            </div>
        </div>
    </div>
    <!-- بلوک محتوا - گالری اعمال پایان -->

</section>

<!-- Portfolio Section End -->

<!-- About Section Start -->

<!-- About Section Start -->
<section id="about" class="inner about">

    <!-- بلوک محتوا - عنوان H2 شروع -->
    <div class="content__block section-grid-title">
        <p class="h2__subtitle animate-in-up">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
                 viewBox="0 0 13 13" fill="currentColor">
                <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
                  C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
                  C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z"/>
            </svg>
            <span>درباره من</span>
        </p>
        <h2 class="h2__title animate-in-up">تبدیل مسائل پیچیده به طراحی‌های ساده</h2>
    </div>
    <!-- بلوک محتوا - عنوان H2 پایان -->

    <!-- بلوک محتوا - دستاوردها شروع -->
    <div class="content__block grid-block">
        <div class="achievements d-flex flex-column flex-md-row align-items-md-stretch">
            <!-- آیتم تک دستاورد -->
            <div class="achievements__item d-flex flex-column grid-item animate-card-3">
                <div class="achievements__card">
                    <p class="achievements__number">+{{$customer->count()}}</p>
                    <p class="achievements__descr">مشتری خوشحال</p>
                </div>
            </div>
            <!-- آیتم تک دستاورد -->
            <div class="achievements__item d-flex flex-column grid-item animate-card-3">
                <div class="achievements__card">
                    <p class="achievements__number">+{{ number_format($totalDaysWorked / 365, 1) }}
                    </p>
                    <p class="achievements__descr">سال‌های تجربه</p>
                </div>
            </div>
            <!-- آیتم تک دستاورد -->
            <div class="achievements__item d-flex flex-column grid-item animate-card-3">
                <div class="achievements__card">
                    <p class="achievements__number">+{{$example2->count()}}</p>
                    <p class="achievements__descr">پروژه انجام شده</p>
                </div>
            </div>
        </div>
    </div>
    <!-- بلوک محتوا - دستاوردها پایان -->

    <!-- بلوک محتوا - داده‌های درباره من شروع -->
    <div class="content__block grid-block block-large">
        <div class="container-fluid p-0">
            <div class="row g-0 justify-content-between">

                <!-- توضیحات درباره من شروع -->
                <div class="col-12 col-xl-8 grid-item about-descr">
                    @foreach($resume as $resume8)
                        <p class="about-descr__text animate-in-up">
                            {{$resume8->description}}
                        </p>
                        <div class="btn-group about-descr__btnholder animate-in-up">
                            @if($resume8->file)
                                <a class="btn mobile-vertical btn-default btn-hover btn-hover-accent"
                                   href="{{ route('res.file.show', ['filename' => basename($resume8->file)]) }}">
                                    <span class="btn-caption">دانلود رزومه</span>
                                    <i class="ph-bold ph-download-simple"></i>
                                </a>
                            @else
                                <p class="btn mobile-vertical btn-default btn-hover btn-hover-outline-mobile animate-headline">
                                    رزومه موجود نیست</p>
                            @endif
                        </div>
                </div>
                @endforeach
                <!-- توضیحات درباره من پایان -->

                <!-- اطلاعات درباره من شروع -->
                <div class="col-12 col-xl-4 grid-item about-info">
                    <div class="about-info__item animate-in-up">
                        <h6>
                            <small class="top">نام</small>
                            {{$user->name}}
                        </h6>
                    </div>
                    <div class="about-info__item animate-in-up">
                        <h6>
                            <small class="top">تلفن</small>
                            <a class="text-link-bold" href="tel:{{$user->phone}}">{{$user->phone}}</a>
                        </h6>
                    </div>
                    <div class="about-info__item animate-in-up">
                        <h6>
                            <small class="top">ایمیل</small>
                            @foreach($resume as $resume1)
                                <a class="text-link-bold"
                                   href="mailto:@if($resume1->email){{$resume1->email}} @else pgamirmahdi@gmail.com @endif">@if($resume1->email)
                                        {{$resume1->email}}
                                    @else
                                        pgamirmahdi@gmail.com
                                    @endif</a>
                            @endforeach
                        </h6>
                    </div>
                    <div class="about-info__item animate-in-up">
                        <h6>
                            <small class="top">شهر</small>
                            @foreach($resume as $resume4)
                                <a class="text-link-bold" href="#"
                                   target="_blank">{{$resume4->city}}</a>
                            @endforeach
                        </h6>
                    </div>
                </div>
                <!-- اطلاعات درباره من پایان -->

            </div>
        </div>
    </div>
    <!-- بلوک محتوا - داده‌های درباره من پایان -->

    <!-- بلوک محتوا - خدمات شروع -->
    <div class="content__block grid-block">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-stretch cards">
                @foreach($skills as $skill)
                    <!-- آیتم‌های کارت خدمات شروع -->
                    <div class="col-12 col-md-6 cards__item grid-item animate-card-2">
                        <div class="cards__card d-flex flex-column">
                            <div class="cards__descr">
                                <h4 class="cards__title animate-in-up">{{$skill->title}}</h4>
                                <div class="cards__tags d-flex flex-wrap animate-in-up">
                                    @php
                                        $properties = json_decode($skill->properties, true);
                                    @endphp
                                    @foreach($properties as $property)
                                        <span class="rounded-tag tag-outline">{{$property}}</span>
                                    @endforeach

                                </div>
                                <p class="small cards__text animate-in-up">{{$skill->description}}</p>
                            </div>
                            <div class="cards__image d-flex animate-in-up">
                                @if($skill->file)
                                    <img
                                        src="{{ route('ski.file.show', ['filename' => basename($skill->file)]) }}"
                                        alt="تصویر مهارت">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- بلوک محتوا - خدمات پایان -->

</section>
<!-- About Section End -->

<!-- Resume Section Start -->
<section id="resume" class="inner resume">

    {{--            <!-- Content Block - H2 Section Title Start -->--}}
    {{--            <div class="content__block block-large">--}}
    {{--                <p class="h2__subtitle animate-in-up">--}}
    {{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"--}}
    {{--                         viewBox="0 0 13 13" fill="currentColor">--}}
    {{--                        <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8--}}
    {{--          C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7--}}
    {{--          C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z"/>--}}
    {{--                    </svg>--}}
    {{--                    <span>رزومه</span>--}}
    {{--                </p>--}}
    {{--                <h2 class="h2__title animate-in-up">آموزش و تجربه عملی</h2>--}}
    {{--                <p class="h2__text animate-in-up">--}}
    {{--                    "برای آنچه که می‌خواهید به نظر برسید، باید آن باشید" - یا اگر دوست دارید ساده‌تر بگویم - هرگز به--}}
    {{--                    خودتان تصور نکنید که نباید به غیر از آنچه که به نظر دیگران می‌آید شما بودید یا ممکن بودید که نباید--}}
    {{--                    به نظر آنها به چیزی که شما بودید یا--}}
    {{--                    <a href="#0" class="text-link">ممکن بود تا</a>--}}
    {{--                    اگر وجود داشت که به غیر از آنچه که آنها به نظر می‌رسید به نظر می‌رسد.--}}
    {{--                </p>--}}
    {{--            </div>--}}
    {{--            <!-- Content Block - H2 Section Title End -->--}}

    {{--            <!-- Content Block - Education Start -->--}}
    {{--            <div class="content__block block-large">--}}

    {{--                <!-- H3 Block Start -->--}}
    {{--                <div class="section-h3">--}}
    {{--                    <h3 class="h3__title animate-in-up">آموزش من</h3>--}}
    {{--                </div>--}}
    {{--                <!-- H3 Block End -->--}}

    {{--                <!-- Education Lines Start -->--}}
    {{--                <div class="container-fluid p-0 resume-lines">--}}
    {{--                    <!-- education single item -->--}}
    {{--                    <div class="row g-0 resume-lines__item animate-in-up">--}}
    {{--                        <div class="col-12 col-md-2">--}}
    {{--                            <span class="resume-lines__date animate-in-up">1394 - 1395</span>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-12 col-md-5">--}}
    {{--                            <h5 class="resume-lines__title animate-in-up">تمرکز بر نقاشی</h5>--}}
    {{--                            <p class="resume-lines__source animate-in-up">دوره توسط--}}
    {{--                                <a href="#0" class="text-link-bold" target="_blank">آکادمی هنر نیویورک</a>--}}
    {{--                            </p>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-12 col-md-5">--}}
    {{--                            <p class="small resume-lines__descr animate-in-up">دوره‌های نقاشی گرافیکی که اصول اساسی--}}
    {{--                                نقاشی را ارائه می‌دهند.</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- education single item -->--}}
    {{--                    <div class="row g-0 resume-lines__item animate-in-up">--}}
    {{--                        <div class="col-12 col-md-2">--}}
    {{--                            <span class="resume-lines__date animate-in-up">1398 - 1400</span>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-12 col-md-5">--}}
    {{--                            <h5 class="resume-lines__title animate-in-up">تخصص طراحی UI/UX</h5>--}}
    {{--                            <p class="resume-lines__source animate-in-up">دوره توسط--}}
    {{--                                <a href="#0" class="text-link-bold" target="_blank">موسسه هنر کالیفرنیا</a>--}}
    {{--                            </p>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-12 col-md-5">--}}
    {{--                            <p class="small resume-lines__descr animate-in-up">تحقیق، طراحی و ساخت نمونه‌های کاربردی و--}}
    {{--                                قدرتمند با ویژگی‌های بصری.</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- education single item -->--}}
    {{--                    <div class="row g-0 resume-lines__item animate-in-up">--}}
    {{--                        <div class="col-12 col-md-2">--}}
    {{--                            <span class="resume-lines__date animate-in-up">1401</span>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-12 col-md-5">--}}
    {{--                            <h5 class="resume-lines__title animate-in-up">طراح UI/UX</h5>--}}
    {{--                            <p class="resume-lines__source animate-in-up">دوره توسط--}}
    {{--                                <a href="#0" class="text-link-bold" target="_blank">کورسرا</a>--}}
    {{--                            </p>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-12 col-md-5">--}}
    {{--                            <p class="small resume-lines__descr animate-in-up">این دوره درباره کامل کردن فرآیند طراحی از--}}
    {{--                                ابتدا تا انتها می‌باشد.</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <!-- Education Lines End -->--}}

    {{--            </div>--}}
    <!-- Content Block - Education End -->

    <!-- Content Block - Experience Start -->
    <div class="content__block block-large">

        <!-- H3 Block Start -->
        <div class="section-h3">
            <h3 class="h3__title animate-in-up">تجربه‌های کاری من</h3>
        </div>
        <!-- H3 Block End -->

        <!-- Experience Lines Start -->
        <div class="container-fluid p-0 resume-lines">
            <!-- experience single item -->
            @foreach($jobHistories as $jobHistory)
                <div class="row g-0 resume-lines__item animate-in-up">
                    <div class="col-12 col-md-2">
                                <span
                                    class="resume-lines__date animate-in-up">{{$jobHistory->from_date}} - {{$jobHistory->to_date}}</span>
                    </div>
                    <div class="col-12 col-md-5">
                        <h5 class="resume-lines__title animate-in-up">{{$jobHistory->department}}</h5>
                        <p class="resume-lines__source animate-in-up">در
                            <a href="#0" class="text-link-bold" target="_blank">{{$jobHistory->company}}</a>
                        </p>
                    </div>
                    <div class="col-12 col-md-5">
                        <p class="small resume-lines__descr animate-in-up">{{$jobHistory->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Experience Lines End -->

    </div>
    <!-- Content Block - Experience End -->

    <!-- Content Block - Tools List Start -->
    <div class="content__block grid-block block-large">
        <!-- H3 Block Start -->
        <div class="section-h3">
            <h3 class="h3__title animate-in-up">علاقه مندی ها</h3>
        </div>
        <!-- H3 Block End -->

        <!-- Tools List Start -->
        <div class="tools-cards d-flex justify-content-start flex-wrap">
            @if(isset($favorites)&& is_iterable($favorites))
                @foreach($favorites as $favorite)
                    <!-- tools simgle item -->
                    <div class="tools-cards__item d-flex grid-item-s animate-card-5">
                        <div class="tools-cards__card">
                            <img class="tools-cards__icon animate-in-up"
                                 src="{{ route('fav.file.show', ['filename' => basename($favorite->picture)]) }}"
                                 alt="Tools Icon">
                            <h6 class="tools-cards__caption animate-in-up">{{$favorite->title}}</h6>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Tools List End -->
        </div>
        <!-- Content Block - Tools List End -->
    </div>
</section>
<style>
    .pagination-wrapper {
        text-align: center;
    }

    .pagination-wrapper ul.pagination {
        display: inline-flex;
    }
</style>
