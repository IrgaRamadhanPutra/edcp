<?php

namespace App\Exports;

use App\Models\Daily_check_Entry;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DailyreportExport implements FromView, ShouldAutoSize
{
    protected $name;
    protected $type;
    protected $from_date;
    protected $to_date;

    public function __construct(string $name, $type, $from_date, $to_date)
    {
        $this->name = $name;
        $this->type = $type;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        // dd($to_date);
    }

    public function view(): View
    {
        $data = Daily_check_Entry::when($this->name != "PILIH", function ($q) {
            $q->where('name_machine', '=', $this->name);
        })
            ->when($this->type != "PILIH", function ($q) {
                $q->where('type_machine', '=', $this->type);
            })
            ->when($this->from_date && $this->to_date, function ($q) {
                $q->whereBetween('created_date', [$this->from_date, $this->to_date]);
            })
            ->whereNull('voided')
            ->orderBy('created_date', 'ASC')
            ->get();
        return view('Report-daily-check.report_pdf', compact('data'));
    }
}
