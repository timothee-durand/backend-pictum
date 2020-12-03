<p>Bonjour Mr {{$nom}}, <br/>
<a href="{{env("FRONT_URL")}}">Pictum</a> vous rappelle que vous avez un rendez-vous de {{$raison_rdv}} le </p>

<p><span class="date">{{$date_rdv}}</span> à <span class="heure">{{$heure_rdv}}</span></p>
<p>Soyez à l'heure ou prévenez le gestionnaire qui vous a pris en charge en lui envoyant un mail : <a href="mailto:{{$mail_gestionnaire}}"></a>{{$mail_gestionnaire}}</p>
<p>Merci !</p>
