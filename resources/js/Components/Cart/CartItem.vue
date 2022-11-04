<template>
    <tr>
        <td class="product-thumbnail"><img v-if="cart_item?.associatedModel?.media[0]?.original_url"
                :src="cart_item?.associatedModel?.media[0]?.original_url" alt="">
            <img v-else :src="$page.props.assets.no_image_product" :alt="'Cart Item - ' + cart_item.id" />
        </td>
        <td class="product-name"><a href="shop-details.html">{{ cart_item.name
        }}</a></td>
        <td class="product-price"><span class="amount">${{ cart_item.price }}</span>
        </td>
        <td class="product-quantity">
            <div class="cart-plus-minus"><input type="text" :value="cart_item.quantity">
                <div class="inc qtybutton" @click="increaseQuantity">+</div>
                <div class="dec qtybutton" @click="decreaseQuantity">-</div>
            </div>
        </td>
        <td class="product-subtotal"><span class="amount">{{ '$' + cart_item.total_price }}</span></td>
        <td class="product-remove">
            <Link @click="deleteCartItem()"><i class="fa fa-times"></i></Link>
        </td>
    </tr>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';


const quantity = ref(props?.cart_item?.quantity ? props.cart_item?.quantity : null);
const props = defineProps({
    'cart_item': {
        type: Object,
        required: true,
    }
})



const increaseQuantity = () => {
    if (quantity.value < 10) {
        quantity.value = quantity.value + 1;
        Inertia.put(route('cart.update', { cart: props.cart_item.id }), {
            id: props.cart_item.id,
            quantity: quantity.value,
        })
    }

}

const decreaseQuantity = () => {
    if (quantity.value > 1) {
        quantity.value = quantity.value - 1;
        Inertia.put(route('cart.update', { cart: props.cart_item.id }), {
            id: props.cart_item.id,
            quantity: quantity.value,
        })
    }

}

const deleteCartItem = () => {
    Inertia.delete(route('cart.destroy', { cart: props.cart_item.id }), {});
}



</script>

<style lang="scss">

</style>
