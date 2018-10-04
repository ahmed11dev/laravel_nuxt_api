<template>

        <div class="card">
            <img :src="image" :alt="name" class="card-img-top">
            <div class="card-body">
            <h4 class="card-title">{{ name }}</h4>
            <div class="card-text">$ {{ price  }}</div>
            <div class="row justify-content-end">
                <button @click="addToCart(invId)">Add to cart</button>
            </div>
            </div>
        </div>

</template>

<script>
export default {
 props: ['invId', 'name', 'image', 'price'],
 methods: {
    addToCart(invId) {
      this.$store.dispatch('addToCart', invId);
    },
  }
};
</script>