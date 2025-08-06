	-- =============================
	-- TẠO DATABASE
	-- =============================
	CREATE DATABASE IF NOT EXISTS HT_Tech_LTWNC
    CHARACTER SET utf8mb4
	COLLATE utf8mb4_unicode_ci;

	USE HT_Tech_LTWNC;

	CREATE TABLE Account (
		MaTK VARCHAR(10) NOT NULL PRIMARY KEY,
		Email VARCHAR(255) NOT NULL UNIQUE,
		Password VARCHAR(100) NOT NULL,
		Role VARCHAR(20) NOT NULL,
		CHECK (Email LIKE '%@%.%')
	);
	
	CREATE TABLE DanhMucSP (
		MaDM VARCHAR(10) NOT NULL PRIMARY KEY,
		TenDanhMucSP VARCHAR(255)
	);

	CREATE TABLE NhaCungCap (
		MaNCC VARCHAR(10) NOT NULL PRIMARY KEY,
		TenNCC VARCHAR(255),
		SDTNCC VARCHAR(12),
		DiaChiNCC VARCHAR(255),
		CHECK (SDTNCC REGEXP '^[0-9]{10,12}$')
	);

	-- =============================
	-- TÀI KHOẢN - NGƯỜI DÙNG - NHÂN VIÊN
	-- =============================
	CREATE TABLE NhanVien (
		MaNV VARCHAR(10) NOT NULL PRIMARY KEY,
		MaTK VARCHAR(10) NOT NULL,
		TenNV VARCHAR(255),
		Hinh VARCHAR(255) default 'https://static.wikia.nocookie.net/wutheringwaves/images/d/d1/Resonator_Lupa.png',
		ViTri VARCHAR(255),
		NgayVaoLam DATETIME,
		SDT VARCHAR(12),
		FOREIGN KEY (MaTK) REFERENCES Account(MaTK)
	);

	CREATE TABLE KhachHang (
		MaKH VARCHAR(10) NOT NULL PRIMARY KEY,
		MaTK VARCHAR(10) NOT NULL,
		TenKH VARCHAR(255),
        Email VARCHAR(255) NOT NULL,
		Hinh VARCHAR(255) default 'https://static.wikia.nocookie.net/wutheringwaves/images/d/d1/Resonator_Lupa.png',
		SDT VARCHAR(12),
		NgaySinh DATE,
        TrangThaiKH VARCHAR(255),
        NgayDangKy DateTime DEFAULT CURRENT_TIMESTAMP,
		FOREIGN KEY (MaTK) REFERENCES Account(MaTK)
	);
    
    CREATE TABLE DiaChiKH (
		MaDiaChiKH INT auto_increment Primary key,
        MaKH VARCHAR(10), 
        TenNguoiNhan VARCHAR(255),
        SDTNhanHang VARCHAR(12), 
        DiaChiKH VARCHAR(255),
        GhiChu VARCHAR(255),
        FOREIGN KEY(MaKH) REFERENCES KhachHang(MaKH)
    );

	-- =============================
	-- SẢN PHẨM & BIẾN THỂ
	-- =============================
	CREATE TABLE SanPham (
		MaSP VARCHAR(10) NOT NULL PRIMARY KEY,
		MaDM VARCHAR(10),
		TenSP VARCHAR(255),
		SoLuongTon INTEGER CHECK (SoLuongTon >= 0),
		HinhAnhSP VARCHAR(255),
		TrangThaiSP VARCHAR(255),
		GiaBase DECIMAL(18,2) CHECK (GiaBase >= 0),
		GiaHienTai DECIMAL(18,2) CHECK (GiaHienTai >= 0),
		MoTaSP VARCHAR(255),
		FOREIGN KEY (MaDM) REFERENCES DanhMucSP(MaDM) ON DELETE SET NULL
	);

	CREATE TABLE BienTheSP (
		MaBienThe varchar(20) NOT NULL PRIMARY KEY,
		MaSP VARCHAR(10) NOT NULL,
		MauSac VARCHAR(20) NOT NULL,
		MaMau VARCHAR(10),
		HinhAnhBienThe VARCHAR(200),
		FOREIGN KEY(MaSP) REFERENCES SanPham(MaSP)
	);

	CREATE TABLE DungLuongSP(
		MaDLSP Varchar(10) primary key,
		MaSP Varchar(10) NOT NULL,
		MaBienThe varchar(20),
		TenDLSP Varchar(50) NOT NULL,
		SoLuong INT DEFAULT 0,
		foreign key(MaSP) references SanPham(MaSP),
		foreign key(MaBienThe) references BienTheSP(MaBienThe)
	);

	CREATE TABLE ThongSoKyThuat (
		MaTSKT Varchar(10) primary key,
		MaSP Varchar(10),
		TenLinhKien Varchar(255),
		NoiDungLinhKien Varchar(255),
		Foreign Key (MaSP) References SanPham(MaSP)
	);

	-- =============================
	-- GIỎ HÀNG & CHI TIẾT
	-- =============================
	CREATE TABLE GioHang (
		MaGH INT PRIMARY KEY AUTO_INCREMENT,
		MaKH VARCHAR(10), -- nếu có tài khoản
		MaSP VARCHAR(10) NOT NULL,
		MaBienThe VARCHAR(20),
		MaDLSP VARCHAR(10),
		SoLuong INT CHECK (SoLuong > 0),
		
		FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH),
		FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP),
		FOREIGN KEY (MaBienThe) REFERENCES BienTheSP(MaBienThe),
		FOREIGN KEY (MaDLSP) REFERENCES DungLuongSP(MaDLSP)
	);

	-- =============================
	-- ĐƠN HÀNG & CHI TIẾT
	-- =============================
	CREATE TABLE DonHang (
		MaDonHang INT auto_increment PRIMARY KEY,
        MaDiaChiKH INT, 
		MaKH VARCHAR(10) NOT NULL,
		NgayTao DATETIME,
        TrangThai VARCHAR(255),
        PhuongThucThanhToan VARCHAR(255),
		GhiChu VARCHAR(255),
        FOREIGN KEY (MaDiaChiKH) REFERENCES DiaChiKH(MaDiaChiKH),
		FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH)
	);

	CREATE TABLE ChiTietDonHang (
		MaDonHang INT,
		MaBienThe VARCHAR(10) NOT NULL,
        MaDLSP Varchar(10),
		SoLuong INTEGER CHECK (SoLuong > 0),
		GiaTien DECIMAL(18, 2) CHECK (GiaTien >= 0),
		FOREIGN KEY (MaDonHang) REFERENCES DonHang(MaDonHang),
		FOREIGN KEY (MaBienThe) REFERENCES BienTheSP(MaBienThe),
        FOREIGN KEY (MaDLSP) REFERENCES DungLuongSP(MaDLSP)
	);

	-- =============================
	-- HÓA ĐƠN & THANH TOÁN
	-- =============================
	CREATE TABLE HoaDon (
		MaHD VARCHAR(20) NOT NULL PRIMARY KEY,
		MaDonHang INT,
		TongTien DECIMAL(18, 2) CHECK (TongTien >= 0),
		NgayLapHD DATETIME,
		FOREIGN KEY (MaDonHang) REFERENCES DonHang(MaDonHang)
	);

	CREATE TABLE ThanhToan (
		MaThanhToan VARCHAR(20) NOT NULL PRIMARY KEY,
		MaHD VARCHAR(20) NOT NULL,
		PhuongThucThanhToan VARCHAR(255),
		TrangThai VARCHAR(20),
		NgayThanhToan DATETIME,
		CHECK (TrangThai IN ('Chưa thanh toán', 'Đã thanh toán', 'Hoàn tiền')),
		FOREIGN KEY (MaHD) REFERENCES HoaDon(MaHD)
	);

	-- =============================
	-- TRẠNG THÁI ĐƠN HÀNG
	-- =============================
	CREATE TABLE LichSuTrangThaiDonHang (
		MaLichSuTT VARCHAR(10) PRIMARY KEY,
		MaDonHang INT,
		TrangThai VARCHAR(255),
		ThoiGianCapNhat DATETIME,
		GhiChu VARCHAR(255),
		FOREIGN KEY (MaDonHang) REFERENCES DonHang(MaDonHang)
	);

	-- =============================
	-- KHUYẾN MÃI
	-- =============================
	CREATE TABLE KhuyenMai (
		MaKM VARCHAR(10) NOT NULL PRIMARY KEY,
		MaNV VARCHAR(10) NOT NULL,
		PhanTramGiam INTEGER CHECK (PhanTramGiam BETWEEN 1 AND 100),
		NgayBatDau DATETIME,
		NgayKetThuc DATETIME,
		SoLuong INTEGER CHECK (SoLuong >= 0),
		FOREIGN KEY (MaNV) REFERENCES NhanVien(MaNV)
	);

	CREATE TABLE ChiTietKhuyenMai (
		MaKM VARCHAR(10),
		MaSP VARCHAR(10),
		PRIMARY KEY (MaKM, MaSP),
		FOREIGN KEY (MaKM) REFERENCES KhuyenMai(MaKM),
		FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
	);

	-- =============================
	-- PHIẾU NHẬP
	-- =============================
	CREATE TABLE PhieuNhap (
		MaPN VARCHAR(10) NOT NULL PRIMARY KEY,
		MaNCC VARCHAR(10) NOT NULL,
		NgayNhap DATETIME,
		FOREIGN KEY (MaNCC) REFERENCES NhaCungCap(MaNCC)
	);

	CREATE TABLE ChiTietPhieuNhap (
		MaPN VARCHAR(10) NOT NULL,
		MaSP VARCHAR(10) NOT NULL,
		SoLuong INTEGER CHECK (SoLuong >= 0),
		GiaNhap DECIMAL(18, 2) CHECK (GiaNhap >= 0),
		HinhAnhSP VARCHAR(255),
		PRIMARY KEY (MaPN, MaSP),
		FOREIGN KEY (MaPN) REFERENCES PhieuNhap(MaPN),
		FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
	);

	-- =============================
	-- ĐỊA CHỈ GIAO HÀNG
	-- =============================
	CREATE TABLE DiaChiGiaoHang (
		MaDiaChi CHAR(20) NOT NULL PRIMARY KEY,
		MaKH VARCHAR(10) NOT NULL,
		NguoiNhan VARCHAR(255),
		SoDienThoaiNhan VARCHAR(12),
		TinhThanh VARCHAR(255),
		QuanHuyen VARCHAR(255),
		PhuongXa VARCHAR(255),
		ThanhPho VARCHAR(255),
		GhiChu VARCHAR(255),
		CHECK (SoDienThoaiNhan REGEXP '^[0-9]{10,12}$'),
		FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH)
	);

	-- =============================
	-- ĐÁNH GIÁ & PHẢN HỒI
	-- =============================
	CREATE TABLE DanhGiaSP (
		MaDanhGia VARCHAR(10) NOT NULL PRIMARY KEY,
		MaSP VARCHAR(10) NOT NULL,
		MaKH VARCHAR(10) NOT NULL,
		SoSao FLOAT CHECK (SoSao BETWEEN 1 AND 5),
		NoiDungDanhGia VARCHAR(255),
		NgayDanhGia DATETIME,
		FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP),
		FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH)
	);

	CREATE TABLE Feedback (
		MaFB VARCHAR(10) NOT NULL PRIMARY KEY,
		MaKH VARCHAR(10) NOT NULL,
		MaNV VARCHAR(10),
		TieuDeFB VARCHAR(255),
		NoiDungFB VARCHAR(255),
		NgayGuiFB DATETIME,
		FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH),
		FOREIGN KEY (MaNV) REFERENCES NhanVien(MaNV)
	);

	-- =============================
	-- LỊCH LÀM VIỆC, HOẠT ĐỘNG
	-- =============================
	CREATE TABLE LichLamViec (
		MaLichLamViec VARCHAR(10) NOT NULL PRIMARY KEY,
		MaNV VARCHAR(10) NOT NULL,
		FOREIGN KEY (MaNV) REFERENCES NhanVien(MaNV)
	);

	CREATE TABLE LichSuHoatDong (
		MaLSHD VARCHAR(10) NOT NULL PRIMARY KEY,
		MaNV VARCHAR(10) NOT NULL,
		NoiDungChinhSua VARCHAR(255),
		NgayChinhSua DATETIME,
		FOREIGN KEY (MaNV) REFERENCES NhanVien(MaNV)
	);

	-- INSERT INTO DanhMucSP
	INSERT INTO DanhMucSP (MaDM, TenDanhMucSP) VALUES
	('DM001', 'Phone'),
	('DM002', 'Tablet'),
	('DM003', 'Smart TV');

	-- INSERT INTO SanPham
	INSERT INTO SanPham (MaSP, MaDM, TenSP, SoLuongTon, HinhAnhSP, TrangThaiSP, GiaBase, GiaHienTai, MoTaSP) VALUES
	('SP001', 'DM001', 'Redmi 13',100,'images/store/product/phones/redmi-13-defaults.png', 'Còn hàng', 4290000, 3090000, NULL),
	('SP002', 'DM001', 'Redmi Note 14 5G',100,'images/store/product/phones/redmi-note-14-default.png', 'Còn hàng', 4990000, 4790000, NULL),
	('SP003', 'DM001', 'Poco M6',100,'images/store/product/phones/poco-m6-default.png', 'Còn hàng', 4290000, 3290000, NULL),
	('SP004', 'DM001', 'Poco X7 Pro',100,'images/store/product/phones/poco-x7-pro-default.png', 'Còn hàng', 9990000 , 8490000, NULL),
	('SP005', 'DM001', 'Poco X7',100,'images/store/product/phones/poco-x7-default.png', 'Còn hàng', 8990000 , 7490000, NULL),
	('SP006', 'DM002', 'Xiaomi Pad 7',100,'images/store/product/tablets/a918e6951fff5135f59357824195e55b.png', 'Còn hàng', 10490000, 9690000, NULL),
	('SP007', 'DM002', 'Redmi Pad 2',100,'images/store/product/tablets/d248d3673ce76fb6d02ff6d947b695d9.png', 'Còn hàng', 5290000, 4990000, NULL),
	('SP008', 'DM002', 'Poco Pad 5G',100,'images/store/product/tablets/c9246c061b7729abc38d6b8808e43148.png', 'Còn hàng', 8690000, 7690000, NULL),
	('SP009', 'DM002', 'Redmi Pad SE 8.7 4G',100,'images/store/product/tablets/be6d91b0138b6812c1a3e06d7dcafc51.png', 'Còn hàng', 4990000, 4490000, NULL),
	('SP010', 'DM002', 'Xiaomi Pad 7 Pro',100,'images/store/product/tablets/713e484cb13f2a3d4767fd41ce7ab502.png', 'Còn hàng', 13190000, 13990000, NULL),
	('SP011', 'DM003', 'Xiaomi TV A Pro 75 2026',100,'images/store/product/smart-tv/228778f8be1ac898c4be2bb46a9db48d.png', 'Còn hàng', 18670000, 17670000, NULL),
	('SP012', 'DM003', 'Xiaomi TV A 55 2026',100,'images/store/product/smart-tv/0855ad99a0dd17cd9670236fec78f53a.png', 'Còn hàng', 10320000, 9320000, NULL),
	('SP013', 'DM003', 'Xiaomi TV A Pro 55 2026',100,'images/store/product/smart-tv/da35027188dfa19c756543f1fd261c54.png', 'Còn hàng', 11300000, 10300000, NULL),
	('SP014', 'DM003', 'Xiaomi TV A 43 2026',100,'images/store/product/smart-tv/fa08f759edabb59aad06e598641692a0.png', 'Còn hàng', 7370000, 6870000, NULL),
	('SP015', 'DM003', 'Xiaomi TV A Pro 65 2026',100,'images/store/product/smart-tv/969d61354dcc7913afbae2610f656733.png', 'Còn hàng', 14740000, 13740000, NULL);

	-- SELECT MaSP, TenSP, HinhAnhSP, GiaBase, GiaHienTai FROM SanPham Limit 1;

	-- INSERT INTO ThongSoKyThuat
	INSERT INTO ThongSoKyThuat (MaTSKT, MaSP, TenLinhKien, NoiDungLinhKien) VALUES
	('TS001', 'SP001', 'Ngày ra mắt', '2024, June 03'),
	('TS002', 'SP001', 'Tình trạng', 'Đã phát hành, 2024, June 03'),
	('TS003', 'SP001', 'Kích thước', '168.6 x 76.3 x 8.3 mm'),
	('TS004', 'SP001', 'Trọng lượng', '205 g'),
	('TS005', 'SP001', 'Chất liệu', 'Mặt kính trước, khung nhựa, mặt kính sau'),
	('TS006', 'SP001', 'SIM', 'Nano-SIM + Nano-SIM'),
	('TS007', 'SP001', 'Kháng nước & bụi', 'IP53 - chống bụi và nước dạng tia đứng'),
	('TS008', 'SP001', 'Loại màn hình', 'IPS LCD, 90Hz, 550 nits (HBM)'),
	('TS009', 'SP001', 'Kích thước màn hình', '6.79 inches, ~85.1% diện tích hiển thị'),
	('TS010', 'SP001', 'Độ phân giải màn hình', '1080 x 2460 pixels (~396 ppi)'),
	('TS011', 'SP001', 'Kính bảo vệ', 'Corning Gorilla Glass'),
	('TS012', 'SP001', 'Hệ điều hành', 'Android 14, HyperOS'),
	('TS013', 'SP001', 'Chipset', 'Mediatek Helio G91 Ultra (12 nm)'),
	('TS014', 'SP001', 'CPU', 'Octa-core (2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)'),
	('TS015', 'SP001', 'GPU', 'Mali-G52 MC2'),
	('TS016', 'SP001', 'Khe thẻ nhớ', 'microSDXC (dùng chung khe SIM)'),
	('TS017', 'SP001', 'Bộ nhớ trong', '128GB 6GB RAM, 128GB 8GB RAM, 256GB 8GB RAM'),
	('TS018', 'SP001', 'Chuẩn bộ nhớ', 'eMMC 5.1'),
	('TS019', 'SP001', 'Camera sau', '108 MP (f/1.8, wide, PDAF), 2 MP (f/2.4, macro)'),
	('TS020', 'SP001', 'Tính năng camera sau', 'Đèn flash LED, HDR'),
	('TS021', 'SP001', 'Quay video (sau)', '1080p@30fps'),
	('TS022', 'SP001', 'Camera trước', '13 MP, f/2.5, (wide)'),
	('TS023', 'SP001', 'Tính năng camera trước', 'HDR'),
	('TS024', 'SP001', 'Quay video (trước)', '1080p@30fps'),
	('TS025', 'SP001', 'Loa ngoài', 'Có'),
	('TS026', 'SP001', 'Jack 3.5mm', 'Có'),
	('TS027', 'SP001', 'Wi-Fi', 'Wi-Fi 802.11 a/b/g/n/ac, băng tần kép'),
	('TS028', 'SP001', 'Bluetooth', 'v5.4, A2DP, LE'),
	('TS029', 'SP001', 'Định vị', 'GPS, GLONASS, GALILEO, BDS'),
	('TS030', 'SP001', 'NFC', 'Có (tùy thị trường)'),
	('TS031', 'SP001', 'Cổng hồng ngoại', 'Có'),
	('TS032', 'SP001', 'Radio', 'FM Radio'),
	('TS033', 'SP001', 'Cổng sạc', 'USB Type-C'),
	('TS034', 'SP001', 'Cảm biến', 'Vân tay cạnh bên, cảm biến gia tốc, la bàn'),
	('TS035', 'SP001', 'Pin', '5030 mAh'),
	('TS036', 'SP001', 'Sạc', '33W có dây'),
	('TS037', 'SP002', 'Công nghệ mạng', 'GSM / HSPA / LTE / 5G'),
	('TS038', 'SP002', 'Ngày công bố', '10 tháng 1, 2025'),
	('TS039', 'SP002', 'Tình trạng', 'Sắp ra mắt (dự kiến 16 tháng 1, 2025)'),
	('TS040', 'SP002', 'Kích thước', '162.4 x 75.7 x 8 mm'),
	('TS041', 'SP002', 'Trọng lượng', '190 g'),
	('TS042', 'SP002', 'Chất liệu', 'Mặt kính Gorilla Glass 5, mặt sau & khung bằng nhựa'),
	('TS043', 'SP002', 'SIM', 'Nano-SIM + Nano-SIM (hybrid)'),
	('TS044', 'SP002', 'Kháng bụi/nước', 'IP64 - kháng bụi và tia nước bắn'),
	('TS045', 'SP002', 'Loại màn hình', 'AMOLED, 120Hz, 960Hz PWM, HDR10+, 1200 nits (HBM), 2100 nits (đỉnh)'),
	('TS046', 'SP002', 'Kích thước màn hình', '6.67 inches (~87.4% màn hình/thân máy)'),
	('TS047', 'SP002', 'Độ phân giải', '1080 x 2400 pixels, tỷ lệ 20:9 (~395 ppi)'),
	('TS048', 'SP002', 'Kính bảo vệ', 'Corning Gorilla Glass 5'),
	('TS049', 'SP002', 'Hệ điều hành', 'Android 14, HyperOS'),
	('TS050', 'SP002', 'Chipset', 'Mediatek Dimensity 7025 Ultra (6 nm)'),
	('TS051', 'SP002', 'CPU', 'Octa-core (2x2.5 GHz Cortex-A78 & 6x2.0 GHz Cortex-A55)'),
	('TS052', 'SP002', 'GPU', 'IMG BXM-8-256'),
	('TS053', 'SP002', 'Khe cắm thẻ nhớ', 'microSDXC (dùng chung khe SIM)'),
	('TS054', 'SP002', 'Bộ nhớ trong', '128GB 6GB RAM, 256GB 8GB RAM, 256GB 12GB RAM, 512GB 12GB RAM'),
	('TS055', 'SP002', 'Chuẩn bộ nhớ', 'UFS 2.2'),
	('TS056', 'SP002', 'Camera sau', '108 MP (f/1.7, OIS), 8 MP (siêu rộng), 2 MP (macro)'),
	('TS057', 'SP002', 'Tính năng camera sau', 'LED flash, HDR, panorama'),
	('TS058', 'SP002', 'Quay video (sau)', '1080p@30/60fps, OIS, chống rung điện tử gyro-EIS'),
	('TS059', 'SP002', 'Camera trước', '20 MP, f/2.2, 21mm (rộng)'),
	('TS060', 'SP002', 'Quay video (trước)', '1080p@30fps'),
	('TS061', 'SP002', 'Loa ngoài', 'Có, loa kép, Dolby Atmos'),
	('TS062', 'SP002', 'Jack 3.5mm', 'Có, hỗ trợ âm thanh Hi-Res 24-bit/192kHz'),
	('TS063', 'SP002', 'Wi-Fi', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct'),
	('TS064', 'SP002', 'Bluetooth', 'v5.3, A2DP, LE'),
	('TS065', 'SP002', 'Định vị', 'GPS, GLONASS, BDS, GALILEO'),
	('TS066', 'SP002', 'NFC', 'Có (phụ thuộc khu vực)'),
	('TS067', 'SP002', 'Cổng hồng ngoại', 'Có'),
	('TS068', 'SP002', 'Radio', 'FM Radio'),
	('TS069', 'SP002', 'USB', 'USB Type-C 2.0, OTG'),
	('TS070', 'SP002', 'Cảm biến', 'Vân tay quang học dưới màn hình, gia tốc kế, con quay hồi chuyển, la bàn'),
	('TS071', 'SP002', 'Cảm biến tiệm cận', 'Cảm biến tiệm cận ảo'),
	('TS072', 'SP002', 'Dung lượng pin', '5110 mAh'),
	('TS073', 'SP002', 'Sạc', '45W có dây'),
	('TS074', 'SP003', 'Công nghệ mạng', 'GSM / HSPA / LTE / 5G'),
	('TS075', 'SP003', 'Ngày công bố', '2023, December 22'),
	('TS076', 'SP003', 'Tình trạng', 'Đã phát hành (2023, December 26)'),
	('TS077', 'SP003', 'Kích thước', '168 x 78 x 8.1 mm'),
	('TS078', 'SP003', 'Trọng lượng', '195 g'),
	('TS079', 'SP003', 'SIM', 'Nano-SIM + Nano-SIM'),
	('TS080', 'SP003', 'Kháng bụi/nước', 'Chống nước nhẹ và bụi'),
	('TS081', 'SP003', 'Loại màn hình', 'IPS LCD, 90Hz, 450 nits (typ), 600 nits (HBM)'),
	('TS082', 'SP003', 'Kích thước màn hình', '6.74 inches (~83.7% diện tích hiển thị)'),
	('TS083', 'SP003', 'Độ phân giải', '720 x 1600 pixels, tỷ lệ 20:9 (~260 ppi)'),
	('TS084', 'SP003', 'Kính bảo vệ', 'Corning Gorilla Glass'),
	('TS085', 'SP003', 'Hệ điều hành', 'Android 13, MIUI 14'),
	('TS086', 'SP003', 'Chipset', 'Mediatek Dimensity 6100+ (6 nm)'),
	('TS087', 'SP003', 'CPU', 'Octa-core (2x2.2 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)'),
	('TS088', 'SP003', 'GPU', 'Mali-G57 MC2'),
	('TS089', 'SP003', 'Khe cắm thẻ nhớ', 'microSDXC (khe riêng)'),
	('TS090', 'SP003', 'Bộ nhớ trong', '64GB 4GB RAM, 128GB 4GB RAM, 128GB 6GB RAM, 256GB 8GB RAM'),
	('TS091', 'SP003', 'Chuẩn bộ nhớ', 'UFS 2.2'),
	('TS092', 'SP003', 'Camera sau', '50 MP (f/1.8, PDAF) + 0.08 MP (ống phụ)'),
	('TS093', 'SP003', 'Tính năng camera sau', 'LED flash, HDR'),
	('TS094', 'SP003', 'Quay video (sau)', '1080p@30fps'),
	('TS095', 'SP003', 'Camera trước', '5 MP, f/2.2, (wide)'),
	('TS096', 'SP003', 'Tính năng camera trước', 'HDR'),
	('TS097', 'SP003', 'Quay video (trước)', '1080p@30fps'),
	('TS098', 'SP003', 'Loa ngoài', 'Có'),
	('TS099', 'SP003', 'Jack 3.5mm', 'Có'),
	('TS100', 'SP003', 'Wi-Fi', 'Wi-Fi 802.11 a/b/g/n/ac, dual-band'),
	('TS101', 'SP003', 'Bluetooth', 'v5.3, A2DP, LE'),
	('TS102', 'SP003', 'Định vị', 'GPS, GLONASS, GALILEO, BDS'),
	('TS103', 'SP003', 'NFC', 'Không'),
	('TS104', 'SP003', 'Radio', 'FM Radio'),
	('TS105', 'SP003', 'USB', 'USB Type-C 2.0'),
	('TS106', 'SP003', 'Cảm biến', 'Vân tay cạnh bên, gia tốc kế, la bàn'),
	('TS107', 'SP003', 'Cảm biến tiệm cận', 'Cảm biến tiệm cận ảo'),
	('TS108', 'SP003', 'Dung lượng pin', '5000 mAh (Li-Po)'),
	('TS109', 'SP003', 'Sạc', '18W có dây, hỗ trợ PD'),
	('TS110', 'SP004', 'Công nghệ mạng', 'GSM / HSPA / LTE / 5G'),
	('TS111', 'SP004', 'Ngày công bố', '2025, January'),
	('TS112', 'SP004', 'Tình trạng', 'Đã phát hành (2025, January 09)'),
	('TS113', 'SP004', 'Kích thước', '160.8 x 75.2 x 8.3 mm'),
	('TS114', 'SP004', 'Trọng lượng', '195 g hoặc 198 g'),
	('TS115', 'SP004', 'Chất liệu', 'Mặt kính Gorilla Glass 7i, mặt lưng nhựa hoặc da sinh học (tuỳ phiên bản)'),
	('TS116', 'SP004', 'SIM', 'Nano-SIM + Nano-SIM'),
	('TS117', 'SP004', 'Kháng bụi/nước', 'IP68/IP69 chống bụi và nước áp lực cao (1.5m trong 30 phút); 2m trong 48h (chỉ tại Ấn Độ)'),
	('TS118', 'SP004', 'Loại màn hình', 'AMOLED, 68 tỷ màu, 120Hz, 1920Hz PWM, Dolby Vision, HDR10+, 1400 nits (HBM), 3200 nits (đỉnh)'),
	('TS119', 'SP004', 'Kích thước màn hình', '6.67 inches (~88.8% diện tích hiển thị)'),
	('TS120', 'SP004', 'Độ phân giải', '1220 x 2712 pixels, tỷ lệ 20:9 (~446 ppi)'),
	('TS121', 'SP004', 'Kính bảo vệ', 'Corning Gorilla Glass 7i'),
	('TS122', 'SP004', 'Hệ điều hành', 'Android 15, HyperOS 2'),
	('TS123', 'SP004', 'Chipset', 'Mediatek Dimensity 8400 Ultra (4 nm)'),
	('TS124', 'SP004', 'CPU', 'Octa-core (1x3.25 GHz + 3x3.0 GHz + 4x2.1 GHz Cortex-A725)'),
	('TS125', 'SP004', 'GPU', 'Mali-G720 MC7'),
	('TS126', 'SP004', 'Khe cắm thẻ nhớ', 'Không'),
	('TS127', 'SP004', 'Bộ nhớ trong', '256GB 8GB RAM, 256GB 12GB RAM, 512GB 12GB RAM'),
	('TS128', 'SP004', 'Chuẩn bộ nhớ', 'UFS 4.0'),
	('TS129', 'SP004', 'Camera sau', '50 MP (f/1.5, PDAF, OIS) + 8 MP (ultrawide)'),
	('TS130', 'SP004', 'Tính năng camera sau', 'LED flash, HDR, panorama'),
	('TS131', 'SP004', 'Quay video (sau)', '4K@24/30/60fps, 1080p@30/60/120/240/960fps, HDR10+, gyro-EIS, OIS'),
	('TS132', 'SP004', 'Camera trước', '20 MP, f/2.2, 25mm (wide)'),
	('TS133', 'SP004', 'Quay video (trước)', '1080p@30fps'),
	('TS134', 'SP004', 'Loa ngoài', 'Có, loa kép stereo'),
	('TS135', 'SP004', 'Jack 3.5mm', 'Không'),
	('TS136', 'SP004', 'Âm thanh', '24-bit/192kHz Hi-Res & Hi-Res Wireless'),
	('TS137', 'SP004', 'Wi-Fi', 'Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct'),
	('TS138', 'SP004', 'Bluetooth', 'v5.4/v6.0, A2DP, LE, aptX HD'),
	('TS139', 'SP004', 'Định vị', 'GPS (L1+L5), GLONASS (G1), BDS (B1I+B1c+B2a), GALILEO (E1+E5a), NavIC (L5)'),
	('TS140', 'SP004', 'NFC', 'Có (tuỳ khu vực)'),
	('TS141', 'SP004', 'Cổng hồng ngoại', 'Có'),
	('TS142', 'SP004', 'Radio', 'Không'),
	('TS143', 'SP004', 'USB', 'USB Type-C 2.0, OTG'),
	('TS144', 'SP004', 'Cảm biến', 'Vân tay quang học dưới màn hình, gia tốc kế, con quay hồi chuyển, cảm biến tiệm cận, la bàn'),
	('TS145', 'SP004', 'Dung lượng pin', '6000 mAh (toàn cầu) / 6550 mAh (chỉ Ấn Độ)'),
	('TS146', 'SP004', 'Sạc', '90W có dây, PD3.0, QC3+, sạc đầy 100% trong 42 phút, hỗ trợ sạc ngược có dây'),
	('TS147', 'SP005', 'Công nghệ mạng', 'GSM / HSPA / LTE / 5G'),
	('TS148', 'SP005', 'Ngày ra mắt', 'Tháng 01/2025'),
	('TS149', 'SP005', 'Trạng thái', 'Đã ra mắt, 09/01/2025'),
	('TS150', 'SP005', 'Kích thước', '162.3 x 74.4 x 8.4 hoặc 8.6 mm'),
	('TS151', 'SP005', 'Trọng lượng', '185.3 g hoặc 190 g'),
	('TS152', 'SP005', 'Chất liệu', 'Mặt kính Gorilla Glass Victus 2, mặt lưng nhựa hoặc giả da (silicone polymer)'),
	('TS153', 'SP005', 'SIM', 'Nano-SIM + Nano-SIM + eSIM (tối đa 2 hoạt động cùng lúc)'),
	('TS154', 'SP005', 'Kháng nước & bụi', 'IP68 & IP69 (tuỳ thị trường)'),
	('TS155', 'SP005', 'Màn hình', 'AMOLED, 68 tỷ màu, 120Hz, PWM 1920Hz, Dolby Vision, HDR10+, 1200 nits (HBM), 3000 nits (peak), 6.67", 1220x2712px, 446ppi'),
	('TS156', 'SP005', 'Kính bảo vệ', 'Corning Gorilla Glass Victus 2, Mohs 5'),
	('TS157', 'SP005', 'Hệ điều hành', 'Android 14, HyperOS'),
	('TS158', 'SP005', 'Chip xử lý', 'MediaTek Dimensity 7300 Ultra (4nm)'),
	('TS159', 'SP005', 'CPU', '8 nhân (4x2.5 GHz Cortex-A78 & 4x2.0 GHz Cortex-A55)'),
	('TS160', 'SP005', 'GPU', 'Mali-G615 MC2'),
	('TS161', 'SP005', 'Thẻ nhớ', 'Không hỗ trợ'),
	('TS162', 'SP005', 'Bộ nhớ trong', '128GB 8GB RAM / 256GB 8GB RAM / 512GB 12GB RAM, UFS 2.2'),
	('TS163', 'SP005', 'Camera sau', '50MP (wide, OIS) + 8MP (ultrawide) + 2MP (macro), LED flash, HDR, Panorama, quay 4K@30fps, 1080p@120fps'),
	('TS164', 'SP005', 'Camera trước', '20MP (wide), quay 1080p@30/60fps'),
	('TS165', 'SP005', 'Loa', 'Có, loa kép'),
	('TS166', 'SP005', 'Jack 3.5mm', 'Không'),
	('TS167', 'SP005', 'Kết nối không dây', 'Wi-Fi 802.11 a/b/g/n/ac/6, Bluetooth 5.4, NFC (tuỳ thị trường), hồng ngoại'),
	('TS168', 'SP005', 'Định vị', 'GPS, GLONASS, BDS, GALILEO, QZSS'),
	('TS169', 'SP005', 'Cổng kết nối', 'USB Type-C 2.0, OTG'),
	('TS170', 'SP005', 'Cảm biến', 'Vân tay dưới màn hình (quang học), gia tốc, con quay, la bàn, tiệm cận'),
	('TS171', 'SP005', 'Pin', '5110 mAh (quốc tế) / 5500 mAh (Ấn Độ)'),
	('TS172', 'SP005', 'Sạc', '45W có dây, đầy 100% trong 52 phút'),
	('TS173', 'SP006', 'Kích thước', '251.22 x 173.42 x 6.18 mm'),
	('TS174', 'SP006', 'Trọng lượng', '500g'),
	('TS175', 'SP006', 'Vi xử lý', 'Snapdragon 7+ Gen 3, 4nm, 8 nhân, tối đa 2.8GHz, GPU Adreno'),
	('TS176', 'SP006', 'AI Engine', 'Qualcomm AI engine'),
	('TS177', 'SP006', 'RAM & ROM', '8GB+128GB / 8GB+256GB / 12GB+256GB, LPDDR5X + UFS 4.0 (trừ bản 128GB dùng UFS 3.1)'),
	('TS178', 'SP006', 'Màn hình', '11.2" IPS LCD, 3.2K (3200x2136), 345 ppi, 144Hz, 800 nits, HDR10, Dolby Vision, 68 tỷ màu, DCI-P3'),
	('TS179', 'SP006', 'Tính năng hiển thị', 'Chống chói, ánh sáng xanh thấp, Flicker-Free, Sunlight mode, Adaptive colors, AI image engine'),
	('TS180', 'SP006', 'Camera sau', '13MP, f/2.2, PDAF, quay 4K@30fps, 1080p@60fps'),
	('TS181', 'SP006', 'Camera trước', '8MP, f/2.2, quay 1080p@30fps'),
	('TS182', 'SP006', 'Chế độ camera', 'Photo, Video, Portrait, Document, Dual video, HDR, Teleprompter, Director mode'),
	('TS183', 'SP006', 'Pin', '8850mAh (typ)'),
	('TS184', 'SP006', 'Sạc', '45W Turbo Charge, hỗ trợ QC2.0/3.0/PD2.0/3.0/Mi FC2.0'),
	('TS185', 'SP006', 'Cổng kết nối', 'USB Type-C (USB 3.2 Gen 1, 5Gbps)'),
	('TS186', 'SP006', 'Kết nối không dây', 'Wi-Fi 6E, Bluetooth 5.4, Wi-Fi Direct, Miracast, AAC/LDAC/LHDC 5.0'),
	('TS187', 'SP006', 'Cảm biến', 'Gia tốc, con quay, ánh sáng (trước/sau), cảm biến rung, Hall, từ trường, tiệm cận, RGB LED, hồng ngoại'),
	('TS188', 'SP006', 'Hệ điều hành', 'HyperOS 2'),
	('TS189', 'SP006', 'Hộp sản phẩm', 'Máy tính bảng, Adapter, Cáp USB-C, HDSD, Thẻ bảo hành'),
	('TS190', 'SP007', 'Công nghệ mạng', 'GSM / HSPA / LTE'),
	('TS191', 'SP007', 'Kích thước', '254.6 x 166 x 7.4 mm'),
	('TS192', 'SP007', 'Khối lượng', '510 g hoặc 519 g'),
	('TS193', 'SP007', 'Chất liệu', 'Mặt kính, khung nhôm'),
	('TS194', 'SP007', 'SIM', 'Nano-SIM + Nano-SIM (chỉ bản có hỗ trợ LTE)'),
	('TS195', 'SP007', 'Bút cảm ứng', 'Hỗ trợ'),
	('TS196', 'SP007', 'Màn hình', 'IPS LCD, 1 tỷ màu, 90Hz, 600 nits (HBM), 11.0 inches, 1600 x 2560 pixels (~274 ppi)'),
	('TS197', 'SP007', 'Hệ điều hành', 'Android 15, HyperOS 2'),
	('TS198', 'SP007', 'Chip xử lý', 'Mediatek Helio G100 Ultra (6 nm), Octa-core (2x2.2 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)'),
	('TS199', 'SP007', 'GPU', 'Mali-G57 MC2'),
	('TS200', 'SP007', 'Thẻ nhớ', 'microSDXC (dùng chung khe SIM)'),
	('TS201', 'SP007', 'Bộ nhớ trong & RAM', '128GB 4GB RAM, 128GB 6GB RAM, 256GB 8GB RAM - UFS 2.2'),
	('TS202', 'SP007', 'Camera sau', '8 MP, f/2.0, HDR, quay phim 1080p@30fps'),
	('TS203', 'SP007', 'Camera trước', '5 MP, f/2.2, HDR, quay phim 1080p@30fps'),
	('TS204', 'SP007', 'Âm thanh', '4 loa stereo, Dolby Atmos, jack 3.5mm, Hi-Res audio 24-bit/192kHz'),
	('TS205', 'SP007', 'Kết nối không dây', 'Wi-Fi a/b/g/n/ac/ax, Bluetooth 5.3, GPS (cellular only)'),
	('TS206', 'SP007', 'Kết nối khác', 'USB Type-C, OTG'),
	('TS207', 'SP007', 'Cảm biến', 'Gia tốc, con quay hồi chuyển / la bàn (chỉ bản LTE)'),
	('TS208', 'SP007', 'Pin', 'Li-Po 9000 mAh, sạc nhanh 18W (PD2.0, QC2.0)'),
	('TS209', 'SP008', 'Công nghệ mạng', 'GSM / HSPA / LTE / 5G'),
	('TS210', 'SP008', 'Kích thước', '280 x 181.9 x 7.5 mm'),
	('TS211', 'SP008', 'Khối lượng', '568 g'),
	('TS212', 'SP008', 'Chất liệu', 'Kính trước (Gorilla Glass 3), khung và mặt sau bằng nhôm'),
	('TS213', 'SP008', 'SIM', 'Nano-SIM'),
	('TS214', 'SP008', 'Bút cảm ứng', 'Hỗ trợ (gắn từ tính)'),
	('TS215', 'SP008', 'Kháng nước nhẹ', 'Chống văng nước'),
	('TS216', 'SP008', 'Màn hình', 'IPS LCD, 68 tỷ màu, 120Hz, Dolby Vision, 600 nits (HBM), 12.1 inches, 1600 x 2560 pixels (~249 ppi), Gorilla Glass 3'),
	('TS217', 'SP008', 'Hệ điều hành', 'Android 14, HyperOS'),
	('TS218', 'SP008', 'Chip xử lý', 'Snapdragon 7s Gen 2 (4nm), Octa-core (4x2.4GHz Cortex-A78 & 4x1.95GHz Cortex-A55)'),
	('TS219', 'SP008', 'GPU', 'Adreno 710'),
	('TS220', 'SP008', 'Thẻ nhớ', 'microSDXC (khe riêng)'),
	('TS221', 'SP008', 'Bộ nhớ trong & RAM', '128GB 8GB RAM, 256GB 8GB RAM - UFS 2.2'),
	('TS222', 'SP008', 'Camera sau', '8 MP, f/2.0, LED flash, quay phim 1080p@30fps'),
	('TS223', 'SP008', 'Camera trước', '8 MP, f/2.3, quay phim 1080p@30fps'),
	('TS224', 'SP008', 'Âm thanh', '4 loa stereo, jack 3.5mm'),
	('TS225', 'SP008', 'Kết nối không dây', 'Wi-Fi a/b/g/n/a/6, Bluetooth 5.2, GPS'),
	('TS226', 'SP008', 'Kết nối khác', 'USB Type-C 2.0'),
	('TS227', 'SP008', 'Cảm biến', 'Gia tốc, con quay, cảm biến tiệm cận (phụ kiện), la bàn'),
	('TS228', 'SP008', 'Pin', '10000 mAh, sạc nhanh 33W (PD3.0, QC3+)'),
	('TS229', 'SP009', 'Công nghệ mạng', 'GSM / HSPA / LTE'),
	('TS230', 'SP009', 'Kích thước', '211.6 x 125.5 x 8.8 mm'),
	('TS231', 'SP009', 'Khối lượng', '370 / 373 / 375 g'),
	('TS232', 'SP009', 'Chất liệu', 'Mặt kính Gorilla Glass 3'),
	('TS233', 'SP009', 'SIM', 'Nano-SIM + Nano-SIM (chỉ bản LTE)'),
	('TS234', 'SP009', 'Kháng nước/bụi', 'IP53 - chống bụi và tia nước nhẹ dọc'),
	('TS235', 'SP009', 'Màn hình', 'IPS LCD, 1 tỷ màu, 90Hz, 600 nits (HBM), 8.7", 800 x 1340 pixels (~179 ppi), Gorilla Glass 3'),
	('TS236', 'SP009', 'Hệ điều hành', 'Android 14, HyperOS'),
	('TS237', 'SP009', 'Chip xử lý', 'Mediatek Helio G85 (12nm), Octa-core (2x2.0GHz Cortex-A75 & 6x1.8GHz Cortex-A55)'),
	('TS238', 'SP009', 'GPU', 'Mali-G52 MC2'),
	('TS239', 'SP009', 'Thẻ nhớ', 'microSDXC (khe riêng)'),
	('TS240', 'SP009', 'Bộ nhớ trong & RAM', '64GB 4GB RAM, 128GB 4GB RAM, 128GB 6GB RAM - eMMC 5.1'),
	('TS241', 'SP009', 'Camera sau', '8 MP, f/2.0, LED flash, quay 1080p@30fps'),
	('TS242', 'SP009', 'Camera trước', '5 MP, f/2.2, quay 1080p@30fps'),
	('TS243', 'SP009', 'Âm thanh', '2 loa stereo, jack 3.5mm'),
	('TS244', 'SP009', 'Kết nối không dây', 'Wi-Fi a/b/g/n/ac dual-band, Bluetooth 5.3, GPS (bản LTE)'),
	('TS245', 'SP009', 'Kết nối khác', 'USB Type-C 2.0, cổng hồng ngoại, FM Radio'),
	('TS246', 'SP009', 'Cảm biến', 'Gia tốc, tiệm cận (phụ kiện), la bàn, cảm biến tiệm cận ảo'),
	('TS247', 'SP009', 'Pin', '6650 mAh, sạc 18W (quốc tế), 10W (Ấn Độ)'),
	('TS248', 'SP010', 'Công nghệ mạng', 'Không hỗ trợ kết nối di động'),
	('TS249', 'SP010', 'Kích thước', '251.2 x 173.4 x 6.2 mm'),
	('TS250', 'SP010', 'Khối lượng', '500 g'),
	('TS251', 'SP010', 'Chất liệu', 'Kính trước, khung và mặt sau bằng nhôm'),
	('TS252', 'SP010', 'SIM', 'Không hỗ trợ'),
	('TS253', 'SP010', 'Bút cảm ứng', 'Hỗ trợ gắn từ tính'),
	('TS254', 'SP010', 'Màn hình', 'IPS LCD, 68 tỷ màu, 144Hz, HDR10, Dolby Vision, 800 nits, 11.2", 2136 x 3200 pixels (~345 ppi), 3:2'),
	('TS255', 'SP010', 'Hệ điều hành', 'Android 15, HyperOS 2'),
	('TS256', 'SP010', 'Chip xử lý', 'Snapdragon 8s Gen 3 (4nm), Octa-core (1x3.0GHz Cortex-X4 & 4x2.8GHz Cortex-A720 & 3x2.0GHz Cortex-A520)'),
	('TS257', 'SP010', 'GPU', 'Adreno 735'),
	('TS258', 'SP010', 'Thẻ nhớ', 'Không hỗ trợ'),
	('TS259', 'SP010', 'Bộ nhớ trong & RAM', '128GB 8GB, 256GB 8GB/12GB, 512GB 12GB - UFS 3.1 (128GB), UFS 4.0'),
	('TS260', 'SP010', 'Camera sau', '50 MP f/1.8 + 2 MP đo chiều sâu, LED flash, HDR, panorama, quay 4K@30/60fps'),
	('TS261', 'SP010', 'Camera trước', '20 MP, f/2.2, góc siêu rộng, HDR, quay 1080p@30fps'),
	('TS262', 'SP010', 'Âm thanh', '4 loa stereo, không có jack 3.5mm, Hi-Res & Hi-Res Wireless 24-bit/192kHz'),
	('TS263', 'SP010', 'Kết nối không dây', 'Wi-Fi a/b/g/n/ac/6e/7, Bluetooth 5.4, không định vị'),
	('TS264', 'SP010', 'Kết nối khác', 'USB Type-C 3.2, cổng phụ kiện, cổng hồng ngoại'),
	('TS265', 'SP010', 'Cảm biến', 'Vân tay cạnh bên, gia tốc, con quay, tiệm cận, la bàn'),
	('TS266', 'SP010', 'Pin', '8850 mAh, sạc nhanh 67W (PD3.0, QC3+), 40% trong 20 phút'),
	('TS267', 'SP011', 'Loại màn hình', 'QLED'),
	('TS268', 'SP011', 'Độ phân giải', '4K (3840 × 2160), DCI-P3 94%, 1.07 tỷ màu, HDR10+, HLG, Filmmaker Mode'),
	('TS269', 'SP011', 'Tốc độ làm tươi', '60Hz (hỗ trợ MEMC 4K 60Hz)'),
	('TS270', 'SP011', 'Góc nhìn', '178° (ngang/dọc)'),
	('TS271', 'SP011', 'Âm thanh', '2 loa 10W, Dolby Audio, DTS-X, DTS-Virtual'),
	('TS272', 'SP011', 'Hệ điều hành', 'Google TV™'),
	('TS273', 'SP011', 'Bộ xử lý', 'CPU: Quad Cortex A55, GPU: Mali-G52 MC1, RAM: 2GB, ROM: 8GB'),
	('TS274', 'SP011', 'Hỗ trợ thông minh', 'Google Assistant, Google Cast, Miracast, Apple AirPlay'),
	('TS275', 'SP011', 'Kích thước', '75", không viền, màu xám đậm'),
	('TS276', 'SP011', 'Chất liệu', 'Khung kim loại, chân đế nhựa + kim loại, hỗ trợ treo tường 400x300mm'),
	('TS277', 'SP011', 'Kết nối', 'Bluetooth 5.0, Wi-Fi 2.4GHz/5GHz, HDMI x3 (HDMI2 hỗ trợ eARC, ALLM), USB 2.0 x1, LAN, Optical, CI+ Slot'),
	('TS278', 'SP011', 'Truyền hình', 'DVB-T2+C / DVB-S2 (tùy thị trường)'),
	('TS279', 'SP011', 'Nguồn điện', '210W, 200-240V~ 50/60Hz'),
	('TS280', 'SP011', 'Môi trường hoạt động', '0°C–40°C (hoạt động), -15°C–45°C (lưu trữ), độ ẩm <80%'),
	('TS281', 'SP011', 'Kích thước & trọng lượng', '1668×391×1027mm (có chân), 1668×76×959mm (không chân), trọng lượng: 18.7–29.2kg'),
	('TS282', 'SP011', 'Phụ kiện đi kèm', 'Remote Bluetooth, bộ chân đế, dây nguồn, hướng dẫn, bộ vít'),
	('TS283', 'SP012', 'Display - Resolution', '4K, 3840 × 2160'),
	('TS284', 'SP012', 'Display - Color depth', '1.07 billion'),
	('TS285', 'SP012', 'Display - Refresh rate', '60Hz'),
	('TS286', 'SP012', 'Display - MEMC', '4K 60Hz'),
	('TS287', 'SP012', 'Display - Viewing angle', '178°(H)/ 178°(V)'),
	('TS288', 'SP012', 'Display - HDR', 'HDR10, HLG, Filmmaker'),
	('TS289', 'SP012', 'Speaker - Power', '2 x 10W'),
	('TS290', 'SP012', 'Speaker - Features', 'Dolby Audio, DTS-X, DTS-Virtual'),
	('TS291', 'SP012', 'Operating System', 'Google TV™'),
	('TS292', 'SP012', 'Platform - CPU', 'Quad cortex A55'),
	('TS293', 'SP012', 'Platform - GPU', 'Mali-G52 MC1'),
	('TS294', 'SP012', 'Platform - RAM', '2GB'),
	('TS295', 'SP012', 'Platform - ROM', '8GB'),
	('TS296', 'SP012', 'Smart Home - Assistant', 'Google Assistant built-in'),
	('TS297', 'SP012', 'Smart Home - Google Cast', 'Supported'),
	('TS298', 'SP012', 'Smart Home - Miracast', 'Supported'),
	('TS299', 'SP012', 'Smart Home - Apple AirPlay', 'Supported'),
	('TS300', 'SP012', 'Design - Size', '55”, Bezel-less, Black'),
	('TS301', 'SP012', 'Design - Stand', 'Double, Plastic'),
	('TS302', 'SP012', 'Design - Frame', 'Metal'),
	('TS303', 'SP012', 'Power Button', 'Yes'),
	('TS304', 'SP012', 'Dimensions (with base)', '1226*312*770mm'),
	('TS305', 'SP012', 'Dimensions (no base)', '1226*76*711mm'),
	('TS306', 'SP012', 'Packing size', '1385*135*830mm'),
	('TS307', 'SP012', 'Base width', '1100mm'),
	('TS308', 'SP012', 'Base thickness', '312mm'),
	('TS309', 'SP012', 'Weight (with base)', '9.2kg'),
	('TS310', 'SP012', 'Weight (no base)', '9.1kg'),
	('TS311', 'SP012', 'Packing weight', '13kg'),
	('TS312', 'SP012', 'Wall mount size', '200*300mm'),
	('TS313', 'SP012', 'Connectivity - Bluetooth', 'Bluetooth® 5.0'),
	('TS314', 'SP012', 'Connectivity - WiFi', 'Dual-band 2.4GHz/5GHz'),
	('TS315', 'SP012', 'Connectivity - HDMI', '3x HDMI, HDMI2 supports eARC ALLM'),
	('TS316', 'SP012', 'Connectivity - USB', 'USB2.0 x 1'),
	('TS317', 'SP012', 'Connectivity - Ethernet', 'Yes'),
	('TS318', 'SP012', 'Connectivity - Optical', 'Yes'),
	('TS319', 'SP012', 'Connectivity - CI+ Slot', 'Yes'),
	('TS320', 'SP012', 'Broadcasting system', 'DVB-T2+C/DVB-S2'),
	('TS321', 'SP012', 'Power', '110W'),
	('TS322', 'SP012', 'Voltage', '200-240V～50/60Hz'),
	('TS323', 'SP012', 'Operating temperature', '0°C to 40°C'),
	('TS324', 'SP012', 'Storage temperature', '-15°C to 45°C'),
	('TS325', 'SP012', 'Humidity', '20% to 80% (Relative <80%)'),
	('TS326', 'SP012', 'Standby Power', '≤0.5W'),
	('TS327', 'SP012', 'Package contents', 'Display, Remote, Power cable, Stand, Screws, Manual'),
	('TS328', 'SP013', 'Display Type', 'QLED'),
	('TS329', 'SP013', 'Resolution', '4K, 3840 × 2160'),
	('TS330', 'SP013', 'Color gamut', 'DCI-P3 94% (Typ.)'),
	('TS331', 'SP013', 'Color depth', '1.07 billion'),
	('TS332', 'SP013', 'Refresh rate', '60Hz'),
	('TS333', 'SP013', 'MEMC', '4K 60Hz'),
	('TS334', 'SP013', 'Viewing angle', '178°(H)/ 178°(V)'),
	('TS335', 'SP013', 'HDR', 'HDR10+, HLG, Filmmaker'),
	('TS336', 'SP013', 'Speaker', '2 x 10W'),
	('TS337', 'SP013', 'Audio Tech', 'Dolby Audio, DTS-X, DTS-Virtual'),
	('TS338', 'SP013', 'Operating System', 'Google TV™'),
	('TS339', 'SP013', 'CPU', 'Quad cortex A55'),
	('TS340', 'SP013', 'GPU', 'Mali-G52 MC1'),
	('TS341', 'SP013', 'RAM', '2GB'),
	('TS342', 'SP013', 'ROM', '8GB'),
	('TS343', 'SP013', 'Google Assistant', 'Built-in'),
	('TS344', 'SP013', 'Google Cast', 'Supported'),
	('TS345', 'SP013', 'Miracast', 'Supported'),
	('TS346', 'SP013', 'Apple AirPlay', 'Supported'),
	('TS347', 'SP013', 'Size', '55”'),
	('TS348', 'SP013', 'Design', 'Limitless display with bezel-less design'),
	('TS349', 'SP013', 'Color', 'Dark Gray'),
	('TS350', 'SP013', 'Stand', 'Double'),
	('TS351', 'SP013', 'Power button', 'Yes'),
	('TS352', 'SP013', 'Dimensions with base', '1226 × 312 × 770 mm'),
	('TS353', 'SP013', 'Dimensions without base', '1226 × 76 × 711 mm'),
	('TS354', 'SP013', 'Packing size', '1385 × 135 × 830 mm'),
	('TS355', 'SP013', 'Base width', '1100 mm'),
	('TS356', 'SP013', 'Base thickness', '312 mm'),
	('TS357', 'SP013', 'Weight with base', '9.2 kg'),
	('TS358', 'SP013', 'Weight without base', '9.1 kg'),
	('TS359', 'SP013', 'Packing weight', '13 kg'),
	('TS360', 'SP013', 'Frame Material', 'Metal'),
	('TS361', 'SP013', 'Stand Material', 'Plastic'),
	('TS362', 'SP013', 'Wall Mount', '200 × 300 mm'),
	('TS363', 'SP013', 'Bluetooth', 'Bluetooth 5.0'),
	('TS364', 'SP013', 'Wi-Fi', 'Dual-band 2.4GHz/5GHz'),
	('TS365', 'SP013', 'HDMI', '3 x HDMI (HDMI 2 supports eARC ALLM)'),
	('TS366', 'SP013', 'USB', 'USB 2.0 x 1'),
	('TS367', 'SP013', 'Ethernet', 'Yes'),
	('TS368', 'SP013', 'Optical Digital Audio Out', 'Yes'),
	('TS369', 'SP013', 'CI+ Slot', 'Yes'),
	('TS370', 'SP013', 'Broadcasting system', 'DVB-T2+C / DVB-S2'),
	('TS371', 'SP013', 'Power', '130W'),
	('TS372', 'SP013', 'Voltage', '200–240V ~ 50/60Hz'),
	('TS373', 'SP013', 'Operating temperature', '0°C to 40°C'),
	('TS374', 'SP013', 'Storage temperature', '-15°C to 45°C'),
	('TS375', 'SP013', 'Humidity', '20% to 80%'),
	('TS376', 'SP013', 'Relative humidity', '<80%'),
	('TS377', 'SP013', 'Standby power', '≤0.5W'),
	('TS378', 'SP014', 'Display', '4K, 3840 × 2160'),
	('TS379', 'SP014', 'Color depth', '1.07 billion'),
	('TS380', 'SP014', 'Refresh rate', '60Hz'),
	('TS381', 'SP014', 'MEMC', '4K 60Hz'),
	('TS382', 'SP014', 'Viewing angle', '178°(H)/ 178°(V)'),
	('TS383', 'SP014', 'HDR', 'HDR10, HLG, Filmmaker'),
	('TS384', 'SP014', 'Speaker', '2 x 10W, Dolby Audio, DTS-X, DTS-Virtual'),
	('TS385', 'SP014', 'Operating System', 'Google TV™'),
	('TS386', 'SP014', 'CPU', 'Quad cortex A55'),
	('TS387', 'SP014', 'GPU', 'Mali-G52 MC1'),
	('TS388', 'SP014', 'RAM', '2GB'),
	('TS389', 'SP014', 'ROM', '8GB'),
	('TS390', 'SP014', 'Google Assistant', 'Built-in'),
	('TS391', 'SP014', 'Google Cast', 'Works with Google Cast'),
	('TS392', 'SP014', 'Miracast', 'Supported'),
	('TS393', 'SP014', 'Apple AirPlay', 'Supported'),
	('TS394', 'SP014', 'Size', '43”'),
	('TS395', 'SP014', 'Design', 'Limitless display with bezel-less design'),
	('TS396', 'SP014', 'Color', 'Black'),
	('TS397', 'SP014', 'Stand', 'Double'),
	('TS398', 'SP014', 'Power button', 'Yes'),
	('TS399', 'SP014', 'Dimensions with base', '957*211*599mm'),
	('TS400', 'SP014', 'Dimensions without base', '957*72*563mm'),
	('TS401', 'SP014', 'Packing size', '1076*114*645mm'),
	('TS402', 'SP014', 'Base width', '846mm'),
	('TS403', 'SP014', 'Base thickness', '210mm'),
	('TS404', 'SP014', 'Weight with base', '6kg'),
	('TS405', 'SP014', 'Weight without base', '5.9kg'),
	('TS406', 'SP014', 'Packing weight', '8.2kg'),
	('TS407', 'SP014', 'Frame material', 'Metal'),
	('TS408', 'SP014', 'Stand material', 'Plastic'),
	('TS409', 'SP014', 'Wall mount', '100*200mm'),
	('TS410', 'SP014', 'Bluetooth', 'Bluetooth® 5.0'),
	('TS411', 'SP014', 'Wi-Fi', 'Dual-band 2.4GHz/5GHz'),
	('TS412', 'SP014', 'HDMI', '3 ports, HDMI 2 supports eARC ALLM'),
	('TS413', 'SP014', 'USB', 'USB2.0 x 1'),
	('TS414', 'SP014', 'Ethernet (LAN)', 'Yes'),
	('TS415', 'SP014', 'Optical Digital Audio Out', 'Yes'),
	('TS416', 'SP014', 'CI+ Slot', 'Yes (Vary by markets)'),
	('TS417', 'SP014', 'Broadcasting system', 'DVB-T2+C/DVB-S2 (Vary by markets)'),
	('TS418', 'SP014', 'Power consumption', '75W'),
	('TS419', 'SP014', 'Voltage', '200-240V～50/60Hz'),
	('TS420', 'SP014', 'Operating temperature', '0°C to 40°C'),
	('TS421', 'SP014', 'Storage temperature', '-15°C to 45°C'),
	('TS422', 'SP014', 'Humidity', '20% to 80%'),
	('TS423', 'SP014', 'Relative humidity', '<80%'),
	('TS424', 'SP014', 'Standby power', '≤0.5W'),
	('TS425', 'SP014', 'Package contents', 'Display, Power cable, Safety and installation instructions, Base components, Screw kit, Bluetooth Remote control'),
	('TS426', 'SP015', 'Weight including base', '13kg'),
	('TS427', 'SP015', 'Weight not including base', '12.7kg'),
	('TS428', 'SP015', 'Packing weight', '19.9kg'),
	('TS429', 'SP015', 'Frame Material', 'Metal'),
	('TS430', 'SP015', 'Stand Material', 'Plastic'),
	('TS431', 'SP015', 'Wall mount', '300*300mm'),
	('TS432', 'SP015', 'Bluetooth', '5.0'),
	('TS433', 'SP015', 'Wi-Fi', 'Dual-band 2.4GHz/5GHz'),
	('TS434', 'SP015', 'HDMI', 'x3, HDMI 2 supports eARC ALLM'),
	('TS435', 'SP015', 'USB', 'USB2.0 x 1'),
	('TS436', 'SP015', 'Ethernet (LAN)', 'Yes'),
	('TS437', 'SP015', 'Optical Digital Audio Out', 'Yes'),
	('TS438', 'SP015', 'CI+ Slot', 'Yes'),
	('TS439', 'SP015', 'Broadcasting system', 'DVB-T2+C/DVB-S2'),
	('TS440', 'SP015', 'Power', '180W'),
	('TS441', 'SP015', 'Voltage', '200-240V～50/60Hz'),
	('TS442', 'SP015', 'Operating temperature', '0°C to 40°C'),
	('TS443', 'SP015', 'Storage temperature', '-15°C to 45°C'),
	('TS444', 'SP015', 'Humidity', '20% to 80%'),
	('TS445', 'SP015', 'Relative humidity', '<80%'),
	('TS446', 'SP015', 'Standby power', '≤0.5W'),
	('TS447', 'SP015', 'Package contents', 'Display × 1, Power cable × 1, Safety and installation instructions × 1, Base components × 2, Screw kit × 1, Bluetooth Remote control × 1');


		
	-- SELECT * FROM ThongSoKyThuat WHERE MaSP = 'SP001';

	-- INSERT INTO BienTheSP
	INSERT INTO BienTheSP(MaBienThe, MaSP, MauSac, MaMau, HinhAnhBienThe) VALUES
	('BT001', 'SP001', 'Xanh đại dương', 'blue-300', 'images/store/product/phones/9aa5eec49ebaa3180422d19d6e1b2a6f.png'), 
	('BT002', 'SP001', 'Hồng', 'pink-300', 'images/store/product/phones/d67813f8e94be619551025e86a836fcc.png'),
	('BT003', 'SP001', 'Đen', 'black', 'images/store/product/phones/79a5f76120bcf7041e869b13cdcb2403.png'),
	('BT004', 'SP002', 'Đen Bán Dạ', 'black', 'images/store/product/phones/19d04d2b631c64cbc8e7c5b369ccba41.png'), 
	('BT005', 'SP002', 'Tím Sương Mai', 'purple-400', 'images/store/product/phones/915921eabfdf563afdd9716ae7df2ac9.png'),
	('BT006', 'SP002', 'Xanh Lime', 'green-200', 'images/store/product/phones/893909bd29c5ce2d4c65a505da039526.png'),
	('BT007', 'SP003', 'Bạc', 'gray-400', 'images/store/product/phones/5e72ca8bf77881ff122631710700881b.png'), 
	('BT008', 'SP003', 'Đen', 'black', 'images/store/product/phones/4a26c98f2609f582f5a9e7e06a25c7ee.png'),
	('BT009', 'SP003', 'Tim', 'purple-400', 'images/store/product/phones/9db9196483b73d98356987bb0e634f1e.png'),
	('BT010', 'SP004', 'Đen', 'black', 'images/store/product/phones/481953f925f04cc921fe7b6f08f68496.png'), 
	('BT011', 'SP004', 'Xanh', 'green-300', 'images/store/product/phones/6871d3c58f0653f57e84c365588bb219.png'),
	('BT012', 'SP004', 'Vàng', 'yellow-400', 'images/store/product/phones/d488cf3d2a9b0566e48f55b75bbcb4d5.png'),
	('BT013', 'SP005', 'Đen', 'black', 'images/store/product/phones/8fcc3ea4696e3c1e84bee4dc12009b9d.png'), 
	('BT014', 'SP005', 'Bạc', 'gray-500', 'images/store/product/phones/8aa20d3668899cb71dab53c1f6e2a966.png'),
	('BT015', 'SP005', 'Xanh lá', 'green-300', 'images/store/product/phones/62dcde6cdb6feba4e30aeccc4590b2cb.png'),
	('BT016', 'SP006', 'Xanh Lime', 'green-300', 'images/store/product/tablets/6aa564efbe580dcc01fe6c92dc145d4a.png'), 
	('BT017', 'SP006', 'Xanh Dương', 'blue-500', 'images/store/product/tablets/db8def821e711e38b0069a915d210a54.png'),
	('BT018', 'SP006', 'Xám', 'gray-500', 'images/store/product/tablets/4f71d5b7c995c36c1ffbb0be6af845fb.png'),
	('BT019', 'SP007', 'Xám Khoáng Thạch', 'gray-500', 'images/store/product/tablets/bae74549d3ec41a0601cb9bbc03fdb10.png'), 
	('BT020', 'SP007', 'Tím Oải Hương', 'purple-500', 'images/store/product/tablets/ccd684b835853545488e3050e69497f5.png'),
	('BT021', 'SP007', 'Xanh Bạc Hà', 'blue-100', 'images/store/product/tablets/659de1a0ab4f5496029e6800af9d1ee0.png'),
	('BT022', 'SP008', 'Đen', 'black', 'images/store/product/tablets/734a1e3903338c421e59cd0db8ab8cc7.png'), 
	('BT023', 'SP008', 'Xám', 'gray-500', 'images/store/product/tablets/1ecd42e16999a7cc4624c2eca996fdf5.png'),
	('BT024', 'SP008', 'Xám', 'gray-500', 'images/store/product/tablets/1ecd42e16999a7cc4624c2eca996fdf5.png'),
	('BT025', 'SP009', 'Xám Khoáng Thạch', 'gray-500', 'images/store/product/tablets/71a3a3c73c3f895604ecb51155e58402.png'), 
	('BT026', 'SP009', 'Xám Thiên Thanh', 'gray-200', 'images/store/product/tablets/e9c41dccc06a35bdd7598f9266bf4303.png'),
	('BT027', 'SP009', 'Xanh Cực Quang', 'green-200', 'images/store/product/tablets/b9020ed46accf4d6ca81e2f1cd5dffc3.png'),
	('BT028', 'SP010', 'Xám Lá', 'green-300', 'images/store/product/tablets/db1970a832993e7bf990057203d710be.png'), 
	('BT029', 'SP010', 'Xám Dương', 'blue-500', 'images/store/product/tablets/8fedb6a922173c10032d81fd2c39c2a0.png'),
	('BT030', 'SP010', 'Xám', 'gray-400', 'images/store/product/tablets/a2b47d9558c06bd1afba2568d5530af0.png'),
    ('BT031', 'SP011', 'Basic', 'black', 'images/store/product/smart-tv/228778f8be1ac898c4be2bb46a9db48d.png'),
    ('BT032', 'SP012', 'Basic', 'black', 'images/store/product/smart-tv/0855ad99a0dd17cd9670236fec78f53a.png'),
    ('BT033', 'SP013', 'Basic', 'black', 'images/store/product/smart-tv/da35027188dfa19c756543f1fd261c54.png'),
    ('BT034', 'SP014', 'Basic', 'black', 'images/store/product/smart-tv/fa08f759edabb59aad06e598641692a0.png'),
    ('BT035', 'SP015', 'Basic', 'black', 'images/store/product/smart-tv/969d61354dcc7913afbae2610f656733.png');


	-- INSERT INTO  DungLuongSP
	INSERT INTO DungLuongSP (MaDLSP, MaSP, MaBienThe, TenDLSP, SoLuong) VALUES 
	('DLSP001', 'SP001', 'BT001', '6GB + 128GB', 100),
	('DLSP002', 'SP001', 'BT001', '8GB + 128GB', 100),
	('DLSP003', 'SP001', 'BT002', '6GB + 128GB', 100),
	('DLSP004', 'SP001', 'BT002', '8GB + 128GB', 100),
	('DLSP005', 'SP001', 'BT003', '6GB + 128GB', 100),
	('DLSP006', 'SP001', 'BT003', '8GB + 128GB', 100),
	('DLSP007', 'SP002', 'BT004', '6GB + 128GB', 100),
	('DLSP008', 'SP002', 'BT004', '8GB + 128GB', 100),
	('DLSP009', 'SP002', 'BT005', '6GB + 128GB', 100),
	('DLSP010', 'SP002', 'BT005', '8GB + 128GB', 100),
	('DLSP011', 'SP002', 'BT006', '6GB + 128GB', 100),
	('DLSP012', 'SP002', 'BT006', '8GB + 128GB', 100),
	('DLSP013', 'SP003', 'BT007', '6GB + 128GB', 100),
	('DLSP014', 'SP003', 'BT007', '8GB + 128GB', 100),
	('DLSP015', 'SP003', 'BT008', '6GB + 128GB', 100),
	('DLSP016', 'SP003', 'BT008', '8GB + 128GB', 100),
	('DLSP017', 'SP003', 'BT009', '6GB + 128GB', 100),
	('DLSP018', 'SP003', 'BT009', '8GB + 128GB', 100),
	('DLSP019', 'SP004', 'BT010', '6GB + 128GB', 100),
	('DLSP020', 'SP004', 'BT010', '8GB + 128GB', 100),
	('DLSP021', 'SP004', 'BT011', '6GB + 128GB', 100),
	('DLSP022', 'SP004', 'BT011', '8GB + 128GB', 100),
	('DLSP023', 'SP004', 'BT012', '6GB + 128GB', 100),
	('DLSP024', 'SP004', 'BT012', '8GB + 128GB', 100),
	('DLSP025', 'SP005', 'BT013', '6GB + 128GB', 100),
	('DLSP026', 'SP005', 'BT013', '8GB + 128GB', 100),
	('DLSP027', 'SP005', 'BT014', '6GB + 128GB', 100),
	('DLSP028', 'SP005', 'BT014', '8GB + 128GB', 100),
	('DLSP029', 'SP005', 'BT015', '6GB + 128GB', 100),
	('DLSP030', 'SP005', 'BT015', '8GB + 128GB', 100),
	('DLSP031', 'SP006', 'BT016', '6GB + 128GB', 100),
	('DLSP032', 'SP006', 'BT016', '8GB + 128GB', 100),
	('DLSP033', 'SP006', 'BT017', '6GB + 128GB', 100),
	('DLSP034', 'SP006', 'BT017', '8GB + 128GB', 100),
	('DLSP035', 'SP006', 'BT018', '6GB + 128GB', 100),
	('DLSP036', 'SP006', 'BT018', '8GB + 128GB', 100),
	('DLSP037', 'SP007', 'BT019', '6GB + 128GB', 100),
	('DLSP038', 'SP007', 'BT019', '8GB + 128GB', 100),
	('DLSP039', 'SP007', 'BT020', '6GB + 128GB', 100),
	('DLSP040', 'SP007', 'BT020', '8GB + 128GB', 100),
	('DLSP041', 'SP007', 'BT021', '6GB + 128GB', 100),
	('DLSP042', 'SP007', 'BT021', '8GB + 128GB', 100),
	('DLSP043', 'SP008', 'BT022', '6GB + 128GB', 100),
	('DLSP044', 'SP008', 'BT022', '8GB + 128GB', 100),
	('DLSP045', 'SP008', 'BT023', '6GB + 128GB', 100),
	('DLSP046', 'SP008', 'BT023', '8GB + 128GB', 100),
	('DLSP047', 'SP008', 'BT024', '6GB + 128GB', 100),
	('DLSP048', 'SP008', 'BT024', '8GB + 128GB', 100),
	('DLSP049', 'SP009', 'BT025', '6GB + 128GB', 100),
	('DLSP050', 'SP009', 'BT025', '8GB + 128GB', 100),
	('DLSP051', 'SP009', 'BT026', '6GB + 128GB', 100),
	('DLSP052', 'SP009', 'BT026', '8GB + 128GB', 100),
	('DLSP053', 'SP009', 'BT027', '6GB + 128GB', 100),
	('DLSP054', 'SP009', 'BT027', '8GB + 128GB', 100),
	('DLSP055', 'SP010', 'BT028', '6GB + 128GB', 100),
	('DLSP056', 'SP010', 'BT028', '8GB + 128GB', 100),
	('DLSP057', 'SP010', 'BT029', '6GB + 128GB', 100),
	('DLSP058', 'SP010', 'BT029', '8GB + 128GB', 100),
	('DLSP059', 'SP010', 'BT030', '6GB + 128GB', 100),
	('DLSP060', 'SP010', 'BT030', '8GB + 128GB', 100),
    ('DLSP061', 'SP011', 'BT031', '65 Inch', 100),
    ('DLSP062', 'SP012', 'BT032', '55 Inch', 100),
	('DLSP063', 'SP013', 'BT033', '55 Inch', 100),
    ('DLSP064', 'SP014', 'BT034', '43 Inch', 100),
    ('DLSP065', 'SP015', 'BT035', '65 Inch', 100);

-- INSERT INTO Account
INSERT INTO Account (MaTK, Email, Password, Role)
VALUES
('TK001', 'Huy11042k4@gmail.com', '$2b$12$XCA4KZS/sE5axsAVWlzMVOa6F2.Z5MI.tuQl8JT2RedWeb7KB8li.', 'Admin'),
('TK002', 'Huy11042k4@gmail.cob', '$2b$12$6C1eKxwNxfw5AFtzgY0Q5O3/lYuw0mxcWZuE5HKwv2tw4LH8prCNC', 'User'),
('TK003', 'vana@gmail.com', '$2b$12$Q8qziL/5bqQTFJADryS/nuc4XsP7MLw3JSiuegpZO.713B8egOtN2', 'User'),
('TK004', 'tranb@gmail.com', '$2b$12$a/05tbKx9EQu6VOlJTRcKeXUtjpnTE4gWW4aTe1.h/2lzcDWvE9oy', 'User'),
('TK005', 'lecuong@gmail.com', '$2b$12$VwbOw5l2XPMvdgqAd0ZrWOk26CsLzxqCgDXVZ1I9kpDiwGik4bDUi', 'User'),
('TK006', 'phamduyen@gmail.com', '$2b$12$d.H789D45jzBs9BufMSqjOT13buyAfvKFs7fTQr7XW6mY7jAdz2nm', 'User'),
('TK007', 'vulong@gmail.com', '$2b$12$DWVSv6f3YMN0ec6aDWwN1ueMqa2SZXefDfXtqaN65xT9vtK1rOwoy', 'User'),
('TK008', 'namdin@gmail.com', '$2b$12$NxICtmlpKIvyydMhZbwCu.or8yZ81OE2bFDoGA8l..gI9wu.HpeEm', 'User'),
('TK009', 'maimai@gmail.com', '$2b$12$Uu03XK16Nd9us75889sGpOv/wJTFH44QePauz3IOd6cYWadn5UN0G', 'User'),
('TK010', 'hunghan@gmail.com', '$2b$12$7CPrpMV5on9KZaSOk/BpzuNETlrUEsXZXmYs533yZScQHwyLJivOm', 'User');



-- INSERT INTO KhachHang
INSERT INTO KhachHang (MaKH, MaTK, TenKH, Email, SDT, NgaySinh, TrangThaiKH)
VALUES
('KH001', 'TK001', 'Trần Nhật Huy', 'Huy11042k4@gmail.com', '0909123456', '1995-05-12', 'Hoạt động'),
('KH002', 'TK002', 'Trần Nhật Huy', 'Huy11042k4@gmail.cob', '0909123456', '1995-05-12', 'Không hoạt động'),
('KH003', 'TK003', 'Nguyễn Văn A', 'vana@gmail.com', '0909123456', '1995-05-12', 'Hoạt động'),
('KH004', 'TK004', 'Trần Thị B', 'tranb@gmail.com', '0909345678', '1998-07-20', 'Hoạt động'),
('KH005', 'TK005', 'Lê Cường', 'lecuong@gmail.com', '0909456123', '2000-10-01', 'Bị khoá'),
('KH006', 'TK006', 'Phạm Duyên', 'phamduyen@gmail.com', '0909988776', '1993-02-18', 'Hoạt động'),
('KH007', 'TK007', 'Vũ Minh Long', 'vulong@gmail.com', '0933456789', '1992-11-03', 'Bị khoá'),  
('KH008', 'TK008', 'Đinh Hoàng Nam', 'namdin@gmail.com', '0901112233', '1997-06-30', 'Hoạt động'),
('KH009', 'TK009', 'Hoàng Thị Mai', 'maimai@gmail.com', '0988765432', '1990-03-28', 'Không hoạt động'),
('KH010', 'TK010', 'Phan Văn Hùng', 'hunghan@gmail.com', '0977554433', '1988-09-10', 'Hoạt động');


-- INSERT INTO DiaChiKH
INSERT INTO DiaChiKH (MaKH, TenNguoiNhan, SDTNhanHang, DiaChiKH, GhiChu)
VALUES
('KH001', 'Nguyễn Văn A', '0909123456', '123 Trần Hưng Đạo, Q1, TP.HCM', NULL),
('KH002', 'Trần Thị B', '0912345678', '123 Trần Hưng Đạo, Q1, TP.HCM', NULL),
('KH003', 'Lê Văn C', '0923456789', '123 Trần Hưng Đạo, Q1, TP.HCM', NULL),
('KH004', 'Phạm Thị D', '0934567890', '456 Lê Lợi, Q3, TP.HCM', NULL),
('KH005', 'Hoàng Văn E', '0945678901', '789 Hai Bà Trưng, Q5, TP.HCM', NULL),
('KH006', 'Võ Thị F', '0956789012', '321 Nguyễn Thị Minh Khai, Q10, TP.HCM', NULL),
('KH007', 'Đinh Văn G', '0967890123', '45 Lê Văn Sỹ, Q3, TP.HCM', NULL),
('KH008', 'Bùi Thị H', '0978901234', '67 Nguyễn Tri Phương, Q5, TP.HCM', NULL),
('KH009', 'Phan Văn I', '0989012345', '89 Hậu Giang, Q6, TP.HCM', NULL),
('KH010', 'Ngô Thị J', '0990123456', '90 Lý Thường Kiệt, Q10, TP.HCM', NULL);


INSERT INTO DonHang (MaKH, MaDiaChiKH, NgayTao, TrangThai, PhuongThucThanhToan, GhiChu)
VALUES
('KH001', 1, NOW(), 'Đang xử lý', 'COD', 'Yêu cầu gói quà'),
('KH001', 1, NOW(), 'Đang xử lý', 'COD', NULL),
('KH002', 2, NOW(), 'Chờ xử lý', 'COD', NULL),
('KH002', 2, NOW(), 'Đang xử lý', 'COD', NULL),
('KH002', 2, NOW(), 'Chờ xử lý', 'COD', 'Giao trong giờ hành chính'),
('KH003', 3, NOW(), 'Chờ xử lý', 'COD', 'Giao trong giờ hành chính'),
('KH003', 3, NOW(), 'Đang giao', 'COD', NULL),
('KH003', 3, NOW(), 'Hoàn thành', 'COD', 'Giao trong giờ hành chính'),
('KH004', 4, NOW(), 'Hoàn thành', 'COD', NULL),
('KH005', 5, NOW(), 'Chờ xử lý', 'COD', NULL),
('KH005', 5, NOW(), 'Đang xử lý', 'COD', NULL),
('KH006', 6, NOW(), 'Chờ xử lý', 'COD', NULL),
('KH006', 6, NOW(), 'Đang giao', 'COD', 'Yêu cầu gói quà'),
('KH006', 6, NOW(), 'Đang giao', 'COD', NULL),
('KH007', 7, NOW(), 'Đang xử lý', 'COD', 'Giao trong giờ hành chính'),
('KH007', 7, NOW(), 'Chờ xử lý', 'COD', 'Yêu cầu gói quà'),
('KH007', 7, NOW(), 'Hoàn thành', 'COD', 'Giao nhanh'),
('KH008', 8, NOW(), 'Đang xử lý', 'COD', NULL),
('KH008', 8, NOW(), 'Đang giao', 'COD', NULL),
('KH009', 9, NOW(), 'Đang giao', 'COD', NULL),
('KH010', 10, NOW(), 'Hoàn thành', 'COD', 'Yêu cầu gói quà'),
('KH010', 10, NOW(), 'Hoàn thành', 'COD', 'Gọi trước khi giao');



INSERT INTO ChiTietDonHang (MaDonHang, MaBienThe, MaDLSP, SoLuong, GiaTien)
VALUES
(1, 'BT026', 'DLSP051', 2, 4490000),
(1, 'BT011', 'DLSP021', 1, 8490000),
(2, 'BT029', 'DLSP057', 1, 13990000),
(3, 'BT028', 'DLSP055', 1, 13990000),
(3, 'BT014', 'DLSP027', 1, 8990000),
(3, 'BT013', 'DLSP025', 2, 10300000),
(4, 'BT005', 'DLSP009', 1, 4790000),
(4, 'BT005', 'DLSP009', 2, 4790000),
(4, 'BT028', 'DLSP055', 1, 13990000),
(5, 'BT029', 'DLSP057', 2, 13990000),
(6, 'BT013', 'DLSP025', 1, 10300000),
(6, 'BT007', 'DLSP013', 1, 3290000),
(7, 'BT026', 'DLSP051', 2, 4490000),
(8, 'BT029', 'DLSP057', 1, 13990000),
(9, 'BT001', 'DLSP001', 2, 3090000),
(9, 'BT013', 'DLSP025', 1, 10300000),
(10, 'BT032', 'DLSP062', 2, 10300000),
(10, 'BT005', 'DLSP009', 1, 4790000),
(11, 'BT013', 'DLSP025', 1, 10300000),
(12, 'BT026', 'DLSP051', 1, 4490000),
(13, 'BT026', 'DLSP051', 2, 4490000),
(13, 'BT002', 'DLSP003', 2, 3090000),
(14, 'BT026', 'DLSP051', 2, 4490000),
(15, 'BT001', 'DLSP001', 1, 3090000),
(16, 'BT001', 'DLSP001', 2, 3090000),
(17, 'BT011', 'DLSP021', 2, 8490000),
(17, 'BT026', 'DLSP051', 1, 4490000),
(17, 'BT029', 'DLSP057', 2, 13990000),
(18, 'BT006', 'DLSP011', 1, 4790000),
(19, 'BT032', 'DLSP062', 1, 10300000),
(19, 'BT006', 'DLSP011', 2, 4790000),
(20, 'BT025', 'DLSP049', 2, 4490000),
(20, 'BT025', 'DLSP049', 1, 4490000),
(20, 'BT002', 'DLSP003', 2, 3090000),
(21, 'BT028', 'DLSP055', 1, 13990000),
(22, 'BT011', 'DLSP021', 1, 8490000);

Select From DonHang D Join ChiTietDonHang C ON C.MaDonHang = D.MaDonHang