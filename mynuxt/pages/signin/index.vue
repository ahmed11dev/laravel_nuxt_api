<template>
    <div class="topS">
        <h2>hi man from signin page</h2>
        <form action="">
            
             <label for="email">your email</label>
       <input type="text" id="email" v-model="email">
       <br>
             <label for="password">your password</label>
       <input type="password" id="password" v-model="password">
       <br>
       <button type="submit" @click.prevent="signin">login</button>
        </form>
    </div>
</template>
<script>
    import axios from "axios";

export default {
    data(){
        return{
           
            email:'',
            password:'',
        }
    },
    methods:{
        signin(){
            axios.post('http://127.0.0.1:8000/api/user/signin',{
                email:this.email,password:this.password},
                { headers:{'X-Requested-With':'XMLHttpRequest'}   }).then( 
                (response) => {
                    const token = response.data.token;
                    const base64Url = token.split('.')[1];
                    const base64 = base64Url.replace('-','+').replace('_','/');
                    console.log(JSON.parse(window.atob(base64)));
                    localStorage.setItem('token',token);
                }
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