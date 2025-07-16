<!-- NhanVien.php: Quản lý nhân viên -->
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
                            <td class="py-3 px-4"></td>
                        </tr>
                        <tr class="border-b border-gray-100"></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
