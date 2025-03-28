<div class="avatar__container d-flex flex-column justify-content-lg-between">
    <!-- image and logo -->
    <div class="avatar__block">
        <div class="avatar__logo d-flex gap-4 align-items-center">
            <div class="logo__image">
                <!-- Your Logo Here!!! -->
                <img src="{{asset('assets/landing/img/favicon/icon.png')}}" alt="Profile">
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="85px" height="85px"--}}
                {{--                         viewBox="0 0 85 85"--}}
                {{--                         style="enable-background:new 0 0 85 85;" xml:space="preserve" class="gradient-fill">--}}
                {{--            <style type="text/css">--}}
                {{--                .gradient-fill {--}}
                {{--                    fill: url(#gradientFill);--}}
                {{--                }--}}
                {{--            </style>--}}
                {{--                        <g>--}}
                {{--                            <linearGradient id="gradientFill" gradientUnits="userSpaceOnUse" x1="9.9604" y1="75.0338" x2="75.0387"--}}
                {{--                                            y2="9.9555">--}}
                {{--                                <stop offset="0" style="stop-color:var(--accent)"/>--}}
                {{--                                <stop offset="1" style="stop-color:var(--secondary)"/>--}}
                {{--                            </linearGradient>--}}
                {{--                            <path class="gradient-fill"--}}
                {{--                                  d="M51,0H34C15.2,0,0,15.2,0,34v17c0,14.3,8.9,26.6,21.4,31.6c0,0,0,0,0,0l0,0C25.3,84.1,29.5,85,34,85h17 c6,0,11.7-1.6,16.6-4.3c0.1-0.1,0.2-0.1,0.3-0.2C78.1,74.6,85,63.6,85,51V34C85,15.2,69.8,0,51,0z M83,51c0,10.7-5.3,20.2-13.4,26 v-2.5v-3.9h3.9v-3.9h-3.9v-3.9h3.9v-3.9h-3.9H67v-3.9V51h-3.9v3.9v3.9h2.6v3.9v3.9v3.9h-3.9h-3.9v3.9h3.9h3.9v3.9v1 C61.3,81.7,56.3,83,51,83H34c-4.5,0-8.7-0.9-12.6-2.6v-2v-3.9h3.9h3.9v-3.9h-3.9h-3.9v-3.9v-3.9v-3.9H24v-3.9V51h-3.9v3.9v3.9h-2.6 h-3.9v3.9h3.9v3.9h-3.9v3.9h3.9v3.9v3.9C8.2,72.8,2,62.6,2,51V34C2,16.4,16.4,2,34,2h17c17.6,0,32,14.4,32,32V51z M50.1,54.9H54 v3.9v3.9h-3.9v-3.9V54.9z M33.1,54.9H37v3.9v3.9h-3.9v-3.9V54.9z M27.9,51H24v-3.9v-3.9v-3.9h3.9v3.9v3.9V51z M31.8,39.3h-3.9v-3.9 h3.9V39.3z M31.8,43.2v-3.9h3.9v3.9H31.8z M63.1,47.1V51h-3.9v-3.9v-3.9v-3.9h3.9v3.9V47.1z M35.7,47.1v-3.9h3.9h3.9h3.9h3.9v3.9 h-3.9h-3.9h-3.9H35.7z M59.2,39.3h-3.9v-3.9h3.9V39.3z M55.3,43.2h-3.9v-3.9h3.9V43.2z"/>--}}
                {{--                        </g>--}}
                {{--          </svg>--}}
            </div>
            <div class="logo__caption">
                <p>{{$user->name}}<br>{{$user->family}}</p>
            </div>
        </div>
        <div class="avatar__image">
            @if($user->profile)
                <img src="{{ route('us.file.show', ['filename' => basename($user->profile)]) }}"
                     alt="Braxton - Personal Portfolio & Resume HTML Template Avatar">
            @else
                <img src="https://mixdesign.club/themeforest/braxton/img/avatars/1024x1024_a02.webp"
                     alt="Braxton - Personal Portfolio & Resume HTML Template Avatar">
            @endif
        </div>
    </div>
    <!-- data caption #1 -->
    <div class="avatar__block">
        <h6>
            <small class="top">علاقه:</small>
            {{$user->role->label}}
        </h6>
    </div>
    <!-- data caption #2 -->
    <div class="avatar__block">
        <h6>
            <small class="top"> شهر من:</small>
            @foreach($resume as $resume5)
                @if(isset($resume5->city))
                    {{$resume5->city}}
                @else
                    نامشخص
                @endif
            @endforeach
        </h6>
    </div>
    <!-- socials and CTA button -->
    <div class="avatar__block">
        <div class="avatar__socials">
            <ul class="socials-square d-flex justify-content-between">
                @if(isset($resume) && is_iterable($resume))
                    @foreach($resume as $resume5)
                        @if(($resume5->instagram))
                            <li class="socials-square__item">
                                <a class="socials-square__link btn" href="https://instagram.com/{{ $resume5->instagram }}"
                                   target="_blank"><i
                                        class="ph-bold ph-instagram-logo"></i></a>
                            </li>
                        @endif
                        @if($resume5->telegram)
                            <li class="socials-square__item">
                                <a class="socials-square__link btn" href="https://t.me/{{ $resume5->telegram }}"
                                   target="_blank"><i
                                        class="ph-bold ph-telegram-logo"></i></a>
                            </li>
                        @endif
                        @if($resume5->phone)
                            <li class="socials-square__item">
                                <a class="socials-square__link btn" href="https://wa.me/{{ $resume5->phone }}"
                                   target="_blank"><i
                                        class="ph-bold ph-whatsapp-logo"></i></a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="avatar__btnholder">
            @if(\Illuminate\Support\Facades\Auth::check())
                <a class="btn btn-default btn-fullwidth btn-hover btn-hover-accent mt-3" href="{{route('panel')}}"
                   target="_blank">
                    <span class="btn-caption">پنل کاربری</span>
                </a>
            @else
                <a class="btn btn-default btn-fullwidth btn-hover btn-hover-accent mt-3" href="#contact"
                   target="_blank">
                    <span class="btn-caption">پیام بگذارید!</span>
                </a>
            @endif
        </div>
    </div>
</div>
