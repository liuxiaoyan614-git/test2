<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>后台登录</title>
		<link rel="stylesheet" href="{{URL::asset('dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('dist/fonts/iconfont.css')}}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<style>
			body,html{
				height: 100%;
			}
			body{
				background-color: #3e3e3e;
			}
			.login{
				/* max-width: 600px; */
			}
			.modal-content{
				background-color: #787878;
				border: 1px solid #fff;
				width: 440px;
			}
			.iconfont{
				color:#90959d;
			}
			.input-group-text{
				background-color: #f5f7fa;
			}
		</style>
	</head>
	<body>
		
		<section class="w-100 h-100 d-flex justify-content-center align-items-center">
			
			<div class="modal-content m-3">
				<div class="modal-header justify-content-center">
					<h5 class="text-white">后台管理系统</h5>
				</div>
				<div id="err" class="alert-danger"></div>
				<div class="modal-body">
					<form action="manage.html" method="post">
						<div class="input-group mb-3 mt-2">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="iconfont icon-user"></i></span>
						  </div>
						  <input type="text" class="form-control username" placeholder="请输入用户名" name="username" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="iconfont icon-yuechi"></i></span>
						  </div>
						  <input type="password" class="form-control password" placeholder="请输入密码" name="password" aria-label="password" aria-describedby="basic-addon1">
						</div>
						<div class="input-group mb-3">
							<button type="button" class="btn btn-primary btn-block submitBtn">登录</button>
						  
						</div>
						{{route("login")}}
					</form>
					
				</div>
			</div>
			
			
		</section>
	
		<script src="{{URL::asset('dist/js/jquery.min.js')}}"></script>
		<script src="{{URL::asset('dist/js/popper.min.js')}}"></script>
		<script src="{{URL::asset('dist/js/bootstrap.min.js')}}"></script>
		<script>
			$(function(){
				$(".submitBtn").click(function(){
					var username = $(".username").val();
					var pwd = $(".password").val();
					
					$.ajax({
						type: 'post',
						url: '{{ url("admin/check") }}',
						data: {
							"username" : username, 
							"password" : pwd, 
							"_token" : "{{csrf_token()}}",
						},
						dataType: 'json',
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						},
						success: function(data){
							if(data.code==1){
								window.location.href="{{route('adminIndex')}}";
							}	
						}
						
					});
				})
			})
		</script>
	</body>
</html>
