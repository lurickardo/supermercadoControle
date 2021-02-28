<x-app-layout>
    <div class="col-sm-8 container sm:my-10">
        <div class="card">
            <div class="card-body text-left">
                <div class="d-flex bd-highlight mb-4">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5 class="card-title">Alterar produto</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/product">
                            <button type="submit" class="btn btn-outline-primary">Voltar</button>
                        </a>
                    </div>
                </div>
                <form method="post" action="/product/update/alter/{{$product->id_product}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group sm:my-2">
                        <label for="titleProduct">Título do produto: </label>
                        <input type="text" class="form-control" name="nmTitle" id="nmTitle" placeholder="Digite o título do produto" value="{{$product->nm_title}}" maxlength="50">
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="category">Categoria:</label>
                        <select class="form-control" id="idCategory" name="idCategory" onchange="listSubcategories(this.value)">
                            <option value="">Selecione uma categoria</option>
                            @foreach($categories as $category)
                            <option value={{$category->id_category}} {{$product->Category->id_category === $category->id_category ? "selected" : ""}}>{{$category->nm_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="subcategory">Subcategorias:</label>
                        <select class="form-control" id="idSubcategory" name="idSubcategory">
                            <option value="">Selecione uma subcategoria</option>
                            @foreach($subcategories as $subcategory)
                            <option value={{$subcategory->id_subcategory}} {{$product->Subcategory->id_subcategory === $subcategory->id_subcategory ? "selected" : ""}}>{{$subcategory->nm_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="vlProduct">Valor: </label>
                        <input type="text" class="form-control" name="vlProduct" id="vlProduct" placeholder="Digite valor do produto" value={{$product->vl_product}} maxlength="7">
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="tagsProduct">Tags: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="tag" id="tag" placeholder="Insira uma tag" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text btn-primary" onclick="insertTag()">Inserir</span>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert" id="listTags">
                            @foreach(json_decode($product->nm_tag) as $tag)
                            <span class="badge badge-pill badge-primary bg-primary sm:mx-1">{{$tag}}</span>
                            <input type="hidden" name="nmTag" id="nmTag" value={{$tags}}>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="imgProduct">Imagem: </label>
                        <input type="file" class="form-control" id="imgProduct" name="imgProduct" />
                    </div>
                    <div class="form-group sm:my-2">
                        <img src="{{env('APP_URL')}}/storage/{{$product->nm_image}}" width="500">
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="dsProduct">Descrição: </label>
                        <textarea class="form-control" id="dsProduct" name="dsProduct">{{$product->ds_product}}</textarea>
                    </div>
                    <div class="form-group sm:my-2">
                        <label for="statusProduct">Status: </label>
                        <select class="form-control" id="ckStatus" name="ckStatus">
                            <option value="A" {{$product->ck_status === "A" ? "selected" : ""}}>Ativo</option>
                            <option value="I" {{$product->ck_status === "I" ? "selected" : ""}}>Inativo</option>
                        </select>
                    </div>
                    <div class="form-group sm:my-2">
                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
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
    <script src="{{ asset('js/product/script.js') }}"></script>
</x-app-layout>