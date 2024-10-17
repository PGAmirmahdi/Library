@extends('panel.layouts.master')
@section('title', 'ویرایش رزومه')

@php
    // گرفتن رزومه کاربر جاری و اطلاعات کاربر از جدول users
    $resume = \App\Models\Resume::where('user_id', auth()->id())->first();
    $user = \App\Models\User::find(auth()->id());  // گرفتن اطلاعات کاربر جاری
@endphp

@section('styles')
    <style>
        .form-group label {
            font-weight: bold;
        }
        .btn-save {
            width: 100%;
            justify-content: center;
            border-radius: 0;
            padding: .8rem;
            font-size: larger;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center mb-4">ویرایش رزومه</h3>

            <form action="{{ route('resume.update',$resume->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- فیلد نام کاربر -->
                <div class="form-group">
                    <label for="name">نام کاربر</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" readonly>
                    <small class="text-muted">این مورد باید در قسمت ویرایش پروفایل تغییر کند.</small>
                </div>

                <!-- بقیه فیلدهای فرم -->
                <div class="form-group">
                    <label for="phone">تلفن</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $resume->phone) }}">
                </div>

                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $resume->email) }}">
                </div>

                <div class="form-group">
                    <label for="city">شهر</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{ old('city', $resume->city) }}">
                </div>

                <div class="form-group">
                    <label for="job">شغل</label>
                    <input type="text" id="job" name="job" class="form-control" value="{{ old('job', $resume->job) }}">
                </div>

                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description', $resume->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="file">آپلود فایل رزومه</label>
                    <input type="file" id="file" name="file" class="form-control">
                    @if($resume->file)
                        <p>فایل فعلی: <a href="{{ route('resume.file.show', ['filename' => basename($resume->file)]) }}" class="btn btn-info btn-sm">مشاهده فایل رزومه</a></p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="job_history">سابقه شغلی(ماه)</label>
                    <input type="number" id="job_history" name="job_history" class="form-control" value="{{ old('job_history', $resume->job_history) }}">
                </div>

                <div class="form-group">
                    <label for="instagram">اینستاگرام</label>
                    <input type="text" id="instagram" name="instagram" class="form-control" value="{{ old('instagram', $resume->instagram) }}">
                </div>

                <div class="form-group">
                    <label for="telegram">تلگرام</label>
                    <input type="text" id="telegram" name="telegram" class="form-control" value="{{ old('telegram', $resume->telegram) }}">
                </div>

                <button type="submit" class="btn btn-primary btn-save">
                    <i class="fa fa-save mr-2"></i>
                    ذخیره
                </button>
            </form>
        </div>
    </div>
@endsection
