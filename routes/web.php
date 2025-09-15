<?php

use App\Http\Controllers\admin\AdminPerfil;
use App\Http\Controllers\admin\AdminPerfilController;
use App\Http\Controllers\admin\AgenteController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PropiedadController;
use App\Http\Controllers\admin\PropiedadEditarController;
use App\Http\Controllers\admin\ReseñasController;
use App\Http\Controllers\admin\SolicitudAgenteController;
use App\Http\Controllers\admin\UsuariosController;
use App\Http\Controllers\admin\VerSolicitudController;
use App\Http\Controllers\agent\CrearController;
use App\Http\Controllers\agent\DashboarAgentController;
use App\Http\Controllers\agent\PerfilController;
use App\Http\Controllers\agent\PropiedadesAgentController;
use App\Http\Controllers\agent\VerPropiedadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\page\AboutController;
use App\Http\Controllers\page\CompararController;
use App\Http\Controllers\page\ContactoController;
use App\Http\Controllers\page\FavoritoController;
use App\Http\Controllers\page\InfoAgenteController;
use App\Http\Controllers\page\MorePropiedadController;
use App\Http\Controllers\page\PagePerfilController;
use App\Http\Controllers\page\PaginaPerfilController;
use App\Http\Controllers\page\PropiedadesController;
use App\Http\Controllers\page\SolicitudController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;



Route::get('/',[HomeController::class,'index'])->name('home');


// pagina
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/contacto',[ContactoController::class,'index'])->name('contacto');
Route::post('/contacto',[ContactoController::class,'store'])->name('contacto.store');
Route::get('/perfil/{user}', [PagePerfilController::class, 'index'])->name('page.perfil')->middleware('auth');
Route::put('/perfil/{user}', [PagePerfilController::class, 'update'])->name('page.perfil.store');
Route::get('/propiedades', [PropiedadesController::class, 'index'])->name('page.propiedades');
Route::get('/quiero-ser-agente', [SolicitudController::class, 'index'])->name('page.solicitud')->middleware('auth', 'verified');
Route::post('/quiero-ser-agente', [SolicitudController::class, 'store'])->name('solicitud.store');
Route::get('/propiedad/{propiedad}/', [MorePropiedadController::class,'index'])->name('page.mas')->middleware('auth');
Route::get('/infoagente/{agente}', [InfoAgenteController::class,'show'])->name('page.agente.show')->middleware('auth');
Route::post('/infoagente/{agente}/rate', [InfoAgenteController::class, 'rate'])->name('agente.rate');
Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
Route::post('/favoritos/{propiedad}/toggle', [FavoritoController::class, 'toggle'])->name('favoritos.toggle');
Route::get('/comparar',[CompararController::class,'index'])->name('page.comparar.propiedades');
Route::post('/comparar-ia',[CompararController::class,'compararconIA'])->name('comparar.ia');
Route::post('/enriquecerPropiedades',[CompararController::class,'enriquecerPropiedades'])->name('propiedades.enriquecer');


//  Admin

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/propiedades', [PropiedadController::class, 'index'])->name('admin.propiedades');
    Route::get('/admin/editar/propiedad/{propiedad}', [PropiedadEditarController::class, 'index'])->name('admin.editar.propiedades');
    Route::get('/admin/agentes', [AgenteController::class, 'index'])->name('admin.agentes');
    Route::delete('/admin/agentes/{agente}', [AgenteController::class, 'destroy'])->name('admin.agentes.destroy');
    Route::get('/admin/solicitudes', [SolicitudAgenteController::class, 'index'])->name('admin.solicitud.agente');
    Route::post('/admin/solicitudes/{solicitud}/aceptar', [SolicitudAgenteController::class, 'aceptar'])->name('admin.solicitudes.aceptar');
    Route::post('/admin/solicitudes/{solicitud}/rechazar', [SolicitudAgenteController::class, 'rechazar'])->name('admin.solicitudes.rechazar');
    Route::get('/admin/ver-solicitud/{solicitud}', [VerSolicitudController::class, 'show'])->name('Admin.verSolicitud');
   Route::get('/admin/perfil',[AdminPerfilController::class,'index'])->name('admin.configuracion');
   Route::put('/admin/perfil',[AdminPerfilController::class,'update'])->name('admin.perfil.update');
   Route::get('/mensajes', [ReseñasController::class,'index'])->name('admin.mensajes');
   Route::get('/admin/usuarios',[UsuariosController::class,'index'])->name('admin.usuarios');
    Route::put('/users/{user}/role', [UsuariosController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/users/{user}', [UsuariosController::class, 'destroy'])->name('admin.users.destroy');
});

//  Agente

Route::get('/agente/dashboard', [DashboarAgentController::class, 'index'])
    ->name('agente.index')
    ->middleware(['auth', 'role:agente']);


Route::get('/agente/crear', [CrearController::class, 'index'])
    ->name('agente.crear')
    ->middleware(['auth', 'role:agente']);

Route::post('/agente/crear', [CrearController::class, 'store'])
    ->name('agente.crear.store')
    ->middleware(['auth', 'role:agente']);


Route::get('/agente/propiedades', [PropiedadesAgentController::class, 'index'])
    ->name('agente.propiedades')
    ->middleware(['auth', 'role:agente']);


Route::get('/agente/editar/propiedad/{propiedad}', [VerPropiedadController::class, 'index'])
    ->name('agente.editar.propiedad')
    ->middleware(['auth', 'role:agente']);

Route::put('/agente/editar/propiedad/{propiedad}', [CrearController::class, 'update'])
    ->name('agente.editar.propiedad.store')
    ->middleware(['auth', 'role:agente|admin']);

Route::delete('/agente/editar/propiedad/{propiedad}', [CrearController::class, 'destroy'])
    ->name('agente.editar.propiedad.destroy')
    ->middleware(['auth', 'role:agente|admin']);


Route::get('/agente/perfil', [PerfilController::class, 'index'])
    ->name('agente.perfil')
    ->middleware(['auth', 'role:agente']);

Route::put('/agente/perfil', [PerfilController::class, 'update'])
    ->name('agente.perfil.update')
    ->middleware(['auth', 'role:agente']);



require __DIR__.'/auth.php';