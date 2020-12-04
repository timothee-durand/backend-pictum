# Endpoints


## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/sanctum/csrf-cookie"
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


<div id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span id="execution-response-status-GETsanctum-csrf-cookie"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"></code></pre>
</div>
<div id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie"></code></pre>
</div>
<form id="form-GETsanctum-csrf-cookie" data-method="GET" data-path="sanctum/csrf-cookie" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETsanctum-csrf-cookie" onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETsanctum-csrf-cookie" onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETsanctum-csrf-cookie" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>sanctum/csrf-cookie</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types"
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
<div id="execution-results-GETapi-types" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-types"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-types"></code></pre>
</div>
<div id="execution-error-GETapi-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-types"></code></pre>
</div>
<form id="form-GETapi-types" data-method="GET" data-path="api/types" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-types', this);">
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
</form>


## Display the specified resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types/omnis"
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
<div id="execution-results-GETapi-types--type-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-types--type-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-types--type-"></code></pre>
</div>
<div id="execution-error-GETapi-types--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-types--type-"></code></pre>
</div>
<form id="form-GETapi-types--type-" data-method="GET" data-path="api/types/{type}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-types--type-', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="GETapi-types--type-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes"
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
<div id="execution-results-GETapi-malettes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-malettes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-malettes"></code></pre>
</div>
<div id="execution-error-GETapi-malettes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-malettes"></code></pre>
</div>
<form id="form-GETapi-malettes" data-method="GET" data-path="api/malettes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-malettes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-malettes" onclick="tryItOut('GETapi-malettes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-malettes" onclick="cancelTryOut('GETapi-malettes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-malettes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/malettes</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes/fugit"
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
<div id="execution-results-GETapi-malettes--malette-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-malettes--malette-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-malettes--malette-"></code></pre>
</div>
<div id="execution-error-GETapi-malettes--malette-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-malettes--malette-"></code></pre>
</div>
<form id="form-GETapi-malettes--malette-" data-method="GET" data-path="api/malettes/{malette}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-malettes--malette-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-malettes--malette-" onclick="tryItOut('GETapi-malettes--malette-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-malettes--malette-" onclick="cancelTryOut('GETapi-malettes--malette-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-malettes--malette-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/malettes/{malette}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>malette</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="malette" data-endpoint="GETapi-malettes--malette-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/reservations"
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
<div id="execution-results-GETapi-reservations" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reservations"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reservations"></code></pre>
</div>
<div id="execution-error-GETapi-reservations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reservations"></code></pre>
</div>
<form id="form-GETapi-reservations" data-method="GET" data-path="api/reservations" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reservations', this);">
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
</form>


## Display the specified resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/reservations/omnis"
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
<div id="execution-results-GETapi-reservations--reservation-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reservations--reservation-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reservations--reservation-"></code></pre>
</div>
<div id="execution-error-GETapi-reservations--reservation-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reservations--reservation-"></code></pre>
</div>
<form id="form-GETapi-reservations--reservation-" data-method="GET" data-path="api/reservations/{reservation}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reservations--reservation-', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reservation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reservation" data-endpoint="GETapi-reservations--reservation-" data-component="url" required  hidden>
<br>
</p>
</form>


## Display a listing of the resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels"
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
<div id="execution-results-GETapi-materiels" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-materiels"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-materiels"></code></pre>
</div>
<div id="execution-error-GETapi-materiels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-materiels"></code></pre>
</div>
<form id="form-GETapi-materiels" data-method="GET" data-path="api/materiels" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-materiels', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-materiels" onclick="tryItOut('GETapi-materiels');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-materiels" onclick="cancelTryOut('GETapi-materiels');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-materiels" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/materiels</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels/quis"
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
<div id="execution-results-GETapi-materiels--materiel-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-materiels--materiel-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-materiels--materiel-"></code></pre>
</div>
<div id="execution-error-GETapi-materiels--materiel-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-materiels--materiel-"></code></pre>
</div>
<form id="form-GETapi-materiels--materiel-" data-method="GET" data-path="api/materiels/{materiel}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-materiels--materiel-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-materiels--materiel-" onclick="tryItOut('GETapi-materiels--materiel-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-materiels--materiel-" onclick="cancelTryOut('GETapi-materiels--materiel-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-materiels--materiel-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/materiels/{materiel}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>materiel</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="materiel" data-endpoint="GETapi-materiels--materiel-" data-component="url" required  hidden>
<br>
</p>
</form>


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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
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


