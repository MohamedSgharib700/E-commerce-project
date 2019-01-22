<!-- spical inside -->
<div class="spical-inside">
    <div class="spical-head start {{Request::is('/categories*')?"active":""}}">
        @if (Session::get('lang') == 'en')
        Featured Sections</div>
        @else
      الأقسام المميزه</div>
      @endif
       @if (Session::get('lang') == 'en')
    @if(count($specialcategories) > 0)
        @foreach($specialcategories as $special)
                <a href="{{Url('/')}}/categories/{{$special['id']}}">{{$special['name_en']}}</a>
        @endforeach
    @else
    @endif
    
    @else
    
    @if(count($specialcategories) > 0)
        @foreach($specialcategories as $special)
                <a href="{{Url('/')}}/categories/{{$special['id']}}">{{$special['name_ar']}}</a>
        @endforeach
    @else
    @endif
    
    @endif
</div>
