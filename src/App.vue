/* eslint-disable */
<template>
  <div>
    <!-- <nav class="site-header sticky-top py-1">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="#">Tour</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Enterprise</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Support</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
  </div>
</nav> -->

    <!-- <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
       <b-button variant="outline-info" :to="'/'">

          <img :src="web.landingLogo" :alt="web.title" />

        </b-button>

        <b-button variant="outline-info" :to="'/' + p" v-for="p in Object.keys(web.pages)" :key="p">{{ p }}</b-button>

      </div>
    </nav> -->

    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#" style="margin-left: 30px" >
        <img :src="getImgFromAssets(web.logo)" width="60" />
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item :to="'/' + p" v-for="p in Object.keys(web.pages)" :key="p">{{ p }}</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>

    <div class="mt-5 p-3 p-md-5 m-md-3">
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
      return images('./' + img )
    }
  }
}
</script>

<style>
#app {
  margin: 20px;
}
</>
