// Chọn phần tử danh sách trong slider
let slider = document.querySelector('.slider .list');
// Chọn tất cả các phần tử item trong danh sách
let items = document.querySelectorAll('.slider .list .item');
// Chọn nút 'next' và 'prev'
let next = document.getElementById('next');
let prev = document.getElementById('prev');
// Chọn tất cả các điểm (dots) trong slider
let dots = document.querySelectorAll('.slider .dots li');

// Lưu số lượng item trong slider
let lengthItems = items.length - 1;
// Khởi tạo biến active để theo dõi item đang hiển thị
let active = 0;

// Khi nhấn nút 'next'
next.onclick = function(){
    // Tăng giá trị active lên 1, nếu vượt quá số lượng item thì quay lại đầu
    active = active + 1 <= lengthItems ? active + 1 : 0;
    // Gọi hàm reloadSlider để cập nhật slider
    reloadSlider();
}

// Khi nhấn nút 'prev'
prev.onclick = function(){
    // Giảm giá trị active xuống 1, nếu nhỏ hơn 0 thì quay lại item cuối
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    // Gọi hàm reloadSlider để cập nhật slider
    reloadSlider();
}

// Tạo một khoảng thời gian tự động chuyển đổi slider mỗi 3500ms
let refreshInterval = setInterval(()=> {next.click()}, 3500);

function reloadSlider(){
    // Lấy chiều rộng màn hình hiện tại của người dùng
    const screenWidth = window.innerWidth;
    
    // Điều chỉnh chiều rộng của container và các items theo màn hình
    const sliderContainer = document.querySelector('.item'); 
    sliderContainer.style.width = screenWidth + 'px';
    
    // Điều chỉnh chiều rộng của từng item nếu cần
    const allItems = document.querySelectorAll('.slider .item'); // Giả sử mỗi slide là một item
    allItems.forEach(item => {
        item.style.width = screenWidth + 'px';
    });
    
    // Cập nhật vị trí của slider dựa trên offsetLeft của item hiện tại và chiều rộng mới
    slider.style.left = -items[active].offsetLeft + 'px';

    // Tìm và loại bỏ lớp 'active' của điểm trước đó
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    
    // Thêm lớp 'active' cho điểm tương ứng với item hiện tại
    dots[active].classList.add('active');

    // Xóa interval hiện tại để tránh lặp lại
    clearInterval(refreshInterval);
    
    // Tạo một interval mới cho tự động chuyển đổi
    refreshInterval = setInterval(()=> {next.click()}, 3500);
}

// Thêm event listener để cập nhật khi cửa sổ thay đổi kích thước
window.addEventListener('resize', reloadSlider);

// Khởi tạo ban đầu
reloadSlider();
// Thêm sự kiện click cho từng điểm (dot)
dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
        // Cập nhật active dựa trên chỉ số của điểm được click
        active = key;
        // Gọi hàm reloadSlider để cập nhật slider
        reloadSlider();
    })
})

// Cập nhật slider khi cửa sổ được thay đổi kích thước
window.onresize = function(event) {
    reloadSlider();
};