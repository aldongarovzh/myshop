{*Страница товара*}

<h3> {$rsProduct['name']} </h3>

<img width='575' src="/images/products/{$rsProduct['image']}">

Стоимость: {$rsProduct['price']}

<a id="addToCart_{$rsProduct['id']}" {if $itemInCart} class="hideme" {/if} href="#" onClick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину"> Добавить в корзину </a>
<a id="removeFromCart_{$rsProduct['id']}" {if ! $itemInCart} class="hideme" {/if} href="#" onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины"> Удалить из корзины </a>
<p> Описание: <br/> {$rsProduct['description']} </p>
