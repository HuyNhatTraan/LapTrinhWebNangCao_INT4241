<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="/LapTrinhWebNangCao_INT4241/frontend/icon.png" type="image/png"/>
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md rounded-r-3xl m-2 p-2 hidden md:block transition-all duration-300">
            <div class="p-6 border-b rounded-t-3xl">
                <h2 class="text-2xl font-bold text-blue-600">HT Tech Admin</h2>
            </div>
            <nav class="mt-6 flex flex-col gap-2" id="sidebar-tabs">
                <button data-tab="overview" class="tab-btn active block py-2.5 px-6 rounded-xl text-gray-700 hover:bg-blue-100 font-medium transition-all">Tổng quan</button>
                <button data-tab="orders" class="tab-btn block py-2.5 px-6 rounded-xl text-gray-700 hover:bg-blue-100 font-medium transition-all">Đơn hàng</button>
                <button data-tab="products" class="tab-btn block py-2.5 px-6 rounded-xl text-gray-700 hover:bg-blue-100 font-medium transition-all">Sản phẩm</button>
                <button data-tab="customers" class="tab-btn block py-2.5 px-6 rounded-xl text-gray-700 hover:bg-blue-100 font-medium transition-all">Khách hàng</button>
                <button data-tab="stats" class="tab-btn block py-2.5 px-6 rounded-xl text-gray-700 hover:bg-blue-100 font-medium transition-all">Thống kê</button>
                <button data-tab="settings" class="tab-btn block py-2.5 px-6 rounded-xl text-gray-700 hover:bg-blue-100 font-medium transition-all">Cài đặt</button>
            </nav>
        </aside>
        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow flex items-center justify-between px-6 py-4 rounded-bl-3xl m-2">
                <h1 class="text-xl font-semibold text-gray-800" id="dashboard-title">Dashboard</h1>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Admin</span>
                    <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Admin" class="w-8 h-8 rounded-full border">
                </div>
            </header>
            <!-- Dashboard content -->
            <main class="flex-1 p-6" id="dashboard-content">
                <!-- Tổng quan (mặc định) -->
                <div id="tab-overview" class="tab-content">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center">
                        <span class="text-3xl font-bold text-blue-600">120</span>
                        <span class="text-gray-500 mt-2">Đơn hàng hôm nay</span>
                    </div>
                    <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center">
                        <span class="text-3xl font-bold text-green-600">2,500,000₫</span>
                        <span class="text-gray-500 mt-2">Doanh thu hôm nay</span>
                    </div>
                    <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center">
                        <span class="text-3xl font-bold text-yellow-600">35</span>
                        <span class="text-gray-500 mt-2">Khách hàng mới</span>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-lg font-semibold mb-4">Thống kê đơn hàng gần đây</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Mã đơn</th>
                                    <th class="py-2 px-4 border-b">Khách hàng</th>
                                    <th class="py-2 px-4 border-b">Tổng tiền</th>
                                    <th class="py-2 px-4 border-b">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">#1001</td>
                                    <td class="py-2 px-4 border-b">Nguyễn Văn A</td>
                                    <td class="py-2 px-4 border-b">1,200,000₫</td>
                                    <td class="py-2 px-4 border-b text-green-600">Đã giao</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">#1002</td>
                                    <td class="py-2 px-4 border-b">Trần Thị B</td>
                                    <td class="py-2 px-4 border-b">800,000₫</td>
                                    <td class="py-2 px-4 border-b text-yellow-600">Đang xử lý</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">#1003</td>
                                    <td class="py-2 px-4 border-b">Lê Văn C</td>
                                    <td class="py-2 px-4 border-b">500,000₫</td>
                                    <td class="py-2 px-4 border-b text-red-600">Đã hủy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <!-- Đơn hàng -->
                <div id="tab-orders" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Quản lý đơn hàng</h2>
                        <p class="text-gray-500">Chức năng quản lý đơn hàng sẽ hiển thị ở đây.</p>
                    </div>
                </div>
                <!-- Sản phẩm -->
                <div id="tab-products" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Quản lý sản phẩm</h2>
                        <p class="text-gray-500">Chức năng quản lý sản phẩm sẽ hiển thị ở đây.</p>
                    </div>
                </div>
                <!-- Khách hàng -->
                <div id="tab-customers" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Quản lý khách hàng</h2>
                        <p class="text-gray-500">Chức năng quản lý khách hàng sẽ hiển thị ở đây.</p>
                    </div>
                </div>
                <!-- Thống kê -->
                <div id="tab-stats" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Thống kê</h2>
                        <p class="text-gray-500">Chức năng thống kê sẽ hiển thị ở đây.</p>
                    </div>
                </div>
                <!-- Cài đặt -->
                <div id="tab-settings" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Cài đặt</h2>
                        <p class="text-gray-500">Chức năng cài đặt sẽ hiển thị ở đây.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
    // Tab switching logic màu xanh
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const dashboardTitle = document.getElementById('dashboard-title');
    const tabTitles = {
        overview: 'Dashboard',
        orders: 'Đơn hàng',
        products: 'Sản phẩm',
        customers: 'Khách hàng',
        stats: 'Thống kê',
        settings: 'Cài đặt'
    };
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('active', 'bg-blue-100', 'text-blue-600'));
            this.classList.add('active', 'bg-blue-100', 'text-blue-600');
            const tab = this.getAttribute('data-tab');
            tabContents.forEach(content => {
                if(content.id === 'tab-' + tab) {
                    content.classList.remove('hidden');
                } else {
                    content.classList.add('hidden');
                }
            });
            dashboardTitle.textContent = tabTitles[tab] || 'Dashboard';
        });
    });
    </script>
</body>
</html>