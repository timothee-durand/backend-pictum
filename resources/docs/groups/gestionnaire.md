# Gestionnaire


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/gestionnaires"
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
        "nom": "Terrance",
        "prenom": "Rohan",
        "mail": "kemmer.osvaldo@gmail.com",
        "id_univ": "waino62",
        "admin": 0,
        "departement": null,
        "rdv": [
            {
                "id": 7,
                "created_at": "2020-12-03T17:31:13.000000Z",
                "updated_at": "2020-12-03T17:31:13.000000Z",
                "date_debut": "2020-08-22 21:41:09",
                "date_fin": "2020-03-01 13:58:20",
                "rendu": "2020-03-01 13:58:20",
                "materiel_id": 5,
                "reservation_id": 20,
                "gestionnaire_id": 1
            },
            {
                "id": 16,
                "created_at": "2020-12-03T17:31:13.000000Z",
                "updated_at": "2020-12-03T17:31:13.000000Z",
                "date_debut": "2020-05-19 22:39:51",
                "date_fin": "2020-11-10 00:33:21",
                "rendu": "2021-01-15 21:20:41",
                "materiel_id": 28,
                "reservation_id": 70,
                "gestionnaire_id": 1
            },
            {
                "id": 92,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "date_debut": "2020-08-27 10:40:07",
                "date_fin": "2020-11-13 12:50:28",
                "rendu": "2021-01-23 03:45:21",
                "materiel_id": 6,
                "reservation_id": 73,
                "gestionnaire_id": 1
            }
        ],
        "creneaux": [
            {
                "id": 5,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "jour": 3,
                "heure_debut_matin": "06:51:04",
                "heure_fin_matin": "11:13:07",
                "heure_debut_am": "13:09:21",
                "heure_fin_am": "17:05:33",
                "gestionnaire_id": 1
            },
            {
                "id": 16,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "jour": 5,
                "heure_debut_matin": "08:42:31",
                "heure_fin_matin": "11:14:53",
                "heure_debut_am": "13:44:13",
                "heure_fin_am": "16:08:51",
                "gestionnaire_id": 1
            },
            {
                "id": 30,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "jour": 5,
                "heure_debut_matin": "07:12:41",
                "heure_fin_matin": "11:12:16",
                "heure_debut_am": "13:26:06",
                "heure_fin_am": "16:18:56",
                "gestionnaire_id": 1
            },
            {
                "id": 32,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "jour": 3,
                "heure_debut_matin": "08:49:42",
                "heure_fin_matin": "11:45:22",
                "heure_debut_am": "13:48:19",
                "heure_fin_am": "17:54:38",
                "gestionnaire_id": 1
            }
        ],
        "indisponibilites": []
    }
]
```
<div id="execution-results-GETapi-gestionnaires" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-gestionnaires"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-gestionnaires"></code></pre>
</div>
<div id="execution-error-GETapi-gestionnaires" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-gestionnaires"></code></pre>
</div>
<form id="form-GETapi-gestionnaires" data-method="GET" data-path="api/gestionnaires" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-gestionnaires', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-gestionnaires" onclick="tryItOut('GETapi-gestionnaires');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-gestionnaires" onclick="cancelTryOut('GETapi-gestionnaires');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-gestionnaires" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/gestionnaires</code></b>
</p>
</form>


## Display the specified Gestionnaire




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/gestionnaires/6"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-gestionnaires--gestionnaire-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-gestionnaires--gestionnaire-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-gestionnaires--gestionnaire-"></code></pre>
</div>
<div id="execution-error-GETapi-gestionnaires--gestionnaire-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-gestionnaires--gestionnaire-"></code></pre>
</div>
<form id="form-GETapi-gestionnaires--gestionnaire-" data-method="GET" data-path="api/gestionnaires/{gestionnaire}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-gestionnaires--gestionnaire-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-gestionnaires--gestionnaire-" onclick="tryItOut('GETapi-gestionnaires--gestionnaire-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-gestionnaires--gestionnaire-" onclick="cancelTryOut('GETapi-gestionnaires--gestionnaire-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-gestionnaires--gestionnaire-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/gestionnaires/{gestionnaire}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>gestionnaire</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="gestionnaire" data-endpoint="GETapi-gestionnaires--gestionnaire-" data-component="url"  hidden>
<br>
ID du gestionnaire à afficher</p>
</form>


## Display a listing of the rendez-vous of this Gestionnaire




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/gestionnaires/2/rdv"
);

let params = {
    "start_day": "neque",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
 indexJour:0,
date_jour:2020-11-03,
rdvMatin:[
     08:00,
     08:15
],
rdvAm:[
     14:00,
     14:15
]
}
]
```
<div id="execution-results-GETapi-gestionnaires--id--rdv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-gestionnaires--id--rdv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-gestionnaires--id--rdv"></code></pre>
</div>
<div id="execution-error-GETapi-gestionnaires--id--rdv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-gestionnaires--id--rdv"></code></pre>
</div>
<form id="form-GETapi-gestionnaires--id--rdv" data-method="GET" data-path="api/gestionnaires/{id}/rdv" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-gestionnaires--id--rdv', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-gestionnaires--id--rdv" onclick="tryItOut('GETapi-gestionnaires--id--rdv');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-gestionnaires--id--rdv" onclick="cancelTryOut('GETapi-gestionnaires--id--rdv');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-gestionnaires--id--rdv" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/gestionnaires/{id}/rdv</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-gestionnaires--id--rdv" data-component="url"  hidden>
<br>
ID du gestionnaire concerné</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>start_day</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="start_day" data-endpoint="GETapi-gestionnaires--id--rdv" data-component="query" required  hidden>
<br>
Date Jour à partir duquel on veut les rendez-vous</p>
</form>


