<!-- Trang Giới thiệu -->
@extends('fe-pages.layouts.app')
@section('title',config('pages.title.about'))
@section('content')
<div class="container-fluid d-flex justify-content-center text-white mybreadcrumb">
    <div class="container d-flex justify-content-start text-white" style="width:1100px; height:102px;">
    <h3 class="my-auto">Về chúng tôi</h3>
    </div>
</div>
<div class="container-fluid justify-content-center">
    <div class="container d-block d-lg-flex  justify-content-between mt-5" style="width:1100px;">
        <div class="col-4">
            <img src="{{  asset('assets/images/gioithieu.png') }}" style="width:339px; height:242px" alt="">
        </div>
        <div class="col-4">
            <p class="h4 ms-2" style="color:#7754a3; font-size:24px">Công ty CP đầu tư công nghệ và địa ốc Interland</p>
            <p class="ms-2 me-3" style="font-size:14px; color:#747474; line-height:1.8;">
            Công ty CP đầu tư công nghệ và địa ốc Interland là Công ty hoạt động trong lĩnh vực đầu tư công nghệ và giải pháp viễn thông 
            song song đầu tư kinh doanh bất động sản. Hiện nay, Công ty đang triển khai nhiều dự án viễn thông- bất động sản trong và ngoài nước. 
            Trong đó, đầu tư sang thị trường Lào và Campuchia là hai thị trường đầy tiềm năng, hứa hẹn đem lại thành quả lớn cho sự phát triển bền vững...
            </p>
            <a class=" ms-2 costume-button" href="">Chi tiết<i class="bi bi-chevron-right ms-2"></i></a>  
        </div>
        <div class="col-4" style="background:#f1f1f1">
            <p class="h4 mt-3 ms-3" style="color:#7754a3; font-size:18px">Tầm nhìn và giá trị cốt lõi</p>
            <p class="ms-3 me-2" style="font-size: 14px; color:#454343">Interland chuyên nghiên cứu và cung cấp các thiết bị trong ngành công nghệ thông tin và viễn thông như : 
                Cung cấp giải pháp, đầu tư kinh doanh dịch vụ về di động và cố định trong tòa nhà. 
                Dịch vụ giá trị gia tăng trên các thuê bao di động. Hệ thống điều khiển thông minh cho các tòa nhà và khu làm việc. 
                Các vật tư thiết bị trong ngành công nghệ thông tin và viễn thông. Các hoạt động liên quan đến tư vấn, môi giới, 
                kinh doanh bất động sản. Trong quá trình hình thành và phát triển, Interland đẩy mạnh việc xây dựng các trung tâm: 
                Trung tâm bất động sản, Trung tâm VAS, Trung tâm Trading, Trung tâm viễn thông, ...</p>
        </div>
    </div>
