<!-- KhachHang.php: Quản lý khách hàng -->
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
                                    <div></div>
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
                                    <button class="text-blue-600 hover:text-blue-800 p-1" title="Xem lịch sử"></button>
                                    <button class="text-green-600 hover:text-green-800 p-1" title="Sửa"></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-3"></div>
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
                                <div class="flex gap-2"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
