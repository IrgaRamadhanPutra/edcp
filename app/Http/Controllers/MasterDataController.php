<?php

namespace App\Http\Controllers;

use App\Models\Master_data_desc;
use App\Models\Master_data_log;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\models\Master_data_mesin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('master-data-mesin.index');
    }
    public function get_masterdata_datatables(Request $request)

    {
        // dd($request);
        // dd($request);
        if ($request->ajax()) {
            $data = Master_data_mesin::select(
                'id_mesin',
                'name_mesin',
                'type',
                'descript'
            )
                ->orderByDesc('created_date')
                ->where('voided', '=', NULL)
                // ->where('voided_date', '=', NULL)
                ->where('status', 'ACTIVE')
                ->groupByRaw('type')
                ->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('DT_RowIndex', function ($data) {
                    return $data->DT_RowIndex;
                })
                ->rawColumns(['action'])
                ->editColumn('action', function ($data) {
                    return view('master-data-mesin.action-datatables.action', [
                        'model' => $data,
                        // 'url_print' => route('tms.warehouse.stock_out_entry_report', base64_encode($data->jmesin))
                    ]);
                })
                ->make(true);
        }
    }

    public function validasi_type(Request $request)
    {
        $name = strtoupper($request->name);
        $type = strtoupper($request->type);
        // dd($type);
        $type_create = Master_data_mesin::where('type', $type)
            ->where('name_mesin', $name)
            ->select('type')
            ->get();
        return response()->json($type_create);
    }
    public function AddStore_masterdata(Request $request)
    {
        // dd($request);
        $name = strtoupper($request->name_create);
        $type = strtoupper($request->type);
        $desc = $request->desc;
        $getSession = Auth::user()->user;
        $getDate =  Carbon::now();
        $data_status = 'ACTIVE';
        $data = Master_data_mesin::insert([
            'name_mesin' => $name,
            'type' => $type,
            'descript' => $desc,
            'status' => $data_status,
            'created' => $getSession,
            'created_date' => $getDate,
        ]);
        date_default_timezone_set("Asia/Jakarta");
        $date = Carbon::now();
        $time = Carbon::now()->format('H:i:s');
        $status = "ADD";
        // $jmesin =  $itemcode;
        $userstaff = Auth::user()->user;
        // $note = 'Code :' . $code . '/' . 'FOH cost:' . $foh;
        $note = 'Type:' . $type . '/' . 'descript:' . $desc;
        // Master_data_log::insert([
        //     'type' => $type,
        //     'status_change' => $status,
        //     'date' => $date,
        //     'time' => $time,
        //     'user' => $userstaff,
        //     'note' =>  $note
        // ]);
        return response()->json(['message' => 'Record created successfully.']);
    }
    public function view_master_data(Request $request)
    {
        $id = $request->id;

        $StoutHeader   = Master_data_mesin::where('id_mesin', $id)
            ->first();
        // dd($StoutHeader);
        $code = $StoutHeader->type;
        $master   = Master_data_mesin::select(
            'name_mesin',
            'type',
            'descript',

        )
            ->where('type', '=', $code)
            ->where('id_mesin', '=', $id)
            ->get();
        // dd($master);
        echo json_encode($master);
        exit;
        return response()->json($master);
    }
    public function edit_master_data(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $StoutHeader   = Master_data_mesin::where('id_mesin', $id)
            ->first();
        // dd($StoutHeader);
        $code = $StoutHeader->type;
        $master   = Master_data_mesin::select(
            'name_mesin',
            'type',
            'descript',

        )
            ->where('type', '=', $code)
            ->where('id_mesin', '=', $id)
            ->get();
        // dd($master);
        echo json_encode($master);
        exit;
        return response()->json($master);
    }
    public function validasi_type2(Request $request)
    {
        $name = strtoupper($request->name);
        $type = strtoupper($request->type);
        // dd($type);
        $type_create = Master_data_mesin::where('type', $type)
            ->where('name_mesin', $name)
            ->select('type')
            ->get();
        return response()->json($type_create);
    }
    public function update_master_data(Request $request)
    {
        // dd($request);
        $id = $request->id;
        // dd($id);
        $data = Master_data_mesin::where('id_mesin', $id)
            // ->get();
            ->update([
                'name_mesin'       => strtoupper($request->name_edit),
                'type'            => $request->type,
                'descript'         => $request->desc,
                'updated_by' => Auth::user()->user,
                'updated_date'  => Carbon::now(),
            ]);

        // dd($data);
        date_default_timezone_set("Asia/Jakarta");
        $date = Carbon::now();
        $time = Carbon::now()->format('H:i:s');
        $status = "EDIT";
        // $name = strtoupper($request->name_create);
        $type = $request->type;
        $desc = $request->desc;
        // $jmesin =  $itemcode;
        $userstaff = Auth::user()->user;
        // $note = 'Code :' . $code . '/' . 'FOH cost:' . $foh;
        $note = 'Type:' . $type . '/' . 'descript:' . $desc;
        // Master_data_log::insert([
        //     'type' => $type,
        //     'status_change' => $status,
        //     'date' => $date,
        //     'time' => $time,
        //     'user' => $userstaff,
        //     'note' =>  $note
        // ]);
        return response()->json([
            'success' => true
        ]);
    }

    public function void_master_data(Request $request)
    {
        // dd($jmesin);
        // dd($request);
        $id = $request->id_master;
        $master = $request->master_void;
        // dd($id);
        DB::beginTransaction();
        try {

            $data = Master_data_mesin::where('id_mesin', $id)->update([
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
            // Master_data_log::insert([
            //     'type' => $type,
            //     'date' => $date,
            //     'time' => $time,
            //     'status_change' => $status,
            //     'user' => $userstaff,
            //     'note' => $request->note !== '' ? $request->note : ''
            // ]);
            DB::commit();
            return response()->json([
                'success' => true,
            ]);
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back();
        }
    }
}
