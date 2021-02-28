<x-app-layout>
    <div class="col-sm-8 container sm:my-10">
        <div class="card">
            <div class="card-body text-left">
                <div class="d-flex bd-highlight mb-4">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5 class="card-title">Lista de produtos</h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/product/create">
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
                                <th scope="col">Subcategoria</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Imagem</th>
                                <th scope="col">Status</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$product->id_product}}</th>
                                <td>{{$product->nm_title}}</td>
                                <td>{{$product->Category->id_category}} - {{$product->Category->nm_title}}</td>
                                <td>{{$product->Subcategory->id_subcategory}} - {{$product->Subcategory->nm_title}}</td>
                                <td>{{str_replace(".",",", $product->vl_product)}}</td>
                                <td>
                                    @foreach(json_decode($product->nm_tag) as $tag)
                                    <span class="badge badge-pill badge-primary bg-primary sm:mx-1">{{$tag}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <img src="{{env('APP_URL')}}/storage/{{$product->nm_image}}" width="100">
                                </td>
                                <td>{{$product->ck_status === "A" ? "Ativo" : "Inativo"}}</td>
                                <td>{!! $product->ds_product !!}</td>
                                <td> 
                                    <form method="GET" action="/product/update/{{$product->id_product}}">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="/product/delete/{{$product->id_product}}">
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
                    <a href="{{env('APP_URL')}}/storage/listProducts/lista_de_produtos.csv" class="text-warning">
                        <button type="submit" class="btn btn-outline-primary">Baixar lista (CSV) <i class="fas fa-download"></i></button>
                    </a>
                    <a href="{{env('APP_URL')}}/storage/listProducts/lista_de_produtos.pdf" class="text-warning" target="_blank">
                        <button type="submit" class="btn btn-outline-primary">Baixar lista (PDF) <i class="fas fa-download"></i></button>
                    </a>
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
    <script src="{{ asset('js/response.js') }}"></script>
</x-app-layout>