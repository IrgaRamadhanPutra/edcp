<?php

namespace App\Http\Controllers;

use App\Models\Master_data_mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CheckPoint_Answer;
use DateTime;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DailyReportController extends Controller
{
    //
    public function index()
    {
        // return view('Report-daily-check.index');
        $name_mesin = Master_data_mesin::select('name_mesin', 'type')
            ->where('status', '=', 'ACTIVE')
            ->distinct()
            ->get();
        $type = Master_data_mesin::select('type')
            ->where('status', '=', 'ACTIVE')
            ->distinct()
            ->get();
        return view('Report-daily-check.index', ['name_mesin' => $name_mesin, 'type' => $type]);
    }
    public function get_master_mesin1(Request $request)
    {
        if ($request->ajax()) {
            $data = Master_data_mesin::select('name_mesin', 'type', 'descript')
                ->where('voided', '=', NULL)
                // ->where('voided_date', '=', NULL)
                ->where('status', 'ACTIVE')
                ->get();
            // dd($data);
            return DataTables::of($data)->make(true);
        }
    }
    public function checkData(Request $request)
    {
        // dd($request);
        $name = $request->mesin_create;
        $type = $request->type_create;
        $get_idmesin = Master_data_mesin::where('name_mesin', $name)
            ->where('type', $type)
            ->where('status', 'ACTIVE')
            ->select('id_mesin')
            ->first();
        // dd($get_idmesin);
        $id_mesin = $get_idmesin->id_mesin;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $data = CheckPoint_Answer::where('id_mesin', '=', $id_mesin)
            ->where('voided', '=', NULL)
            // $q->where('type_machine', '=', $type);
            ->whereBetween('created_date', [$from_date, $to_date])
            ->whereBetween('created_date', [$from_date, $to_date])
            ->orderBy('created_date', 'ASC')
            ->get();
        // dd($data);
        if ($data->isEmpty()) {
            return response()->json(['status' => 100, 'message' => 'Data Not Found']);
        } else {
            return response()->json(['data' => $data, 'status' => 200, 'message' => 'Data Not Exist']);
        }
    }
    public function reportpdf($data)
    {
        $price = explode("_", $data);
        $name = $price[0];
        $type = $price[1];
        $from_date = $price[2];
        $to_date = $price[3];
        // dd($v);
        // dd($from_date);
        $get_idmesin = Master_data_mesin::where('name_mesin', $name)
            ->where('type', $type)
            ->where('status', 'ACTIVE')
            ->select('id_mesin')
            ->first();
        // dd($get_idmesin);
        $id_mesin = $get_idmesin->id_mesin;
        $data1 = DB::connection('db_daily_check_mesin')->table('daily_checkpoint_answer')
            ->when($id_mesin != "PILIH", function ($q) use ($id_mesin) {
                $q->where('daily_checkpoint_answer.id_mesin', '=', $id_mesin);
            })
            ->when($id_mesin != "PILIH", function ($q) use ($from_date, $to_date) {
                $q->where('daily_checkpoint_answer.voided', '=', NULL);
                // $q->where('type_machine', '=', $type);
                $q->whereBetween('daily_checkpoint_answer.created_date', [$from_date, $to_date]);
            })
            ->join('master_data_mesin', 'daily_checkpoint_answer.id_mesin', '=', 'master_data_mesin.id_mesin')
            ->leftJoin('master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'master_data_pic.id_pic')
            ->leftJoin('master_data_pointsheet', 'daily_checkpoint_answer.id_point', '=', 'master_data_pointsheet.id_point')
            ->leftJoin('master_data_desc', 'master_data_pointsheet.id_desc', '=', 'master_data_desc.id_desc')
            ->leftJoin('kategori_checkpoint', 'master_data_desc.id_kategori', '=', 'kategori_checkpoint.id')
            ->select(
                'daily_checkpoint_answer.id_mesin',
                'daily_checkpoint_answer.daily_no',
                'daily_checkpoint_answer.answer',
                'daily_checkpoint_answer.date',
                'master_data_mesin.name_mesin',
                'master_data_mesin.type',
                'master_data_pic.id_pic',
                'master_data_pic.name',
                'master_data_pic.shift',
                'master_data_pic.Nik',
                'master_data_pointsheet.id_point',
                'master_data_desc.id_desc',
                'master_data_desc.standard',
                'kategori_checkpoint.kategori'

            )
            ->whereBetween('daily_checkpoint_answer.created_date', [$from_date, $to_date])
            ->orderBy('daily_checkpoint_answer.created_date', 'ASC')
            ->get();

        // dd($data1);
        //menamplkan pic terbaru untuk checkpoint
        $get_pic = CheckPoint_Answer::where('id_mesin', $id_mesin)
            ->leftJoin('master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'master_data_pic.id_pic')
            ->whereIn('master_data_pic.shift', ['A', 'B'])
            ->select('master_data_pic.id_pic', 'master_data_pic.name', 'master_data_pic.shift', 'master_data_pic.Nik')
            ->orderBy('daily_checkpoint_answer.created_date', 'desc') // Assuming you have a 'created_at' timestamp column
            ->get();
        //
        // dd($get_pic);
        $Get_pointsheet = DB::connection('db_daily_check_mesin')->table('master_data_pointsheet')
            ->select(
                'master_data_pointsheet.id_point',
                'master_data_pointsheet.id_mesin',
                'master_data_pointsheet.id_desc',
                'master_data_pointsheet.status',
                'master_data_pointsheet.voided',
                'master_data_pointsheet.created',
                'master_data_pointsheet.created_date',
                'master_data_desc.standard',
                'master_data_desc.id_desc',
                'kategori_checkpoint.id',
                'kategori_checkpoint.kategori'
            )
            ->leftJoin('master_data_desc', 'master_data_pointsheet.id_desc', '=', 'master_data_desc.id_desc')
            ->leftJoin('kategori_checkpoint', 'master_data_desc.id_kategori', '=', 'kategori_checkpoint.id')
            ->where('master_data_pointsheet.status', '=', 'ACTIVE')
            ->where('master_data_pointsheet.id_mesin', '=', $id_mesin)
            ->whereNull('master_data_pointsheet.voided')
            ->orderBy('kategori_checkpoint.created_date', 'asc')
            // ->orderBy('kategori_checkpoint.k_unik', 'asc')
            ->orderBy('master_data_desc.created_date')
            ->get();
        date_default_timezone_set("Asia/Jakarta");
        // $month = Carbon::now()->format('F');
        $date_parts = explode("-", $from_date);

        // Select the month part (index 1 in the array, as arrays are 0-indexed)
        $month = $date_parts[1];

        // $month_part will now contain the string "07"
        switch ($month) {
            case '01':
                $month_name_indonesia = 'JANUARI';
                break;
            case '02':
                $month_name_indonesia = 'FEBRUARI';
                break;
            case '03':
                $month_name_indonesia = 'MARET';
                break;
            case '04':
                $month_name_indonesia = 'APRIL';
                break;
            case '05':
                $month_name_indonesia = 'MEI';
                break;
            case '06':
                $month_name_indonesia = 'JUNI';
                break;
            case '07':
                $month_name_indonesia = 'JULI';
                break;
            case '08':
                $month_name_indonesia = 'AGUSTUS';
                break;
            case '09':
                $month_name_indonesia = 'SEPTEMBER';
                break;
            case '10':
                $month_name_indonesia = 'OKTOBER';
                break;
            case '11':
                $month_name_indonesia = 'NOVEMBER';
                break;
            case '12':
                $month_name_indonesia = 'DESEMBER';
                break;
        }
        // dd($month_name_indonesia);
        $Get_image = DB::connection('db_daily_check_mesin')
            ->table('master_data_daily_image')->select('img_daily', 'type_img')
            ->where('name_mesin', $name)
            ->where('type', $type)
            ->whereNull('voided')
            ->get();
        // dd($Get_image);
        // dd($Get_pointsheet);
        // dd($data1);
        $pdf = PDF::loadView('Report-daily-check.report_pdf', ['data1' => $data1, 'get_pic' => $get_pic, 'pointsheet' => $Get_pointsheet, 'month' => $month_name_indonesia, 'image' => $Get_image])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
