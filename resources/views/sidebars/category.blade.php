<div class="col l3">
    <!-- side filters start -->
    <div class="side-filters">
        @if (Session::get('lang') == 'en')
        <h2>Filter results</h2>
        @else
        <h2>تصفية النتائج</h2>
        @endif
        @if (Session::get('lang') == 'en')
        <div class="side-filter-level1 active">
            <div class="show-all bc">See all categoories <i class="fa fa-arrow-down"></i></div>
            @foreach($parents as $cat)
                <div class="filter-title active">
                    <span>{{$cat['name_en']}}</span>
                    <i class="fa fa-caret-down"></i>
                </div>
            @if($loop->index == count($parents) - 1)
                <ul div class="filter-level1-data active">
                    <li><a href="{{ Url('categories/'.$cat['id']) }}" class="active">all sections</a></li>
                    @foreach($cat['subcategories'] as $category)
                        @if($category['parent_id'] == $cat['id'])
                            <li><a href="{{ Url('categories/'.$category['id']) }}">{{$category['name_en']}}</a></li>
                        @endif
                    @endforeach
                </ul>                            
            @else
                <ul div class="filter-level1-data active">
                    <li><a href="{{ Url('categories/'.$cat['id']) }}">جميع الاقسام</a></li>
                </ul>
            @endif
            @endforeach
        </div>
        
        @else
         <div class="side-filter-level1 active">
             <div class="show-all bc">شاهد جميع الاقسام <i class="fa fa-arrow-down"></i></div>
            @foreach($parents as $cat)
                <div class="filter-title active">
                    <span>{{$cat['name_ar']}}</span>
                    <i class="fa fa-caret-down"></i>
                </div>
            @if($loop->index == count($parents) - 1)
                <ul div class="filter-level1-data active">
                    <li><a href="{{ Url('categories/'.$cat['id']) }}" class="active">جميع الاقسام</a></li>
                    @foreach($cat['subcategories'] as $category)
                        @if($category['parent_id'] == $cat['id'])
                            <li><a href="{{ Url('categories/'.$category['id']) }}">{{$category['name_ar']}}</a></li>
                        @endif
                    @endforeach
                </ul>                            
            @else
                <ul div class="filter-level1-data active">
                    <li><a href="{{ Url('categories/'.$cat['id']) }}">جميع الاقسام</a></li>
                </ul>
            @endif
            @endforeach
        </div>
        @endif
        
        @if (Session::get('lang') == 'en')
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>By price</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul div class="filter-level1-data active">
                <li>
                    <form>
                        <input type="text" placeholder="lowest price" id="mini">
                        <input type="text" placeholder="maximum price" id="maxi">
                        <input type="submit" value="تصفية" onclick="document.getElementById('maxi_price').value=document.getElementById('maxi').value;
                        document.getElementById('maxi_price').value=document.getElementById('maxi').value;
                        document.getElementById('form1').submit();">
                    </form>
                </li>
            </ul>
        </div>
        @else
        <div class="side-filter-level1 active">
            @if(Request::is('categories/123'))
            <div class="filter-title active">
               
        
                <span>حسب الراتب</span>
                
                <i class="fa fa-caret-down"></i>
            </div>
            <ul div class="filter-level1-data active">
                <li>
                    <form method="GET" class="search" action="{{Request::url()}}" >
                        <input type="text" name="mini_price" placeholder="الراتب الادني" id="mini">
                        <input type="text" name="maxi_price" placeholder="الراتب الاقصي" id="maxi">
                        <input type="submit" value="تصفية" name="searchButton">
                    </form>
                </li>
            </ul>
            @else
            <div class="filter-title active">
               
        
                <span>حسب السعر</span>
                
                <i class="fa fa-caret-down"></i>
            </div>
            <ul div class="filter-level1-data active">
                <li>
                    <form method="GET" class="search" action="{{Request::url()}}" >
                        <input type="text" name="mini_price" placeholder="السعر الادني" id="mini">
                        <input type="text" name="maxi_price" placeholder="السعر الاقصي" id="maxi">
                        <input type="submit" value="تصفية" name="searchButton">
                    </form>
                </li>
            </ul>
           @endif
        </div>
        @endif
        
        <!--<div class="side-filter-level1">-->
        <!--                    <div class="filter-title active">-->
        <!--                        <span>الاماكن</span>-->
        <!--                        <i class="fa fa-caret-down"></i>-->
        <!--                    </div>-->
        <!--                    <ul class="filter-level1-data active">-->
        <!--                        <li class="has-sub">-->
        <!--                            <div class="filter-title active">-->
        <!--                                <span>السعودية</span>-->
        <!--                                <i class="fa fa-caret-down"></i>-->
        <!--                            </div>-->
        <!--                            <ul class="filter-level2-data active">-->
        <!--                                <li><a href="#!" class="active">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                            </ul>-->
        <!--                        </li>-->
        <!--                        <li class="has-sub">-->
        <!--                            <div class="filter-title">-->
        <!--                                <span>الامارات</span>-->
        <!--                                <i class="fa fa-caret-down"></i>-->
        <!--                            </div>-->
        <!--                            <ul class="filter-level2-data">-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                            </ul>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        
        @if (Session::get('lang') == 'en')
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>Ads Type</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="#!" class="active">All ads</a></li>
                <li><a href="#!">Regular Paid Ads</a></li>
                <li><a href="#!">Featured paid ads</a></li>
                <li><a href="#!">Urgent paid ads</a></li>
                <li><a href="#!">Colored paid ads</a></li>
                <li><a href="#!">Best ads</a></li>
            </ul>
        </div>
        @else
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>نوع الاعلان</span>
                <i class="fa fa-caret-down"></i>
            </div>
            
            
            <ul class="filter-level1-data active">
                <li><a href="{{Request::url()}}" class="active">جميع الاعلانات</a></li>
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&isTop=1'}}">افضل الاعلانات</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?isTop=1&searchButton=تصفية'}}">افضل الاعلانات</a></li>
                @endif
                
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&isUrgent=0&isTop=0&isinMain=0&isColored=0'}}">اعلانات مدفوعة عادية</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?&isUrgent=0&isTop=0&isinMain=0&isColored=0&searchButton=تصفية'}}">أعلانات مدفوعة عادية </a></li>
                @endif
                
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&isTop=1'}}">اعلانات مدفوعة مميزة</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?isTop=1&searchButton=تصفية'}}">اعلانات مدفوعة مميزة</a></li>
                @endif
               
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&isUrgent=1'}}">اعلانات مدفوعة عاجلة</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?isUrgent=1&searchButton=تصفية'}}">أعلانات مدفوعه عاجلة </a></li>
                @endif
                
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&isColored=1'}}">اعلانات مدفوعة ملونة</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?isColored=1&searchButton=تصفية'}}">أعلانات مدفوعه ملونة </a></li>
                @endif
                
                <!--<li><a href="#!">افضل الاعلانات</a></li>-->
            </ul>
        </div>
        @endif
     @if(! Request::is('categories/10'))
        @foreach($filters as $name=>$values)
            @if($name != 'type')
            <div class="side-filter-level1 active">
                <div class="show-all bc">شاهد الجميع <i class="fa fa-arrow-down"></i></div>
                <div class="filter-title active">
                    <span>{{$name}}</span>
                    <i class="fa fa-caret-down"></i>
                </div>
                <ul class="filter-level1-data active">
                    <li>
                    <?php // dd(Request::fullUrl()); ?>
                        @foreach($values as $value)
                        @if(count($_GET))
                        <li><a href="{{Request::fullUrl().'&city='.$value['id']}}">{{$value['name']}}</a></li>
                        @else
                        <li><a href="{{Request::fullUrl().'?city='.$value['id'].'&searchButton=تصفية'}}">{{$value['name']}}</a></li>
                        @endif
                        @endforeach
                    </li>
                </ul>
            </div>
            @endif
        @endforeach
       @endif  
        @if (Session::get('lang') == 'en')
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>Type of sale</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="#!" class="active">All ads</a></li>
                <li><a href="#!">Offer/a></li>
                <li><a href="#!">Order</a></li>
            </ul>
        </div>
        @else
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>نوع البيع</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="{{Request::url()}}" class="active">جميع الاعلانات</a></li>
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&saleType=0'}}">عرض</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?saleType=0&searchButton=تصفية'}}">عرض </a></li>
                @endif
                
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&saleType=1'}}">طلب</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?saleType=1&searchButton=تصفية'}}">طلب </a></li>
                @endif
            </ul>
        </div>
        @endif

        @if (Session::get('lang') == 'en')
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>Type of offer</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="#!" class="active">جميع الاعلانات</a></li>
                <li><a href="#!">Negotiable</a></li>
                <li><a href="#!">Final</a></li>
            </ul>
        </div>
        @else
        <div class="side-filter-level1 active">
          @if(!Request::is('categories/123'))
            <div class="filter-title active">
                <span>نوع العرض</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="{{Request::url()}}" class="active">جميع الاعلانات</a></li>
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&offerType=0'}}">قابل للتفاوض</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?offerType=0&searchButton=تصفية'}}">قابل للتفاوض </a></li>
                @endif
                
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&offerType=1'}}">نهائي</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?offerType=1&searchButton=تصفية'}}">نهائي </a></li>
                @endif
                
            </ul>
            @endif
        </div>
           @if(Request::is('categories/42'))
           <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>حالة المنتج</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="{{Request::url()}}" class="active">جميع الاعلانات</a></li>
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&offerType=0'}}">جديد </a></li>
                @else
                <li><a href="{{Request::fullUrl().'?offerType=0&searchButton=تصفية'}}"> جديد </a></li>
                @endif
                
                @if(count($_GET))
                <li><a href="{{Request::fullUrl().'&offerType=1'}}">مستعمل</a></li>
                @else
                <li><a href="{{Request::fullUrl().'?offerType=1&searchButton=تصفية'}}">مستعمل </a></li>
                @endif
                
            </ul>
         </div>
         @endif
        @endif
        <div class="google-ads">
            <img src="{{ asset('images/ads.png')}}" alt="">
        </div>
        <div class="google-ads">
            <img src="{{ asset('images/ads.png')}}" alt="">
        </div>
    </div>
    <!-- side filters end -->
</div>

