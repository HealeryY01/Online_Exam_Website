<template>
  <div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Bảng điều khiển Giáo viên</h1>
      </div>

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        <!-- Thống kê -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900">Thống kê</h3>
            <div class="mt-4">
              <div class="flex justify-between mb-2">
                <span>Tổng số đề thi:</span>
                <span>{{ stats.totalExams }}</span>
              </div>
              <div class="flex justify-between mb-2">
                <span>Số học sinh đã thi:</span>
                <span>{{ stats.totalStudents }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Kỳ thi gần đây -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900">Kỳ thi gần đây</h3>
            <div class="mt-4">
              <ul class="space-y-2">
                <li v-for="exam in recentExams" :key="exam.id">
                  <router-link :to="`/exam/${exam.id}`" class="text-blue-600 hover:text-blue-800">
                    {{ exam.title }}
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Truy cập nhanh -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900">Truy cập nhanh</h3>
            <div class="mt-4">
              <ul class="space-y-2">
                <li>
                  <router-link to="/exam/create" class="text-blue-600 hover:text-blue-800">
                    Tạo kỳ thi mới
                  </router-link>
                </li>
                <li>
                  <router-link to="/question-bank" class="text-blue-600 hover:text-blue-800">
                    Ngân hàng câu hỏi
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      stats: {
        totalExams: 0,
        totalStudents: 0
      },
      recentExams: []
    }
  },
  async created() {
    try {
      const response = await this.$axios.get('/api/teacher/dashboard');
      this.stats = response.data.stats;
      this.recentExams = response.data.recentExams;
    } catch (error) {
      console.error('Lỗi khi tải dữ liệu dashboard:', error);
    }
  }
}
</script>
