<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>404 | ERRORS</title>
	@includeif('frontend.layouts.link')
</head>
<body>
	<div class="not-found">
		<p class="hint extraLarge">Trang này không tồn tại </p>
		<hr class="hr-style3">
		<div class="err-404">
			4<span class="main-color">0</span>4		
		</div>
		<hr class="hr-style3">
		<p>Trang bạn vừa truy cập không tồn tại hoặc bạn không có quyền truy cập. Vui lòng quay lại</p>
		<a class="btn btn-medium" href="{{ route('frontend.index') }}">Về trang chủ</a>		
	</div>
</body>
</html>