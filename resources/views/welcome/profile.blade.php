
<!-- Profile -->
<div class="w3-card w3-round w3-white">
    <div class="w3-container">
        <h4 class="w3-center">{{ $User->pseudo }}</h4>
        {{-- define dans layouts.app --}}

        @if ($User->sex == "M.")
            <p class="w3-center"><img src="/images/avatars/man-1.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
        @else
            <p class="w3-center"><img src="/images/avatars/owmen-1.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
        @endif
        <div class="text-center">
            {{$User->email}}
        </div>
        <hr>
    </div>
</div>