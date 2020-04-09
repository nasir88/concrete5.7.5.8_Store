var StoreDashboard = {};

StoreDashboard.Product = {
    init: function(){
        this.highlightProductGroupTab();
        this.setupProductMenu();
    },
    highlightProductGroupTab: function(){
        var url = window.location.toString();
        $('#group-filters li a').each(function(){
            var href = $(this).attr('href');
            if(url == href) {
                $(this).parent().addClass("active");
                $(this).parent().removeClass("activeFirst");
            }
        });
    },
    setupProductMenu: function(){
        $("a[data-pane-toggle]").click(function(e){
            e.preventDefault();
            var paneTarget = $(this).attr('href');
            paneTarget = paneTarget.replace('#','');
            $(".store-pane, a[data-pane-toggle]").removeClass('active');
            $('#'+paneTarget).addClass("active");
            $(this).addClass("active");
        });
    }
};

StoreDashboard.ProductGroup = {
    init: function(){
        this.setupButtons();
    },
    setupButtons: function(){
        $(".btn-delete-group").click(function(){
            StoreDashboard.ProductGroup.delete($(this).parent().attr('data-group-id'));
        });
        $(".btn-save-group-name").click(function(){
            var groupID = $(this).parent().attr("data-group-id");
            var groupName = $(this).parent().find(".edit-group-name").val();
            StoreDashboard.ProductGroup.save(groupID,groupName);
        });
        $(".btn-edit-group-name").click(function(){
            var groupID = $(this).parent().attr("data-group-id");
            StoreDashboard.ProductGroup.edit(groupID);
        });
        $(".btn-cancel-edit").click(function(){
            var groupID = $(this).parent().attr("data-group-id");
            StoreDashboard.ProductGroup.cancel(groupID);
        });
    },
    delete: function(groupID){
	
		//alert(groupID);
        //var confirmDelete = confirm(vividStore.Strings.AreYouSure);
        var confirmDelete = confirm($(".group-list").attr("msg-delete-url"));
		
        if(confirmDelete == true) {
			
			$("#GroupProduct"+groupID+" .group-name, .btn-edit-group-name").hide();
			$("#GroupProduct"+groupID+" .edit-group-name, .btn-cancel-edit, .btn-save-group-name, .btn-delete-group").attr("style","display: none");
			$(".loader").attr("style","vertical-align: middle; display: inline-block !important");
			
            var deleteurl = $(".group-list").attr("data-delete-url");
            $.ajax({
                url: deleteurl+"/"+groupID,
                success: function() {
					$(".loader").hide();
                    $("li[data-group-id='"+groupID+"']").remove();
                },
                error: function(){
                    alert(vividStore.Strings.Error);
                }
            });
        }
    },
    save: function(groupID,groupName){
        var saveurl = $(".group-list").attr("data-save-url");
		
		$("#GroupProduct"+groupID+" .group-name, .btn-edit-group-name").hide();
		$("#GroupProduct"+groupID+" .edit-group-name, .btn-cancel-edit, .btn-save-group-name, .btn-delete-group").attr("style","display: none");
		$(".loader").attr("style","vertical-align: middle; display: inline-block !important");
		
        $.ajax({
            url: saveurl+"/"+groupID,
            data: {gName: groupName},
            type: 'post',
            success: function() {
				$(".loader").hide();
                $("#GroupProduct"+groupID+" .group-name").text(groupName);
				$("#GroupProduct"+groupID+" .btn-edit-group-name, .group-name, .btn-delete-group").show();
				$("#GroupProduct"+groupID+" .edit-group-name, .btn-cancel-edit, .btn-save-group-name").attr("style","display: none");
			
                //$("li[data-group-id='"+groupID+"']").find(".group-name").text(groupName);
                //$("li[data-group-id='"+groupID+"']").find(".btn-edit-group-name,.group-name").show();
                //$("li[data-group-id='"+groupID+"']").find(".edit-group-name, .btn-cancel-edit, .btn-save-group-name").attr("style","display: none");
            },
            error: function(){
                alert(vividStore.Strings.Error);
            }
        });
    },
    edit: function(groupID){
		var GroupName = $("#GroupProduct"+groupID+" .group-name"+groupID).text();
		
		$("#GroupProduct"+groupID+" .edit-group-name"+groupID+"").val(GroupName);
		$("#GroupProduct"+groupID+" .group-name"+groupID+", .btn-edit-group-name"+groupID+"").hide();
        $("#GroupProduct"+groupID+" .edit-group-name"+groupID+", .btn-cancel-edit"+groupID+", .btn-save-group-name"+groupID).attr("style","vertical-align: middle; display: inline-block !important");
		
        //$("li['data-group-id="+groupID+"']").find(".btn-edit-group-name, .group-name").hide();
        //$("li['data-group-id="+groupID+"']").find(".edit-group-name, .btn-cancel-edit, .btn-save-group-name").attr("style","display: inline-block !important");
    },
    cancel: function(groupID){
		$("#GroupProduct"+groupID+" .btn-edit-group-name, .group-name").show();
        $("#GroupProduct"+groupID+" .edit-group-name, .btn-cancel-edit, .btn-save-group-name").attr("style","display: none");
		
        //$("li['data-group-id="+groupID+"']").find(".btn-edit-group-name, .group-name").show();
        //$("li['data-group-id="+groupID+"']").find(".edit-group-name, .btn-cancel-edit, .btn-save-group-name").attr("style","display: none");
    }
}

