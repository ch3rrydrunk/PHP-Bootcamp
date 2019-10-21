let i = 0;

function setCookie(cname, cvalue, exdays)
{
    let d = new Date();
    let term = exdays > 0 ? exdays*24*60*60*1000 : -100;
    d.setTime(d.getTime() + term);
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(name)
{
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function removetodo(obj)
{
    if (confirm("Delete this?"))
    {
        
        obj.remove();
        setCookie(obj.getAttribute("id"), "", -1);
        setCookie("number", getCookie(number) - 1, 2);
    }
}

function newtodo()
{
    let user_input = prompt( "Please, specify your next task!", "Dominate humanity");
    if (user_input != null)
    {
        let list = document.getElementById("ft_list");
        let todo = document.createElement("div");
        todo.className = "todo";
        todo.innerHTML = user_input;
        todo.setAttribute("id", "todo" + i);
        let obj = {input : user_input, index : i};
        setCookie("todo" + i, JSON.stringify(obj), 2);
        i += 1;
        setCookie("number", i, 2);
        todo.setAttribute("onclick", "removetodo(this);");
        list.prepend(todo);
    }
    console.log(document.cookie);
}

function load()
{
    let a_cookies = document.cookie.split(';');
    console.log(a_cookies);
    a_cookies.forEach(function(element) {
        let cookie = element.split("=");
        if (cookie[0].includes("todo"))
        {
            console.log(cookie);
            let list = document.getElementById("ft_list");
            let todo = document.createElement("div");
            todo.className = "todo";
            todo.innerHTML = JSON.parse(cookie[1]).input;
            todo.setAttribute("id", cookie[0]);
            todo.setAttribute("onclick", "removetodo(this);");
            list.prepend(todo);
        }
        else if (cookie[0].includes("number"))
            i = cookie[1];
        });
}
