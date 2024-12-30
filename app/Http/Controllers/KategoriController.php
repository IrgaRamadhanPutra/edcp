<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Exception;

class KategoriController extends Controller
{
    //
    public function index()
    {
        return view('kategori.index');
    }
    public function validasi_kategori(Request $request)
    {
        // dd($request);
        $name = strtoupper($request->name);
        $kategori_creata = kategori::where('kategori', $name)
            ->select('kategori')
            ->get();
        return response()->json($kategori_creata);
    }
    public function Add_kategori(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $last_entry = kategori::where('status', 'ACTIVE')
            ->orderBy('created_date', 'desc')
            ->first();

        // ... kode selanjutnya ...
        if ($last_entry) {
            $last_k_unik = $last_entry->k_unik;
            $last_number = intval(substr($last_k_unik, 1));
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        $k_unik = 'k' . $new_number;

        // dd($last_entry);

        $name = strtoupper($request->name_kategori);
        $getSession = Auth::user()->user;
        date_default_timezone_set("Asia/Jakarta");
        $getDate =  Carbon::now();
        $data_status = 'ACTIVE';
        $data = kategori::create([
            'kategori' => $name,
            'k_unik' => $k_unik,
            'status' => $data_status,
            'created' => $getSession,
            'created_date' => $getDate,
        ]);
        // dd($data);
        return response()->json(['message' => 'Record created successfully.']);
    }
    public function get_kategori_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = kategori::select(
                'id',
                'kategori',
            )
                ->orderByDesc('created_date')
                ->where('voided', '=', NULL)
                // ->where('voided_date', '=', NULL)
                ->where('status', 'ACTIVE')
                ->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('DT_RowIndex', function ($data) {
                    return $data->DT_RowIndex;
                })
                ->rawColumns(['action'])
                ->editColumn('action', function ($data) {
                    return view('kategori.action-datatables.action', [
                        'model' => $data,
                        // 'url_print' => route('tms.warehouse.stock_out_entry_report', base64_encode($data->jmesin))
                    ]);
                })
                ->make(true);
        }
    }
    public function edit_master_kategori(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $StoutHeader   = kategori::where('id', $id)
            ->first();
        // dd($StoutHeader);
        // $code = $StoutHeader->name;
        $master   = kategori::select(
            'kategori',
        )
            ->where('id', '=', $id)
            ->first();
        // dd($master);
        echo json_encode($master);
        exit;
        return response()->json($master);
    }
    public function validasi_kategori2(Request $request)
    {
        // dd($request);
        $name = strtoupper($request->name);
        $kategori_creata = kategori::where('kategori', $name)
            ->select('kategori')
            ->get();
        return response()->json($kategori_creata);
    }
    public function update_master_kategori(Request $request)
    {

        $id = $request->id;
        $name = strtoupper($request->edit_kategori);
        // dd($id);
        date_default_timezone_set("Asia/Jakarta");
        $data = kategori::where('id', $id)
            // ->get();
            ->update([
                'kategori'       => strtoupper($name),
                'updated_by' => Auth::user()->user,
                'updated_date'  => Carbon::now(),
            ]);

        // dd($data);
        return response()->json([
            'success' => true
        ]);
    }

    public function void_master_kategori(Request $request)
    {
        // dd($jmesin);
        // dd($request);
        $id = $request->id_master;
        // $master = $request->master_void;
        // dd($id);
        DB::beginTransaction();
        try {

            $data = kategori::where('id', $id)->update([
                'voided' => Carbon::now()->format('Y-m-d'),
                'status' => 'NOT ACTIVE'
            ]);
            // dd($data);
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
