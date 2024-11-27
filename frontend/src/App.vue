<template>
  <div id="app">
    <TheHeader />
    <router-view></router-view>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from './components/layout/TheHeader.vue'
import TheFooter from './components/layout/TheFooter.vue'

export default {
  name: 'App',
  components: {
    TheHeader,
    TheFooter
  }
}
</script>

<style></style>
