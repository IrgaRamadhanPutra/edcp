<?php

namespace App\Http\Controllers;

use App\db_tbs\GohinEntry;
use App\Models\CheckPoint_Answer;
use App\Models\Daily_check_Entry;
use App\Models\Master_data_mesin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Models\GohinEntry;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getDate = Carbon::now();

        // dd($type_mesin);
        return view('admin.home', compact('getDate'));
    }

    public function countdata_mesin(Request $request)
    {
        // dd($request);
        // buat menjumlahkan data per array
        $getDate = Carbon::now()->format('Y-m-d');
        $data = CheckPoint_Answer::select(
            'daily_checkpoint_answer.id_answer',
            'daily_checkpoint_answer.daily_no',
            'daily_checkpoint_answer.id_mesin',
            'daily_checkpoint_answer.id_pic',
            // 'daily_checkpoint_answer.id_kategori',
            'daily_checkpoint_answer.id_quiz',
            'daily_checkpoint_answer.date',
            'daily_checkpoint_answer.status',
            'daily_checkpoint_answer.voided',
            'daily_checkpoint_answer.created_date',
            'daily_checkpoint_answer.created_by',
            'master_data_mesin.name_mesin',
            'master_data_mesin.type',
            'master_data_pic.shift',
            'master_data_pic.name',
            DB::raw('GROUP_CONCAT(daily_checkpoint_answer.answer) as answer')
        )
            ->leftJoin('master_data_mesin', 'daily_checkpoint_answer.id_mesin', '=', 'master_data_mesin.id_mesin')
            ->leftJoin('master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'master_data_pic.id_pic')

            ->where('daily_checkpoint_answer.status', 'ACTIVE')
            ->where('daily_checkpoint_answer.created_date', $getDate)
            ->groupBy('daily_checkpoint_answer.daily_no')
            ->get()
            ->toArray();
        // dd($data);
        $result = [];

        foreach ($data as $item) {
            $item['answer'] = explode(',', $item['answer']);
            $result[] = $item;
        }

        // dd($result);

        // dd($data);\
        // $pic = [];
        // $name = [];
        // $type = [];
        // $shift = [];
        // foreach ($result as $item) {
        //     $nameMachine = $item['name_mesin'];
        //     $typeMachine = $item['type'];
        //     $shiftMachine = $item['shift'];
        //     $picMachine = $item['name'];

        //     // Tambahkan nilai ke array yang sesuai
        //     $name[] = $nameMachine;
        //     $type[] = $typeMachine;
        //     $shift[] = $shiftMachine;
        //     $pic[] = $picMachine;
        // }
        // dd($name);
        $abnormal = [];
        $ok = [];
        $rusak = [];
        $tidak_ada = [];
        // Menghitung jumlah status mesin
        foreach ($result as $value) {
            $answers = $value['answer']; // Get the 'answer' field
            $abnormal[] = count(array_filter($answers, function ($val) {
                return $val == "A";
            }));
            $ok[] = count(array_filter($answers, function ($val) {
                return $val == "O";
            }));
            $rusak[] = count(array_filter($answers, function ($val) {
                return $val == "R";
            }));
            $tidak_ada[] = count(array_filter($answers, function ($val) {
                return $val == "T";
            }));
        }
        $persentase = [];

        // Menghitung persentase status mesin dan memasukkannya ke dalam array persentase
        for ($i = 0; $i < count($abnormal); $i++) {
            $abnormal_total = $abnormal[$i];
            $ok_total = $ok[$i];
            $rusak_total = $rusak[$i];
            $tidak_ada_total = $tidak_ada[$i];

            $total = $abnormal_total + $ok_total + $rusak_total + $tidak_ada_total;

            $persentase[$i] = [
                'abnormal' => round(($abnormal[$i] / $total) * 100, 1),
                'ok' => round(($ok[$i] / $total) * 100, 1),
                'rusak' => round(($rusak[$i] / $total) * 100, 1),
                'tidak_ada' => round(($tidak_ada[$i] / $total) * 100, 1),
                'name_pic' =>  $result[$i]['name'],
                'name_mesin' =>  $result[$i]['name_mesin'],
                'type' => $result[$i]['type'],
                'shift' => $result[$i]['shift'],
            ];
        }

        // dd($persentase);
        return response()->json($persentase);



        // dd($tidak_ada);
        // dd($getDate);
        // $data = Daily_check_Entry::select(
        //     'PIC_mesin',
        //     'table_machine',
        //     'cable_connection',
        //     'floor_area',
        //     'wire_arranged',
        //     'cover',
        //     'no_water_leaks',
        //     'no_air_leaks',
        //     'pressure',
        //     'fine_filter',
        //     'check_rate',
        //     'clean_upper_lower',
        //     'sliding_machining',
        //     'function_normal',
        //     'category',
        //     'name_machine',
        //     'type_machine',
        //     'shift'
        // )
        //     ->where('status', "ACTIVE")
        //     ->where('created_date', $getDate)
        //     ->get()->toArray();
        // // // kedua
        // $name = [];
        // $type = [];
        // $shift = [];


        // foreach ($data as $item) {
        //     $nameMachine = $item['name_machine'];
        //     $typeMachine = $item['type_machine'];
        //     $shiftMachine = $item['shift'];

        //     // Tambahkan nilai ke array yang sesuai
        //     $name[] = $nameMachine;
        //     $type[] = $typeMachine;
        //     $shift[] = $shiftMachine;
        // }
        // // dd($name);
        // $abnormal = [];
        // $ok = [];
        // $rusak = [];
        // $tidak_ada = [];

        // // Menghitung jumlah status mesin
        // foreach ($data as $value) {
        //     $abnormal[] = count(array_filter(array_values($value), function ($val) {
        //         return $val == "Abnormal";
        //     }));
        //     $ok[] = count(array_filter(array_values($value), function ($val) {
        //         return $val == "OK";
        //     }));
        //     $rusak[] = count(array_filter(array_values($value), function ($val) {
        //         return $val == "Rusak";
        //     }));
        //     $tidak_ada[] = count(array_filter(array_values($value), function ($val) {
        //         return $val == "Tidak ada";
        //     }));
        // }
        // // dd($tidak_ada);
        // // Menghitung total status mesin
        // $abnormal_total = $abnormal[0];

        // $ok_total = $ok[0];
        // $rusak_total = $rusak[0];
        // $tidak_ada_total = $tidak_ada[0];

        // $total = $abnormal_total + $ok_total + $rusak_total + $tidak_ada_total;

        // $persentase = [];

        // // Menghitung persentase status mesin dan memasukkannya ke dalam array persentase
        // for ($i = 0; $i < count($abnormal); $i++) {
        //     $persentase[$i] = [
        //         'abnormal' => round(($abnormal[$i] / $total) * 100, 1),
        //         'ok' => round(($ok[$i] / $total) * 100, 1),
        //         'rusak' => round(($rusak[$i] / $total) * 100, 1),
        //         'tidak_ada' => round(($tidak_ada[$i] / $total) * 100, 1),
        //         'name' =>  $name[$i],
        //         'type' => $type[$i],
        //         'shift' => $shift[$i],
        //     ];
        // }

        // dd($persentase);
        // return response()->json($persentase);
    }
    public function calculation(Request $request)
    // {

    //     // dd($getDate);
    //     $getDate = Carbon::now()->format('Y-m-d');
    //     $data = CheckPoint_Answer::select(
    //         'daily_checkpoint_answer.id_answer',
    //         'daily_checkpoint_answer.daily_no',
    //         'daily_checkpoint_answer.id_mesin',
    //         'daily_checkpoint_answer.id_pic',
    //         'daily_checkpoint_answer.id_quiz',
    //         'daily_checkpoint_answer.date',
    //         'daily_checkpoint_answer.status',
    //         'daily_checkpoint_answer.voided',
    //         'daily_checkpoint_answer.created_date',
    //         'daily_checkpoint_answer.created_by',
    //         'master_data_mesin.name_mesin',
    //         'master_data_mesin.type',
    //         'master_data_pic.shift',
    //         DB::raw('GROUP_CONCAT(daily_checkpoint_answer.answer) as answer')
    //     )
    //         ->leftJoin('master_data_mesin', 'daily_checkpoint_answer.id_mesin', '=', 'master_data_mesin.id_mesin')
    //         ->leftJoin('master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'master_data_pic.id_pic')
    //         ->where('daily_checkpoint_answer.status', 'ACTIVE')
    //         ->where('daily_checkpoint_answer.created_date', $getDate)
    //         ->get()
    //         ->toArray();

    //     $result = [];

    //     foreach ($data as $item) {
    //         $item['answer'] = explode(',', $item['answer']);
    //         $result[] = $item;

    //         $abnormal = count(array_filter($item['answer'], function ($val) {
    //             return $val == "A";
    //         }));

    //         $ok = count(array_filter($item['answer'], function ($val) {
    //             return $val == "O";
    //         }));

    //         $rusak = count(array_filter($item['answer'], function ($val) {
    //             return $val == "R";
    //         }));

    //         $tidak_ada = count(array_filter($item['answer'], function ($val) {
    //             return $val == "T";
    //         }));

    //         $counts["A"][] = $abnormal;
    //         $counts["O"][] = $ok;
    //         $counts["R"][] = $rusak;
    //         $counts["T"][] = $tidak_ada;
    //     }
    //     // dd($result);
    //     $persentase = [];

    //     // Menghitung persentase status mesin dan memasukkannya ke dalam array persentase
    //     for ($i = 0; $i < count($result); $i++) {
    //         $abnormal_total = $counts["A"][$i];
    //         $ok_total = $counts["O"][$i];
    //         $rusak_total = $counts["R"][$i];
    //         $tidak_ada_total = $counts["T"][$i];

    //         $total = $abnormal_total + $ok_total + $rusak_total + $tidak_ada_total;

    //         $persentase[$i] = [
    //             'abnormal' => round(($abnormal_total / $total) * 100, 1),
    //             'ok' => round(($ok_total / $total) * 100, 1),
    //             'rusak' => round(($rusak_total / $total) * 100, 1),
    //             'tidak_ada' => round(($tidak_ada_total / $total) * 100, 1),
    //         ];
    //     }

    //     // dd($persentase);
    //     return response()->json($persentase);
    // }
    {
        $getDate = Carbon::now()->format('Y-m-d');
        $data = CheckPoint_Answer::select(
            'daily_checkpoint_answer.id_answer',
            'daily_checkpoint_answer.daily_no',
            'daily_checkpoint_answer.id_mesin',
            'daily_checkpoint_answer.id_pic',
            'daily_checkpoint_answer.id_quiz',
            'daily_checkpoint_answer.date',
            'daily_checkpoint_answer.status',
            'daily_checkpoint_answer.voided',
            'daily_checkpoint_answer.created_date',
            'daily_checkpoint_answer.created_by',
            'master_data_mesin.name_mesin',
            'master_data_mesin.type',
            'master_data_pic.shift',
            DB::raw('GROUP_CONCAT(daily_checkpoint_answer.answer) as answer')
        )
            ->leftJoin('master_data_mesin', 'daily_checkpoint_answer.id_mesin', '=', 'master_data_mesin.id_mesin')
            ->leftJoin('master_data_pic', 'daily_checkpoint_answer.id_pic', '=', 'master_data_pic.id_pic')
            ->where('daily_checkpoint_answer.status', 'ACTIVE')
            ->where('daily_checkpoint_answer.created_date', $getDate)
            ->get()
            ->toArray();

        $result = [];
        $counts = ["A" => [], "O" => [], "R" => [], "T" => []];

        foreach ($data as $item) {
            $item['answer'] = explode(',', $item['answer']);
            $result[] = $item;

            foreach (["A", "O", "R", "T"] as $status) {
                $count = count(array_filter($item['answer'], function ($val) use ($status) {
                    return $val == $status;
                }));
                $counts[$status][] = $count;
            }
        }

        $persentase = [];

        for ($i = 0; $i < count($result); $i++) {
            $abnormal_total = $counts["A"][$i];
            $ok_total = $counts["O"][$i];
            $rusak_total = $counts["R"][$i];
            $tidak_ada_total = $counts["T"][$i];

            $total = $abnormal_total + $ok_total + $rusak_total + $tidak_ada_total;

            if ($total > 0) {
                $persentase[$i] = [
                    'abnormal' => round(($abnormal_total / $total) * 100, 1),
                    'ok' => round(($ok_total / $total) * 100, 1),
                    'rusak' => round(($rusak_total / $total) * 100, 1),
                    'tidak_ada' => round(($tidak_ada_total / $total) * 100, 1),
                ];
            } else {
                $persentase[$i] = [
                    'abnormal' => 0,
                    'ok' => 0,
                    'rusak' => 0,
                    'tidak_ada' => 0,
                ];
            }
        }

        return response()->json($persentase);
    }
}
