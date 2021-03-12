
<div class="mainmenu-area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand active" href="{{route('front.home')}}">Hoem</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        @foreach($main as $maincat)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $maincat ->  name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($sub as $maint)

                                        <a class="dropdown-item" href="{{route('front.itemshow',$maint -> id )}}">
                                            @if( $maincat -> id == $maint -> maincategory_id)
                                                {{$maint -> name }}
                                            @endif
                                        </a>



                            @endforeach


                                </div>
                            </li>

                        @endforeach


                    </ul>
                </div>
        </nav>
    </div>
</div> <!-- End mainmenu area -->


