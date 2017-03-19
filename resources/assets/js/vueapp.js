Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name=csrf-token]").getAttribute('content');

import VueResource from 'vue-resource';
import CartWidgetList from './components/cartWidget.vue';

Vue.use(VueResource);

Vue.component('cart-list', CartWidgetList);

new Vue({
    el: '#wrapper',

    data: {
        // Cart items
        cart: [],

        // Single item to be added in cart
        item: {quantity: 1, product_id: null},

        is_loading: false,
    },

    created() {
        // Get cart item for cart widget
        this.$http.get('/cart/widget').then((response) => {
            if(response.status == 200){
                this.cart = response.data;
            }
            // this.cart = [
            //     {id: 1, name: 'Test 1', quantity: 1, price: 10.02, thumbnail: 'http://grocery.local/uploads/dummy/50.png', route: '#'},
            //     {id: 2, name: 'Test 2', quantity: 5, price: 15.99, thumbnail: 'http://grocery.local/uploads/dummy/50.png', route: '#'},
            // ]
        });
    },

    methods: {
        AddToCart(product_id){

            this.is_loading = true;

            var postData = {quantity: this.item.quantity, product_id: product_id};

            this.$http.post('/cart/add', postData).then((response) => {
                this.cart.push(response.data);
                this.item = {quantity: 1, product_id: null}
                this.is_loading = false;
            });
        },

        AddToCartDirect(product_id){
            this.AddToCart(product_id);
        },

        UpdateQuantity(key, cart_id, quantity){
            this.is_loading = true;
            this.$http.get('/cart/update/'+key+'/'+quantity+'/'+cart_id).then((response) => {
                this.cart = response.data;
                this.is_loading = false;
            });
        },
        DeleteCartItem: function(key, cart_id){
            this.is_loading = true;
            this.$http.get('/cart/remove/'+key+'/'+cart_id).then((response) => {
                if(response.status == 200){
                    this.cart = response.data;
                }
                this.is_loading = false;
            });
        }
    },

    computed: {
        // Total items in cart to be displayed in cart widget
        totalItems(){
            return this.cart.length
        },
        // Total amount in cart, to displayed in cart widget
        cartAmount(){
            var cartAmount = 0;
            var totals = this.cart.map( (item) => {
                return (item.quantity * item.price);
            });

            totals.forEach(function(el){
                cartAmount += el;
            })

            return cartAmount;
        }
    }
})