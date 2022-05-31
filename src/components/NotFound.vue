<template>
  <div>
    <div class="err">404</div>
    <div class="msg">
      <p>Oops... no se encuentra la página.</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'not-found',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
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
</style>