## Display the specified resource.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites/quaerat"
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


## api/send-mail-contact-admin




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/send-mail-contact-admin"
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


<div id="execution-results-POSTapi-send-mail-contact-admin" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-send-mail-contact-admin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-send-mail-contact-admin"></code></pre>
</div>
<div id="execution-error-POSTapi-send-mail-contact-admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-send-mail-contact-admin"></code></pre>
</div>
<form id="form-POSTapi-send-mail-contact-admin" data-method="POST" data-path="api/send-mail-contact-admin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-send-mail-contact-admin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-send-mail-contact-admin" onclick="tryItOut('POSTapi-send-mail-contact-admin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-send-mail-contact-admin" onclick="cancelTryOut('POSTapi-send-mail-contact-admin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-send-mail-contact-admin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/send-mail-contact-admin</code></b>
</p>
</form>


## api/send-mail-gest




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/send-mail-gest"
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


<div id="execution-results-POSTapi-send-mail-gest" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-send-mail-gest"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-send-mail-gest"></code></pre>
</div>
<div id="execution-error-POSTapi-send-mail-gest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-send-mail-gest"></code></pre>
</div>
<form id="form-POSTapi-send-mail-gest" data-method="POST" data-path="api/send-mail-gest" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-send-mail-gest', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-send-mail-gest" onclick="tryItOut('POSTapi-send-mail-gest');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-send-mail-gest" onclick="cancelTryOut('POSTapi-send-mail-gest');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-send-mail-gest" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/send-mail-gest</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types"
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


<div id="execution-results-POSTapi-types" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-types"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-types"></code></pre>
</div>
<div id="execution-error-POSTapi-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-types"></code></pre>
</div>
<form id="form-POSTapi-types" data-method="POST" data-path="api/types" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-types', this);">
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
</form>


## Update the specified resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types/cum"
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


<div id="execution-results-PUTapi-types--type-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-types--type-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-types--type-"></code></pre>
</div>
<div id="execution-error-PUTapi-types--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-types--type-"></code></pre>
</div>
<form id="form-PUTapi-types--type-" data-method="PUT" data-path="api/types/{type}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-types--type-', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="PUTapi-types--type-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/types/omnis"
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


<div id="execution-results-DELETEapi-types--type-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-types--type-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-types--type-"></code></pre>
</div>
<div id="execution-error-DELETEapi-types--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-types--type-"></code></pre>
</div>
<form id="form-DELETEapi-types--type-" data-method="DELETE" data-path="api/types/{type}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-types--type-', this);">
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
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="DELETEapi-types--type-" data-component="url" required  hidden>
<br>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes"
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


<div id="execution-results-POSTapi-malettes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-malettes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-malettes"></code></pre>
</div>
<div id="execution-error-POSTapi-malettes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-malettes"></code></pre>
</div>
<form id="form-POSTapi-malettes" data-method="POST" data-path="api/malettes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-malettes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-malettes" onclick="tryItOut('POSTapi-malettes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-malettes" onclick="cancelTryOut('POSTapi-malettes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-malettes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/malettes</code></b>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes/blanditiis"
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


<div id="execution-results-PUTapi-malettes--malette-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-malettes--malette-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-malettes--malette-"></code></pre>
</div>
<div id="execution-error-PUTapi-malettes--malette-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-malettes--malette-"></code></pre>
</div>
<form id="form-PUTapi-malettes--malette-" data-method="PUT" data-path="api/malettes/{malette}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-malettes--malette-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-malettes--malette-" onclick="tryItOut('PUTapi-malettes--malette-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-malettes--malette-" onclick="cancelTryOut('PUTapi-malettes--malette-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-malettes--malette-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/malettes/{malette}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/malettes/{malette}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>malette</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="malette" data-endpoint="PUTapi-malettes--malette-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes/repudiandae"
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


