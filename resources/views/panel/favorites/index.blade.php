@extends('panel.layouts.master')
@section('title', 'علاقه‌مندی‌ها')

@section('content')
    {{--  Favorite Modal  --}}
    <div class="modal fade" id="favoriteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="favoriteModalLabel">جزئیات علاقه‌مندی</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>عنوان</h5>
                    <p id="favorite_title"></p>
                    <h5>تصویر</h5>
                    <img id="favorite_picture" src="" alt="تصویر" style="max-width: 100%; height: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
    {{--  End Favorite Modal  --}}
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>علاقه‌مندی‌ها</h6>
                @can('favorites-create')
                    <a href="{{ route('favorites.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus mr-2"></i>
                        اضافه کردن علاقه‌مندی
                    </a>
                @endcan
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered dataTable dtr-inline text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان</th>
                        <th>تصویر</th>
                        @can('favorites-edit')
                            <th>ویرایش</th>
                        @endcan
                        @can('favorites-delete')
                            <th>حذف</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($favorites as $key => $favorite)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $favorite->title }}</td>
                            <td>
                                @if($favorite->picture)
                                    <img src="{{ route('favorites.file.show', ['filename' => basename($favorite->picture)]) }}" alt="مشاهده فایل" class="btn btn-info btn-sm" style="max-width: 100px; max-height: 100px;">
                                @else
                                    <span class="text-muted">تصویر ندارد</span>
                                @endif
                            </td>
                            @can('favorites-edit')
                                <td>
                                    <a href="{{ route('favorites.edit', $favorite->id) }}" class="btn btn-primary btn-floating">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            @endcan
                            @can('favorites-delete')
                                <td>
                                    <button class="btn btn-danger btn-floating trashRow" data-url="{{ route('favorites.destroy', $favorite->id) }}" data-id="{{ $favorite->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">هیچ علاقه‌مندی پیدا نشد</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">{{ $favorites->links() }}</div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn_show', function () {
                let favorite_id = $(this).data('id');

                $.ajax({
                    url: '/panel/get-favorite-info',
                    type: 'post',
                    data: {
                        favorite_id: favorite_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        $('#favorite_title').text(res.data.title);
                        $('#favorite_picture').attr('src', res.data.picture ? '/storage/' + res.data.picture : '');

                        if (!res.data.picture) {
                            $('#favorite_picture').attr('alt', 'تصویر ندارد');
                        }
                    },
                    error: function (err) {
                        console.error('Error fetching favorite info:', err);
                    }
                });
            });
        });
    </script>
@endsection

