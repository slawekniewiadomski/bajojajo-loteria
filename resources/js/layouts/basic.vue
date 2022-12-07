<script setup>
import {NSpace} from "naive-ui";
</script>
<template>
<n-space vertical
         align="center"
         justify="center"
         style="height:100vh;background-image:url('/img/christmas.jpg');background-size:cover;background-position:center;"
>
  <slot></slot>
</n-space>
</template>
