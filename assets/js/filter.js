function filterProducts() {
    var inputName = document.getElementById('inputName').value.toUpperCase();
    var inputPrice = document.getElementById('inputPrice').value;
    var inputAuthor = document.getElementById('inputAuthor').value;
    
    var products = document.getElementsByClassName('product');
    
    for (var i = 0; i < products.length; i++) {
    var name = products[i].getElementsByClassName('name')[0].textContent.toUpperCase();
    var price = parseFloat(products[i].getElementsByClassName('price')[0].textContent);
    var author = products[i].getElementsByClassName('author')[0].textContent;
    
    if ((inputAuthor === "all" || author === inputAuthor) && name.indexOf(inputName) > -1 && price <= inputPrice) {
        products[i].style.display = "";
    } else {
        products[i].style.display = "none";
    }
    }
}