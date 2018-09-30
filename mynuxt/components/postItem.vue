<template>
    <div class="item">
        <h2>post name</h2>
        {{qt.content}}
        <div class="updateSec" v-if="editing">
            <input type="text" v-model="editValue">
        <a  @click="onUpdate">save</a>
        <a  @click="onCancel">cancel</a>
        </div>

        <div v-if="!editing">
        <a  @click="onEdit">edit</a>
        <a  @click="onDelete">delete</a>
        </div>


    </div>
</template>
<script>
import axios from "axios";
export default {
    props:['qt'],
    data(){
        return {
            editing:false,
            editValue: this.qt.content
        }
    },
    methods:{
       onEdit(){
           this.editing   = true;
           this.editValue = this.qt.content;
       },

       onCancel(){
            this.editing   = false;
       } ,

      onDelete(){
          const token = localStorage.getItem('token');
          this.$emit('itemDeleted' , this.qt.id)
            axios.delete('http://127.0.0.1:8000/api/quote/'+ this.qt.id +'?token=' + token )
            .then(
                 (response) => console.log(response)
            ).catch(
                    (error) => console.log(error)
                );
      },  
      onUpdate(){
          const token = localStorage.getItem('token');
           this.editing    = false;
           this.qt.content = this.editValue;
            axios.put('http://127.0.0.1:8000/api/quote/'+ this.qt.id +'?token=' + token,
            { content:this.editValue }
            )
            .then(
                 (response) => console.log(response)
            ).catch(
                    (error) => console.log(error)
                );
      }  


    }
}
</script>

