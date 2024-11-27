<template>
  <div class="container mx-auto p-4">
    <h1 class="text-xl font-bold text-center mb-6">Chọn Đề Thi</h1>
    <form @submit.prevent="startExam">
      <div class="mb-4">
        <label class="block text-lg font-medium">Chọn đề thi:</label>
        <div v-for="exam in exams" :key="exam.id" class="flex items-center mb-2">
          <input
            type="checkbox"
            :value="exam.id"
            v-model="selectedExams"
            class="mr-2"
          />
          <span>{{ exam.name }}</span>
        </div>
      </div>
      <button
        type="submit"
        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition"
        :disabled="selectedExams.length === 0"
      >
        Bắt đầu thi
      </button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      exams: [
        { id: 1, name: "Đề thi 1", duration: 600 },
        { id: 2, name: "Đề thi 2", duration: 1200 },
        { id: 3, name: "Đề thi 3", duration: 900 },
      ],
      selectedExams: [],
    };
  },
  methods: {
    startExam() {
      if (this.selectedExams.length > 0) {
        this.$router.push({
          name: 'exam',
          params: { 
            examIds: this.selectedExams,
            mode: 'student'
          }
        });
      }
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 600px;
}
</style>
