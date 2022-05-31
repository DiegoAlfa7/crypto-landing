 /* eslint-disable */
<template>

  <!-- <h1>{{page ? page.title : 'No hay pagina'}}</h1> -->
  <!-- <h1>{{$route.name}}</h1> -->

  <!-- <b-container class="bv-example-row">
      <b-row>
        <b-col> -->


  <b-container>



    <!-- <b-row>
      <b-col>
        <h1 class="my-3">{{ page.title }}</h1>
      </b-col>
    </b-row> -->

    <!-- Title -->
    <b-row style="margin-bottom: 10%; margin-top:10px">
     
        <!-- <b-card style="margin-bottom : 10%" border-variant="light" :img-src="getImgPath(page.logo)" :img-alt="page.title" img-right>
      <b-card-text style="align: left;">
        {{page.title}}
      </b-card-text>
    </b-card> -->
     
                        <div class="col-md-6" style="position: relative; min-height: 150px;">
                            <h2 style="position: absolute; bottom: 0;">{{page.title}}</h2>
                        </div>
                        <div v-if="page.logo" class="col-md-6 how-img" >
                            <img :src="getImgFromAssets(page.logo)" :alt="page.title" />
                        </div>
    </b-row>
<!-- Content -->

    <b-row v-if="page.content">
      <b-col>
         <b-card style=" align-items:center; background-color: var(--secondary)">
        <b-card-text class="text-center text-white">{{page.content}}</b-card-text>
      </b-card>
      </b-col>
    </b-row>

    
<!-- ITEMS -->
    <b-row>
      <b-col cols="12" md="6" v-for="course in page.items" :key="course.title">

    
    <div class="h-100 p-2">
      <div style="background-color: var(--primary)" class="h-100  pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">{{course.title}}</h2>
          <p class="lead">{{course.description}}</p>
        </div>
        <!-- <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0; overflow: hidden;"> -->
        <b-img fluid-grow center :src="course.picture" style=" height: 300px;  border-radius: 21px 21px 0 0; overflow: hidden;"/>
        <!-- </div> -->
      </div>
    </div>
        <!-- <b-card no-body class="overflow-hidden" >
          <b-row no-gutters>
            <b-col md="6">
              <b-card-img :src="course.picture" :alt="course.title" class="rounded-0"></b-card-img>
            </b-col>
            <b-col md="6">
              <b-card-body :title="course.title">
                <b-card-text>
                  {{course.description}}
                </b-card-text>
              </b-card-body>
            </b-col>
          </b-row>
        </b-card> -->

        <!-- <b-card :title="course.title" :img-src="course.picture" img-alt="Image" img-top tag="article"
          class="mb-2 ">
          <b-card-text class="py-5">
            {{ course.description }}
          </b-card-text>

         <b-button href="#" variant="primary">Go somewhere</b-button>
        </b-card> -->
      </b-col>

    </b-row>



    <b-row v-if="page.bottomText">
      <b-col>
  <b-card class="text-center">
    <div class="bg-secondary text-light">{{ page.bottomText }}</div>
  </b-card>

      </b-col>
    </b-row>


  </b-container>


</template>


<script>

import WEB from '@/assets/page-definition.json';

export default {
  name: 'default-component',
  props: {
    name: String,
    //page: {title: String, icon: String, items: [{order: Number, title: String, description: String}], content: String, bottomText: String }

  },
  data: function () {
    console.log('Im a Default component' + Date.now())
    const currentPage = this.$route.name;

    const page = WEB.pages[currentPage];

    return { currentPage, page}
  },
  methods:{
    getImgFromAssets(img) {
    var images = require.context('../assets/', false, /\.png$/)
    return images('./' + img + ".png")
  }
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
  color: var(--primaryC);
}
</style>
