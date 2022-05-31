/* eslint-disable */
<template>
  <div class="pb-5">
    <!-- Title and Content -->
    <!-- Title and Content -->
    <div id="jumbotron">
      <b-jumbotron fluid style="border-width: 1px; border-color: black;" class="mb-3">
        <b-row>

          <b-col cols="12" class=".text-truncate">
            <b-row class="mb-5">
              <b-col cols="8">
                <h1 class="display-1">{{ page.title }}</h1>
              </b-col>

              <b-col cols="4">
                <b-img style="width: 120px" fluid center v-if="page.logo" :src="getImgFromAssets(page.logo)"
                  :alt="page.title" />
              </b-col>
            </b-row>
            <b-row>
              <b-col>
                <p class="mb-2 content-text">{{ page.content ? page.content.charAt(0).toUpperCase() +
                    page.content.slice(1).toLowerCase()
                    : ''
                }}</p>
              </b-col>
            </b-row>
          </b-col>
        </b-row>

      </b-jumbotron>
    </div>

    <div class="screen mx-5">
      <div class="screen-header">
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title mb-5">
            <span class="display-3" style="font-weight: 600;">{{ page.title }}</span>
          </div>
          <b-container fluid>
            <b-row>
              <b-col cols="12" sm="2">
                <b-img fluid center :src="getImgFromAssets(web.logo)" width="100" />
              </b-col>
              <b-col cols="12" sm="10" class="mt-3">
                <div class="a_row" v-for="m in Object.keys(contact.rss)" :key="m">
                  <div style="display: flex; justify-content: space-evenly; margin-bottom: 15px;">
                    <div style="flex-grow: 1;" class="media-left">
                      <b-icon style="width:1.5em; height:1.5em; color:white" :icon="m"></b-icon>
                    </div>
                    <div style="flex-grow: 1;">
                      <p style="font-size: medium; color: white; font-weight: bold;" class="media-heading">{{
                          contact.rss[m]
                      }}
                      </p>
                    </div>
                  </div>
                </div>
              </b-col>
            </b-row>
          </b-container>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="Nombre" :value="page.text">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="email">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" placeholder="mensaje">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">Cancelar</button>
              <button class="app-form-button">Enviar</button>
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

    return { currentPage, page, contact, web: WEB }
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
.form {
  width: 50%;
  align-self: center;
}

.app-form-button {
  color: var(--primary)
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



*,
*:before,
*:after {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  background: linear-gradient(to right, var(--secondary) 0%, var(--secondary) 100%);
  font-size: 12px;
}

body,
button,
input {
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

.screen {

  box-shadow: 0 1px 8px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);

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
  width: 7rem;
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
  color: white;
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