$(function(){
    StoreDashboard.ProductGroup.init();
    StoreDashboard.Product.init();

    $("#btn-delete-order").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        var confirmDelete = confirm('Are You Sure?');
        if(confirmDelete == true) {
            window.location = url;
        }
    });
    $("#btn-generate-page").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        var pageTemplate = $("#selectPageTemplate").val();
        var confirmDelete = confirm('Just to let you know, any changes to the product will not be saved. Are you sure you want to proceed?');
        if(confirmDelete == true) {
            window.location = url+'/'+pageTemplate;        
        }
    });

    $(".add-to-panel-list .panel-heading").click(function(){
       $(this).next().toggleClass('open');
    });
    $('.add-to-panel-list li a').click(function(e){
        e.preventDefault();
        var type = $(this).attr('data-promotion');
        var handle = $(this).attr('data-handle');
        if(type=='reward-type'){
            var title = vividStore.Strings.AddRewardType;
        } else if(type=='rule-type'){
            var title = vividStore.Strings.AddRuleType;
        }
        var formTemplate = _.template($('#'+handle+'-'+type+'-form').html());

        $.fn.dialog.open({
            title: title,
            width: 500,
            height: 400,
            modal: true,
            element: $('<div>' + formTemplate() + '</div>'),
            open: function(){
                $('.ui-dialog').addClass('vivid-store-dialog ccm-ui');
            },
            buttons: [
                {
                    text: vividStore.Strings.Add,
                    click: function () {
                        var completeFunction = $('#'+handle+'-'+type+'-form').attr('data-complete-function');
                        window[completeFunction]();
                        $(this).dialog('close');
                        $(".add-to-panel-list .panel-body").removeClass('open');
                    }
                },
                {
                    text: vividStore.Strings.Cancel,
                    click: function () {
                        $(this).dialog('close');
                    }
                }
            ]
        });
    });

    $(window).on('on_promotion_reward_save', function(event,data){
        var listItemTemplate = _.template($('#promotion-list-item').html());
        var params = {
            handle: data.handle,
            content: data.template
        }
        type = data.type.replace('-type','');
        $("#promotion-"+type+"-list").append(listItemTemplate(params));
    });

});

