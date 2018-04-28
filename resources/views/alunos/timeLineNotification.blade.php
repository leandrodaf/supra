<ul class="timeline">
    @foreach($alunos->notification()->whereBetween('created_at', [Carbon\Carbon::today()->subDays(15), Carbon\Carbon::today()->addDays(20)])->orderBy('created_at', 'asc')->get() as $notification)
        <li>

            <i data-toggle="tooltip" data-original-title="{{$notification->type[0]->title}}"
               class="fa
               {{$notification->type[0]->id == 1 ? 'fa-money':''}}
               {{$notification->type[0]->id == 2 ? 'fa-file-text-o':''}}
               {{$notification->type[0]->id == 3 ? 'fa-graduation-cap':''}}
               {{Carbon\Carbon::parse($notification->exibition)->gt($notification->created_at) ? $notification->type[0]->id == 1 ? 'bg-green':'': 'bg-red'}}
               {{Carbon\Carbon::parse($notification->exibition)->gt($notification->created_at) ? $notification->type[0]->id == 2 ? 'bg-yellow':'': 'bg-red'}}
               {{Carbon\Carbon::parse($notification->exibition)->gt($notification->created_at) ? $notification->type[0]->id == 3 ? 'bg-blue':'': 'bg-red'}}

                       "></i>
            <div class="timeline-item">
                <span class="time {{!(Carbon\Carbon::parse($notification->exibition)->gt($notification->created_at)) ? 'text-red': ''}}">
                    <i class="fa fa-clock-o"></i>
                    {{$notification->exibition->format('d/m/Y')}}
                </span>

                <h3 class="timeline-header">
                    <a>{{$notification->title}} </a>
                    - <i title="Status de e-mail"
                         class="fa {{$notification->flg_status != 1 ?'text-red fa-envelope': 'text-green fa-envelope-open' }}"></i>
                </h3>

                <div class="timeline-body">
                    {!! $notification->description !!}
                </div>

            </div>
        </li>
    @endforeach
</ul>
