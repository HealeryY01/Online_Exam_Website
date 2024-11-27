<template>
  <div>
    <Login v-if="!showRegister" @toggleRegister="handleToggleRegister" />
    <Registration v-if="showRegister" @closeRegister="handleCloseRegister" />
  </div>
</template>

<script>
import Login from './Login.vue'
import Registration from './Registration.vue'

export default {
  components: {
    Login,
    Registration
  },
  data() {
    return {
      showRegister: false
    }
  },
  methods: {
    handleToggleRegister() {
      this.showRegister = true;
    },
    handleCloseRegister() {
      this.showRegister = false;
    }
  }
}
</script>
