<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Example;
use App\Models\Favorite;
use App\Models\JobHistory;
use App\Models\Resume;
use App\Models\SiteVisit;
use App\Models\Skill;
use App\Models\User;
use App\Models\Call;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreCallRequest;
use function React\Promise\all;

class LandingController extends Controller
{

    public function index()
    {
        $user = User::where('name', 'محدثه')->first(['name', 'family', 'phone', 'role_id', 'profile','id']);
        $resume = Resume::where('user_id', $user->id)->get();
        $example = Example::where('user_id', $user->id)->orderbyDesc('id')->paginate(4);
        $example2 = Example::where('user_id', $user->id)->get();
        $customer = Customer::all();
        $favorites = Favorite::where('user_id', $user->id)->get();
        $skills = Skill::where('user_id', $user->id)->get();
        $jobHistories = JobHistory::where('user_id', $user->id)->get();
        $totalDaysWorked = 0;
        foreach ($jobHistories as $jobHistory) {
            $fromDate = Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->from_date)->toCarbon())->startOfDay();
            $toDate = $jobHistory->to_date === 'تا اکنون' ? Carbon::now() : Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->to_date)->toCarbon())->endOfDay();

            $diffInDays = $toDate->diffInDays($fromDate);
            $totalDaysWorked += $diffInDays;
        }
        // دریافت IP آدرس کاربر
        $ipAddress = request()->ip();

        // ذخیره‌سازی IP آدرس در دیتابیس
        SiteVisit::create([
            'ip_address' => $ipAddress,
        ]);
        return view('landing', compact('user', 'resume', 'example', 'customer','totalDaysWorked','skills','jobHistories','favorites','example2'));
    }
    public function Amirmahdi()
    {
        $user = User::where('name', 'امیرمهدی')->first(['name', 'family', 'phone', 'role_id', 'profile','id']);
        $resume = Resume::where('user_id', $user->id)->get();
        $example = Example::where('user_id', $user->id)->paginate(4);
        $example2 = Example::where('user_id', $user->id)->get();
        $customer = Customer::all();
        $favorites = Favorite::where('user_id', $user->id)->get();
        $skills = Skill::where('user_id', $user->id)->get();
        $jobHistories = JobHistory::where('user_id', $user->id)->get();
        $totalDaysWorked = 0;
        $name='امیرمهدی اسدی';
        $title="صفحه رزومه و اطلاعات کاری امیرمهدی اسدی،برنامه نویس و توسعه دهنده فول استک با اشتیاق و تلاشگر،آماده برای طراحی و توسعه هرگونه سایت،اپلیکیشن و وب اپلیکیشن های شما!";
        $url='https://moyazdani.ir/AmirmahdiAsadi';
        foreach ($jobHistories as $jobHistory) {
            $fromDate = Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->from_date)->toCarbon())->startOfDay();
            $toDate = $jobHistory->to_date === 'تا اکنون' ? Carbon::now() : Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->to_date)->toCarbon())->endOfDay();

            $diffInDays = $toDate->diffInDays($fromDate);
            $totalDaysWorked += $diffInDays;
        }
        // دریافت IP آدرس کاربر
        $ipAddress = request()->ip();

        // ذخیره‌سازی IP آدرس در دیتابیس
        SiteVisit::create([
            'ip_address' => $ipAddress,
        ]);
        return view('landing2', compact('user', 'resume', 'example', 'customer','totalDaysWorked','skills','jobHistories','favorites','name','title','url','example2'));
    }
    public function MohamadReza()
    {
        $user = User::where('name', 'محمدرضا')->first(['name', 'family', 'phone', 'role_id', 'profile','id']);
        $resume = Resume::where('user_id', $user->id)->get();
        $example = Example::where('user_id', $user->id)->paginate(3);
        $example2 = Example::where('user_id', $user->id)->get();
        $customer = Customer::all();
        $favorites = Favorite::where('user_id', $user->id)->get();
        $skills = Skill::where('user_id', $user->id)->get();
        $jobHistories = JobHistory::where('user_id', $user->id)->get();
        $totalDaysWorked = 0;
        $name='محمدرضا اکرمی فرد';
        $title="صفحه رزومه و اطلاعات کاری محمدرضا اکرمی فرد،برنامه نویس و توسعه دهنده اپلیکیشن موبایل با اشتیاق و تلاشگر،آماده برای طراحی و توسعه هرگونه نیاز های شما!";
        $url='https://moyazdani.ir/MohamadRezAkrami';
        foreach ($jobHistories as $jobHistory) {
            $fromDate = Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->from_date)->toCarbon())->startOfDay();
            $toDate = $jobHistory->to_date === 'تا اکنون' ? Carbon::now() : Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->to_date)->toCarbon())->endOfDay();

            $diffInDays = $toDate->diffInDays($fromDate);
            $totalDaysWorked += $diffInDays;
        }
        // دریافت IP آدرس کاربر
        $ipAddress = request()->ip();

        // ذخیره‌سازی IP آدرس در دیتابیس
        SiteVisit::create([
            'ip_address' => $ipAddress,
        ]);
        return view('landing2', compact('user', 'resume', 'example', 'customer','totalDaysWorked','skills','jobHistories','favorites','name','title','url','example2'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(StoreCallRequest $request)
    {
        Call::create($request->all());

        // بازگشت به صفحه لیست رکوردها با پیام موفقیت
        return redirect()->route('landing.index')->with('success', 'پیام با موفقیت ارسال شد.');;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showFile($filename)
    {
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('profile/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'profile/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }

    public function resumeFile($filename)
    {
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('resumes/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'resumes/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }

    public function exampleFile($filename)
    {
        if (Storage::disk('public')->exists('examples/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'examples/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
    public function skillFile($filename){
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('skills/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'skills/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
    public function favoriteFile($filename){
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('favorites/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'favorites/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
    public function userFile($filename){
        // بررسی وجود فایل در دیسک public
        if (Storage::disk('public')->exists('profile/' . $filename)) {
            // دریافت فایل و ارسال آن به مرورگر
            $filePath = 'profile/' . $filename;
            return response()->file(Storage::disk('public')->path($filePath));
        } else {
            // فایل پیدا نشد
            abort(Response::HTTP_NOT_FOUND, 'فایل پیدا نشد');
        }
    }
}
