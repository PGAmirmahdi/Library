@extends('panel.layouts.master')
@section('title', 'اضافه کردن علاقه‌مندی')

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
        .form-divider {
            border-bottom: 1px solid #e0e0e0;
            margin: 1rem 0;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center mb-4">اضافه کردن علاقه‌مندی</h3>

            <form action="{{ route('favorites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- فیلد عنوان -->
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                    <label for="picture">آپلود تصویر</label>
                    <input type="file" id="picture" name="picture" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-save">
                    <i class="fa fa-save mr-2"></i>
                    ذخیره
                </button>
            </form>
        </div>
    </div>
@endsection
