<?php

namespace App\Http\Controllers;


use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Master_data_image;
use App\Models\Master_data_image_log;
use App\Models\Master_data_mesin;
use Illuminate\Support\Facades\DB;
use Exception;

class ImageDailyController extends Controller
{
    //
    public function index()
    {
        return view('master-data-image.index');
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
    public function validasi_typegambar(Request $request)
    {

        $typ_gambar = $request->typ_gambar;
        $name_mesin = $request->name_mesin;
        $type_create_mesin = $request->type_create;
        // dd($type_create_mesin);
        $get_type = Master_data_image::where('name_mesin', $name_mesin)
            ->where('type', $type_create_mesin)
            ->where('type_img', $typ_gambar)
            ->whereNull('voided')
            ->select('type_img')
            ->get();
        // dd($get_type);
        return response()->json($get_type);
        // $validasi = Master_data_image::where('')
    }
    public function get_master_data2(Request $request)
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

    public function AddStore_masterimage(Request $request)
    {
        // dd($request);
        $name = $request->mesin_create;
        $type = $request->type_create;
        $image = $request->img_daily;
        $type_gambar = array_map('strtoupper', $request->type_image);

        // dd($image);
        date_default_timezone_set("Asia/Jakarta");
        $getSession = Auth::user()->user;
        $getDate =  Carbon::now();
        $data_status = 'ACTIVE';
        // $data = Master_data_image::insert([
        //     'name_mesin' => $name,
        //     'type' => $type,
        //     'img_daily' => $image,
        //     'status' => $data_status,
        //     'created_by' => $getSession,
        //     'creation_date' => $getDate,
        // ]);
        if (is_array($image) && count($image) > 0) {
            foreach ($image as $item => $value) {
                $data = array(
                    'name_mesin' => $name,
                    'type' => $type,
                    'img_daily' => $value,
                    'type_img' => $type_gambar[$item], // Menambahkan nilai $type_gambar berdasarkan index $item
                    'status' => $data_status,
                    'created_by' => $getSession,
                    'creation_date' => $getDate,
                );
                // dd($data);
                // Simpan data ke dalam database
                $get_data = Master_data_image::create($data);
            }
        } else {
            // Jika array kosong atau tidak terdefinisi
            // Tambahkan log atau lakukan tindakan yang sesuai
            // dd('Array $image kosong atau tidak terdefinisi');
        }

        return response()->json(['message' => 'Record created successfully.']);
    }
    public function GetDatatablesImage(Request $request)
    {
        if ($request->ajax()) {
            $data = Master_data_image::select(
                'id',
                'name_mesin',
                'type',
                'img_daily',
                'type_img',
                'status',
                'updated_by',
                'updated_date',
                'created_by',
                'creation_date'
            )
                ->orderByDesc('creation_date')
                ->whereNull('voided')
                ->where('status', 'ACTIVE')
                ->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('DT_RowIndex', function ($data) {
                    return $data->DT_RowIndex;
                })
                ->rawColumns(['action'])
                ->editColumn('action', function ($data) {
                    return view('master-data-image.action.action', [
                        'model' => $data,
                        // 'url_print' => route('tms.warehouse.stock_out_entry_report', base64_encode($data->jmesin))
                    ]);
                })
                ->make(true);
        }
    }
    public function void_master_data_image(Request $request)
    {
        // dd($jmesin);
        // dd($request);
        $id = $request->id_master;
        $master = $request->master_void;
        // dd($id);
        DB::beginTransaction();
        try {

            $data = Master_data_image::where('id', $id)->update([
                'voided' => Carbon::now()->format('Y-m-d'),
                'status' => 'NOT ACTIVE'
            ]);
            // dd($data);
            date_default_timezone_set("Asia/Jakarta");
            $date = Carbon::now();
            $time = Carbon::now()->format('H:i:s');
            $status = "VOID";
            $type =  $master;
            $userstaff = Auth::user()->user;
            // $note = 'Wh :' . $select->types . '/' . 'Item:'. $get_count .'/'. 'Qty:'. ' ' . $select->quantity;
            //     Master_Data_image_log::insert([
            //         'name_mesin' => $type,
            //         'date' => $date,
            //         'time' => $time,
            //         'status_change' => $status,
            //         'user' => $userstaff,
            //         'note' => $request->note !== '' ? $request->note : ''
            //     ]);
            DB::commit();
            return response()->json([
                'success' => true,
            ]);
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back();
        }
    }

    public function edit_daily_data(Request $request)
    {
        $id = $request->id;
        // dd($id);
        // dd($StoutHeader);
        // $code = $StoutHeader->name;
        $get_image   = Master_data_image::select(
            'id',
            'name_mesin',
            'type',
            'img',
            'img_daily',
        )
            ->where('id', '=', $id)
            ->first();
        // dd($get_image);
        echo json_encode($get_image);
        exit;
        return response()->json($get_image);
    }
}
