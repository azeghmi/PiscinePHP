var tab = [];
var i = 0;
window.onload = function(){
    var tab;
    $.ajax({
        type: 'get',
        url: 'select.php',
      	success: function (response) {
		var tab = JSON.parse(response);
			for (var i = 0; i < tab.length; i++) {
				if (tab[i] != null) {
					create_div(tab[i][1], 0);
				}
			}
		}
	})
}	
function create_div(content, num) {
	if (content != null)
		$('#ft_list').prepend($('<div>' + content + '</div>').click(remove_todo));
     content = num ? content : null; 
     $.ajax({
        type: 'POST',
        url: 'insert.php?num=' + num,
        data: {content:content,i},
    });
}
function remove_todo() {
	if (confirm("Remove the TODO?")) {
		this.remove();
		remove_data(this.innerHTML);
	}
}
function remove_data(content) {
	$.ajax({
		type: "GET",
		url: "delete.php?" + content + "=" + content,
		success: function () {}
	});
}
function prompt_new() {
    var content;
    if (content = prompt("Add to do :"))
        create_div(content, 1);
}
