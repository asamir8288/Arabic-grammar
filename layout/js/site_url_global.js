function site_url(controller){
    if(!controller){
        controller= '';
    }
    var pathname = $(location).attr('href');
    var url_parts = pathname.split('/');
    var base_url = '';
    if(url_parts[2] == 'localhost' || url_parts[2] == '127.0.0.1'){
        base_url = url_parts[0] + '//' + url_parts[2] + '/'  + url_parts[3] + '/';
    }else{
        base_url = url_parts[0] + '//' + url_parts[2] + '/';
    }
    var url = base_url + controller;
    return url;
}