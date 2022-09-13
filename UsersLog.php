<!DOCTYPE html>
<html>
<head>
  <title>Nhật ký</title>
<link rel="stylesheet" type="text/css" href="css/userslog.css">
<script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/user_log.js"></script>
<script>
  $(document).ready(function(){
      $.ajax({
        url: "user_log_up.php",
        type: 'POST',
        data: {
            'select_date': 1,
        }
      });
    setInterval(function(){
      $.ajax({
        url: "user_log_up.php",
        type: 'POST',
        data: {
            'select_date': 0,
        }
        }).done(function(data) {
          $('#userslog').html(data);
        });
    },5000);
  });
</script>
</head>
<body>
<?php include'header.php'; ?> 
<main>
  <section>
  <!--User table-->
  <h1 class="slideInDown animated">Nhật ký vân tay ngày hôm nay</h1>
  	<div class="form-style-5 slideInDown animated">
  		<form method="POST" action="Export_Excel.php">
  			<input type="date" name="date_sel" id="date_sel">
        <button type="button" name="user_log" id="user_log">Chọn ngày</button>
  			<input type="submit" name="To_Excel" value="Xuất ra file excel">
  		</form>
  	</div>
  <div class="tbl-header slideInRight animated">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Họ và tên</th>
          <th>Mã số học sinh</th>
          <th>ID vân tay</th>
          <th>Ngày</th>
          <th>Thời gian vào</th>
          <th>Thời gian ra</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content slideInRight animated">
    <div id="userslog"></div>
  </div>
</section>
</main>
</body>
</html>