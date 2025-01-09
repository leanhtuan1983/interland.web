<!-- Trang Khách hàng -->
@extends('fe-pages.layouts.app')
@section('title',config('pages.title.contact'))
@section('content')
<div class="container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
    <h3 class="my-auto">Liên hệ</h3>
    </div>
</div>
<div class="container-fluid justify-content-center mt-5" style="width:1100px;">
    <div class="d-flex mb-4">
        <div class="col-8 me-4">
            <div class="map-container">
                <!-- Bản đồ 1 -->
                <div id="map1" class="map" style="display: block;">
                    <iframe class="w-100" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.083323235448!2d105.78209637599335!3d21.029351780620157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cf40dae85%3A0xd79f7e99e6e368da!2zQ8O0bmcgdHkgQ-G7lSBQaOG6p24gxJDhuqd1IHTGsCBDw7RuZyBOZ2jhu4cgdsOgIMSQ4buLYSDhu5FjIEludGVybGFuZA!5e0!3m2!1svi!2s!4v1728272918026!5m2!1svi!2s" 
                        width="680" height="540" style="border:0;" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <!-- Bản đồ 2 -->
                <div id="map2" class="map" style="display: none;">
                    <iframe class="w-100" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d489.9312869120841!2d106.65425638789206!3d10.776782699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fc0c47fe899%3A0x5bb3288f1a00d15b!2zQ2FvIOG7kWMgUGjDuiBUaOG7jSAtIFRodeG6rW4gVmnhu4d0!5e0!3m2!1svi!2s!4v1728273024301!5m2!1svi!2s" 
                        width="680" height="540" style="border:0;" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <div class="map-buttons" style = "display:flex;">
                <button id="btn-map1" onclick="showMap(1)"><i class ="icon-map-pin-fill"></i> Cơ sở 1 - hà nội</button>
                <button id="btn-map2" onclick="showMap(2)"><i class ="icon-map-pin-fill"></i> Cơ sở 2 - tp.hcm</button>
            </div>
        </div>
        <div class="col-4">
            <p class="h4">Hãy liên hệ với chúng tôi</p>
            <p style="font-size: 14px; color:grey;">Để có giải pháp tốt nhất cho doanh nghiệp của bạn!</p>
            <p style="font-size: 14px; color:grey;"><strong>Cơ sở 1:</strong>Toà nhà JoyHouse, Lô B2/D21 Khu ĐTM Cầu Giấy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội <br>
            Điện thoại: +84.24 6257 6789</p>
            <p style="color: rgb(111,35,99)"><strong>Hotline: +84.24 6257 6789</strong></p>
            <p style="font-size: 14px; color:grey;"><strong>Cơ sở 2:</strong>Số 319/D3 khu Thương Mại Thuận Việt, Đường Lý Thường Kiệt, Phường 15, Quận 11, Tp. Hồ Chí Minh <br>
            Điện thoại: +84.28 6265 6789</p>
            <p class="mb-0">Giờ mở cửa: 8:00 - 17:30.</p>
            <p>Email: info@interland.vn</p>
            <p class="h4 mb-0" style="border-left: 5px solid rgb(111,35,99); padding-top:0px; padding-left: 10px;">Bất động sản</p>
            <p class ="mb-0">Hotline: 0987 177 777</p>
            <p class="h4 mb-0" style="border-left: 5px solid rgb(111,35,99); padding-top:0px; padding-left: 10px;">Phủ sóng tòa nhà</p>
            <p class="mb-0">Hotline: 0989 669 911</p>
            <p class="h4 mb-0" style="border-left: 5px solid rgb(111,35,99); padding-top:0px; padding-left: 10px;">Dịch vụ GTGT</p>
            <p class="mb-0">Hotline: +84.24 6257 6789</p>
            <p class="h4 mb-0" style="border-left: 5px solid rgb(111,35,99); padding-top:0px; padding-left: 10px;">Thương mại</p>
            <p class="mb-0">Hotline: +84.24 6257 6789</p>
        </div>       
    </div>
</div>

<script type="text/javascript">
    function showMap(mapNumber) {
        document.getElementById('map1').style.display = 'none';
        document.getElementById('map2').style.display = 'none';
		
		document.getElementById('btn-map1').style.backgroundColor = '';
    	document.getElementById('btn-map2').style.backgroundColor = '';
    	document.getElementById('btn-map1').style.color = '';
    	document.getElementById('btn-map2').style.color = '';
        if (mapNumber === 1) {
            document.getElementById('map1').style.display = 'block';
			document.getElementById('btn-map1').style.backgroundColor = 'rgb(99,35,111)';  // Màu nền mới
        	document.getElementById('btn-map1').style.color = 'white';           // Màu chữ mới
        } else {
            document.getElementById('map2').style.display = 'block';
			document.getElementById('btn-map2').style.backgroundColor = 'rgb(99,35,111)';  // Màu nền mới
        	document.getElementById('btn-map2').style.color = 'white';           // Màu chữ mới
        }
    }
</script>
@endsection