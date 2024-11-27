<!-- src/components/QuestionBank.vue -->
<template>
  <div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Ngân hàng câu hỏi</h1>
        <button 
          @click="createQuestion"
          class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
        >
          Thêm câu hỏi
        </button>
      </div>

      <!-- Bộ lọc -->
      <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Môn học</label>
            <select v-model="filters.subject" class="mt-1 block w-full rounded-md border-gray-300">
              <option value="">Tất cả</option>
              <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                {{ subject.name }}
              </option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700">Độ khó</label>
            <select v-model="filters.difficulty" class="mt-1 block w-full rounded-md border-gray-300">
              <option value="">Tất cả</option>
              <option value="easy">Dễ</option>
              <option value="medium">Trung bình</option>
              <option value="hard">Khó</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Loại câu hỏi</label>
            <select v-model="filters.type" class="mt-1 block w-full rounded-md border-gray-300">
              <option value="">Tất cả</option>
              <option value="multiple_choice">Trắc nghiệm</option>
              <option value="essay">Tự luận</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Danh sách câu hỏi -->
      <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-200">
          <li v-for="question in filteredQuestions" :key="question.id" class="p-4 hover:bg-gray-50">
            <div class="flex items-center justify-between">
              <div class="flex-1">
                <h3 class="text-lg font-medium text-gray-900">{{ question.content }}</h3>
                <p class="mt-2 text-sm text-gray-500">
                  {{ question.subject }} | {{ question.difficulty }} | {{ question.type }}
                </p>
              </div>
              <div class="flex space-x-2">
                <button @click="editQuestion(question)" class="text-blue-600 hover:text-blue-800">
                  Sửa
                </button>
                <button @click="deleteQuestion(question.id)" class="text-red-600 hover:text-red-800">
                  Xóa
                </button>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      questions: [],
      subjects: [],
      filters: {
        subject: '',
        difficulty: '',
        type: ''
      }
    };
  },
  computed: {
    filteredQuestions() {
      return this.questions.filter(q => {
        if (this.filters.subject && q.subject_id !== this.filters.subject) return false;
        if (this.filters.difficulty && q.difficulty !== this.filters.difficulty) return false;
        if (this.filters.type && q.type !== this.filters.type) return false;
        return true;
      });
    }
  },
  methods: {
    async fetchQuestions() {
      try {
        const response = await axios.get('/api/questions');
        this.questions = response.data;
      } catch (error) {
        console.error('Lỗi khi tải câu hỏi:', error);
      }
    },
    async fetchSubjects() {
      try {
        const response = await axios.get('/api/subjects');
        this.subjects = response.data;
      } catch (error) {
        console.error('Lỗi khi tải môn học:', error);
      }
    },
    createQuestion() {
      // Chuyển đến trang tạo câu hỏi
      this.$router.push('/question-bank/create');
    },
    editQuestion(question) {
      // Chuyển đến trang sửa câu hỏi
      this.$router.push(`/question-bank/edit/${question.id}`);
    },
    async deleteQuestion(id) {
      if (confirm('Bạn có chắc chắn muốn xóa câu hỏi này?')) {
        try {
          await axios.delete(`/api/questions/${id}`);
          this.questions = this.questions.filter(q => q.id !== id);
        } catch (error) {
          console.error('Lỗi khi xóa câu hỏi:', error);
        }
      }
    }
  },
  created() {
    this.fetchQuestions();
    this.fetchSubjects();
  }
};
</script>

<style scoped>
/* You can add custom styles here if needed */
</style>
  