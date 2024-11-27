<template>
  <div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Quản lý thông báo</h1>
        <button
          @click="showAddNotificationModal = true"
          class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors"
        >
          <i class="fas fa-plus mr-2"></i>Thêm thông báo
        </button>
      </div>

      <!-- Danh sách thông báo -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4">
          <p>Tính năng đang được phát triển...</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NotificationManagement',
  data() {
    return {
      showAddNotificationModal: false,
      notifications: []
    }
  }
}
</script> 