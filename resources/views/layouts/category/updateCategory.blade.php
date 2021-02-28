<x-app-layout>
    <div class="col-sm-8 container sm:my-10">
        <div class="card">
            <div class="card-body text-left">
                <div class="d-flex bd-highlight mb-4">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5 class="card-title">Alterar categoria</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/category">
                        <button type="submit" class="btn btn-outline-primary">Voltar</button>
                        </a>
                    </div>
                </div>
                <form method="POST" action="/category/update/alter/{{$category->id_category}}">
                    @method('PUT')                   
                    @csrf
                    <div class="form-group sm:my-2">
                        <label for="titleCategory">Titulo da categoria: </label>
                        <input type="text" class="form-control" name="nmTitle" id="nmTitle" placeholder="Digite o título da categoria" value="{{$category->nm_title}}" maxlength="50">
                    </div>
                    <input type="submit" class="btn btn-primary sm:my-2" value="Alterar">
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
    <script src="{{ asset('js/response.js') }}"></script>
</x-app-layout>