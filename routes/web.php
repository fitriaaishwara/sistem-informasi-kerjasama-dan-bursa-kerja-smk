<?php

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
Auth::routes(['verify' => true]);
Route::get('/auth',function(){
return view('welcome');
})->middleware('auth');
Route::get('/home','HomeController@index')->name('home');


// Route::get('/inputAlumni', function () {
//     return view('admin.inputDataAlumni');
// })->name('inputAlumni');
Route::get('/input', function () {
    return view('forminput');
});

//report
Route::get('/laporan','LaporanController@index')->name('dataAlumni')->middleware('auth');
Route::get('/laporan;','LaporanController@filtered')->name('laporan.filter')->middleware('auth');
Route::get('siswa/export/','LaporanController@export')->name('export.siswa')->middleware('auth');
Route::post('import', 'LaporanController@import')->name('import.siswa')->middleware('auth');


//alumni
Route::resource('/inputalumni','SiswaController')->middleware('auth');
Route::get('/json/alumni','SiswaController@json')->middleware('auth');
Route::get('/alumni/detail/{id}','SiswaController@detail')->middleware('auth');
Route::delete('inputalumni/delete/{id}','SiswaController@destroy')->middleware('auth');

//jurusan
Route::resource('/inputjurusan','JurusanController')->middleware('auth');
Route::get('/json/jurusan','JurusanController@json')->middleware('auth');
Route::delete('inputjurusan/delete/{id}','JurusanController@destroy')->middleware('auth');

//status
Route::resource('/riwayatStatus','StatusDetailController')->middleware('auth');
Route::get('/json/statusDetail','StatusDetailController@json')->middleware('auth');
Route::delete('riwayatStatus/delete/{id}','StatusDetailController@destroy')->middleware('auth');

//recycle bin
Route::get('/trash','SiswaController@trash')->middleware('auth');
Route::get('/json/alumni/trash','SiswaController@jsontrash')->middleware('auth');
Route::get('/alumni/restore/{id}','SiswaController@restore')->middleware('auth');
Route::get('/alumni/restore_all','SiswaController@restore_all')->middleware('auth');
Route::delete('/alumni/delete/{id}','SiswaController@destroy_permanent')->middleware('auth');

//rayon
Route::resource('/inputrayon','RayonController')->middleware('auth');
Route::get('/json/rayon','RayonController@json')->middleware('auth');
Route::delete('inputrayon/delete/{id}','RayonController@destroy')->middleware('auth');

//instansi
Route::resource('/inputinstansi','InstansiController')->middleware('auth');
Route::get('/json/instansi','InstansiController@json')->middleware('auth');
Route::delete('inputinstansi/delete/{id}','InstansiController@destroy')->middleware('auth');

//Product
Route::resource('ajaxproducts','ProductController')->middleware('auth');
Route::get('/user','UserController@index')->middleware('auth');

//AlumniDashboard
Route::post('/update/profile','HomeController@UpdateProfile')->name('profile.update')->middleware('auth');
Route::get('/EditProfil','HomeController@profiles')->name('profiles')->middleware('auth');
Route::post('/EditProfil','HomeController@editProfiles')->name('edit.profiles')->middleware('auth');
route::get('datatables','HomeController@datatables')->middleware('auth');
Route::get('status_detail/delete/{id}', 'HomeController@destroy')->middleware('auth');

//editstatus
Route::get('/editstatus','StatusController@index')->name('status.edit')->middleware('auth');
Route::post('/EditDetail','HomeController@editDetail')->name('edit.detail')->middleware('auth');
Route::post('/update/akademik','HomeController@UpdateAkademik')->name('akademik.update')->middleware('auth');

//ColorPreset
Route::get('/preset','PresetController@index')->name('preset')->middleware('auth');
Route::post('/preset/edit','PresetController@edit')->name('presetColor.submit')->middleware('auth');

//web Config
Route::get('/config','ConfigController@index')->name('config')->middleware('auth');
Route::post('/config/edit','ConfigController@edit')->name('config.submit')->middleware('auth');
//landing page
Route::get('/','LandingsController@index')->name('welcome');
// Form Lowongan
Route::get('/form-single-lowongan;{id}','LandingsController@form_single_lowongan');
Route::get('/form-full-lowongan','LandingsController@form_full_lowongan');
// Form Sekolah
Route::get('/form-single-sekolah;{id}','LandingsController@form_single_sekolah');
Route::get('/form-full-sekolah','LandingsController@form_full_sekolah');

