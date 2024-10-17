@extends('panel.layouts.master')
@section('title', 'لیست تماس‌ها')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>لیست تماس‌ها</h6>
                @can('calls-create')
                    <a href="{{ route('calls.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus mr-2"></i>
                        ایجاد تماس جدید
                    </a>
                @endcan
            </div>

            <!-- فرم جستجو -->
            <form action="{{ route('calls.search') }}" method="GET" class="mb-2">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="name" class="form-control" placeholder="نام" value="{{ request('name') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="family" class="form-control" placeholder="نام خانوادگی" value="{{ request('family') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="email" name="email" class="form-control" placeholder="ایمیل" value="{{ request('email') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="number" class="form-control" placeholder="شماره تماس" value="{{ request('number') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search mr-2"></i> جستجو
                        </button>
                        <a href="{{ route('calls.search') }}" class="btn btn-secondary">پاک‌کردن فیلترها</a>
                    </div>
                </div>
            </form>

            <!-- پایان فرم جستجو -->

            <div class="table-responsive">
                <table class="table table-striped table-bordered dataTable dtr-inline text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>شماره تماس</th>
                        <th>تاریخ ایجاد</th>
                        <th>مشاهده</th>
                        @can('calls-edit')
                            <th>ویرایش</th>
                        @endcan
                        @can('calls-delete')
                            <th>حذف</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($calls as $key => $call)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $call->name }}</td>
                            <td>{{ $call->family }}</td>
                            <td>{{ $call->email }}</td>
                            <td>{{ $call->number }}</td>
                            <td>{{ verta($call->created_at)->format('H:i - Y/m/d') }}</td>
                            <td>
                                <a class="btn btn-info btn-floating" href="{{ route('calls.show', $call->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            @can('calls-edit')
                                <td>
                                    <a class="btn btn-warning btn-floating" href="{{ route('calls.edit', $call->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            @endcan
                            @can('calls-delete')
                                <td>
                                    <button class="btn btn-danger btn-floating trashRow" data-url="{{ route('calls.destroy',$call->id) }}" data-id="{{ $call->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">{{ $calls->links() }}</div>
        </div>
    </div>
@endsection
