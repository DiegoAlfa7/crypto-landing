<template>

<div class="component-notfound">
 <div>
     <div class="err">404</div>
    <div class="msg"><p>Oops... no se encuentra la página.</p></div>
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
h1{
    font-size: 2.5rem;
    font-family: 'Permanent Marker', cursive;
}

body {
  background-color: white;
}

.mainbox {
  background-color: white;
  margin: auto;
  height: 600px;
  width: 600px;
  position: relative;
}
  .err {
    text-align: center;
    color: var(--primary-light);
    font-family: 'Nunito Sans', sans-serif;
    font-size: 11rem;
    position:absolute;
    width: 75%;
    left: 16%;
    top: 8%;
  }

.zero-int {
  position: absolute;
  font-size: 8.5rem;
  left: 42%;
  top: 15%;
  color: var(--primary-light);
}
.msg {
    text-align: center;
    font-family: 'Nunito Sans', sans-serif;
    font-size: 1.6rem;
    position:absolute;
    left: 16%;
    top: 45%;
    width: 75%;
    color: var(--primary-light);
  }

a {
  text-decoration: none;
  color: white;
}

a:hover {
  text-decoration: underline;
}
</style>
