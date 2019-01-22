$(document).on('click', '.saved-search-drop button:not(.colse-drop)', function(e) {
    e.preventDefault();
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: "/savesearch",

        data: { searchWord: $('input[name=search_query]').val(), '_token': csrf_token }, // <== change is here
        success: function(data) {
            console.log(jQuery.parseJSON(data).message);
            $('.saved-search-drop').empty().html('<p>'+jQuery.parseJSON(data).message+'.</p><button class="colse-drop">اغلاق</button>');
        },
        error: function() {
            $('.saved-search-drop').empty().html('<p>حدث خطأ, لم يتم حفظ نتائج عملية البحث.</p><button>اعادة المحاولة</button>');
        }
    });
});