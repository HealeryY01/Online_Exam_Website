<template>
  <div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-8">
          <h1 class="text-3xl font-bold text-gray-900 mb-6">
            Liên hệ với chúng tôi
          </h1>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Form liên hệ -->
            <div>
              <form @submit.prevent="submitForm" class="space-y-6">
                <div>
                  <label class="block text-sm font-medium text-gray-700"
                    >Họ và tên</label
                  >
                  <input
                    type="text"
                    v-model="form.name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700"
                    >Email</label
                  >
                  <input
                    type="email"
                    v-model="form.email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700"
                    >Chủ đề</label
                  >
                  <input
                    type="text"
                    v-model="form.subject"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700"
                    >Nội dung</label
                  >
                  <textarea
                    v-model="form.message"
                    rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required
                  ></textarea>
                </div>

                <button
                  type="submit"
                  class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                  Gửi tin nhắn
                </button>
              </form>
            </div>

            <!-- Thông tin liên hệ -->
            <div class="space-y-6">
              <div>
                <h3 class="text-lg font-medium text-gray-900">Địa chỉ</h3>
                <p class="mt-2 text-gray-600">123 Đường ABC, Quận XYZ, TP.HN</p>
              </div>

              <div>
                <h3 class="text-lg font-medium text-gray-900">Email</h3>
                <p class="mt-2 text-gray-600">support@onlinetest.com</p>
              </div>

              <div>
                <h3 class="text-lg font-medium text-gray-900">Điện thoại</h3>
                <p class="mt-2 text-gray-600">1900 1234</p>
              </div>

              <div>
                <h3 class="text-lg font-medium text-gray-900">Giờ làm việc</h3>
                <p class="mt-2 text-gray-600">Thứ 2 - Thứ 6: 8:00 - 17:00</p>
                <p class="text-gray-600">Thứ 7: 8:00 - 12:00</p>
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
  name: "Contact",
  data() {
    return {
      form: {
        name: "",
        email: "",
        subject: "",
        message: "",
      },
    };
  },
  methods: {
    async submitForm() {
      try {
        const response = await this.$axios.post("/api/contact", this.form);
        if (response.data.success) {
          alert("Tin nhắn của bạn đã được gửi thành công!");
          this.resetForm();
        } else {
          alert("Có lỗi xảy ra: " + response.data.message);
        }
      } catch (error) {
        console.error("Lỗi khi gửi form:", error);
        alert("Có lỗi xảy ra khi gửi tin nhắn. Vui lòng thử lại sau.");
      }
    },
    resetForm() {
      this.form = {
        name: "",
        email: "",
        subject: "",
        message: "",
      };
    },
  },
};
</script>
