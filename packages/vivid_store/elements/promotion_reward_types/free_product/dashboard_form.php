<?php 
defined('C5_EXECUTE') or die("Access Denied.");
extract($vars); ?>
<script type="text/x-template" id="free_product-reward-type-form" data-complete-function="addNewFreeProductReward">
    <div class="row">
        <div class="col-xs-12 col-sm-11">
            <div class="form-group">
                <?php echo $productFinder?>
            </div>
        </div>
    </div>
</script>
<script type="text/javascript">
    function addNewFreeProductReward(){
        var fields = {
            rewardTypeID: <?php echo $rewardType->getID()?>,
            productName: $('.vivid-store-dialog .selected-product').text(),
            productID: $('.vivid-store-dialog .product-id-field').val()
        }
        $.ajax({
            url: '<?php echo URL::to('/dashboard/store/promotions/utility/save_reward/')?>',
            data: {
                rewardTypeID: fields.rewardTypeID,
                productID: fields.productID
            },
            method: "post",
            error: function(){
                alert('something went wrong');
            },
            success: function(response){
                onNewFreeProductRewardSuccess(fields,JSON.parse(response));
            }
        });
    }
    function onNewFreeProductRewardSuccess(fields,response){


        var params = {
            rewardTypeID: fields.rewardTypeID,
            productName: fields.productName,
            rewardTypeRewardID: response.rewardTypeRewardID
        }
        var listItemTemplate = _.template($('#free-product-list-item-template').html());
        $(window).trigger('on_promotion_reward_save',[{type:'reward',handle:'<?php echo $rewardType->getHandle()?>',template:listItemTemplate(params)}]);
    }
</script>

<script type="text/x-template" id="free-product-list-item-template">
    <input type="hidden" name="rewardTypeID[]" value="<%=rewardTypeID%>" />
    <input type="hidden" name="rewardTypeRewardID[]" value="<%=rewardTypeRewardID%>" />
    <?php echo t('Free Product: %s', '<strong><%=productName%></strong>')?>
</script>
