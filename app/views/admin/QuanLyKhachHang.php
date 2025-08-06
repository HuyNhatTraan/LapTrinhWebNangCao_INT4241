<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mt-5 p-3">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-semibold text-gray-900">Danh sách khách hàng</h2>
            <p class="text-gray-600">Quản lý tất cả khách hàng trong hệ thống</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                <i class="fas fa-download mr-2"></i>
                Xuất Excel
            </button>   
            <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                <i class="fas fa-plus mr-2"></i>
                Tạo thêm tài khoản khách
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-lg shadow border">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tìm kiếm</label>
                <input type="text" placeholder="Mã đơn hàng, tên khách hàng..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Tất cả</option>
                    <option value="pending">Chờ xử lý</option>
                    <option value="processing">Đang xử lý</option>
                    <option value="shipped">Đã giao</option>
                    <option value="delivered">Hoàn thành</option>
                    <option value="cancelled">Đã hủy</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Từ ngày</label>
                <input type="date" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Đến ngày</label>
                <input type="date" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
        </div>
        <div class="mt-4 flex justify-end gap-2">
            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Đặt lại
            </button>
            <button class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">
                Tìm kiếm
            </button>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white shadow rounded-lg border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã khách hàng</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên khách hàng</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số điện thoại</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày sinh</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                        
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Sample order rows -->
                    <?php foreach ($_SESSION['DanhSachKH'] as $item): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $item['MaKH']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $item['TenKH']; ?></div>
                            <div class="text-sm text-gray-500"><?php echo $item['Email']; ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $item['SDT']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $item['NgaySinh']; ?></td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                <?php echo $item['TrangThaiKH']; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button data-modal-target="xem-chi-tiet <?php echo $item['MaKH']; ?>" data-modal-toggle="xem-chi-tiet <?php echo $item['MaKH']; ?>" class="text-indigo-600 hover:text-indigo-900" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button data-modal-target="chinh-sua-kh <?php echo $item['MaKH']; ?>" data-modal-toggle="chinh-sua-kh <?php echo $item['MaKH']; ?>" class="text-green-600 hover:text-green-900" title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i>
                                </button>                                
                            </div>
                        </td>
                    </tr>
                    <!-- Modal xem chi tiết -->
                    <div id="xem-chi-tiet <?php echo $item['MaKH']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Chi tiết khách hàng <?php echo $item['MaKH']; ?>
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="xem-chi-tiet <?php echo $item['MaKH']; ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4">                                    
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="MaKH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã Khách hàng</label>
                                            <input type="text" name="MaKH" value="<?php echo $item['MaKH']; ?>" id="MaKH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="TenKH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên Khách hàng</label>
                                            <input type="text" name="TenKH" value="<?php echo $item['TenKH']; ?>" id="TenKH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="SDT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số điện thoại</label>
                                            <input type="number" name="SDT" value="<?php echo $item['SDT']; ?>" id="SDT" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="TrangThaiKH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng thái tài khoản</label>
                                            <input type="text" name="TrangThaiKH" value="<?php echo $item['TrangThaiKH']; ?>" id="TrangThaiKH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                        </div>                                        
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="NgaySinh" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ngày sinh</label>
                                            <input type="date" name="NgaySinh" value="<?php echo $item['NgaySinh']; ?>" id="NgaySinh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                        </div>                                        
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="NgayDangKy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ngày đăng ký</label>
                                            <input type="datetime" name="NgayDangKy" value="<?php echo $item['NgayDangKy']; ?>" id="NgayDangKy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                        </div>                                                                                
                                    </div>                                                                            
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Modal chỉnh sửa -->
                    <div id="chinh-sua-kh <?php echo $item['MaKH']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-[90%] md:w-[50%] max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Chỉnh sửa thông tin khách hàng <?php echo $item['MaKH']; ?>
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="chinh-sua-kh <?php echo $item['MaKH']; ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4">  
                                    <form action="./admin/SuaKH" method="POST">                                                                    
                                        <div class="grid gap-4 mb-4 grid-cols-2">                                            
                                            <div class="col-span-2">
                                                <label for="MaKH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã Khách hàng <span class="text-gray-300">(Read only)</span> </label>
                                                <input type="text" name="MaKH" value="<?php echo $item['MaKH']; ?>" id="MaKH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                            </div>
                                            <div class="col-span-2">
                                                <label for="TenKH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên Khách hàng</label>
                                                <input type="text" name="TenKH" value="<?php echo $item['TenKH']; ?>" id="TenKH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="SDT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số điện thoại</label>
                                                <input type="number" name="SDT" value="<?php echo $item['SDT']; ?>" id="SDT" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="TrangThaiKH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng thái tài khoản</label>
                                                <select id="TrangThaiKH" name="TrangThaiKH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="" selected>Chọn trạng thái khách hàng</option>
                                                    <option value="Hoạt động">Hoạt động</option>
                                                    <option value="Không hoạt động">Không hoạt động</option>
                                                    <option value="Bị khoá">Bị khoá</option>
                                                </select>                                                
                                            </div>                                        
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="NgaySinh" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ngày sinh</label>
                                                <input type="date" name="NgaySinh" value="<?php echo $item['NgaySinh']; ?>" id="NgaySinh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                            </div>                                        
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="NgayDangKy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ngày đăng ký <span class="text-gray-300">(Read only)</span></label>
                                                <input type="datetime" name="NgayDangKy" value="<?php echo $item['NgayDangKy']; ?>" id="NgayDangKy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                            </div>   
                                            <button type="submit" class="flex col-span-2 w-fit justify-center items-center m-auto text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                Sửa và lưu lại thông tin khách hàng
                                            </button>
                                        </div>  
                                    </form>                                                                            
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Trước
                </a>
                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
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
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
