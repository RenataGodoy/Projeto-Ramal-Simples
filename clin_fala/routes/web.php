<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RamaisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoasController;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
Route::get('/', function () {
    return redirect('pessoas');
});

// Rotas de Pessoa
Route::get('pessoas/create', [PessoasController::class, 'create'])->name('pessoas.create');
Route::post('pessoas', [PessoasController::class, 'store'])->name('pessoas.store');
Route::get('pessoas', [PessoasController::class, 'index'])->name('pessoas.index');

// Edição e Exclusão de Pessoa
Route::get('pessoas/edit/{id}', [PessoasController::class, 'edit'])->name('pessoas.edit');
Route::put('pessoas/update/{id}', [PessoasController::class, 'update'])->name('pessoas.update');
Route::delete('pessoas/{id}', [PessoasController::class, 'destroy'])->name('pessoas.destroy');

// Rotas de Ramal
Route::get('ramais/create', [RamaisController::class, 'create'])->name('ramais.create');
Route::post('ramais', [RamaisController::class, 'store'])->name('ramais.store');
Route::get('ramais', [RamaisController::class, 'index'])->name('ramais.index'); 

// Edição e Exclusão de Ramal
Route::get('ramais/edit/{id}', [RamaisController::class, 'edit'])->name('ramais.edit');
Route::put('ramais/update/{id}', [RamaisController::class, 'update'])->name('ramais.update');;


// 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// TESTE DE RELACIONAMENTO
Route::get('/pessoas/test/{id}', [PessoasController::class, 'testRelationship']);


//CRIANDO O ADMIN
// Route::get('/create-admin', function () {
//     if (!User::where('email', 'admin@example.com')->exists()) {
//         User::create([
//             'name' => 'Renatag',
//             'email' => 'devrenatagodoy@gmail.com',
//             'password' => Hash::make('123456'), 
//         ]);

//         return 'Admin criado com sucesso!';
//     }

//     return 'Usuário Admin já existe!';
// });