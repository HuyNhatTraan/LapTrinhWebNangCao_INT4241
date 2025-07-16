<!-- TongQuan.php: Tổng quan dashboard -->
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
