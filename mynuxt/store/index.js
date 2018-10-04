import Vuex from 'vuex'

const createStore = () => {
    return new Vuex.Store({
        state: {
            forSale: [
                { invId: 1, name: 'T-shirt', image: '//placehold.it/200', price:50 ,qty:1},
                { invId: 2, name: 'bag', image: '//placehold.it/200', price: 90, qty: 1 },
                { invId: 3, name: 'phone', image: '//placehold.it/200', price: 499, qty: 1 },
                { invId: 4, name: 'ball', image: '//placehold.it/200', price: 100, qty: 1},
            ],
            inCart: [],
        },
        getters: {
            forSale: state => state.forSale,
            inCart: state => state.inCart,
        },
        mutations: {
            ADD_TO_CART(state, invId) { state.inCart.push(invId); },
            REMOVE_FROM_CART(state, index) { state.inCart.splice(index, 1); },
        },
        actions: {
            addToCart(context, invId) {
                 context.commit('ADD_TO_CART', invId);
                 },
         removeFromCart(context, index) { 
                 context.commit('REMOVE_FROM_CART', index); 
                },
                
        }
    })
}

export default createStore