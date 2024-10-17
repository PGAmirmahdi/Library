<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('users-list');

        $users = User::latest()->paginate(10);
        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('users-create');

        return view('panel.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('users-create');

        // ایجاد کاربر جدید
        $user = User::create([
            'name' => $request->name,
            'family' => $request->family,
            'phone' => $request->phone,
            'role_id' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        // ایجاد رزومه برای کاربر جدید و تنظیم user_id
        $user->resume()->create([
            'user_id' => $user->id, // شناسه کاربر که به تازگی ایجاد شده است
            'phone' => $request->phone, // یا هر مقدار پیش‌فرض دیگر
            'job' => 'بدون شغل', // مقدار پیش‌فرض برای شغل
            'job_history' => 0, // مقدار پیش‌فرض برای سابقه شغلی
        ]);
        if ($request->hasFile('profile')) {
            // حذف فایل قدیمی
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            // ذخیره فایل جدید
            $filePath = $request->file('profile')->store('profile', 'public');
            $user->profile = $filePath;
        }
        $user->save();
        // اجرای متد createLeaveInfo برای کاربر
        $this->createLeaveInfo($user);

        alert()->success('کاربر مورد نظر با موفقیت ایجاد شد','ایجاد کاربر');
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        if (!auth()->user()->isAdmin()){
            if (!Gate::allows('edit-profile',$user->id)){
                abort(403);
            }
        }

        return view('panel.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('users-edit');

        // به‌روزرسانی امضا برای ادمین‌ها
        if (auth()->user()->isAdmin()) {
            if ($request->hasFile('sign_image')) {
                if ($user->sign_image) {
                    // حذف فایل امضای قدیمی
                    unlink(public_path($user->sign_image));
                }
                // آپلود فایل جدید
                $sign_image = upload_file($request->file('sign_image'), 'Signs');
            } else {
                $sign_image = $user->sign_image;
            }
        } else {
            $sign_image = $user->sign_image;
        }

        // به‌روزرسانی اطلاعات کاربر
        $user->update([
            'name' => $request->name,
            'family' => $request->family,
            'phone' => $request->phone,
            'role_id' => $request->role ?? $user->role_id,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'sign_image' => $sign_image,
        ]);

        // به‌روزرسانی فایل پروفایل
        if ($request->hasFile('profile')) {
            // حذف فایل قدیمی پروفایل
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }
            // ذخیره فایل جدید پروفایل
            $filePath = $request->file('profile')->store('profile', 'public');
            $user->profile = $filePath;
        }

        // ذخیره تغییرات نهایی
        $user->save();

        // پیام موفقیت و بازگشت
        if (Gate::allows('edit-profile', $user->id)) {
            alert()->success('پروفایل شما با موفقیت ویرایش شد', 'ویرایش پروفایل');
            return redirect()->back();
        } else {
            alert()->success('کاربر مورد نظر با موفقیت ویرایش شد', 'ویرایش کاربر');
            return redirect()->route('users.index');
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('users-delete');

        $user->delete();
        return back();
    }

    private function createLeaveInfo(User $user)
    {
        DB::table('leave_info')->insert([
            'user_id' => $user->id,
            'count' => 2,
            'month_updated' => verta()->month,
        ]);
    }
}
