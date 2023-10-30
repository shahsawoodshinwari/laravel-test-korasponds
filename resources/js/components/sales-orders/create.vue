<template>
  <form @submit.prevent="onSubmit" class="row g-3 justify-content-center">
    <template v-for="(selected_item, index) in form.items" :key="index">
      <div class="col-md-4">
        <label class="form-label required">Item</label>
        <select :class="['form-select', form.errors[`items.${index}.id`] ? 'is-invalid' : '']" v-model="selected_item.id"
          @change="updatePrice(index); form.validate(`items[${index}].id`)">
          <option disabled value="">Please select an item</option>
          <option v-for="item in prop_items" :key="item.id" :value="item.id" :disabled="shouldDisable(item)">
            {{ item.name + ' (' + item.arabic_name + ')' }}
          </option>
        </select>
        <div class="invalid-feedback" v-if="form.errors[`items.${index}.id`]">
          {{ form.errors[`items.${index}.id`] }}
        </div>
        <span class="form-text">Options marked as grey are already selected, so you cannot reselect them.</span>
      </div>

      <div class="col-md-2">
        <label class="form-label required">Quantity</label>
        <input type="number" :class="['form-control', form.errors[`items.${index}.quantity`] ? 'is-invalid' : '']"
          @change="form.validate(`items[${index}].quantity`)" v-model="selected_item.quantity">
        <div class="invalid-feedback" v-if="form.errors[`items.${index}.quantity`]">
          {{ form.errors[`items.${index}.quantity`] }}
        </div>
      </div>

      <div class="col-md-3">
        <label class="form-label required">Price</label>
        <div class="input-group">
          <span class="input-group-text">SAR</span>
          <input type="number" class="form-control" disabled v-model="selected_item.price">
        </div>
      </div>
      <div class="col-md-1">
        <label class="form-label" style="visibility: hidden;">Actions</label>
        <div class="btn-group btn-group-sm">
          <button type="button" class="btn btn-danger" @click="removeRow(index)" v-if="form.items.length > 1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash"
              viewBox="0 0 16 16">
              <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
            </svg>
          </button>
          <button type="button" class="btn btn-success" @click="addRow" v-if="form.items.length === index + 1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
              viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>
          </button>
        </div>
      </div>
    </template>
    <div class="col-md-10 text-end">
      <hr>
      <b>Total:</b> SAR {{ computed_total }}
    </div>
    <div class="col-md-10 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</template>

<script>
import { useForm } from 'laravel-precognition-vue';

export default {
  props: {
    prop_items: {
      type: Array,
      required: true
    },
  },
  data() {
    return {
      form: useForm('post', '/sales-orders', {
        items: [{
          id: '',
          quantity: '',
          price: ''
        }],
        total: 0,
      }),
    };
  },
  computed: {
    computed_total() {
      return this.form.items.reduce((total, item) => total + item.price * item.quantity, 0);
    },
  },
  methods: {
    addRow() {
      this.form.items.push({
        id: '',
        quantity: '',
        price: ''
      });
    },
    removeRow(index) {
      this.form.items.splice(index, 1);
    },
    shouldDisable(item) {
      return this.form.items.find(i => i.id === item.id);
    },
    updatePrice(index) {
      const selectedItem = this.form.items[index];
      const itemInfo = this.prop_items.find(item => item.id === selectedItem.id);

      if (itemInfo) {
        this.form.items[index].price = itemInfo.price;
      }
    },
    onSubmit() {
      this.form.submit()
        .then((response) => {
          this.$swal.fire({
            title: 'Success',
            text: response.data.message,
            icon: 'success',
            showCancelButton: false,
            showConfirmButton: false,
            timer: 3000,
          }).then(() => {
            window.location.href = response.data.url;
          });
        })
        .catch((error) => {
          console.log(error);
        })
    }
  }
}
</script>

<style>
option[disabled] {
  background-color: var(--bs-secondary-bg)
}
</style>