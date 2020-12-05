<p>Bonjour Mr {{$nom}}, <br/>
<a href="{{env("FRONT_URL")}}">Pictum</a> vous rappelle que la période de prêt de : </p>
    @foreach($materiels as $mat)
        <p>{{$mat->nom}}</p>
    @endforeach
<p>est finie.</p>


<p>Merci de prendre un rendez-vous avec le gestionnaire qui vous a pris en charge en lui envoyant un mail : <a href="mailto:{{$mail_gestionnaire}}">{{$mail_gestionnaire}}</a></p>

