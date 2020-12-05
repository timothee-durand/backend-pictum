# Reservation


## Display a listing of the Reservations.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/reservations"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
        "valide": 0,
        "prof": 0,
        "nom_emprunteur": null,
        "prenom_emprunteur": null,
        "mail_emprunteur": null,
        "id_univ_emprunteur": null,
        "raison_pro": "I had it written down: but I grow up, I'll write one--but I'm grown up now,' she added in an undertone to the waving of the trees upon her knee, and looking at the sudden change, but very politely: 'Did you say \"What a pity!\"?' the Rabbit angrily.",
        "est_pretes": [
            {
                "id": 8,
                "created_at": "2020-12-03T17:31:13.000000Z",
                "updated_at": "2020-12-03T17:31:13.000000Z",
                "date_debut": "2020-07-30 23:11:37",
                "date_fin": "2020-11-01 18:05:10",
                "rendu": "2020-11-01 18:05:10",
                "materiel_id": 17,
                "reservation_id": 2,
                "gestionnaire_id": 5,
                "materiel": {
                    "id": 17,
                    "created_at": "2020-12-03T17:31:12.000000Z",
                    "updated_at": "2020-12-03T17:31:12.000000Z",
                    "ref": "L2_LIG_MAND_01",
                    "nom": "Mercedes Littel III",
                    "photo": "https:\/\/via.placeholder.com\/200x200.png\/007788?text=aperiam",
                    "usage": "ONE respectable person!' Soon her eye fell upon a Gryphon, lying fast asleep in the night? Let me see: four times seven is--oh dear! I shall ever see you any more!' And here poor Alice began to say.",
                    "carac": "Duchess asked, with another dig of her voice, and see that she was quite out of his pocket, and was coming back to the conclusion that it was good manners for her neck kept getting entangled among.",
                    "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
                    "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
                    "indisp": 0,
                    "indisp_raison": "I!' he replied. 'We quarrelled last March--just.",
                    "type_id": 8,
                    "malette_id": 9,
                    "departement_id": 2
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
                }
            }
        ],
        "malettes": [
            {
                "id": 9,
                "created_at": "2020-12-03T17:31:12.000000Z",
                "updated_at": "2020-12-03T17:31:12.000000Z",
                "nom": "Claudie Flatley Sr.",
                "ref": "L1_MAL_PHOTO_01",
                "photo": "https:\/\/via.placeholder.com\/200x200.png\/009933?text=harum"
            }
        ]
    }
]
```
<div id="execution-results-GETapi-reservations" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reservations"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reservations"></code></pre>
</div>
<div id="execution-error-GETapi-reservations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reservations"></code></pre>
</div>
<form id="form-GETapi-reservations" data-method="GET" data-path="api/reservations" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reservations', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-reservations" onclick="tryItOut('GETapi-reservations');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-reservations" onclick="cancelTryOut('GETapi-reservations');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-reservations" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/reservations</code></b>
</p>
<p>
<label id="auth-GETapi-reservations" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-reservations" data-component="header"></label>
</p>
</form>


## Display the specified resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/reservations/17"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
{
    "data": {
        "valide": 1,
        "prof": 0,
        "nom_emprunteur": null,
        "prenom_emprunteur": null,
        "mail_emprunteur": null,
        "id_univ_emprunteur": null,
        "raison_pro": "Yet you finished the goose, with the Gryphon. Alice did not at all anxious to have got altered.' 'It is wrong from beginning to end,' said the Mock Turtle went on, '--likely to win, that it's hardly worth while finishing the game.' The Queen turned.",
        "est_pretes": [],
        "malettes": []
    }
}
```
<div id="execution-results-GETapi-reservations--reservation-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reservations--reservation-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reservations--reservation-"></code></pre>
</div>
<div id="execution-error-GETapi-reservations--reservation-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reservations--reservation-"></code></pre>
</div>
<form id="form-GETapi-reservations--reservation-" data-method="GET" data-path="api/reservations/{reservation}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reservations--reservation-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-reservations--reservation-" onclick="tryItOut('GETapi-reservations--reservation-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-reservations--reservation-" onclick="cancelTryOut('GETapi-reservations--reservation-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-reservations--reservation-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/reservations/{reservation}</code></b>
</p>
<p>
<label id="auth-GETapi-reservations--reservation-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-reservations--reservation-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reservation</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="reservation" data-endpoint="GETapi-reservations--reservation-" data-component="url"  hidden>
<br>
ID de la réservation concernée</p>
</form>


## Store a newly created resource in storage

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/reservations"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nom": "aut",
    "prenom": "repellat",
    "mail": "eos",
    "id_univ": "quia",
    "raison_pro": "aut",
    "prof": true,
    "valide": true
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json

