/*
 * Function to handle ajax requests
 */
function handle(targetUrl, type) {
	$.ajax( {
		url: targetUrl,
		type: type,
		success: function(results) {
			location.reload();
		}
	});
}