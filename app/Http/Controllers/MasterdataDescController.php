<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Master_data_desc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class MasterdataDescController extends Controller
{
    //
    public function index()
    {
        return view('master-data-desc.index');
    }
    public function Get_master_desc(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::connection('db_daily_check_mesin')
                ->table('master_data_desc')

                ->leftJoin('kategori_checkpoint', 'kategori_checkpoint.id', '=', 'master_data_desc.id_kategori')
                ->select(
                    'master_data_desc.*',
                    'kategori_checkpoint.kategori'
                )
                // ->groupBy('master_data_desc.id_mesin', 'master_data_desc.id_kategori')
                ->orderByDesc('master_data_desc.created_date')
                ->whereNull('master_data_desc.voided')
                ->where('master_data_desc.status', '=', 'ACTIVE')
                ->get();
            // dd($data);
            return DataTables::of($data)
                ->addColumn('DT_RowIndex', function ($data) {
                    static $rowIndex = 0;
                    return ++$rowIndex;
                })
                ->addColumn('action', function ($data) {
                    return view('master-data-desc.action-datatables.action', [
                        'model' => $data,
                        // 'url_print' => route('tms.warehouse.stock_out_entry_report', base64_encode($row->jmesin))
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function get_master_kategori(Request $request)
    {
        if ($request->ajax()) {
            $data = kategori::select('kategori', 'status')
                ->where('voided', '=', NULL)
                // ->where('voided_date', '=', NULL)
                ->where('status', 'ACTIVE')
                ->get();
            // dd($data);
            return DataTables::of($data)->make(true);
        }
    }

    public function validasi_standar(Request $request)
    {
        // dd($request);
        $kategori = $request->kategori;
        $standar1 = $request->standar1;
        $results = Master_data_desc::leftJoin('kategori_checkpoint', 'Master_data_desc.id_kategori', '=', 'kategori_checkpoint.id')
            ->where('master_data_desc.standard', $standar1)
            ->where('kategori_checkpoint.kategori', $kategori)
            ->whereNull('master_data_desc.voided')
            ->get();

        // dd($results);
        return response()->json($results);
        // $validasi_standar = Master_data_desc

    }
    public function AddMasterDesc(Request $request)
    {

        // dd($request);
        $kategori_create = $request->kategori_create;
        $get_idkategori = kategori::where('kategori', $kategori_create)
            ->select('id')
            ->first();
        $get_idkategori1 = $get_idkategori->id;
        // dd($get_idkategori1);
        // dd($get_id_kategori);
        date_default_timezone_set("Asia/Jakarta");

        $getDate = Carbon::now();
        $standar_mesin = $request->standar_mesin;

        $data = [];
        foreach ($standar_mesin as $item => $standar) {
            $data[] = [
                'id_kategori' => $get_idkategori1,
                'standard' => $standar,
                'created' => Auth::user()->user,
                'status' => 'ACTIVE',
                'created_date' => $getDate,
            ];
        }
        // dd($data);
        foreach ($data as $item) {
            $get_data = Master_data_desc::create($item);
        }
        // dd($data);
        return response()->json([
            'status' => 'Successfully Add'
        ]);
    }

    public function Edit_master_desc(Request $request)
    {
        $id = $request->id;
        $Get_masterDesc = DB::connection('db_daily_check_mesin')
            ->table('master_data_desc')

            ->leftJoin('kategori_checkpoint', 'kategori_checkpoint.id', '=', 'master_data_desc.id_kategori')
            ->select(
                'master_data_desc.*',
                'kategori_checkpoint.kategori'
            )
            // ->groupBy('master_data_desc.id_mesin', 'master_data_desc.id_kategori')
            ->orderByDesc('master_data_desc.created_date')
            ->whereNull('master_data_desc.voided')
            ->where('master_data_desc.id_desc', '=', $id)
            ->first();
        // dd($Get_masterDesc);
        echo json_encode($Get_masterDesc);
        exit;
        return response()->json($Get_masterDesc);
    }

    public function update_master_desc(Request $request)
    {
        // dd($request);

        $id = $request->edit_master_desc;
        $kategori = $request->kategori_edit;
        $standar = $request->standart_edit;

        $getkategori = kategori::where('kategori', $kategori)->pluck('id')->first();
        // dd($getkategori);
        date_default_timezone_set("Asia/Jakarta");
        $data = Master_data_desc::where('id_desc', $id)
            ->update([
                'id_kategori' => $getkategori,
                'standard' => $standar,
                'updated_by' => Auth::user()->user,
                'updated_date'  => Carbon::now()
            ]);

        // dd($data);
        return response()->json([
            'success' => true
        ]);
    }

    public function void_master_desc(Request $request)
    {
        // dd($jmesin);
        // dd($request);
        $id = $request->id_master;
        $master = $request->master_void;
        // dd($id);
        DB::beginTransaction();
        try {

            $data = Master_data_desc::where('id_desc', $id)->update([
                'voided' => Carbon::now()->format('Y-m-d'),
                'status' => 'NOT ACTIVE'
            ]);
            // dd($data);
            date_default_timezone_set("Asia/Jakarta");

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
