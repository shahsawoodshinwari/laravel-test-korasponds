import './bootstrap';
import { createApp } from 'vue'
import Swal from 'sweetalert2'

import AddItemForm from './components/items/create.vue';
import EditItemForm from './components/items/edit.vue';
import CreateSalesOrderForm from './components/sales-orders/create.vue';
import EditSalesOrderForm from './components/sales-orders/edit.vue';

const app = createApp({});

app.component('add-item-form', AddItemForm);
app.component('edit-item-form', EditItemForm);
app.component('create-sales-order-form', CreateSalesOrderForm);
app.component('edit-sales-order-form', EditSalesOrderForm);

app.config.globalProperties.$swal = Swal;

app.mount('#app');