<div id="execution-results-DELETEapi-malettes--malette-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-malettes--malette-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-malettes--malette-"></code></pre>
</div>
<div id="execution-error-DELETEapi-malettes--malette-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-malettes--malette-"></code></pre>
</div>
<form id="form-DELETEapi-malettes--malette-" data-method="DELETE" data-path="api/malettes/{malette}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-malettes--malette-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-malettes--malette-" onclick="tryItOut('DELETEapi-malettes--malette-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-malettes--malette-" onclick="cancelTryOut('DELETEapi-malettes--malette-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-malettes--malette-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/malettes/{malette}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>malette</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="malette" data-endpoint="DELETEapi-malettes--malette-" data-component="url" required  hidden>
<br>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels"
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


<div id="execution-results-POSTapi-materiels" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-materiels"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-materiels"></code></pre>
</div>
<div id="execution-error-POSTapi-materiels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-materiels"></code></pre>
</div>
<form id="form-POSTapi-materiels" data-method="POST" data-path="api/materiels" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-materiels', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-materiels" onclick="tryItOut('POSTapi-materiels');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-materiels" onclick="cancelTryOut('POSTapi-materiels');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-materiels" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/materiels</code></b>
</p>
</form>


## Update the specified resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels/sint"
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


<div id="execution-results-PUTapi-materiels--materiel-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-materiels--materiel-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-materiels--materiel-"></code></pre>
</div>
<div id="execution-error-PUTapi-materiels--materiel-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-materiels--materiel-"></code></pre>
</div>
<form id="form-PUTapi-materiels--materiel-" data-method="PUT" data-path="api/materiels/{materiel}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-materiels--materiel-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-materiels--materiel-" onclick="tryItOut('PUTapi-materiels--materiel-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-materiels--materiel-" onclick="cancelTryOut('PUTapi-materiels--materiel-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-materiels--materiel-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/materiels/{materiel}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/materiels/{materiel}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>materiel</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="materiel" data-endpoint="PUTapi-materiels--materiel-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels/dignissimos"
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


<div id="execution-results-DELETEapi-materiels--materiel-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-materiels--materiel-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-materiels--materiel-"></code></pre>
</div>
<div id="execution-error-DELETEapi-materiels--materiel-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-materiels--materiel-"></code></pre>
</div>
<form id="form-DELETEapi-materiels--materiel-" data-method="DELETE" data-path="api/materiels/{materiel}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-materiels--materiel-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-materiels--materiel-" onclick="tryItOut('DELETEapi-materiels--materiel-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-materiels--materiel-" onclick="cancelTryOut('DELETEapi-materiels--materiel-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-materiels--materiel-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/materiels/{materiel}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>materiel</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="materiel" data-endpoint="DELETEapi-materiels--materiel-" data-component="url" required  hidden>
<br>
</p>
</form>


## Store a newly created resource in storage.


Send a json array of indisponibilites

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
    method: "POST",
    headers,
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
</form>


## Update the specified resource in storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites/dolor"
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
<b><code>indisponibilite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="indisponibilite" data-endpoint="PUTapi-indisponibilites--indisponibilite-" data-component="url" required  hidden>
<br>
</p>
</form>


## Remove the specified resource from storage.




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/indisponibilites/velit"
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
<b><code>indisponibilite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="indisponibilite" data-endpoint="DELETEapi-indisponibilites--indisponibilite-" data-component="url" required  hidden>
<br>
</p>
</form>


## Connexion




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/login"
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


<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-login" onclick="tryItOut('POSTapi-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-login" onclick="cancelTryOut('POSTapi-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
</form>


## /




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/"
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

/public/
```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-" onclick="tryItOut('GET-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-" onclick="cancelTryOut('GET-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
</form>



