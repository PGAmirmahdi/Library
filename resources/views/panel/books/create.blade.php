@extends('panel.layouts.master')
@section('title', 'ایجاد کتاب')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>ایجاد کتاب</h6>
            </div>
            <form id="book-form" action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                        <label for="name">عنوان کتاب<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                        <label for="author">نویسنده<span class="text-danger">*</span></label>
                        <input type="text" name="author" class="form-control" id="author" value="{{ old('author') }}">
                        @error('author')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                        <label for="image">تصویر کتاب</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                    <label for="description">توضیحات</label>
                    <textarea name="description" class="form-control textarea" id="description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="features_table">
                        <thead>
                        <tr>
                            <th>ویژگی‌ها</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" name="features[]" class="form-control">
                            </td>
                            <td>
                                <button class="btn btn-danger btn-floating btn_remove" type="button"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" id="add_row">افزودن ویژگی</button>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                        <label for="inventory">موجودی<span class="text-danger">*</span></label>
                        <input type="number" name="inventory" class="form-control" id="inventory" value="{{ old('inventory') }}">
                        @error('inventory')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                        <label for="total_count">تعداد کل کتاب‌ها</label>
                        <input type="number" name="total_count" class="form-control" id="total_count" value="{{ old('total_count') }}">
                        @error('total_count')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">ثبت کتاب</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addRowButton = document.getElementById('add_row');
            const tableBody = document.querySelector('#features_table tbody');

            addRowButton.addEventListener('click', function() {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td>
                    <input type="text" name="features[]" class="form-control">
                </td>
                <td>
                    <button class="btn btn-danger btn-floating btn_remove" type="button"><i class="fa fa-trash"></i></button>
                </td>
            `;
                tableBody.appendChild(newRow);
            });

            tableBody.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn_remove')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
@endsection
