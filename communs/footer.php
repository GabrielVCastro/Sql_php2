	<script type="text/javascript">
	$(document).ready(function(){
		$('.mask_cpf').mask('000.000.000-00', {reverse: true})
		$('.mask_data').mask('0000/00/00 00:00:00');
		$('.mask_cep').mask('00000-000');
		var SPMaskBehavior = function (val) {
		  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
		spOptions = {
		  onKeyPress: function(val, e, field, options) {
		      field.mask(SPMaskBehavior.apply({}, arguments), options);
		    }
		};	

		$('.mask_celular').mask(SPMaskBehavior, spOptions);
		$('.mask_cnpj').mask('00.000.000/0000-00', {reverse: true});
		 $('.money2').mask("#.##0,00", {reverse: true});

	});
</script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>




</body>
</html>