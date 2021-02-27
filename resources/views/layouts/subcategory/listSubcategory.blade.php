<x-app-layout>
    <div class="col-sm-8 container sm:my-10">
        <div class="card">
            <div class="card-body text-left">
                <div class="d-flex bd-highlight mb-4">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5 class="card-title">Lista de subcategorias</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/subcategory/create">
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
                                <th scope="col">Categoria</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <th scope="row">{{$subcategory->id_subcategory}}</th>
                                <td>{{$subcategory->nm_title}}</td>
                                <td>{{$subcategory->Category->id_category}} - {{$subcategory->Category->nm_title}}</td>
                                <td>
                                    <form method="GET" action="/subcategory/update/{{$subcategory->id_subcategory}}">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="/subcategory/delete/{{$subcategory->id_subcategory}}">
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