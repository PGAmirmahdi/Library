<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobHistoryRequest;
use App\Http\Requests\UpdateJobHistoryRequest;
use App\Models\JobHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class JobHistoryController extends Controller
{
    public function index()
    {
        $jobHistories = JobHistory::all();
        $totalDaysWorked = 0;

        foreach ($jobHistories as $jobHistory) {
            $fromDate = Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->from_date)->toCarbon())->startOfDay();
            $toDate = $jobHistory->to_date === 'تا اکنون' ? Carbon::now() : Carbon::parse(Jalalian::fromFormat('Y/m/d', $jobHistory->to_date)->toCarbon())->endOfDay();

            $diffInDays = $toDate->diffInDays($fromDate);
            $totalDaysWorked += $diffInDays;
        }
        $jobHistories2 = JobHistory::where('user_id', auth()->id())->paginate(10);
        return view('panel.job_history.index', compact('jobHistories2','jobHistories','totalDaysWorked'));
    }



    public function create()
    {
        return view('panel.job_history.create');
    }

    public function store(StoreJobHistoryRequest $request)
    {
        $to_date = $request->has('until_now') ? 'تا اکنون' : $request->input('to_date');

        $jobHistory = new JobHistory([
            'company' => $request->company,
            'department' => $request->department,
            'from_date' => $request->from_date,
            'to_date' => $to_date,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        $jobHistory->save();

        alert()->success('تجربه کاری با موفقیت اضافه شد');

        return redirect()->route('JobHistory.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // پیدا کردن رکورد با توجه به ID
        $jobHistory = JobHistory::findOrFail($id);

        // بازگشت به صفحه ویرایش به همراه اطلاعات
        return view('panel.job_history.edit', compact('jobHistory'));
    }


    public function update(UpdateJobHistoryRequest $request, $id)
    {
        try {
            // پیدا کردن رکورد مورد نظر
            $jobHistory = JobHistory::findOrFail($id);

            // به‌روزرسانی اطلاعات
            $jobHistory->update([
                'company' => $request->company,
                'department' => $request->department,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'description' => $request->description,
            ]);

            // نمایش پیام موفقیت
            alert()->success('تجربه کاری با موفقیت به‌روزرسانی شد');
        } catch (\Exception $e) {
            // نمایش پیام خطا
            alert()->error('خطایی در به‌روزرسانی تجربه کاری رخ داد: ' . $e->getMessage());
        }

        return redirect()->route('JobHistory.index');
    }

    public function destroy($id)
    {
        try {
            // پیدا کردن رکورد مورد نظر
            $job = JobHistory::findOrFail($id);

            // حذف رکورد
            $job->delete();

            // نمایش پیام موفقیت
            alert()->success('تجربه کاری با موفقیت حذف شد');
        } catch (\Exception $e) {
            // نمایش پیام خطا
            alert()->error('خطایی در حذف تجربه کاری رخ داد: ' . $e->getMessage());
        }

        return redirect()->route('JobHistory.index');
    }
}
