# Blacklist


## Display a listing of the user that are in the Blacklist

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/blacklists"
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
        "nom": "Mckenna",
        "prenom": "Kuhic",
        "mail": "matilda77@yahoo.com",
        "id_univ": "kasandra.kling"
    },
    {
        "id": 2,
        "created_at": "2020-12-03T17:30:34.000000Z",
        "updated_at": "2020-12-03T17:30:34.000000Z",
        "nom": "Coby",
        "prenom": "Murray",
        "mail": "windler.godfrey@hotmail.com",
        "id_univ": "clemmie29"
    }
]
```
<div id="execution-results-GETapi-blacklists" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-blacklists"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blacklists"></code></pre>
</div>
<div id="execution-error-GETapi-blacklists" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blacklists"></code></pre>
</div>
<form id="form-GETapi-blacklists" data-method="GET" data-path="api/blacklists" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-blacklists', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-blacklists" onclick="tryItOut('GETapi-blacklists');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-blacklists" onclick="cancelTryOut('GETapi-blacklists');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-blacklists" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/blacklists</code></b>
</p>
<p>
<label id="auth-GETapi-blacklists" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-blacklists" data-component="header"></label>
</p>
</form>


## Display the specified Blacklisted person.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/blacklists/veritatis"
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
    "id": 1,
    "created_at": "2020-12-03T17:30:34.000000Z",
    "updated_at": "2020-12-03T17:30:34.000000Z",
    "nom": "Mckenna",
    "prenom": "Kuhic",
    "mail": "matilda77@yahoo.com",
    "id_univ": "kasandra.kling"
}
```
<div id="execution-results-GETapi-blacklists--blacklist-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-blacklists--blacklist-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blacklists--blacklist-"></code></pre>
</div>
<div id="execution-error-GETapi-blacklists--blacklist-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blacklists--blacklist-"></code></pre>
</div>
<form id="form-GETapi-blacklists--blacklist-" data-method="GET" data-path="api/blacklists/{blacklist}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-blacklists--blacklist-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-blacklists--blacklist-" onclick="tryItOut('GETapi-blacklists--blacklist-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-blacklists--blacklist-" onclick="cancelTryOut('GETapi-blacklists--blacklist-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-blacklists--blacklist-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/blacklists/{blacklist}</code></b>
</p>
<p>
<label id="auth-GETapi-blacklists--blacklist-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-blacklists--blacklist-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>blacklist</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="blacklist" data-endpoint="GETapi-blacklists--blacklist-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="id" data-endpoint="GETapi-blacklists--blacklist-" data-component="url"  hidden>
<br>
ID Pictum</p>
</form>


## Store a newly created Blacklist in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/blacklists"
);

let params = {
    "nom": "sed",
    "prenom": "laboriosam",
    "mail": "vel",
    "id_univ": "earum",
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
 "Blacklist Created"
}
```
<div id="execution-results-POSTapi-blacklists" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-blacklists"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blacklists"></code></pre>
</div>
<div id="execution-error-POSTapi-blacklists" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blacklists"></code></pre>
</div>
<form id="form-POSTapi-blacklists" data-method="POST" data-path="api/blacklists" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-blacklists', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-blacklists" onclick="tryItOut('POSTapi-blacklists');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-blacklists" onclick="cancelTryOut('POSTapi-blacklists');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-blacklists" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/blacklists</code></b>
</p>
<p>
<label id="auth-POSTapi-blacklists" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-blacklists" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nom" data-endpoint="POSTapi-blacklists" data-component="query" required  hidden>
<br>
string Nom de la personne</p>
<p>
<b><code>prenom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="prenom" data-endpoint="POSTapi-blacklists" data-component="query" required  hidden>
<br>
string Prénom de la personne</p>
<p>
<b><code>mail</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mail" data-endpoint="POSTapi-blacklists" data-component="query" required  hidden>
<br>
string Mail de la personne</p>
<p>
<b><code>id_univ</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id_univ" data-endpoint="POSTapi-blacklists" data-component="query" required  hidden>
<br>
string Id universitaire de la personne</p>
</form>


## Update the specified blacklisted person in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/blacklists/2"
);

let params = {
    "nom": "aut",
    "prenom": "impedit",
    "mail": "est",
    "id_univ": "velit",
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
"Not Find"
}
```
<div id="execution-results-PUTapi-blacklists--blacklist-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-blacklists--blacklist-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-blacklists--blacklist-"></code></pre>
</div>
<div id="execution-error-PUTapi-blacklists--blacklist-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-blacklists--blacklist-"></code></pre>
</div>
<form id="form-PUTapi-blacklists--blacklist-" data-method="PUT" data-path="api/blacklists/{blacklist}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-blacklists--blacklist-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-blacklists--blacklist-" onclick="tryItOut('PUTapi-blacklists--blacklist-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-blacklists--blacklist-" onclick="cancelTryOut('PUTapi-blacklists--blacklist-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-blacklists--blacklist-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/blacklists/{blacklist}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/blacklists/{blacklist}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>blacklist</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="blacklist" data-endpoint="PUTapi-blacklists--blacklist-" data-component="url"  hidden>
<br>
ID Pictum</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nom" data-endpoint="PUTapi-blacklists--blacklist-" data-component="query"  hidden>
<br>
Nom de la personne</p>
<p>
<b><code>prenom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="prenom" data-endpoint="PUTapi-blacklists--blacklist-" data-component="query"  hidden>
<br>
Prénom de la personne</p>
<p>
<b><code>mail</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mail" data-endpoint="PUTapi-blacklists--blacklist-" data-component="query"  hidden>
<br>
Mail de la personne</p>
<p>
<b><code>id_univ</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="id_univ" data-endpoint="PUTapi-blacklists--blacklist-" data-component="query"  hidden>
<br>
Id universitaire de la personne</p>
</form>


## Remove the specified resource from storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/blacklists/16"
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


<div id="execution-results-DELETEapi-blacklists--blacklist-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-blacklists--blacklist-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-blacklists--blacklist-"></code></pre>
</div>
<div id="execution-error-DELETEapi-blacklists--blacklist-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-blacklists--blacklist-"></code></pre>
</div>
<form id="form-DELETEapi-blacklists--blacklist-" data-method="DELETE" data-path="api/blacklists/{blacklist}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-blacklists--blacklist-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-blacklists--blacklist-" onclick="tryItOut('DELETEapi-blacklists--blacklist-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-blacklists--blacklist-" onclick="cancelTryOut('DELETEapi-blacklists--blacklist-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-blacklists--blacklist-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/blacklists/{blacklist}</code></b>
</p>
<p>
<label id="auth-DELETEapi-blacklists--blacklist-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-blacklists--blacklist-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>blacklist</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="blacklist" data-endpoint="DELETEapi-blacklists--blacklist-" data-component="url"  hidden>
<br>
ID Pictum correspondant</p>
</form>



