@php use Illuminate\Support\Str; @endphp
@extends('panel.layouts.master')
@section('title', 'مهارت')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>مهارت</h6>
                <div>
                    @can('create-skill')
                        <a href="{{ route('skill.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus mr-2"></i>
                            ایجاد مهارت
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
                        @can('edit-skill')
                            <th>ویرایش</th>
                        @endcan
                        @can('delete-skill')
                            <th>حذف</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @if($skills && $skills->isNotEmpty())
                        @foreach($skills as $key => $skill)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if($skill->file)
                                        @php
                                            $fileExtension = pathinfo($skill->file, PATHINFO_EXTENSION);
                                        @endphp

                                        @if(in_array($fileExtension, ['mp4', 'avi', 'mov'])) {{-- بررسی فرمت‌های ویدیو --}}
                                        <video width="320" height="240" controls>
                                            <source src="{{ route('skill.file.show', ['filename' => basename($skill->file)]) }}" type="video/{{ $fileExtension }}">
                                            مرورگر شما از پخش ویدیو پشتیبانی نمی‌کند.
                                        </video>
                                        @else
                                            <a href="{{ route('skill.file.show', ['filename' => basename($skill->file)]) }}"><img src="{{ route('skill.file.show', ['filename' => basename($skill->file)]) }}" alt="فایل" class="btn btn-info btn-sm" style="max-width: 100px; max-height: 100px;"></a>
                                        @endif
                                    @else
                                        <span class="text-muted">فایل ندارد</span>
                                    @endif

                                </td>
                                <td>{{ $skill->title }}</td>
                                <td>{{ Str::limit($skill->description, 60) }}</td>
                                <td>
                                    @php
                                        $properties = json_decode($skill->properties, true);
                                    @endphp
                                    @foreach($properties as $property)
                                        <div>
                                            + {{ $property }} <br>
                                        </div>
                                    @endforeach
                                </td>
                                <td>{{ verta($skill->created_at)->format('H:i - Y/m/d') }}</td>
                                <td>
                                    <a class="btn btn-info btn-floating"
                                       href="{{ route('skill.show', $skill->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                @can('edit-skill')
                                    <td>
                                        <a class="btn btn-warning btn-floating"
                                           href="{{ route('skill.edit', $skill->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                @endcan
                                @can('delete-skill')
                                    <td>
                                        <button class="btn btn-danger btn-floating trashRow"
                                                data-url="{{ route('skill.destroy', $skill->id) }}"
                                                data-id="{{ $skill->id }}">
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
            <div class="d-flex justify-content-center">{{ $skills->appends(request()->all())->links() }}</div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
@endsection
