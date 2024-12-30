@extends('layouts.app')  

@section('title', 'Giới thiệu Nhà Sách KP')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

@section('content')
<div class="container">
    <header>
        <h1>Chào mừng bạn đến với Nhà Sách KP</h1>
    </header>

    <section>
        <div class="image-container">
            <img src="images/gioithieu.png" alt="Hình ảnh nhà sách">
        </div>
        <p>Nhà Sách KP là một trong những địa chỉ uy tín và chất lượng cung cấp các loại sách đa dạng. Chúng tôi cam kết mang đến cho khách hàng những sản phẩm chất lượng nhất với mức giá hợp lý.</p>
        <p>Đến với chúng tôi, bạn sẽ tìm thấy hàng nghìn đầu sách thuộc nhiều thể loại khác nhau, từ sách học tập, sách tham khảo đến các tiểu thuyết, sách văn học, v.v.</p>
        <p>Với đội ngũ nhân viên thân thiện và chuyên nghiệp, Nhà Sách KP luôn sẵn sàng hỗ trợ bạn tìm kiếm và chọn lựa những cuốn sách ưng ý nhất.</p>
    </section>

    <section>
        <h3>Danh mục hàng hóa phong phú</h3>
        <p>Nhiều sản phẩm độc quyền, được chọn lọc kỹ càng đã tạo nên sự khác biệt của Nhà Sách KP và tạo dựng được lòng tin yêu từ khách hàng.</p>

        <h3>Sách văn học</h3>
        <p>Ngoài danh mục sách đa dạng và phong phú của nhiều nhà xuất bản, công ty sách lớn nhỏ cả nước, KP còn chủ động khai thác bản quyền và liên kết xuất bản hàng ngàn đầu sách hay và giá trị với thương hiệu KP Book, trong đó nhiều tựa được đánh giá cao và lọt vào danh mục bán chạy của các hệ thống phát hành sách lớn nhất Việt Nam.</p>

        <h3>Sách ngoại văn</h3>
        <p>Nhà Sách KP chủ động chọn lọc và phát hành tại Việt Nam danh mục sách tiếng Anh đa dạng của những nhà xuất bản lớn trên thế giới như Penguin Random House, Hachette Livre, HarperCollins, Macmillan Publishers, Simon & Schuster,… Nhiều tựa chỉ có duy nhất tại Nhà Sách KP, nhiều tựa được phát hành cùng thời điểm ra mắt của sách tại Anh và Mỹ.</p>

        <h3>Giới thiệu nhiều loại sách khác</h3>
        <p>Chúng tôi cũng cung cấp các loại sách phong phú khác như sách khoa học, sách kỹ năng sống, sách lịch sử, sách văn hóa, sách thiếu nhi, và sách công nghệ. Mỗi thể loại đều được chọn lọc kỹ càng để đảm bảo chất lượng và đáp ứng nhu cầu đa dạng của khách hàng.</p>

        <h3>Sách khoa học</h3>
        <p>Sách khoa học tại Nhà Sách KP bao gồm những cuốn sách nổi tiếng và hiện đại, từ các công trình nghiên cứu của các nhà khoa học hàng đầu đến các tài liệu phổ thông giúp độc giả mở rộng kiến thức về các lĩnh vực như vật lý, hóa học, sinh học, và vũ trụ học. Chúng tôi tin rằng mỗi cuốn sách là một cánh cửa mở ra thế giới kỳ diệu của khoa học và khám phá.</p>

        <h3>Sách kỹ năng sống</h3>
        <p>Để giúp bạn phát triển bản thân, Nhà Sách KP mang đến các cuốn sách kỹ năng sống từ các tác giả nổi tiếng về quản lý thời gian, kỹ năng giao tiếp, nghệ thuật lãnh đạo, và phát triển bản thân. Những cuốn sách này sẽ cung cấp những kiến thức hữu ích để bạn cải thiện kỹ năng cá nhân và nâng cao chất lượng cuộc sống.</p>

        <h3>Sách lịch sử và văn hóa</h3>
        <p>Chúng tôi cung cấp một bộ sưu tập sách lịch sử phong phú, từ các sự kiện quan trọng trong lịch sử thế giới đến những câu chuyện lịch sử Việt Nam. Ngoài ra, sách văn hóa sẽ giúp bạn hiểu rõ hơn về phong tục, tập quán, và các nền văn hóa khác nhau, từ đó góp phần mở rộng tầm nhìn và hiểu biết của bạn về thế giới.</p>

        <h3>Sách thiếu nhi</h3>
        <p>Sách thiếu nhi tại Nhà Sách KP không chỉ đa dạng về nội dung mà còn phong phú về hình ảnh minh họa, giúp các bé học hỏi và phát triển trí tưởng tượng. Chúng tôi có các loại sách như truyện tranh, sách giáo dục, sách hướng dẫn kỹ năng sống cho trẻ em, và các cuốn sách phát triển trí tuệ với các bài tập thú vị.</p>

        <h3>Sách công nghệ</h3>
        <p>Đối với những ai yêu thích công nghệ, chúng tôi cung cấp các cuốn sách từ lập trình, phát triển phần mềm, đến xu hướng công nghệ mới nhất như AI, blockchain, và công nghệ thực tế ảo. Đây là những tài liệu tuyệt vời cho cả những người mới bắt đầu và những chuyên gia muốn cập nhật kiến thức mới nhất trong lĩnh vực công nghệ.</p>

        <p>Hi vọng với trang thương mại điện tử nhasachKP.com, Nhà Sách KP có thể gia tăng tiện ích cho khách hàng, đồng thời mang những sản phẩm của hệ thống nhà sách đến với mọi khách hàng trên cả nước.</p>
    </section>
</div>
@endsection
