# Type


## Display a listing of the Type.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types"
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
        "id": 1,
        "created_at": "2020-12-03T17:30:34.000000Z",
        "updated_at": "2020-12-03T17:30:34.000000Z",
        "nom": "Lumiere",
        "picto": "https:\/\/via.placeholder.com\/30x30.png\/0044cc?text=rerum"
    },
    {
        "id": 2,
        "created_at": "2020-12-03T17:30:34.000000Z",
        "updated_at": "2020-12-03T17:30:34.000000Z",
        "nom": "Prise de vue",
        "picto": "https:\/\/via.placeholder.com\/30x30.png\/005533?text=nostrum"
    }
]
```
<div id="execution-results-GETapi-types" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-types"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-types"></code></pre>
</div>
<div id="execution-error-GETapi-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-types"></code></pre>
</div>
<form id="form-GETapi-types" data-method="GET" data-path="api/types" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-types', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-types" onclick="tryItOut('GETapi-types');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-types" onclick="cancelTryOut('GETapi-types');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-types" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/types</code></b>
</p>
<p>
<label id="auth-GETapi-types" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-types" data-component="header"></label>
</p>
</form>


## Display the specified resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types/4"
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
    "id": 2,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Prise de vue",
    "picto": "https:\/\/via.placeholder.com\/30x30.png\/005533?text=nostrum"
}
```
<div id="execution-results-GETapi-types--type-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-types--type-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-types--type-"></code></pre>
</div>
<div id="execution-error-GETapi-types--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-types--type-"></code></pre>
</div>
<form id="form-GETapi-types--type-" data-method="GET" data-path="api/types/{type}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-types--type-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-types--type-" onclick="tryItOut('GETapi-types--type-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-types--type-" onclick="cancelTryOut('GETapi-types--type-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-types--type-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/types/{type}</code></b>
</p>
<p>
<label id="auth-GETapi-types--type-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-types--type-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="type" data-endpoint="GETapi-types--type-" data-component="url"  hidden>
<br>
ID Pictum du type demandé</p>
</form>


## Store a newly created resource in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('nom', 'voluptas');
body.append('picto', document.querySelector('input[name="picto"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```


> Example response (200):

```json

{
 "Store OK"
}
```
<div id="execution-results-POSTapi-types" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-types"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-types"></code></pre>
</div>
<div id="execution-error-POSTapi-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-types"></code></pre>
</div>
<form id="form-POSTapi-types" data-method="POST" data-path="api/types" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-types', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-types" onclick="tryItOut('POSTapi-types');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-types" onclick="cancelTryOut('POSTapi-types');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-types" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/types</code></b>
</p>
<p>
<label id="auth-POSTapi-types" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-types" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nom" data-endpoint="POSTapi-types" data-component="body" required  hidden>
<br>
Nom du Type</p>
<p>
<b><code>picto</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="picto" data-endpoint="POSTapi-types" data-component="body" required  hidden>
<br>
Pictogramme représentant le type</p>

</form>


## Update the specified resource in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types/20"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('nom', 'aliquam');
body.append('picto', document.querySelector('input[name="picto"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response => response.json());
```


> Example response (200):

```json

{
 "Update OK"
}
```
<div id="execution-results-PUTapi-types--type-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-types--type-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-types--type-"></code></pre>
</div>
<div id="execution-error-PUTapi-types--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-types--type-"></code></pre>
</div>
<form id="form-PUTapi-types--type-" data-method="PUT" data-path="api/types/{type}" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-types--type-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-types--type-" onclick="tryItOut('PUTapi-types--type-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-types--type-" onclick="cancelTryOut('PUTapi-types--type-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-types--type-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/types/{type}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/types/{type}</code></b>
</p>
<p>
<label id="auth-PUTapi-types--type-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-types--type-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="type" data-endpoint="PUTapi-types--type-" data-component="url"  hidden>
<br>
ID Pictum du type demandé</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nom" data-endpoint="PUTapi-types--type-" data-component="body"  hidden>
<br>
Nom du Type</p>
<p>
<b><code>picto</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="picto" data-endpoint="PUTapi-types--type-" data-component="body"  hidden>
<br>
Pictogramme représentant le type</p>

</form>


## Remove the specified resource from storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types/18"
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


> Example response (200):

```json

{
 "Destroy OK"
}
```
<div id="execution-results-DELETEapi-types--type-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-types--type-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-types--type-"></code></pre>
</div>
<div id="execution-error-DELETEapi-types--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-types--type-"></code></pre>
</div>
<form id="form-DELETEapi-types--type-" data-method="DELETE" data-path="api/types/{type}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-types--type-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-types--type-" onclick="tryItOut('DELETEapi-types--type-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-types--type-" onclick="cancelTryOut('DELETEapi-types--type-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-types--type-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/types/{type}</code></b>
</p>
<p>
<label id="auth-DELETEapi-types--type-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-types--type-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="type" data-endpoint="DELETEapi-types--type-" data-component="url"  hidden>
<br>
ID Pictum du type demandé</p>
</form>



