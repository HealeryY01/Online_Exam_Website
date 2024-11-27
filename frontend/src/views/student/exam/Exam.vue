<template>
  <div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Phần header -->
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Kỳ Thi</h1>
      </div>

      <!-- Phần lọc theo danh mục -->
      <div class="mb-6">
        <select 
          v-model="selectedCategory"
          class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
        >
          <option value="">Tất cả danh mục</option>
          <option v-for="category in categories" :key="category.id" :value="category.id">
            {{ category.name }}
          </option>
        </select>
      </div>

      <!-- Danh sách kỳ thi -->
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <div v-for="exam in filteredExams" :key="exam.id" 
          class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-lg transition-shadow duration-300">
          <div class="p-6">
            <div class="flex items-center justify-between mb-4">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                :class="{
                  'bg-green-100 text-green-800': exam.status === 'published',
                  'bg-yellow-100 text-yellow-800': exam.status === 'draft',
                  'bg-red-100 text-red-800': exam.status === 'closed'
                }">
                {{ exam.status }}
              </span>
              <span class="text-sm text-gray-500">
                {{ formatDuration(exam.duration) }}
              </span>
            </div>

            <h3 class="text-lg font-medium text-gray-900 mb-2">{{ exam.title }}</h3>
            <p class="text-sm text-gray-500 mb-4">{{ exam.description }}</p>

            <div class="border-t border-gray-200 pt-4">
              <div class="flex justify-between items-center">
                <div class="text-sm">
                  <p class="text-gray-500">Điểm đạt: {{ exam.passing_score }}</p>
                  <p class="text-gray-500">Số lần thi: {{ exam.max_attempts }}</p>
                </div>
                <button 
                  @click="startExam(exam.id)"
                  class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                  :disabled="exam.status !== 'published'"
                >
                  Bắt đầu thi
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      categories: [],
      exams: [],
      selectedCategory: '',
      loading: false,
      error: null
    };
  },
  computed: {
    filteredExams() {
      if (!this.selectedCategory) return this.exams;
      return this.exams.filter(exam => exam.category_id === this.selectedCategory);
    }
  },
  methods: {
    formatDuration(minutes) {
      const hours = Math.floor(minutes / 60);
      const mins = minutes % 60;
      return `${hours}h${mins}m`;
    },
    async fetchCategories() {
      try {
        const response = await axios.get('/api/categories');
        this.categories = response.data;
      } catch (error) {
        console.error('Lỗi khi tải danh mục:', error);
      }
    },
    async fetchExams() {
      try {
        const response = await axios.get('/api/exams');
        this.exams = response.data;
      } catch (error) {
        console.error('Lỗi khi tải kỳ thi:', error);
      }
    },
    async startExam(examId) {
      try {
        const response = await axios.post(`/api/exam-attempts`, {
          exam_id: examId,
          user_id: this.$store.state.user.id
        });
        
        if (response.data.success) {
          this.$router.push(`/exam/${examId}/attempt/${response.data.attempt_id}`);
        }
      } catch (error) {
        console.error('Lỗi khi bắt đầu thi:', error);
      }
    }
  },
  created() {
    this.fetchCategories();
    this.fetchExams();
  }
};
</script>
