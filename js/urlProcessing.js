function changePage(elem) {
	var pageN = elem.innerHTML; //filter this 
	var params = window.location.search.substr(1).split("&");
	var url = "";
	for (var i = 0; i < params.length; i++) {
		if (!params[i].startsWith('page')) {
			url += params[i] + '&';
		}
	}
    window.location.href = '?'+url+'page='+pageN;
}

function changeSorting(elem) {
	var sortField = elem.getAttribute('field');
	var sortDirection = elem.getAttribute('direction'); //every sorting change redirects to the first page of results. it's ok
	var url = '?s_field='+sortField+'&s_dir='+sortDirection;
	window.location.href = url;
}