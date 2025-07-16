<!-- SanPham.php: Quản lý sản phẩm -->
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
