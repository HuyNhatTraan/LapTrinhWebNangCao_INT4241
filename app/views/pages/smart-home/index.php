    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png" />
    <title>HT Tech Official Store</title>
</head>

<body class="bg-[#f7f7f7]">
    <?php require 'views/components/nav.php' ?>
    <div class="">
        <form method="GET" class="p-10 flex flex-col">
            <span class="flex font-bold text-2xl md:text-4xl">Smart TV</span>
            <div class="flex w-full md:gap-10 mt-3 text-md justify-between md:justify-start md:text-2xl">
                <!-- Liên quan -->
                <button type="submit" name="filter" value="relevant" class="bg-transparent border-none outline-none cursor-pointer 
                <?= $filter === 'relevant' ? 'text-orange-500 font-bold' : 'text-gray-800' ?>">
                    Liên quan
                </button>

                <span class="text-gray-800 font-bold">|</span>  

                <!-- Mới -->
                <button type="submit" name="filter" value="newest" class="bg-transparent border-none outline-none cursor-pointer 
                <?= $filter === 'newest' ? 'text-orange-500 font-bold' : 'text-gray-800' ?>">
                    Mới
                </button>

                <span class="text-gray-800 font-bold">|</span>

                <!-- Giá -->
                <button type="submit" name="filter" value="price" class="flex items-center justify-center bg-transparent border-none outline-none cursor-pointer 
                <?= $filter === 'price' ? 'text-orange-500 font-bold' : 'text-gray-800' ?>">
                    Giá
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 ml-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
                    </svg>
                </button>
            </div>
        </form>

        <div class="w-full m-auto ">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 w-full sm:gap-3 md:gap-3">
                <?php
                require '../../../backend/views/viewProduct.php'; // kết nối CSDL
                $filter = $_GET['filter'] ?? 'relevant';
                showAllTV($filter);
                ?>
            </div>
        </div>
    </div>
    <?php require 'views/components/footer.php' ?>
</body>

</html>