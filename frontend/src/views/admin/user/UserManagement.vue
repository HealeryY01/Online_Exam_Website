<template>
  <div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Quản lý người dùng</h1>
        <button
          @click="showAddUserModal = true"
          class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors"
        >
          <i class="fas fa-plus mr-2"></i>Thêm người dùng
        </button>
      </div>

      <!-- Search and Filter -->
      <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="relative">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Tìm kiếm người dùng..."
              class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
          <select
            v-model="roleFilter"
            class="px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="">Tất cả vai trò</option>
            <option value="admin">Admin</option>
            <option value="teacher">Giáo viên</option>
            <option value="student">Học sinh</option>
          </select>
          <select
            v-model="statusFilter"
            class="px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="">Tất cả trạng thái</option>
            <option value="active">Hoạt động</option>
            <option value="inactive">Không hoạt động</option>
          </select>
        </div>
      </div>

      <!-- Users Table -->
      <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Người dùng
              </th>
              <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Vai trò
              </th>
              <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Trạng thái
              </th>
              <th
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Ngày tạo
              </th>
              <th
                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Thao tác
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-if="!users || users.length === 0">
              <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                Không có dữ liệu người dùng
              </td>
            </tr>
            <tr v-else v-for="user in filteredUsers" :key="user.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img
                      class="h-10 w-10 rounded-full"
                      :src="user.avatar || 'default-avatar.png'"
                      alt=""
                    />
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ user.full_name }}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ user.email }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span
                  :class="getRoleBadgeClass(user.role)"
                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                >
                  {{ getRoleText(user.role) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span
                  :class="getStatusBadgeClass(user.status)"
                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                >
                  {{ getStatusText(user.status) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ formatDate(user.created_at) }}
              </td>
              <td
                class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
              >
                <button
                  @click="editUser(user)"
                  class="text-blue-600 hover:text-blue-900 mr-3"
                >
                  <i class="fas fa-edit"></i>
                </button>
                <button
                  @click="confirmDeleteUser(user)"
                  class="text-red-600 hover:text-red-900"
                >
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add/Edit User Modal -->
    <div
      v-if="showAddUserModal"
      class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
    >
      <div
        class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white"
      >
        <div class="mt-3">
          <h3 class="text-lg font-medium text-gray-900 mb-4">
            {{ editingUser ? "Chỉnh sửa người dùng" : "Thêm người dùng mới" }}
          </h3>
          <form @submit.prevent="saveUser" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700"
                >Username</label
              >
              <input
                v-model="userForm.username"
                type="text"
                required
                :disabled="editingUser"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"
                >Email</label
              >
              <input
                v-model="userForm.email"
                type="email"
                required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"
                >Họ và tên</label
              >
              <input
                v-model="userForm.full_name"
                type="text"
                required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"
                >Số điện thoại</label
              >
              <input
                v-model="userForm.phone"
                type="tel"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"
                >Địa chỉ</label
              >
              <textarea
                v-model="userForm.address"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              ></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"
                >Vai trò</label
              >
              <select
                v-model="userForm.role"
                required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              >
                <option value="student">Học sinh</option>
                <option value="teacher">Giáo viên</option>
                <option value="admin">Quản trị viên</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700"
                >Trạng thái</label
              >
              <select
                v-model="userForm.status"
                required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              >
                <option value="active">Hoạt động</option>
                <option value="inactive">Không hoạt động</option>
                <option value="suspended">Tạm khóa</option>
              </select>
            </div>

            <div v-if="!editingUser">
              <label class="block text-sm font-medium text-gray-700"
                >Mật khẩu</label
              >
              <input
                v-model="userForm.password"
                type="password"
                :required="!editingUser"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              />
            </div>

            <div class="flex justify-end gap-2">
              <button
                type="button"
                @click="showAddUserModal = false"
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400"
              >
                Hủy
              </button>
              <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
              >
                {{ editingUser ? "Cập nhật" : "Thêm" }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      users: [],
      searchQuery: "",
      roleFilter: "",
      statusFilter: "",
      showAddUserModal: false,
      editingUser: null,
      userForm: {
        username: "",
        email: "",
        password: "",
        full_name: "",
        role: "student",
        phone: "",
        address: "",
        status: "active",
      },
    };
  },
  computed: {
    filteredUsers() {
      if (!this.users) return [];

      return this.users.filter((user) => {
        if (!user) return false;

        const matchesSearch =
          user.full_name
            ?.toLowerCase()
            .includes(this.searchQuery.toLowerCase()) ||
          user.email?.toLowerCase().includes(this.searchQuery.toLowerCase());
        const matchesRole = !this.roleFilter || user.role === this.roleFilter;
        const matchesStatus =
          !this.statusFilter || user.status === this.statusFilter;

        return matchesSearch && matchesRole && matchesStatus;
      });
    },
  },
  methods: {
    async fetchUsers() {
      try {
        console.log("Đang gọi API...");
        const response = await axios.get(
          "http://localhost/online-exam-website/backend/api/users/get_users.php"
        );
        console.log("API Response:", response.data);

        if (response.data && response.data.success) {
          // Gán trực tiếp vì cấu trúc dữ liệu đã khớp
          this.users = response.data.users;
          console.log("Users đã được cập nhật:", this.users);
        } else {
          throw new Error(
            response.data?.message || "Không thể tải danh sách người dùng"
          );
        }
      } catch (error) {
        console.error("Chi tiết lỗi:", error);
        if (error.response) {
          console.log("Response status:", error.response.status);
          console.log("Response data:", error.response.data);
        }
        alert("Không thể tải danh sách người dùng");
      }
    },
    async saveUser() {
      try {
        const url = this.editingUser
          ? `http://localhost/online-exam-website/backend/api/users/update_user.php`
          : `http://localhost/online-exam-website/backend/api/users/create_user.php`;

        const response = await axios.post(url, this.userForm);

        if (response.data.success) {
          alert(
            this.editingUser
              ? "Cập nhật thành công!"
              : "Thêm người dùng thành công!"
          );
          this.showAddUserModal = false;
          this.fetchUsers();
        } else {
          alert(response.data.message);
        }
      } catch (error) {
        console.error("Lỗi khi lưu người dùng:", error);
        alert("Có lỗi xảy ra khi lưu thông tin");
      }
    },
    editUser(user) {
      this.editingUser = user;
      this.userForm = { ...user };
      this.showAddUserModal = true;
    },
    async confirmDeleteUser(user) {
      if (confirm(`Bạn có chắc muốn xóa người dùng ${user.full_name}?`)) {
        try {
          const response = await axios.post(
            "http://localhost/online-exam-website/backend/api/users/delete_user.php",
            { id: user.id }
          );

          if (response.data.success) {
            alert("Xóa người dùng thành công!");
            this.fetchUsers();
          } else {
            alert(response.data.message);
          }
        } catch (error) {
          console.error("Lỗi khi xóa người dùng:", error);
          alert("Có lỗi xảy ra khi xóa người dùng");
        }
      }
    },
    getRoleBadgeClass(role) {
      return (
        {
          admin: "bg-purple-100 text-purple-800",
          teacher: "bg-blue-100 text-blue-800",
          student: "bg-green-100 text-green-800",
        }[role] || "bg-gray-100 text-gray-800"
      );
    },
    getStatusBadgeClass(status) {
      return (
        {
          active: "bg-green-100 text-green-800",
          inactive: "bg-red-100 text-red-800",
        }[status] || "bg-gray-100 text-gray-800"
      );
    },
    getRoleText(role) {
      return (
        {
          admin: "Quản trị viên",
          teacher: "Giáo viên",
          student: "Học sinh",
        }[role] || role
      );
    },
    getStatusText(status) {
      return (
        {
          active: "Hoạt động",
          inactive: "Không hoạt động",
        }[status] || status
      );
    },
    formatDate(date) {
      return new Date(date).toLocaleDateString("vi-VN");
    },
  },
  created() {
    this.fetchUsers();
  },
};
</script>
