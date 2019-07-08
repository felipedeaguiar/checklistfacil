<template>
    <div class="importacao">
      <h2>Importar arquivo</h2>
      <div class="imporcacao-area">
        <input type="file" class="form-control-file" id="file" ref="file" v-on:change="handleFileUpload()">
        <div class="button">
          <button v-on:click="submitFile()" type="submit" class="btn btn-primary">Importar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'Importacao',
  props: {
    msg: String
  },
  data(){
      return{
          file:''
      }
  },
  methods:{
      handleFileUpload(){
          this.file = this.$refs.file.files[0];
      },
      submitFile(){
          let formData = new FormData();
          formData.append('file', this.file);
          axios.post( 'http://localhost:8080/importa.php',formData,{
                  headers: {
                      'Content-Type': 'multipart/form-data',
                  }
              }
          ).then((res) => {
              if(res.status){
                  this.items = res.data.data.headers;
                  this.file = res.data.data.url;
                  this.etapa++;
              }
          }).catch((err) => console.error(err));
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
button{
  padding-left: 40px;
  padding-right: 40px;
  padding-bottom: 10px;
  padding-top: 10px;
}
.button{
  margin-top: 50px;
}
.imporcacao-area{
  margin-top: 30px;
}
</style>
