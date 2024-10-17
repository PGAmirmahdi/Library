<!-- Content Block - H2 Section Title Start -->
<div class="content__block section-title">
    <p class="h2__subtitle animate-in-up">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13px" height="13px"
             viewBox="0 0 13 13" fill="currentColor">
            <path fill="currentColor" d="M5.6,12.6c-0.5-0.8-0.7-2.4-1.7-3.5c-1-1-2.7-1.2-3.5-1.7C-0.1,7-0.1,6,0.4,5.6c0.8-0.5,2.3-0.6,3.5-1.8
          C5,2.8,5.1,1.2,5.6,0.4C6-0.1,7-0.1,7.4,0.4c0.5,0.8,0.7,2.4,1.8,3.5c1.2,1.2,2.6,1.2,3.5,1.7c0.6,0.4,0.6,1.4,0,1.7
          C11.8,7.9,10.2,8,9.1,9.1c-1,1-1.2,2.7-1.7,3.5C7,13.1,6,13.1,5.6,12.6z"/>
        </svg>
        <span>تماس</span>
    </p>
    <h2 class="h2__title animate-in-up">با من تماس بگیرید!</h2>
</div>
<!-- Content Block - H2 Section Title End -->

<!-- Content Block - Contact Form Start -->
<div class="content__block grid-block block-grid-large">
    <div class="form-container">

        <!-- Reply Messages Start -->
        <div class="form__reply centered text-center">
            <i class="ph-bold ph-smiley reply__icon"></i>
            <p class="reply__title">انجام شد!</p>
            <span class="reply__text">بابت پیامتان سپاسگزارم. در اسرع وقت به شما پاسخ خواهم داد.</span>
        </div>
        <!-- Reply Messages End -->

        <!-- Contact Form Start -->
        <form class="form contact-form" action="{{ route('landing.store') }}" method="post">
            @csrf
            <!-- Hidden Required Fields -->
            {{-- <input type="hidden" name="project_name" value="Starter Template"> --}}
            {{-- <input type="hidden" name="admin_email" value="support@mixdesign.club"> --}}
            {{-- <input type="hidden" name="form_subject" value="پیام فرم تماس"> --}}
            <!-- END Hidden Required Fields-->

            <div class="container-fluid p-0">
                <div class="row gx-0">
                    <!-- Name input -->
                    <div class="col-12 col-md-6 form__item animate-in-up">
                        <input type="text" name="name" placeholder="نام شما*" required value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Family name input -->
                    <div class="col-12 col-md-6 form__item animate-in-up">
                        <input type="text" name="family" placeholder="نام خانوادگی شما*" required value="{{ old('family') }}">
                        @error('family')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="col-12 col-md-6 form__item animate-in-up">
                        <input type="email" name="email" placeholder="ایمیل*" required value="{{ old('email') }}">
                        @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Phone number input -->
                    <div class="col-12 col-md-6 form__item animate-in-up">
                        <input type="tel" name="number" placeholder="شماره تلفن*" required value="{{ old('number') }}">
                        @error('number')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description textarea -->
                    <div class="col-12 form__item animate-in-up">
                        <textarea name="description" placeholder="چند کلمه از شما*" required>{{ old('description') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <div class="col-12 form__item animate-in-up">
                        <button class="btn btn-default btn-hover btn-hover-accent" type="submit">
                            <span class="btn-caption">ارسال پیام</span>
                            <i class="ph-bold ph-paper-plane-tilt"></i>
                        </button>

                        <!-- Success message -->
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <!-- Contact Form End -->

    </div>
</div>
<!-- Content Block - Contact Form End -->

<!-- Content Block - Socials Cards Start -->
<div class="content__block grid-block">
    <div class="socials-cards d-flex justify-content-start flex-wrap">
        <!-- socials item -->
        <!-- socials item -->
        <div class="socials-cards__item d-flex grid-item-s animate-card-5">
            @if(isset($resume) && is_iterable($resume))
            @foreach($resume as $resume2)
            @if($resume2->instagram)
            <div class="socials-cards__card m-2">
                <i class="ph-bold ph-instagram-logo"></i>
                <a class="socials-cards__link"
                   href="https://www.instagram.com/{{ $resume2->instagram }}" target="_blank"></a>
            </div>
            @endif
            @if($resume2->telegram)
            <div class="socials-cards__card m-2">
                <i
                    class="ph-bold ph-telegram-logo"></i>
                <a class="socials-cards__link" href="https://t.me/{{ $resume2->telegram }}"
                   target="_blank"></a>
            </div>
            @endif
            @if($resume2->phone)
            <div class="socials-cards__card m-2">
                <i
                    class="ph-bold ph-whatsapp-logo"></i>
                <a class="socials-cards__link" href="https://wa.me/{{ $resume2->phone }}"
                   target="_blank"></a>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Content Block - Socials Cards End -->

<!-- Content Block - Teaser Start -->
<div class="content__block">
    <div class="teaser">
        <p class="teaser__text animate-in-up">برای آشنایی بیشتر با من، راجع به پروژه‌تان بگویید یا
            <a class="text-link-bold"
               href="#contact">به من یک شماره تلفن بدهید</a>
            و من در اسرع وقت با شما تماس خواهم گرفت.
        </p>
    </div>
</div>
<!-- Content Block - Teaser End -->

<!-- Content Block - Contact Data Start -->
@if(isset($resume) && is_iterable($resume))
@foreach($resume as $resume3)
<div class="content__block">
    <div class="container-fluid p-0 contact-lines animate-in-up">
        <div class="row g-0 contact-lines__item">
            <!-- data item -->
            <div class="col-12 col-md-4 contact-lines__data">
                <p class="contact-lines__title animate-in-up">شهر</p>
                <p class="contact-lines__text animate-in-up">
                    <a class="text-link-bold" href="https://maps.app.goo.gl/xMJXTEUeHkv6kYRQ6"
                       target="_blank">{{$resume3->city}}</a>
                </p>
            </div>
            <!-- data item -->
            <div class="col-12 col-md-4 contact-lines__data">
                <p class="contact-lines__title animate-in-up">تلفن</p>
                <p class="contact-lines__text animate-in-up">
                    <a class="text-link-bold" href="tel:+12127089400">{{$resume3->phone}}</a>
                </p>
            </div>
            <!-- data item -->
            <div class="col-12 col-md-4 contact-lines__data">
                <p class="contact-lines__title animate-in-up">ایمیل</p>
                <p class="contact-lines__text animate-in-up">
                    <a class="text-link-bold"
                       href="mailto:{{ $resume3->email ?? 'pgamirmahdi@gmail.com' }}">
                        {{ $resume3->email ?? 'pgamirmahdi@gmail.com' }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
<!-- Content Block - Contact Data End -->
