/* eslint-disable */
<template>
  <div>

    <b-navbar toggleable="lg" type="dark" style="background-color: var(--primary);">
      <b-navbar-brand href="#" style="margin-left: 30px" :to="'/'">
        <img :src="getImgFromAssets(web.logo)" width="60" />
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item style="font-size: 20px;" v-bind:active="p == $route.name" :to="'/' + p"
            v-for="p in Object.keys(web.pages)" :key="p">{{ web.pages[p].title }}</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>

    <div class="mb">
      <router-view></router-view>
    </div>

  </div>
</template>

<script>

import WEB from '@/assets/page-definition.json';


export default {
  data: function () {
    return { web: WEB }
  },
  methods: {
    getImgFromAssets(img) {
      var images = require.context('./assets/', false, /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i)
      return images('./' + img)
    }
  }
}
</script>

<style>
#app {
  margin: 20px;
}

</>
