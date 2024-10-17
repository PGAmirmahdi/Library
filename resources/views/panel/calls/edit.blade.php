@extends('panel.layouts.master')
@section('title', 'ویرایش تماس')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>ویرایش تماس</h6>
            </div>
            <form action="{{ route('calls.update', $call->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <!-- Name Field -->
                    <div class="col-xl-3 col-lg-3 col-md-3 mb-3">
                        <label for="name">نام<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $call->name) }}">
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Family Field -->
                    <div class="col-xl-3 col-lg-3 col-md-3 mb-3">
                        <label for="family">نام خانوادگی<span class="text-danger">*</span></label>
                        <input type="text" name="family" class="form-control" id="family" value="{{ old('family', $call->family) }}">
                        @error('family')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="col-xl-3 col-lg-3 col-md-3 mb-3">
                        <label for="email">ایمیل<span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $call->email) }}">
                        @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Number Field -->
                    <div class="col-xl-3 col-lg-3 col-md-3 mb-3">
                        <label for="number">شماره تماس<span class="text-danger">*</span></label>
                        <input type="text" name="number" class="form-control" id="number" value="{{ old('number', $call->number) }}">
                        @error('number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                        <label for="description">توضیحات</label>
                        <textarea name="description" class="form-control" id="description">{{ old('description', $call->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">بروزرسانی</button>
            </form>
        </div>
    </div>
@endsection
