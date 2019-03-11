<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</div><br><br>
<div class="col-md-12 text-center">&copy; Copyright Shopping Hut</div>

    <script>
	function updateSizes() {
		var sizeString = '';
		for(var i = 1; i <= 12; i++) {
			if(jQuery('#size'+i).val() != '') {
				sizeString += jQuery('#size'+i).val()+':'+jQuery('#qty'+i).val()+','; // example output: small:7,medium:8,
			}
		}
		jQuery('#sizes').val(sizeString);
	}

	function get_child_options(selected) {
		if(typeof selected === 'undefined'){
			var selected = '';
		}
		var parentID = jQuery('#parent').val();
		jQuery.ajax({
			url:'/shoppingHut/admin/parsers/child_categories.php',
			type: 'POST',
			data: {parentID : parentID, selected: selected},
			success: function(data) {
				jQuery('#child').html(data);
			},
			error: function() {
				alert("Something went wrong with the child options!");
			},
		});
	}
	jQuery('select[name="parent"]').change(function(){
		get_child_options();
	});
</script>
</div>
</body>
</html>