<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png" />
</head>

<body class="">
    <?php require 'views/components/nav.php'; ?>
    <div class="bg-[#0f172a] flex items-center justify-center h-screen text-white">
        <div class="w-full max-w-md p-6 rounded-lg shadow-md border border-gray-700 pt-10 pb-6 ml-3 mr-3">
            <!-- Logo -->
            <div class="flex justify-center mb-3">

                <span class="text-3xl font-semibold text-center mb-6">Đăng ký tài khoản</span>
            </div>

            <!-- Form -->
            <form class="space-y-4" id="registerForm" action="./register/submit" method="POST">
                <div>
                    <label class="block text-sm mb-1" for="fullName">Họ và Tên</label>
                    <input type="text" id="fullName" name="fullName" placeholder="Họ và tên của bạn"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <div id="error-fullName" class="form-error text-red-500 text-sm mt-1"></div>
                </div>
                <div>
                    <label class="block text-sm mb-1" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <div id="error-email" class="form-error text-red-500 text-sm mt-1"></div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-sm" for="password">Password</label>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Mật khẩu"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <div id="error-password" class="form-error text-red-500 text-sm mt-1"></div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-sm" for="SDT">Số điện thoại</label>
                    </div>
                    <input type="tel" id="SDT" name="SDT" placeholder="Số điện thoại"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <div id="error-SDT" class="form-error text-red-500 text-sm mt-1"></div>
                </div>
                <button type="submit" name="register"
                    class="w-full py-2 rounded-md bg-indigo-500 hover:bg-indigo-600 transition text-white font-medium cursor-pointer">
                    Đăng ký
                </button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-400"> Đã có tài khoản?
                <a href="login"
                    class="text-indigo-400 hover:underline">Đăng nhập tại đây!</a>
            </p>
        </div>
    </div>
    <?php if (isset($_SESSION['isRegisterSuccess']) && $_SESSION['isRegisterSuccess'] == 1): unset($_SESSION['isRegisterSuccess']);?>
        <div id="popup-modal" tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center flex justify-between items-center flex-col">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#00ff55" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.75 12L10.58 14.83L16.25 9.17004" stroke="#00ff55" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <h3 class="mb-5 mt-5 text-lg text-white font-bold ">Đăng ký thành công!</h3>
                        <a href="./login" type="button" data-modal-hide="popup-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Đăng nhập ngay?</a>                     
                    </div>
                </div>
            </div>
        </div>   
    <?php endif; ?>
    
    <?php if (isset($_SESSION['isRegisterSuccess']) && $_SESSION['isRegisterSuccess'] == 0): unset($_SESSION['isRegisterSuccess']);?>
        <div id="popup-modal" tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center flex justify-between items-center flex-col">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="error-box"> <path id="vector" d="M2 8C2 4.68629 4.68629 2 8 2H16C19.3137 2 22 4.68629 22 8V16C22 19.3137 19.3137 22 16 22H8C4.68629 22 2 19.3137 2 16V8Z" stroke="#00ff55" stroke-width="1.5"></path> <path id="vector_2" d="M9.00012 9L15.0001 15" stroke="#00ff55" stroke-width="1.5" stroke-linecap="round"></path> <path id="vector_3" d="M15 9L9 14.9999" stroke="#00ff55" stroke-width="1.5" stroke-linecap="round"></path> </g> </g> </g></svg>
                        <h3 class="mt-5 text-lg text-white font-bold">Đã có lỗi xảy ra!</h3>
                        <h3 class="mb-5 mt-5 text-lg text-white font-bold">Đăng ký không thành công</h3>
                        <a data-modal-hide="popup-modal" type="button" class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Thử lại</a>                     
                    </div>
                </div>
            </div>
        </div>    
    <?php endif; ?>
    <div class="" id="footer"></div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("registerForm");
        form.addEventListener("submit", function (e) {
            // Xóa lỗi cũ
            document.getElementById("error-fullName").innerText = "";
            document.getElementById("error-email").innerText = "";
            document.getElementById("error-password").innerText = "";
            document.getElementById("error-SDT").innerText = "";

            let valid = true;
            const fullName = document.getElementById("fullName").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;
            const sdt = document.getElementById("SDT").value.trim();

            if (fullName === "") {
                document.getElementById("error-fullName").innerText = "Vui lòng nhập họ và tên.";
                valid = false;
            }
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById("error-email").innerText = "Email không hợp lệ.";
                valid = false;
            }
            if (password.length < 6) {
                document.getElementById("error-password").innerText = "Mật khẩu phải có ít nhất 6 ký tự.";
                valid = false;
            }
            const phoneRegex = /^(0[0-9]{9})$/;
            if (!phoneRegex.test(sdt)) {
                document.getElementById("error-SDT").innerText = "Số điện thoại không hợp lệ.";
                valid = false;
            }

            if (!valid) {
                e.preventDefault();
            }
        });
    });
</script>


<?php require 'views/components/footer.php'; ?>

</html>