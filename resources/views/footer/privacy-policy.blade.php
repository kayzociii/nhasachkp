@extends('layouts.app')  

@section('title', 'Chính sách bảo mật')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

@section('content')
<div class="container">
    <header>
        <h1>Chính Sách Bảo Mật</h1>
    </header>

    <section class="content">
        <p>Chào mừng Quý khách hàng đến với website của chúng tôi! Nhà Sách KP cam kết bảo vệ thông tin cá nhân của Quý khách và thực hiện các biện pháp cần thiết để bảo mật thông tin đó. Chính sách bảo mật này giúp bạn hiểu cách thức chúng tôi thu thập, sử dụng, bảo mật và chia sẻ thông tin cá nhân của bạn khi bạn sử dụng dịch vụ của chúng tôi.</p>

        <h3>1. Việc Bảo Lưu Thông Tin Khách Hàng</h3>
        <p>Để sử dụng và trải nghiệm các dịch vụ của Nhà Sách KP, bạn cần đăng ký tài khoản và cung cấp một số thông tin như: email, họ tên, số điện thoại, địa chỉ và một số thông tin khác. Bạn có thể tùy chọn không cung cấp cho chúng tôi một số thông tin nhất định nhưng sẽ có một chút bất tiện vì khi đó, bạn sẽ không thể được hưởng một số tiện ích mà những tính năng của chúng tôi cung cấp.</p>
        <p>Mọi thông tin bạn nhập trên website sẽ được lưu trữ để sử dụng cho mục đích phản hồi yêu cầu của khách hàng, đưa ra những gợi ý phù hợp cho từng khách hàng khi mua sắm tại website, nâng cao chất lượng hàng hóa dịch vụ và liên lạc với khách hàng khi cần thiết.</p>
        <p>Chúng tôi cam kết chỉ thu thập thông tin cần thiết để cung cấp dịch vụ tốt nhất cho khách hàng. Các thông tin này sẽ được bảo mật và chỉ được sử dụng khi có sự đồng ý của khách hàng hoặc khi pháp luật yêu cầu.</p>

        <h3>2. Mục Đích Sử Dụng Thông Tin</h3>
        <p>Mục đích của việc bảo lưu thông tin là nhằm xây dựng Nhà Sách KP trở thành một website bán hàng trực tuyến mang lại nhiều tiện ích nhất cho khách hàng. Vì thế, việc sử dụng thông tin sẽ phục vụ những hoạt động sau:</p>
        <ul>
            <li>Gửi newsletter giới thiệu sản phẩm mới và những chương trình khuyến mãi của Nhà Sách KP.</li>
            <li>Cung cấp một số tiện ích, dịch vụ hỗ trợ khách hàng.</li>
            <li>Nâng cao chất lượng dịch vụ khách hàng của Nhà Sách KP.</li>
            <li>Làm cơ sở giải quyết các vấn đề khiếu nại, tranh chấp phát sinh liên quan đến việc sử dụng sản phẩm, dịch vụ tại website Nhà Sách KP.</li>
            <li>Ngăn chặn những hoạt động vi phạm pháp luật Việt Nam.</li>
            <li>Phân tích và cải tiến trải nghiệm người dùng nhằm tối ưu hóa các tính năng của website.</li>
            <li>Để đảm bảo an ninh và phòng chống gian lận, lừa đảo trên website.</li>
        </ul>

        <h3>3. Chia Sẻ Thông Tin</h3>
        <p>Chúng tôi sẽ không chia sẻ thông tin của bạn trừ những trường hợp cụ thể sau đây:</p>
        <ul>
            <li><strong>Để bảo vệ Nhà Sách KP và các bên thứ ba khác:</strong> Chúng tôi chỉ đưa ra thông tin tài khoản và những thông tin cá nhân khác khi tin chắc rằng việc đưa những thông tin đó là phù hợp với luật pháp, bảo vệ quyền lợi, tài sản của người sử dụng dịch vụ, của Nhà Sách KP và các bên thứ ba khác.</li>
            <li><strong>Theo yêu cầu pháp lý:</strong> Chúng tôi có thể tiết lộ thông tin nếu được yêu cầu bởi một cơ quan chính phủ hoặc khi chúng tôi tin rằng việc làm đó là cần thiết và phù hợp để tuân theo các yêu cầu pháp lý.</li>
            <li><strong>Thông báo cụ thể:</strong> Trong những trường hợp khác, chúng tôi sẽ thông báo cho bạn khi phải tiết lộ thông tin cho một bên thứ ba và chỉ cung cấp khi có sự đồng ý từ phía bạn.</li>
            <li><strong>Chia sẻ với các đối tác chiến lược:</strong> Chúng tôi có thể chia sẻ thông tin với các đối tác cung cấp dịch vụ mà chúng tôi hợp tác để mang lại những lợi ích tốt nhất cho bạn. Những đối tác này sẽ được yêu cầu cam kết bảo mật thông tin theo các quy định của chúng tôi.</li>
        </ul>

        <h3>4. Chính Sách Cam Kết Bảo Mật Thông Tin Khách Hàng</h3>
        <ul>
            <li>Chúng tôi cam kết không tiết lộ thông tin khách hàng, không bán hoặc chia sẻ thông tin khách hàng của Nhà Sách KP cho bên thứ ba nào khác vì mục đích thương mại.</li>
            <li>Chúng tôi cam kết mọi thông tin thanh toán giao dịch trực tuyến của khách hàng đều được bảo mật và an toàn. Các thông tin tài khoản ngân hàng, thông tin thẻ tín dụng hay thông tin tài chính đều không bị lưu lại dưới bất kỳ hình thức nào.</li>
            <li>Quý khách không nên trao đổi những thông tin cá nhân và thông tin thanh toán của mình cho bên thứ ba nào khác để tránh rò rỉ thông tin. Khi sử dụng chung máy tính với nhiều người, vui lòng thoát khỏi tài khoản sau khi sử dụng dịch vụ của website chúng tôi để tự bảo vệ thông tin về mật khẩu truy cập của mình.</li>
            <li>Chúng tôi sử dụng các công nghệ bảo mật tiên tiến như mã hóa SSL và hệ thống tường lửa để bảo vệ dữ liệu và thông tin khách hàng.</li>
            <li>Nhà Sách KP sẽ thường xuyên kiểm tra và cập nhật hệ thống bảo mật để phát hiện và ngăn chặn các hành vi xâm nhập trái phép.</li>
        </ul>

        <h3>5. Quyền Lợi của Khách Hàng</h3>
        <p>Khách hàng có quyền:</p>
        <ul>
            <li>Yêu cầu truy cập, chỉnh sửa hoặc xóa thông tin cá nhân của mình.</li>
            <li>Yêu cầu ngừng sử dụng thông tin cá nhân để gửi các thông báo, quảng cáo, hoặc thông tin tiếp thị khác.</li>
            <li>Yêu cầu thông báo về việc xử lý thông tin cá nhân nếu có sự thay đổi hoặc rủi ro bảo mật.</li>
        </ul>

        <h3>6. Thay Đổi Chính Sách Bảo Mật</h3>
        <p>Chúng tôi có thể cập nhật hoặc điều chỉnh chính sách bảo mật này để phù hợp với các thay đổi trong hoạt động kinh doanh và yêu cầu pháp lý. Mọi thay đổi sẽ được thông báo trên website và có hiệu lực ngay khi được công bố.</p>

        <h3>7. Liên Hệ</h3>
        <p>Nhà Sách KP hiểu rằng quyền lợi của bạn trong việc bảo vệ thông tin cá nhân cũng chính là trách nhiệm của chúng tôi. Trong bất kỳ trường hợp có thắc mắc, góp ý nào liên quan đến chính sách bảo mật của Nhà Sách KP, vui lòng liên hệ với chúng tôi qua số điện thoại <strong>1900 9100</strong> hoặc email <strong>nhasachkp@gmail.com</strong> để được phúc đáp, giải quyết thắc mắc trong thời gian sớm nhất.</p>
    </section>
</div>
@endsection