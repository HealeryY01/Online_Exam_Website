/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      fontFamily: {
        Karla: ["Kalra", "sans-serif"],
      },
      colors: {
        "light-coffee": "#C89F94",
        coffee: {
          50: "#E8D6D0",
          200: "#C89F94",
          400: "#A25F4b",
          600: "#744838",
        },
      },
      translate: {
        all: "1rem", // Tuỳ chỉnh dịch chuyển theo cả hai trục
      },
      keyframes: {
        slideDown: {
          "0%": { transform: "translateY(-100%)" },
          "100%": { transform: "translateY(0)" },
        },
      },
      animation: {
        slideDown: "slideDown .4s ease-in-out",
      },
      backgroundImage: {
        "slider-bg":
          "url('./public/img/background/Real-Classroom-Background.jpg')",
      },
    },
  },
  plugins: [],
};
