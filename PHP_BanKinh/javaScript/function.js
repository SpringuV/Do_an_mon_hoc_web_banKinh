// preview image
function previewImage() {
    const fileInput = document.getElementById('image_product_new');
    const preview = document.getElementById('preview');
    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                // preview.classList.remove('hidden'); // Hiển thị ảnh
            };
            reader.readAsDataURL(file);
        }
    });
}
window.onload=previewImage;

// hidden text
function toggleContent() {
    const text = document.getElementById('text');
    if (image.style.display === 'none') {
        text.style.display = 'block';
    } else {
        text.style.display = 'none';
    }
}

// catch error search
function validateForm() {
    var searchQuery = document.getElementById("search_query").value;
    var errorSpan = document.getElementById("search_eror");

    if (searchQuery.trim() == "") {
        errorSpan.textContent = "Vui lòng nhập từ khóa tìm kiếm.";
        return false; // Ngăn form submit nếu có lỗi
    } else {
        errorSpan.textContent = "";
        return true; // Cho phép form submit nếu hợp lệ
    }
}

// set timeout welcome
document.addEventListener("DOMContentLoaded", function() {
    var element = document.getElementById("autoHide");
        setTimeout(function(){
            element.classList.add("hidden");
        }, 3000); // 3s
    }
);

// alert
function showAlert(message){
    alert(message);
}

// validate input name product
function validateInput() {
    var inputField = document.getElementById('idName');
    var errorMessage = document.getElementById('errorMessage');
    if (inputField.value.length < 25 || inputField.value.length >50) {
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }
}

function validateInputArticle() {
    var inputField = document.getElementById('nameBaiViet');
    var errorMessage = document.getElementById('errorMessage');
    if (inputField.value.length < 25 || inputField.value.length >200) {
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }
}

// show popup message
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');
    if (message) {
        showAlert(message);
    }
}
