<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>403 Forbidden</title>
</head>
<body class="">
    <?php include __DIR__ . '/../components/nav.php';?>
    <main class="grid h-screen place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-4xl font-semibold text-indigo-600">403 Forbidden</p>
            <h1 class="mt-4 text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Bạn không có quyền truy cập trang này!</h1>
            <p class="mt-6 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Xin lỗi hen, bạn không có quyền truy cập trang này.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="./" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Quay lại trang chủ</a>
                <a href="support" class="text-md font-semibold text-gray-900">Liên hệ hỗ trợ <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>
    <?php include __DIR__ . '/../components/footer.php';?>
</body>
</html>