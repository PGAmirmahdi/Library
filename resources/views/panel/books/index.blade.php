@php use Illuminate\Support\Str; @endphp
@extends('panel.layouts.master')
@section('title', 'کتاب‌ها')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>کتاب‌ها</h6>
                <div>
                    @can('create-book')
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus mr-2"></i>
                            ایجاد کتاب
                        </a>
                    @endcan
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered dataTable dtr-inline text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>تصویر</th>
                        <th>عنوان</th>
                        <th>نویسنده</th>
                        <th>توضیحات</th>
                        <th>ویژگی‌ها</th>
                        <th>موجودی</th>
                        <th>تعداد کل</th>
                        <th>تاریخ ایجاد</th>
                        <th>مشاهده</th>
                        @can('edit-book')
                            <th>ویرایش</th>
                        @endcan
                        @can('delete-book')
                            <th>حذف</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @if($books && $books->isNotEmpty())
                        @foreach($books as $key => $book)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if($book->image)
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="تصویر کتاب" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <span class="text-muted">تصویر ندارد</span>
                                    @endif
                                </td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ Str::limit($book->description, 60) }}</td>
                                <td>
                                    @php
                                        $features = json_decode($book->features, true);
                                    @endphp
                                    @if($features)
                                        @foreach($features as $feature)
                                            <div>
                                                + {{ $feature }} <br>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-muted">ویژگی ندارد</span>
                                    @endif
                                </td>
                                <td>{{ $book->inventory }}</td>
                                <td>{{ $book->total_count }}</td>
                                <td>{{ verta($book->created_at)->format('H:i - Y/m/d') }}</td>
                                <td>
                                    <a class="btn btn-info btn-floating"
                                       href="{{ route('books.show', $book->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                @can('edit-book')
                                    <td>
                                        <a class="btn btn-warning btn-floating"
                                           href="{{ route('books.edit', $book->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                @endcan
                                @can('delete-book')
                                    <td>
                                        <button class="btn btn-danger btn-floating trashRow"
                                                data-url="{{ route('books.destroy', $book->id) }}"
                                                data-id="{{ $book->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">هیچ کتابی یافت نشد.</td>
                        </tr>
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <!-- اگر نیاز به فوتر خاصی بود، اینجا اضافه کنید -->
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">{{ $books->appends(request()->all())->links() }}</div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
@endsection
