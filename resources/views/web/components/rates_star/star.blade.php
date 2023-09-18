@if(isset($item->rate))
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= (int) $item->rate)
            <i class="fa-solid fa-star"></i>
        @else
            <i class="fa-regular fa-star"></i>
        @endif
    @endfor
@else
    @if($item->rate_count == 0)
        @for($i = 0; $i < 5; $i++)
            <i class="fa-regular fa-star"></i>
        @endfor
    @else
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= (int) ceil($item->rate_point))
                <i class="fa-solid fa-star"></i>
            @else
                <i class="fa-regular fa-star"></i>
            @endif
        @endfor
    @endif
@endif
