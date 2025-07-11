<?php session_start(); ?>
<nav class="sticky top-0 z-10">
    <div class="flex h-14 items-center bg-white justify-between shadow-md">
        <div class="flex ml-10 2xl:ml-55 xl:ml-55 lg:ml-30 md:ml-10 sm:ml-20 md:gap-4 lg:gap-6 2xl:gap-10 items-center">
            <div class="flex items-center gap-4">
                <div class="flex md:!hidden">
                    <svg class="w-10 h-10" fill="#000000" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M26,16c0,1.104-0.896,2-2,2H8c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C25.104,14,26,14.896,26,16z" id="XMLID_314_"></path><path d="M26,8c0,1.104-0.896,2-2,2H8c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C25.104,6,26,6.896,26,8z" id="XMLID_315_"></path><path d="M26,24c0,1.104-0.896,2-2,2H8c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C25.104,22,26,22.896,26,24z" id="XMLID_316_"></path></g></svg>
                </div>
                <a href="/LapTrinhWebNangCao_INT4241/frontend/">
                    <img class="w-8 h-8" src="/LapTrinhWebNangCao_INT4241/frontend/icon.png" alt="">
                </a>
            </div>         
            <div class="hidden md:flex md:gap-4 lg:gap-6 2xl:gap-10">
                <a href="/LapTrinhWebNangCao_INT4241/frontend/pages/store">
                    <span class="cursor-pointer text-lg 2xl:text-sm 2xl:font-normal xl:text-sm lg:text-sm md:text-[12px] hover:text-[#3c81c6] duration-150">
                        Cửa hàng</span>                      
                </a>
                <a href="/LapTrinhWebNangCao_INT4241/frontend/pages/mobile"><span
                        class="cursor-pointer text-lg 2xl:text-sm 2xl:font-normal xl:text-sm lg:text-sm md:text-[12px] hover:text-[#3c81c6] duration-150">
                        Di động</span>
                </a>
                <a href="/LapTrinhWebNangCao_INT4241/frontend/pages/smart-home"><span
                        class="cursor-pointer text-lg 2xl:text-sm 2xl:font-normal xl:text-sm lg:text-sm md:text-[12px] hover:text-[#3c81c6] duration-150">
                        Nhà thông minh</span>
                </a>             
            </div>

        </div>
        <div class="flex mr-10 xl:mr-55 gap-10 lg:gap-6 lg:mr-30 md:mr-10 sm:mr-10 md:gap-10 items-center">
            <div class="hidden gap-2 md:flex md:gap-4 lg:gap-6 2xl:gap-10">
                <a href="/LapTrinhWebNangCao_INT4241/frontend/pages/discover"><span
                    class="cursor-pointer text-lg 2xl:text-sm 2xl:font-normal xl:text-sm lg:text-sm md:text-[12px] hover:text-[#3c81c6] duration-150">
                    Khám phá</span></a>
                <a href="/LapTrinhWebNangCao_INT4241/frontend/pages/support"><span
                    class="cursor-pointer text-lg 2xl:text-sm 2xl:font-normal xl:text-sm lg:text-sm md:text-[12px] hover:text-[#3c81c6] duration-150">
                    Hỗ trợ</span></a>
            </div>
            <div class="flex gap-4 md:gap-4 lg:gap-6 2xl:gap-10">
                <a href="">
                <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </a>
            <a href="">
                <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>

            <?php if (isset($_SESSION['user'])): ?>
                <div class="flex gap-4">
                    <a href="/LapTrinhWebNangCao_INT4241/frontend/services/account.php">
                        <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
                </div>

            <?php else: ?>
                <a href="/LapTrinhWebNangCao_INT4241/frontend/services/login.php">
                    <svg class="w-6 h-6 hover:stroke-[#3c81c6] duration-150" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
            <?php endif; ?>
            </div>
            
        </div>
    </div>
</nav>