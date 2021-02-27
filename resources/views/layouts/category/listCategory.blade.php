<x-app-layout>
    <div class="col-sm-8 container sm:my-10">
        <div class="card">
            <div class="card-body text-left">
                <div class="d-flex bd-highlight mb-4">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5 class="card-title">Lista de categorias</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/category/create">
                            <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Código</th>
                                <th scope="col">Título</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id_category}}</th>
                                <td>{{$category->nm_title}}</td>
                                <td>
                                    <form method="GET" action="/category/update/{{$category->id_category}}">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="/category/delete/{{$category->id_category}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if(session('response'))
    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Retorno</h5>
                </div>
                <div class="modal-body">
                    {{session('response')}}
                </div>
            </div>
        </div>
    </div>
    @endif
    <script>
        $(document).ready(function() {
            $('#responseModal').modal('show');
        });
    </script>
</x-app-layout>