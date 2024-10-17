<!-- Navigation Menu Start -->
<div class="header__navigation">
    <nav id="menu" class="menu">
        <ul class="menu__list d-flex justify-content-start">
            <li class="menu__item">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a class="menu__link btn" href="#home">
                        <span class="menu__caption">{{auth()->user()->fullname()}}</span>
                        <i class="ph-bold ph-house-simple"></i>
                    </a>
                @else
                    <a class="menu__link btn" href="{{route('login')}}">
                        <span class="menu__caption">ورود</span>
                        <i class="ph-bold ph-house-simple"></i>
                    </a>
                @endif
            </li>
            <li class="menu__item">
                <a class="menu__link btn" href="#portfolio">
                    <span class="menu__caption">نمونه کارها</span>
                    <i class="ph-bold ph-squares-four"></i>
                </a>
            </li>
            <li class="menu__item">
                <a class="menu__link btn" href="#about">
                    <span class="menu__caption">درباره من</span>
                    <i class="ph-bold ph-user"></i>
                </a>
            </li>
            <li class="menu__item">
                <a class="menu__link btn" href="#resume">
                    <span class="menu__caption">رزومه</span>
                    <i class="ph-bold ph-article"></i>
                </a>
            </li>
            <li class="menu__item">
                <a class="menu__link btn" href="#contact">
                    <span class="menu__caption">تماس با من</span>
                    <i class="ph-bold ph-envelope"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- Navigation Menu End -->


<!-- Header Controls Start -->
<div class="header__controls d-flex justify-content-end">
    <button id="color-switcher" class="color-switcher header__switcher btn" type="button" role="switch"
            aria-label="light/dark mode" aria-checked="true"></button>
    @if(isset($resume) && is_iterable($resume))
        @foreach($resume as $resume7) <a id="notify-trigger" class="header__trigger btn"
                                         href="mailto:@if($resume7->email){{$resume7->email}} @else pgamirmahdi@gmail.com @endif">
            <span class="trigger__caption">ارتباط با من</span>
            <i class="ph-bold ph-chat-dots"></i>
        </a>@endforeach @endif
</div>
<!-- Header Controls End -->
