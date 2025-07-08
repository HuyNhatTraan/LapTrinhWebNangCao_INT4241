<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script defer src="../scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="../icon.png" type="image/png" />
</head>

<body class="">
    <div class="sticky top-0 z-10" id="nav"></div>
    <div class="bg-[#0f172a] flex items-center justify-center h-screen text-white">
        <div class="w-full max-w-md p-6 rounded-lg shadow-md border border-gray-700 pt-10 pb-6">
            <div class="flex flex-col justify-center mb-6 gap-2 items-center">
                <span class="text-4xl font-semibold text-center mb-6">Đăng nhập</span>
            </div>
            <!-- Form -->
            <form class="space-y-4" action="/LapTrinhWebNangCao_INT4241/backend/routes/login.php" method="POST">
                <div>
                    <label class="block text-sm mb-1" for="email">Email address</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-sm" for="password">Password</label>
                    </div>
                    <input type="password" id="password" name="password"
                        class="w-full px-3 py-2 rounded-md bg-[#1e293b] text-white border border-[#334155] focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                <button type="submit" name="login" class="w-full py-2 rounded-md bg-indigo-500 hover:bg-indigo-600 transition text-white font-medium cursor-pointer">              
                    Sign in
                </button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-400"> Chưa có tài khoản?
                <a href="/LapTrinhWebNangCao_INT4241/frontend/services/register.php"
                    class="text-indigo-400 hover:underline">Đăng ký ngay!</a>
            </p>
        </div>
    </div>

    <div class="" id="footer"></div>
</body>

</html>