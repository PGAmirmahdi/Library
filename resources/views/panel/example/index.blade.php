@php use Illuminate\Support\Str; @endphp
@extends('panel.layouts.master')
@section('title', 'نمونه کارها')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>نمونه کارها</h6>
                <div>
                    @can('create-example')
                        <a href="{{ route('example.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus mr-2"></i>
                            ایجاد نمونه کار
                        </a>
                    @endcan
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered dataTable dtr-inline text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>فایل</th>
                        <th>عنوان</th>
                        <th>توضیحات</th>
                        <th>ویژگی‌ها</th>
                        <th>زمان آپلود</th>
                        <th>مشاهده</th>
                        @can('edit-example')
                            <th>ویرایش</th>
                        @endcan
                        @can('delete-example')
                            <th>حذف</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @if($examples && $examples->isNotEmpty())
                        @foreach($examples as $key => $example)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if($example->file)
                                        @php
                                            $fileExtension = pathinfo($example->file, PATHINFO_EXTENSION);
                                        @endphp

                                        @if(in_array($fileExtension, ['mp4', 'avi', 'mov'])) {{-- بررسی فرمت‌های ویدیو --}}
                                        <video width="320" height="240" controls>
                                            <source src="{{ route('example.file.show', ['filename' => basename($example->file)]) }}" type="video/{{ $fileExtension }}">
                                            مرورگر شما از پخش ویدیو پشتیبانی نمی‌کند.
                                        </video>
                                        @else
                                            <a href="{{ route('example.file.show', ['filename' => basename($example->file)]) }}"><img src="{{ route('example.file.show', ['filename' => basename($example->file)]) }}" alt="فایل" class="btn btn-info btn-sm" style="max-width: 100px; max-height: 100px;"></a>
                                        @endif
                                    @else
                                        <span class="text-muted">فایل ندارد</span>
                                    @endif

                                </td>
                                <td>{{ $example->title }}</td>
                                <td>{{ Str::limit($example->description, 60) }}</td>
                                <td>
                                    @php
                                        $properties = json_decode($example->properties, true);
                                    @endphp
                                    @foreach($properties as $property)
                                        <div>
                                            + {{ $property }} <br>
                                        </div>
                                    @endforeach
                                </td>
                                <td>{{ verta($example->created_at)->format('H:i - Y/m/d') }}</td>
                                <td>
                                    <a class="btn btn-info btn-floating"
                                       href="{{ route('example.show', $example->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                @can('edit-example')
                                    <td>
                                        <a class="btn btn-warning btn-floating"
                                           href="{{ route('example.edit', $example->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                @endcan
                                @can('delete-example')
                                    <td>
                                        <button class="btn btn-danger btn-floating trashRow"
                                                data-url="{{ route('example.destroy', $example->id) }}"
                                                data-id="{{ $example->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <!-- اگر نیاز به فوتر خاصی بود، اینجا اضافه کنید -->
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">{{ $examples->appends(request()->all())->links() }}</div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
@endsection
