<?php

use App\Http\Controllers\Admin\Advertisment\AdvertismentController;
use App\Http\Controllers\Admin\Mosque\HaramController;
use App\Http\Controllers\Admin\Mosque\NabawiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Translation\TranslationController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Competition\CompetitionController;
use App\Http\Controllers\Admin\Config\ImaamsController;
use App\Http\Controllers\Admin\Config\MaudhinsController;
use App\Http\Controllers\Admin\Config\LanguageController;
use App\Http\Controllers\Admin\Config\SurahController;
use App\Http\Controllers\Admin\Config\YearController;
use App\Http\Controllers\Admin\GpsLocation\GpsLocationController;
use App\Http\Controllers\Admin\Mosque\MosqueController;
use App\Http\Controllers\Admin\Prayer\PrayerController;
use App\Http\Controllers\Admin\Video\VideoController;
use App\Http\Controllers\Admin\Gallery\GalleryController;

Route::group(['middleware' => 'RedirectIfAuthenticated'], function () {
    Route::get('/admin', [AdminController::class, 'loginView'])->name('admin.login.view');
    Route::post('/admin/loginCheck', [AdminController::class, 'adminLogin'])->name('admin.loginCheck');
});

Route::group(['middleware' => 'AuthCheck', 'prefix' => 'admin'], function () {
    Route::name('admin.')->group(
        function () {

            Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
            Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('home');
            Route::group(
                ["prefix" => "translation"],
                function () {
                        Route::get('/add', [TranslationController::class, 'index'])->name('Translation');
                        Route::post('/store', [TranslationController::class, 'store'])->name('Translation.Store');
                        Route::get('/list', [TranslationController::class, 'list'])->name('Translation.List');
                        Route::get('/list/datatable', [TranslationController::class, 'listDatatable'])->name('Translation.List.Datatable');
                        Route::get('/edit/{id}', [TranslationController::class, 'edit'])->name('Translation.Edit');
                        Route::post('/update/{id}', [TranslationController::class, 'update'])->name('Translation.Update');
                    }
            );
            Route::get('/mosque', [CategoryController::class, 'list'])->name('mosque.list');
            Route::get('/mosque/datatable', [CategoryController::class, 'showCategoryDatatable'])->name('mosque.list.datatable');
            Route::get('/mosqueEdit/{id}', [CategoryController::class, 'categoryView'])->name('mosqueEdit');
            Route::post('/mosqueEdit/store/{id}', [CategoryController::class, 'categoryEdit'])->name('mosqueEdit.store');

            Route::get('/submosque/add', [SubCategoryController::class, 'add'])->name('submosque.view');
            Route::post('/submosque/store', [SubCategoryController::class, 'store'])->name('submosque.store');
            Route::get('/submosque', [SubCategoryController::class, 'list'])->name('submosque.list');
            Route::get('/submosque/datatable', [SubCategoryController::class, 'showSubCategoryDatatable'])->name('submosque.list.datatable');
            Route::get('/submosqueEdit/{id}', [SubCategoryController::class, 'subcategoryView'])->name('submosqueEdit');
            Route::post('/submosqueEdit/store/{id}', [SubCategoryController::class, 'subcategoryEdit'])->name('submosqueEdit.store');

            Route::get('/imaam/add', [ImaamsController::class, 'add'])->name('imaam.view');
            Route::get('imaam/getsubcategories/{id}', [ImaamsController::class, 'getSubCate'])->name('imaam.getSubCate');
            Route::post('/imaam/store', [ImaamsController::class, 'store'])->name('imaam.store');
            Route::get('/imaam', [ImaamsController::class, 'list'])->name('imaam.list');
            Route::get('/imaam/datatable', [ImaamsController::class, 'showImaamDatatable'])->name('imaam.list.datatable');
            Route::get('/imaamEdit/{id}', [ImaamsController::class, 'showImaamEditView'])->name('imaamEdit');
            Route::post('/imaamEdit/store/{id}', [ImaamsController::class, 'immamEdit'])->name('imaam.update');
            Route::get('/imaamDelete/{id}', [ImaamsController::class, 'imaamsDelete'])->name('imaamDelete');


            Route::get('/maudhins/add', [MaudhinsController::class, 'add'])->name('maudhins.view');
            Route::post('/maudhins/store', [MaudhinsController::class, 'store'])->name('maudhins.store');
            Route::get('/maudhins', [MaudhinsController::class, 'list'])->name('maudhins.list');
            Route::get('/maudhins/datatable', [MaudhinsController::class, 'showMaudhinsDatatable'])->name('maudhins.list.datatable');
            Route::get('/maudhinsEdit/{id}', [MaudhinsController::class, 'showMaudhinsEditView'])->name('maudhinsEdit');
            Route::get('/maudhinsDelete/{id}', [MaudhinsController::class, 'maudhinsDelete'])->name('maudhinsDelete');
            Route::get('/mosque/nabawi/{id}', [MosqueController::class, 'nabawiList'])->name('mosque.nabawi');
            Route::get('/mosque/haram/{id}', [MosqueController::class, 'haramList'])->name('mosque.haram');
            Route::post('/maudhinsEdit/store/{id}', [MaudhinsController::class, 'maudhinsEdit'])->name('maudhins.update');

            Route::get('/language', [LanguageController::class, 'list'])->name('language.list');
            Route::get('/language/datatable', [LanguageController::class, 'showLanguageList'])->name('language.list.datatable');
            Route::get('/language/add', [LanguageController::class, 'add'])->name('language.view');
            Route::post('/language/store', [LanguageController::class, 'store'])->name('language.store');
            Route::get('/languageEdit/{id}', [LanguageController::class, 'edit'])->name('language.edit');
            Route::post('/languageEdit/store/{id}', [LanguageController::class, 'update'])->name('language.update');

            Route::get('/surah', [SurahController::class, 'list'])->name('surah.list');
            Route::get('/surah/datatable', [SurahController::class, 'showSurahList'])->name('surah.list.datatable');
            Route::get('/surah/add', [SurahController::class, 'add'])->name('surah.view');
            Route::post('/surah/store', [SurahController::class, 'store'])->name('surah.store');
            Route::get('getImaams/{id}', [SurahController::class, 'getImaams'])->name('surah.getImaams');
            Route::get('/surahEdit/{id}', [SurahController::class, 'edit'])->name('surah.edit');
            Route::post('/surah/update/{id}', [SurahController::class, 'update'])->name('surah.update');
            Route::get('surahDelete/{id}', [SurahController::class, 'delete'])->name('surah.delete');

            Route::get('/prayer/dashboard', [PrayerController::class, 'showPrayer'])->name('prayer.dashboard');
            Route::post('/getPrayer', [PrayerController::class, 'getPrayer'])->name('prayer.getPrayer');
            Route::get('/prayer/add', [PrayerController::class, 'add'])->name('prayer.add');
            Route::post('/prayer/store', [PrayerController::class, 'store'])->name('prayer.store');
            Route::get('/prayer/view', [PrayerController::class, 'view'])->name('prayer.view');
            Route::get('prayer/list', [PrayerController::class, 'list'])->name('prayer.list');
            Route::get('/prayer/datatable', [PrayerController::class, 'showPrayerDatatable'])->name('prayer.list.datatable');
            Route::get('prayer/prayerEdit/{id}', [PrayerController::class, 'editPrayer'])->name('prayer.prayerEdit');
            Route::post('/prayerTimes/add', [PrayerController::class, 'addPrayerTimes'])->name('prayerTime.add');


            Route::get('/year/add', [YearController::class, 'add'])->name('year.add');
            Route::post('/year/store', [YearController::class, 'store'])->name('year.store');
            Route::get('/year/list', [YearController::class, 'list'])->name('year.list');
            Route::get('/year/datatable', [YearController::class, 'yearDatatable'])->name('year.list.datatable');
            Route::get('/yearEdit/{id}', [YearController::class, 'edit'])->name('year.edit');
            Route::post('/year/update/{id}', [YearController::class, 'update'])->name('year.update');
            Route::get('/year/delete/{id}', [YearController::class, 'delete'])->name('year.delete');


            Route::get('/competition', [CompetitionController::class, 'list'])->name('competition.list');
            Route::get('/competition/datatable', [CompetitionController::class, 'showCompetitionDatatable'])->name('competition.list.datatable');
            Route::get('/competitionDelete/{id}', [CompetitionController::class, 'competitionDelete'])->name('competitionDelete');

            Route::get('/advertisment', [AdvertismentController::class, 'add'])->name('advertisment.add');
            Route::get('/advertisment/store', [AdvertismentController::class, 'store'])->name('advertisment.store');

            Route::get('/gpslocation', [GpsLocationController::class, 'dashboard'])->name('gpslocation.dashboard');
            Route::get('/gpsDashboard/{id}', [GpsLocationController::class, 'gpsDashboard'])->name('gps.dashboard');
            Route::post('/gpsHeading/add', [GpsLocationController::class, 'gpsDashboardAdd'])->name('gpsHeading.add');
            Route::get('gpsHeading/getSubHeading/{id}', [GpsLocationController::class, 'getSubHeading'])->name('gps.getSubHeading');
            Route::get('getSubHeading/list/{id}', [GpsLocationController::class, 'showSubHeadingDatatable'])->name('getSubHeading.list.datatable');
            Route::get('gpsHeading/geteditHeading/{id}', [GpsLocationController::class, 'getEditHeading'])->name('gps.getEditHeading');
            Route::post('gpsHeading/deleteHeading/{id}', [GpsLocationController::class, 'deleteHeading'])->name('gps.getEditHeading');
            Route::post('/gpsSubHeading/add', [GpsLocationController::class, 'gpsSubHeadingAdd'])->name('gpsSubHeading.add');
            Route::get('gpsSubHeading/subEditHeading/{id}', [GpsLocationController::class, 'subEditHeading'])->name('gps.subEditHeading');
            Route::get('gpsSubHeading/deletesubHeading/{id}', [GpsLocationController::class, 'deleteSubHeading'])->name('gps.deletesubHeading');

            Route::get('/video/dashboard', [VideoController::class, 'dashboardVideo'])->name('video.dashboard');
            Route::get('/video/category/{id}', [VideoController::class, 'videoCategory'])->name('video.category');
            Route::post('/video/category/store', [VideoController::class, 'videoCategoryStore'])->name('video.category.store');
            Route::get('/video/categoryEdit/{id}', [VideoController::class, 'videoCategoryEditView'])->name('video.category.edit');
            Route::post('/video/category/update', [VideoController::class, 'videoCategoryUpdate'])->name('video.category.update');
            Route::get('/video/subcategory/{id}', [VideoController::class, 'videoSubCategory'])->name('video.subcategory.list');
            Route::post('/video/subcategory/store', [VideoController::class, 'videoSubCategoryStore'])->name('video.subcategory.store');
            Route::get('/subcategorylist/datatable/{id}', [VideoController::class, 'showVideoSubcategoryDatatable'])->name('video.subcategorylist.datatable');
            Route::get('/video/subcategory/edit/{id}', [VideoController::class, 'videoSubCategoryEdit'])->name('video.subcategoryEdit');
            Route::post('/video/subcategory/update', [VideoController::class, 'videoSubCategoryUpdate'])->name('video.subcategory.update');

            Route::get('/gallery/category/dashboard', [GalleryController::class, 'dashboard'])->name('gallery.dashboard');
            Route::get('/gallery/category/add', [GalleryController::class, 'add'])->name('gallery.add');
            Route::post('/gallery/category/store', [GalleryController::class, 'store'])->name('gallery.store');

            Route::get('/gallery/data/add/{id}', [GalleryController::class, 'addGallery'])->name('gallery.data.add');
            Route::post('/gallery/data/store', [GalleryController::class, 'storeGallery'])->name('gallery.data.store');


            Route::get('/haram/list/{id}',[HaramController::class,"haramaDataList"])->name('haram.data.list');
            Route::get('/haram/data/list/datatable/', [HaramController::class, 'showHaramListDatatable'])->name('haram.data.list.datatable');

            Route::get('/nabawi/list/{id}',[NabawiController::class,"nabawiDataList"])->name('nabawi.data.list');
            Route::get('/nabawi/data/list/datatable/{id}', [NabawiController::class, 'showNabawiListDatatable'])->name('nabawi.data.list.datatable');

            //Live Stream
            Route::get('/nabawi/livestream/khutbah/{id}', [NabawiController::class, 'livestreamAdd'])->name('livestream.khutbah.add');
            Route::post('/nabawi/livestream/khutbah/store', [NabawiController::class, 'livestreamStore'])->name('nabawi.data.store');
            Route::get('/nabawi/livestream/khutbah/edit/{id}', [NabawiController::class, 'livestreamEdit'])->name('nabawi.livestream.khutbah.edit');
            Route::post('/nabawi/livestream/khutbah/update', [NabawiController::class, 'livestreamUpdate'])->name('nabawi.data.update');
            Route::get('/nabawi/livestream/khutbah/delete/{id}', [NabawiController::class, 'livestreamDelete'])->name('nabawi.livestream.khutbah.delete');

            //Friday Khutbahs
            Route::get('/nabawi/friday/khutbahs/{id}', [NabawiController::class, 'fridayKhutbahsAdd'])->name('nabawi.friday.khutbahs.data.add');
            Route::post('/nabawi/friday/khutbahs/store', [NabawiController::class, 'fridayKhutbahsStore'])->name('nabawi.friday.khutbahs.data.store');
            Route::get('/nabawi/friday/khutbahs/edit/{id}', [NabawiController::class, 'fridayKhutbahsEdit'])->name('nabawi.friday.khutbahs.data.edit');
            Route::post('/nabawi/friday/khutbahs/update', [NabawiController::class, 'fridayKhutbahsUpdate'])->name('nabawi.friday.khutbahs.data.update');
            Route::get('/nabawi/friday/khutbahs/delete/{id}', [NabawiController::class, 'fridayKhutbahsDelete'])->name('nabawi.friday.khutbahs.data.delete');

            //Live Stream
            Route::get('/nabawi/livestream/edit/{id}', [NabawiController::class, 'livestrEdit'])->name('nabawi.livestream.data.edit');
            Route::post('/nabawi/livestream/update', [NabawiController::class, 'livestrUpdate'])->name('nabawi.livestream.data.update');
            Route::get('/nabawi/livestream/delete/{id}', [NabawiController::class, 'livestrDelete'])->name('nabawi.livestream.data.delete');

            //Adhaan
            Route::get('/nabawi/adhaan/{id}', [NabawiController::class, 'adhaanAdd'])->name('nabawi.adhaan.data.add');
            Route::post('/nabawi/adhaan/store', [NabawiController::class, 'adhaanStore'])->name('nabawi.adhaan.data.store');
            Route::get('/nabawi/adhaan/edit/{id}', [NabawiController::class, 'adhaanEdit'])->name('nabawi.adhaan.data.edit');
            Route::post('/nabawi/adhaan/update', [NabawiController::class, 'adhaanUpdate'])->name('nabawi.adhaan.data.update');
            Route::get('/nabawi/adhaan/delete/{id}', [NabawiController::class, 'adhaanDelete'])->name('nabawi.adhaan.data.delete');

            //EidKhutbahs
            Route::get('/nabawi/eid/khutbahs/{id}', [NabawiController::class, 'eidKhutbahsAdd'])->name('nabawi.edi.khutbahs.data.add');
            Route::post('/nabawi/eid/khutbahs/store', [NabawiController::class, 'eidKhutbahsStore'])->name('nabawi.edi.khutbahs.data.store');
            Route::get('/nabawi/eid/khutbahs/edit/{id}', [NabawiController::class, 'eidKhutbahsEdit'])->name('nabawi.edi.khutbahs.data.edit');
            Route::post('/nabawi/eid/khutbahs/update', [NabawiController::class, 'eidKhutbahsUpdate'])->name('nabawi.edi.khutbahs.data.update');
            Route::get('/nabawi/eid/khutbahs/delete/{id}', [NabawiController::class, 'eidKhutbahsDelete'])->name('nabawi.edi.khutbahs.data.delete');

            //EidTakbeerat
            Route::get('/nabawi/eid/takbeerat/{id}', [NabawiController::class, 'eidTakbeeratAdd'])->name('nabawi.edi.takbeerat.data.add');
            Route::post('/nabawi/eid/takbeerat/store', [NabawiController::class, 'eidTakbeeratStore'])->name('nabawi.edi.takbeerat.data.store');
            Route::get('/nabawi/eid/takbeerat/edit/{id}', [NabawiController::class, 'eidTakbeeratEdit'])->name('nabawi.edi.takbeerat.data.edit');
            Route::post('/nabawi/eid/takbeerat/update', [NabawiController::class, 'eidTakbeeratUpdate'])->name('nabawi.edi.takbeerat.data.update');
            Route::get('/nabawi/eid/takbeerat/delete/{id}', [NabawiController::class, 'eidTakbeeratDelete'])->name('nabawi.edi.takbeerat.data.delete');

            //ImaamsRecitaion
            Route::get('/nabawi/imaams/recitaion/{id}', [NabawiController::class, 'imaamsRecitaionAdd'])->name('nabawi.imaams.recitaion.data.add');
            Route::post('/nabawi/imaams/recitaion/store', [NabawiController::class, 'imaamsRecitaionStore'])->name('nabawi.imaams.recitaion.data.store');
            Route::get('/nabawi/imaams/recitaion/edit/{id}', [NabawiController::class, 'imaamsRecitaionEdit'])->name('nabawi.imaams.recitaion.data.edit');
            Route::post('/nabawi/imaams/recitaion/update', [NabawiController::class, 'imaamsRecitaionUpdate'])->name('nabawi.imaams.recitaion.data.update');
            Route::get('/nabawi/imaams/recitaion/delete/{id}', [NabawiController::class, 'imaamsRecitaionDelete'])->name('nabawi.imaams.recitaion.data.delete');

            //PreviousTaraweehSalaah
            Route::get('/nabawi/previous/taraweeh/salaah/{id}', [NabawiController::class, 'previousTaraweehSalaahAdd'])->name('nabawi.previous.taraweeh.salaah.data.add');
            Route::post('/nabawi/previous/taraweeh/salaah/store', [NabawiController::class, 'previousTaraweehSalaahStore'])->name('nabawi.previous.taraweeh.salaah.data.store');
            Route::get('/nabawi/previous/taraweeh/edit/salaah/{id}', [NabawiController::class, 'previousTaraweehSalaahEdit'])->name('nabawi.previous.taraweeh.salaah.data.edit');
            Route::post('/nabawi/previous/taraweeh/salaah/update', [NabawiController::class, 'previousTaraweehSalaahUpdate'])->name('nabawi.previous.taraweeh.salaah.data.update');
            Route::get('/nabawi/previous/taraweeh/salaah/delete/{id}', [NabawiController::class, 'previousTaraweehSalaahDelete'])->name('nabawi.previous.taraweeh.salaah.data.delete');

            //JanazahSalaah
            Route::get('/nabawi/janazah/salaah/{id}', [NabawiController::class, 'janazahSalaahAdd'])->name('nabawi.janazah.salaah.data.add');
            Route::post('/nabawi/janazah/salaah/store', [NabawiController::class, 'janazahSalaahStore'])->name('nabawi.janazah.salaah.data.store');
            Route::get('/nabawi/janazah/salaah/edit/{id}', [NabawiController::class, 'janazahSalaahEdit'])->name('nabawi.janazah.salaah.data.edit');
            Route::post('/nabawi/janazah/salaah/update', [NabawiController::class, 'janazahSalaahUpdate'])->name('nabawi.janazah.salaah.data.update');
            Route::get('/nabawi/janazah/salaah/delete/{id}', [NabawiController::class, 'janazahSalaahDelete'])->name('nabawi.janazah.salaah.data.delete');

            //TableeghStyles
            Route::get('/nabawi/tableegh/styles/{id}', [NabawiController::class, 'tableeghStylesAdd'])->name('nabawi.tableegh.styles.data.add');
            Route::post('/nabawi/tableegh/styles/store', [NabawiController::class, 'tableeghStylesStore'])->name('nabawi.tableegh.styles.data.store');
            Route::get('/nabawi/tableegh/styles/edit/{id}', [NabawiController::class, 'tableeghStylesEdit'])->name('nabawi.tableegh.styles.data.edit');
            Route::post('/nabawi/tableegh/styles/update', [NabawiController::class, 'tableeghStylesUpdate'])->name('nabawi.tableegh.styles.data.update');
            Route::get('/nabawi/tableegh/styles/delete/{id}', [NabawiController::class, 'tableeghStylesDelete'])->name('nabawi.tableegh.styles.data.delete');

            //Talbiyah
            Route::get('/nabawi/talbiyah/{id}', [NabawiController::class, 'talbiyahAdd'])->name('nabawi.talbiyah.data.add');
            Route::post('/nabawi/talbiyah/store', [NabawiController::class, 'talbiyahStore'])->name('nabawi.talbiyah.data.store');
            Route::get('/nabawi/talbiyah/edit/{id}', [NabawiController::class, 'talbiyahEdit'])->name('nabawi.talbiyah.data.edit');
            Route::post('/nabawi/talbiyah/update', [NabawiController::class, 'talbiyahUpdate'])->name('nabawi.talbiyah.data.update');
            Route::get('/nabawi/talbiyah/delete/{id}', [NabawiController::class, 'talbiyahDelete'])->name('nabawi.talbiyah.data.delete');

            //Daily Salaah
            Route::get('/nabawi/daily/salaah/{id}', [NabawiController::class, 'dailySalaahAdd'])->name('nabawi.daily.salaah.data.add');
            Route::post('/nabawi/daily/salaah/store', [NabawiController::class, 'dailySalaahStore'])->name('nabawi.daily.salaah.data.store');
            Route::get('/nabawi/daily/salaah/edit/{id}', [NabawiController::class, 'dailySalaahEdit'])->name('nabawi.daily.salaah.data.edit');
            Route::post('/nabawi/daily/salaah/update', [NabawiController::class, 'dailySalaahUpdate'])->name('nabawi.daily.salaah.data.update');
            Route::get('/nabawi/daily/salaah/delete/{id}', [NabawiController::class, 'dailySalaahDelete'])->name('nabawi.daily.salaah.data.delete');


        });
    });
