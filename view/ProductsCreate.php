<form id="productsCreate">
    <input type="text" name="name" placeholder="Nom" id="name">
    <input type="text" name="price" placeholder="Prix" id="price">
    <input type="submit" value="Créer">
</form>

<script>
    let form = document.getElementById('productsCreate'),
        name = document.getElementById('name'),
        price = document.getElementById('price');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", `index.php?controller=products&action=ProductsCreate&name=${name.value}&price=${price.value}`, true);
        xhttp.send();
    })
</script>
