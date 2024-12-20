import axios from "axios";

const axiosInstance = axios.create({
  baseURL: "http://localhost/online-exam-website/backend/api",
  timeout: 5000,
  headers: {
    "Content-Type": "application/json",
  },
});

export default axiosInstance;
