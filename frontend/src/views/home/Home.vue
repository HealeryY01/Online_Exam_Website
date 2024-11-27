<template>
  <main>
    <div
      class="slider h-[530px] bg-[url('@/assets/images/background/Real-Classroom-Background.jpg')] bg-cover bg-no-repeat bg-right-bottom mb-24"
    >
      <div
        class="w-full h-full flex justify-center items-center bg-gray-900 bg-opacity-40"
      >
        <div class="mx-16 text-white text-center">
          <div class="uppercase mb-6">Hệ thống quản lý</div>
          <div class="font-medium text-5xl mb-6">Online Test</div>
          <div class="font-medium text-lg mb-8">Học và thi trực tuyến</div>
          <div class="flex justify-center">
            <div class="nth-button bg-white text-gray-900 w-max">
              Explore Our Tests
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End slider -->

    <div class="nth-subheadline">
      <div class="nth-subheadline-deco-line"></div>
      <div class="nth-subheadline-deco-label">Câu Chuyện về thi trực tuyến</div>
      <div class="nth-subheadline-deco-line"></div>
    </div>
    <div
      class="story flex flex-col lg:flex-row justify-center items-center gap-8 lg:gap-4 w-[95%] lg:w-[65%] mx-auto mb-24"
    >
      <div class="basis-1/2">
        <video autoplay loop muted class="w-full h-[480px] object-cover">
          <source src="@/assets/videos/online-exam.mp4" type="video/mp4" />
        </video>
      </div>
      <div class="basis-1/2 text-center lg:text-left lg:pl-6">
        <div class="text-3xl leading-10 mb-6 font-">
          Một câu chuyện cho một website thi thử trực tuyến nhằm thể hiện rõ mục
          tiêu và cách người dùng tương tác với nền tảng này:
        </div>
        <div class="text-gray-500 leading-7 mb-6">
          Anh Tuấn là một sinh viên đại học năm cuối chuyên ngành Kinh tế, chuẩn
          bị tham gia kỳ thi chứng chỉ tiếng Anh để đủ điều kiện tốt nghiệp và
          xin việc. Được bạn bè giới thiệu, anh quyết định thử một trang web thi
          thử trực tuyến, nơi cung cấp các bài kiểm tra mô phỏng, tài liệu ôn
          tập và hệ thống xếp hạng. Trải nghiệm trên trang web không chỉ giúp
          anh chuẩn bị kỹ càng mà còn cho anh nhiều bài học thú vị.
        </div>
        <div>
          <a
            href=""
            class="text-coffee-400 hover:text-coffee-600 relative after:absolute after:-bottom-2 after:left-0 after:bg-coffee-50 hover:after:bg-coffee-200 after:h-0.5 after:w-full after:translate-x-0 after:ease-in-out after:duration-400"
          >
            Read the full Story
          </a>
        </div>
      </div>
    </div>
    <!-- end story -->
    <div class="nth-subheadline">
      <div class="nth-subheadline-deco-line"></div>
      <div class="nth-subheadline-deco-label">Kì thi</div>
      <div class="nth-subheadline-deco-line"></div>
    </div>
    <div class="competition w-[95%] lg:w-[65%] mx-auto mb-24">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-4">
        <div class="nth-competition">
          <!-- Khối trên -->
          <div
            class="h-[200px] sm:h-[250px] bg-[url('@/assets/images/background/kt-1.png')] bg-cover bg-no-repeat bg-center"
          >
            <a href="" alt="">
              <div
                class="w-full h-full hover:bg-gray-900 hover:bg-opacity-10 hover:translate-x-0 hover:ease-in-out hover:duration-400 relative group"
              >
                <div
                  class="absolute bg-white text-gray-900 w-11/12 bottom-4 left-1/2 -translate-x-1/2 hidden group-hover:block group-hover:animate-fadeIn nth-button"
                >
                  Tìm Hiểu Thêm
                </div>
              </div>
            </a>
          </div>

          <!-- Khối dưới -->
          <div class="text-center mt-8">
            <!-- Nội dung của khối dưới -->
            <a href="">
              <div class="text-xl mb-3 text-coffee-200 hover:text-coffee-600">
                [MỞ ĐĂNG KÝ] KỲ THI OLYMPIC TIN HỌC QUỐC TẾ CCO 2024-2025
              </div>
            </a>
            <p>
              Kỳ thi Olympic Tin học quốc tế CCO (CREST Cyber Olympiad) là kỳ
              thi về máy tính và công nghệ...
            </p>
          </div>
        </div>

        <div class="nth-competition">
          <!-- Khối trên -->
          <div
            class="h-[200px] sm:h-[250px] bg-[url('@/assets/images/background/kt-2.png')] bg-cover bg-no-repeat bg-center"
          >
            <a href="" alt="">
              <div
                class="w-full h-full hover:bg-gray-900 hover:bg-opacity-10 hover:translate-x-0 hover:ease-in-out hover:duration-400 relative group"
              >
                <div
                  class="absolute bg-white text-gray-900 w-11/12 bottom-4 left-1/2 -translate-x-1/2 hidden group-hover:block group-hover:animate-fadeIn nth-button"
                >
                  Tìm Hiểu Thêm
                </div>
              </div>
            </a>
          </div>

          <!-- Khối dưới -->
          <div class="text-center mt-8">
            <!-- Nội dung của khối dưới -->
            <a href="">
              <div class="text-xl mb-3 text-coffee-200 hover:text-coffee-600">
                [MỞ ĐĂNG KÝ] KỲ THI OLYMPIC KHOA HỌC QUỐC TẾ CSO 2024-2025
              </div>
            </a>
            <p>
              Kỳ thi Olympic Khoa học quốc tế CSO (CREST Science Olympiad) là kỳ
              thi Khoa học trực tuyến đầu tiên...
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Kì thi -->
    <div
      class="nth-parallax-section bg-[url('@/assets/images/background/bg-parallax.jpg')] bg-cover bg-no-repeat bg-center h-[340px] mb-24 bg-fixed w-[100vw] relative left-[calc(-50vw_+_50%)]"
    ></div>
    <!-- End parallax -->
    <div class="nth-subheadline">
      <div class="nth-subheadline-deco-line"></div>
      <div class="nth-subheadline-deco-label">Đề thi</div>
      <div class="nth-subheadline-deco-line"></div>
    </div>
    <div class="Exam w-[95%] lg:w-[65%] mx-auto mb-16">
      <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-4"
      >
        <div class="nth-exam-paper">
          <!-- Khối trên -->
          <div
            class="h-[200px] bg-[url('@/assets/images/background/dt-1.jpg')] bg-cover bg-no-repeat bg-center"
          >
            <a href="" alt="">
              <div
                class="w-full h-full hover:bg-gray-900 hover:bg-opacity-10 hover:translate-x-0 hover:ease-in-out hover:duration-400 relative group"
              >
                <div
                  class="absolute bg-white text-gray-900 w-11/12 bottom-4 left-1/2 -translate-x-1/2 hidden group-hover:block group-hover:animate-fadeIn nth-button"
                >
                  Tìm Hiểu Thêm
                </div>
              </div>
            </a>
          </div>

          <!-- Khối dưới -->
          <div class="text-center my-8">
            <!-- Nội dung của khối dưới -->
            <a href="">
              <div class="text-xl mb-3 text-coffee-200 hover:text-coffee-600">
                Topclass iLearn Tiếng Anh 10 (Hệ 10 năm)
              </div>
            </a>
          </div>
        </div>

        <div class="nth-exam-paper">
          <!-- Khối trên -->
          <div
            class="h-[200px] bg-[url('@/assets/images/background/dt-2.jpg')] bg-cover bg-no-repeat bg-center"
          >
            <a href="" alt="">
              <div
                class="w-full h-full hover:bg-gray-900 hover:bg-opacity-10 hover:translate-x-0 hover:ease-in-out hover:duration-400 relative group"
              >
                <div
                  class="absolute bg-white text-gray-900 w-11/12 bottom-4 left-1/2 -translate-x-1/2 hidden group-hover:block group-hover:animate-fadeIn nth-button"
                >
                  Tìm Hiểu Thêm
                </div>
              </div>
            </a>
          </div>

          <!-- Khối dưới -->
          <div class="text-center my-8">
            <!-- Nội dung của khối dưới -->
            <a href="">
              <div class="text-xl mb-3 text-coffee-200 hover:text-coffee-600">
                TopUni iTest PEN Tiếng Anh
              </div>
            </a>
          </div>
        </div>

        <div class="nth-exam-paper">
          <!-- Khối trên -->
          <div
            class="h-[200px] bg-[url('@/assets/images/background/dt-5.png')] bg-cover bg-no-repeat bg-center"
          >
            <a href="" alt="">
              <div
                class="w-full h-full hover:bg-gray-900 hover:bg-opacity-10 hover:translate-x-0 hover:ease-in-out hover:duration-400 relative group"
              >
                <div
                  class="absolute bg-white text-gray-900 w-11/12 bottom-4 left-1/2 -translate-x-1/2 hidden group-hover:block group-hover:animate-fadeIn nth-button"
                >
                  Tìm Hiểu Thêm
                </div>
              </div>
            </a>
          </div>

          <!-- Khối dưới -->
          <div class="text-center my-8">
            <!-- Nội dung của khối dưới -->
            <a href="">
              <div class="text-xl mb-3 text-coffee-200 hover:text-coffee-600">
                Tổng ôn cấp tốc luyện thi ĐGNL ĐH Quốc gia Hà Nộih
              </div>
            </a>
          </div>
        </div>

        <div class="nth-exam-paper">
          <!-- Khối trên -->
          <div
            class="h-[200px] bg-[url('@/assets/images/background/dt-7.png')] bg-cover bg-no-repeat bg-center"
          >
            <a href="" alt="">
              <div
                class="w-full h-full hover:bg-gray-900 hover:bg-opacity-10 hover:translate-x-0 hover:ease-in-out hover:duration-400 relative group"
              >
                <div
                  class="absolute bg-white text-gray-900 w-11/12 bottom-4 left-1/2 -translate-x-1/2 hidden group-hover:block group-hover:animate-fadeIn nth-button"
                >
                  Tìm Hiểu Thêm
                </div>
              </div>
            </a>
          </div>

          <!-- Khối dưới -->
          <div class="text-center my-8">
            <!-- Nội dung của khối dưới -->
            <a href="">
              <div class="text-xl mb-3 text-coffee-200 hover:text-coffee-600">
                Bứt phá 9+ điểm thi vào 10 môn Ngữ văn
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div
      class="subscribe-us h-[350px] bg-[#1d1f2e] flex flex-col justify-center items-center mb-24"
    >
      <div class="flex justify-center items-center px-6 xs:px-0 mb-6">
        <div class="w-8 h-px bg-gray-700"></div>
        <div
          class="uppercase mx-4 tracking-widest text-gray-400 font-bold text-sm text-center"
        >
          Sign up and get free online test
        </div>
        <div class="w-8 h-px bg-gray-700"></div>
      </div>
      <div class="text-4xl text-white mb-6 text-center">Test Updates</div>
      <div class="nth-form">
        <div
          class="flex flex-col md:flex-row justify-center items-center gap-3"
        >
          <div class="nth-form-item text-center">
            <input
              type="email"
              class="px-6 py-4 w-[350px] max-w-[80%] xs:max-w-full bg-inherit border-[1px] border-gray-700 outline-none text-white leading-5 hover:border-gray-300 duration-500 focus:border-gray-300 placeholder:uppercase placeholder:text-xs placeholder:tracking-widest placeholder:font-semibold"
              placeholder="subscribe@gmail.com"
            />
          </div>
          <div class="nth-form-item">
            <button
              type="submit"
              class="nth-button bg-white text-gray-900 w-max h-[54px]"
            >
              Subscribe
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style></style>
