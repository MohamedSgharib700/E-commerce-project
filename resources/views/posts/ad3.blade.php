@extends('layouts.user')
@section('content')
    <div class="big-head top-100 bottom-50 centerd">
        <h1>انشر اعلانك</h1>
        <small class="nc mt-15">اختر قسم الاعلان</small>
    </div>

    <!-- register -->
    <!-- register -->
    <div class="big-container bottom-100 centerd">

        <!-- dropdown wrapper -->
        <div class="select-box links get-back">

            <!-- select group level 1 start  -->
            <div>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        @if($category['id'] == $ancestor)
                            <i class="{{$category['icon']}}"></i> {{$category['name_ar']}}
                            <a href="{{Url('newad')}}"><i class="fa fa-times"></i></a>
                        @endif
                    @endforeach
                @endif
            </div>
            <!-- select group level 1 end  -->

        </div>
    </div>

    @if(count($subcategoriesALL) > 0 && count($parents) > 0)
        <div class="big-container bottom-100 centerd">
            <div class="top-25 bottom-25">
                <small class="nc mt-15">اختر القسم الفرعي</small>
            </div>
            <div class="select-box links">
                <!-- dropdown wrapper -->
                @foreach($subcategoriesALL as $subcategory)
                    @foreach($parents as $parent)
                        @if($subcategory['id'] == $parent)
                            <a href="{{Url('newad')}}/{{$subcategory['id']}}">
                                <i class="{{$subcategory['icon']}}"></i>{{$subcategory['name_ar']}}
                            </a>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    @endif
    <div class="big-container bottom-100 centerd">

        <!-- dropdown wrapper -->
        <form id="form1" role="form" method="POST" action="{{Url('newad')}}">
            {{ csrf_field() }}
            <input type="hidden" name="subcategory_id" value="{{$category_id}}">
            <input type="hidden" id="SupplyOrDemand" name="SupplyOrDemand" value="">
            <div class="select-box links">
                <!-- select start  -->
                    <a onclick="document.getElementById('SupplyOrDemand').value='Supply';document.getElementById('form1').submit();"><i></i> للعرض</a>
                <!-- select end  -->

                <!-- select start  -->
                    <a onclick="document.getElementById('SupplyOrDemand').value='Demand';document.getElementById('form1').submit();"><i></i> للطلب</a>
                <!-- select end  -->
            </div>
        </form>
    </div>

@endsection
