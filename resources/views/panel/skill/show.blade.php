@extends('panel.layouts.master')
@section('title', 'جزئیات مهارت')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">جزئیات مهارت</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h6>عنوان</h6>
                    <p>{{ $skill->title }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>آپلود کننده</h6>
                    <p>{{ $skill->user->name . ' ' . $skill->user->family }}</p>
                </div>
                <div class="col-md-12 mb-3">
                    <h6>فایل</h6>
                    @php
                        $filePath = $skill->file;
                        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                    @endphp
                    @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ asset($filePath) }}" class="img-fluid" alt="File Image">
                    @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
                        <video width="100%" controls>
                            <source src="{{ asset($filePath) }}" type="video/{{ $fileExtension }}">
                            مرورگر شما پشتیبانی نمی‌کند.
                        </video>
                    @else
                        <a href="{{ asset($filePath) }}" class="btn btn-primary" download>
                            <i class="fa fa-download mx-2"></i> دانلود فایل
                        </a>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <h6>توضیحات</h6>
                    <p>{{ $skill->description }}</p>
                </div>
                <div class="col-12 mb-3">
                    <h6>ویژگی‌ها</h6>
                    @php
                        $properties = json_decode($skill->properties, true);
                    @endphp
                    @if(is_array($properties))
                        @foreach($properties as $property)
                            <div class="mb-2">
                                + {{$property}}
                            </div>
                        @endforeach
                    @else
                        <p>ویژگی‌ها در دسترس نیستند.</p>
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <h6>تاریخ ایجاد</h6>
                    <p>{{ verta($skill->created_at)->format('H:i - Y/m/d') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-info">
                <i class="fa fa-backward mx-2"></i>
                بازگشت
            </a>
            <div class="d-flex row justify-content-center align-items-center">
                @can('skill-edit')
                    <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-warning mx-2">
                        <i class="fa fa-edit mx-2"></i>
                        ویرایش نمونه کار
                    </a>
                @endcan
                @can('skill-delete')
                    <form action="{{ route('skill.destroy', $skill->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">
                            <i class="fa fa-trash mx-2"></i>
                            حذف مهارت
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@endsection
