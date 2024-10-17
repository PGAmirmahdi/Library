@extends('panel.layouts.master')
@section('title', 'رزومه من')
@section('style')
    <style>
    .card-header {
    font-size: 1.5rem;
    font-weight: bold;
    padding: 1rem;
    }

    .card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 0.75rem;
    color: #333;
    }

    .card-body p {
    margin-bottom: 0.75rem;
    font-size: 1rem;
    color: #555;
    }

    .hr-divider {
    border-top: 1px solid #ddd;
    margin: 1.5rem 0;
    }

    .btn-warning {
    font-size: 1rem;
    padding: 0.75rem 1.5rem;
    color: #fff;
    }

    .btn-warning:hover {
    background-color: #e0a800;
    color: #fff;
    }

    @media (max-width: 768px) {
    .card-header {
    font-size: 1.25rem;
    padding: 0.75rem;
    }

    .card-title {
    font-size: 1.1rem;
    }

    .btn-warning {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
    }
    }
</style>
@endsection
@section('content')
    <div class="container">
        <h3 class="text-center mb-4">رزومه من</h3>

        @if(!$resume)
            <p class="text-center">هیچ رزومه‌ای یافت نشد.</p>
        @else
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    اطلاعات رزومه
                </div>
                <div class="card-body">
                    <!-- اطلاعات شخصی -->
                    <div class="mb-3">
                        <h5 class="card-title">اطلاعات شخصی</h5>
                        <p><strong>نام کاربر:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>ایمیل:</strong> {{ $resume->email }}</p>
                        <p><strong>شهر:</strong> {{ $resume->city }}</p>
                    </div>

                    <!-- Divider -->
                    <hr class="my-4">

                    <!-- اطلاعات شغلی -->
                    <div class="mb-3">
                        <h5 class="card-title">اطلاعات شغلی</h5>
                        <p><strong>شغل:</strong> {{ $resume->job }}</p>
                        <p><strong>سابقه شغلی:</strong> {{ $resume->job_history }}</p>
                        <p><strong>توضیحات:</strong> {{ $resume->description }}</p>
                    </div>

                    <!-- Divider -->
                    <hr class="my-4">

                    <!-- فایل رزومه و اطلاعات تماس -->
                    <div class="mb-3">
                        <h5 class="card-title">فایل رزومه و اطلاعات تماس</h5>
                        @if($resume->file)
                            <p><a href="{{ route('resume.file.show', ['filename' => basename($resume->file)]) }}" class="btn btn-info btn-sm">مشاهده فایل رزومه</a></p>
                        @else
                            <p class="text-muted">فایلی موجود نیست</p>
                        @endif
                        <p><strong>تلفن:</strong> <a href="tel:{{ $resume->phone }}" target="_blank">{{ $resume->phone }}</a></p>
                        <p><strong>شبکه‌های اجتماعی:</strong></p>
                        @if($resume->instagram)
                            <a href="https://instagram.com/{{ $resume->instagram }}" target="_blank">
                                <i class="fa-brands fa-instagram text-warning fa-lg"></i>
                            </a>
                        @endif
                        @if($resume->telegram)
                            <a href="https://t.me/{{ $resume->telegram }}" target="_blank">
                                <i class="fa-brands fa-telegram text-info fa-lg"></i>
                            </a>
                        @endif
                        @if($resume->phone)
                            <a href="https://wa.me/{{ $resume->phone }}" target="_blank">
                                <i class="fa-brands fa-whatsapp text-success fa-lg"></i>
                            </a>
                        @endif
                    </div>

                    <!-- دکمه ویرایش -->
                    <div class="text-center mt-4">
                        <a href="{{ route('resume.create') }}" class="btn btn-warning">
                            ویرایش <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
