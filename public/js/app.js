//Lọc theo giá tiền
function updatePriceLabel(value) {
    const priceLabel = document.getElementById('priceLabel');
    priceLabel.textContent = parseInt(value).toLocaleString('vi-VN') + ' VND';
}

//Button đổi trang sách ở phần gợi ý
document.querySelectorAll('.btn-prev, .btn-next').forEach(button => {
    button.addEventListener('click', () => {
        const sliderId = button.getAttribute('data-slider');
        const sliderTrack = document.querySelector(`#${sliderId} .slider-track`);
        const slides = sliderTrack.querySelectorAll('.book-item');
        const totalSlides = slides.length;
        const slideWidth = slides[0].offsetWidth + 15; 
        let currentSlide = parseInt(sliderTrack.getAttribute('data-current-slide'), 10);

        const visibleSlides = 5; 
        const maxSlideIndex = totalSlides - visibleSlides;

        if (button.classList.contains('btn-next')) {
            currentSlide++;
            if (currentSlide > maxSlideIndex) {
                currentSlide = 0; 
            }
        } else if (button.classList.contains('btn-prev')) {
            currentSlide--;
            if (currentSlide < 0) {
                currentSlide = maxSlideIndex; 
            }
        }

        sliderTrack.setAttribute('data-current-slide', currentSlide);
        const offset = -(currentSlide * slideWidth);
        sliderTrack.style.transform = `translateX(${offset}px)`;
    });
});

//Button trở về đầu trang
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function handleScroll() {
    const backToTopButton = document.querySelector('.backToTop');
    const scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

    if (scrollPosition > 100) {
        backToTopButton.style.display = 'block';
    } else {
        backToTopButton.style.display = 'none';
    }
}

//Lọc publisher
function filterByPublisher(publisherId) {
    window.location.href = "?publisher_id=" + publisherId;
}

//Xử lý api địa chỉ
$(document).ready(function() {
    $('#province').on('change', function() {
        var province_id = $(this).val();
        console.log("Province ID selected: " + province_id); 

        if (province_id) {
            fetch(`/fetch-districts?province_id=${province_id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); 

                    $('#district').empty();
                    $('#district').append('<option value="">Chọn Quận/Huyện</option>');

                    data.forEach(district => {
                        $('#district').append(new Option(district.name, district.id));
                    });

                    $('#wards').empty();
                    $('#wards').html('<option value="">Chọn Phường/Xã</option>');
                })
                .catch(error => console.error('Error fetching districts:', error));
        } else {
            $('#district').empty().append('<option value="">Chọn Quận/Huyện</option>');
            $('#wards').empty().append('<option value="">Chọn Phường/Xã</option>');
        }
    });

    $('#district').on('change', function() {
        var district_id = $(this).val();

        if (district_id) {
            fetch(`/fetch-wards?district_id=${district_id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); 

                    $('#wards').empty();
                    $('#wards').append('<option value="">Chọn Phường/Xã</option>');

                    data.forEach(ward => {
                        $('#wards').append(new Option(ward.name, ward.id));
                    });
                })
                .catch(error => console.error('Error fetching wards:', error));
        } else {
            $('#wards').empty().append('<option value="">Chọn Phường/Xã</option>');
        }
    });
});

//
function focusTab(tabId) {
    const tabs = document.querySelectorAll('.tab-btn');
    const underline = document.querySelector('.underline');
    const activeTab = document.getElementById(`btn${capitalizeFirstLetter(tabId)}`);

    // Xóa trạng thái active khỏi tất cả các tabs
    tabs.forEach((tab) => tab.classList.remove('active'));

    // Thêm trạng thái active cho tab được chọn
    activeTab.classList.add('active');

    // Hiển thị nội dung phù hợp
    document.getElementById('description').style.display = tabId === 'description' ? 'block' : 'none';
    document.getElementById('details').style.display = tabId === 'details' ? 'block' : 'none';

    // Di chuyển underline dưới tab được chọn
    underline.style.width = `${activeTab.offsetWidth}px`;
    underline.style.left = `${activeTab.offsetLeft}px`;
}

// Hàm helper để viết hoa chữ cái đầu
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

// Cập nhật vị trí underline khi trang tải
window.onload = function () {
    focusTab('description'); // Đặt trạng thái mặc định
};





