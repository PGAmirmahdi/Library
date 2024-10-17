@extends('panel.layouts.master')
@section('title', 'جزئیات تماس')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">جزئیات تماس</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h6>نام و نام خانوادگی</h6>
                    <p>{{ $call->name . ' ' . $call->family}}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>ایمیل</h6>
                    <p>{{ $call->email }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6>شماره تماس</h6>
                    <p>{{ $call->number }}</p>
                </div>
                <div class="col-12 mb-3">
                    <h6>توضیحات</h6>
                    <p>{{ $call->description }}</p>
                </div>
                <div class="col-12 mb-3">
                    <h6>تاریخ درخوست</h6>
                    <p>{{ verta($call->created_at)->format('H:i - Y/m/d') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-info">
                <i class="fa fa-backward mx-2"></i>
                بازگشت
            </a>
            <div class="d-flex row justify-content-center align-items-center">
            @can('calls-edit')
                <a href="{{ route('calls.edit', $call->id) }}" class="btn btn-warning mx-2">
                    <i class="fa fa-edit mx-2"></i>
                    ویرایش تماس
                </a>
            @endcan
            @can('calls-delete')
                <form action="{{ route('calls.destroy', $call->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">
                        <i class="fa fa-trash mx-2"></i>
                        حذف تماس
                    </button>
                </form>
            @endcan
            </div>

        </div>
    </div>
@endsection
