<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Master_data_desc;
use App\Models\Master_data_mesin;
use App\Models\Master_data_pointsheet;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class MasterdataPointsheetController extends Controller
{
    //
    public function index()
    {
        return view('master-data-pointsheet.index');
    }

    public function Get_master_mesin(Request $request)
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

    public function Get_master_desc(Request $request)
    {
        if ($request->ajax()) {
            $data = Master_data_desc::select('master_data_desc.id_desc', 'master_data_desc.id_kategori', 'master_data_desc.standard')
                ->where('master_data_desc.status', 'ACTIVE')
                ->leftJoin('kategori_checkpoint', 'kategori_checkpoint.id', '=', 'master_data_desc.id_kategori')
                ->select('master_data_desc.id_desc', 'master_data_desc.id_kategori', 'master_data_desc.standard', 'kategori_checkpoint.id', 'kategori_checkpoint.kategori')
                ->get();
            // dd($data);
            return DataTables::of($data)->make(true);
        }
    }

    public function validasi_standarmesin(Request $request)
    {
        // dd($request);
        $mesin_create = $request->mesin_create;
        $Type_create = $request->type_create;
        $id_desc = $request->a;
        // dd($id_desc);
        $get_idmesin = Master_data_mesin::where('name_mesin', $mesin_create)->where('type', $Type_create)
            ->value('id_mesin');
        $validasi_standar_mesin = DB::connection('db_daily_check_mesin')->table('master_data_pointsheet')
            ->where('id_mesin', $get_idmesin)
            ->where('id_desc', $id_desc)
            ->where('status', 'ACTIVE')
            ->select('id_point')
            ->get();

        return response()->json($validasi_standar_mesin);
    }
    public function AddMasterPoint(Request $request)
    {
        // dd($request);
        date_default_timezone_set("Asia/Jakarta");
        $mesin_create = $request->mesin_create;
        $Type_create = $request->Type_create;
        $get_idmesin = Master_data_mesin::where('name_mesin', $mesin_create)->where('type', $Type_create)
            ->select('id_mesin')
            ->first();
        $get_idmesin1 = $get_idmesin->id_mesin;
        $id_desc = $request->id_desc;
        $date = now();
        $data = [];
        // dd($data);

        foreach ($id_desc as $item) {
            $data[] = [
                'id_mesin' => $get_idmesin1,
                'id_desc' => $item,
                'created' => Auth::user()->user,
                'status' => 'ACTIVE',
                'created_date' => $date,
            ];
        }
        // dd($data);
        foreach ($data as $item) {
            Master_data_pointsheet::create($item);
        }
        // dd($data);
        return response()->json([
            'status' => 'Successfully Add'
        ]);
        // dd($get_kategori);
        // $kategori1 = $get_kategori->kategori;
    }
    public function Get_master_pointsheet(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::connection('db_daily_check_mesin')
                ->table('master_data_pointsheet')
                ->leftJoin('master_data_desc', 'master_data_pointsheet.id_desc', '=', 'master_data_desc.id_desc')
                ->leftJoin('kategori_checkpoint', 'master_data_desc.id_kategori', '=', 'kategori_checkpoint.id')
                ->leftJoin('master_data_mesin', 'master_data_pointsheet.id_mesin', '=', 'master_data_mesin.id_mesin')
                ->select(
                    'master_data_pointsheet.id_point',
                    'master_data_pointsheet.id_mesin',
                    'master_data_pointsheet.id_desc',
                    'master_data_desc.standard',
                    // 'kategori_checkpoint.id',
                    'kategori_checkpoint.kategori',
                    'master_data_mesin.id_mesin',
                    'master_data_mesin.name_mesin',
                    'master_data_mesin.type'
                )
                ->whereNull('master_data_pointsheet.voided')
                ->where('master_data_pointsheet.status', 'ACTIVE')
                ->orderByDesc('master_data_pointsheet.created_date')
                ->get();
            // dd($data);
            return DataTables::of($data)
                ->addColumn('DT_RowIndex', function ($data) {
                    static $rowIndex = 0;
                    return ++$rowIndex;
                })
                ->addColumn('action', function ($data) {
                    return view('master-data-pointsheet.action-datatables.action', [
                        'model' => $data,
                        // 'url_print' => route('tms.warehouse.stock_out_entry_report', base64_encode($row->jmesin))
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function Get_master_mesin_edit(Request $request)
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
    public function Get_master_desc2(Request $request)
    {
        $data = DB::connection('db_daily_check_mesin')->table('master_data_desc')
            ->select('master_data_desc.id_desc', 'master_data_desc.id_kategori', 'master_data_desc.standard', 'kategori_checkpoint.id', 'kategori_checkpoint.kategori')
            ->where('master_data_desc.status', 'ACTIVE')
            ->leftJoin('kategori_checkpoint', 'kategori_checkpoint.id', '=', 'master_data_desc.id_kategori')
            ->get();

        // dd($data);

        return DataTables::of($data)->make(true);
    }
    public function Edit_master_pointsheet(Request $request)
    {
        $id = $request->id;
        // dd($request);
        $Get_masterpointsheet = DB::connection('db_daily_check_mesin')
            ->table('master_data_pointsheet')
            ->leftJoin('master_data_desc', 'master_data_pointsheet.id_desc', '=', 'master_data_desc.id_desc')
            ->leftJoin('kategori_checkpoint', 'master_data_desc.id_kategori', '=', 'kategori_checkpoint.id')
            ->leftJoin('master_data_mesin', 'master_data_pointsheet.id_mesin', '=', 'master_data_mesin.id_mesin')
            ->select(
                'master_data_pointsheet.id_point',
                'master_data_pointsheet.id_mesin',
                'master_data_pointsheet.id_desc',
                'master_data_desc.standard',
                'kategori_checkpoint.id',
                'kategori_checkpoint.kategori',
                'master_data_mesin.id_mesin',
                'master_data_mesin.name_mesin',
                'master_data_mesin.type'
            )
            ->whereNull('master_data_pointsheet.voided')
            ->where('master_data_pointsheet.status', 'ACTIVE')
            ->where('master_data_pointsheet.id_point', '=', $id)
            ->orderByDesc('master_data_pointsheet.created_date')
            ->first();
        // dd($Get_masterpointsheet);
        echo json_encode($Get_masterpointsheet);
        exit;
        return response()->json($Get_masterpointsheet);
    }

    public function update_master_pointsheet(Request $request)
    {
        // dd($request);

        $id = $request->edit_master_pointsheet;
        $mesin_edit = $request->mesin_edit;
        $type_edit = $request->type_edit;
        $Kategori_edit = $request->Kategori_edit;
        $standart_edit = $request->standart_edit;

        $get_idmesin = Master_data_mesin::where('name_mesin', $mesin_edit)
            ->where('type', $type_edit)->pluck('id_mesin')->first();
        $get_idkategori = kategori::where('kategori', $Kategori_edit)
            ->pluck('id')->first();
        // dd($get_idkategori);
        $get_iddesc = Master_data_desc::where('id_kategori', $get_idkategori)
            ->where('standard', $standart_edit)->pluck('id_desc')->first();
        // dd($get_iddesc);
        date_default_timezone_set("Asia/Jakarta");
        $data = Master_data_pointsheet::where('id_point', $id)
            ->update([
                'id_mesin' => $get_idmesin,
                'id_desc' => $get_iddesc,
                'updated_by' => Auth::user()->user,
                'updated_date'  => Carbon::now()
            ]);

        // dd($data);
        return response()->json([
            'success' => true
        ]);
    }

    public function void_master_point(Request $request)
    {
        // dd($jmesin);
        // dd($request);
        $id = $request->id_master;
        $master = $request->master_void;
        // dd($id);
        DB::beginTransaction();
        try {

            $data = Master_data_pointsheet::where('id_point', $id)->update([
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
