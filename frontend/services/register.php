<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <script defer src="../scripts/index.js"></script>
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
    <link rel="icon" href="../icon.png" type="image/png" />
</head>

<body class="">
    <div class="sticky top-0 z-10" id="nav"></div>
    <div class="bg-[#0f172a] flex items-center justify-center h-screen text-white">
        <div class="w-full max-w-md p-6 rounded-lg shadow-md border border-gray-700 pt-10 pb-6 ml-3 mr-3">
            <!-- Logo -->
            <div class="flex justify-center mb-3">

                <span class="text-3xl font-semibold text-center mb-6">Đăng ký tài khoản</span>
            </div>

            <!-- Form -->
            <form class="space-y-4" action="/LapTrinhWebNangCao_INT4241/backend/routes/register.php" method="POST">
                <div>
                    <label class="block text-sm mb-1" for="fullName">Họ và Tên</label>
                    <input type="text" id="fullName" name="fullName" placeholder="Họ và tên của bạn"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <label class="block text-sm mb-1" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-sm" for="password">Password</label>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Mật khẩu"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-sm" for="SDT">Số điện thoại</label>
                    </div>
                    <input type="tel" id="SDT" name="SDT" placeholder="Số điện thoại"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <button type="submit" name="register"
                    class="w-full py-2 rounded-md bg-indigo-500 hover:bg-indigo-600 transition text-white font-medium cursor-pointer">
                    Đăng ký
                </button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-400"> Đã có tài khoản?
                <a href="/LapTrinhWebNangCao_INT4241/frontend/services/login.php"
                    class="text-indigo-400 hover:underline">Đăng nhập tại đây!</a>
            </p>
        </div>
    </div>
    <div class="" id="footer"></div>
</body>
<!-- Thêm đoạn này vào cuối file register.php, trước </body> -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        form.addEventListener('submit', function (e) {
            // Xóa thông báo lỗi cũ
            document.querySelectorAll('.form-error').forEach(el => el.remove());

            let valid = true;
            const fullName = form.fullName.value.trim();
            const email = form.email.value.trim();
            const password = form.password.value.trim();
            const phone = form.SDT.value.trim();

            // Validate Họ và tên
            if (!fullName) {
                showError(form.fullName, 'Vui lòng nhập họ và tên');
                valid = false;
            }

            // Validate email
            if (!email) {
                showError(form.email, 'Vui lòng nhập email');
                valid = false;
            } else if (!/^[\w-.]+@([\w-]+\.)+[\w-]{2,}$/.test(email)) {
                showError(form.email, 'Email không hợp lệ');
                valid = false;
            }

            // Validate password
            if (!password) {
                showError(form.password, 'Vui lòng nhập mật khẩu');
                valid = false;
            } else if (password.length < 6) {
                showError(form.password, 'Mật khẩu tối thiểu 6 ký tự');
                valid = false;
            }

            // Validate số điện thoại
            if (!phone) {
                showError(form.SDT, 'Vui lòng nhập số điện thoại');
                valid = false;
            } else if (!/^(0\d{9,10})$/.test(phone)) {
                showError(form.SDT, 'Số điện thoại không hợp lệ');
                valid = false;
            }

            if (!valid) e.preventDefault();
        });

        function showError(input, message) {
            const error = document.createElement('div');
            error.className = 'form-error text-red-500 text-sm mt-1';
            error.innerText = message;
            error.style.color = '#ef4444'; // Tailwind red-500
            input.classList.add('border-red-500', 'focus:ring-red-500');
            input.parentNode.appendChild(error);
        }

        // Xóa border đỏ khi nhập lại
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function () {
                input.classList.remove('border-red-500', 'focus:ring-red-500');
                const err = input.parentNode.querySelector('.form-error');
                if (err) err.remove();
            });
        });
    });
</script>

</html>