</div>
<div class="container col-12 d-flex justify-content-center bg-white mt-4">
        <div class="timeline">
            <div class="timeline-item" onclick="showEvent(1)">
                <div class="time">2015</div>  
                <div class="dot"></div>        
            </div>
            <div class="timeline-item" onclick="showEvent(2)">
                <div class="time">2014</div>
                <div class="dot"></div>           
            </div>
            <div class="timeline-item" onclick="showEvent(3)">
                <div class="time">2013</div>
                <div class="dot"></div>         
            </div>
            <div class="timeline-item" onclick="showEvent(4)">
                <div class="time">2012</div>
                <div class="dot"></div>         
            </div>
            <div class="timeline-item" onclick="showEvent(5)">
                <div class="time">2011</div>
                <div class="dot"></div>         
            </div>
            <div class="timeline-item" onclick="showEvent(6)">
                <div class="time">2010</div>
                <div class="dot"></div>         
            </div>
            <div class="timeline-item" onclick="showEvent(7)">
                <div class="time">2009-2006</div>
                <div class="dot"></div>         
            </div>
            <div class="timeline-item" onclick="showEvent(8)">
                <div class="time">2005 - 2000</div>
                <div class="dot"></div>         
            </div>
            <div class="timeline-item" onclick="showEvent(9)">
                <div class="time">1995 - 1999</div>
                <div class="dot"></div>         
            </div>
        </div>
    </div>
    <div class="container col-12 d-flex justify-content-center bg-white pb-4">
        <div class="event-details">
        <div id="event1" class="event-content">
            <span style="color:#005fa3;"><strong>06/2015: </strong></span>Thiết kế và triển khai nâng cấp hệ thống đường trục tốc độ 100G lớp P, PE và Internet Gateway cho Tập đoàn Viettel tại Việt Nam.</br>
            <span style="color:#005fa3;"><strong>06/2015: </strong></span>Triển khai thử nghiệm hệ thống OCS của Ericsson cho Tập đoàn Viettel với dung lượng đáp ứng 1 triệu thuê bao di động.</br>
            <span style="color:#005fa3;"><strong>05/2015: </strong></span> Nâng cấp hệ thống mạng metro theo công nghệ Unified MPLS cho Metfone tại Cambodia.</br>
            <span style="color:#005fa3;"><strong>05/2015: </strong></span>Trở thành đối tác chiến lược của Ericsson trong các mảng công nghệ OCS, NFV, M2M, GNOC Tool… tại thị trường viễn thông.</br>
            <span style="color:#005fa3;"><strong>04/2015: </strong></span>Thiết kế và triển khai dự án wifi offload cho Viettel Timor Leste tại Đông Timor
        </div>
        <div id="event2" class="event-content">
            <span style="color:#005fa3;"><strong>12/2014: </strong></span>Đạt giải thưởng FY14 Fastest Growth SI Partner, FY14 Top Service Provider Market Partner và FY14 Top UCS SI Partner của Cisco Systems Việt.</br>
            <span style="color:#005fa3;"><strong>09/2014: </strong></span>Cung cấp hệ thống mạng truy cập cáp quang băng rộng GPON (toàn bộ các tỉnh miền Bắc và miền Trung) cho Viettel Việt Nam.</br>
            <span style="color:#005fa3;"><strong>06/2014: </strong></span>Cung cấp hệ thống mạng METRO Ethernet cho 2 vùng Hà Nội, Tp.Hồ Chí Minh – Viettel Việt Nam.</br>
            <span style="color:#005fa3;"><strong>04/2014: </strong></span>Hợp tác trở lại với Alcatel-Lucent như Đối tác chiến lược tại Việt Nam.</br>
            <span style="color:#005fa3;"><strong>03/2014: </strong></span>Cung cấp hệ thống truyền hình Sub-Headend của Motorola/Arris, ATX cho Viettel Việt Nam.</br>
            <span style="color:#005fa3;"><strong>02/2014: </strong></span>Trở thành đối tác độc quyền cung cấp giải pháp Service Assurance của hãng EXFO.</div>
        <div id="event3" class="event-content">
        <span style="color:#005fa3;"><strong>09/2013: </strong></span>Cung cấp hệ thống mạng đường trục IP cho Công ty thông tin di động VMS sử dụng hệ thống router ASR9010 của hãng Cisco Systems.</br>
        <span style="color:#005fa3;"><strong>08/2013: </strong></span>Cung cấp hệ thống mạng METRO Ethernet cho Viettel Cameroun.
        <span style="color:#005fa3;"><strong>07/2013: </strong></span>Tiếp tục mở rộng hệ thống mạng IPBN và MPBN cho Tập đoàn viễn thông quân đội Viettel.</br>
        <span style="color:#005fa3;"><strong>04/2013: </strong></span>Trở thành đối tác chiến lược về công nghệ truyền hình của hãng Ascent Technology, Motorola/Arris, ATX.</br>
        <span style="color:#005fa3;"><strong>03/2013: </strong></span>Mở rộng mạng đường trục IP cho Công ty dịch vụ viễn thông Vinaphone sử dụng hệ thống router ASR9010 của hãng Cisco Systems.</div>
        <div id="event4" class="event-content">
        <span style="color:#005fa3;"><strong>02/2014: </strong></span>03/2012: Cung cấp giải pháp Cầu truyền hình cho Viettel Haiti, Mozambique; cung cấp giải pháp mạng đường trục cho Viettel Peru.</br>
            Trở thành đối tác Vàng (Solution Provider) của Polycom.</br>
            Được bổ nhiệm là Đại lý ủy quyền của EMC,HP, Microsoft, Dell, IBM.</div>
        <div id="event5" class="event-content">
            Trở thành Enterprise Partner của VMWare.</br>
            Đạt giải Fastest Growth in Services of FY11 do Cisco Systems trao tặng.</br>
            Trở thành đối tác Vàng (Gold Partner) của NetApp và F5 tại Việt Nam.</br>
            Vinh dự nhận được giải thưởng Partner of the Year FY11 – Best contribution and Growth (Systems) của Oracle.
        </div>
        <div id="event6" class="event-content">
        <span style="color:#005fa3;"><strong>10/2010: </strong></span>ITC JSC tiếp tục là công ty đầu tiên mang giải pháp mạng đường trục cao cấp nhất của Cisco tới Việt Nam – Router CRS-3 cho khách hàng là Tập Đoàn Viễn Thông Quân Đội Viettel.</br>
        <span style="color:#005fa3;"><strong>07/2010: </strong></span>IVASC – công ty thành viên của ITC JSC chuyên về lĩnh vực cung cấp nội dung trên mạng di động đã chính thức đưa vào thị trường Lào một loạt các dịch vụ giá trị gia tăng do chính IVASC tự phát triển bao gồm dịch vụ Tin nhắn, Mobile Karaoke, Mobile Application & WAP Portal. IVASC nằm trong Top 3 nhà cung cấp dịch vụ nội dung tại thị trường viễn thông Lào.</br>
        <span style="color:#005fa3;"><strong>05/2010: </strong></span>Triển khai dự án quản lý mạng dựa trên sản phẩm Polar Star của hãng NKia-Hàn Quốc, giúp các nhà cung cấp dịch vụ viễn thông quản lý được hàng trăm máy chủ ứng dụng, cơ sở dữ liệu và thiết bị mạng của nhiều hãng khác nhau.</br>
        <span style="color:#005fa3;"><strong>04/2010: </strong></span>ITC JSC là nhà tích hợp hệ thống (SI) đầu tiên tại Việt Nam triển khai hệ thống router ASR 9010 – sản phẩm mới nhất của hãng Cisco Systems đối với công nghệ mạng đường trục IP/MPLS.</br>
        <span style="color:#005fa3;"><strong>02/2010: </strong></span>Trở thành đối tác Vàng (Gold Partner) của Oracle tại Việt Nam.
        </div>
        <div id="event7" class="event-content">.
        </div>
        <div id="event8" class="event-content">.
        </div>
        <div id="event9" class="event-content">.
        </div>
        </div>
    </div>


@endsection