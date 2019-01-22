<!-- filter start -->
<div class="main-filter">
    <form method="GET" action="{{Request::url()}}" id="form1">
    {{ csrf_field() }}
    <input type="hidden" class="applied-filters" name="applied_filters" value="{{$applied_ret or ''}}">
    <input type="hidden" class="mini_price" id="mini_price" name="mini_price" value="{{$request['mini_price'] or ''}}">
    <input type="hidden" class="maxi_price" id="maxi_price" name="maxi_price" value="{{$request['maxi_price'] or ''}}">
    <input type="hidden" class="sort" id="sort" name="sort" value="{{$request['sort'] or ''}}">
        <!-- select dropdown start -->
    <div class="select-cat">
        <!-- hidden input to catch the id -->
        <input id="cat-id" type="text" name="cat-id" value="{{$parents[0]['id'] or 'bars'}}" hidden>
        <!-- select icon in the search bar -->
        <div class="select-head">
            <div class="select-icon">
                <i class="fa fa-{{$parents[0]['icon'] or 'bars'}}"></i>
            </div>
            <i class="fa fa-caret-down"></i>
        </div>
        <!-- dropdown wrapper -->
        <div class="select-box">
            <!-- select all cats -->
            <div class="select-group" data-cat-icon="bars" data-cat-id="0">
                    <i class="fa fa-bars"></i> جميع الاقسام
            </div>

            <!-- select group level 1 start  -->
            @foreach($categories as $category)
                <!-- select group level 1 start  -->
                <div class="select-group" data-cat-icon="{{$category['icon']}}" data-cat-id="{{$category['id']}}">
                    <i class="fa fa-{{$category['icon']}}"></i> {{$category['name_ar']}}
                    @foreach($category['subcategories'] as $subcat)
                        @if($subcat['parent_id'] == $category['id'])
                        <div class="group-toggle"><i class="fa fa-caret-down"></i></div>
                        <!-- select group level 2 start  -->
                        <div class="group-box">
                            <!-- group item -->
                            <div class="select-item-level1" data-cat-id="{{$subcat['id']}}">
                                {{$subcat['name_ar']}}
                                @foreach($subcat['subcategories'] as $subOfsubcat)
                                    @if($subcat['id'] == $subOfsubcat['parent_id'])
                                    <div class="group-toggle"><i class="fa fa-caret-down"></i></div>
                                    <!-- select group level 3 start  -->
                                    <div class="group-box2">
                                        <!-- group item -->
                                        <div class="select-item-level2" data-cat-id="{{$subOfsubcat['id']}}">
                                            {{$subOfsubcat['name_ar']}}
                                        </div>
                                    </div>
                                    <!-- select group level 3 end  -->
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- select group level 2 end  -->
                        @endif
                    @endforeach
                </div>
                <!-- select group level 1 end  -->
            @endforeach
                <!-- select group level 1 end  -->
        </div>
    </div>
    <!-- select dropdown end -->

    <!-- search bar -->
    <div class="main-search">
        <input type="text" placeholder="" value="" id="search_querys" name="search_querys">
    </div>

    <!-- city box -->
    <div class="city-box">
        <div class="city-form">
        <i  class="fa fa-map-marker"></i>
        @if (Session::get('lang') == 'en')
        <input type="text" placeholder="City" name="search_city">
        <select name="search_distance">
            <option selected>0 KG</option>
            <option>5 KG</option>
            <option>10 KG</option>
            <option>20 KG</option>
            <option>40 KG</option>
            <option>80 KG</option>
            <option>100 KG</option>
        </select> 
        @else
                <!-- city select button start -->
                        <div class="city-select-button">
                            <!-- hidden input to catch the id -->
                            <input name="search_city" id="city-id" type="text" hidden>
                            <!-- select head in the search bar start -->
                            <div class="select-city">
                                <span class="city-title">المدن</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <!-- select head in the search bar end -->


                            <!-- dropdown wrapper start -->
                            <div class="select-box-city">
                                <!-- select all cats -->
                                <div class="city-select-group" data-cat-id="0">
                                         <span class="gettitle">المدن</span>
                                </div>
                                <!-- select group level 1 start  -->
                                
                                <!-- select group level 1 end  -->

                                <!-- select group level 1 start  -->
                            @foreach(\App\Filters::where('group_id',2)->get() as $city)
                                <div class="city-select-group" data-cat-id="5">
                                    <span class="gettitle">{{$city->name}}</span>
                                    <div class="group-toggle-city"><i class="fa fa-caret-down"></i></div>
                                    <!-- select group level 2 start  -->
                                    <div class="group-box-city">
                                        <!-- item -->
                                     @foreach(\App\Filters::where('parent_id',$city->id)->get() as $subCity)
                                        <div class="select-city-item-level1" data-cat-id="6">
                                            <span class="gettitle">{{$subCity->name}}</span>
                                        </div>
                                     @endforeach  
                                    </div>
                                    <!-- select group level 2 end  -->
                                </div>
                                <!-- select group level 1 end  -->
                            @endforeach
                             
                            </div>
                            <!-- dropdown wrapper start -->

                        </div>
                        <!-- city select button end -->


                      <select>
                          <option selected>0 كم</option>
                          <option>5 كم</option>
                          <option>10 كم</option>
                          <option>20 كم</option>
                          <option>40 كم</option>
                          <option>80 كم</option>
                          <option>100 كم</option>
                      </select>
                  <!-- submit -->
        @endif
        </div>
    </div>
     @if (Session::get('lang') == 'en')
    <!-- submit -->
    <input type="submit" value="search">
    @else
    <input id="searchMainCat" type="submit" value="إبحث">
    @endif
    </form>
</div>
<!-- filter end -->