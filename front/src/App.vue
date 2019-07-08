<template>
  <div id="app">
    <Menu/>
    <div class="container">
      <Importacao/>
    </div>
  </div>
</template>

<script>
import Importacao from './components/Importacao.vue'
import Menu from './components/Menu.vue'

export default {
  name: 'app',
  components: {
    Importacao,
    Menu
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
body{
  padding: 0;
  margin: 0;
}
.container{
  max-width: 1100px;
  margin: auto;
}
</style>
