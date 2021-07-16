<div id="con">
<button class="btn btn-primary mb-2 addProductClass" data-toggle="modal" data-target="#myModal">添加产品分类</button>
<!-- 分类详细信息模态框 -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
   
        <!-- 头部 -->
        <div class="modal-header">
          <h4 class="modal-title">添加产品分类</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <!-- 主体 -->
		<form action="">
			<div class="modal-body">
			  <ul>
				  <li class="mb-3">
					  <input type="text" required class="form-control className" placeholder="请输入分类名称">
				  </li>
				  <li>
				  	  <select class="form-control" required id="sel1">
				  	      <option value="0">无上级</option>
				  	      
				  	  </select>
				  </li>
			  </ul>
		  
			</div>
   
        <!-- 模态框底部 -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary addBtn" data-dismiss="modal">保存</button>
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
			</div>
		</form>
      </div>
    </div>
  </div>


<!-- 编辑产品分类模态框 --> 
<!-- 分类详细信息模态框 -->
  <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
   
        <!-- 头部 -->
        <div class="modal-header">
          <h4 class="modal-title">编辑产品分类</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <!-- 主体 -->
		<form action="">
			<div class="modal-body">
			  <ul>
				  <input type="hidden" class="hideInput">
				  <li class="mb-3">
					  <input type="text" required class="form-control editclassName" placeholder="请输入分类名称">
				  </li>
				  <li>
				  	  <select class="form-control" required id="sel2">
				  	      <option value="0">无上级</option>
				  	      
				  	  </select>
				  </li>
			  </ul>
		  
			</div>
   
        <!-- 模态框底部 -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary saveBtn" data-dismiss="modal">保存</button>
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
			</div>
		</form>
      </div>
    </div>
  </div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">产品分类id</th>
      <th scope="col">类名</th>
      <th scope="col">上传日期</th>
	  <th scope="col">操作</th>
    </tr>
  </thead>
  <tbody id="tbody">
    
  </tbody>
</table>
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-end">
    <li class="page-item preFn">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    <li class="page-item nextFn">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<script>
	function getInfo (currentpage,perpage) {
		console.log(2);
		$.ajax({
			 type: "GET",
			 url: "http://localhost/0620laravel/public/admin/productClass/show",
			 data: {
				 currentPage:currentpage,
				 perpage:perpage
			},
			 dataType: "json",
			 success: function(data){
				if (data.status == 1) {
					var str = ''
					var currentpage = data.data.currentPage
					$.each(data.data.data,function(i,item){

				　　　　  str += ' <tr><td>'+ item.id +' </td>\
								<td>'+ item.className +'</td>\
								<td>'+ item.date +'</td>\
								<td><div class="btn-group" role="group">\
		    <button type="button" class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal" data-id="'+ item.id +'"><i class="iconfont icon-bianji"></i></button>\
		    <button type="button" class="btn btn-danger delBtn" data-id="'+ item.id +'"><i class="iconfont icon-shanchu1"></i></button>\
		</div></td></tr>'

				　　});
					$('#tbody').html(str);
					
					var pageNum=Math.ceil(data.count/perpage);
					if($(".submitBtn").length==0){
						for(var i=1;i<=pageNum;i++){
						
							if(i==1){
								var newEl=$('<li class="page-item active submitBtn"><a class="page-link" href="#">'+i+'</a></li>');
							}else{
								var newEl=$('<li class="page-item submitBtn"><a class="page-link" href="#">'+i+'</a></li>')
							}
							$(".nextFn").before(newEl);
						}
					}
				}                           
			}
		});
	}
	
	$(function(){
		getInfo(1,5);	
	});

	// 上一页
	$('.preFn').on('click',function() {
		//console.log('点击了上一页')
		var currentPage =  Number($('.pagination .active').text() )
		getInfo(currentPage-1,5)
		$('.pagination .active').prev().addClass("active").siblings().removeClass('active');
	})

	// 下一页
	$('.nextFn').on('click',function() {
	   // console.log('点击了下一页')
	    
		var currentPage =  Number($('.pagination .active').text() )
		getInfo(currentPage+1,5)
		$('.pagination .active').next().addClass("active").siblings().removeClass('active');
	})

	// 页码
	$('.pagination').on('click','.submitBtn',function() {
		// 获取input内容
		$(this).addClass("active").siblings().removeClass('active');
	   var inputValue = Number($('.pagination .active').text())
		getInfo(inputValue,5)
		
	})
	
	// 删除
	$("tbody").on('click','.delBtn',function(){
		var id=$(this).attr("data-id");
		var removeEl=$(this).parents("tr");
		$.ajax({
			 type: "DELETE",
			 url: "http://localhost/0620laravel/public/admin/productClass/"+id,
			 
			 headers: {
			 	'X-CSRF-TOKEN': "{{csrf_token()}}"
			 },
			 dataType: "json",
			 success: function(data){
				 if(data.status==1){
					 getInfo(1,5);
					 $(".submitBtn").remove();
				 }
				 
			 }
		})
	})
	
	// 下拉列表
	function selectList(){
		$.ajax({
			 type: "GET",
			 url: "http://localhost/0620laravel/public/admin/productClass/show",
			 data: {},
			 dataType: "json",
			 success: function(data){
				 console.log(data);
				if (data.status == 1) {
					var str = ''
					$.each(data.data.data,function(i,item){
				　　　　  str += '<option value="'+item.id+'">'+item.className+'</option>'
		
				　　});
					$('#sel1').append(str);

				}                           
			}
		});
	}
	
	selectList();
	// 点击添加产品分类中的保存
	$(".addBtn").click(function(){
		var className=$(".className").val();
		var prevId=$("#sel1").val();
		$.ajax({
			type: "POST",
			url: "http://localhost/0620laravel/public/admin/productClass",
			data: {
				"className":className,
				"prevId":prevId
			},
			headers: {
				'X-CSRF-TOKEN': "{{csrf_token()}}"
			},
			dataType: "json",
			success: function(data){
				if(data.status==1){
					getInfo(1,5);
					$(".submitBtn").remove();	
				}
			}
		})
	})

	// 点击编辑按钮
	$("tbody").on('click','.editBtn',function(){
		var id=$(this).attr("data-id");
		$.ajax({
			type: "get",
			url: "http://localhost/0620laravel/public/admin/productClass/"+id+"/edit",
			data: {},
			headers: {
				'X-CSRF-TOKEN': "{{csrf_token()}}"
			},
			dataType: "json",
			success: function(data){
				if(data.status==1){
					$(".editclassName").val(data.data[0].className);
					$("#sel2").val(data.data[0].prevId);
					$(".hideInput").val(id);
				}
			}
		})
	})

	// 点击编辑中的保存按钮
	$(".saveBtn").click(function(){
		var id=$('.hideInput').val();
		var className=$(".editclassName").val();
		var prevId=$("#sel2").val();
		$.ajax({
			type: "PATCH",
			url: "http://localhost/0620laravel/public/admin/productClass/"+id,
			data: {
				"className":className,
				"prevId":prevId
			},
			headers: {
				'X-CSRF-TOKEN': "{{csrf_token()}}"
			},
			dataType: "json",
			success: function(data){
				console.log(data);
				if(data.status==1){
					getInfo(1,5);	
				}
			}
		})
	})
</script>