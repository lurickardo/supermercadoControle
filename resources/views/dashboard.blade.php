<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">

                    <a href="/category">
                        <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-b">
                            <div class="flex items-center">
                                <i class="fas fa-book text-blue-400"></i>
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Categoria</div>
                            </div>
                        </div>
                    </a>

                    <a href="/subcategory">
                        <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l md:border-b">
                            <div class="flex items-center">
                                <i class="fas fa-book-open text-blue-400"></i>
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Subcategoria</div>
                            </div>
                        </div>
                    </a>

                    <a href="/product">
                        <div class="p-6 border-gray-200  md:border-r">
                            <div class="flex items-center">
                                <i class="fas fa-cart-arrow-down text-blue-400"></i>
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Produtos</div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>