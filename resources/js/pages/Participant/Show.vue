<script setup>
import { defineProps } from "vue";
import BasicLayout from "../../layouts/basic";
import { NCard, NH3, NH2, NButton } from "naive-ui";


const props = defineProps( [ "lottery", "participant", "link", "draw" ] );


function handleBack() {
  window.location.href = `/${props.lottery.slug}`;
}
</script>


<template>
<basic-layout>
  <n-card class="lottery-card">
    <div v-if="draw">
      <n-h2> Loteria zakończona.</n-h2>
      Wylosowałeś: <strong>{{ draw }}</strong>
    </div>
    <div v-else>
      <p>Loteria jeszcze nie została zakończona, twój los pokaże się tutaj gdy wszyscy uczestnicy się zapiszą.</p>
      <n-h3>
        Twój link to:
      </n-h3>
      <code>{{ props.link }}</code>
    </div>
    <template #action>
      <n-button @click="handleBack">Powrót</n-button>
    </template>
  </n-card>

</basic-layout>
</template>
