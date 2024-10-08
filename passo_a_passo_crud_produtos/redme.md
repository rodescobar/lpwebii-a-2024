```md
# Laravel 11 - CRUD de Produtos com Relacionamento a Categorias

Este projeto implementa um CRUD para a tabela `produtos`, que se relaciona com a tabela `categorias` no Laravel 11. Abaixo estão as instruções para criação das migrations, models e controller, seguindo as boas práticas do framework.

## Estrutura das Tabelas

### Tabela `categorias`

A tabela `categorias` já deve existir com os seguintes campos:

- `id` (PK)
- `cat_nome` (string)
- `cat_descricao` (nullable)

### Tabela `produtos`

A tabela `produtos` será criada com os seguintes campos:

- `id` (PK)
- `cat_id` (FK para `categorias`)
- `prod_nome` (string)
- `prod_quantidade` (integer)
- `prod_descricao` (nullable)
  
## Migration de Produtos

Crie a migration para a tabela `produtos`:

```bash
php artisan make:migration create_produtos_table
```

Em seguida, edite o arquivo de migration gerado em `database/migrations`:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained('categorias')->onDelete('cascade');
            $table->string('prod_nome');
            $table->integer('prod_quantidade');
            $table->text('prod_descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
```

Execute a migration:

```bash
php artisan migrate
```

## Modelos

### Modelo `Produto`

Crie o modelo `Produto`:

```bash
php artisan make:model Produto
```

No arquivo `app/Models/Produto.php`, defina o relacionamento com `Categoria`:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id', 'prod_nome', 'prod_quantidade', 'prod_descricao'];

    // Relacionamento com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'cat_id');
    }
}
```

### Modelo `Categoria`

Se ainda não existir, crie o modelo `Categoria`:

```bash
php artisan make:model Categoria
```

No arquivo `app/Models/Categoria.php`, defina o relacionamento inverso:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['cat_nome', 'cat_descricao'];

    // Relacionamento com Produto
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'cat_id');
    }
}
```

## Controller

Crie o controller `ProdutoController`:

```bash
php artisan make:controller ProdutoController
```

Em seguida, no arquivo `app/Http/Controllers/ProdutoController.php`, adicione os métodos para o CRUD:

```php
namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:categorias,id',
            'prod_nome' => 'required|string|max:255',
            'prod_quantidade' => 'required|integer',
            'prod_descricao' => 'nullable|string',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'cat_id' => 'required|exists:categorias,id',
            'prod_nome' => 'required|string|max:255',
            'prod_quantidade' => 'required|integer',
            'prod_descricao' => 'nullable|string',
        ]);

        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
```

## Rotas

Adicione as rotas no arquivo `routes/web.php`:

```php
use App\Http\Controllers\ProdutoController;

Route::resource('produtos', ProdutoController::class);
```

## Views

1. **index.blade.php**: Exibe a lista de produtos.
2. **create.blade.php**: Formulário para criação de novo produto.
3. **edit.blade.php**: Formulário para editar produto.
4. **show.blade.php**: Exibe detalhes de um produto específico.

Exemplo básico da view `index.blade.php`:

```blade
@extends('layouts.app')

@section('content')
    <h1>Lista de Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">Criar Produto</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->prod_nome }}</td>
                    <td>{{ $produto->prod_quantidade }}</td>
                    <td>{{ $produto->categoria->cat_nome }}</td>
                    <td>
                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
```


```bash
php artisan serve
```

E acesse a rota `/produtos` para visualizar a lista de produtos.

