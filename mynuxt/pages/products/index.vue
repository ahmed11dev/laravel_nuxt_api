<template>
<div>
    <h1>my shop</h1>
      <button class="showCard " @click="showDiv">Cart ({{ numInCart }})</button>
      <div :class="{hide:show}" class="myItems" >
            <table class="table">
                  <tbody>
                        <tr v-for="(item, index) in cart">

                          <td>{{ item.name }}</td>
                          <td>{{ item.price }}</td>
                          <td>{{ item.qty }}</td>
                          <td>
                             <button @click="removeFromCart(index)">&times;</button>
                        </td>

                        </tr>
                         <tr>
                    <th v-if="total != 0">total </th>
                         <th v-if="total == 0">no items</th>
                         <th v-else>{{total}}</th>
                         <th></th>
                  </tr>
                  </tbody>
         </table>


      </div>
      <hr>
    <div class="items" >
   <Item
        v-for="item in forSale"
        :key="item.invId"
        :invId="item.invId"
        :name="item.name"
        :image="item.image"
        :price="item.price" />
        <hr>
    </div>
          <!-- {{ inCart }} -->
      </div>
</template>

<script>
import Item from '@/components/item'
export default {
   data(){
        return{
            show:false,
           
        }
    },
    computed: {
    forSale() { return this.$store.getters.forSale; },
    inCart() { return this.$store.getters.inCart; },
    numInCart() { return this.inCart.length; },
     cart() {
            return this.$store.getters.inCart.map((cartItem) => {
              return this.$store.getters.forSale.find((forSaleItem) => {
                return cartItem === forSaleItem.invId;
              });
            });
    },
   total() {
         return this.cart.reduce((previous, current) => previous + current.price, 0);
    },
    
  },
components: {
    Item
  },
  methods:{
    showDiv(){
      this.show =! this.show;
    },
      removeFromCart(index) {
      this.$store.dispatch('removeFromCart', index);
    }
  }
}
</script>




<style>
.myItems{
  width: 400px;
  background-color: blueviolet;
 
  margin-top: 10px;
  margin-bottom: 10px;
}

.items{
  margin-top: 10px;
}

.hide{
  display: none;
}
table{
  color: aliceblue;
}
</style>

