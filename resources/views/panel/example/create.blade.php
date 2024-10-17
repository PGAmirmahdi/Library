@extends('panel.layouts.master')
@section('title', 'ایجاد نمونه کار')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>ایجاد نمونه کار</h6>
            </div>
            <form id="product-form" action="{{ route('example.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                        <label for="title">عنوان<span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                        <label for="file">فایل</label>
                        <input type="file" name="file" class="form-control" id="main-video">
                        @error('file')
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
                    <table class="table table-bordered table-striped text-center" id="properties_table">
                        <thead>
                        <tr>
                            <th>
                                <button type="button" class="btn btn-success" id="add_row">افزودن سطر <i class="fa fa-plus"></i></button>
                            </th>
                            <th>ویژگی</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="properties[]" class="form-control" required>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-floating btn_remove" type="button"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <button class="btn btn-primary" type="submit">ثبت فرم</button>
                <div class="modal" id="uploadModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">در حال بارگذاری...</h5>
                            </div>
                            <div class="modal-body text-center">
                                <div class="progress-circle">
                                    <svg viewBox="0 0 36 36" class="circular-chart">
                                        <path class="circle-bg"
                                              d="M18 2.0845
                              a 15.9155 15.9155 0 0 1 0 31.831
                              a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                        <path class="circle"
                                              stroke-dasharray="0, 100"
                                              d="M18 2.0845
                              a 15.9155 15.9155 0 0 1 0 31.831
                              a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                        <text x="18" y="20.35" class="percentage">0%</text>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<style>
    .modal-content {
        width: 300px;
    }
    .textarea {
        width: 100%;
        min-height: 200px;
        border-radius: 5px;
        border: 1px solid gainsboro;
        padding: 5px;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.5);
        outline: 0;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .progress-circle {
        width: 100px;
        margin: auto;
    }
    .circular-chart {
        display: block;
        max-width: 100%;
        max-height: 100%;
    }
    .circle-bg {
        fill: none;
        stroke: #eee;
        stroke-width: 3.8;
    }
    .circle {
        fill: none;
        stroke-width: 2.8;
        stroke-linecap: round;
        stroke: #4caf50;
        transition: stroke-dasharray 0.3s;
    }
    .percentage {
        fill: #666;
        font-family: sans-serif;
        font-size: 0.5em;
        text-anchor: middle;
    }
    .table-responsive {
        margin-top: 20px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th, .table td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .btn_remove {
        font-size: 1.2em;
        padding: 5px 10px;
    }

    #add_row {
        margin-top: 10px;
    }


</style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var form = $('#product-form');
            var modal = $('#uploadModal');
            var circle = $('.circle');
            var percentageText = $('.percentage');

            form.on('submit', function (event) {
                event.preventDefault();

                var formData = new FormData(this);
                var textContent = $('#text').val();
                formData.set('text', textContent);

                modal.css('display', 'flex');

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        console.log("قبل از ارسال");
                        var percentVal = '0%';
                        percentageText.text(percentVal);
                    },
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                                var percentVal = percentComplete + '%';
                                var strokeDashArray = percentComplete + ', 100';
                                circle.attr('stroke-dasharray', strokeDashArray);
                                percentageText.text(percentVal);
                            }
                        }, false);
                        return xhr;
                    },
                    success: function (response) {
                        modal.hide();
                        alert('ارسال موفق');
                        window.location.href = "{{ route('example.index') }}";
                    },
                    error: function (xhr) {
                        modal.hide();
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = "خطا در اعتبارسنجی:<br>";
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    errorMessage += "- " + errors[key][0] + "<br>";
                                }
                            }
                            alert('خطا');
                        } else {
                            alert("مشکلی در ارسال فایل وجود دارد");
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addRowButton = document.getElementById('add_row');
            const tableBody = document.querySelector('#properties_table tbody');
            let rowCount = tableBody.querySelectorAll('tr').length;

            addRowButton.addEventListener('click', function() {
                rowCount++;
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
            <td>${rowCount}</td>
            <td>
                <input type="text" name="properties[]" class="form-control" required>
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
                    updateRowNumbers();
                }
            });

            function updateRowNumbers() {
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').textContent = index + 1;
                });
                rowCount = rows.length;
            }
        });

    </script>
@endsection
