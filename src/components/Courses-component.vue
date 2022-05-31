/* eslint-disable */
<template>
  <div>
    <h1>Courses</h1>
    <p>
      A lot of couses
    </p>
  </div>
</template>

<script>
export default {
  name: 'courses-component',
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
