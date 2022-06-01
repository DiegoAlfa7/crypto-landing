/* eslint-disable */
<template>
  <b-container class="pb-5">
    <!-- Title and Content -->
    <!-- Title and Content -->
    <b-row>

      <b-col>

        <b-jumbotron id="jumbotron" fluid style="border-width: 1px; border-color: black;" class="mb-3">
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

      </b-col>
    </b-row>

    <b-row>
      <b-col>
        <div class="d-flex justify-content-center">

          <b-alert variant="success" v-if="response && response.status == 200" show>{{ response.message }}</b-alert>
          <b-alert variant="danger" v-if="response && response.error" show>
            <p>
              Ha habido un error procesando el envío. Inténtalo más tarde. <a
                :href="'mailto://' + web.contactInfo.rss.mailbox + '?subject=' + encodeUri('Contacto CryptoWorld University - ' + new Date().toISOString())">O
                contáctanos directamente</a>
            </p>
            <p v-if="response.errorMsg">{{ response.errorMsg }}</p>
          </b-alert>
        </div>
      </b-col>
    </b-row>


    <div>
      <b-card no-body class="overflow-hidden p-3 screen mx-5">

        <div v-if="errors && errors.length >= 1" class="p-3">

          <div>
            <b-badge style="background-color: red; margin: 0px 0px 0px 10px" v-for="error in errors" :key="error">{{
                error
            }}</b-badge>
          </div>

        </div>

        <b-row no-gutters>
          <b-col cols="12" md="6">
            <b-row>
              <b-col>
                <div class="d-inline-flex">
                  <b-img :src="getImgFromAssets(web.logo)" width="70px" />
                  <p class="display-5 align-self-center ml-5 contact-title">{{ page.title }}</p>
                </div>
              </b-col>
            </b-row>
            <b-row>

              <b-col>
                <div class="d-flex justify-content-center">

                  <div class="contact-circle">
                    <div class="contact-content">
                      <div class="d-inline-flex mb-3" v-for="m in Object.keys(contact.rss)" :key="m">
                        <b-icon style="width:1.5em; height:1.5em; color:white" :icon="m"></b-icon>
                        <p style="margin: 0px 0px 0px 10px; color: white; font-weight: bold;"
                          class="align-self-center ml-5">{{ contact.rss[m] }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </b-col>
            </b-row>
          </b-col>
          <b-col cols="12" md="6">
            <b-card-body>
              <div class="app-form">

                <div class="app-form-group">
                  <input class="app-form-control" placeholder="Nombre" v-model="form.name">
                </div>
                <div class="app-form-group">
                  <input class="app-form-control" placeholder="E-mail" v-model="form.email">
                </div>
                <div class="app-form-group message">
                  <input class="app-form-control" placeholder="Tus comentarios, consultas, etc" v-model="form.message">
                </div>
                <div class="app-form-group buttons">
                  <button class="app-form-button" v-on:click="cancel()">Cancelar</button>
                  <button class="app-form-button" v-on:click="checkForm(null)">Enviar</button>
                </div>

              </div>
            </b-card-body>
          </b-col>
        </b-row>
      </b-card>
    </div>

  </b-container>
</template>

<script>
import WEB from '@/assets/page-definition.json';

import axios from "axios";

export default {
  name: 'contact-component',
  props: {
    msg: String
  },
  data: function () {
    const currentPage = this.$route.name;
    const contact = WEB.contactInfo
    const page = WEB.pages[currentPage];

    const form = {
      to: contact.rss.mailbox,
      subject: '',
      name: '',
      email: '',
      message: ''
    }

    return { currentPage, page, contact, web: WEB, form, errors: [], response: null }
  },
  methods: {
    cancel() {
      this.form = {};
      this.errors = [];
    },
    getImgFromAssets(img) {
      var images = require.context('../assets/', false, /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i)
      return images('./' + img)
    },
    encodeUri(string) {

      return encodeURIComponent(string);
    },
    handleResponse(response) {

      if (response.status == 500 || response.error) {

        console.error("Error in contact form response.")
        console.error(response.error)
        this.response = response;

      } else if (response.status == 200) {

        this.form = {};
        this.response = response;

      }

    },
    checkForm(e) {
      if (this.name && this.age) {
        return true;
      }

      this.errors = [];

      if (!this.form.name || this.form.name == '') {
        this.errors.push('El nombre es obligatorio.');
      }


      if (!this.form.email || this.form.email == '') {
        this.errors.push('El email es obligatorio.');
      } else {

        const isOK = this.form.email.match(
          // eslint-disable-next-line
          /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );

        if (!isOK) {
          this.errors.push("El formato del email no es válido. [nombre]@[dominio].[ext]")
        }

      }

      if (this.errors.length > 0) {
        e ? e.preventDefault() : null;
      } else {

        this.form.subject = 'Contacto desde CryptoWorld University - ' + this.form.name;
        this.form.to = this.web.contactInfo.rss.mailbox;

        axios.post("./public/api/mail.php", this.form).then(
          (response) => {

            this.handleResponse(response);

          }
        ).catch((error) => {

          console.log(error);
          this.response = {};
          this.response.error = error;
          this.response.errorMsg = 'Ha habido un problema contactando con el servidor';

        })

      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.contact-circle {

  border-radius: 50%;
  border-width: 1rem;
  border-style: solid;
  border-color: var(--primary);
}

.contact-circle .contact-content {
  width: 100%;
  padding: 50px;
  display: flex;
  flex-direction: column;
}

.contact-title {
  margin: 0px 0px 0px 10px;
  color: white;
  font-weight: bold;
}



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





.screen {
  position: relative;
  background: var(--primary);
  border-radius: 15px;
}

.screen {

  box-shadow: 0 1px 8px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);

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
  text-transform: none;
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
  border: 1px solid rgba(0, 0, 0, 0.24);
  margin: 10px 10px 0px 0px;
  border-radius: 10px;
  color: white;
  font-size: 14px;
  cursor: pointer;
  outline: none;
  padding: 10px;
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

