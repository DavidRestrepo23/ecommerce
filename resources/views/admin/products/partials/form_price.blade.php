@if($product)
    <price-specifics-component :groups="{{ $group_user }}" :productid="{{ $product->id }}" ></price-specifics-component>
@endif