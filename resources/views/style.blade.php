<style>
    .plyr__video-embed a  {
        max-width: 100%; /* ویدیوها به اندازه حداکثر عرض پدرشان تنظیم می‌شوند */
        height: 100vh; /* ارتفاع به صورت خودکار تنظیم می‌شود */
        margin:auto !important;
    }
    .plyr__video-embed video {
        max-width: fit-content; /* ویدیوها به اندازه حداکثر عرض پدرشان تنظیم می‌شوند */
        height: 100vh; /* ارتفاع به صورت خودکار تنظیم می‌شود */
        margin:auto !important;
    }
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        display: inline-block;
        padding: 8px 16px;
        border: 1px solid #007bff;
        border-radius: 4px;
        text-decoration: none;
        color: #007bff;
        font-size: 14px;
    }

    .pagination li a:hover {
        background-color: #007bff;
        color:#fff;
        transform:translateY(-10px);
    }

    .pagination li.active span{
        border-radius:4px;
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        border-color: rgba(255, 255, 255, 0.18);
    }

    .pagination li.disabled span {
        color: #ccc;
        padding: 8px 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .inner__gallery {
        display: flex;
        flex-wrap: wrap;
        margin: -10px; /* فاصله منفی برای حذف فاصله اضافی */
    }

    .gallery__item {
        padding: 10px;
        flex: 1 1 calc(25% - 20px); /* 4 ستون */
        box-sizing: border-box;
    }

    .gallery__item video,
    .gallery__item img {
        border-radius: 20px;
        width: 100%; /* ویدیوها و تصاویر به عرض ۱۰۰٪ */
        height: 100%; /* حفظ نسبت ابعاد */
    }

    @media (max-width: 768px) {
        .gallery__item {
            flex: 1 1 calc(50% - 20px); /* 2 ستون در صفحه‌های کوچک‌تر */
        }
    }

    @media (max-width: 480px) {
        .gallery__item {
            flex: 1 1 100%; /* 1 ستون در صفحه‌های خیلی کوچک */
        }
    }
</style>
