<?php

use App\Http\Controllers\admin\AgenteController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PropiedadController;
use App\Http\Controllers\admin\SolicitudAgenteController;
use App\Http\Controllers\agent\CrearController;
use App\Http\Controllers\agent\DashboarAgentController;
use App\Http\Controllers\agent\PropiedadesAgentController;
use App\Http\Controllers\page\PropiedadesController;
use App\Http\Controllers\page\SolicitudController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//PAGINA 
Route::get('/propiedades',[PropiedadesController::class,'index'])->name('page.propiedades');
Route::get('/quiero-ser-agente', [SolicitudController::class, 'index'])->name('page.solicitud')->middleware('auth','verified');
Route::post('/quiero-ser-agente', [SolicitudController::class, 'store'])->name('solicitud.store');

//ADMINISTRADOR
Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard')->middleware('auth','role:admin');
Route::get('/page/propiedades',[PropiedadController::class,'index'])->name('admin.propiedades')->middleware('auth','role:admin');
Route::get('/Agente',[AgenteController::class,'index'])->name('admin.agentes')->middleware('auth','role:admin');
Route::get('/solicitud',[SolicitudAgenteController::class,'index'])->name('admin.solicitud.agente')->middleware('auth','role:admin');
Route::post('/admin/solicitudes/{solicitud}/aceptar', [SolicitudAgenteController::class, 'aceptar'])->name('admin.solicitudes.aceptar');
Route::post('/admin/solicitudes/{solicitud}/rechazar', [SolicitudAgenteController::class, 'rechazar'])->name('admin.solicitudes.rechazar');

//AGENTE 
Route::get('/agente/dashboard',[DashboarAgentController::class,'index'])->name('agente.index')->middleware('auth','role:agente');
Route::get('/agente/crear',[CrearController::class,'index'])->name('agente.crear')->middleware('auth','role:agente');
Route::post('/agente/crear',[CrearController::class,'store'])->name('agente.crear.store');
Route::get('/agente/propiedades',[PropiedadesAgentController::class,'index'])->name('agente.propiedades')->middleware('auth','role:agente');
require __DIR__.'/auth.php';
