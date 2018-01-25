<div class="row">
    @if(isset($pessoa->location))

        @foreach($pessoa->location as $location)

            <address class="addressInfo">
                @if($location->pivot->flg_principal == 1)
                    <span class="label label-info addressInfo">Principal</span>
                @endif
                {{$location->street . ', '. $location->number . ' - ' . $location->neighborhood . ', ' . $location->city . ' - ' . \App\Helpers\Helpers::returnSateCity($location->state) . ', ' . $location->zipCode. ', ' . $location->country}}
            </address>

            <div class="mapas text-center">
                <iframe width="740" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q={{$location->street . ', '. $location->number . ' - ' . $location->neighborhood . ', ' . $location->city . ' - ' . \App\Helpers\Helpers::returnSateCity($location->state) . ', ' . $location->zipCode. ', ' . $location->country}}&amp;ie=UTF8&amp;hq=&amp;hnear={{$location->street . ', '. $location->number . ' - ' . $location->neighborhood . ', ' . $location->city . ' - ' . $location->state . ', ' . $location->zipCode. ', ' . $location->country}}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                <br>
            </div>

            <hr/>
        @endforeach
    @else
        <div class="mapas text-center">
            Essa pessoa ainda não tem um endereço.
        </div>
    @endif

</div>
