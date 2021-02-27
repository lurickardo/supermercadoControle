<x-app-layout>
    <div class="col-sm-8 container sm:my-10">
        <div class="card">
            <div class="card-body text-left">
                <div class="d-flex bd-highlight mb-4">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5 class="card-title">Cadastrar subcategoria</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/subcategory">
                            <button type="submit" class="btn btn-outline-primary">Voltar</button>
                        </a>
                    </div>
                </div>
                <form method="post" action="/subcategory/create/register">
                    @csrf
                    <div class="form-group sm:my-2">
                        <label for="titleSubcategory">Título da subcategoria: </label>
                        <input type="text" class="form-control" name="nmTitle" id="nmTitle" placeholder="Digite o título da subcategoria" maxlength="50">
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="category">Categoria:</label>
                        <select class="form-control" id="idCategory" name="idCategory">
                            <option value="">Selecione uma categoria</option>
                            @foreach($categories as $category)
                            <option value={{$category->id_category}}>{{$category->nm_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary sm:my-2" value="Cadastrar">
                </form>
            </div>
        </div>
    </div>
    @if($errors->any())
    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Dados incorretos</h5>
                </div>
                <div class="modal-body">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
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