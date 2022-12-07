<script setup>
import {
  NList,
  NListItem,
  NSpace,
  NPopover,
  NCard,
  NButton,
  NBadge,
  NH3,
  NAlert,
} from "naive-ui";
import { defineProps } from "vue";
import BasicLayout from "../../layouts/basic";


const props = defineProps( [ "lottery" ] );

function handleJoin() {
  window.location.href = `/${props.lottery.slug}/join`;
}
</script>


<template>
<basic-layout>
  <n-card :title="lottery.name"
          class="lottery-card"
          segmented
  >
    <div v-if="lottery.active">
      Dołączyć możesz poniżej, cena prezentu zostanie ustalona na podstawie odpowiedzi uczestników, gdy wszyscy się zapiszą i nastąpi losowanie.
      <br>Zapisz link wygenerowany po dołączeniu, i nie pokazuj go nikomu!
    </div>

    <div v-if="!lottery.active">
      Loteria zakończona, członkowie znajdą swoje losy w linkach które otrzymali.
      Ustalona kwota prezentu: {{ lottery.price_cap }} zł
    </div>

    <template #footer>
      <n-popover trigger="hover"
                 :disabled="lottery.active"
      >
        <template #trigger>
          <n-button type="primary"
                    tag="div"
                    :disabled="!lottery.active"
                    size="large"
                    style="width:100%; padding:0;"
                    @click="handleJoin"
          >Dołącz
          </n-button>
        </template>
        <span>Loteria zakończona.</span>
      </n-popover>
    </template>
    <template #action>
      <n-h3>Uczestnicy ({{ lottery.participants.length }}):</n-h3>
      <n-list v-if="lottery.participants.length > 0"
              bordered
              style="max-height: 300px; overflow-y: auto;"
      >
        <n-list-item v-for="participant in lottery.participants">
          {{ participant.name }}
        </n-list-item>
      </n-list>
      <n-alert v-else
               type="info"
      >Brak zapisanych uczestników
      </n-alert>
    </template>
  </n-card>
</basic-layout>
</template>
