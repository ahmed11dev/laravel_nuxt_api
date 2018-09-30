<template>
    <div class="topS">
        <h2>hi man</h2>
        <form action="">
             <label for="name">your name</label>
       <input type="text" id="name" v-model="name">
       <br>
             <label for="email">your email</label>
       <input type="text" id="email" v-model="email">
       <br>
             <label for="password">your password</label>
       <input type="password" id="password" v-model="password">
       <br>
       <button type="submit" @click.prevent="signup">make new account</button>
        </form>
    </div>
</template>
<script>
    import axios from "axios";

export default {
    data(){
        return{
            name:'',
            email:'',
            password:'',
        }
    },
    methods:{
        signup(){
            axios.post('http://127.0.0.1:8000/api/user',{
                name:this.name,email:this.email,password:this.password},
                { headers:{'X-Requested-With':'XMLHttpRequest'}   }).then( 
                (response) => console.log(response)
                ).catch(
                    (error) => console.log(error)
                );
        }
    }
}
</script>

<style scoped>

.topS{
    margin-left: 200px;
}
h1{
    color: #3B8070;
}
</style>