## Store a newly Gestionnaire resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/gestionnaires"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-gestionnaires" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-gestionnaires"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-gestionnaires"></code></pre>
</div>
<div id="execution-error-POSTapi-gestionnaires" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-gestionnaires"></code></pre>
</div>
<form id="form-POSTapi-gestionnaires" data-method="POST" data-path="api/gestionnaires" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-gestionnaires', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-gestionnaires" onclick="tryItOut('POSTapi-gestionnaires');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-gestionnaires" onclick="cancelTryOut('POSTapi-gestionnaires');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-gestionnaires" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/gestionnaires</code></b>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/gestionnaires/20"
);

let params = {
    "nom": "autem",
    "prenom": "sint",
    "mail": "eligendi",
    "id_univ": "quia",
    "admin": "1",
    "departement_id": "13",
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


> Example response (200):

```json

{
"Update OK"
}
```
<div id="execution-results-PUTapi-gestionnaires--gestionnaire-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-gestionnaires--gestionnaire-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-gestionnaires--gestionnaire-"></code></pre>
</div>
<div id="execution-error-PUTapi-gestionnaires--gestionnaire-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-gestionnaires--gestionnaire-"></code></pre>
</div>
<form id="form-PUTapi-gestionnaires--gestionnaire-" data-method="PUT" data-path="api/gestionnaires/{gestionnaire}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-gestionnaires--gestionnaire-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-gestionnaires--gestionnaire-" onclick="tryItOut('PUTapi-gestionnaires--gestionnaire-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-gestionnaires--gestionnaire-" onclick="cancelTryOut('PUTapi-gestionnaires--gestionnaire-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-gestionnaires--gestionnaire-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/gestionnaires/{gestionnaire}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/gestionnaires/{gestionnaire}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>gestionnaire</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="gestionnaire" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="url"  hidden>
<br>
ID du gestionnaire à afficher</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nom" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="query"  hidden>
<br>
</p>
<p>
<b><code>prenom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="prenom" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="query"  hidden>
<br>
</p>
<p>
<b><code>mail</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mail" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="query"  hidden>
<br>
</p>
<p>
<b><code>id_univ</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="id_univ" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="query"  hidden>
<br>
</p>
<p>
<b><code>admin</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-gestionnaires--gestionnaire-" hidden><input type="radio" name="admin" value="1" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="query" ><code>true</code></label>
<label data-endpoint="PUTapi-gestionnaires--gestionnaire-" hidden><input type="radio" name="admin" value="0" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="query" ><code>false</code></label>
<br>
True si le gestionnaire est un administrateur</p>
<p>
<b><code>departement_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="departement_id" data-endpoint="PUTapi-gestionnaires--gestionnaire-" data-component="query"  hidden>
<br>
ID Pictum du département correspondant</p>
</form>


## Remove the specified resource from storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/gestionnaires/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

{
"Delete OK"
}
```
<div id="execution-results-DELETEapi-gestionnaires--gestionnaire-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-gestionnaires--gestionnaire-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-gestionnaires--gestionnaire-"></code></pre>
</div>
<div id="execution-error-DELETEapi-gestionnaires--gestionnaire-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-gestionnaires--gestionnaire-"></code></pre>
</div>
<form id="form-DELETEapi-gestionnaires--gestionnaire-" data-method="DELETE" data-path="api/gestionnaires/{gestionnaire}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-gestionnaires--gestionnaire-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-gestionnaires--gestionnaire-" onclick="tryItOut('DELETEapi-gestionnaires--gestionnaire-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-gestionnaires--gestionnaire-" onclick="cancelTryOut('DELETEapi-gestionnaires--gestionnaire-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-gestionnaires--gestionnaire-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/gestionnaires/{gestionnaire}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>gestionnaire</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="gestionnaire" data-endpoint="DELETEapi-gestionnaires--gestionnaire-" data-component="url"  hidden>
<br>
ID du gestionnaire à afficher</p>
</form>



