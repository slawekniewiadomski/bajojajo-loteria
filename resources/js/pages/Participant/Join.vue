<script setup>
import { defineProps, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { NForm, NFormItem, NInput, NSelect, NButton, NCard } from "naive-ui";
import BasicLayout from "../../layouts/basic";


const props = defineProps( [ "lottery" ] );

const form = useForm( {
  name: null,
  price_cap: null,
  lottery_id: props.lottery.id,
} );
const priceCapOptions = [
  {
    label: "20 zł",
    value: 20,
  },
  {
    label: "30 zł",
    value: 30,
  },
  {
    label: "40 zł",
    value: 40,
  },
  {
    label: "50 zł",
    value: 50,
  },
];

function submit() {
  form.submit( "post", "join" );
}
</script>
<template>
<basic-layout>
  <n-card class="lottery-card">
    <n-form>
      <p>
        Wypełnij formularz poniżej, aby dołączyć do losowania.<br>
        <strong>Uwaga!</strong> po kliknięciu przycisku dołącz, wyświetli się link do twojego wyniku.<br><strong>Zapisz go koniecznie!</strong><br>
        Po losowaniu (gdy wszyscy się zapiszą) pod linkiem znajdziesz osobę, którą wylosowałeś.
      </p>
      <n-form-item label="Imię:"
                   :validationStatus="form.errors.name ? 'error' : 'default'"
                   :feedback="form.errors.name"
      >
        <n-input v-model:value="form.name"
                 placeholder="Wpisz swoje imię"
        />
      </n-form-item>
      <n-form-item label="Maksymalna kwota jaką chcesz przeznaczyć na prezent (pole anonimowe):"
                   :validationStatus="form.errors.price_cap ? 'error' : 'default'"
                   :feedback="form.errors.price_cap"
      >
        <n-select :options="priceCapOptions"
                  placeholder="Wybierz kwotę"
                  v-model:value="form.price_cap"
        />
      </n-form-item>
    </n-form>
    <template #action>
      <n-button type="primary"
                size="large"
                style="width: 100%"
                html-type="submit"
                @click="submit"
      >Dołącz!
      </n-button>
    </template>
  </n-card>
</basic-layout>

</template>