// Input Info Sekolah
Route::get('/infosekolah','InfoSekolahController@index')->middleware('auth');
Route::get('/json/infosekolah','InfoSekolahController@json')->middleware('auth');
Route::get('/inputinfosekolah','InfoSekolahController@create')->middleware('auth');
Route::post('/inputinfosekolah/store','InfoSekolahController@store')->middleware('auth');
Route::get('/editinfosekolah;{id}','InfoSekolahController@edit')->middleware('auth');
Route::post('/editinfosekolah/update;{id}','InfoSekolahController@update')->middleware('auth');

Route::post('/infosekolah/active/{id}','InfoSekolahController@active')->middleware('auth');
Route::post('/infosekolah/deactive/{id}','InfoSekolahController@deactive')->middleware('auth');
Route::delete('infosekolah/delete/{id}','InfoSekolahController@destroy')->middleware('auth');

// Input Info Lowongan
Route::get('/infolowongan','InfoLowonganController@index')->middleware('auth');
Route::get('/json/infolowongan','InfoLowonganController@json')->middleware('auth');
Route::get('/inputinfolowongan','InfoLowonganController@create')->middleware('auth');
Route::post('/inputinfolowongan/store','InfoLowonganController@store')->middleware('auth');
Route::get('/editinfolowongan;{id}','InfoLowonganController@edit')->middleware('auth');
Route::post('/editinfolowongan/update;{id}','InfoLowonganController@update')->middleware('auth');

Route::post('/infolowongan/active/{id}','InfoLowonganController@active')->middleware('auth');
Route::post('/infolowongan/deactive/{id}','InfoLowonganController@deactive')->middleware('auth');
Route::get('/infolowongan/detail/{id}','InfoLowonganController@detail')->middleware('auth');
Route::delete('infolowongan/delete/{id}','InfoLowonganController@destroy')->middleware('auth');


// daftarinfoLowongan
Route::get('daftarinfolowongan','DaftarInfoLowonganController@index')->middleware('auth');


Route::post('/inputlamaran/store/{id}','DaftarInfoLowonganController@store')->middleware('auth');


// daftarInstansi
Route::get('/daftarinstansi','DaftarInstansiController@index')->middleware('auth');
Route::get('/detailinstansi;{id}','DaftarInstansiController@detailinstansi')->middleware('auth');

//CV
Route::get('/resume/{userId}','ResumeController@index')->middleware('auth');
Route::get('/resume/download/{userId}','ResumeController@download')->name('cv.download')->middleware('auth');

//Pesan
Route::resource('/pesan','PesanController')->middleware('auth');
Route::get('/json/pesan','PesanController@json')->middleware('auth');
Route::post('/pesan/active/{id}','PesanController@active')->middleware('auth');
Route::post('/pesan/deactive/{id}','PesanController@deactive')->middleware('auth');
Route::get('/pesan/detail/{id}','PesanController@detail')->middleware('auth');
Route::delete('pesan/delete/{id}','PesanController@destroy')->middleware('auth');

// Input Info Sekolah
Route::get('/portofolio','PortofolioController@index')->name('portofolio');
Route::get('/json/portofolio','PortofolioController@json')->middleware('auth');
Route::get('/inputportofolio','PortofolioController@create')->middleware('auth');
Route::post('/inputportofolio/store','PortofolioController@store')->middleware('auth');
Route::get('/editportofolio;{id}','PortofolioController@edit')->middleware('auth');
Route::post('/editportofolio/update;{id}','PortofolioController@update')->middleware('auth');

Route::post('/portofolio/active/{id}','PortofolioController@active')->middleware('auth');
Route::post('/portofolio/deactive/{id}','PortofolioController@deactive')->middleware('auth');
Route::delete('portofolio/delete/{id}','PortofolioController@destroy')->middleware('auth');

// Web Config
route::get('/piconfig','PicConfigController@index')->name('piconfig')->middleware('auth');


Route::get('/lamaransaya','DaftarInfoLowonganController@lamaransaya')->middleware('auth');
Route::get('/json/lamaransaya','DaftarInfoLowonganController@json')->middleware('auth');

Route::get('/datalamaran','DataLamaranController@index')->middleware('auth');
Route::get('/json/datalamaran','DataLamaranController@json')->middleware('auth');
Route::get('/datalamaran/detail/{id}','DataLamaranController@detail')->middleware('auth');
Route::post('/datalamaran/active/{id}','DaftarInfoLowonganController@active')->middleware('auth');
Route::post('/datalamaran/deactive/{id}','DaftarInfoLowonganController@deactive')->middleware('auth');
Route::delete('datalamaran/delete/{id}','DaftarInfoLowonganController@destroy')->middleware('auth');

Route::get('/doc/{id}','DaftarInfoLowonganController@download')->name('download')->middleware('auth');

Route::get('/detaillowongan;{id}','DaftarInfoLowonganController@detaillowongan')->middleware('auth');
Route::get('/inputLamaran;{id}','DaftarInfoLowonganController@create')->middleware('auth');