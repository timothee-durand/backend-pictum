# Creneaux


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/creneaux"
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
        "id": 1,
        "created_at": "2020-12-03T17:31:14.000000Z",
        "updated_at": "2020-12-03T17:31:14.000000Z",
        "jour": 1,
        "heure_debut_matin": "07:20:32",
        "heure_fin_matin": "11:49:03",
        "heure_debut_am": "13:34:21",
        "heure_fin_am": "17:53:21",
        "gestionnaire_id": 7
    },
    {
        "id": 2,
        "created_at": "2020-12-03T17:31:14.000000Z",
        "updated_at": "2020-12-03T17:31:14.000000Z",
        "jour": 1,
        "heure_debut_matin": "07:00:32",
        "heure_fin_matin": "11:41:31",
        "heure_debut_am": "13:48:33",
        "heure_fin_am": "16:57:37",
        "gestionnaire_id": 9
    }
]
```
<div id="execution-results-GETapi-creneaux" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-creneaux"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-creneaux"></code></pre>
</div>
<div id="execution-error-GETapi-creneaux" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-creneaux"></code></pre>
</div>
<form id="form-GETapi-creneaux" data-method="GET" data-path="api/creneaux" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-creneaux', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-creneaux" onclick="tryItOut('GETapi-creneaux');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-creneaux" onclick="cancelTryOut('GETapi-creneaux');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-creneaux" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/creneaux</code></b>
</p>
</form>


## Store Gestionnaire&#039;s Creneaux
Send only creneaux who are used

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/creneaux"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "creneaux[]": "natus"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-creneaux" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-creneaux"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-creneaux"></code></pre>
</div>
<div id="execution-error-POSTapi-creneaux" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-creneaux"></code></pre>
</div>
<form id="form-POSTapi-creneaux" data-method="POST" data-path="api/creneaux" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-creneaux', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-creneaux" onclick="tryItOut('POSTapi-creneaux');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-creneaux" onclick="cancelTryOut('POSTapi-creneaux');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-creneaux" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/creneaux</code></b>
</p>
<p>
<label id="auth-POSTapi-creneaux" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-creneaux" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>creneaux[]</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="creneaux.0" data-endpoint="POSTapi-creneaux" data-component="body"  hidden>
<br>
Array of the creneaux of a gestionnaire</p>
<p>
<details>
<summary>
<b><code>creneaux</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>creneaux[].jour</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="creneaux.0.jour" data-endpoint="POSTapi-creneaux" data-component="body" required  hidden>
<br>
Index du jour correspondant (0 => Dimanche)</p>
<p>
<b><code>creneaux[].heure_debut_matin</code></b>&nbsp;&nbsp;<small>Time</small>  &nbsp;
<input type="text" name="creneaux.0.heure_debut_matin" data-endpoint="POSTapi-creneaux" data-component="body" required  hidden>
<br>
Heure de début de la période du matin</p>
<p>
<b><code>creneaux[].heure_fin_matin</code></b>&nbsp;&nbsp;<small>Time</small>  &nbsp;
<input type="text" name="creneaux.0.heure_fin_matin" data-endpoint="POSTapi-creneaux" data-component="body" required  hidden>
<br>
Heure de fin de la période du matin</p>
<p>
<b><code>creneaux[].heure_debut_am</code></b>&nbsp;&nbsp;<small>Time</small>  &nbsp;
<input type="text" name="creneaux.0.heure_debut_am" data-endpoint="POSTapi-creneaux" data-component="body" required  hidden>
<br>
Heure de début de la période de l'après-midi</p>
<p>
<b><code>creneaux[].heure_fin_am</code></b>&nbsp;&nbsp;<small>Time</small>  &nbsp;
<input type="text" name="creneaux.0.heure_fin_am" data-endpoint="POSTapi-creneaux" data-component="body" required  hidden>
<br>
Heure de fin de la période de l'après-midi</p>
<p>
<b><code>creneaux[].gestionnaire_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="creneaux.0.gestionnaire_id" data-endpoint="POSTapi-creneaux" data-component="body" required  hidden>
<br>
ID du gestionnaire correspondant</p>
</details>
</p>

</form>


## Update the specifieds resources in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/creneaux/repellendus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTapi-creneaux--creneaux-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-creneaux--creneaux-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-creneaux--creneaux-"></code></pre>
</div>
<div id="execution-error-PUTapi-creneaux--creneaux-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-creneaux--creneaux-"></code></pre>
</div>
<form id="form-PUTapi-creneaux--creneaux-" data-method="PUT" data-path="api/creneaux/{creneaux}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-creneaux--creneaux-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-creneaux--creneaux-" onclick="tryItOut('PUTapi-creneaux--creneaux-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-creneaux--creneaux-" onclick="cancelTryOut('PUTapi-creneaux--creneaux-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-creneaux--creneaux-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/creneaux/{creneaux}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/creneaux/{creneaux}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>creneaux</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="creneaux" data-endpoint="PUTapi-creneaux--creneaux-" data-component="url" required  hidden>
<br>
</p>
</form>



