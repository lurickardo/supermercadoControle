<x-app-layout>
    <div class="col-sm-8 container sm:my-10">
        <div class="card">
            <div class="card-body text-left">
                <div class="d-flex bd-highlight mb-4">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5 class="card-title">Cadastrar produtos</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/product">
                            <button type="submit" class="btn btn-outline-primary">Voltar</button>
                        </a>
                    </div>
                </div>
                <form method="post" action="/product/create/register" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group sm:my-2">
                        <label for="titleProduct">Título do produto: </label>
                        <input type="text" class="form-control" name="nmTitle" id="nmTitle" placeholder="Digite o título do produto" maxlength="50">
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
                    <div class="form-group sm:my-2">
                        <label for="subcategory">Subcategorias:</label>
                        <select class="form-control" id="idSubcategory" name="idSubcategory">
                            <option value="">Selecione uma subcategoria</option>
                        </select>
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="vlProduct">Valor: </label>
                        <input type="text" class="form-control" name="vlProduct" id="vlProduct" placeholder="Digite valor do produto" maxlength="9">
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="tagsProduct">Tags: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="tag" id="tag" placeholder="Insira uma tag" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn-primary" id="basic-addon2">Inserir</span>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert" id="listTags">
                        </div>
                        <input type="hidden" name="nmTag" id="nmTag">
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="imgProduct">Imagem: </label>
                        <input type="file" class="form-control" id="imgProduct" name="imgProduct" />
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="dsProduct">Descrição: </label>
                        <textarea class="form-control" id="dsProduct" name="dsProduct"></textarea>
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="statusProduct">Status: </label>
                        <select class="form-control" id="ckStatus" name="ckStatus">
                            <option value="A">Ativo</option>
                            <option value="I">Inativo</option>
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
        CKEDITOR.replace('dsProduct');
    </script>
</x-app-layout>