{
     "Store OK"
}
```
<div id="execution-results-POSTapi-reservations" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reservations"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reservations"></code></pre>
</div>
<div id="execution-error-POSTapi-reservations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reservations"></code></pre>
</div>
<form id="form-POSTapi-reservations" data-method="POST" data-path="api/reservations" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reservations', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reservations" onclick="tryItOut('POSTapi-reservations');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reservations" onclick="cancelTryOut('POSTapi-reservations');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reservations" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reservations</code></b>
</p>
<p>
<label id="auth-POSTapi-reservations" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-reservations" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nom" data-endpoint="POSTapi-reservations" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>prenom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="prenom" data-endpoint="POSTapi-reservations" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>mail</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mail" data-endpoint="POSTapi-reservations" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>id_univ</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id_univ" data-endpoint="POSTapi-reservations" data-component="body" required  hidden>
<br>
Id Universitaire</p>
<p>
<b><code>raison_pro</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="raison_pro" data-endpoint="POSTapi-reservations" data-component="body"  hidden>
<br>
Si demande de matériel professionnel, raison produite par le demandeur</p>
<p>
<b><code>prof</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-reservations" hidden><input type="radio" name="prof" value="true" data-endpoint="POSTapi-reservations" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-reservations" hidden><input type="radio" name="prof" value="false" data-endpoint="POSTapi-reservations" data-component="body" required ><code>false</code></label>
<br>
True si la personne est un prof</p>
<p>
<b><code>valide</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-reservations" hidden><input type="radio" name="valide" value="true" data-endpoint="POSTapi-reservations" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-reservations" hidden><input type="radio" name="valide" value="false" data-endpoint="POSTapi-reservations" data-component="body" required ><code>false</code></label>
<br>
Si raison pro, est true si la reservation est validée, true par défault</p>

</form>


## Update the specified Reservation in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/reservations/20"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nom": "et",
    "prenom": "dolor",
    "mail": "sapiente",
    "id_univ": "ipsa",
    "raison_pro": "sed",
    "prof": false,
    "valide": false
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json

{
     "Update OK"
}
```
<div id="execution-results-PUTapi-reservations--reservation-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-reservations--reservation-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-reservations--reservation-"></code></pre>
</div>
<div id="execution-error-PUTapi-reservations--reservation-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-reservations--reservation-"></code></pre>
</div>
<form id="form-PUTapi-reservations--reservation-" data-method="PUT" data-path="api/reservations/{reservation}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-reservations--reservation-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-reservations--reservation-" onclick="tryItOut('PUTapi-reservations--reservation-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-reservations--reservation-" onclick="cancelTryOut('PUTapi-reservations--reservation-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-reservations--reservation-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/reservations/{reservation}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/reservations/{reservation}</code></b>
</p>
<p>
<label id="auth-PUTapi-reservations--reservation-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-reservations--reservation-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reservation</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="reservation" data-endpoint="PUTapi-reservations--reservation-" data-component="url"  hidden>
<br>
ID de la réservation concernée</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nom" data-endpoint="PUTapi-reservations--reservation-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>prenom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="prenom" data-endpoint="PUTapi-reservations--reservation-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mail</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mail" data-endpoint="PUTapi-reservations--reservation-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>id_univ</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="id_univ" data-endpoint="PUTapi-reservations--reservation-" data-component="body"  hidden>
<br>
Id Universitaire</p>
<p>
<b><code>raison_pro</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="raison_pro" data-endpoint="PUTapi-reservations--reservation-" data-component="body"  hidden>
<br>
Si demande de matériel professionnel, raison produite par le demandeur</p>
<p>
<b><code>prof</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-reservations--reservation-" hidden><input type="radio" name="prof" value="true" data-endpoint="PUTapi-reservations--reservation-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-reservations--reservation-" hidden><input type="radio" name="prof" value="false" data-endpoint="PUTapi-reservations--reservation-" data-component="body" ><code>false</code></label>
<br>
True si la personne est un prof, false par défault</p>
<p>
<b><code>valide</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-reservations--reservation-" hidden><input type="radio" name="valide" value="true" data-endpoint="PUTapi-reservations--reservation-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-reservations--reservation-" hidden><input type="radio" name="valide" value="false" data-endpoint="PUTapi-reservations--reservation-" data-component="body" ><code>false</code></label>
<br>
Si raison pro, est true si la reservation est validée, true par défault</p>

</form>


## Remove the specified resource from storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/reservations/18"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEapi-reservations--reservation-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-reservations--reservation-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-reservations--reservation-"></code></pre>
</div>
<div id="execution-error-DELETEapi-reservations--reservation-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-reservations--reservation-"></code></pre>
</div>
<form id="form-DELETEapi-reservations--reservation-" data-method="DELETE" data-path="api/reservations/{reservation}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-reservations--reservation-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-reservations--reservation-" onclick="tryItOut('DELETEapi-reservations--reservation-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-reservations--reservation-" onclick="cancelTryOut('DELETEapi-reservations--reservation-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-reservations--reservation-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/reservations/{reservation}</code></b>
</p>
<p>
<label id="auth-DELETEapi-reservations--reservation-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-reservations--reservation-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reservation</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="reservation" data-endpoint="DELETEapi-reservations--reservation-" data-component="url"  hidden>
<br>
ID de la réservation concernée</p>
</form>



