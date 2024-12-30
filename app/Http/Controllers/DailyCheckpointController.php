<?php

namespace App\Http\Controllers;

use App\Models\CheckPoint_Answer;
use Illuminate\Http\Request;
use App\Models\daily_checkpoint_answer;
use App\Models\Master_data_checkpoint;
use App\Models\Master_data_mesin;
use App\Models\Master_data_pic;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;
use Yajra\DataTables\DataTables;
// use Carbon\Carbon;

class DailyCheckpointController extends Controller
{
    //
    public function index()
    {

        //format 2308MKD-00011
        /* $last_entry = CheckPoint_Answer::orderBy('daily_no', 'desc')->first();


        $count = 1;
        if ($last_entry) {
            $count = intval(substr($last_entry->daily_no, -5)) + 1;
        }


        $random_chars = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 3);

        $check_point_no = Carbon::now()->format('ym') . $random_chars . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
 */

        //format 2308KB-Z7M
        $last_entry = CheckPoint_Answer::orderBy('daily_no', 'desc')->first();

        // Generate random characters and numbers for the second part after the hyphen
        $random_chars = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 2);
        $random_chars1 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 3);
        // $random_numbers = rand(100, 999); // Generate a random number between 100 and 999

        // Generate the new check_point_no value with the format "ym-xxxxx", where "xxxxx" is the random characters and numbers
        $check_point_no = Carbon::now()->format('ym') . substr($random_chars, 0, 2) . '-' . substr($random_chars1, 0, 3);


        // Create a new instance of the Daily_check_Entry model and set the check_point_no value to the generated value
        $data_CheckPoint = new CheckPoint_Answer();
        $data_CheckPoint->daily_no = $check_point_no;
        // Display a success message
        // $data_CheckPoint->save();
        $data_Check =  $data_CheckPoint->daily_no;
        // dd($data_Check);

        // dd($get_stoutno);
        $getDate = Carbon::now()->format('Y-m-d');
        // isikan nilai lainnya
        // $data_stout->save();
        return view('DAILY-NEW.index', compact('getDate', 'check_point_no', 'data_Check'));
    }

    public function Get_checkpoint_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::connection('db_daily_check_mesin')
                ->table('daily_checkpoint_answer')
                ->select(
                    'daily_checkpoint_answer.id_answer',
                    'daily_checkpoint_answer.daily_no',
                    'daily_checkpoint_answer.id_mesin',
                    'daily_checkpoint_answer.id_pic',
                    'daily_checkpoint_answer.answer',
                    'daily_checkpoint_answer.id_quiz',
                    'daily_checkpoint_answer.date',
                    'daily_checkpoint_answer.status',
                    'daily_checkpoint_answer.created_date',
                    'daily_checkpoint_answer.created_by',
                    // 'Master_data_desc.id_desc',
                    // 'Master_data_desc.standard',
                    // 'Master_data_desc.id_kategori',
                    'Master_data_mesin.name_mesin',
                    'Master_data_mesin.type',
                    // 'Master_data_checkpoint.id',
                    // 'Master_data_checkpoint.standard',
                    'Master_data_pic.name',
                    'Master_data_pic.shift',
                    'Master_data_pic.Nik',
                )
                ->leftJoin('Master_data_mesin', 'daily_checkpoint_answer.id_mesin', '=', 'Master_data_mesin.id_mesin')
                // ->leftJoin('master_data_desc', 'daily_checkpoint_answer.id_desc', '=', 'master_data_desc.id_desc')
                // ->leftJoin('Master_data_checkpoint', 'daily_checkpoint_answer.id_quiz', '=', 'Master_data_checkpoint.id')
                ->leftJoin('Master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'Master_data_pic.id_pic')
                // ->where('Master_data_mesin.voided', '=', NULL)
                // ->where('Master_data_mesin.status', '=', 'ACTIVE')
                // ->where('daily_checkpoint_answer.status', '=', 'ACTIVE')
                // ->where('Master_data_pic.voided', '=', NULL)
                // ->where('Master_data_pic.status', '=', 'ACTIVE')
                ->orderByDesc('daily_checkpoint_answer.daily_no')
                ->groupBy('daily_checkpoint_answer.daily_no')
                ->get();
            // dd($data);
            return Datatables::of($data)
                ->rawColumns(['action'])
                ->editColumn('action', function ($data) {
                    return view('DAILY-NEW.action-daily.action', [
                        'model' => $data,
                    ]);
                })
                ->make(true);
        }
    }
    public function get_master_data(Request $request)
    {
        if ($request->ajax()) {
            $data = Master_data_mesin::select('name_mesin', 'type', 'descript')
                ->where('voided', '=', NULL)
                // ->where('voided_date', '=', NULL)
                ->where('status', 'ACTIVE')
                ->get();
            // dd($data);
            return Datatables::of($data)->make(true);
        }
    }

    public function get_master_pic(Request $request)
    {
        if ($request->ajax()) {
            $data = Master_data_pic::select('name', 'shift', 'Nik', 'section')
                ->where('voided', '=', NULL)
                // ->where('voided_date', '=', NULL)
                ->where('status', 'ACTIVE')
                ->get();
            // dd($data);
            return Datatables::of($data)->make(true);
        }
    }
    public function validasipoint_length(Request $request)
    {
        $result = $request->result;
        $id_point = $request->id_point;

        // Menghitung panjang (length) dari array $result dan $id_point
        $resultLength = count($result);
        $idPointLength = count($id_point);

        // Melakukan validasi dan menentukan pesan sesuai dengan kondisi
        $response = [];
        if ($resultLength === $idPointLength) {
            $response['status'] = 'success';
            $response['message'] = 'Panjang data result dan id_point sama.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Panjang data result dan id_point berbeda.';
        }

        // Mengembalikan respons dalam bentuk JSON
        return response()->json($response);
    }



    public function validasi1(Request $request)
    {
        // dd($request);
        $mesin = $request->mesin_create;
        $type = $request->type_create;
        $get_idmesin = Master_data_mesin::where('name_mesin', $mesin)
            ->where('type', $type)
            ->select('id_mesin')
            ->first();

        $id_mesin = $get_idmesin->id_mesin;

        // $id_mesin = $get_idmesin->id_mesin;
        // dd($id_mesin);
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

        // dd($Get_pointsheet);
        // return view('Daily-check.create-daily.create', compact('Get_pointsheet'));
        return response()->json($Get_pointsheet);
    }
    public function validasi_point(Request $request)
    {
        // dd($request);
        $date_create = $request->Date_create;
        $date = substr($date_create, 8, 2);
        // dd($date);
        $mesin_create = $request->mesin_create;
        $type_create = $request->type_create;
        $pic_create = $request->pic_create;
        $nik_create = $request->nik_create;
        // $get_idmesin = Master_data_mesin::where('name_mesin', $mesin_create)->where('type')
        //     ->where('status', 'ACTIVE')
        //     // ->pluck('id_mesin')
        //     ->first();
        $get_idmesin = Master_data_mesin::where('name_mesin', $mesin_create)
            ->where('type', $type_create)
            ->pluck('id_mesin')
            ->first();
        // dd($get_idmesin);
        $get_idpic = Master_data_pic::where('name', $pic_create)
            ->where('Nik', $nik_create)
            ->pluck('id_pic')
            ->first();
        // dd($get_idpic);
        date_default_timezone_set("Asia/Jakarta");
        $getDate = Carbon::now()->format('Y-m-d');
        // $pic_create = $request->pic_create;
        $shift_create = $request->shift_create;
        $data = CheckPoint_Answer::where('date', $date)
            ->where('id_mesin', $get_idmesin)
            ->where('id_pic', $get_idpic)
            ->where('created_date', $getDate)
            ->select('id_mesin', 'id_pic')
            ->get();
        // dd($data);

        return response()->json($data);
    }

    public function validasi_shift(Request $request)
    {
        // dd($request);
        $shift_create = $request->shift_create;
        $type_create = $request->type_create;
        $mesin_create = $request->mesin_create;
        $get_idmesin = Master_data_mesin::where('name_mesin', $mesin_create)
            ->where('type', $type_create)
            ->pluck('id_mesin')
            ->first();
        // dd($get_idmesin);
        date_default_timezone_set("Asia/Jakarta");
        $getDate = Carbon::now()->format('Y-m-d');

        $data = CheckPoint_Answer::leftJoin('master_data_pic', 'master_data_pic.id_pic', '=', 'daily_checkpoint_answer.id_pic')
            ->select('master_data_pic.name', 'master_data_pic.shift', 'daily_checkpoint_answer.created_date', 'daily_checkpoint_answer.id_mesin')
            ->where('daily_checkpoint_answer.voided', '=', NULL)
            ->where('daily_checkpoint_answer.status', '=', 'ACTIVE')
            ->where('daily_checkpoint_answer.created_date', '=', $getDate)
            ->where('daily_checkpoint_answer.id_mesin', '=', $get_idmesin)
            ->where('master_data_pic.shift', '=', $shift_create)
            ->get();
        // dd($data);
        return response()->json($data);
    }
    public function add_Check_Point_answer(Request $request)
    {
        // dd($request);
        $daily_no = $request->Daily_create;
        $Date_create = $request->Date_create;
        $date = substr($Date_create, 8, 2);
        // dd($date);
        $mesin_create = $request->mesin_create;
        $type_create = $request->type_create;
        $pic_create = $request->pic_create;
        $shift_create = $request->shift_create;
        $nik_create = $request->nik_create;
        $result = $request->result;
        $id_point = $request->id_point;

        // if ($resultLength == $idQuizLength) {
        $get_idmesin = Master_data_mesin::where('name_mesin', $mesin_create)
            ->where('type', $type_create)
            ->pluck('id_mesin')
            ->first();

        $get_idpic = Master_data_pic::where('name', $pic_create)
            ->where('Nik', $nik_create)
            ->pluck('id_pic')
            ->first();

        date_default_timezone_set("Asia/Jakarta");
        $getSession = Auth::user()->user;
        $getDate = Carbon::now();
        $getTime = Carbon::now()->format('H:i:s');
        // dd($getTime);
        $data_status = 'ACTIVE';

        if (is_array($result) && is_array($id_point) && count($result) > 0 && count($id_point) > 0) {
            foreach ($result as $index => $value) {
                $data = array(
                    'daily_no' => $daily_no,
                    'id_mesin' => $get_idmesin,
                    'id_pic' => $get_idpic,
                    'id_point' => $id_point[$index],
                    'date' => $date,
                    'answer' => $value,
                    'time' => $getTime,
                    'status' => $data_status,
                    'created_date' => $getDate,
                    'created_by' => $getSession,
                );
                $get_data = CheckPoint_Answer::create($data);
            }
        } else {
            // Kode yang akan dijalankan jika $result atau $id_point kosong
        }
        return response()->json(['status' => 'Sukses', 'data' => $data]);
        // } else {
        //     return response()->json('Error: $resultLength tidak sama dengan $idQuizLength');
        // }
    }
    public function view_daily_data(Request $request)
    {
        // dd($request);
        $daily_no = $request->daily_no;
        // $data =
        //     DB::connection('db_daily_check_mesin')
        //     ->table('daily_checkpoint_answer')
        //     ->select(
        //         'daily_checkpoint_answer.id_answer',
        //         'daily_checkpoint_answer.daily_no',
        //         'daily_checkpoint_answer.id_mesin',
        //         'Master_data_mesin.name_mesin',
        //         'Master_data_mesin.type',
        //         'daily_checkpoint_answer.id_pic',
        //         'Master_data_pic.name',
        //         'Master_data_pic.shift',
        //         'Master_data_pic.Nik',
        //         'daily_checkpoint_answer.id_kategori',
        //         'kategori_checkpoint.kategori',
        //         'daily_checkpoint_answer.answer',
        //         'daily_checkpoint_answer.id_quiz',
        //         'Master_data_checkpoint.standard',
        //         'Master_data_checkpoint.id',
        //         'daily_checkpoint_answer.date',
        //         'daily_checkpoint_answer.status',
        //         'daily_checkpoint_answer.created_date',
        //         'daily_checkpoint_answer.created_by',
        //     )
        //     ->leftJoin('Master_data_mesin', 'daily_checkpoint_answer.id_mesin', '=', 'Master_data_mesin.id_mesin')
        //     ->leftJoin('Master_data_checkpoint', 'daily_checkpoint_answer.id_quiz', '=', 'Master_data_checkpoint.id')
        //     ->leftJoin('Master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'Master_data_pic.id_pic')
        //     ->leftJoin('kategori_checkpoint', 'daily_checkpoint_answer.id_kategori', '=', 'kategori_checkpoint.id')
        //     ->where('daily_checkpoint_answer.voided', '=', NULL)
        //     ->where('daily_checkpoint_answer.status', '=', 'ACTIVE')
        //     ->where('daily_checkpoint_answer.daily_no', $daily_no)
        //     ->orderBy('daily_checkpoint_answer.id_answer', 'asc') // Menambahkan pengurutan berdasarkan id_answer secara menaik
        //     ->get();


        $data = DB::connection('db_daily_check_mesin')
            ->table('daily_checkpoint_answer')
            ->select(
                'daily_checkpoint_answer.id_answer',
                'daily_checkpoint_answer.daily_no',
                'daily_checkpoint_answer.id_mesin',
                'daily_checkpoint_answer.id_pic',
                'daily_checkpoint_answer.answer',
                'daily_checkpoint_answer.id_quiz',
                'daily_checkpoint_answer.date',
                'daily_checkpoint_answer.status',
                'daily_checkpoint_answer.created_date',
                'daily_checkpoint_answer.created_by',
                'Master_data_desc.id_desc',
                'Master_data_desc.standard',
                'Master_data_desc.id_kategori',
                'Master_data_mesin.name_mesin',
                'Master_data_mesin.type',
                'Master_data_pic.name',
                'Master_data_pic.shift',
                'Master_data_pic.Nik',
                'kategori_checkpoint.kategori'
            )
            ->leftJoin('Master_data_mesin', 'daily_checkpoint_answer.id_mesin', '=', 'Master_data_mesin.id_mesin')
            ->leftJoin('master_data_pointsheet', 'daily_checkpoint_answer.id_point', '=', 'master_data_pointsheet.id_point')
            ->leftJoin('master_data_desc', 'master_data_pointsheet.id_desc', '=', 'master_data_desc.id_desc')
            // ->leftJoin('Master_data_checkpoint', 'daily_checkpoint_answer.id_quiz', '=', 'Master_data_checkpoint.id')
            ->leftJoin('Master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'Master_data_pic.id_pic')
            ->leftJoin('kategori_checkpoint', 'master_data_desc.id_kategori', '=', 'kategori_checkpoint.id')
            // ->where('Master_data_mesin.voided', '=', NULL)
            // ->where('Master_data_mesin.status', '=', 'ACTIVE')
            // ->where('Master_data_pic.voided', '=', NULL)
            // ->where('Master_data_pic.status', '=', 'ACTIVE')
            ->orderByDesc('daily_checkpoint_answer.created_date')
            ->where('daily_checkpoint_answer.daily_no', $daily_no)
            // ->orderBy('kategori_checkpoint.kategori', 'asc')
            ->orderBy('daily_checkpoint_answer.id_answer', 'asc')
            ->get();

        // dd($data);
        return response()->json($data);
        // dd($daily_no);
    }
}
