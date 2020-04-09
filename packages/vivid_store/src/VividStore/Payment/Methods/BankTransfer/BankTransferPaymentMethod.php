<?php
namespace Concrete\Package\VividStore\Src\VividStore\Payment\Methods\BankTransfer;

use Core;
use Config;
use Exception;
use Loader;
use Controller;
use \Concrete\Package\VividStore\Src\VividStore\Payment\Method as StorePaymentMethod;
use \Concrete\Package\VividStore\Src\VividStore\Payment\MethodInterface as StorePaymentMethodInterface;

class BankTransferPaymentMethod extends Controller implements StorePaymentMethodInterface
{
	public $external = false;
	public $placeOrder = true;
	
    public function dashboardForm()
    {
        $this->set('form', Core::make("helper/form"));
    }
    
    public function save($data)
    {
    }
	
    public function validate($args, $e)
    {
        //$e->add("error message");        
        return $e;
    }
	
    public function checkoutForm()
    {
        $this->set('form', Core::make("helper/form"));
	
		$pm = StorePaymentMethod::getByHandle('bank_transfer');
		$PaymentMethodDisplayName = $pm->getPaymentMethodDisplayName();
        $this->set("PaymentMethodDisplayName", $PaymentMethodDisplayName);
		
		$this->addFooterItem("
			<script type=\"text/javascript\">
				$(document).ready(function(){
					
					function currencyFormat (num) {
						return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '1,')
					}
					
					$('#txtPaidTotal').bind('change keyup input',function() { 
						var paidTotal = $('#txtPaidTotal').val();
						var paymentAmount = $('#payment-amount').text();
						
						var Paid = Number(paidTotal.replace(/[^0-9\.]+/g,''));
						var Total = Number(paymentAmount.replace(/[^0-9\.]+/g,''));
						
						var Refund = 0;
						if (Paid > Total){
							Refund = (Paid - Total);
						}
						
						$('#txtPaidRefund').val(currencyFormat(Refund));
					});
					
					jQuery.validator.addMethod('checkAmount', function (value, element) {
						var paidTotal = $('#txtPaidTotal').val();
						var paymentAmount = $('#payment-amount').text();
						
						var Paid = Number(paidTotal.replace(/[^0-9\.]+/g,''));
						var Total = Number(paymentAmount.replace(/[^0-9\.]+/g,''));
						
						if (Paid >= Total){
							return true;
						}else{
							return false;
						}
					}, '".t('Invalid. This transaction amount is below the current minimum amount').".');
					
					jQuery.validator.addMethod('validDate', function(value, element) {
					   return this.optional(element) ||  /^\d{1,2}\/\d{1,2}\/\d{4}$/.test(value);
					}, '".t('Please enter valid date').".');
					
					$('#payment-form-group').validate({
						rules: {
							txtPaidDate: {
								required: true,
								validDate: true
							},
							txtPaidTime: 'required',
							txtPaidTotal: {
								required: true,
								checkAmount: true
							}
						},
						messages: {
							txtPaidDate: {
								required: '".t('Enter your payment date').".'
							},
							txtPaidTime: '".t('Enter your payment time').".',
							txtPaidTotal: {
								required: '".t('Enter your amount').".'
							}
						},
						submitHandler: function(form) {
							vividStore.waiting('');
							form.submit();
						}
					});
					
					jQuery.extend(jQuery.validator.messages, {
						required: 'This field is required.',
						remote: 'Please fix this field.',
						email: 'Please enter a valid email address.',
						url: 'Please enter a valid URL.',
						date: 'Please enter a valid date.',
						dateISO: 'Please enter a valid date (ISO).',
						number: 'Please enter a valid number.',
						digits: 'Please enter only digits.',
						creditcard: 'Please enter a valid credit card number.',
						equalTo: 'Please enter the same value again.',
						accept: 'Please enter a value with a valid extension.',
						maxlength: jQuery.validator.format('Please enter no more than {0} characters.'),
						minlength: jQuery.validator.format('Please enter at least {0} characters.'),
						rangelength: jQuery.validator.format('Please enter a value between {0} and {1} characters long.'),
						range: jQuery.validator.format('Please enter a value between {0} and {1}.'),
						max: jQuery.validator.format('Please enter a value less than or equal to {0}.'),
						min: jQuery.validator.format('Please enter a value greater than or equal to {0}.')
					});
													
				});
			</script>
		");
		
		
    }
    
    public function submitPayment()
    { 
			
		return array('error'=>0, 
					 'paidDate'=>$_POST['txtPaidDate'],
					 'paidTime'=>$_POST['txtPaidTime'],
					 'paidTotal'=>$_POST['txtPaidTotal'],
					 'transactionReference'=>$_POST['transactionReference'],
					 'paidRefund'=>$_POST['txtPaidRefund'],
					 );
	
        //Error
        //return array('error'=>1, 'errorMessage'=>'');
    }

}
