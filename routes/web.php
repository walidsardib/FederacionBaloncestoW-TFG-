<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ScoutingController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\NoticiaController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //RUTAS EQUIPO
    Route::get('/', [EquipoController::class, 'index'])->name('equipos.index');
    Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
    Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
    Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
    Route::get('/equipos/profile/{equipo}', [EquipoController::class, 'profile'])->name('equipos.profile');

    //RUTAS LIGAS Y JORNADAS
    //Route::get('/ligas/{id}/edit', [LigaController::class, 'edit'])->name('ligas.edit');
    Route::get('/ligas/{id}/delete', [LigaController::class, 'destroy'])->name('ligas.delete');
    Route::resource('ligas', LigaController::class);
    Route::post('ligas/generar-jornadas', [LigaController::class, 'generarJornadas'])->name('ligas.generarJornadas');
    Route::get('ligas/gestionar-equipos', [LigaController::class, 'gestionarEquipos'])->name('ligas.gestionarEquipos');

    //RUTA DE JUGADORES
    Route::get('/jugadores/create', [JugadorController::class, 'create'])->name('jugadores.create');
    Route::post('/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
    Route::get('/jugadores/{jugador}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit');
    Route::put('/jugadores/{jugador}', [JugadorController::class, 'update'])->name('jugadores.update');
    Route::delete('/jugadores/{jugador}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');
    Route::get('/jugadores/estadisticas/{jugador}', [JugadorController::class, 'index'])->name('jugadores.index');    //RUTAS PERFIL  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //RUTA DE SCOUTING
    Route::get('/scouting', [ScoutingController::class, 'index'])->name('scouting.index');

    //RUTA DE PARTIDOS
    Route::get('/partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
    Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');
    Route::get('/partidos/{partido}/show', [PartidoController::class, 'show'])->name('partidos.show');
    Route::get('/partidos/{partido}/estadisticas', [PartidoController::class, 'estadisticas'])->name('partidos.estadisticas');
    Route::post('/partidos/registrar-accion', [PartidoController::class, 'registrarAccion'])->name('partidos.registrarAccion');
    Route::post('/partidos/guardar-iniciales', [PartidoController::class, 'guardarIniciales'])->name('partidos.guardarIniciales');
    Route::post('/partidos/finalizar', [PartidoController::class, 'finalizar'])->name('partidos.finalizar');
    Route::delete('/partidos/{id}', [PartidoController::class, 'destroy'])->name('partidos.destroy');
    Route::post('/partidos/actualizar-estadisticas', [PartidoController::class, 'actualizarEstadisticas'])->name('partidos.actualizarEstadisticas');
    Route::get('/directo', [PartidoController::class, 'directo'])->name('partidos.directo');
    Route::get('/verDirecto/{partido}', [PartidoController::class, 'verDirecto'])->name('partidos.verDirecto');
    Route::get('/partidos/{id}/actualizar', [PartidoController::class, 'actualizar'])->name('partidos.actualizar');

    //RUTA NOTICIAS
    Route::resource('noticias', NoticiaController::class);

});

require __DIR__ . '/auth.php';