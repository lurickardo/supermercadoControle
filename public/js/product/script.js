$(document).ready(function() {
    CKEDITOR.replace('dsProduct');
    $('#vlProduct').mask("###0,00", {reverse: true});
});

function listSubcategories (idCategory) {
    const selectSubcategory = $("#idSubcategory");
    selectSubcategory.empty().append('<option value="">Selecione uma subcategoria</option>');

    if(idCategory !== "") {
        $.getJSON(`/subcategory/listByCategory/${idCategory}`, function(subcategories){
            subcategories.forEach(function (subcategory){
                selectSubcategory.append(`<option value='${subcategory.id_subcategory}'>${subcategory.nm_title}</option>`);
            });
        });
    }
}

function insertTag () {
    const inputTag = $("#tag");
    const inputNmTag = $("#nmTag");

    $("#listTags").append(`<span class="badge badge-pill badge-primary bg-primary sm:mx-1">${inputTag.val()}</span>`);
    inputNmTag.val(`${inputNmTag.val()}${inputTag.val()},`);
    inputTag.val('').focus();
}

function listaTag(){
    alert('asfas');
}