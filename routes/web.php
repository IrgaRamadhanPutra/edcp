<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('home', function () {
//     return view('pages.index');
// });

Route::group(['middleware' => 'auth'], function () {


    // Route::controller(HomeController)->group(function () {
    // });
    //pokayoke delivery ADM
    // Route::get('/view', 'ScanController@index')->name('view');
    // Route::get('/getscan', 'ScanController@index')->name('get_scan');
    // Route::get('/validasi', 'ScanController@validasi')->name('validasi');
    // Route::post('/getEkanbanAdmoutSp1', 'ScanController@getEkanbanAdmoutSp1')->name('getEkanbanAdmoutSp1');

    // //chek dn_no ADM
    // Route::get('/getdn', 'DnController@index')->name('get_dn');
    // Route::get('/tampil', 'DnController@tampil')->name('tampil');

    // //Toyota scan
    // Route::get('/gettoyota', 'ToyotaController@index')->name('get_toyota');
    // Route::get('/validasitoyota', 'ToyotaController@validasitoyota')->name('validasitoyota');
    // Route::post('/getEkanbanAdmoutSp6', 'ToyotaController@getEkanbanAdmoutSp6')->name('getEkanbanAdmoutSp6');

    // //check dn_no Ekspor Toyota
    // Route::get('/check_dn', 'DnToyotaContoller@index');
    // Route::get('/getcek_dn', 'DnToyotaContoller@getcek_dn')->name('getcek_dn');


    // //scan Reguler Toyota
    // Route::get('/scan_reguler', 'ToyotaRegulerController@index');

    //check dn Reguler Toyota
    // Route::get('/dn_reguler', 'DnToyotaRegulerController@index');
    // Scan In
    // Route::get('/index_scanIn', 'ScanInAdmController@index');
    // Route::get('/validasi_data', 'ScanInAdmController@validasi_data')->name('validasi_data1');
    // Route::get('/validasi_data2', 'ScanInAdmController@validasi_data2')->name('validasi_data2');
    // Route::post('/AddScanIn', 'ScanInAdmController@AddScanIn')->name('AddScanIn');


    //dashboard

    Route::get('/', 'HomeController@index');
    Route::get('/countdata_mesin', 'HomeController@countdata_mesin')->name('countdata_mesin');
    Route::get('/call', 'HomeController@calculation')->name('calculation');
    // Daily Check POint Mesin
    // Route::get('/index_CheckPoint', 'DailyCheckController@index');
    // Route::get('/get_checkpoint', 'DailyCheckController@get_checkpoint_datatables')->name('get_checkpoint_datatables');
    // // Route::get('/get_data', 'DailyCheckController@get_data_mesin')->name('get_data_mesin');
    // Route::get('/get_master_data', 'DailyCheckController@get_master_data')->name('get_master_data');
    // Route::get('/get_master_pic', 'DailyCheckController@get_master_pic')->name('get_master_pic');
    // Route::post('/add_Check_Point', 'DailyCheckController@add_Check_Point')->name('add_Check_Point');
    // Route::post('/validasi_point', 'DailyCheckController@validasi_point')->name('validasi_point');
    // Route::get('/view', 'DailyCheckController@view_daily_data')->name('view_daily_data');
    // Route::get('/edit_daily', 'DailyCheckController@edit_daily_data')->name('edit_daily_data');
    // Route::get('/get_master_edit', 'DailyCheckController@get_master_edit')->name('get_master_edit');
    // Route::get('/get_master_pic_edit', 'DailyCheckController@get_master_pic2')->name('get_master_pic2');
    // Route::post('/update_daily', 'DailyCheckController@update_daily_edit')->name('update_daily_edit');
    // Route::post('/void_daily', 'DailyCheckController@void_daily')->name('void_daily');

    // Kategori
    Route::get('/Kategori', 'KategoriController@index');
    Route::post('/validasi_kategori', 'KategoriController@validasi_kategori')->name('validasi_kategori');
    Route::post('/add_kategori', 'KategoriController@Add_kategori')->name('Add_kategori');
    Route::get('/get_kategori', 'KategoriController@get_kategori_datatables')->name('get_kategori_datatables');
    Route::get('/Edit_kategori', 'KategoriController@edit_master_kategori')->name('edit_master_kategori');
    Route::post('/validasi_kategori2', 'KategoriController@validasi_kategori2')->name('validasi_kategori2');
    Route::post('/Update_kategori', 'KategoriController@update_master_kategori')->name('update_master_kategori');
    Route::post('/void_kategori', 'KategoriController@void_master_kategori')->name('void_master_kategori');
    //master data mesin
    Route::get('/index_master_data', 'MasterDataController@index');
    Route::get('/get_data', 'MasterDataController@get_masterdata_datatables')->name('get_masterdata_datatables');
    Route::post('/validasi_type', 'MasterDataController@validasi_type')->name('validasi_type');
    Route::post('/AddStore', 'MasterDataController@AddStore_masterdata')->name('AddStore_masterdata');
    Route::get('/View', 'MasterDataController@view_master_data')->name('view_master_data');
    Route::get('/Edit', 'MasterDataController@edit_master_data')->name('edit_master_data');
    Route::post('/validasi_type2', 'MasterDataController@validasi_type2')->name('validasi_type2');
    Route::post('/Update', 'MasterDataController@update_master_data')->name('update_master_data');
    Route::post('/void', 'MasterDataController@void_master_data')->name('void_master_data');
    Route::get('/Log', 'MasterDataController@log_master_data')->name('log_master_data');

    //master data pic
    Route::get('/index_pic', 'MasterdataPicController@index');
    Route::get('/get_pic', 'MasterdataPicController@get_masterpic_datatables')->name('get_masterpic_datatables');
    Route::post('/validasi_nik', 'MasterdataPicController@validasi_nik')->name('validasi_nik');
    Route::post('/Addpic', 'MasterdataPicController@AddStore_masterpic')->name('AddStore_masterpic');
    Route::get('/view_pic', 'MasterdataPicController@view_master_pic')->name('view_master_pic');
    Route::get('/edit', 'MasterdataPicController@edit_master_pic')->name('edit_master_pic');
    Route::post('/validasi_nik2', 'MasterdataPicController@validasi_nik2')->name('validasi_nik2');
    Route::post('/update_pic', 'MasterdataPicController@update_master_pic')->name('update_master_pic');
    // Route::post('/update_pic', 'MasterdataPicController@update_master_pic')->name('update_master_pic');
    Route::post('/void_pic', 'MasterdataPicController@void_master_pic')->name('void_master_pic');

    // master data image check point
    Route::get('/index_image', 'ImageDailyController@index');
    Route::get('/get_master_data_mesin', 'ImageDailyController@get_master_data')->name('get_master_data');
    Route::post('/validasi_typegambar', 'ImageDailyController@validasi_typegambar')->name('validasi_typegambar');
    Route::post('/AddStore_masterimage', 'ImageDailyController@AddStore_masterimage')->name('AddStore_masterimage');
    Route::get('/get_master_data_mesin2', 'ImageDailyController@get_master_data2')->name('get_master_data2');
    Route::get('/GetDatatablesImage', 'ImageDailyController@GetDatatablesImage')->name('GetDatatablesImage');
    Route::post('/void_image', 'ImageDailyController@void_master_data_image')->name('void_master_data_image');
    Route::get('/edit_daily_data', 'ImageDailyController@edit_daily_data')->name('edit_daily_data');
    Route::post('/update_daily_data', 'ImageDailyController@update_master_image')->name('update_master_image');
    // Daily report
    Route::get('/indexdaily', 'DailyReportController@index');
    Route::get('/get_master_data_mesin1', 'DailyReportController@get_master_mesin1')->name('get_master_mesin1');
    Route::post('/check_daily', 'DailyReportController@checkData')->name('checkData');
    Route::get('/daily_report/{data}', 'DailyReportController@reportpdf')->name('reportpdf');
    // Route::get('/daily_report/{data}', 'DailyReportController@reportexcel')->name('reportexcel');

    //daily check point baru
    Route::get('/daily_check', 'DailyCheckpointController@index');
    Route::post('/validasi_shift', 'DailyCheckpointController@validasi_shift')->name('validasi_shift');
    Route::post('/dailY_validasi1', 'DailyCheckpointController@validasi1')->name('validasi1');
    Route::post('/validasipoint_length', 'DailyCheckpointController@validasipoint_length')->name('validasipoint_length');
    Route::post('/validasi_point1', 'DailyCheckpointController@validasi_point')->name('validasi_point');
    Route::get('/get_master_data', 'DailyCheckpointController@get_master_data')->name('get_master_data');
    Route::get('/get_master_pic', 'DailyCheckpointController@get_master_pic')->name('get_master_pic');
    Route::post('/add_answer', 'DailyCheckpointController@add_Check_Point_answer')->name('add_Check_Point_answer');
    Route::get('/Get_checkpoint', 'DailyCheckpointController@Get_checkpoint_datatables')->name('Get_checkpoint_datatables');
    Route::get('/view_daily_data', 'DailyCheckpointController@view_daily_data')->name('view_daily_data');



    // master data desc
    Route::get('/master_desc', 'MasterdataDescController@index');
    Route::get('/get_master_desc', 'MasterdataDescController@Get_master_desc')->name('Get_master_desc');
    Route::get('/get_kategori_check', 'MasterdataDescController@get_master_kategori')->name('get_master_kategori');
    Route::post('/validasi_standar', 'MasterdataDescController@validasi_standar')->name('validasi_standar');
    Route::post('/add_desc', 'MasterdataDescController@AddMasterDesc')->name('AddMasterDesc');
    Route::get('/edit_desc', 'MasterdataDescController@Edit_master_desc')->name('Edit_master_desc');
    Route::post('/update_master_desc', 'MasterdataDescController@update_master_desc')->name('update_master_desc');
    Route::post('/void_master_desc', 'MasterdataDescController@void_master_desc')->name('void_master_desc');


    // master data pointsheet
    Route::get('/master_point', 'MasterdataPointsheetController@index');
    Route::get('/get_master_meesin1', 'MasterdataPointsheetController@Get_master_mesin')->name('Get_master_mesin');
    Route::get('/get_master_desc1', 'MasterdataPointsheetController@Get_master_desc1')->name('Get_master_desc1');
    Route::post('/add_master_point', 'MasterdataPointsheetController@AddMasterPoint')->name('AddMasterPoint');
    Route::get('/validasi_standarmesin', 'MasterdataPointsheetController@validasi_standarmesin')->name('validasi_standarmesin');
    Route::get('/Get_master_pointsheet', 'MasterdataPointsheetController@Get_master_pointsheet')->name('Get_master_pointsheet');
    Route::get('/get_master_meesin2', 'MasterdataPointsheetController@Get_master_mesin_edit')->name('Get_master_mesin_edit');
    Route::get('/get_master_desc2', 'MasterdataPointsheetController@Get_master_desc2')->name('Get_master_desc2');
    Route::get('/edit_pointsheet', 'MasterdataPointsheetController@Edit_master_pointsheet')->name('Edit_master_pointsheet');
    Route::post('/update_master_pointsheet', 'MasterdataPointsheetController@update_master_pointsheet')->name('update_master_pointsheet');
    Route::post('/void_master_pointsheet', 'MasterdataPointsheetController@void_master_point')->name('void_master_point');



    // Register
    Route::get('/index_register', 'RegisterController@index');
    Route::post('/add_register', 'RegisterController@add_register')->name('Add_Register');
});



//auth
Route::get('/auth', 'LoginController@login')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout');

// Route::get('/home', 'HomeController@index');
