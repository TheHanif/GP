<template>
    <ul v-if="cart.length > 0">
        <li class="row" v-for="item in cart">
            <div class="image">
                <img v-bind:src="item.thumbnail" alt=""/>
                <a href="#" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a>
            </div>
            <div class="detail"><a v-bind:href="item.route">{{ item.name }}</a> <br> <small>{{ item.quantity }} x PKR {{ item.price }}</small></div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['cart'],
    }
</script>
