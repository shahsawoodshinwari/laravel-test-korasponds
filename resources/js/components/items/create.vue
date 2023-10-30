<template>
  <form @submit.prevent="onSubmit" class="row g-3 justify-content-center">

    <div class="col-md-5">
      <div class="form-group">
        <label for="name" class="form-label required">Name</label>
        <input type="text" :class="['form-control', form.errors['name'] ? 'is-invalid' : '']" id="name"
          v-model="form.name" @change="form.validate('name')" />
        <div class="invalid-feedback" v-if="form.errors['name']">
          {{ form.errors['name'] }}
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="form-group">
        <label for="arabic_name" class="form-label required">Arabic Name</label>
        <input type="text" dir="rtl" :class="['form-control', form.errors['arabic_name'] ? 'is-invalid' : '']"
          id="arabic_name" v-model="form.arabic_name" @change="form.validate('arabic_name')" />
        <div class="invalid-feedback" v-if="form.errors['arabic_name']">
          {{ form.errors['arabic_name'] }}
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="form-group">
        <label for="price" class="form-label required">Price</label>
        <div class="input-group mb-3">
          <span class="input-group-text">SAR</span>
          <input type="number" :class="['form-control', form.errors['price'] ? 'is-invalid' : '']" id="price"
            v-model.number="form.price" @change="form.validate('price')" />
          <div class="invalid-feedback" v-if="form.errors['price']">
            {{ form.errors['price'] }}
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="form-group">
        <label for="stock" class="form-label required">Stock</label>
        <input type="number" :class="['form-control', form.errors['stock'] ? 'is-invalid' : '']" id="stock"
          v-model.number="form.stock" @change="form.validate('stock')" />
        <div class="invalid-feedback" v-if="form.errors['stock']">
          {{ form.errors['stock'] }}
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
</template>

<script>
import { useForm } from 'laravel-precognition-vue';
export default {
  data() {
    return {
      form: useForm('post', '/items', {
        name: '',
        arabic_name: '',
        price: '',
        stock: '',
      }),
    };
  },
  mounted() {
  },
  methods: {
    async onSubmit() {
      await this.form.submit()
        .then((response) => {
          console.log(response);
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
        }).catch((error) => {
          console.log(error);
        });
    },
  }
}
</script>