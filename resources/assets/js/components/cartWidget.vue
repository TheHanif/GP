<template>
    <ul v-if="cart.length > 0">
        <li class="row" v-for="(item, key) in cart">
            <div class="image">
                <img :src="item.thumbnail" alt="" class="img-responsive" />
                <a href="#" @click.prevent="DeleteCartItem(key, item.id)" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a>
            </div>
            <div class="detail"><a :href="item.route">{{ item.name }}</a> <br> <small>{{ item.quantity }} x PKR {{ item.price }}</small></div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['cart', 'is_loading'],
        methods: {
            DeleteCartItem: function(key, cart_id){
                this.$parent.is_loading = true;
                this.$http.get('/cart/remove/'+key+'/'+cart_id).then((response) => {
                    if(response.status == 200){
                        this.cart.splice(key, 1);
                    }
                    this.$parent.is_loading = false;
                });
            }
        }
    }
</script>
