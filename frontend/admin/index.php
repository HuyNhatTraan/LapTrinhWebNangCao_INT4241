<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Tech Admin Dashboard</title>
    <link rel="icon" href="/LapTrinhWebNangCao_INT4241/frontend/icon.png" type="image/png"/>
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside class="w-72 bg-white shadow-xl sticky left-0 top-0 h-full overflow-y-auto transition-all duration-300 z-50 border-r border-gray-200" id="sidebar">
            <div class="p-10 border-b border-gray-200 bg-gradient-to-r from-blue-600 to-blue-700">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                        <a href="/LapTrinhWebNangCao_INT4241/frontend/">
                            <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Logo" class="w-8 h-8">
                        </a>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-black">HT Tech Admin</h2>
                        <p class="text-blue-100 text-sm">Quản lý hệ thống</p>
                    </div>
                </div>
            </div>
            <nav class="py-6 px-6" id="sidebar-tabs">
                <div class="space-y-3">
                    <button data-tab="overview" class="tab-btn active w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 ">
                            <i class="fas fa-chart-line text-blue-600"></i>
                        </div>
                        <span class="text-base">Tổng quan</span>
                    </button>
                    <button data-tab="orders" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-shopping-cart text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Đơn hàng</span>
                    </button>
                    <button data-tab="products" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-box text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Sản phẩm</span>
                    </button>
                    <button data-tab="categories" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-tags text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Danh mục</span>
                    </button>
                    <button data-tab="customers" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-users text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Khách hàng</span>
                    </button>
                    <button data-tab="employees" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-user-tie text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Nhân viên</span>
                    </button>
                    <button data-tab="coupons" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-ticket-alt text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Mã giảm giá</span>
                    </button>
                    <button data-tab="reviews" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-star text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Đánh giá</span>
                    </button>
                    <button data-tab="stats" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-chart-bar text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Thống kê</span>
                    </button>
                    <button data-tab="settings" class="tab-btn w-full flex items-center gap-4 py-4 px-5 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-200 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                            <i class="fas fa-cog text-gray-600 group-hover:text-blue-600"></i>
                        </div>
                        <span class="text-base">Cài đặt</span>
                    </button>
                </div>
            </nav>
        </aside>
        <!-- Main content -->
        <div class="flex-1 ml-72">
            <!-- Header -->
            <header class="shadow-sm border-gray-200 sticky top-0 z-40 backdrop-blur-sm bg-white">
                <div class="flex items-center justify-between px-8 py-6">
                    <div class="flex items-center gap-6">
                        <button class="lg:hidden p-3 rounded-xl hover:bg-gray-100 transition-colors" id="mobile-menu-btn">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800" id="dashboard-title">Tổng quan</h1>
                            <p class="text-sm text-gray-500 mt-1">Quản lý và theo dõi hoạt động của hệ thống</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="relative">
                            <button class="p-3 rounded-xl hover:bg-gray-100 transition-colors relative">
                                <i class="fas fa-bell text-gray-600 text-lg"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center font-medium">3</span>
                            </button>
                        </div>
                        <div class="flex items-center gap-4 pl-6 border-l border-gray-200 mr-10 ">
                            <div class="text-right mr-35">
                                <p class="text-sm font-semibold text-gray-800">Admin User</p>
                                <p class="text-xs text-gray-500">Quản trị viên</p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center shadow-lg">
                                <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Admin" class="w-8 h-8 rounded-xl">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Dashboard content -->
            <main class="p-8 bg-gray-50 min-h-screen" id="dashboard-content">
                <!-- Tổng quan -->
                <div id="tab-overview" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                        <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600 mb-2">Đơn hàng hôm nay</p>
                                    <p class="text-4xl font-bold text-blue-600 mb-2">120</p>
                                    <p class="text-sm text-green-600 flex items-center gap-1">
                                        <i class="fas fa-arrow-up"></i> 
                                        <span>+12% so với hôm qua</span>
                                    </p>
                                </div>
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg">
                                    <i class="fas fa-shopping-cart text-white text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600 mb-2">Doanh thu hôm nay</p>
                                    <p class="text-4xl font-bold text-green-600 mb-2">2.5M₫</p>
                                    <p class="text-sm text-green-600 flex items-center gap-1">
                                        <i class="fas fa-arrow-up"></i> 
                                        <span>+8% so với hôm qua</span>
                                    </p>
                                </div>
                                <div class="bg-gradient-to-r from-green-500 to-green-600 p-4 rounded-2xl shadow-lg">
                                    <i class="fas fa-dollar-sign text-white text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600 mb-2">Khách hàng mới</p>
                                    <p class="text-4xl font-bold text-yellow-600 mb-2">35</p>
                                    <p class="text-sm text-green-600 flex items-center gap-1">
                                        <i class="fas fa-arrow-up"></i> 
                                        <span>+15% so với hôm qua</span>
                                    </p>
                                </div>
                                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-4 rounded-2xl shadow-lg">
                                    <i class="fas fa-users text-white text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600 mb-2">Sản phẩm hết hàng</p>
                                    <p class="text-4xl font-bold text-red-600 mb-2">12</p>
                                    <p class="text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-triangle"></i> 
                                        <span>Cần nhập hàng</span>
                                    </p>
                                </div>
                                <div class="bg-gradient-to-r from-red-500 to-red-600 p-4 rounded-2xl shadow-lg">
                                    <i class="fas fa-box text-white text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2">
                            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-xl font-bold text-gray-800">Đơn hàng gần đây</h3>
                                    <button class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors text-sm font-medium">
                                        Xem tất cả
                                    </button>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr class="border-b border-gray-200">
                                                <th class="text-left py-4 px-6 font-semibold text-gray-600">Mã đơn</th>
                                                <th class="text-left py-4 px-6 font-semibold text-gray-600">Khách hàng</th>
                                                <th class="text-left py-4 px-6 font-semibold text-gray-600">Tổng tiền</th>
                                                <th class="text-left py-4 px-6 font-semibold text-gray-600">Trạng thái</th>
                                                <th class="text-left py-4 px-6 font-semibold text-gray-600">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                                <td class="py-4 px-6 font-medium text-gray-800">#1001</td>
                                                <td class="py-4 px-6 text-gray-700">Nguyễn Văn A</td>
                                                <td class="py-4 px-6 font-semibold text-gray-800">1,200,000₫</td>
                                                <td class="py-4 px-6">
                                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">Đã giao</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                                <td class="py-4 px-6 font-medium text-gray-800">#1002</td>
                                                <td class="py-4 px-6 text-gray-700">Trần Thị B</td>
                                                <td class="py-4 px-6 font-semibold text-gray-800">800,000₫</td>
                                                <td class="py-4 px-6">
                                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">Đang xử lý</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                                <td class="py-4 px-6 font-medium text-gray-800">#1003</td>
                                                <td class="py-4 px-6 text-gray-700">Lê Văn C</td>
                                                <td class="py-4 px-6 font-semibold text-gray-800">500,000₫</td>
                                                <td class="py-4 px-6">
                                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium">Đã hủy</span>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-8">
                            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                                <h3 class="text-xl font-bold text-gray-800 mb-6">Sản phẩm bán chạy</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-mobile-alt text-white"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-semibold text-gray-800">iPhone 14 Pro</p>
                                            <p class="text-sm text-gray-500">Đã bán: 45 sản phẩm</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-mobile-alt text-white"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-semibold text-gray-800">Samsung Galaxy S23</p>
                                            <p class="text-sm text-gray-500">Đã bán: 32 sản phẩm</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-mobile-alt text-white"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-semibold text-gray-800">Xiaomi Mi 13</p>
                                            <p class="text-sm text-gray-500">Đã bán: 28 sản phẩm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Đơn hàng -->
                <div id="tab-orders" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-xl font-semibold">Quản lý đơn hàng</h2>
                                <div class="flex flex-wrap gap-2">
                                    <button class="order-filter-btn active px-4 py-2 bg-blue-600 text-white rounded-lg text-sm" data-status="all">
                                        Tất cả
                                    </button>
                                    <button class="order-filter-btn px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200" data-status="new">
                                        Mới
                                    </button>
                                    <button class="order-filter-btn px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200" data-status="processing">
                                        Đang xử lý
                                    </button>
                                    <button class="order-filter-btn px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200" data-status="completed">
                                        Hoàn tất
                                    </button>
                                    <button class="order-filter-btn px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200" data-status="cancelled">
                                        Đã hủy
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Mã đơn</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Khách hàng</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Ngày đặt</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Tổng tiền</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Trạng thái</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4 font-medium">#1001</td>
                                            <td class="py-3 px-4">Nguyễn Văn A</td>
                                            <td class="py-3 px-4">11/07/2025</td>
                                            <td class="py-3 px-4">1,200,000₫</td>
                                            <td class="py-3 px-4">
                                                <select class="status-select px-2 py-1 border rounded text-sm">
                                                    <option value="new">Mới</option>
                                                    <option value="processing">Đang xử lý</option>
                                                    <option value="completed" selected>Hoàn tất</option>
                                                    <option value="cancelled">Đã hủy</option>
                                                </select>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem chi tiết">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Cập nhật">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800 p-1" title="Hủy đơn">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4 font-medium">#1002</td>
                                            <td class="py-3 px-4">Trần Thị B</td>
                                            <td class="py-3 px-4">10/07/2025</td>
                                            <td class="py-3 px-4">800,000₫</td>
                                            <td class="py-3 px-4">
                                                <select class="status-select px-2 py-1 border rounded text-sm">
                                                    <option value="new">Mới</option>
                                                    <option value="processing" selected>Đang xử lý</option>
                                                    <option value="completed">Hoàn tất</option>
                                                    <option value="cancelled">Đã hủy</option>
                                                </select>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem chi tiết">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Cập nhật">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800 p-1" title="Hủy đơn">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sản phẩm -->
                <div id="tab-products" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-xl font-semibold">Quản lý sản phẩm</h2>
                                <div class="flex gap-2">
                                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                                        <i class="fas fa-plus mr-2"></i>Thêm sản phẩm
                                    </button>
                                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">
                                        <i class="fas fa-file-export mr-2"></i>Xuất Excel
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="mb-4 flex flex-col sm:flex-row gap-4">
                                <div class="flex-1">
                                    <input type="text" placeholder="Tìm kiếm sản phẩm..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                </div>
                                <select class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                    <option>Tất cả danh mục</option>
                                    <option>Điện thoại</option>
                                    <option>Laptop</option>
                                    <option>Phụ kiện</option>
                                </select>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Hình ảnh</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Tên sản phẩm</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Danh mục</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Giá</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Tồn kho</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Trạng thái</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Product" class="w-12 h-12 rounded-lg object-cover">
                                            </td>
                                            <td class="py-3 px-4">
                                                <div>
                                                    <p class="font-medium">iPhone 14 Pro</p>
                                                    <p class="text-sm text-gray-500">128GB, Màu đen</p>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">Điện thoại</td>
                                            <td class="py-3 px-4">25,000,000₫</td>
                                            <td class="py-3 px-4">
                                                <span class="text-red-600 font-medium">5</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Còn hàng</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Product" class="w-12 h-12 rounded-lg object-cover">
                                            </td>
                                            <td class="py-3 px-4">
                                                <div>
                                                    <p class="font-medium">Samsung Galaxy S23</p>
                                                    <p class="text-sm text-gray-500">256GB, Màu trắng</p>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">Điện thoại</td>
                                            <td class="py-3 px-4">22,000,000₫</td>
                                            <td class="py-3 px-4">
                                                <span class="text-red-600 font-medium">0</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Hết hàng</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Danh mục -->
                <div id="tab-categories" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-xl font-semibold">Quản lý danh mục sản phẩm</h2>
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>Thêm danh mục
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-semibold">Điện thoại</h3>
                                        <div class="flex gap-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-1" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-2">Các loại điện thoại thông minh</p>
                                    <p class="text-sm text-blue-600 font-medium">45 sản phẩm</p>
                                </div>
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-semibold">Laptop</h3>
                                        <div class="flex gap-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-1" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-2">Máy tính xách tay</p>
                                    <p class="text-sm text-blue-600 font-medium">23 sản phẩm</p>
                                </div>
                                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-semibold">Phụ kiện</h3>
                                        <div class="flex gap-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-1" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-2">Các phụ kiện công nghệ</p>
                                    <p class="text-sm text-blue-600 font-medium">67 sản phẩm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Khách hàng -->
                <div id="tab-customers" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-xl font-semibold">Quản lý khách hàng</h2>
                                <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">
                                    <i class="fas fa-file-export mr-2"></i>Xuất danh sách
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="mb-4 flex flex-col sm:flex-row gap-4">
                                <div class="flex-1">
                                    <input type="text" placeholder="Tìm kiếm theo tên, email, SĐT..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                </div>
                                <select class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                    <option>Tất cả trạng thái</option>
                                    <option>Hoạt động</option>
                                    <option>Bị khóa</option>
                                </select>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Khách hàng</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Email</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">SĐT</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Ngày đăng ký</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Đơn hàng</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Trạng thái</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center gap-3">
                                                    <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Customer" class="w-8 h-8 rounded-full">
                                                    <div>
                                                        <p class="font-medium">Nguyễn Văn A</p>
                                                        <p class="text-sm text-gray-500">ID: #001</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">nguyenvana@email.com</td>
                                            <td class="py-3 px-4">0123456789</td>
                                            <td class="py-3 px-4">15/06/2025</td>
                                            <td class="py-3 px-4">
                                                <span class="text-blue-600 font-medium">12 đơn</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Hoạt động</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem lịch sử">
                                                        <i class="fas fa-history"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800 p-1" title="Khóa tài khoản">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center gap-3">
                                                    <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Customer" class="w-8 h-8 rounded-full">
                                                    <div>
                                                        <p class="font-medium">Trần Thị B</p>
                                                        <p class="text-sm text-gray-500">ID: #002</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">tranthib@email.com</td>
                                            <td class="py-3 px-4">0987654321</td>
                                            <td class="py-3 px-4">20/06/2025</td>
                                            <td class="py-3 px-4">
                                                <span class="text-blue-600 font-medium">8 đơn</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Bị khóa</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem lịch sử">
                                                        <i class="fas fa-history"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Mở khóa">
                                                        <i class="fas fa-unlock"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nhân viên -->
                <div id="tab-employees" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-xl font-semibold">Quản lý nhân viên</h2>
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>Thêm nhân viên
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="mb-4 flex flex-col sm:flex-row gap-4">
                                <div class="flex-1">
                                    <input type="text" placeholder="Tìm kiếm nhân viên..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                </div>
                                <select class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                    <option>Tất cả vai trò</option>
                                    <option>Quản trị viên</option>
                                    <option>Nhân viên bán hàng</option>
                                    <option>Giao hàng</option>
                                    <option>Kho</option>
                                    <option>CSKH</option>
                                </select>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Nhân viên</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Email</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Vai trò</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Ngày tạo</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Trạng thái</th>
                                            <th class="text-left py-3 px-4 font-medium text-gray-600">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center gap-3">
                                                    <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Employee" class="w-8 h-8 rounded-full">
                                                    <div>
                                                        <p class="font-medium">Lê Văn C</p>
                                                        <p class="text-sm text-gray-500">ID: #EMP001</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">levanc@company.com</td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs">Quản trị viên</span>
                                            </td>
                                            <td class="py-3 px-4">01/01/2025</td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Hoạt động</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center gap-3">
                                                    <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Employee" class="w-8 h-8 rounded-full">
                                                    <div>
                                                        <p class="font-medium">Phạm Thị D</p>
                                                        <p class="text-sm text-gray-500">ID: #EMP002</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">phamthid@company.com</td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Nhân viên bán hàng</span>
                                            </td>
                                            <td class="py-3 px-4">15/02/2025</td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Hoạt động</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mã giảm giá -->
                <div id="tab-coupons" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-xl font-semibold">Quản lý mã giảm giá</h2>
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>Tạo mã giảm giá
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="border rounded-lg p-4 bg-gradient-to-r from-blue-50 to-blue-100">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-bold text-lg">SUMMER2025</h3>
                                        <div class="flex gap-2">
                                            <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <p class="text-sm"><strong>Giảm:</strong> 20% tối đa 100,000₫</p>
                                        <p class="text-sm"><strong>Hạn:</strong> 31/08/2025</p>
                                        <p class="text-sm"><strong>Đã sử dụng:</strong> 45/100 lần</p>
                                        <p class="text-sm"><strong>Điều kiện:</strong> Đơn từ 500,000₫</p>
                                    </div>
                                    <div class="mt-3">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Đang hoạt động</span>
                                    </div>
                                </div>
                                <div class="border rounded-lg p-4 bg-gradient-to-r from-purple-50 to-purple-100">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-bold text-lg">NEWBIE50</h3>
                                        <div class="flex gap-2">
                                            <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <p class="text-sm"><strong>Giảm:</strong> 50,000₫</p>
                                        <p class="text-sm"><strong>Hạn:</strong> 31/12/2025</p>
                                        <p class="text-sm"><strong>Đã sử dụng:</strong> 23/∞ lần</p>
                                        <p class="text-sm"><strong>Điều kiện:</strong> Khách hàng mới</p>
                                    </div>
                                    <div class="mt-3">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Đang hoạt động</span>
                                    </div>
                                </div>
                                <div class="border rounded-lg p-4 bg-gradient-to-r from-gray-50 to-gray-100">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-bold text-lg">FLASH30</h3>
                                        <div class="flex gap-2">
                                            <button class="text-green-600 hover:text-green-800 p-1" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 p-1" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <p class="text-sm"><strong>Giảm:</strong> 30% tối đa 200,000₫</p>
                                        <p class="text-sm"><strong>Hạn:</strong> 15/07/2025</p>
                                        <p class="text-sm"><strong>Đã sử dụng:</strong> 50/50 lần</p>
                                        <p class="text-sm"><strong>Điều kiện:</strong> Đơn từ 1,000,000₫</p>
                                    </div>
                                    <div class="mt-3">
                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Đã hết hạn</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Đánh giá -->
                <div id="tab-reviews" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-xl font-semibold">Quản lý đánh giá & phản hồi</h2>
                                <div class="flex gap-2">
                                    <button class="px-4 py-2 bg-yellow-600 text-white rounded-lg text-sm hover:bg-yellow-700">
                                        <i class="fas fa-clock mr-2"></i>Chờ duyệt (12)
                                    </button>
                                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">
                                        <i class="fas fa-flag mr-2"></i>Bị báo cáo (3)
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="border rounded-lg p-4 bg-yellow-50">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Customer" class="w-8 h-8 rounded-full">
                                                <div>
                                                    <p class="font-medium">Nguyễn Văn A</p>
                                                    <div class="flex items-center gap-1">
                                                        <div class="flex text-yellow-400">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <span class="text-sm text-gray-500">5.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-600 mb-2"><strong>Sản phẩm:</strong> iPhone 14 Pro</p>
                                            <p class="text-gray-700 mb-2">Sản phẩm tuyệt vời! Giao hàng nhanh, đóng gói cẩn thận. Rất hài lòng với chất lượng.</p>
                                            <p class="text-xs text-gray-500">10/07/2025 - 14:30</p>
                                        </div>
                                        <div class="flex gap-2">
                                            <button class="px-3 py-1 bg-green-600 text-white rounded text-sm hover:bg-green-700">
                                                <i class="fas fa-check mr-1"></i>Duyệt
                                            </button>
                                            <button class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                                                <i class="fas fa-times mr-1"></i>Từ chối
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg p-4">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Customer" class="w-8 h-8 rounded-full">
                                                <div>
                                                    <p class="font-medium">Trần Thị B</p>
                                                    <div class="flex items-center gap-1">
                                                        <div class="flex text-yellow-400">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <span class="text-sm text-gray-500">4.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-600 mb-2"><strong>Sản phẩm:</strong> Samsung Galaxy S23</p>
                                            <p class="text-gray-700 mb-2">Sản phẩm tốt, đáng giá tiền. Chỉ có điều giao hàng hơi lâu.</p>
                                            <p class="text-xs text-gray-500">09/07/2025 - 10:15</p>
                                            <div class="mt-3 p-3 bg-gray-50 rounded">
                                                <p class="text-sm font-medium text-gray-700">Phản hồi của shop:</p>
                                                <p class="text-sm text-gray-600">Cảm ơn bạn đã đánh giá. Chúng tôi sẽ cải thiện dịch vụ giao hàng.</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2">
                                            <button class="px-3 py-1 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">
                                                <i class="fas fa-reply mr-1"></i>Trả lời
                                            </button>
                                            <button class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                                                <i class="fas fa-trash mr-1"></i>Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thống kê -->
                <div id="tab-stats" class="tab-content hidden">
                    <div class="space-y-6">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                                <h2 class="text-xl font-semibold">Thống kê & báo cáo</h2>
                                <div class="flex gap-2">
                                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">
                                        <i class="fas fa-file-excel mr-2"></i>Xuất Excel
                                    </button>
                                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">
                                        <i class="fas fa-file-pdf mr-2"></i>Xuất PDF
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-blue-600">45,250,000₫</p>
                                    <p class="text-sm text-gray-600">Doanh thu tuần này</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-green-600">180,500,000₫</p>
                                    <p class="text-sm text-gray-600">Doanh thu tháng này</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-purple-600">1,890,000,000₫</p>
                                    <p class="text-sm text-gray-600">Doanh thu năm này</p>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="font-semibold mb-3">Biểu đồ doanh thu (Tháng)</h3>
                                <div class="h-64 bg-white rounded border flex items-center justify-center">
                                    <p class="text-gray-500">Biểu đồ sẽ hiển thị ở đây</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                                <h3 class="text-lg font-semibold mb-4">Sản phẩm bán chạy nhất</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                        <div class="flex items-center gap-3">
                                            <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Product" class="w-10 h-10 rounded">
                                            <div>
                                                <p class="font-medium">iPhone 14 Pro</p>
                                                <p class="text-sm text-gray-500">Đã bán: 125 sản phẩm</p>
                                            </div>
                                        </div>
                                        <p class="font-bold text-green-600">31,250,000₫</p>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                        <div class="flex items-center gap-3">
                                            <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Product" class="w-10 h-10 rounded">
                                            <div>
                                                <p class="font-medium">Samsung Galaxy S23</p>
                                                <p class="text-sm text-gray-500">Đã bán: 98 sản phẩm</p>
                                            </div>
                                        </div>
                                        <p class="font-bold text-green-600">21,560,000₫</p>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                        <div class="flex items-center gap-3">
                                            <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Product" class="w-10 h-10 rounded">
                                            <div>
                                                <p class="font-medium">Xiaomi Mi 13</p>
                                                <p class="text-sm text-gray-500">Đã bán: 76 sản phẩm</p>
                                            </div>
                                        </div>
                                        <p class="font-bold text-green-600">15,200,000₫</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                                <h3 class="text-lg font-semibold mb-4">Khách hàng VIP</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                        <div class="flex items-center gap-3">
                                            <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Customer" class="w-10 h-10 rounded-full">
                                            <div>
                                                <p class="font-medium">Nguyễn Văn A</p>
                                                <p class="text-sm text-gray-500">24 đơn hàng</p>
                                            </div>
                                        </div>
                                        <p class="font-bold text-blue-600">45,600,000₫</p>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                        <div class="flex items-center gap-3">
                                            <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Customer" class="w-10 h-10 rounded-full">
                                            <div>
                                                <p class="font-medium">Trần Thị B</p>
                                                <p class="text-sm text-gray-500">18 đơn hàng</p>
                                            </div>
                                        </div>
                                        <p class="font-bold text-blue-600">32,400,000₫</p>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                        <div class="flex items-center gap-3">
                                            <img src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="Customer" class="w-10 h-10 rounded-full">
                                            <div>
                                                <p class="font-medium">Lê Văn C</p>
                                                <p class="text-sm text-gray-500">15 đơn hàng</p>
                                            </div>
                                        </div>
                                        <p class="font-bold text-blue-600">28,750,000₫</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cài đặt -->
                <div id="tab-settings" class="tab-content hidden">
                    <div class="space-y-6">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                            <h2 class="text-xl font-semibold mb-6">Cài đặt hệ thống</h2>
                            <div class="space-y-6">
                                <div>
                                    <h3 class="text-lg font-medium mb-4">Thông tin cửa hàng</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Tên cửa hàng</label>
                                            <input type="text" value="HT Tech Store" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                            <input type="email" value="admin@httech.com" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại</label>
                                            <input type="tel" value="0123456789" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                                            <input type="url" value="https://httech.com" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <h3 class="text-lg font-medium mb-4">Cài đặt thanh toán</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-4 border rounded-lg">
                                            <div>
                                                <p class="font-medium">Thanh toán khi nhận hàng (COD)</p>
                                                <p class="text-sm text-gray-500">Cho phép khách hàng thanh toán khi nhận hàng</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between p-4 border rounded-lg">
                                            <div>
                                                <p class="font-medium">Chuyển khoản ngân hàng</p>
                                                <p class="text-sm text-gray-500">Thanh toán qua chuyển khoản ngân hàng</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between p-4 border rounded-lg">
                                            <div>
                                                <p class="font-medium">Ví điện tử</p>
                                                <p class="text-sm text-gray-500">Thanh toán qua MoMo, ZaloPay, v.v.</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <h3 class="text-lg font-medium mb-4">Cài đặt thông báo</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-4 border rounded-lg">
                                            <div>
                                                <p class="font-medium">Thông báo đơn hàng mới</p>
                                                <p class="text-sm text-gray-500">Nhận thông báo khi có đơn hàng mới</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between p-4 border rounded-lg">
                                            <div>
                                                <p class="font-medium">Thông báo sản phẩm hết hàng</p>
                                                <p class="text-sm text-gray-500">Cảnh báo khi sản phẩm sắp hết hàng</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex justify-end">
                                    <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        <i class="fas fa-save mr-2"></i>Lưu cài đặt
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
    // Tab switching logic
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const dashboardTitle = document.getElementById('dashboard-title');
    const sidebar = document.getElementById('sidebar');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    
    const tabTitles = {
        overview: 'Tổng quan',
        orders: 'Quản lý đơn hàng',
        products: 'Quản lý sản phẩm',
        categories: 'Quản lý danh mục',
        customers: 'Quản lý khách hàng',
        employees: 'Quản lý nhân viên',
        coupons: 'Quản lý mã giảm giá',
        reviews: 'Quản lý đánh giá',
        stats: 'Thống kê & báo cáo',
        settings: 'Cài đặt hệ thống'
    };
    
    // Mobile menu toggle
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
        });
    }
    
    // Tab switching
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            tabBtns.forEach(b => {
                b.classList.remove('active');
                // Reset to default state
                const iconDiv = b.querySelector('div');
                const icon = b.querySelector('i');
                iconDiv.classList.remove('bg-blue-200');
                iconDiv.classList.add('bg-gray-100');
                icon.classList.remove('text-blue-600');
                icon.classList.add('text-gray-600');
                b.classList.remove('bg-blue-50', 'text-blue-600');
                b.classList.add('text-gray-700');
            });
            
            // Add active class to clicked button
            this.classList.add('active', 'bg-blue-50', 'text-blue-600');
            this.classList.remove('text-gray-700');
            
            // Update icon colors for active button
            const activeIconDiv = this.querySelector('div');
            const activeIcon = this.querySelector('i');
            activeIconDiv.classList.remove('bg-gray-100');
            activeIconDiv.classList.add('bg-blue-200');
            activeIcon.classList.remove('text-gray-600');
            activeIcon.classList.add('text-blue-600');
            
            // Get tab name
            const tab = this.getAttribute('data-tab');
            
            // Show/hide content
            tabContents.forEach(content => {
                if(content.id === 'tab-' + tab) {
                    content.classList.remove('hidden');
                } else {
                    content.classList.add('hidden');
                }
            });
            
            // Update title
            dashboardTitle.textContent = tabTitles[tab] || 'Dashboard';
            
            // Hide sidebar on mobile after selection
            if (window.innerWidth < 1024) {
                sidebar.classList.remove('show');
            }
        });
    });
    
    // Mobile menu toggle
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth < 1024 && !sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
            sidebar.classList.remove('show');
        }
    });
    
    // Responsive sidebar visibility
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            sidebar.classList.remove('show');
        }
    });
    
    // Initialize active tab styling
    document.addEventListener('DOMContentLoaded', function() {
        const activeTab = document.querySelector('.tab-btn.active');
        if (activeTab) {
            const activeIconDiv = activeTab.querySelector('div');
            const activeIcon = activeTab.querySelector('i');
            if (activeIconDiv && activeIcon) {
                activeIconDiv.classList.remove('bg-gray-100');
                activeIconDiv.classList.add('bg-blue-200');
                activeIcon.classList.remove('text-gray-600');
                activeIcon.classList.add('text-blue-600');
            }
        }
    });
    
    // Order filter buttons
    const orderFilterBtns = document.querySelectorAll('.order-filter-btn');
    orderFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            orderFilterBtns.forEach(b => {
                b.classList.remove('bg-blue-600', 'text-white');
                b.classList.add('bg-gray-100', 'text-gray-700');
            });
            this.classList.remove('bg-gray-100', 'text-gray-700');
            this.classList.add('bg-blue-600', 'text-white');
        });
    });
    
    // Status select change handlers
    const statusSelects = document.querySelectorAll('.status-select');
    statusSelects.forEach(select => {
        select.addEventListener('change', function() {
            // Here you would typically send an AJAX request to update the status
            console.log('Status changed to:', this.value);
        });
    });
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth < 768 && !sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
            sidebar.classList.add('hidden');
        }
    });
    
    // Responsive sidebar visibility
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('hidden');
        } else {
            sidebar.classList.add('hidden');
        }
    });
    
    // Initialize mobile sidebar state
    if (window.innerWidth < 768) {
        sidebar.classList.add('hidden');
    }
    </script>
    
    <style>
    /* Custom switch styles */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }
    
    /* Mobile responsiveness */
    @media (max-width: 1024px) {
        .ml-72 {
            margin-left: 0;
        }
        
        #sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        
        #sidebar.show {
            transform: translateX(0);
        }
    }
    
    @media (min-width: 1025px) {
        #sidebar {
            transform: translateX(0);
        }
    }
    
    /* Smooth transitions */
    .tab-btn {
        transition: all 0.2s ease-in-out;
    }
    
    .tab-btn:hover .w-10 {
        transform: scale(1.05);
    }
    
    /* Custom scrollbar for sidebar */
    #sidebar::-webkit-scrollbar {
        width: 6px;
    }
    
    #sidebar::-webkit-scrollbar-track {
        background: #f1f5f9;
    }
    
    #sidebar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }
    
    #sidebar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
    </style>
</body>
</html>