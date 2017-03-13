import CartWidgetList from './components/cartWidget.vue';

Vue.component('cart-list', CartWidgetList);
new Vue({
    el: '#wrapper',

    data: {
        cart: [
            {id: 1, name: 'Test 1', quantity: 1, price: 10.02, thumbnail: 'http://grocery.local/uploads/dummy/50.png', route: '#'},
            {id: 2, name: 'Test 2', quantity: 5, price: 15.99, thumbnail: 'http://grocery.local/uploads/dummy/50.png', route: '#'},
        ],
    },

    computed: {
        totalItems(){
            return this.cart.length
        },
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