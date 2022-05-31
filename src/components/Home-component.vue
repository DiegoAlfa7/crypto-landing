
<template>
    <div>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
            <div class="col-md-5 p-lg-5 mx-auto mb-5">
                <b-img fluid center :src="getImgFromAssets(web.logo)" width="60" />
                <h1 class="display-4 mb-5 font-weight-normal">{{ web.title }}</h1>
                <h1 class="display-6 my-2 font-weight-normal">{{ web.subtitle }}</h1>
                <p class="lead font-weight-normal">{{web.headline}}</p>
                <a class="btn btn-outline-secondary" href="#">{{web.actionTitle}}</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>
</template>

<script>

import WEB from '@/assets/page-definition.json';

export default {
    name: 'home-component',
    props: {
        msg: String
    },
    data: function () {
        return { web: WEB }
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
    color: #42b983;
}
</style>
