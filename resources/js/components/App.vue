<script setup>
import {onMounted} from "vue";

onMounted(async () => hideLoader());

const hideLoader = async () => {
    var preloader = $('.spinner-wrapper');
    var preloaderFadeOutTime = 500;
    setTimeout(function() {
        preloader.fadeOut(preloaderFadeOutTime);
    }, 500);
}
</script>
<template>
  <router-view/>
</template>
