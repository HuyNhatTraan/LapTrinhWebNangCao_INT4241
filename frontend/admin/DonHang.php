<!-- DonHang.php: Quản lý đơn hàng -->
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
