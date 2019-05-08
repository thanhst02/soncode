$(function() {
	$('.pagination .active').attr('class', 'selected');
	$('.pagination .disabled').attr('class', 'hidden');
	$('[name="order-type"]').change(function(){
		$('#filter').submit();
	});
	$('[name="page-display"]').change(function(){
		$('#filter').submit();
	});
	$('[name="order"]').change(function(){
		$('#filter').submit();
	});
	$('.clear-mini-cart').click(function(){
		$.ajax({
	        url : clear_cart, // gửi ajax đến file
	    });
		$('.cart-popup .empty').show();
		$('.cart-popup .mini-cart').hide();
		$('.cart-popup .mini-cart .mini-cart-list').empty();
		$('.cart-popup .mini-cart .mini-cart-total').empty();
		$('.cart-heading b').html('0');
		$('.top-icon-cart span').html('<i class="fa fa-shopping-cart"></i>'+ ' 0' +' item(s) - '+ '0' +' vnd');
	});
});

$('.product-item-add .add-cart').click(function(){
	var id = $(this).siblings('.product-id').val();
	var quantity = $(this).siblings('.product-quantity').val();
	$.ajax({
        url : url_cart_add, // gửi ajax đến file result.php
        type : "get", // chọn phương thức gửi là get
        data : { // Danh sách các thuộc tính sẽ gửi đi
            id : id,
            type : 1,
            quantity : quantity
        },
        success : function (result){
            if (result) {
            	updateMiniCart(result);
            	alert('Thêm sản phẩm thành công!');
            }
        }
    });
});

$(function(){
	$.ajax({
        url : url_cart_add, // gửi ajax đến file result.php
        type : "get", // chọn phương thức gửi là get
        data : { // Danh sách các thuộc tính sẽ gửi đi
            type : 0,
        },
        success : function (result){
            if (result) {
            	updateMiniCart(result);
            }
        }
    });
});

function updateMiniCart(result) {
	var sub_total = 0;
	var sale_total = 0;
	var total = 0;
	var index = 0;
	$('.mini-cart .mini-cart-list').empty();
	for (var key in result) {
		var sub = result[key]['price'] * result[key]['quantity'] ;
		var sale = sub * result[key]['sale'] / 100;
		var mini_cart = '';
		mini_cart += '<li>';
		mini_cart += '<a class="cart-mini-lft" href="'+ result[key]['single'] +'"><img src="'+ result[key]['image'] +'" alt="'+ result[key]['name'] +'"></a>';
		mini_cart += '<div class="cart-body">';
		mini_cart += '<a href="'+ result[key]['single'] +'">'+ result[key]['name'] +'</a>';
		mini_cart += '<div class="price"><span>Giá: '
		+ result[key]['price'] +' - </span><span>Số lượng: '
		+ result[key]['quantity'] +' - </span><span>Giảm: '
		+ sale +'</span></div>';
		// mini_cart += '</div><input class="cart-item-id" type="hidden" value="'+ result[key]['id'] +'">';
		mini_cart += '<a class="remove remove-item" href="#" onclick="deleteCart('+ result[key]['id'] +')"><i class="fa fa-times" title="Remove"></i></a>';
		mini_cart += '</li>';
		$('.mini-cart .mini-cart-list').append(mini_cart);
		index++;
		sub_total +=  sub ;
		sale_total += sale;
	}
	if (index != 0) {
		var total = sub_total - sale_total;
		var mini_cart_total = '';
			mini_cart_total += '<div class="clearfix">';
			mini_cart_total += '<div class="left">Tổng giá:</div>';
			mini_cart_total += '<div class="right">'+ sub_total +' VND</div>';
			mini_cart_total += '</div>';
			mini_cart_total += '<div class="clearfix">';
			mini_cart_total += '<div class="left">Giảm:</div>';
			mini_cart_total += '<div class="right">'+ sale_total +' VND</div>';
			mini_cart_total += '</div>';
			mini_cart_total += '<div class="clearfix">';
			mini_cart_total += '<div class="left">Thành tiền:</div>';
			mini_cart_total += '<div class="right">'+ total +' VND</div>';
			mini_cart_total += '</div>';
		$('.mini-cart .mini-cart-total').empty();
		$('.mini-cart .mini-cart-total').html(mini_cart_total);
		$('.cart-popup .empty').hide();
		$('.cart-popup .mini-cart').show();
		$('.cart-heading b').html(index);
		$('.top-icon-cart span').html('<i class="fa fa-shopping-cart"></i>'+ index +' item(s) - '+ total +' vnd');
	}else{
		$('.cart-popup .empty').show();
		$('.cart-popup .mini-cart').hide();
		$('.cart-popup .mini-cart .mini-cart-list').empty();
		$('.cart-popup .mini-cart .mini-cart-total').empty();
		$('.cart-heading b').html('0');
		$('.top-icon-cart span').html('<i class="fa fa-shopping-cart"></i>'+ ' 0' +' item(s) - '+ '0' +' vnd');
	}
};

function deleteCart(id){
	$.ajax({
        url : delete_cart, // gửi ajax đến file result.php
        type : "get", // chọn phương thức gửi là get
        data : { // Danh sách các thuộc tính sẽ gửi đi
            id : id,
        },
        success : function (result){
            if (result) {
            	updateMiniCart(result);
            }
        }
    });
};