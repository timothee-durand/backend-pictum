# Departement


## Display a listing of the departements




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/departements"
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
        "lat": -88.3,
        "long": 5.09,
        "nom": "Port Conorside",
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
    },
    {
        "lat": 70.05,
        "long": -142.14,
        "nom": "North Rachaelburgh",
        "gestionnaire": {
            "id": 3,
            "created_at": "2020-12-03T17:30:34.000000Z",
            "updated_at": "2020-12-03T17:30:34.000000Z",
            "nom": "Lyric",
            "prenom": "Schmidt",
            "mail": "veronica.runte@hotmail.com",
            "id_univ": "edgar.schumm",
            "admin": 0
        }
    }
]
```
<div id="execution-results-GETapi-departements" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-departements"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departements"></code></pre>
</div>
<div id="execution-error-GETapi-departements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departements"></code></pre>
</div>
<form id="form-GETapi-departements" data-method="GET" data-path="api/departements" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-departements', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-departements" onclick="tryItOut('GETapi-departements');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-departements" onclick="cancelTryOut('GETapi-departements');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-departements" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/departements</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/departements/16"
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
{
    "data": {
        "lat": 70.05,
        "long": -142.14,
        "nom": "North Rachaelburgh",
        "gestionnaire": {
            "id": 3,
            "created_at": "2020-12-03T17:30:34.000000Z",
            "updated_at": "2020-12-03T17:30:34.000000Z",
            "nom": "Lyric",
            "prenom": "Schmidt",
            "mail": "veronica.runte@hotmail.com",
            "id_univ": "edgar.schumm",
            "admin": 0
        }
    }
}
```
<div id="execution-results-GETapi-departements--departement-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-departements--departement-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departements--departement-"></code></pre>
</div>
<div id="execution-error-GETapi-departements--departement-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departements--departement-"></code></pre>
</div>
<form id="form-GETapi-departements--departement-" data-method="GET" data-path="api/departements/{departement}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-departements--departement-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-departements--departement-" onclick="tryItOut('GETapi-departements--departement-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-departements--departement-" onclick="cancelTryOut('GETapi-departements--departement-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-departements--departement-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/departements/{departement}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>departement</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="departement" data-endpoint="GETapi-departements--departement-" data-component="url"  hidden>
<br>
ID du département concerné</p>
</form>


## Store a newly created departement in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/departements"
);

let params = {
    "lat": "2.069",
    "long": "217246593.4",
    "nom": "sit",
    "gestionnaire_id": "19",
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


> Example response (200):

```json

{
 "Create OK"
}
```
<div id="execution-results-POSTapi-departements" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-departements"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-departements"></code></pre>
</div>
<div id="execution-error-POSTapi-departements" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-departements"></code></pre>
</div>
<form id="form-POSTapi-departements" data-method="POST" data-path="api/departements" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-departements', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-departements" onclick="tryItOut('POSTapi-departements');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-departements" onclick="cancelTryOut('POSTapi-departements');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-departements" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/departements</code></b>
</p>
<p>
<label id="auth-POSTapi-departements" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-departements" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>lat</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="lat" data-endpoint="POSTapi-departements" data-component="query" required  hidden>
<br>
Latitude du département</p>
<p>
<b><code>long</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="long" data-endpoint="POSTapi-departements" data-component="query" required  hidden>
<br>
Longitude du département</p>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nom" data-endpoint="POSTapi-departements" data-component="query" required  hidden>
<br>
Nom du département</p>
<p>
<b><code>gestionnaire_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="gestionnaire_id" data-endpoint="POSTapi-departements" data-component="query" required  hidden>
<br>
ID Pictum du gestionnaire concerné</p>
</form>


## Update the specified resource in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/departements/9"
);

let params = {
    "lat": "490.79212",
    "long": "9014027",
    "nom": "ipsam",
    "gestionnaire_id": "9",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
<div id="execution-results-PUTapi-departements--departement-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-departements--departement-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-departements--departement-"></code></pre>
</div>
<div id="execution-error-PUTapi-departements--departement-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-departements--departement-"></code></pre>
</div>
<form id="form-PUTapi-departements--departement-" data-method="PUT" data-path="api/departements/{departement}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-departements--departement-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-departements--departement-" onclick="tryItOut('PUTapi-departements--departement-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-departements--departement-" onclick="cancelTryOut('PUTapi-departements--departement-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-departements--departement-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/departements/{departement}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/departements/{departement}</code></b>
</p>
<p>
<label id="auth-PUTapi-departements--departement-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-departements--departement-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>departement</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="departement" data-endpoint="PUTapi-departements--departement-" data-component="url"  hidden>
<br>
ID du département concerné</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>lat</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="lat" data-endpoint="PUTapi-departements--departement-" data-component="query"  hidden>
<br>
Latitude du département</p>
<p>
<b><code>long</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="long" data-endpoint="PUTapi-departements--departement-" data-component="query"  hidden>
<br>
Longitude du département</p>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nom" data-endpoint="PUTapi-departements--departement-" data-component="query"  hidden>
<br>
Nom du département</p>
<p>
<b><code>gestionnaire_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="gestionnaire_id" data-endpoint="PUTapi-departements--departement-" data-component="query"  hidden>
<br>
ID Pictum du gestionnaire concerné</p>
</form>


## Remove the specified resource from storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/departements/10"
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
 "Destroy OK"
}
```
<div id="execution-results-DELETEapi-departements--departement-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-departements--departement-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-departements--departement-"></code></pre>
</div>
<div id="execution-error-DELETEapi-departements--departement-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-departements--departement-"></code></pre>
</div>
<form id="form-DELETEapi-departements--departement-" data-method="DELETE" data-path="api/departements/{departement}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-departements--departement-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-departements--departement-" onclick="tryItOut('DELETEapi-departements--departement-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-departements--departement-" onclick="cancelTryOut('DELETEapi-departements--departement-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-departements--departement-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/departements/{departement}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>departement</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="departement" data-endpoint="DELETEapi-departements--departement-" data-component="url"  hidden>
<br>
ID du département concerné</p>
</form>



