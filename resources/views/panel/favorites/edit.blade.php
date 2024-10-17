@extends('panel.layouts.master')
@section('title', 'ویرایش علاقه‌مندی')

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
            <h3 class="text-center mb-4">ویرایش علاقه‌مندی</h3>

            <form action="{{ route('favorites.update', $favorite->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- فیلد عنوان -->
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $favorite->title) }}" required>
                    <label for="picture" class="mt-2">آپلود تصویر</label>
                    <input type="file" id="picture" name="picture" class="form-control">
                    @if($favorite->picture)
                        <p class="mt-2">تصویر فعلی: <img src="{{ route('favorites.file.show', ['filename' => basename($favorite->picture)]) }}" alt="مشاهده فایل" class="btn btn-info btn-sm" style="max-width: 100px; max-height: 100px;"></p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-save">
                    <i class="fa fa-save mr-2"></i>
                    ذخیره
                </button>
            </form>
        </div>
    </div>
@endsection
