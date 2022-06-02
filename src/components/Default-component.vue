 /* eslint-disable */
<template>
  <b-container fluid>


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
              <b-col v-if="page.content && typeof page.content == 'string'">
                <p class="mb-2 content-text">{{ page.content }}</p>
              </b-col>

              <b-col v-if="page.content && Array.isArray(page.content)">
                <p v-for="(paragraph) in page.content" :key="paragraph.substring(10)" class="mb-2 content-text">{{
                    paragraph
                }}</p>
              </b-col>
            </b-row>
          </b-col>
        </b-row>

      </b-jumbotron>
    </div>

    <!-- ITEMS -->
    <b-row id="items">
      <b-col cols="12" md="6" v-for="(course, index) in page.items" :key="course.title">
        <div class="h-100 py-2">
          <div id="course"
            v-bind:style="{ backgroundColor: index % 3 == 0 ? 'var(--primary)' : index % 3 == 1 ? 'var(--secondary)' : 'var(--primary-light)' }"
            style="height: 500px; border-radius: 10px;"
            class="d-flex flex-column text-center text-white overflow-hidden shadow">
            <div class="px-3 py-3">
              <h4 class="display-7 my-4" style="font-weight: bold;">{{ course.title }}</h4>
              <p class="lead">{{ course.description }}</p>
            </div>
            <div class=" h-100 pt-3 d-flex flex-column-reverse">
              <div class="bg-light shadow-sm mx-auto"
                style="width: 85%; border-radius: 21px 21px 0 0; overflow: hidden;">

                <b-img fluid-grow center :src="course.picture" />

              </div>
            </div>



            <!-- <b-img fluid-grow center :src="course.picture"
              style=" height: 300px;  border-radius: 21px 21px 0 0; overflow: hidden;" /> -->
            <!-- </div> -->
          </div>
        </div>
      </b-col>
    </b-row>

    <b-row v-if="page.bottomText">
      <b-col>
        <b-card class="text-center my-5">
          <div class="text-dark">{{ page.bottomText }}</div>
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

    return { currentPage, page }
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