function searchForProduct(id){
    var target = '#product-search-form-'+id;
    var inputField = $(target + " .product-search-input");
    var searchString = inputField.val();
    if(searchString.length > 0){
        $(target + " .product-search-results").addClass("active");
        $.ajax({
            type: "post",
            url: $(target).attr('data-ajax-url'),
            data: {query: searchString},
            success: function(html){
                $(target + " .results-list").html(html);
                $(target + " .product-search-results ul li").click(function(){
                    var pID = $(this).attr('data-product-id');
                    var productName = $(this).text();
                    $(target + " .product-id-field").val(pID);
                    $(target + " .product-search-results").removeClass("active");
                    $(target + " .product-search-input").val('');
                    $(target + " .selected-product").html(productName);
                });
                $("*:not(.product-search-results ul li)").click(function(){
                    $(target + " .product-search-results").removeClass("active");
                });
            }
        });
    } else {
        $(target + " .product-search-results").removeClass("active");
    }
}

function updateTaxStates(){
    var countryCode = $("#taxCountry").val();
    var selectedState = $("#savedTaxState").val();
    var stateutility = $("#settings-tax").attr("data-states-utility");
    $.ajax({
       url: stateutility,
       type: 'post',
       data: {country: countryCode, selectedState: selectedState, type: "tax"},
       success: function(states){
           $("#taxState").replaceWith(states);

           if (states.indexOf(" selected ") >= 0) {
               $("#taxState").prepend("<option value=''></option>");
           } else {
               $("#taxState").prepend("<option value='' selected='selected'></option>");
           }
       } 
    });
}
updateTaxStates();

//Section Group
function addNameSection(){

	$(".alert").hide();
	
	var addSectionCount=$("#addSectionCount").val();
	addSectionCount++;
	$("#addSectionCount").val(addSectionCount);
	$("#nameBoxWrap").append('<div id="nameBox'+addSectionCount+'" class="row marginTop05"><div class="col-md-6"><div class="input-group"><input type="hidden" name="getGroupID" id="getGroupID'+addSectionCount+'" value="-"><input type="text" class="form-control" name="name[]" id="name'+addSectionCount+'"><span class="input-group-btn"><span class="btn btn-danger" onclick=removeNameSection("'+addSectionCount+'")><i class="fa fa-trash trash'+addSectionCount+'"></i><i class="fa fa-spinner spinner'+addSectionCount+' fa-spin" style="display:none"></i></span></span></div></div></div>');
}

function removeNameSection(removeId){
			
	var addSectionCount=$("#addSectionCount").val();
	if(addSectionCount > 0){
		addSectionCount--;
		$("#addSectionCount").val(addSectionCount);
		
		var confirmDelete = confirm($("#frmSection").attr("msg-delete-url"));
		if(confirmDelete == true) {

			$(".alert").hide();
			$("#name"+removeId+"-error").remove();
		
 			var groupID = $("#getGroupID"+removeId).val();
			if(groupID == '-') {
				$("#nameBox"+removeId).remove();
			}else{

				$(".trash"+removeId).attr("style","display:none!important");
				$(".spinner"+removeId).attr("style","display:inherit!important");
				
				var deleteurl = $("#frmSection").attr("data-delete-url");
				$.ajax({
					url: deleteurl+"/"+groupID,
					success: function() {
						$("#nameBox"+removeId).remove();
					},
					error: function(){
						alert(vividStore.Strings.Error);
					}
				});
					
			}
		}
		
	}
}

$(function() {
	  
	$("#frmSection").validate({

		errorElement: "div",
		errorPlacement: function(error, element) {
			error.appendTo("div#errors2");
			$(".alert").hide();
		}, 
		// Specify the validation rules
		rules: {
			'name[]': {
				required : true,
				maxlength: 100
			}
		},
		
		// Specify the validation error messages
		messages: {
			'name[]': {
				required: "* You did not enter anything for the Group Name",
				maxlength: "* Keep the Group Name under 100 Characters"
			}
		},
		
		submitHandler: function(form) {
			form.submit();
		}
		
	});
	
});





