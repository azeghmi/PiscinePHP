var tab = JSON.parse(getCookie("ft_list")) || [];

window.onload = function(){
    if (tab.length)
    {
        for (var i = 0; i < tab.length; i++) {
            create_div(tab[i], 0);
        }
    }
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return false;
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
function create_div(content, push) {
    $("<div name='todo' onclick='ft_delete(this)'>" + content + "</div>").appendTo('div#ft_list');
    push ? tab.push(content) : 0;
    push ? setCookie("ft_list", JSON.stringify(tab), 1) : 0;
}
function ft_delete(t) {
    
    if (confirm('Are you sure to delete this todo ?'))
    {
        t.remove();
        index = tab.indexOf(t.innerHTML);
        tab.splice(index, 1);
        setCookie("ft_list", JSON.stringify(tab), 1);
    }
    return ;
}
function prompt_new() {
    var content;
    if (content = prompt("Add to do :"))
        create_div(content, 1);
}