
<?php
require_once '../../config/APP.php';
?>
<script>
var images = document.getElementsByTagName("img");

// Lặp qua từng thẻ <img> và thêm sự kiện onerror
for (var i = 0; i < images.length; i++) {
  images[i].onerror = function() {
    this.src = "<?= IMAGE_DEFAULT ?>"; // Thay đổi src thành ảnh mặc định
  };
}
</script>