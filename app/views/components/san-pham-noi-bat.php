<span class="flex font-bold text-xl md:text-4xl justify-center mt-20">Sản phẩm nổi bật</span>
<div class="w-full mt-10 overflow-x-auto scrollbar-hide">
    <div class="flex ml-6 md:ml-0 justify-start sm:justify-center">
        <div class="flex shrink-0 space-x-8 mb-6 text-lg font-semibold items-center">
            <button onclick="switchTab('redmi')" class="tab-btn text-orange-500 border-b-2 border-orange-500 pb-2"
                id="tab-redmi">Redmi</button>
            <button onclick="switchTab('poco')" class="tab-btn text-black hover:text-orange-500"
                id="tab-poco">POCO</button>
            <button onclick="switchTab('tablet')" class="tab-btn text-black hover:text-orange-500" id="tab-tablet">Tablets</button>
            <button onclick="switchTab('home')" class="tab-btn text-black hover:text-orange-500" id="tab-home">Giải
                trí
                tại gia</button>
        </div>
    </div>
</div>

<!-- Nội dung tab -->
<div class="flex justify-center ">
    <div id="tab-content-redmi" class="tab-content md:p-8 bg-white shadow-md rounded-3xl w-[85%] ">
        <a href="./search?queryStr=Redmi"
            class="grid grid-cols-1 md:grid-cols-2 bg-[#f5f5f5] rounded-xl mb-3 group h-auto">
            <div class="overflow-hidden rounded-tl-xl rounded-tr-xl h-fit">
                <img class="group-hover:scale-110 duration-150 h-full" src="images/homepage/redmi_logo_001.jpg" alt="">
            </div>
            <div class="flex items-center justify-center flex-col p-5 items-centers text-center">
                <img class="w-[30%]" src="images/homepage/Redmi-Logo.wine.png" alt="">
                <span class="text-md font-bold mt-3 mb-2">Tiếp bước đỉnh cao</span>
                <span class="text-[12px]">Ghi giữ mọi khoảnh khắc đáng giá</span>
                <button
                    class="hidden rounded-xl bg-[#000000] text-white p-3 font-sm mt-3 cursor-pointer hover:scale-105 duration-150">Tìm
                    hiểu thêm
                </button>
            </div>
        </a>
        <div class="grid grid-cols-2 lg:grid-cols-4  rounded-xl gap-2">
            <?php foreach ($_SESSION['redmiList'] as $product): ?>
                <a href="./product?MaSP=<?php echo $product['MaSP'] ?>" class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 text-center group">
                    <div class="overflow-hidden group-hover:scale-110 duration-150">
                        <img class="w-40 h-auto" src="<?php echo $product['HinhAnhSP'] ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>">
                    </div>
                    <span class="text-sm font-bold mb-3 md:text-lg"><?php echo $product['TenSP'] ?></span>
                    <span class="font-bold text-[12px] md:text-lg">Từ
                        <?php echo number_format($product['GiaHienTai'], 0, ',', '.') ?>
                        <span class="underline underline-offset-1">đ</span><span class="line-through font-normal ml-2">    
                            <?php echo number_format($product['GiaBase'], 0, ',', '.') ?>
                        </span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="tab-content-poco" class="tab-content md:p-8 bg-white shadow-md rounded-3xl w-[85%] hidden">
        <a href="./search?queryStr=Poco" class="grid grid-cols-1 md:grid-cols-2 bg-[#f5f5f5] rounded-xl mb-3 group h-auto">            
            <div class="overflow-hidden rounded-tl-xl rounded-tr-xl">
                <img class="group-hover:scale-110 duration-150 w-full h-full" src="images/homepage/fc1db2579c5de004bd7bf909f6ecabca.jpg" alt="Poco">
            </div>
            <div class="flex items-center justify-center flex-col p-5 items-centers text-center">
                <svg class="w-[100%]" xmlns="http://www.w3.org/2000/svg" id="a" width="456.01" height="25" viewBox="0 0 456.01 25"><path d="m138.86.32h8.18c5.71,0,8.73,3.18,8.73,8.08s-3.02,7.89-8.73,7.89h-3.73v8.38h-4.45V.32Zm7.66,12.08c3.51,0,4.84-1.43,4.84-4.12s-1.33-4.06-4.84-4.06h-3.21v8.18h3.21Z"/><path d="m157.95,12.5c0-6.92,5.58-12.5,12.5-12.5s12.5,5.58,12.5,12.5-5.58,12.5-12.5,12.5-12.5-5.58-12.5-12.5Zm12.5,8.05c4.51,0,8.05-3.54,8.05-8.05s-3.54-8.05-8.05-8.05-8.05,3.54-8.05,8.05,3.54,8.05,8.05,8.05Z"/><path d="m185.58,12.5c0-6.92,5.58-12.5,12.5-12.5,2.27,0,4.42.62,6.2,1.69v5.36h-.23c-1.46-1.59-3.57-2.6-5.97-2.6-4.51,0-8.05,3.54-8.05,8.05s3.54,8.05,8.05,8.05c2.4,0,4.51-1.01,5.97-2.6h.23v5.32c-1.79,1.1-3.93,1.72-6.2,1.72-6.92,0-12.5-5.58-12.5-12.5h0Z"/><path d="m207.14,12.5c0-6.92,5.58-12.5,12.5-12.5s12.5,5.58,12.5,12.5-5.58,12.5-12.5,12.5-12.5-5.58-12.5-12.5Zm12.5,8.05c4.51,0,8.05-3.54,8.05-8.05s-3.54-8.05-8.05-8.05-8.05,3.54-8.05,8.05,3.54,8.05,8.05,8.05Z"/><path d="m252.43,18.12l-4.17,6.46h-3.74l6.15-9.15-5.86-8.72h3.72l3.91,6.03,3.91-6.03h3.72l-5.86,8.7,6.15,9.18h-3.74l-4.17-6.46h-.02Z"/><path d="m269.67,9.56h-7.94v-2.86h12.87l-8.82,17.88h-3.77l7.65-15.02h.01Z"/><path d="m280.89,6.7h6.01c4.19,0,6.41,2.34,6.41,5.94s-2.22,5.79-6.41,5.79h-2.74v6.15h-3.27V6.7h0Zm5.62,8.87c2.57,0,3.55-1.05,3.55-3.03s-.98-2.98-3.55-2.98h-2.36v6.01h2.36Z"/><path d="m295.06,12.66h3.27v2.07c.76-1.5,1.98-2.31,3.36-2.31.43,0,.88.07,1.12.17v3.05c-.33-.12-.72-.19-1.1-.19-1.67,0-3.38,1.24-3.38,3.98v5.15h-3.27v-11.92h0Z"/><path d="m303.97,18.62c0-3.48,2.69-6.2,6.58-6.2s6.6,2.72,6.6,6.2-2.72,6.2-6.6,6.2-6.58-2.74-6.58-6.2Zm6.58,3.34c1.86,0,3.34-1.48,3.34-3.34s-1.48-3.34-3.34-3.34-3.34,1.48-3.34,3.34,1.48,3.34,3.34,3.34Z"/></svg>
                <span class="text-md font-bold mt-3 mb-2">Dẫn đầu tốc độ</span>
                <button
                    class="hidden rounded-xl bg-[#000000] text-white p-3 font-sm mt-3 cursor-pointer hover:scale-105 duration-150">Tìm
                    hiểu thêm</button>
            </div>
        </a>
        <div class="grid grid-cols-2 lg:grid-cols-4 rounded-xl gap-2">
            <?php foreach ($_SESSION['pocoList'] as $product): ?>
                <a href="./product?MaSP=<?php echo $product['MaSP'] ?>" class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 text-center group">
                    <div class="overflow-hidden group-hover:scale-110 duration-150">
                        <img class="w-40 h-auto" src="<?php echo $product['HinhAnhSP'] ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>">
                    </div>
                    <span class="text-sm font-bold mb-3 md:text-lg"><?php echo $product['TenSP'] ?></span>
                    <span class="font-bold text-[12px] md:text-lg">Từ
                        <?php echo number_format($product['GiaHienTai'], 0, ',', '.') ?>
                        <span class="underline underline-offset-1">đ</span><span class="line-through font-normal ml-2">    
                            <?php echo number_format($product['GiaBase'], 0, ',', '.') ?>
                        </span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="tab-content-tablet" class="tab-content md:p-8 bg-white shadow-md rounded-3xl w-[85%] hidden">
        <a href="./search?queryStr=Pad"
            class="grid grid-cols-1 md:grid-cols-2 bg-[#f5f5f5] rounded-xl mb-3 group h-auto">
            <div class="overflow-hidden rounded-tl-xl rounded-tr-xl">
                <img class="group-hover:scale-110 duration-150 h-full w-full"
                    src="images/homepage/7fededad9b36f3d2b4becd103ca2614e.jpg"
                    alt="">
            </div>
            <div class="flex items-center justify-center flex-col p-5 items-centers text-center">
                <svg class="w-[100%]" xmlns="http://www.w3.org/2000/svg" id="a" width="160.87mm" height="9.05mm" viewBox="0 0 456 25.67"><path d="M147.17.66h8.17c5.71,0,8.72,3.18,8.72,8.07s-3,7.88-8.72,7.88h-3.73v8.36h-4.44V.66ZM154.82,12.72c3.5,0,4.83-1.43,4.83-4.12s-1.33-4-4.83-4h-3.21v8.17l3.21-.05Z" style="fill:#000; stroke-width:0px;"/><path d="M166.24,12.82c.02-6.89,5.62-12.47,12.51-12.45,6.89.02,12.47,5.62,12.45,12.51-.02,6.88-5.6,12.45-12.48,12.45-6.89,0-12.47-5.57-12.48-12.46,0-.02,0-.03,0-.05ZM178.72,20.82c4.42,0,8-3.58,8-8s-3.6-8.04-8.04-8.04-8.04,3.6-8.04,8.04c-.02,4.42,3.54,8.02,7.96,8.04.04,0,.08,0,.12,0v-.04Z" style="fill:#000; stroke-width:0px;"/><path d="M193.83,12.82c-.01-6.89,5.56-12.48,12.45-12.49.01,0,.02,0,.03,0,2.18,0,4.32.58,6.19,1.69v5.31h-.22c-1.54-1.68-3.72-2.62-6-2.59-4.42,0-8,3.58-8,8s3.58,8,8,8c2.28.03,4.46-.92,6-2.6h.22v5.32c-1.85,1.19-3.99,1.84-6.19,1.87-6.89,0-12.47-5.57-12.48-12.46,0-.02,0-.03,0-.05Z" style="fill:#000; stroke-width:0px;"/><path d="M215.36,12.82c.02-6.89,5.62-12.47,12.51-12.45,6.89.02,12.47,5.62,12.45,12.51-.02,6.88-5.6,12.45-12.48,12.45-6.89,0-12.47-5.57-12.48-12.46,0-.02,0-.03,0-.05ZM227.84,20.82c4.42,0,8-3.58,8-8s-3.6-8.04-8.04-8.04-8.04,3.6-8.04,8.04c-.02,4.42,3.54,8.02,7.96,8.04.04,0,.08,0,.12,0v-.04Z" style="fill:#000; stroke-width:0px;"/><path d="M252.59.69h8.17c5.7,0,8.72,3.18,8.72,8.07s-3,7.88-8.72,7.88h-3.76v8.36h-4.44l.03-24.31ZM260.24,12.75c3.5,0,4.83-1.43,4.83-4.12s-1.33-4-4.83-4h-3.24v8.17l3.24-.05Z" style="fill:#000; stroke-width:0px;"/><path d="M270.52,16.54c-.16-4.5,3.37-8.27,7.86-8.43.05,0,.09,0,.14,0,1.99-.04,3.89.79,5.22,2.27v-2h4.44v16.26h-4.44v-1.94c-1.33,1.47-3.23,2.31-5.21,2.3-4.51-.08-8.09-3.8-8.01-8.3,0-.05,0-.1,0-.16ZM279.52,21.08c1.92.02,3.64-1.19,4.28-3v-3.08c-.84-2.36-3.44-3.6-5.8-2.76-2.36.84-3.6,3.44-2.76,5.8.64,1.81,2.36,3.02,4.28,3.02v.02Z" style="fill:#000; stroke-width:0px;"/><path d="M291.66,16.54c-.17-4.49,3.34-8.26,7.82-8.43.06,0,.12,0,.18,0,1.99-.04,3.89.79,5.22,2.27V.33h4.44v24.31h-4.44v-1.94c-1.33,1.47-3.23,2.31-5.21,2.3-4.5-.07-8.09-3.78-8.01-8.28,0-.06,0-.12,0-.18ZM300.61,21.08c1.92.02,3.64-1.19,4.28-3v-3.08c-.84-2.36-3.44-3.6-5.8-2.76-2.36.84-3.6,3.44-2.76,5.8.64,1.81,2.36,3.02,4.28,3.02v.02Z" style="fill:#000; stroke-width:0px;"/></svg>
                <span class="text-md font-bold mt-3 mb-2">Màn hình cực chiến. Vào trận cực phê</span>
                <span class="text-[12px]">Màn hình cực chiến. Vào trận cực phê</span>
                <button
                    class="hidden rounded-xl bg-[#000000] text-white p-3 font-sm mt-3 cursor-pointer hover:scale-105 duration-150">Tìm
                    hiểu thêm</button>
            </div>
        </a>
        <div class="grid grid-cols-2 lg:grid-cols-4 rounded-xl gap-2">            
            <?php foreach ($_SESSION['tabletList'] as $product): ?>
                <a href="./product?MaSP=<?php echo $product['MaSP'] ?>" class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 text-center group">
                    <div class="overflow-hidden group-hover:scale-110 duration-150">
                        <img class="w-40 h-auto" src="<?php echo $product['HinhAnhSP'] ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>">
                    </div>
                    <span class="text-sm font-bold mb-3 md:text-lg"><?php echo $product['TenSP'] ?></span>
                    <span class="font-bold text-[12px] md:text-lg">Từ
                        <?php echo number_format($product['GiaHienTai'], 0, ',', '.') ?>
                        <span class="underline underline-offset-1">đ</span><span class="line-through font-normal ml-2">    
                            <?php echo number_format($product['GiaBase'], 0, ',', '.') ?>
                        </span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="tab-content-home" class="tab-content md:p-8 bg-white shadow-md rounded-3xl w-[85%] hidden">
        <a href="./search?queryStr=TV"
            class="grid grid-cols-1 md:grid-cols-2 bg-[#f5f5f5] rounded-xl mb-3 group h-auto">
            <div class="overflow-hidden rounded-tl-xl rounded-tr-xl">
                <img class="group-hover:scale-110 duration-150 h-full w-full"
                    src="images/homepage/6f7fc2d4cadb2a1ce16050b853adeb26.jpg"
                    alt="Xiaomi TV A Pro 75 2026">
            </div>
            <div class="flex items-center justify-center flex-col p-5 items-centers text-center">
                <svg class="w-[100%]" xmlns="http://www.w3.org/2000/svg" id="a" width="456" height="27.34" viewBox="0 0 456 27.34"><path d="m178.29,25.3V5.53h-7.03V1.59h18.26v3.95h-7.03v19.77h-4.2Z"/><path d="m190.03,1.59h4.56l6.45,17.88h.19l6.48-17.88h4.52l-8.92,23.72h-4.33s-8.95-23.72-8.95-23.72Z"/><path d="m225.24,25.3l8.89-23.72h4.33l8.89,23.72h-4.46l-6.48-18.04h-.19l-6.48,18.04h-4.5Zm16.08-10.49l1.06,3.98h-11.97l.99-3.98h9.92Z"/><path d="m265.22,17.18v-3.88h6.13c1.52,0,2.69-.34,3.51-1.01s1.24-1.64,1.24-2.9-.41-2.24-1.24-2.92c-.82-.68-2-1.03-3.51-1.03h-4.24v19.86h-4.2V1.59h8.99c2.67,0,4.77.69,6.27,2.05,1.5,1.36,2.26,3.28,2.26,5.74s-.73,4.38-2.18,5.74c-1.45,1.37-3.48,2.05-6.07,2.05h-6.96Z"/><path d="m283.58,25.3V7.72h4.08v3.24h.16c.64-1.18,1.51-2.09,2.6-2.73,1.09-.64,2.4-.96,3.91-.96h.19v4.11h-.29c-1.48,0-2.7.19-3.67.56-.97.37-1.7.92-2.18,1.64-.48.72-.72,1.56-.72,2.52v9.21h-4.08Z"/><path d="m304.02,25.75c-1.69,0-3.16-.38-4.41-1.14s-2.21-1.83-2.89-3.22c-.67-1.39-1.01-3.02-1.01-4.88s.34-3.52,1.01-4.91c.67-1.39,1.64-2.46,2.89-3.21s2.72-1.12,4.41-1.12,3.13.37,4.38,1.12,2.22,1.82,2.9,3.21,1.03,3.03,1.03,4.91-.34,3.49-1.03,4.89-1.65,2.48-2.9,3.22-2.71,1.12-4.38,1.12h0Zm0-3.85c.86,0,1.59-.22,2.21-.66s1.1-1.06,1.43-1.88c.33-.81.5-1.76.5-2.86s-.17-2.05-.5-2.87-.81-1.45-1.43-1.88-1.36-.64-2.21-.64-1.59.21-2.21.64-1.1,1.05-1.44,1.88c-.34.82-.51,1.78-.51,2.87s.17,2.04.51,2.86c.34.81.82,1.44,1.44,1.88.62.44,1.36.66,2.21.66Z"/><path d="m329.53,25.3l8.95-19.7h-10.46l-.03-4.04h15.53v2.82l-9.31,20.92h-4.69,0Z"/><path d="m349.4,18.66c.56,1.07,1.21,1.88,1.96,2.42.75.55,1.66.82,2.73.82.79,0,1.5-.16,2.12-.48s1.1-.79,1.44-1.4c.34-.61.51-1.31.51-2.1s-.17-1.49-.51-2.09-.82-1.06-1.44-1.38c-.62-.32-1.35-.48-2.18-.48s-1.52.18-2.18.55c-.66.36-1.21.9-1.64,1.6l-3.56-1.64.96-12.93h13.54v3.85h-9.6l-.55,6.42-.87.06c.58-.56,1.29-.98,2.13-1.28.84-.3,1.72-.45,2.62-.45,1.52,0,2.84.32,3.98.95s2.01,1.52,2.62,2.68.91,2.49.91,4.01c0,1.6-.34,3-1.03,4.19s-1.66,2.11-2.92,2.76-2.75.98-4.46.98c-1.9,0-3.55-.43-4.93-1.28-1.38-.86-2.39-2.02-3.03-3.5l3.37-2.28h0Z"/><path d="m88.21,1.32c-3.56,0-7.13.45-9.38,2.67-2.25,2.22-3.12,5.55-3.12,9.63s.78,7.36,3.03,9.58c2.25,2.21,5.91,2.75,9.47,2.75s7.11-.45,9.36-2.67,3.14-5.57,3.14-9.65-.79-7.34-3.04-9.55c-2.25-2.22-5.9-2.75-9.46-2.75h0Zm5.4,18.2c-1.25,1.43-3.53,1.69-5.4,1.69s-4.14-.25-5.4-1.68-1.34-3.41-1.34-5.9.08-4.41,1.34-5.84c1.25-1.43,3.27-1.68,5.4-1.68s4.15.25,5.4,1.68c1.25,1.43,1.34,3.36,1.34,5.84s-.08,4.46-1.34,5.89ZM38.85,1.75h-5.04c-.22,0-.39.17-.39.38v23.01c0,.21.18.38.39.38h5.04c.21,0,.39-.17.39-.38V2.14c0-.21-.18-.38-.39-.38h0Zm-21.19,11.69L26.62,2.35c.19-.24.02-.6-.29-.6h-6.46c-.15,0-.3.07-.39.2l-5.92,7.85L7.79,1.95c-.09-.13-.24-.2-.4-.2H.91c-.31,0-.48.36-.29.6l9.07,11.3L.62,24.93c-.19.24,0,.59.29.59h6.47c.16,0,.31-.08.4-.2l6.05-7.82,5.73,7.82c.09.13.24.2.4.2h6.4c.31,0,.48-.35.29-.59l-8.98-11.49h-.01ZM140.45,3.5c-2.05-1.91-5.35-2.14-8.02-2.14-3.45,0-5.64.73-6.98,1.42h-.92c-1.3-.72-3.6-1.42-7.2-1.42-2.67,0-5.94.2-7.96,1.89-1.67,1.4-2.05,3.27-2.05,7.1v14.79c0,.21.18.38.39.38h5.04c.22,0,.39-.17.39-.38v-12.17c0-2.2-.09-4.48.39-5.34.37-.66.95-1.4,3.69-1.4,3.27,0,4.04.23,4.55,1.67.12.34.18.83.21,1.42v15.81c0,.21.18.38.39.38h5.04c.21,0,.39-.17.39-.38v-15.81c.03-.59.09-1.08.21-1.42.51-1.45,1.28-1.67,4.55-1.67,2.74,0,3.32.74,3.69,1.4.47.85.39,3.14.39,5.34v12.17c0,.21.18.38.39.38h5.04c.21,0,.39-.17.39-.38v-13.89c0-3.97-.13-6.01-2-7.74h0Zm-72.36,1.41c-2.33-3.21-6.54-4.19-10.91-3.95-4.43.24-7.52,1.18-8.31,1.48-.49.19-.43.61-.43.86-.02.85-.08,3.04-.08,3.93,0,.39.48.58.89.43,1.62-.57,4.6-1.48,7-1.68,2.59-.21,6.1,0,7.07,1.47.46.7.49,1.77.54,2.86-1.62-.15-4.01-.35-6.38-.22-1.85.1-5.4.25-7.48,1.37-1.7.9-2.69,1.73-3.22,3.25-.43,1.23-.54,2.71-.41,3.92.31,2.75,1.27,4.12,2.56,5.07,2.04,1.51,4.61,2.3,9.92,2.19,7.07-.15,8.93-2.44,9.87-4.06,1.6-2.76,1.32-7.13,1.27-9.8-.02-1.11-.18-4.76-1.89-7.11h0Zm-4.61,14.51c-.67,1.4-3.04,1.62-4.46,1.69-2.61.12-4.53.01-5.76-.6-.82-.41-1.42-1.34-1.48-2.4-.05-.9-.03-1.36.38-1.9.92-1.19,3.31-1.45,5.77-1.54,1.66-.06,4.2.12,6.06.35,0,1.8-.13,3.61-.51,4.4ZM155.89,1.75h-5.04c-.22,0-.39.17-.39.38v23.01c0,.21.18.38.39.38h5.04c.21,0,.39-.17.39-.38V2.14c0-.21-.18-.38-.39-.38h0Z"/><path d="m454.72,4.02c-.79-1.76-2.13-2.98-3.85-3.54C449.5.03,447.52,0,445.26,0h-57.26C385.75,0,383.77.04,382.4.48c-1.73.56-3.06,1.79-3.85,3.54-.68,1.5-.73,3.44-.73,5.83v7.63c0,2.39.05,4.34.73,5.83.79,1.76,2.13,2.98,3.85,3.54,1.38.45,3.35.49,5.6.49h57.26c2.25,0,4.23-.04,5.61-.49,1.73-.56,3.06-1.79,3.85-3.54.67-1.49.73-3.44.73-5.83v-7.63c0-2.39-.05-4.34-.73-5.83Zm-1.12,5.48v8.34c0,2.08-.08,3.64-.49,4.55-.59,1.33-1.59,2.28-2.82,2.68-1.1.36-2.26.42-5,.42h-57.31c-2.74,0-3.9-.06-5-.42-1.23-.4-2.23-1.35-2.82-2.68-.4-.91-.49-2.48-.49-4.55v-8.34c0-2.08.08-3.64.49-4.55.59-1.33,1.59-2.28,2.82-2.68,1.1-.35,2.26-.42,5-.42h57.31c2.74,0,3.91.06,5,.42,1.23.4,2.23,1.35,2.82,2.68.4.91.49,2.48.49,4.55Z"/><path d="m396.77,8.07c-.65,0-1.23.19-1.72.57s-.92.95-1.26,1.7l-2.22-1.53c.41-.97,1.07-1.78,1.97-2.41.91-.63,2.02-.95,3.33-.95,1.05,0,1.96.2,2.74.59s1.38.95,1.8,1.66c.42.71.63,1.55.63,2.51,0,.87-.21,1.7-.62,2.49s-1.07,1.65-1.97,2.6l-4.89,5.23-.59-1.33h8.4v2.68h-10.8v-2.05l5.54-5.91c.74-.81,1.26-1.47,1.55-1.96.29-.49.44-1.03.44-1.59,0-.7-.21-1.25-.62-1.67s-.98-.62-1.69-.62h-.02Z"/><path d="m410.01,22.16c-1.89,0-3.34-.71-4.35-2.12s-1.52-3.48-1.52-6.22.51-4.83,1.52-6.25,2.46-2.13,4.35-2.13,3.34.71,4.35,2.13,1.52,3.5,1.52,6.25-.51,4.81-1.52,6.22c-1.01,1.41-2.46,2.12-4.35,2.12Zm0-2.66c.95,0,1.67-.48,2.17-1.44.5-.96.75-2.37.75-4.23s-.25-3.3-.75-4.26c-.5-.97-1.22-1.45-2.17-1.45s-1.65.48-2.16,1.45-.76,2.39-.76,4.26.25,3.27.76,4.23,1.23,1.44,2.16,1.44Z"/><path d="m422.7,8.07c-.65,0-1.23.19-1.72.57s-.92.95-1.26,1.7l-2.22-1.53c.41-.97,1.07-1.78,1.97-2.41.91-.63,2.02-.95,3.33-.95,1.05,0,1.96.2,2.74.59s1.38.95,1.8,1.66c.42.71.63,1.55.63,2.51,0,.87-.21,1.7-.62,2.49s-1.07,1.65-1.97,2.6l-4.89,5.23-.59-1.33h8.4v2.68h-10.8v-2.05l5.54-5.91c.74-.81,1.26-1.47,1.55-1.96.29-.49.44-1.03.44-1.59,0-.7-.21-1.25-.62-1.67s-.98-.62-1.69-.62h-.02Z"/><path d="m435.59,22.16c-1.11,0-2.09-.23-2.97-.69-.87-.46-1.56-1.1-2.05-1.93s-.74-1.77-.74-2.81c0-.61.06-1.17.19-1.68s.3-1,.52-1.47.56-1.09.99-1.87c.01-.03.03-.05.04-.08.01-.02.03-.05.04-.08l3.34-5.82h3.4l-4.41,7.26.02-.83c.33-.26.71-.45,1.12-.58.41-.12.85-.19,1.32-.19.92,0,1.76.22,2.52.65.76.44,1.37,1.05,1.81,1.85s.67,1.71.67,2.73c0,1.09-.25,2.05-.75,2.89s-1.19,1.48-2.07,1.94c-.88.46-1.88.69-3,.69v.02Zm.07-2.6c.54,0,1.02-.12,1.45-.36s.76-.57,1-1,.36-.92.36-1.47-.12-1.01-.35-1.43c-.23-.41-.56-.73-.97-.96-.41-.23-.88-.34-1.41-.34-.58,0-1.1.11-1.55.34-.45.23-.8.55-1.06.96-.25.41-.38.89-.38,1.43s.12,1.04.37,1.47c.25.43.59.76,1.03,1s.94.36,1.5.36h.01Zm-1.68-7.55l.44-.63.89.61-.46.65-.87-.63h0Z"/></svg>
                <span class="text-md font-bold mt-3 mb-2">Tuyệt đỉnh thị giác</span>
                <span class="text-md">Tận hưởng giải trí tại gia</span>
                <button
                    class="hidden rounded-xl bg-[#000000] text-white p-3 font-sm mt-3 cursor-pointer hover:scale-105 duration-150">Tìm
                    hiểu thêm</button>
            </div>
        </a>
        <div class="grid grid-cols-2 lg:grid-cols-4 rounded-xl gap-2">
            <?php foreach ($_SESSION['smartTVList'] as $product): ?>
                <a href="./product?MaSP=<?php echo $product['MaSP'] ?>" class="bg-[#f5f5f5] rounded-xl flex flex-col items-center justify-center p-5 text-center group">
                    <div class="overflow-hidden group-hover:scale-110 duration-150">
                        <img class="w-40 h-auto" src="<?php echo $product['HinhAnhSP'] ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>">
                    </div>
                    <span class="text-sm font-bold mb-3 md:text-lg"><?php echo $product['TenSP'] ?></span>
                    <span class="font-bold text-[12px] md:text-lg">Từ
                        <?php echo number_format($product['GiaHienTai'], 0, ',', '.') ?>
                        <span class="underline underline-offset-1">đ</span><span class="line-through font-normal ml-2">    
                            <?php echo number_format($product['GiaBase'], 0, ',', '.') ?>
                        </span>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    function switchTab(tab) {
        const tabs = ['redmi', 'poco', 'tablet', 'home'];
        tabs.forEach(t => {
            // Toggle tab content
            document.getElementById(`tab-content-${t}`).classList.add('hidden');
            // Toggle active class in button
            document.getElementById(`tab-${t}`).classList.remove('text-orange-500', 'border-orange-500', 'border-b-2');
            document.getElementById(`tab-${t}`).classList.add('text-black');
        });

        // Hiển thị tab được chọn
        document.getElementById(`tab-content-${tab}`).classList.remove('hidden');
        // Đánh dấu nút đang active
        document.getElementById(`tab-${tab}`).classList.add('text-orange-500', 'border-orange-500', 'border-b-2');
        document.getElementById(`tab-${tab}`).classList.remove('text-black');
    }
</script>