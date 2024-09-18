@extends("admin_layout.index")

@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Categorias</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">categorias</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista de catgorias
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <a href="" class="btn btn-success">
                        Novo
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    @foreach($categorias as $linha)
                        <tr>
                            <td>{{ $linha->id }}</td>
                            <td>{{ $linha->cat_nome }}</td>
                            <td>{{ $linha->cat_descricao }}</td>
                            <td>Editar | Excluir</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<div>
@endsection