function myajax(option) {

    //默认值
    let method = "get";
    let url = "";
    let arg = {};
    let asyn = true;
    let success = function () {};
    let error = function () {};
    let argStr = "";

    //参数替换
    if (option) {
        if (option.method) method = option.method;
        if (option.url) url = option.url;
        if (option.arg) arg = option.arg;
        if (option.success) success = option.success;
        if (option.error) error = option.error;
    }

    var xmlHttp = new XMLHttpRequest();

    argStr = joinArg(arg);

    //get方式
    if (method === "get") {
        url += "?" + argStr;
    }

    xmlHttp.open(method, url, asyn);

    //post方式
    if (method === "get") {
        xmlHttp.send();
    } else {
        xmlHttp.send(argStr);
    }

    xmlHttp.onreadystatechange = function (e) {

        if (this.readyState == 4 && this.status == 200) {
            try {
                let data = JSON.parse(this.responseText);
                success(data);
            } catch (e) {
                error(e);
            }
        }
    }

    //对象转网址参数字符串
    function joinArg(obj) {

        let str = "";

        for (const item in obj) {

            str += `&${item}=${obj[item]}`;

        }

        str = str.substring(1, );

        return str;

    }

}