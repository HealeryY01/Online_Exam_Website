<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Header -->
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Quản lý người dùng -->
        <div
          class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow"
        >
          <div class="p-6">
            <div class="flex items-center mb-4">
              <i class="fas fa-users text-2xl text-blue-600 mr-3"></i>
              <h3 class="text-lg font-medium text-gray-900">
                Quản lý người dùng
              </h3>
            </div>
            <div class="mt-4">
              <ul class="space-y-3">
                <li>
                  <router-link
                    to="/admin/users"
                    class="flex items-center text-gray-600 hover:text-blue-600 transition-colors"
                  >
                    <i class="fas fa-user-friends mr-2"></i>
                    <span>Danh sách người dùng</span>
                  </router-link>
                </li>
                <li>
                  <router-link
                    to="/admin/roles"
                    class="flex items-center text-gray-600 hover:text-blue-600 transition-colors"
                  >
                    <i class="fas fa-user-tag mr-2"></i>
                    <span>Phân quyền người dùng</span>
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Quản lý kỳ thi -->
        <div
          class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow"
        >
          <div class="p-6">
            <div class="flex items-center mb-4">
              <i class="fas fa-book text-2xl text-green-600 mr-3"></i>
              <h3 class="text-lg font-medium text-gray-900">Quản lý kỳ thi</h3>
            </div>
            <div class="mt-4">
              <ul class="space-y-3">
                <li>
                  <router-link
                    to="/admin/exams"
                    class="flex items-center text-gray-600 hover:text-blue-600 transition-colors"
                  >
                    <i class="fas fa-list mr-2"></i>
                    <span>Danh sách kỳ thi</span>
                  </router-link>
                </li>
                <li>
                  <router-link
                    to="/admin/question-bank"
                    class="flex items-center text-gray-600 hover:text-blue-600 transition-colors"
                  >
                    <i class="fas fa-database mr-2"></i>
                    <span>Ngân hàng câu hỏi</span>
                  </router-link>
                </li>
                <li>
                  <router-link
                    to="/admin/results"
                    class="flex items-center text-gray-600 hover:text-blue-600 transition-colors"
                  >
                    <i class="fas fa-chart-bar mr-2"></i>
                    <span>Kết quả thi</span>
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Thông báo hệ thống -->
        <div
          class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow"
        >
          <div class="p-6">
            <div class="flex items-center mb-4">
              <i class="fas fa-bell text-2xl text-yellow-600 mr-3"></i>
              <h3 class="text-lg font-medium text-gray-900">
                Thông báo hệ thống
              </h3>
            </div>
            <div class="mt-4">
              <ul class="space-y-3">
                <li>
                  <router-link
                    to="/admin/notifications"
                    class="flex items-center text-gray-600 hover:text-blue-600 transition-colors"
                  >
                    <i class="fas fa-envelope mr-2"></i>
                    <span>Quản lý thông báo</span>
                  </router-link>
                </li>
                <li>
                  <router-link
                    to="/admin/system-logs"
                    class="flex items-center text-gray-600 hover:text-blue-600 transition-colors"
                  >
                    <i class="fas fa-history mr-2"></i>
                    <span>Lịch sử hệ thống</span>
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
      userInfo: {
        email: "",
        role: "",
      },
    };
  },
  created() {
    const user = JSON.parse(localStorage.getItem("user") || "{}");
    this.userInfo = user;

    // Kiểm tra quyền admin
    if (!user.role || user.role !== "admin") {
      this.$router.push("/");
      alert("Bạn không có quyền truy cập trang này!");
    }
  },
  methods: {
    logout() {
      localStorage.removeItem("isLoggedIn");
      localStorage.removeItem("token");
      localStorage.removeItem("user");
      this.$router.push("/");
    },
  },
};
</script>

<style scoped>
.auth-button {
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  font-weight: 500;
  transition: all 200ms;
}

.auth-button.logout {
  background-color: #ef4444;
  color: white;
}

.auth-button.logout:hover {
  background-color: #dc2626;
}
</style>
