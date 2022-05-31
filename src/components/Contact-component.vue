/* eslint-disable */
<template>
  <div>
        <h3></h3>
    <div class="screen">
      <div class="screen-header">
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title mb-5">
            <span>{{page.title}}</span>
          </div>
          <div class="a_row" v-for="m in Object.keys(contact.rss)" :key="m" >
            <div style="display: flex; justify-content: space-evenly; margin-bottom: 15px;" >
              <div style="flex-grow: 1;" class="media-left">
                   <b-icon style="width:1.5em; height:1.5em; color:white" :icon="m"></b-icon>
              </div>
              <div style="flex-grow: 1;">
                <p style="font-size: medium; color: white; font-weight: bold;" class="media-heading">{{contact.rss[m]}}</p>
              </div>
            </div>
        </div>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="NOMBRE" :value="page.text">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" placeholder="MENSAJE">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">CANCELAR</button>
              <button class="app-form-button">ENVIAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>





    <!-- form last -->
    <!-- <div>
      <h3>{{page.text}}</h3>
    <b-form class="position-relative p-3" @submit.prevent="onSubmit">
      <b-form-group label="Nombre" label-for="form-name" label-cols-lg="2">
        <b-input-group>
          <b-input-group-prepend is-text>
            <b-icon icon="person-fill"></b-icon>
          </b-input-group-prepend>
          <b-form-input id="form-name" :disabled="busy"></b-form-input>
        </b-input-group>
      </b-form-group>

      <b-form-group label="Email" label-for="form-mail" label-cols-lg="2">
        <b-input-group>
          <b-input-group-prepend is-text>
            <b-icon icon="envelope-fill"></b-icon>
          </b-input-group-prepend>
          <b-form-input id="form-email" type="email" :disabled="busy"></b-form-input>
        </b-input-group>
      </b-form-group>

      <div style="margin-top: 10px;" class="d-flex justify-content-center">
         <b-button style="background-color:var(--primary); color:black" ref="submit" type="submit" :disabled="busy">Enviar</b-button>
      </div>
    </b-form>
  </div> -->
</div>
</template>

<script>
import WEB from '@/assets/page-definition.json';

export default {
  name: 'contact-component',
  props: {
    msg: String
  },
  data: function () {
    const currentPage = this.$route.name;
    const contact = WEB.contactInfo
    const page = WEB.pages[currentPage];

    return { currentPage, page, contact}
  },
  methods: {
    getImgFromAssets(img) {
      var images = require.context('../assets/', false, /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i)
      return images('./' + img)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

/* div {
  align-items:center;
} */
.form{
width: 50%;
align-self: center;
}
.app-form-button{
  color:var(--primary)
}
h1 {
  align: center;
}
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

*, *:before, *:after {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  background: linear-gradient(to right, var(--secondary) 0%, var(--secondary) 100%);
  font-size: 12px;
}

body, button, input {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  letter-spacing: 1.4px;
}

.background {
  display: flex;
  min-height: 100vh;
}

.container {
  flex: 0 1 700px;
  margin: auto;
  padding: 10px;
}

.screen {
  position: relative;
  background: var(--primary);
  border-radius: 15px;
}
.screen:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 20px;
  right: 20px;
  bottom: 0;
  border-radius: 15px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
  z-index: -1;
}

.screen-header {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background: var(--primary-light);
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}

.screen-header-left {
  margin-right: auto;
}

.screen-header-button {
  display: inline-block;
  width: 8px;
  height: 8px;
  margin-right: 3px;
  border-radius: 8px;
  background: white;
}

.screen-header-button.close {
  background: #ed1c6f;
}

.screen-header-button.maximize {
  background: #e8e925;
}

.screen-header-button.minimize {
  background: #74c54f;
}

.screen-header-right {
  display: flex;
}

.screen-header-ellipsis {
  width: 3px;
  height: 3px;
  margin-left: 2px;
  border-radius: 8px;
  background: #999;
}

.screen-body {
  display: flex;
}

.screen-body-item {
  flex: 1;
  padding: 50px;
}

.screen-body-item.left {
  display: flex;
  flex-direction: column;
}

.app-title {
  display: flex;
  flex-direction: column;
  position: relative;
  color: white;
  font-size: 26px;
}

.app-title:after {
  content: '';
  display: block;
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 25px;
  height: 4px;
  background: whitesmoke;
}

.app-contact {
  margin-top: auto;
  font-size: 8px;
  color: white;
}

.app-form-group {
  margin-bottom: 15px;
}

.app-form-group.message {
  margin-top: 40px;
}

.app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}

.app-form-control {
  width: 100%;
  padding: 10px 0;
  background: none;
  border: none;
  border-bottom: 1px solid var(--secondary);
  color: #ddd;
  font-size: 14px;
  text-transform: uppercase;
  outline: none;
  transition: border-color .2s;
}

.app-form-control::placeholder {
  color: whitesmoke;
}

.app-form-control:focus {
  border-bottom-color: #ddd;
}

.app-form-button {
  background: none;
  border: none;
  color: white;
  font-size: 14px;
  cursor: pointer;
  outline: none;
}

.app-form-button:hover {
  color: var(--primary-light);
}

.dribbble {
  width: 20px;
  height: 20px;
  margin: 0 5px;
}

@media screen and (max-width: 520px) {
  .screen-body {
    flex-direction: column;
  }

  .screen-body-item.left {
    margin-bottom: 30px;
  }

  .app-title {
    flex-direction: row;
  }

  .app-title span {
    margin-right: 12px;
  }

  .app-title:after {
    display: none;
  }
}

@media screen and (max-width: 600px) {
  .screen-body {
    padding: 40px;
  }

  .screen-body-item {
    padding: 0;
  }
}

</style>

