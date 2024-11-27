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
                Đăng Nhập
              </h2>

              <form @submit.prevent="handleSubmit" class="space-y-6">
                <div class="relative">
                  <input
                    type="email"
                    id="email"
                    v-model="email"
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
                    v-model="password"
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
                  <button
                    type="submit"
                    class="bg-blue-500 text-white rounded-md px-4 py-2 w-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105"
                  >
                    Đăng Nhập
                  </button>
                </div>
              </form>

              <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                  Chưa có tài khoản?
                  <button
                    @click.prevent="handleToggleRegister"
                    class="text-blue-500 hover:text-blue-700 font-semibold ml-1 transition-colors"
                  >
                    Đăng Ký
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
      email: "",
      password: "",
      loading: false,
      error: null,
    };
  },
  methods: {
    async handleSubmit() {
      try {
        this.loading = true;

        if (!this.email || !this.password) {
          alert("Vui lòng nhập đầy đủ email và mật khẩu");
          return;
        }

        const response = await axiosInstance.post("/auth/login.php", {
          email: this.email,
          password: this.password,
        });

        console.log("Response:", response.data);

        if (response.data.success) {
          localStorage.setItem("isLoggedIn", "true");
          localStorage.setItem("user", JSON.stringify(response.data.user));

          const role = response.data.user.role;
          if (role === "admin") {
            await this.$router.push("/admin");
          } else if (role === "teacher") {
            await this.$router.push("/teacher");
          } else if (role === "student") {
            await this.$router.push("/student");
          } else {
            await this.$router.push("/");
          }

          window.location.reload();
        } else {
          this.error =
            response.data.message || "Email hoặc mật khẩu không chính xác";
          alert(this.error);
        }
      } catch (error) {
        console.error("Error:", error);
        this.error =
          error.response?.data?.message || "Có lỗi xảy ra khi đăng nhập";
        alert(this.error);
      } finally {
        this.loading = false;
      }
    },
    handleToggleRegister() {
      this.$router.push("/register");
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
