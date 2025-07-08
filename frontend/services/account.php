<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="/LapTrinhWebNangCao_INT4241/frontend/scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/styles.css">
    <link rel="stylesheet" href="/LapTrinhWebNangCao_INT4241/frontend/styles/output.css">
    <link rel="icon" href="/LapTrinhWebNangCao_INT4241/frontend/icon.png" type="image/png"/>
    <title>Tài khoản</title>
</head>

<body class="bg-[#f5f5f5]">
    <div class="sticky z-10 top-0" id="nav"></div>
    <div class="w-full relative">
        <img src="https://i02.appmifile.com/756_operatorx_operatorx_opx/10/12/2021/e02f348a785e05a0aaf82bfabfc1be24.jpg"
            alt="" class="w-full h-auto object-cover">
        <div class="absolute inset-0 flex justify-center items-center">
            <?php
                session_start();
                require_once('../../backend/config/db.php');

                // CHẶN TRUY CẬP KHI CHƯA LOGIN
                if (!isset($_SESSION['user'])) {
                    echo "
                        <div class='flex items-center gap-6 p-4'>
                            <div class='flex flex-col justify-center items-center gap-4'>  
                                <svg width='64px' height='64px' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <g id='SVGRepo_bgCarrier' stroke-width='0'></g>
                                    <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g>
                                    <g id='SVGRepo_iconCarrier'>
                                        <g id='style=linear'>
                                        <g id='error-box'>
                                            <path id='vector' d='M2 8C2 4.68629 4.68629 2 8 2H16C19.3137 2 22 4.68629 22 8V16C22 19.3137 19.3137 22 16 22H8C4.68629 22 2 19.3137 2 16V8Z' stroke='#ffffff' stroke-width='1.5'></path>
                                            <path id='vector_2' d='M9.00012 9L15.0001 15' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round'></path>
                                            <path id='vector_3' d='M15 9L9 14.9999' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round'></path>
                                        </g>
                                        </g>
                                    </g>
                                </svg>                                        
                                <span class='text-3xl font-semibold text-white'>Bạn chưa đăng nhập!</span>
                                <a class='text-white underline text-xl' href='/LapTrinhWebNangCao_INT4241/frontend/services/login.php' class='text-lg underline'>Đăng nhập ngay</a>
                            </div>
                        </div>                
                    ";
                    exit(); // dừng không chạy xuống dưới nữa
                }
            ?>
            <div class="w-[80%] flex justify-between items-center gap-4 p-4 rounded-xl shadow-[2px_1px_10px_8px_rgba(0,_0,_0,_0.35)] text-2xl text-white">
                <?php
                // NẾU ĐÃ ĐĂNG NHẬP THÌ CHẠY TRUY VẤN
                $emailSession = $_SESSION['user'];
                $sql = "SELECT email, full_name, img_url FROM test.account WHERE email = '$emailSession'";
                $result = $conn->query($sql);                
                require_once('../../backend/config/db.php');

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $avartar = $row["img_url"];
                        $name = $row["full_name"];
                        $email = $row["email"];

                        echo "
                            <div class='flex items-center justify-center gap-6 p-4 '>
                                <img class='w-[120px] h-[120px] object-cover rounded-full border-2 border-white shadow' src='$avartar' alt='avatar'>
                                <div class='flex flex-col'>
                                    <span class='text-2xl font-bold text-white mb-2'>Xin chào: $name</span>
                                    <span class='text-lg text-white-600'>Email: $email</span>
                                    <a href=''> 
                                        <span class='text-lg underline mt-3 hover:text-[#3c81c6] duration-200'>Chỉnh sửa thông tin</span>
                                    </a>
                                </div>
                            </div>
                            <div class='flex items-center gap-6 p-4 '>
                                <div class='flex flex-col items-center gap-2'>
                                    <svg width='64px' height='64px' viewBox='0 0 32 32' id='svg5' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:svg='http://www.w3.org/2000/svg' fill='#000000'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <defs id='defs2'></defs> <g id='layer1' transform='translate(-300,-484)'> <path d='m 326,505.76367 a 1,1 0 0 0 -0.70703,0.29297 l -1.79297,1.79297 -0.79297,-0.79297 a 1,1 0 0 0 -1.41406,0 1,1 0 0 0 0,1.41406 l 1.5,1.5 a 1.0001,1.0001 0 0 0 1.41406,0 l 2.5,-2.5 a 1,1 0 0 0 0,-1.41406 A 1,1 0 0 0 326,505.76367 Z' id='path453753' style='color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none'></path> <path d='m 307,504.01367 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 h 3 a 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z' id='path453745' style='color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none'></path> <path d='m 306,486.01367 a 1.0001,1.0001 0 0 0 -0.85742,0.48438 l -3,5 a 1.0001,1.0001 0 0 0 -0.0234,0.0684 1.0001,1.0001 0 0 0 -0.0703,0.20507 1.0001,1.0001 0 0 0 -0.0371,0.1836 1.0001,1.0001 0 0 0 -0.0117,0.0586 v 17 a 1.0001,1.0001 0 0 0 1,1 h 15.3457 c 0.8278,2.32506 3.05309,4 5.6543,4 3.30186,0 6,-2.69814 6,-6 0,-2.9609 -2.17093,-5.4344 -5,-5.91406 v -10.08594 a 1.0001,1.0001 0 0 0 -0.006,-0.0254 1.0001,1.0001 0 0 0 -0.0664,-0.3418 1.0001,1.0001 0 0 0 -0.0176,-0.0351 1.0001,1.0001 0 0 0 -0.0527,-0.11328 l -3,-5 A 1.0001,1.0001 0 0 0 321,486.01367 Z m 0.56641,2 h 4.21875 l -0.58399,3 h -5.43555 z m 6.25781,0 h 2.35742 l 0.60352,3 h -3.54493 z m 4.39844,0 h 3.21093 l 1.80079,3 h -4.40821 z m -13.22266,5 h 6 v 8 a 1.0001,1.0001 0 0 0 1.70703,0.70703 L 314,499.42773 l 2.29297,2.29297 A 1.0001,1.0001 0 0 0 318,501.01367 v -8 h 5 v 9.08594 c -2.82907,0.47966 -5,2.95316 -5,5.91406 h -14 z m 8,0 h 4 v 5.58594 l -1.29297,-1.29297 a 1.0001,1.0001 0 0 0 -1.41406,0 L 312,498.59961 Z m 12,11 c 2.22098,0 4,1.77902 4,4 0,2.22098 -1.77902,4 -4,4 -1.90036,0 -3.47694,-1.30297 -3.89258,-3.07031 a 1,1 0 0 0 -0.0527,-0.25977 C 320.01839,508.46564 320,508.24246 320,508.01367 c 0,-2.22098 1.77902,-4 4,-4 z' id='path453701' style='color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none'></path> </g> </g></svg>         
                                    <span class='text-[20px] font-semibold text-white'>Đơn hàng</span>
                                    <span class='text-[20px] font-bold text-white-600'>1</span>
                                </div>
                            </div>
                            <div class='flex items-center gap-6 p-4 '>
                                <div class='flex flex-col items-center gap-2'>
                                    <svg width='64px' height='64px' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <g id='SVGRepo_bgCarrier' stroke-width='0'></g>
                                        <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g>
                                        <g id='SVGRepo_iconCarrier'>
                                            <path d='M13.5 15.5C13.2164 14.3589 11.981 13.5 10.5 13.5C9.019 13.5 7.78364 14.3589 7.5 15.5M21 5V7M21 11V13M21 17V19M6.2 21H14.8C15.9201 21 16.4802 21 16.908 20.782C17.2843 20.5903 17.5903 20.2843 17.782 19.908C18 19.4802 18 18.9201 18 17.8V6.2C18 5.0799 18 4.51984 17.782 4.09202C17.5903 3.71569 17.2843 3.40973 16.908 3.21799C16.4802 3 15.9201 3 14.8 3H6.2C5.0799 3 4.51984 3 4.09202 3.21799C3.71569 3.40973 3.40973 3.71569 3.21799 4.09202C3 4.51984 3 5.07989 3 6.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21ZM11.5 9.5C11.5 10.0523 11.0523 10.5 10.5 10.5C9.94772 10.5 9.5 10.0523 9.5 9.5C9.5 8.94772 9.94772 8.5 10.5 8.5C11.0523 8.5 11.5 8.94772 11.5 9.5Z' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </g>
                                    </svg>                           
                                    <span class='text-[20px] font-semibold text-white'>Địa chỉ</span>
                                    <span class='text-[20px] font-bold'>1</span>
                                </div>
                            </div>
                            <div class='flex items-center gap-6 p-4 '>
                                <div class='flex flex-col items-center gap-2'>
                                    <svg width='64px' height='64px' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <g id='SVGRepo_bgCarrier' stroke-width='0'></g>
                                        <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g>
                                        <g id='SVGRepo_iconCarrier'>
                                            <path d='M22 13V12C22 8.22876 22 6.34315 20.8284 5.17157C19.6569 4 17.7712 4 14 4H10C6.22876 4 4.34315 4 3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20H13' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round'></path>
                                            <path opacity='0.4' d='M10 16H6' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round'></path>
                                            <path opacity='0.4' d='M2 10L22 10' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round'></path>
                                            <circle cx='18' cy='17' r='3' stroke='#ffffff' stroke-width='1.5'></circle>
                                            <path d='M20.5 19.5L21.5 20.5' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round'></path>
                                        </g>
                                    </svg>                        
                                    <span class='text-[20px] font-semibold text-white'>Điểm tích luỹ</span>
                                    <span class='text-[20px] font-bold'>1</span>
                                </div>
                            </div>
                            <div class='flex items-center gap-6 p-4 '>
                                <div class='flex flex-col items-center gap-2'>
                                    <a class='text-xl font-bold underline hover:text-[#3c81c6] duration-150' href='/LapTrinhWebNangCao_INT4241/backend/routes/logout.php'>Đăng xuất</a>                                                        
                                </div>
                            </div>
                            
                        ";
                    }
                } else {
                    echo "
                        <div class='flex items-center gap-6 p-4 '>
                            <div class='flex flex-col items-center gap-4'>                                                       
                                <span class='text-3xl font-semibold text-white'Không tìm thấy kết quả vui lòng đăng nhập lại</span>
                                <span class='text-3xl font-bold'>1</span>
                            </div>
                        </div>
                    ";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center items-center mt-10">
        <div class="w-[80%] bg-white p-10 rounded-lg shadow-lg">
            <span class="text-3xl font-bold mb-10">Công cụ hữu ích LMAO</span>
            <div class="grid grid-cols-3 gap-8 mt-5 text-center">
                <div class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 shadow-2xl hover:shadow-[2px_1px_10px_8px_rgba(0,_0,_0,_0.35)] duration-350 py-8">
                    <svg width="64px" height="64px" viewBox="0 0 32 32" id="svg5" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs id="defs2"></defs> <g id="layer1" transform="translate(-300,-484)"> <path d="m 326,505.76367 a 1,1 0 0 0 -0.70703,0.29297 l -1.79297,1.79297 -0.79297,-0.79297 a 1,1 0 0 0 -1.41406,0 1,1 0 0 0 0,1.41406 l 1.5,1.5 a 1.0001,1.0001 0 0 0 1.41406,0 l 2.5,-2.5 a 1,1 0 0 0 0,-1.41406 A 1,1 0 0 0 326,505.76367 Z" id="path453753" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 307,504.01367 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 h 3 a 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z" id="path453745" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m 306,486.01367 a 1.0001,1.0001 0 0 0 -0.85742,0.48438 l -3,5 a 1.0001,1.0001 0 0 0 -0.0234,0.0684 1.0001,1.0001 0 0 0 -0.0703,0.20507 1.0001,1.0001 0 0 0 -0.0371,0.1836 1.0001,1.0001 0 0 0 -0.0117,0.0586 v 17 a 1.0001,1.0001 0 0 0 1,1 h 15.3457 c 0.8278,2.32506 3.05309,4 5.6543,4 3.30186,0 6,-2.69814 6,-6 0,-2.9609 -2.17093,-5.4344 -5,-5.91406 v -10.08594 a 1.0001,1.0001 0 0 0 -0.006,-0.0254 1.0001,1.0001 0 0 0 -0.0664,-0.3418 1.0001,1.0001 0 0 0 -0.0176,-0.0351 1.0001,1.0001 0 0 0 -0.0527,-0.11328 l -3,-5 A 1.0001,1.0001 0 0 0 321,486.01367 Z m 0.56641,2 h 4.21875 l -0.58399,3 h -5.43555 z m 6.25781,0 h 2.35742 l 0.60352,3 h -3.54493 z m 4.39844,0 h 3.21093 l 1.80079,3 h -4.40821 z m -13.22266,5 h 6 v 8 a 1.0001,1.0001 0 0 0 1.70703,0.70703 L 314,499.42773 l 2.29297,2.29297 A 1.0001,1.0001 0 0 0 318,501.01367 v -8 h 5 v 9.08594 c -2.82907,0.47966 -5,2.95316 -5,5.91406 h -14 z m 8,0 h 4 v 5.58594 l -1.29297,-1.29297 a 1.0001,1.0001 0 0 0 -1.41406,0 L 312,498.59961 Z m 12,11 c 2.22098,0 4,1.77902 4,4 0,2.22098 -1.77902,4 -4,4 -1.90036,0 -3.47694,-1.30297 -3.89258,-3.07031 a 1,1 0 0 0 -0.0527,-0.25977 C 320.01839,508.46564 320,508.24246 320,508.01367 c 0,-2.22098 1.77902,-4 4,-4 z" id="path453701" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> </g> </g></svg>
                    <div class="flex flex-col items-center gap-2 p-4">
                        <span class="text-3xl font-bold">Đơn hàng của bạn</span>
                        <span>Theo dõi chỉnh sửa hoặc huỷ đơn hàng của bạn</span>
                    </div>                  
                </div>
                <div class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 shadow-2xl hover:shadow-[2px_1px_10px_8px_rgba(0,_0,_0,_0.35)] duration-350 py-8">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13.5 15.5C13.2164 14.3589 11.981 13.5 10.5 13.5C9.019 13.5 7.78364 14.3589 7.5 15.5M21 5V7M21 11V13M21 17V19M6.2 21H14.8C15.9201 21 16.4802 21 16.908 20.782C17.2843 20.5903 17.5903 20.2843 17.782 19.908C18 19.4802 18 18.9201 18 17.8V6.2C18 5.0799 18 4.51984 17.782 4.09202C17.5903 3.71569 17.2843 3.40973 16.908 3.21799C16.4802 3 15.9201 3 14.8 3H6.2C5.0799 3 4.51984 3 4.09202 3.21799C3.71569 3.40973 3.40973 3.71569 3.21799 4.09202C3 4.51984 3 5.07989 3 6.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21ZM11.5 9.5C11.5 10.0523 11.0523 10.5 10.5 10.5C9.94772 10.5 9.5 10.0523 9.5 9.5C9.5 8.94772 9.94772 8.5 10.5 8.5C11.0523 8.5 11.5 8.94772 11.5 9.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <div class="flex flex-col items-center gap-2 p-4">
                        <span class="text-3xl font-bold">Danh sách địa chỉ</span>
                        <span>Thêm, xoá hoặc chỉnh sửa danh sách địa chỉ của bạn</span>
                    </div>                  
                </div>
                <div class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 shadow-2xl hover:shadow-[2px_1px_10px_8px_rgba(0,_0,_0,_0.35)] duration-350 py-8">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 13V12C22 8.22876 22 6.34315 20.8284 5.17157C19.6569 4 17.7712 4 14 4H10C6.22876 4 4.34315 4 3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20H13" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.4" d="M10 16H6" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.4" d="M2 10L22 10" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="18" cy="17" r="3" stroke="#000000" stroke-width="1.5"></circle> <path d="M20.5 19.5L21.5 20.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    <div class="flex flex-col items-center gap-2 p-4">
                        <span class="text-3xl font-bold">Điểm tích luỹ</span>
                        <span>Theo dõi, kiểm tra điểm tích luỹ bạn đang có</span>
                    </div>                  
                </div>
                <div class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 shadow-2xl hover:shadow-[2px_1px_10px_8px_rgba(0,_0,_0,_0.35)] duration-350 py-8">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:none;stroke:#020202;stroke-miterlimit:10;stroke-width:1.91px;}</style></defs><circle class="cls-1" cx="12" cy="7.25" r="5.73"></circle><path class="cls-1" d="M1.5,23.48l.37-2.05A10.3,10.3,0,0,1,12,13h0a10.3,10.3,0,0,1,10.13,8.45l.37,2.05"></path></g></svg>
                    <div class="flex flex-col items-center gap-2 p-4">
                        <span class="text-3xl font-bold">Thông tin cá nhân</span>
                        <span>Chỉnh sửa thông tin cá nhân</span>
                    </div>                  
                </div>
                
            </div>
        </div>
        
    </div>
    <br> <br> <br>
    <div class="" id="footer"></div>
</body>

</html>