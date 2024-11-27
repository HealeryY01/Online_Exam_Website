<template>
  <div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Bảng điều khiển Học sinh</h1>
      </div>

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        <!-- Kỳ thi sắp tới -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900">Kỳ thi sắp tới</h3>
            <div class="mt-4">
              <ul class="space-y-2">
                <li v-for="exam in upcomingExams" :key="exam.id">
                  <router-link :to="`/exam/${exam.id}`" class="text-blue-600 hover:text-blue-800">
                    {{ exam.title }}
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Kết quả gần đây -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900">Kết quả gần đây</h3>
            <div class="mt-4">
              <ul class="space-y-2">
                <li v-for="result in recentResults" :key="result.id">
                  <router-link :to="`/result/${result.id}`" class="text-blue-600 hover:text-blue-800">
                    {{ result.exam_title }} - {{ result.score }}
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Thống kê -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900">Thống kê</h3>
            <div class="mt-4">
              <div class="flex justify-between mb-2">
                <span>Số kỳ thi đã tham gia:</span>
                <span>{{ stats.totalExams }}</span>
              </div>
              <div class="flex justify-between mb-2">
                <span>Điểm trung bình:</span>
                <span>{{ stats.averageScore }}</span>
              </div>
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
      upcomingExams: [],
      recentResults: [],
      stats: {
        totalExams: 0,
        averageScore: 0
      }
    }
  },
  async created() {
    try {
      const response = await this.$axios.get('/api/student/dashboard');
      this.upcomingExams = response.data.upcomingExams;
      this.recentResults = response.data.recentResults;
      this.stats = response.data.stats;
    } catch (error) {
      console.error('Lỗi khi tải dữ liệu dashboard:', error);
    }
  }
}
</script>
