@extends('panel.layouts.master')
@section('title', 'اضافه کردن تجربه کاری')

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
            <h3 class="text-center mb-4">اضافه کردن تجربه کاری</h3>

            <form action="{{ route('JobHistory.store') }}" method="POST">
                @csrf

                <!-- فیلد شرکت -->
                <div class="form-group">
                    <label for="company">شرکت</label>
                    <input type="text" id="company" name="company" class="form-control" value="{{ old('company') }}" required>
                </div>

                <!-- فیلد دپارتمان -->
                <div class="form-group">
                    <label for="department">دپارتمان</label>
                    <input type="text" id="department" name="department" class="form-control" value="{{ old('department') }}" required>
                </div>

                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 mb-4">
                        <label for="from_date">از تاریخ<span class="text-danger">*</span></label>
                        <input type="text" name="from_date" class="form-control date-picker-shamsi-list" id="from_date" value="{{ old('from_date') }}" autocomplete="off">
                        @error('from_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-3 mb-4">
                        <label for="to_date">تا تاریخ</label>
                        <input type="text" name="to_date" class="form-control date-picker-shamsi-list" id="to_date" value="{{ old('to_date') }}" autocomplete="off">
                        @error('to_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-3 mb-4 d-flex align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="until_now" name="until_now">
                            <label class="form-check-label" for="until_now">تا اکنون</label>
                        </div>
                    </div>
                </div>

                <!-- فیلد توضیحات -->
                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-save">
                    <i class="fa fa-save mr-2"></i>
                    ذخیره
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // کنترل چک باکس "تا اکنون"
            $(document).on('change', '#until_now', function () {
                if (this.checked) {
                    // تنظیم فیلد to_date به "تا اکنون"
                    $('input[name="to_date"]').val('تا اکنون').attr('readonly', 'readonly');
                } else {
                    $('input[name="to_date"]').removeAttr('readonly');
                }
            });
        });
    </script>
@endsection
