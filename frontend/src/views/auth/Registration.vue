<template>
  <div
    class="min-h-screen bg-gradient-to-r from-blue-100 to-blue-200 py-6 flex flex-col justify-center sm:py-12 fixed inset-0 z-50"
  >
    <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full px-4 sm:px-0">
      <div
        class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"
      ></div>

      <div
        class="relative bg-white shadow-lg sm:rounded-3xl px-4 py-10 sm:p-20"
      >
        <div class="max-w-md mx-auto">
          <div class="divide-y divide-gray-200">
            <div
              class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7"
            >
              <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">
                Đăng Ký
              </h2>

              <form @submit.prevent="handleRegister" class="space-y-6">
                <div class="relative">
                  <input
                    type="text"
                    id="username"
                    v-model="formData.username"
                    class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-500"
                    placeholder="Tên đăng nhập"
                    required
                  />
                  <label
                    for="username"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                  >
                    Tên đăng nhập
                  </label>
                </div>

                <div class="relative">
                  <input
                    type="email"
                    id="email"
                    v-model="formData.email"
                    class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-500"
                    placeholder="Email"
                    required
                  />
                  <label
                    for="email"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                  >
                    Email
                  </label>
                </div>

                <div class="relative">
                  <input
                    type="password"
                    id="password"
                    v-model="formData.password"
                    class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-500"
                    placeholder="Mật khẩu"
                    required
                  />
                  <label
                    for="password"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                  >
                    Mật khẩu
                  </label>
                </div>

                <div class="relative">
                  <input
                    type="text"
                    id="fullName"
                    v-model="formData.full_name"
                    class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-500"
                    placeholder="Họ và tên"
                    required
                  />
                  <label
                    for="fullName"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                  >
                    Họ và tên
                  </label>
                </div>

                <div class="relative">
                  <select
                    id="role"
                    v-model="formData.role"
                    class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-blue-500 bg-white"
                    required
                  >
                    <option value="">Chọn vai trò</option>
                    <option value="student">Học sinh</option>
                    <option value="teacher">Giáo viên</option>
                  </select>
                  <label
                    for="role"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm"
                  >
                    Vai trò
                  </label>
                </div>

                <div class="relative">
                  <input
                    type="tel"
                    id="phone"
                    v-model="formData.phone"
                    class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-500"
                    placeholder="Số điện thoại"
                  />
                  <label
                    for="phone"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                  >
                    Số điện thoại
                  </label>
                </div>

                <div class="relative">
                  <textarea
                    id="address"
                    v-model="formData.address"
                    class="peer h-20 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-500"
                    placeholder="Địa chỉ"
                  ></textarea>
                  <label
                    for="address"
                    class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                  >
                    Địa chỉ
                  </label>
                </div>

                <div class="relative">
                  <button
                    type="submit"
                    class="bg-blue-500 text-white rounded-md px-4 py-2 w-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105"
                  >
                    Đăng Ký
                  </button>
                </div>
              </form>

              <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                  Đã có tài khoản?
                  <button
                    @click.prevent="handleCloseRegister"
                    class="text-blue-500 hover:text-blue-700 font-semibold ml-1 transition-colors"
                  >
                    Đăng Nhập
                  </button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axiosInstance from "@/plugins/axios";

export default {
  data() {
    return {
      formData: {
        username: "",
        email: "",
        password: "",
        full_name: "",
        role: "",
        phone: "",
        address: "",
        status: "active",
      },
      loading: false,
    };
  },
  methods: {
    async handleRegister() {
      try {
        this.loading = true;

        console.log("Dữ liệu gửi đi:", this.formData);

        const response = await axiosInstance.post(
          "/auth/register.php",
          this.formData
        );

        console.log("Phản hồi từ server:", response.data);

        if (response.data.success) {
          alert("Đăng ký thành công!");
          this.$emit("closeRegister");
        } else {
          alert(response.data.message || "Đăng ký thất bại. Vui lòng thử lại.");
        }
      } catch (error) {
        console.error("Chi tiết lỗi:", error.response?.data || error);
        alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
      } finally {
        this.loading = false;
      }
    },
    handleCloseRegister() {
      this.$router.push("/auth");
    },
  },
};
</script>
<style scoped>
@media (max-width: 640px) {
  .relative.py-3 {
    margin: 0 1rem;
  }
}
</style>
