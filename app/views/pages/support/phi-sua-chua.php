<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Phí sửa chữa</title>
</head>

<body class="bg-[#f7f7f7]">
    <?php require 'views/components/nav.php'; ?>
    <span class="flex justify-center font-bold text-4xl h-40 items-center">PHÍ SỬA CHỮA</span>
    <div class="">
        <div class="w-[80%] m-auto">
            <div class="flex flex-col gap-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Phí Sửa Chữa Dự Kiến</h1>
                <div class="rounded-lg p-6 shadow mb-4 bg-white">
                    <table class="min-w-full text-sm text-left border border-gray-200 mb-6">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 font-semibold text-gray-700">Danh mục sản phẩm</th>
                                <th class="py-2 px-4 font-semibold text-gray-700">Phí nhân công (phần cứng)</th>
                                <th class="py-2 px-4 font-semibold text-gray-700">Phí nhân công (phần mềm)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="py-2 px-4">Mobile Phone &amp; Pad</td>
                                <td class="py-2 px-4">230.000 ₫</td>
                                <td class="py-2 px-4">160.000 ₫</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mb-2 text-gray-700 font-semibold">PHÍ SỬA CHỮA DỊCH VỤ DỰ KIẾN ĐỐI VỚI ĐIỆN THOẠI</div>
                    <ul class="list-disc list-inside text-gray-700 mb-4 ml-4">
                        <li>Giá trên là giá dự kiến và được tính theo VNĐ, đã bao gồm thuế VAT và các khoản thuế khác.</li>
                        <li>Giá sửa chữa dự kiến được áp dụng cho các trường hợp sửa chữa dịch vụ được đề cập ở trên và báo giá cuối cùng sẽ dựa trên kết quả thẩm định thực tế, tương ứng với tổng số tiền trên hóa đơn được cung cấp bởi Trung tâm bảo hành ủy quyền Xiaomi.</li>
                        <li>Sau khi hoàn thành việc kiểm tra tình trạng máy, Trung tâm bảo hành ủy quyền Xiaomi sẽ xác nhận tổng chi phí sửa chữa và thông báo đến khách hàng. Nếu trong quá trình kiểm tra máy, trung tâm bảo hành ủy quyền phát hiện các lỗi phát sinh khác và cần thay linh kiện, chúng tôi sẽ thông báo đến khách hàng và Quý khách cần thanh toán thêm phần chi phí phát sinh (nếu có).</li>
                        <li>Trong trường hợp khách hàng đồng ý với chi phí sửa chữa, chi phí này áp dụng cho cả phần linh kiện thay thế và chi phí nhân công.</li>
                        <li>Giá sửa chữa cuối cùng do Trung tâm bảo hành ủy quyền Xiaomi cung cấp.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <?php require 'views/components/footer.php'; ?>
</body>

</html>