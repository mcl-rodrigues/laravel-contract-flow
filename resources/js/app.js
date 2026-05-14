import { createApp } from 'vue'
import ContratoForm from './components/ContratoForm.vue'

const app = createApp({})

app.component('contrato-form', ContratoForm)

app.mount('#app')
