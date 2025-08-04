<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <link rel="stylesheet" href="styles/output.css">
    <title>Chỉnh sửa tài khoản</title>
</head>
<body class="bg-[#f5f5f5]">
    <?php require 'views/components/nav.php'; ?>
    <span class="flex items-center justify-center font-bold text-lg md:text-3xl mt-10 mb-3 md:mb-10">Danh sách địa chỉ</span>
    <div class="flex flex-col justify-center items-center gap-3">
        <div class="grid grid-cols-1 md:grid-cols-2 bg-white w-[95%] md:w-[60%] border-2 border-gray-300 rounded-xl p-3 gap-3">            
            <!-- Không có địa chỉ -->
            <?php if (empty($_SESSION['addressItems'])): ?>
            <div class="flex col-span-2 flex-col justify-center items-center p-3 md:p-5 border-2 border-gray-300 rounded-xl gap-2">
                <span class="text-center font-bold">Bạn chưa có địa chỉ nào cả</span>                                
            </div>
            <?php else: ?>
            <!-- Có địa chỉ -->
            <!-- Foreach bắt đầu từ đây -->   
            <?php foreach ($_SESSION['addressItems'] as $address): ?>         
            <div class="flex flex-col p-3 md:p-5 border-2 border-gray-300 rounded-xl gap-2">
                <div class="text-sm font-bold md:text-lg">Tên người nhận: 
                    <span class="font-normal"><?php echo $address['TenKH']; ?></span>
                </div>
                <div class="text-sm font-bold md:text-lg">SDT: 
                    <span class="font-normal"><?php echo $address['SDT']; ?></span>
                </div>
                <div class="text-sm font-bold md:text-lg">Địa chỉ: 
                    <span class="font-normal"><?php echo $address['DiaChiKH']; ?></span>
                </div>
                <div class="text-sm font-bold md:text-lg">Ghi chú: 
                    <span class="font-normal"><?php echo $address['GhiChu']; ?></span>
                </div>
                <div class="flex gap-3 items-center justify-center">
                    <div class="bg-amber-100 p-2 rounded-2xl border-2 border-gray-300 font-bold cursor-pointer hover:bg-amber-200 duration-200">Chỉnh sửa</div>
                    <div class="bg-red-100 p-2 rounded-2xl border-2 border-gray-300 font-bold cursor-pointer hover:bg-red-200 duration-200">Xoá</div>
                </div>
            </div>   
            <?php endforeach; ?>            
            <?php endif; ?>         
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="cursor-pointer col-span-2 w-fit flex m-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Thêm địa chỉ mới
            </button>
        </div>        
    </div>
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Product
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select category</option>
                                <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add new product
                    </button>
                </form>
            </div>
        </div>
    </div> 
    <?php require_once 'views/components/footer.php'; ?>
</body>
</html>