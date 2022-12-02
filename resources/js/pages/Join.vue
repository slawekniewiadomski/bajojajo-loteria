<script setup>
import { defineProps, ref } from "vue";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";


defineProps();

const form = reactive( {
  name: null,
  password: null,
  email: null,
} );

function submit() {
  Inertia.post( "/join", form );
}
</script>
<template>
<form @submit.prevent="submit">
  <input id="name"
         v-model="form.name"
  />
  <input type="password"
         id="password"
         v-model="form.password"
  >
  <button type="submit">Submit</button>
</form>
</template>
