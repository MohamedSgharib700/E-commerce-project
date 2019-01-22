$(document).ready(function() {
    var a = 0;
    $('.chatlist a').each(function() {
        a += parseInt($(this).find('span').html());
        if (parseInt($(this).find('span').html()) && !$(this).hasClass('has-message')) {
            $(this).addClass('has-message');
        }else if(parseInt($(this).find('span').html()) == 0){
            $(this).removeClass('has-message');
        }
        $('.live-chat span').text(a);
    });
    if(a){
        $('.live-chat').addClass('has-message');
    }
});

$(document).on('click', function(event) {
    if (!$(event.target).is('.live-chat, .live-chat *')) {
        // console.log(event.target);
        $('.chatlist').fadeOut(200);
    }
});
$(document).on('click', '.live-chat', function() {
    $('.chatlist').fadeIn(200);
});
$(document).on('click', '.chatlist a', function() {
    $('.chatlist').fadeOut(200);
    $(this).removeClass('has-message');
    $(this).attr('style','');
    var a = 0;
    $('.chatlist a.has-message').each(function() {
        a += parseInt($(this).find('span').html());
    });
    if (a == 0) {
        $('.live-chat').removeClass('has-message');
    } else {
        $('.live-chat span').html(a);
    }
});

$(document).on('click','.openUserConv',function(e){
    e.preventDefault();
    $('.direct-messege').empty();
    $('.direct-messege').append('<div class="closer"></div><div class="my-modal-body"><form><div class="massege-box" style="max-height: 350px;height: 321px"><center><img src="/front-assets/images/chat-loading.gif" style="width: 230px"></center></div></form></div>');
    var url = $(this).attr('href');
    $.get(url,function(data){
        $('.direct-messege').empty();
        $('.direct-messege').append(data.html).children(':last').hide().fadeIn(500);
        Pusher.logToConsole = false;
        var pusher = new Pusher('ab9e6f5292c0376329e0', {
            cluster: 'eu',
            encrypted: true
        });
        var channel = pusher.subscribe('Messages');
        channel.bind('msgSend'+ $('input[name=user_to]').val() +'msgReceive'+$('#userId').data('userid') , function(data) {
            $('.massege-box ul').append(data.html);
            $('#msgBody').val('');
            $('.massege-box').animate({scrollTop: $('.massege-box')[0].scrollHeight}, 0);
        });
    });
});

// follow Post
$(document).on('click','#sendMsg', function (e) {
    e.preventDefault();
    var url     = $(this).closest('.my-modal-body').find('form').attr('action'),
    data    = $('#chatPostform').serialize(),
    ts = $(this);
    // console.log(data);
    // return false;
    if($('#msgBody').val() == ""){
        alert('فضلا أكتب رسالتك');
        $(this).focus();
        return false;
    }
    ts.attr('disabled','disabled');
    ts.css('background','#85befd');
    $.post(url,data,function (data) {
        if(data != ''){
            $('.massege-box ul').append(data.html);
            $('#msgBody').val('');
            $('.massege-box').animate({scrollTop: $('.massege-box')[0].scrollHeight}, 0);
            
            ts.prop("disabled", false);
            ts.css('background','#007aff');
        }else{
            alert('حدث خطأ فضلا  إعادة تحميل الصفحة ومن ثم المحاولة مره أخرى');
        }
    });
});
