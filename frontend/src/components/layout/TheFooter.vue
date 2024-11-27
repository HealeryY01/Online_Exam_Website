<template>
  <footer class="bg-gray-50 border-t border-gray-200">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Phần giới thiệu -->
        <div class="col-span-1 md:col-span-2">
          <div class="flex items-center mb-6">
            <img
              src="@/assets/images/favicon/icon-1.ico"
              alt="Logo"
              class="h-10 w-auto"
            />
            <span class="text-2xl font-bold text-gray-900">Online Test</span>
          </div>
          <p class="text-gray-600 mb-8">
            Hệ thống thi trực tuyến thông minh, hỗ trợ đa dạng các hình thức thi
            và kiểm tra đánh giá. Mang đến trải nghiệm học tập và thi cử hiệu
            quả cho người dùng.
          </p>
          <div class="flex space-x-6">
            <a
              href="#"
              class="text-gray-400 hover:text-blue-600 transition-colors"
            >
              <i class="fab fa-facebook-square text-2xl"></i>
            </a>
            <a
              href="#"
              class="text-gray-400 hover:text-blue-400 transition-colors"
            >
              <i class="fab fa-twitter-square text-2xl"></i>
            </a>
            <a
              href="#"
              class="text-gray-400 hover:text-red-600 transition-colors"
            >
              <i class="fab fa-youtube text-2xl"></i>
            </a>
            <a
              href="#"
              class="text-gray-400 hover:text-pink-600 transition-colors"
            >
              <i class="fab fa-instagram-square text-2xl"></i>
            </a>
          </div>
        </div>

        <!-- Menu -->
        <div>
          <h3
            class="text-sm font-semibold text-gray-500 tracking-wider uppercase mb-4"
          >
            Menu
          </h3>
          <ul class="space-y-3">
            <li>
              <router-link
                to="/"
                class="text-gray-600 hover:text-blue-600 transition-colors"
              >
                Trang chủ
              </router-link>
            </li>
            <li>
              <router-link
                to="/about"
                class="text-gray-600 hover:text-blue-600 transition-colors"
              >
                Giới thiệu
              </router-link>
            </li>
            <li>
              <router-link
                to="/contact"
                class="text-gray-600 hover:text-blue-600 transition-colors"
              >
                Liên hệ
              </router-link>
            </li>
            <li>
              <router-link
                to="/auth"
                class="text-gray-600 hover:text-blue-600 transition-colors"
              >
                Đăng nhập
              </router-link>
            </li>
          </ul>
        </div>

        <!-- Hỗ trợ -->
        <div>
          <h3
            class="text-sm font-semibold text-gray-500 tracking-wider uppercase mb-4"
          >
            Hỗ trợ & Liên hệ
          </h3>
          <ul class="space-y-3">
            <li class="flex items-center text-gray-600">
              <i class="fas fa-envelope w-5 text-gray-400"></i>
              <span>support@onlinetest.com</span>
            </li>
            <li class="flex items-center text-gray-600">
              <i class="fas fa-phone-alt w-5 text-gray-400"></i>
              <span>1900 1234</span>
            </li>
            <li class="flex items-center text-gray-600">
              <i class="fas fa-map-marker-alt w-5 text-gray-400"></i>
              <span>123 ABC Street, XYZ District</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Copyright -->
      <div class="mt-12 pt-8 border-t border-gray-200">
        <p class="text-center text-gray-400 text-sm">
          © 2024 Online Test. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "TheFooter",
};
</script>

<style></style>
