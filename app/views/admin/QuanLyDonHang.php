<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mt-5 p-3">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-semibold text-gray-900">Danh sách đơn hàng</h2>
            <p class="text-gray-600">Quản lý tất cả đơn hàng trong hệ thống</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <button
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                <i class="fas fa-download mr-2"></i>
                Xuất Excel
            </button>
            <button
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                <i class="fas fa-plus mr-2"></i>
                Tạo đơn hàng
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-lg shadow border">
        <form action="">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tìm kiếm</label>
                    <input type="text" placeholder="Mã đơn hàng, tên khách hàng..."
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                    <select name="option"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option check value="All">Tất cả</option>
                        <option value="Chờ xử lý">Chờ xử lý</option>
                        <option value="Đang xử lý">Đang xử lý</option>
                        <option value="Đã giao">Đã giao</option>
                        <option value="Hoàn thành">Hoàn thành</option>
                        <option value="Đã hủy">Đã hủy</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Từ ngày</label>
                    <input type="date"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Đến ngày</label>
                    <input type="date"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Đặt lại
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">
                    Tìm kiếm
                </button>
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="bg-white shadow rounded-lg border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã
                            đơn hàng</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Khách
                            hàng</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày
                            đặt</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng
                            tiền</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng
                            thái</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao
                            tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Sample order rows -->
                    <?php foreach ($_SESSION['DanhSachDonHang'] as $item): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?php echo $item['MaDonHang']; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo $item['TenKH']; ?></div>
                                <div class="text-sm text-gray-500"><?php echo $item['Email']; ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $item['NgayTao'] ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?php echo number_format($item['TongTien'], 0, ',', '.') . ' VNĐ'; ?>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <?php echo $item['TrangThai']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">                                                                                                                                    
                                    <button data-modal-target="crud-modal <?php echo $item['MaDonHang']; ?>" data-modal-toggle="crud-modal <?php echo $item['MaDonHang']; ?>" class="text-green-600 hover:text-green-900" title="Chỉnh sửa">
                                        <i class="fas fa-edit"></i>
                                    </button>                                    
                                    <button data-modal-target="popup-modal <?php echo $item['MaDonHang']; ?>" data-modal-toggle="popup-modal <?php echo $item['MaDonHang']; ?>" class="text-red-600 hover:text-red-900" title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <!-- Main modal -->
                                <div id="crud-modal <?php echo $item['MaDonHang']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-lg max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Chỉnh sửa đơn hàng #<?php echo $item['MaDonHang']; ?>
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal <?php echo $item['MaDonHang']; ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="./admin/SuaDH" method="POST" class="p-4 md:p-5">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <input type="hidden" name="MaDonHang" value="<?php echo $item['MaDonHang']; ?>">
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="TenKH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên khách hàng <span class="text-gray-300">[Read only]</span></label>
                                                        <input type="text" name="TenKH" id="TenKH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo $item['TenKH']; ?>" placeholder="Nhập tên khách hàng" readonly>
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email khách hàng <span class="text-gray-300">[Read only]</span></label>
                                                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo $item['Email']; ?>" placeholder="Email khách hàng" readonly>
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="NgayTao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ngày đặt <span class="text-gray-300">[Read only]</span></label>
                                                        <input type="datetime" name="NgayTao" id="NgayTao" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo $item['NgayTao']; ?>" readonly>
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng thái đơn hàng</label>
                                                        <select name="TrangThai" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value="Chờ xử lý" <?php if($item['TrangThai'] == 'Chờ xử lý') echo 'selected'; ?>>Chờ xử lý</option>
                                                            <option value="Đang xử lý" <?php if($item['TrangThai'] == 'Đang xử lý') echo 'selected'; ?>>Đang xử lý</option>
                                                            <option value="Đang giao" <?php if($item['TrangThai'] == 'Đang giao') echo 'selected'; ?>>Đang giao</option>
                                                            <option value="Hoàn thành" <?php if($item['TrangThai'] == 'Hoàn thành') echo 'selected'; ?>>Hoàn thành</option>
                                                            <option value="Đã huỷ" <?php if($item['TrangThai'] == 'Đã huỷ') echo 'selected'; ?>>Đã huỷ</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="TongTien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tổng tiền <span class="text-gray-300">[Read only]</span></label>
                                                        <input type="text" name="TongTien" id="TongTien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo number_format($item['TongTien'], 0, ',', '.') . ' VNĐ'; ?>" placeholder="Tổng tiền" readonly>             
                                                    </div>
                                                </div>
                                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                    Cập nhật
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <div id="popup-modal <?php echo $item['MaDonHang']; ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-xl max-h-full">
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal <?php echo $item['MaDonHang']; ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center w-full">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="w-fit mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Bạn có chắc là bạn muốn xoá đơn hàng #<?php echo $item['MaDonHang']; ?> này không?</h3>                                                
                                                <div class="flex items-center justify-center">
                                                    <form action="./admin/XoaDH" method="POST">
                                                        <input type="hidden" name="MaDonHang" value="<?php echo $item['MaDonHang']; ?>">
                                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Chắc chắn xoá
                                                        </button>
                                                    </form>
                                                    
                                                    <button data-modal-hide="popup-modal <?php echo $item['MaDonHang']; ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Không, huỷ</button>
                                                </div>      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Trước
                </a>
                <a href="#"
                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Sau
                </a>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Hiển thị <span class="font-medium">1</span> đến <span class="font-medium">10</span> của
                        <span class="font-medium">97</span> kết quả
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#"
                            class="bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>