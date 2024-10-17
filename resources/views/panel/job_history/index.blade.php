@extends('panel.layouts.master')
@section('title', 'لیست تجربه‌های کاری')
@section('content')
    @can('list-JobHistory')
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h6>تجربه‌های کاری</h6>
                    <div>
                        <span>
                             تعداد روزهای کارکرد:<span>{{ $totalDaysWorked }} روز </span>
                        </span>
                    </div>
                    @can('create-JobHistory')
                        <a href="{{ route('JobHistory.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus mr-2"></i>
                            اضافه کردن تجربه کاری
                        </a>
                    @endcan
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>شرکت</th>
                            <th>دپارتمان</th>
                            <th>از تاریخ</th>
                            <th>تا تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobHistories as $key => $jobHistory)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $jobHistory->company }}</td>
                                <td>{{ $jobHistory->department }}</td>
                                <td>{{ $jobHistory->from_date}}</td>
                                <td>{{ $jobHistory->to_date}}</td>
                                <td>
                                    @can('edit-JobHistory')
                                        <a href="{{ route('JobHistory.edit', $jobHistory->id) }}"
                                           class="btn btn-warning">
                                            ویرایش
                                        </a>
                                    @endcan
                                    @can('delete-JobHistory')
                                        <form action="{{ route('JobHistory.destroy', $jobHistory->id) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                حذف
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $jobHistories2->links() }} {{-- Pagination --}}
                </div>
            </div>
        </div>
    @endcan
@endsection
