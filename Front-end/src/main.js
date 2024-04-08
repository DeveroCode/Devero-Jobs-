import './assets/main.css'
import config from '../formkit.config'
// import { VueQueryPlugin } from "vue-query";


import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { plugin, defaultConfig } from '@formkit/vue'

import App from './App.vue'
import router from './router'

const app = createApp(App)
app.use(router)
app.use(createPinia())
// app.use(VueQueryPlugin)
app.use(plugin, defaultConfig(config))
app.mount('#app')
