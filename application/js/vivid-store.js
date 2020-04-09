var vividStore = {

	openModal: function(content) {
		if ($( ".whiteout" ).length ) {
			$( ".whiteout" ).empty().html(content);
		} else {
			$("body").append("<div class='whiteout'>"+content+"</div>");

			//$(".whiteout").click(function(e){
			//     if(e.target != this) return;  // only allow the actual whiteout background to close the dialog
			//    vividStore.exitModal();
			//});

			$(document).keyup("keyup.vividwhiteout", function(e){
				if(e.keyCode === 27) {
					vividStore.exitModal();
					$(document).unbind("keyup.vividwhiteout");
				}
			});
		}
	},
	waiting: function(msg){
		if (msg === '') {
			vividStore.openModal("<div class='nsr-spinner'><i class='fa fa-5x fa-spinner fa-spin'></i><br></div>");
		}else{
			vividStore.openModal("<div class='nsr-spinner'><i class='fa fa-5x fa-spinner fa-spin'></i><br>"+msg+"</div>");
		}
	},
	exitModal: function(){
		$(".whiteout").remove();
	},

	
	
//PRODUCT LIST
    
    //Open Product Modal
    productModal: function(pID){
        vividStore.waiting('');
        $.ajax({
           url: vividStore.URLs.ProductModal,
           data: {pID: pID},
           type: 'post',
           success: function(modalContent){
               vividStore.openModal(modalContent);
           },
           error: function(){
               alert("something went wrong");
           }
        });
    },
	
	
	
//ADDRESS
	
	//Display Address
    displayAddress: function(baID,baMode,msg) {
        vividStore.waiting(msg);
        $.ajax({
            url: vividStore.URLs.Address+'/getAddressModal',
            data: {
				baID: baID,
				baMode: baMode
			},
            type: "post",
            success: function(data){
                vividStore.openModal(data);
            },
            error: function(){
               alert("something went wrong");
            }
        });
    },
	
	//Load Address
	loadAddress: function(){
        $.ajax({
            url: vividStore.URLs.Address+"/getAddressListElement",
            success: function(html){
                $("#checkout-address").html(html);
				vividStore.updateShippingGrandTotal();
            }
        });  
    },
	
	//Default Address
	defaultAddress: function(baID,msg){
	
		if ((window.location.origin + window.location.pathname) !== vividStore.URLs.Checkout) {
			msg = '';
		}
	
		vividStore.waiting(msg);
		$.ajax({ 
			url: vividStore.URLs.Address+"/defaultAddressModal",
			data: {baID: baID},
			type: 'post',
			success: function(data) {
				vividStore.showShippingMethods();
			}
		});
		
    },
	
	//Remove Address
	removeAddress: function(baID,msg){
	
		var answer = confirm('Are you sure you want to delete this?');
	
		if (answer){
			vividStore.waiting(msg);
			$.ajax({ 
				url: vividStore.URLs.Address+"/removeAddressModal",
				data: {baID: baID},
				type: 'post',
				success: function(data) {
					vividStore.loadAddress();
				}
			}); 
		}else{
			return false;
		}
		
    },


	
//SHIPPING

	//Show Shipping Method
    showShippingMethods: function(){
        $.ajax({
            url: vividStore.URLs.Checkout+"/getShippingMethods",
            success: function(html){
                $("#checkout-shipping-method-options").html(html);
				vividStore.loadAddress();
            }
        });  
    },

	//Update Shipping Total
	updateShippingGrandTotal: function(){
		var smID = $("#checkout-shipping-method-options input[type='radio']:checked").val();
				
		$.ajax({
			type: 'post',
			data: {smID: smID},
			url: vividStore.URLs.Cart + "/getShippingTotal",
			success: function (total) {
				$("#shipping-total").text(total);
				$.ajax({
					url: vividStore.URLs.Cart + "/getTaxTotal",
					success: function (results) {
						var taxes = JSON.parse(results);
						$("#taxes").html("");
						for (var i = 0; i < taxes.length; i++) {
							if (taxes[i].taxed === true) {
								$("#taxes").append('<li class="line-item tax-item"><strong>' + taxes[i].name + ":</strong> <span class=\"tax-amount\">" + taxes[i].taxamount + "</span></li>");
							}
						}
					}
				});
				$.ajax({
					url: vividStore.URLs.Cart + "/getTotal",
					success: function (total) {
						$(".total-amount").text(total);
						vividStore.exitModal();
					}
				});
			}
		});
    },	


	
//DISCOUNT

	//Insert Discount
    insertDiscount: function(){
		
        var txtCode = $("#txtCode").val();
        vividStore.waiting('');
				
		$.ajax({ 
			url: vividStore.URLs.Discount+"/storeCode",
			data: {txtCode: txtCode},
			type: 'post',
			success: function(data) {
				var res = jQuery.parseJSON(data);
				//alert(res.action);
				vividStore.updateDiscountGrandTotal(res);
			}
		});

    },

	//Update Discount Total
	updateDiscountGrandTotal: function(res){
				
		$.ajax({
			url: vividStore.URLs.Cart + "/getDiscountTotal",
			success: function (total) {
				$(".discount-total").text(total);

				$.ajax({
					url: vividStore.URLs.Cart + "/getTotal",
					success: function (total) {
						$(".total-amount").text(total);
						vividStore.showDiscountCode(res);
					}
				});
			}
		});
    },	
	
	//Show Discount Code
    showDiscountCode: function(res){
        $.ajax({
            type: "POST",
            data: res,
            url: vividStore.URLs.Discount+"/getDiscountListElement",
            success: function(html){
                $("#checkout-discount-method").html(html);
				vividStore.exitModal();
            }
        });  
    },
	
	//Reset Discount Code
    resetDiscountCode: function(){
        vividStore.waiting('');
		$("#txtCode").val('');
		
        $.ajax({
            type: "POST",
            url: vividStore.URLs.Discount+"/clearCode",
            success: function(data){
				var res = jQuery.parseJSON(data);
				vividStore.updateDiscountGrandTotal(res);
            }
        });  
    },

	
	
//SHOPPING CART

	//Display Item to Cart
    displayCart: function(res) {
        vividStore.waiting('');
        $.ajax({
            type: "POST",
            data: res,
            url: vividStore.URLs.Cart+'/getmodal',
            success: function(data){
                vividStore.openModal(data);
            }
        });
    },

    //Add Item to Cart
    addToCart: function(pID, type){
        var form;
        if(type =='modal'){
            form = $('#form-add-to-cart-modal-'+pID);
        } else if (type == 'list') {
            form = $('#form-add-to-cart-list-'+pID);
        } else {
            form = $('#form-add-to-cart-'+pID);
        }
        var qty = $(form).find('.product-qty').val();
        if(qty > 0){
            var cereal = $(form).serialize(); //haha, cereal.
            vividStore.waiting('');
            $.ajax({ 
                url: vividStore.URLs.Cart+"/add",
                data: cereal,
                type: 'post',
                success: function(data) {
                    var res = jQuery.parseJSON(data);

                    if (res.product.pAutoCheckout == '1') {
                        window.location.href = vividStore.URLs.Checkout;
                        return false;
                    }

                    vividStore.displayCart(res);

                    $.ajax({
                       url: vividStore.URLs.Cart+'/getTotalItems',
                       success: function(itemCount){
                           $(".vivid-store-utility-links .items-counter").text(itemCount);
                           if (itemCount > 0) {
                               $(".vivid-store-utility-links").removeClass('vivid-cart-empty');
                           }
                       } 
                    });
                    $.ajax({
                       url: vividStore.URLs.Cart+'/getSubTotal',
                       success: function(subTotal){
                           $(".vivid-store-utility-links .total-cart-amount").text(subTotal);
                       } 
                    });
                }
            });
        } else {
            alert(QTYMESSAGE);
        }
    },
    
    //Update Item in Cart
    updateItem: function(instanceID, modal){
        var qty = $("*[data-instance-id='"+instanceID+"']").find(".cart-list-item-links input").val();
        vividStore.waiting('');
        $.ajax({ 
            url: vividStore.URLs.Cart+"/update",
            data: {instance: instanceID, pQty: qty},
            type: 'post',
            success: function(data) {
                if (modal) {
                    var res = jQuery.parseJSON(data);
                    vividStore.displayCart(res);
                }

                $.ajax({
                    url: vividStore.URLs.Cart + '/getTotalItems',
                    success: function (itemCount) {
                        $(".vivid-store-utility-links .items-counter").text(itemCount);

                        if (itemCount == 0) {
                            $(".vivid-store-utility-links .items-counter").text(0);
                            $(".vivid-store-utility-links .total-cart-amount").text("0.00");
                            //$(".vivid-store-utility-links").addClass('vivid-cart-empty');
                        } else {
                            $.ajax({
                                url: vividStore.URLs.Cart + "/getSubTotal",
                                success: function (total) {
                                    $(".cart-grand-total-value").text(total);
                                }
                            });

                            $.ajax({
                                url: vividStore.URLs.Cart + '/getSubTotal',
                                success: function (subTotal) {
                                    $(".vivid-store-utility-links .total-cart-amount").text(subTotal);
                                }
                            });
                        }
                    }
                });

            }
        }); 
    },
    
    //Remove Item in Cart
    removeItem: function(instanceID, modal){
        vividStore.waiting('');
        $.ajax({ 
            url: vividStore.URLs.Cart+"/remove",
            data: {instance: instanceID},
            type: 'post',
            success: function(data) {
                if (modal) {
                    var res = jQuery.parseJSON(data);
                    vividStore.displayCart(res);
                }

                $.ajax({
                    url: vividStore.URLs.Cart + '/getTotalItems',
                    success: function (itemCount) {
                        $(".vivid-store-utility-links .items-counter").text(itemCount);

                        if (itemCount == 0) {
                            $(".vivid-store-utility-links .items-counter").text(0);
                            $(".vivid-store-utility-links .total-cart-amount").text("0.00");
                            //$(".vivid-store-utility-links").addClass('vivid-cart-empty');
                        } else {
                            $.ajax({
                                url: vividStore.URLs.Cart + "/getSubTotal",
                                success: function (total) {
                                    $(".cart-grand-total-value").text(total);
                                }
                            });

							$.ajax({
								url: vividStore.URLs.Cart + '/getSubTotal',
								success: function (subTotal) {
									$(".vivid-store-utility-links .total-cart-amount").text(subTotal);
								}
							});
                        }
						
                    }
                });
            }
        }); 
    },
    
    //Clear the Cart
    clearCart: function(modal){
        vividStore.waiting('');
         $.ajax({ 
             url: vividStore.URLs.Cart+"/clear",
             success: function(data) {
                 if (modal) {
                     var res = jQuery.parseJSON(data);
                     vividStore.displayCart(res);
                 }

                 $.ajax({
                     url: vividStore.URLs.Cart+"/getSubTotal",
                     success: function(total){
                         $(".cart-grand-total-value").text(total);
                         $(".cart-page-cart-list-item").remove();
                         $(".vivid-store-utility-links .items-counter").text(0);
                         $(".vivid-store-utility-links .total-cart-amount").text("0.00");
                         //$(".vivid-store-utility-links").addClass('vivid-cart-empty');
						
                     }
                 });

             }
        });
    },

	
	
//CHECKOUT

    loadViaHash: function(){
        var hash = window.location.hash;
        hash = hash.replace('#','');
        if(hash != ""){
            //$(".checkout-form-group .checkout-form-group-body").hide();
            $(".active-form-group").removeClass('active-form-group');
            var pane = $("#checkout-form-group-"+hash);
            pane.addClass('active-form-group');

            $('html, body').animate({
                scrollTop: pane.offset().top
            });
        }
    },  
	showPaymentForm: function(){
        var pmID = $("#checkout-payment-method-options input[type='radio']:checked").attr('data-payment-method-id');
        $('.payment-method-container').addClass('hidden');
        $(".payment-method-container[data-payment-method-id='"+pmID+"']").removeClass('hidden');
    },
    addGetQueryParam: function(key, value) {
        key = encodeURI(key); value = encodeURI(value);
        var kvp = document.location.search.substr(1).split('&');
        var i=kvp.length;
        var x;
        while (i--) {
            x = kvp[i].split('=');
            if (x[0]==key) {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }
        if (i<0) {
            kvp[kvp.length] = [key,value].join('=');
        }
        document.location.search = kvp.join('&');
    }
    
};

$(function() {

	//Load Payment Form
    vividStore.showPaymentForm();
	
	//Button Continue Checkout
	$(document).on("click", ".btn-continueCheckout", function(){
		vividStore.waiting('');
		window.location.href = vividStore.URLs.Checkout;
	});	
	
	//Button Place Order
	$(document).on("click", ".btn-place-order", function(){
		vividStore.waiting('');
	});
	
	//If This Page is Checkout Page
    if ((window.location.origin + window.location.pathname) == vividStore.URLs.Checkout) {
        //vividStore.loadViaHash();
		$(document).on("click", ".btn-continueShopping", function(){
			vividStore.waiting('');
			window.location.href = vividStore.URLs.Home;
		});
    }else{
		$(document).on("click", ".btn-continueShopping", function(){
			vividStore.exitModal('');
		});
	};
	
	//Choose Shipping Method
	$(document).on("change", "#checkout-shipping-method-options input[type='radio']", function(){

		if ($(this).is(":checked")) {
			var msg = $("#checkout-form-group-shipping-method").attr("msg");
			vividStore.waiting(msg);
			if ($("#checkout-shipping-method-options input[type='radio']:checked").length < 1) {
				$('.whiteout').remove();
				alert("You must choose a shipping method");
			} else {
				vividStore.updateShippingGrandTotal();
			}
		}
    });
	
	//Sort product List
	$(document).on("change", ".product-list-sort", function(){
        var id = $(this).attr('id').replace('product-list-sort-','');
        vividStore.addGetQueryParam('sort'+id,$(this).val());
    });
	
	//Choose Payment Method
	$(document).on("change", "#checkout-payment-method-options input[type='radio']", function(){
        vividStore.showPaymentForm();
    });
	
	
	
	
	
	$("#checkout-form-group-discount").validate({
		rules: {
			example4: {
				email: true,
				required: true
			},
			example5: {
				required: true
			}
		},
		messages: {
			example5: "Just check the box<h5 class='text-danger'>You aren't going to read the EULA</h5>"
		},
		tooltip_options: {
			example4: {
				trigger: 'focus'
			},
			example5: {
				placement: 'right',
				html: true
			}
		},
		submitHandler: function(form) {
			//form.submit();
			//alert('aaaaa');
			vividStore.insertDiscount();
		},
		invalidHandler: function(form, validator) {
			$("#validity_label").html('<div class="alert alert-danger">There be ' + validator.numberOfInvalids() + ' error' + (validator.numberOfInvalids() > 1 ? 's' : '') + ' here.  OH NOES!!!!!</div>');
		}
	});
	
	
});