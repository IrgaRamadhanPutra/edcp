<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Master_data_pic;
use App\Models\Master_data_pic_log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Exception;

class MasterdataPicController extends Controller
{
    //
    public function index()
    {
        return view('master-data-pic.index');
    }
    public function get_masterpic_datatables(Request $request)

    {

        // dd($request);
        if ($request->ajax()) {
            $data = Master_data_pic::select(
                'id_pic',
                'name',
                'Nik',
                'shift',
                'section'
            )
                ->orderByDesc('created_date')
                ->where('voided', '=', NULL)
                // ->where('voided_date', '=', NULL)
                ->where('status', 'ACTIVE')
                // ->groupByRaw('name')
                ->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('DT_RowIndex', function ($data) {
                    return $data->DT_RowIndex;
                })
                ->rawColumns(['action'])
                ->editColumn('action', function ($data) {
                    return view('master-data-pic.action-datatables.action', [
                        'model' => $data,
                        // 'url_print' => route('tms.warehouse.stock_out_entry_report', base64_encode($data->jmesin))
                    ]);
                })
                ->make(true);
        }
    }
    public function validasi_nik(Request $request)
    {
        // dd($request);
        $nik_creata = $request->nik;
        $nik_creata = Master_data_pic::where('Nik', $nik_creata)
            ->select('Nik')
            ->get();
        return response()->json($nik_creata);
    }
    public function AddStore_masterpic(Request $request)
    {
        // dd($request);
        $name = strtoupper($request->name_create);
        $shift = strtoupper($request->shift);
        $nik = $request->nik_create;
        $section = $request->section;
        $getSession = Auth::user()->user;
        $getDate =  Carbon::now();
        $data_status = 'ACTIVE';
        $data = Master_data_pic::insert([
            'name' => $name,
            'Nik' => $nik,
            'shift' => $shift,
            'section' => $section,
            'status' => $data_status,
            'created' => $getSession,
            'created_date' => $getDate,
        ]);
        // dd($data);
        date_default_timezone_set("Asia/Jakarta");
        $date = Carbon::now();
        $time = Carbon::now()->format('H:i:s');
        $status = "ADD";
        // $jmesin =  $itemcode;
        $userstaff = Auth::user()->user;
        // $note = 'Code :' . $code . '/' . 'FOH cost:' . $foh;
        $note = 'PIC:' . $name . '/' . 'shift:' . $shift;
        // Master_data_pic_log::insert([
        //     'pic' => $name,
        //     'status_change' => $status,
        //     'date' => $date,
        //     'time' => $time,
        //     'user' => $userstaff,
        //     'note' =>  $note
        // ]);
        return response()->json(['message' => 'Record created successfully.']);
    }
    public function view_master_pic(Request $request)
    {
        // dd($request);
        $id = $request->id;
        // dd($request);
        $StoutHeader   = Master_data_pic::where('id_pic', $id)
            ->first();
        // dd($StoutHeader);
        $code = $StoutHeader->name;
        $master   = Master_data_pic::select(
            'name',
            'shift',
            'section',
            'Nik'

        )
            ->where('name', '=', $code)
            ->where('id_pic', '=', $id)
            ->first();
        // dd($master);
        echo json_encode($master);
        exit;
        return response()->json($master);
    }

    public function edit_master_pic(Request $request)
    {
        $id = $request->id;

        $StoutHeader   = Master_data_pic::where('id_pic', $id)
            ->first();
        // dd($StoutHeader);
        $code = $StoutHeader->name;
        $master   = Master_data_pic::select(
            'name',
            'shift',
            'section',
            'Nik'
        )
            ->where('name', '=', $code)
            ->where('id_pic', '=', $id)
            ->first();
        // dd($master);
        echo json_encode($master);
        exit;
        return response()->json($master);
    }
    public function validasi_nik2(Request $request)
    {
        // dd($request);
        $nik_creata = $request->nik;
        $nik_creata = Master_data_pic::where('Nik', $nik_creata)
            ->select('Nik')
            ->get();
        return response()->json($nik_creata);
    }
    public function update_master_pic(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $name = strtoupper($request->name);
        $shift = strtoupper($request->shift);
        // dd($id);
        $data = Master_data_pic::where('id_pic', $id)
            // ->get();
            ->update([
                'name'       => strtoupper($request->name),
                'Nik'            => strtoupper($request->nik),
                'shift'            => strtoupper($request->shift),
                'section'         => $request->section,
                'updated_by' => Auth::user()->user,
                'updated_date'  => Carbon::now(),
            ]);

        // dd($data);
        date_default_timezone_set("Asia/Jakarta");
        $date = Carbon::now();
        $time = Carbon::now()->format('H:i:s');
        $status = "EDIT";
        // $jmesin =  $itemcode;
        $userstaff = Auth::user()->user;
        // $note = 'Code :' . $code . '/' . 'FOH cost:' . $foh;
        $note = 'PIC:' . $name . '/' . 'shift:' . $shift;
        // Master_data_pic_log::insert([
        //     'pic' => $name,
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
    public function void_master_pic(Request $request)
    {
        // dd($jmesin);
        // dd($request);
        $id = $request->id_master;
        $master = $request->master_void;
        // dd($id);
        DB::beginTransaction();
        try {

            $data = Master_data_pic::where('id_pic', $id)->update([
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
            // Master_data_pic_log::insert([
            //     'pic' => $type,
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
