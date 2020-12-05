# Malette


## Display a listing of the Malettes.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes"
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
        "nom": "Etha Weber",
        "ref": "L1_MAL_PHOTO_03",
        "photo": "https:\/\/via.placeholder.com\/200x200.png\/006688?text=laborum",
        "materiels": [
            {
                "id": 1,
                "created_at": "2020-12-03T17:31:12.000000Z",
                "updated_at": "2020-12-03T17:31:12.000000Z",
                "ref": "L2_PER_RHO_01",
                "nom": "Brionna Funk",
                "photo": "https:\/\/via.placeholder.com\/200x200.png\/00bb33?text=fugiat",
                "usage": "Hatter went on, 'if you don't like the look of the busy farm-yard--while the lowing of the Nile On every golden scale! 'How cheerfully he seems to be found: all she could do, lying down on one of.",
                "carac": "Queen added to one of the goldfish kept running in her face, and was in the face. 'I'll put a stop to this,' she said to herself; 'I should think very likely to eat or drink anything; so I'll just.",
                "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
                "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
                "indisp": 0,
                "indisp_raison": "Mabel, for I know who I WAS when I was going to.",
                "type_id": 19,
                "malette_id": 1,
                "departement_id": 7
            },
            {
                "id": 7,
                "created_at": "2020-12-03T17:31:12.000000Z",
                "updated_at": "2020-12-03T17:31:12.000000Z",
                "ref": "L2_PER_RHO_01",
                "nom": "Terrell Murray",
                "photo": "https:\/\/via.placeholder.com\/200x200.png\/004466?text=placeat",
                "usage": "I can creep under the table: she opened it, and they sat down, and nobody spoke for some way, and then keep tight hold of its right ear and left foot, so as to bring tears into her eyes; and once.",
                "carac": "YOU sing,' said the Hatter. 'He won't stand beating. Now, if you want to stay in here any longer!' She waited for some time after the others. 'We must burn the house of the goldfish kept running in.",
                "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
                "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
                "indisp": 0,
                "indisp_raison": "Alice whispered, 'that it's done by everybody.",
                "type_id": 18,
                "malette_id": 1,
                "departement_id": 2
            },
            {
                "id": 8,
                "created_at": "2020-12-03T17:31:12.000000Z",
                "updated_at": "2020-12-03T17:31:12.000000Z",
                "ref": "L2_ENR_ZOOM_01",
                "nom": "Tristin Erdman",
                "photo": "https:\/\/via.placeholder.com\/200x200.png\/007777?text=vero",
                "usage": "I've had such a long hookah, and taking not the smallest notice of them can explain it,' said the Mock Turtle yawned and shut his eyes.--'Tell her about the same words as before, 'It's all her.",
                "carac": "Alice. 'Exactly so,' said the Gryphon. 'We can do without lobsters, you know. So you see, as she could, and waited till the eyes appeared, and then nodded. 'It's no use in knocking,' said the.",
                "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
                "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
                "indisp": 1,
                "indisp_raison": "ONE.' 'One, indeed!' said the Footman. 'That's.",
                "type_id": 17,
                "malette_id": 1,
                "departement_id": 6
            },
            {
                "id": 46,
                "created_at": "2020-12-03T17:31:13.000000Z",
                "updated_at": "2020-12-03T17:31:13.000000Z",
                "ref": "L2_ENR_ZOOM_01",
                "nom": "Dr. Jesus Mitchell",
                "photo": "https:\/\/via.placeholder.com\/200x200.png\/00ff33?text=voluptatem",
                "usage": "I know!' exclaimed Alice, who had spoken first. 'That's none of them hit her in such confusion that she was now the right words,' said poor Alice, 'when one wasn't always growing larger and smaller.",
                "carac": "Alice, jumping up in her life; it was quite surprised to see some meaning in it,' but none of my life.' 'You are old,' said the Dormouse; 'VERY ill.' Alice tried to curtsey as she had made her so.",
                "tutos": "[{\"name\": \"John\", \"skills\": [\"SQL\", \"C#\", \"Azure\"]}, {\"name\": \"Jane\", \"surname\": \"Doe\"}]",
                "notice": "http:\/\/blog.foto24.com\/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
                "indisp": 0,
                "indisp_raison": "I then? Tell me that first, and then added them.",
                "type_id": 16,
                "malette_id": 1,
                "departement_id": 2
            }
        ]
    }
]
```
<div id="execution-results-GETapi-malettes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-malettes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-malettes"></code></pre>
</div>
<div id="execution-error-GETapi-malettes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-malettes"></code></pre>
</div>
<form id="form-GETapi-malettes" data-method="GET" data-path="api/malettes" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-malettes', this);">
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
<p>
<label id="auth-GETapi-malettes" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-malettes" data-component="header"></label>
</p>
</form>


## Display the specified Malette

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes/est"
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
    "nom": "Iliana Graham",
    "ref": "L1_MAL_PHOTO_03",
    "photo": "https:\/\/via.placeholder.com\/200x200.png\/00ee22?text=doloremque"
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
<form id="form-GETapi-malettes--malette-" data-method="GET" data-path="api/malettes/{malette}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-malettes--malette-', this);">
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
<p>
<label id="auth-GETapi-malettes--malette-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-malettes--malette-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>malette</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="malette" data-endpoint="GETapi-malettes--malette-" data-component="url"  hidden>
<br>
ID Pictum de la malette</p>
</form>


## Store a newly created resource in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('nom', 'excepturi');
body.append('ref', 'deleniti');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
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
<form id="form-POSTapi-malettes" data-method="POST" data-path="api/malettes" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-malettes', this);">
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
<p>
<label id="auth-POSTapi-malettes" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-malettes" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nom" data-endpoint="POSTapi-malettes" data-component="body" required  hidden>
<br>
Nom affiché de la malette</p>
<p>
<b><code>ref</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ref" data-endpoint="POSTapi-malettes" data-component="body" required  hidden>
<br>
Reférence de la malette en particulier</p>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="photo" data-endpoint="POSTapi-malettes" data-component="body" required  hidden>
<br>
Photo de la malette</p>

</form>


## Update the specified Malette in storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes/exercitationem"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('nom', 'corrupti');
body.append('ref', 'unde');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
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
<form id="form-PUTapi-malettes--malette-" data-method="PUT" data-path="api/malettes/{malette}" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-malettes--malette-', this);">
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
<p>
<label id="auth-PUTapi-malettes--malette-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-malettes--malette-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>malette</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="malette" data-endpoint="PUTapi-malettes--malette-" data-component="url"  hidden>
<br>
ID Pictum de la malette</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nom</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nom" data-endpoint="PUTapi-malettes--malette-" data-component="body" required  hidden>
<br>
Nom affiché de la malette</p>
<p>
<b><code>ref</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ref" data-endpoint="PUTapi-malettes--malette-" data-component="body" required  hidden>
<br>
Reférence de la malette en particulier</p>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="photo" data-endpoint="PUTapi-malettes--malette-" data-component="body" required  hidden>
<br>
Photo de la malette</p>

</form>


## Remove the specified resource from storage.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/malettes/modi"
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
<div id="execution-results-DELETEapi-malettes--malette-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-malettes--malette-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-malettes--malette-"></code></pre>
</div>
<div id="execution-error-DELETEapi-malettes--malette-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-malettes--malette-"></code></pre>
</div>
<form id="form-DELETEapi-malettes--malette-" data-method="DELETE" data-path="api/malettes/{malette}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-malettes--malette-', this);">
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
<p>
<label id="auth-DELETEapi-malettes--malette-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-malettes--malette-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>malette</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="malette" data-endpoint="DELETEapi-malettes--malette-" data-component="url"  hidden>
<br>
ID Pictum de la malette</p>
</form>



