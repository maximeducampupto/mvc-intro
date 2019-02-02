<h1>Produits</h1>
<ul>
    <?php foreach($Products as $product){ ?>
        <li id="product-<?= $product->id ?>">
            <?= $product->name .', prix: ' . $product->price ?>
            <button onclick="removeProduct(<?= $product->id ?>)">x</button>
        </li>
    <?php } ?>
</ul>