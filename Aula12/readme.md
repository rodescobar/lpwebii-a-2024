# Autenticação Manual no Laravel 11

Este projeto implementa um sistema de autenticação simples no Laravel 11 sem o uso de pacotes front-end como Vue, Breeze ou Jetstream.

## Configuração da Autenticação Manual

### 1. Criação do Controller

Use o comando abaixo para criar um controlador que gerenciará o login e o registro dos usuários.

```bash
php artisan make:controller AuthController
```

### 2. Método de Registro (Register)

Dentro do controlador AuthController, crie um método para registrar novos usuários.

```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Autenticar o usuário
        Auth::login($user);

        // Redirecionar ou retornar uma resposta
        return redirect()->route('home')->with('success', 'Registro concluído com sucesso!');
    }
}
```
### 3. Método de Login

Agora, crie um método para o login dos usuários, validando as credenciais e autenticando-os.

```php

use Illuminate\Support\Facades\Auth;

public function login(Request $request)
{
    // Validação dos dados
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Verificar as credenciais e autenticar o usuário
    if (Auth::attempt($credentials)) {
        // Login bem-sucedido
        $request->session()->regenerate();

        return redirect()->intended('dashboard')->with('success', 'Login bem-sucedido!');
    }

    // Se as credenciais estiverem erradas
    return back()->withErrors([
        'email' => 'As credenciais fornecidas estão incorretas.',
    ]);
}
```

### 4. Definição de Rotas

Adicione as rotas de login e registro no arquivo routes/web.php.

```php

use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
```

### 5. Formulários de Login e Registro

Crie formulários simples de login e registro usando HTML.
Formulário de Registro

```html

<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Senha" required>
    <input type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
    <button type="submit">Registrar</button>
</form>
```
Formulário de Login

```html

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Login</button>
</form>
```
### 6. Adicionando rotas seguras
As rotas seguras devem ficar dentro do middleware de validação de usuário

```php
Route::middleware('auth')->group(function () {
    Route::get('/login', function () {
        return view("admin.login");
    })->name('login');

    Route::get('/categoria', [Categoria::class, 'index'])->name('categoria');
});
```