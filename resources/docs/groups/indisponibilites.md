# Indisponibilites


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites"
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
        "date_debut": "2020-11-10 17:29:14",
        "date_fin": "2020-11-24 01:01:31",
        "gestionnaire_id": 5
    },
    {
        "id": 2,
        "created_at": "2020-12-03T17:31:14.000000Z",
        "updated_at": "2020-12-03T17:31:14.000000Z",
        "date_debut": "2020-06-07 16:14:48",
        "date_fin": "2020-08-20 02:26:19",
        "gestionnaire_id": 9
    }
]
```
<div id="execution-results-GETapi-indisponibilites" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-indisponibilites"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-indisponibilites"></code></pre>
</div>
<div id="execution-error-GETapi-indisponibilites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-indisponibilites"></code></pre>
</div>
<form id="form-GETapi-indisponibilites" data-method="GET" data-path="api/indisponibilites" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-indisponibilites', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-indisponibilites" onclick="tryItOut('GETapi-indisponibilites');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-indisponibilites" onclick="cancelTryOut('GETapi-indisponibilites');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-indisponibilites" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/indisponibilites</code></b>
</p>
</form>


## Display the specified Indisponibilite.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites/unde"
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
<div id="execution-results-GETapi-indisponibilites--indisponibilite-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-indisponibilites--indisponibilite-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-indisponibilites--indisponibilite-"></code></pre>
</div>
<div id="execution-error-GETapi-indisponibilites--indisponibilite-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-indisponibilites--indisponibilite-"></code></pre>
</div>
<form id="form-GETapi-indisponibilites--indisponibilite-" data-method="GET" data-path="api/indisponibilites/{indisponibilite}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-indisponibilites--indisponibilite-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-indisponibilites--indisponibilite-" onclick="tryItOut('GETapi-indisponibilites--indisponibilite-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-indisponibilites--indisponibilite-" onclick="cancelTryOut('GETapi-indisponibilites--indisponibilite-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-indisponibilites--indisponibilite-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/indisponibilites/{indisponibilite}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>indisponibilite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="indisponibilite" data-endpoint="GETapi-indisponibilites--indisponibilite-" data-component="url" required  hidden>
<br>
</p>
</form>


## Store some new Indisponibilite




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "array_indispo[]": "et"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-indisponibilites" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-indisponibilites"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-indisponibilites"></code></pre>
</div>
<div id="execution-error-POSTapi-indisponibilites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-indisponibilites"></code></pre>
</div>
<form id="form-POSTapi-indisponibilites" data-method="POST" data-path="api/indisponibilites" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-indisponibilites', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-indisponibilites" onclick="tryItOut('POSTapi-indisponibilites');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-indisponibilites" onclick="cancelTryOut('POSTapi-indisponibilites');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-indisponibilites" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/indisponibilites</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>array_indispo[]</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="array_indispo.0" data-endpoint="POSTapi-indisponibilites" data-component="body"  hidden>
<br>
Tableau d'indisponibilités à créer</p>
<p>
<details>
<summary>
<b><code>array_indispo</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>array_indispo[].date_debut</code></b>&nbsp;&nbsp;<small>DateTime</small>  &nbsp;
<input type="text" name="array_indispo.0.date_debut" data-endpoint="POSTapi-indisponibilites" data-component="body" required  hidden>
<br>
Date de début de l'indisponibilite</p>
<p>
<b><code>array_indispo[].date_fin</code></b>&nbsp;&nbsp;<small>DateTime</small>  &nbsp;
<input type="text" name="array_indispo.0.date_fin" data-endpoint="POSTapi-indisponibilites" data-component="body" required  hidden>
<br>
Date de fin de l'indisponibilite</p>
<p>
<b><code>array_indispo[].id_gestionnaire</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="array_indispo.0.id_gestionnaire" data-endpoint="POSTapi-indisponibilites" data-component="body" required  hidden>
<br>
Id Pictum du gestionnaire concerné</p>
</details>
</p>

</form>


## Update the specified indisponibilite in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites/dolorum"
);

let params = {
    "date_debut": "voluptate",
    "date_fin": "ut",
    "id_gestionnaire": "3",
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
<div id="execution-results-PUTapi-indisponibilites--indisponibilite-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-indisponibilites--indisponibilite-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-indisponibilites--indisponibilite-"></code></pre>
</div>
<div id="execution-error-PUTapi-indisponibilites--indisponibilite-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-indisponibilites--indisponibilite-"></code></pre>
</div>
<form id="form-PUTapi-indisponibilites--indisponibilite-" data-method="PUT" data-path="api/indisponibilites/{indisponibilite}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-indisponibilites--indisponibilite-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-indisponibilites--indisponibilite-" onclick="tryItOut('PUTapi-indisponibilites--indisponibilite-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-indisponibilites--indisponibilite-" onclick="cancelTryOut('PUTapi-indisponibilites--indisponibilite-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-indisponibilites--indisponibilite-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/indisponibilites/{indisponibilite}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/indisponibilites/{indisponibilite}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>indisponibilite</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="indisponibilite" data-endpoint="PUTapi-indisponibilites--indisponibilite-" data-component="url"  hidden>
<br>
ID de l'indisponibilité concernée</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>date_debut</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="date_debut" data-endpoint="PUTapi-indisponibilites--indisponibilite-" data-component="query"  hidden>
<br>
DateTime Date de début de l'indisponibilite</p>
<p>
<b><code>date_fin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="date_fin" data-endpoint="PUTapi-indisponibilites--indisponibilite-" data-component="query"  hidden>
<br>
DateTime Date de fin de l'indisponibilite</p>
<p>
<b><code>id_gestionnaire</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id_gestionnaire" data-endpoint="PUTapi-indisponibilites--indisponibilite-" data-component="query"  hidden>
<br>
Id Pictum du gestionnaire concerné</p>
</form>


## Remove the specified resource from storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites/rem"
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
<div id="execution-results-DELETEapi-indisponibilites--indisponibilite-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-indisponibilites--indisponibilite-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-indisponibilites--indisponibilite-"></code></pre>
</div>
<div id="execution-error-DELETEapi-indisponibilites--indisponibilite-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-indisponibilites--indisponibilite-"></code></pre>
</div>
<form id="form-DELETEapi-indisponibilites--indisponibilite-" data-method="DELETE" data-path="api/indisponibilites/{indisponibilite}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-indisponibilites--indisponibilite-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-indisponibilites--indisponibilite-" onclick="tryItOut('DELETEapi-indisponibilites--indisponibilite-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-indisponibilites--indisponibilite-" onclick="cancelTryOut('DELETEapi-indisponibilites--indisponibilite-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-indisponibilites--indisponibilite-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/indisponibilites/{indisponibilite}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>indisponibilite</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="indisponibilite" data-endpoint="DELETEapi-indisponibilites--indisponibilite-" data-component="url"  hidden>
<br>
ID de l'indisponibilité concernée</p>
</form>



