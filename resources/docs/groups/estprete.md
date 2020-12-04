# EstPrete


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/estpretes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
[
    {
        "materiel": {
            "id": 20,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "ref": "L2_PER_RHO_01",
            "nom": "Mr. Clinton Shields Sr.",
            "photo": "https:\/\/via.placeholder.com\/200x200.png\/00aa00?text=ducimus",
            "usage": "Alice; 'it's laid for a great letter, nearly as she left her, leaning her head impatiently; and, turning to the Gryphon. Alice did not quite know what \"it\" means.' 'I know what they're about!' 'Read.",
            "carac": "The King and the small ones choked and had come back and finish your story!' Alice called out in a hurry. 'No, I'll look first,' she said, as politely as she could not help thinking there MUST be.",
            "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
            "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
            "indisp": 0,
            "indisp_raison": "Edwin and Morcar, the earls of Mercia and.",
            "type_id": 10,
            "malette_id": 9,
            "departement_id": 6
        },
        "reservation": {
            "id": 79,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "valide": 0,
            "prof": 1,
            "nom": "Raul",
            "prenom": "Kertzmann",
            "mail": "kyleigh.konopelski@rippin.com",
            "raison_pro": "Duchess; 'and that's a fact.' Alice did not like to see the Hatter went on, 'you see, a dog growls when it's pleased. Now I growl when I'm pleased, and wag my tail when it's pleased. Now I growl when I'm angry. Therefore I'm mad.' 'I call it.",
            "id_univ": "ogreen"
        },
        "gestionnaire": {
            "id": 5,
            "created_at": "2020-12-03T17:30:34.000000Z",
            "updated_at": "2020-12-03T17:30:34.000000Z",
            "nom": "Harrison",
            "prenom": "Hessel",
            "mail": "dovie58@christiansen.com",
            "id_univ": "zzulauf",
            "admin": 0
        },
        "date_debut": "2020-06-02 12:01:02",
        "date_fin": "2020-01-07 07:28:37",
        "rendu": "2021-01-09 09:23:31"
    },
    {
        "materiel": {
            "id": 16,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "ref": "L2_PER_RHO_01",
            "nom": "Myrna Klein",
            "photo": "https:\/\/via.placeholder.com\/200x200.png\/00bbbb?text=odio",
            "usage": "Dormouse; 'VERY ill.' Alice tried to fancy to cats if you wouldn't have come here.' Alice didn't think that will be When they take us up and walking away. 'You insult me by talking such nonsense!'.",
            "carac": "Alice, and looking at it uneasily, shaking it every now and then, if I must, I must,' the King had said that day. 'No, no!' said the Caterpillar. 'Not QUITE right, I'm afraid,' said Alice, who felt.",
            "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
            "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
            "indisp": 0,
            "indisp_raison": "Cat, 'or you wouldn't keep appearing and.",
            "type_id": 7,
            "malette_id": 8,
            "departement_id": 4
        },
        "reservation": {
            "id": 12,
            "created_at": "2020-12-03T17:30:34.000000Z",
            "updated_at": "2020-12-03T17:30:34.000000Z",
            "valide": 1,
            "prof": 0,
            "nom": "Dallin",
            "prenom": "Becker",
            "mail": "alta15@hotmail.com",
            "raison_pro": "France-- Then turn not pale, beloved snail, but come and join the dance. '\"What matters it how far we go?\" his scaly friend replied. \"There is another shore, you know, upon the other bit. Her chin was pressed so closely against her foot, that there.",
            "id_univ": "lea34"
        },
        "gestionnaire": {
            "id": 6,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "nom": "Furman",
            "prenom": "Moen",
            "mail": "kuphal.van@gmail.com",
            "id_univ": "gwatsica",
            "admin": 0
        },
        "date_debut": "2020-06-02 00:39:23",
        "date_fin": "2020-02-15 04:05:21",
        "rendu": "2020-02-15 04:05:21"
    }
]
```
<div id="execution-results-GETapi-estpretes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-estpretes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-estpretes"></code></pre>
</div>
<div id="execution-error-GETapi-estpretes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-estpretes"></code></pre>
</div>
<form id="form-GETapi-estpretes" data-method="GET" data-path="api/estpretes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-estpretes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-estpretes" onclick="tryItOut('GETapi-estpretes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-estpretes" onclick="cancelTryOut('GETapi-estpretes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-estpretes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/estpretes</code></b>
</p>
</form>


## Store some new EstPrete in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/estpretes"
);

let params = {
    "id_malettes[]": "6",
    "id_materiels[]": "12",
    "reservation_id": "9",
    "date_debut": "labore",
    "date_fin": "suscipit",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-estpretes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-estpretes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-estpretes"></code></pre>
</div>
<div id="execution-error-POSTapi-estpretes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-estpretes"></code></pre>
</div>
<form id="form-POSTapi-estpretes" data-method="POST" data-path="api/estpretes" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-estpretes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-estpretes" onclick="tryItOut('POSTapi-estpretes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-estpretes" onclick="cancelTryOut('POSTapi-estpretes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-estpretes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/estpretes</code></b>
</p>
<p>
<label id="auth-POSTapi-estpretes" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-estpretes" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>id_malettes[]</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id_malettes.0" data-endpoint="POSTapi-estpretes" data-component="query" required  hidden>
<br>
Tableau d'ID pictum des malettes concernées par la réservation - Peut être vide</p>
<p>
<b><code>id_materiels[]</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id_materiels.0" data-endpoint="POSTapi-estpretes" data-component="query"  hidden>
<br>
Tableau d'ID pictum des matériels individuels concernées par la réservation - Peut être vide</p>
<p>
<b><code>reservation_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="reservation_id" data-endpoint="POSTapi-estpretes" data-component="query" required  hidden>
<br>
ID Pictum de la réservation correspondante</p>
<p>
<b><code>date_debut</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="date_debut" data-endpoint="POSTapi-estpretes" data-component="query" required  hidden>
<br>
DateTime Rendez-vous de prise de matériel</p>
<p>
<b><code>date_fin</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="date_fin" data-endpoint="POSTapi-estpretes" data-component="query" required  hidden>
<br>
DateTime Rendez-vous de retour de matériel</p>
</form>


## Set the group of EstPrete as rendu
Required to be gestionnaire




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/estpretes/perferendis"
);

let params = {
    "id_estprete[]": "12",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTapi-estpretes--estprete-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-estpretes--estprete-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-estpretes--estprete-"></code></pre>
</div>
<div id="execution-error-PUTapi-estpretes--estprete-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-estpretes--estprete-"></code></pre>
</div>
<form id="form-PUTapi-estpretes--estprete-" data-method="PUT" data-path="api/estpretes/{estprete}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-estpretes--estprete-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-estpretes--estprete-" onclick="tryItOut('PUTapi-estpretes--estprete-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-estpretes--estprete-" onclick="cancelTryOut('PUTapi-estpretes--estprete-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-estpretes--estprete-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/estpretes/{estprete}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/estpretes/{estprete}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>estprete</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="estprete" data-endpoint="PUTapi-estpretes--estprete-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>id_estprete[]</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id_estprete.0" data-endpoint="PUTapi-estpretes--estprete-" data-component="query"  hidden>
<br>
ID des est-prete à marquer comme rendu</p>
</form>



