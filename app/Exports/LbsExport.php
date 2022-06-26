<?php

namespace App\Exports;

use App\Models\Lbs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LbsExport implements FromCollection , WithMapping , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function  __construct($lbs_id)
    {
        $this->lbs_id= $lbs_id;
    }
    public function collection()
    {
        return Lbs::where('id', $this->lbs_id)->get();
    }
    public function map($users): array
    {
        return [
            $users->count,
            $users->end_time,
            $users->start_time,
            ucwords($users->days),
            $users->end_date,
            $users->start_date,
            ucwords($users->message),
            ucwords($users->scenario),
            $users->radius,
            $users->coordinates,
            ucwords($users->location),
            $users->id,
        ];
    }

    public function headings(): array
    {
        return [
            'تعداد ارسال',
            'ساعت پایان',
            'ساعت شروع',
            'روز های هفته',
            'تاریخ پایان',
            'تاریخ شروع',
            'متن پیام',
            'نوع سناریو',
            'شعاع (متر)',
            'مختصات جغرافیایی',
            'نام مکان',
            'ردیف',


        ];
    }
}
