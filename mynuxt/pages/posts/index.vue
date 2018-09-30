<template>

<div class="top">
    <h1>hi ahmed</h1>

   <p>welcome in about page</p>
    <nuxt-link  to="/signup" >you can signup</nuxt-link> |
    <nuxt-link  to="/signin" >you can login</nuxt-link> 
   <form @submit.prevent="onSubmitted">
       <label for="content">your post content</label>
       <input type="text" id="content" v-model="quoteContent">
       <button type="submit" >send post</button>
   </form>
   <button @click="onGetQuotes">get posts</button>
   <br>
        <postItem v-for="quote in quotes" :qt="quote"
         @itemDeleted="onQuoteDeleted($event)"></postItem>

    </div>

</template>

<script>
    import axios from "axios";
    import postItem from '@/components/postItem';
export default {
    components:{
        postItem
    },
    data(){
        return {
            quotes:[],
            quoteContent:''
        }
    },
    methods:{
        onSubmitted(){//اول برام رابط ال اي بي اي - تاني برام هوا المحتوي الي هتبعته
           const token = localStorage.getItem('token');
           axios.post('http://127.0.0.1:8000/api/quote?token=' + token,{
                content: this.quoteContent
            }).then( 
                (response) => console.log(response)
                ).catch(
                    (error) => console.log(error)
                );
        },
        onGetQuotes(){
            axios.get('http://127.0.0.1:8000/api/quote')
            .then( response => {
                    this.quotes = response.data.quote;
            }).catch(
                error => console.log(error) 
            );
        },

        onQuoteDeleted(id){
                const possition = this.quotes.findIndex((element) =>{
                        return element.id == id;
                });
                this.quotes.splice(possition,1);
        }
    }
}
</script>


<style>

.top{
    margin-left: 200px;
}
h1{
    color: #3B8070;
}
</style>