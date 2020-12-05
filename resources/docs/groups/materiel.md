# Materiel


## Display a listing of the Materiel.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels"
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
        "ref": "L2_PER_RHO_01",
        "photo": "https:\/\/via.placeholder.com\/200x200.png\/00bb33?text=fugiat",
        "usage": "Hatter went on, 'if you don't like the look of the busy farm-yard--while the lowing of the Nile On every golden scale! 'How cheerfully he seems to be found: all she could do, lying down on one of.",
        "caracteristiques": "Queen added to one of the goldfish kept running in her face, and was in the face. 'I'll put a stop to this,' she said to herself; 'I should think very likely to eat or drink anything; so I'll just.",
        "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
        "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
        "indisponible": 0,
        "indisp_raison": "Mabel, for I know who I WAS when I was going to.",
        "type": {
            "id": 19,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "nom": "Lumiere",
            "picto": "https:\/\/via.placeholder.com\/30x30.png\/009944?text=omnis"
        },
        "malette": {
            "id": 1,
            "created_at": "2020-12-03T17:30:34.000000Z",
            "updated_at": "2020-12-03T17:30:34.000000Z",
            "nom": "Etha Weber",
            "ref": "L1_MAL_PHOTO_03",
            "photo": "https:\/\/via.placeholder.com\/200x200.png\/006688?text=laborum"
        },
        "departement": {
            "id": 7,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "lat": 63.66,
            "long": 36.7,
            "nom": "South Vickyborough",
            "gestionnaire_id": 4
        },
        "prets": [
            {
                "id": 38,
                "created_at": "2020-12-03T17:31:13.000000Z",
                "updated_at": "2020-12-03T17:31:13.000000Z",
                "date_debut": "2020-07-24 16:55:58",
                "date_fin": "2020-08-20 09:48:52",
                "rendu": "2021-01-13 12:57:10",
                "materiel_id": 1,
                "reservation_id": 47,
                "gestionnaire_id": 7
            },
            {
                "id": 59,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "date_debut": "2020-05-12 01:07:08",
                "date_fin": "2020-05-31 18:05:24",
                "rendu": "2020-05-31 18:05:24",
                "materiel_id": 1,
                "reservation_id": 69,
                "gestionnaire_id": 9
            },
            {
                "id": 94,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "date_debut": "2020-12-16 04:54:45",
                "date_fin": "2020-01-04 17:03:00",
                "rendu": null,
                "materiel_id": 1,
                "reservation_id": 91,
                "gestionnaire_id": 2
            }
        ],
        "jour_dispo": [
            {
                "date": "2020-12-05",
                "disponible": false
            },
            {
                "date": "2020-12-06",
                "disponible": false
            },
            {
                "date": "2020-12-07",
                "disponible": false
            },
            {
                "date": "2020-12-08",
                "disponible": false
            },
            {
                "date": "2020-12-09",
                "disponible": false
            },
            {
                "date": "2020-12-10",
                "disponible": false
            },
            {
                "date": "2020-12-11",
                "disponible": false
            },
            {
                "date": "2020-12-12",
                "disponible": false
            },
            {
                "date": "2020-12-13",
                "disponible": false
            }
        ]
    }
]
```
<div id="execution-results-GETapi-materiels" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-materiels"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-materiels"></code></pre>
</div>
<div id="execution-error-GETapi-materiels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-materiels"></code></pre>
</div>
<form id="form-GETapi-materiels" data-method="GET" data-path="api/materiels" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-materiels', this);">
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
<p>
<label id="auth-GETapi-materiels" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-materiels" data-component="header"></label>
</p>
</form>


## Display the specified resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels/3"
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
        "ref": "L2_PER_RHO_01",
        "photo": "https:\/\/via.placeholder.com\/200x200.png\/00bb33?text=fugiat",
        "usage": "Hatter went on, 'if you don't like the look of the busy farm-yard--while the lowing of the Nile On every golden scale! 'How cheerfully he seems to be found: all she could do, lying down on one of.",
        "caracteristiques": "Queen added to one of the goldfish kept running in her face, and was in the face. 'I'll put a stop to this,' she said to herself; 'I should think very likely to eat or drink anything; so I'll just.",
        "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
        "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
        "indisponible": 0,
        "indisp_raison": "Mabel, for I know who I WAS when I was going to.",
        "type": {
            "id": 19,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "nom": "Lumiere",
            "picto": "https:\/\/via.placeholder.com\/30x30.png\/009944?text=omnis"
        },
        "malette": {
            "id": 1,
            "created_at": "2020-12-03T17:30:34.000000Z",
            "updated_at": "2020-12-03T17:30:34.000000Z",
            "nom": "Etha Weber",
            "ref": "L1_MAL_PHOTO_03",
            "photo": "https:\/\/via.placeholder.com\/200x200.png\/006688?text=laborum"
        },
        "departement": {
            "id": 7,
            "created_at": "2020-12-03T17:31:12.000000Z",
            "updated_at": "2020-12-03T17:31:12.000000Z",
            "lat": 63.66,
            "long": 36.7,
            "nom": "South Vickyborough",
            "gestionnaire_id": 4
        },
        "prets": [
            {
                "id": 38,
                "created_at": "2020-12-03T17:31:13.000000Z",
                "updated_at": "2020-12-03T17:31:13.000000Z",
                "date_debut": "2020-07-24 16:55:58",
                "date_fin": "2020-08-20 09:48:52",
                "rendu": "2021-01-13 12:57:10",
                "materiel_id": 1,
                "reservation_id": 47,
                "gestionnaire_id": 7
            },
            {
                "id": 59,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "date_debut": "2020-05-12 01:07:08",
                "date_fin": "2020-05-31 18:05:24",
                "rendu": "2020-05-31 18:05:24",
                "materiel_id": 1,
                "reservation_id": 69,
                "gestionnaire_id": 9
            },
            {
                "id": 94,
                "created_at": "2020-12-03T17:31:14.000000Z",
                "updated_at": "2020-12-03T17:31:14.000000Z",
                "date_debut": "2020-12-16 04:54:45",
                "date_fin": "2020-01-04 17:03:00",
                "rendu": null,
                "materiel_id": 1,
                "reservation_id": 91,
                "gestionnaire_id": 2
            }
        ],
        "jour_dispo": [
            {
                "date": "2020-12-05",
                "disponible": false
            },
            {
                "date": "2020-12-06",
                "disponible": false
            },
            {
                "date": "2020-12-07",
                "disponible": false
            },
            {
                "date": "2020-12-08",
                "disponible": false
            },
            {
                "date": "2020-12-09",
                "disponible": false
            },
            {
                "date": "2020-12-10",
                "disponible": false
            },
            {
                "date": "2020-12-11",
                "disponible": false
            },
            {
                "date": "2020-12-12",
                "disponible": false
            },
            {
                "date": "2020-12-13",
                "disponible": false
            }
        ]
    }
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
<form id="form-GETapi-materiels--materiel-" data-method="GET" data-path="api/materiels/{materiel}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-materiels--materiel-', this);">
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
<p>
<label id="auth-GETapi-materiels--materiel-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-materiels--materiel-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>materiel</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="materiel" data-endpoint="GETapi-materiels--materiel-" data-component="url" required  hidden>
<br>
ID pictum du matériel</p>
</form>


## Store a newly created resource in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('ref', 'quo');
body.append('nom', 'maiores');
body.append('usage', 'est');
body.append('carac', 'velit');
body.append('tutos', 'maiores');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

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
<div id="execution-results-POSTapi-materiels" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-materiels"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-materiels"></code></pre>
</div>
<div id="execution-error-POSTapi-materiels" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-materiels"></code></pre>
</div>
<form id="form-POSTapi-materiels" data-method="POST" data-path="api/materiels" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-materiels', this);">
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
<p>
<label id="auth-POSTapi-materiels" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-materiels" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>ref</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ref" data-endpoint="POSTapi-materiels" data-component="body" required  hidden>
<br>
Reference du materiel</p>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nom" data-endpoint="POSTapi-materiels" data-component="body" required  hidden>
<br>
Nom</p>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="photo" data-endpoint="POSTapi-materiels" data-component="body" required  hidden>
<br>
Photo du matériel</p>
<p>
<b><code>usage</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="usage" data-endpoint="POSTapi-materiels" data-component="body" required  hidden>
<br>
Usage possible du matériel</p>
<p>
<b><code>carac</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="carac" data-endpoint="POSTapi-materiels" data-component="body" required  hidden>
<br>
Caractéristiques techniques du matériel</p>
<p>
<b><code>tutos</code></b>&nbsp;&nbsp;<small>json</small>  &nbsp;
<input type="text" name="tutos" data-endpoint="POSTapi-materiels" data-component="body" required  hidden>
<br>
Array comme ca : [
{
"name": "John",
"skills": ["SQL", "C#", "Azure"]
},
{
"name": "Jane",
"surname": "Doe"
}
]</p>

</form>


## Update the specified Materiel in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels/5"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('ref', 'reprehenderit');
body.append('nom', 'quae');
body.append('usage', 'perferendis');
body.append('carac', 'eaque');
body.append('tutos', 'qui');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

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
<div id="execution-results-PUTapi-materiels--materiel-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-materiels--materiel-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-materiels--materiel-"></code></pre>
</div>
<div id="execution-error-PUTapi-materiels--materiel-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-materiels--materiel-"></code></pre>
</div>
<form id="form-PUTapi-materiels--materiel-" data-method="PUT" data-path="api/materiels/{materiel}" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-materiels--materiel-', this);">
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
<p>
<label id="auth-PUTapi-materiels--materiel-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-materiels--materiel-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>materiel</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="materiel" data-endpoint="PUTapi-materiels--materiel-" data-component="url" required  hidden>
<br>
ID pictum du matériel</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>ref</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ref" data-endpoint="PUTapi-materiels--materiel-" data-component="body"  hidden>
<br>
Reference du materiel</p>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nom" data-endpoint="PUTapi-materiels--materiel-" data-component="body"  hidden>
<br>
Nom</p>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="photo" data-endpoint="PUTapi-materiels--materiel-" data-component="body"  hidden>
<br>
Photo du matériel</p>
<p>
<b><code>usage</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="usage" data-endpoint="PUTapi-materiels--materiel-" data-component="body"  hidden>
<br>
Usage possible du matériel</p>
<p>
<b><code>carac</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carac" data-endpoint="PUTapi-materiels--materiel-" data-component="body"  hidden>
<br>
Caractéristiques techniques du matériel</p>
<p>
<b><code>tutos</code></b>&nbsp;&nbsp;<small>json</small>     <i>optional</i> &nbsp;
<input type="text" name="tutos" data-endpoint="PUTapi-materiels--materiel-" data-component="body"  hidden>
<br>
Array comme ca : [
{
"name": "John",
"skills": ["SQL", "C#", "Azure"]
},
{
"name": "Jane",
"surname": "Doe"
}
]</p>

</form>


## Remove the specified resource from storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/materiels/13"
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
     "Delete OK"
}
```
<div id="execution-results-DELETEapi-materiels--materiel-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-materiels--materiel-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-materiels--materiel-"></code></pre>
</div>
<div id="execution-error-DELETEapi-materiels--materiel-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-materiels--materiel-"></code></pre>
</div>
<form id="form-DELETEapi-materiels--materiel-" data-method="DELETE" data-path="api/materiels/{materiel}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-materiels--materiel-', this);">
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
<p>
<label id="auth-DELETEapi-materiels--materiel-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-materiels--materiel-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>materiel</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="materiel" data-endpoint="DELETEapi-materiels--materiel-" data-component="url" required  hidden>
<br>
ID pictum du matériel</p>
</form>



