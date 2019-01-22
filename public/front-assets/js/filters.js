var filters = JSON.parse(document.getElementById('privet-filters').innerHTML);
            
    var types = Object.keys(filters.type);
    
    $.each(types, function(index, value) {
        if(value == 'الاماكن'){
          var fname = filters['الاماكن']['0']['name']  ;
          var fvalues = filters['الاماكن']['0']['values']  ;
          var splitval = fvalues.split(',');
          $('<div class="side-filter-level1 active" id="fplaces"><div class="filter-title active"><span>الاماكن</span><i class="fa fa-caret-down"></i></div><ul class="filter-level1-data active"><li class="has-sub"><div class="filter-title"><span>'+ fname +'</span><i class="fa fa-caret-down"></i></div><ul class="filter-level2-data"><li><a href="#!" class="active">جميع الاعلانات</a></li></ul></li></ul></div>').insertAfter($('.side-filter-level1').first());
            $.each(splitval, function(key, value) {
              $('#fplaces').find('ul.filter-level2-data').append('<li><a href="#!">'+ value +'</a></li>');
            });
        } else {
            var options = filters[value];
            if(filters.type[value] == 4 ){
             if(this == 'الماركة') {
                 $('<div class="side-filter-level1 active" id="filter'+ index +'"><div class="filter-title active"><span>'+ value +'</span><i class="fa fa-caret-down"></i></div><ul class="filter-level1-data active"><li><form><select class="not-main" data-stitle="'+value+'"><option>جميع الاعلانات</option></select></form></li></ul></div>').insertAfter($('#fplaces'));
                 $('<div class="side-filter-level1 active" id="subfilter'+ index +'"><div class="filter-title active"><span>'+ 'نوع '+value +'</span><i class="fa fa-caret-down"></i></div><ul class="filter-level1-data active"><li><form><select class="has-main" data-stitle="'+value+'"><option>يجب اختيار الماركة اولا</option></select></form></li></ul></div>').insertAfter($('#filter'+ index));
                        $.each(options, function(key, value){
                        $('#filter'+index).find('select').append('<option value='+this.name+'>'+ this.name +'</option>');
                        });
             } else {
                 $('<div class="side-filter-level1 active" id="filter'+ index +'"><div class="filter-title active"><span>'+ value +'</span><i class="fa fa-caret-down"></i></div><ul class="filter-level1-data active"><li><form><select><option>جميع الاعلانات</option></select></form></li></ul></div>').insertAfter($('#fplaces'));
                    $.each(options, function(key, value) {
                        var newval = this.values.split(',');
                        $.each(newval, function(key, value){
                            $('#filter'+index).find('select').append('<option value="'+value+'">'+ value +'</option>');
                        });
                    });
             }
            } else if (filters.type[value] == 3 ) {
                $('<div class="side-filter-level1 active"><div class="filter-title active"><span>حسب '+value+'</span><i class="fa fa-caret-down"></i></div><ul class="filter-level1-data active"><li><form><input type="text" placeholder="'+value+' الادني" id="mini"><input type="text" placeholder="'+value+' الاقصي" id="maxi"><input type="submit" value="تصفية"></form></li></ul></div>').insertAfter($('#fplaces'));
            } else {
            $('<div class="side-filter-level1 active" id="filter'+ index +'"><div class="filter-title active"><span>'+ value +'</span><i class="fa fa-caret-down"></i></div><ul class="filter-level1-data active"><li><a href="#!" class="active">جميع الاعلانات</a></li></ul></div>').insertAfter($('#fplaces'));
            $.each(options, function(key, value) {
              $('#filter'+index).find('ul.filter-level1-data').append('<li><a href="#!">'+ this.name +'</a></li>');
            });
            }
        }
    }); 
    
    $(document).on('change','select.not-main', function(){
      var myindex = $(this).find("option:selected").index() - 1;
      if(myindex > -1) {
          $('.has-main').empty();
          $('.has-main').append('<option>جميع الانواع</option>');
          var carType = filters['الماركة'][myindex]['values'];
            var carType1 = carType.split(',');
            $.each(carType1, function(key, value){
               $('.has-main').append('<option value='+value+'>'+ value +'</option>'); 
            });
      } else {
          $('.has-main').empty();
          $('.has-main').append('<option>يجب اختيار الماركة اولا</option>');
      }
       
    });
    
    

    