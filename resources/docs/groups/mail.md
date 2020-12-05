# Mail


## Send a mail to the administration contact mail
(Paramétrable dans le fichier .env)




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/send-mail-contact-admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "from_address": "sunt",
    "from_name": "facere",
    "to_address": "repellendus",
    "content": "incidunt",
    "subject": "deserunt"
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
 "Mail envoyé"
}
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
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>from_address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="from_address" data-endpoint="POSTapi-send-mail-contact-admin" data-component="body"  hidden>
<br>
Adresse mail de l'envoyeur</p>
<p>
<b><code>from_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="from_name" data-endpoint="POSTapi-send-mail-contact-admin" data-component="body"  hidden>
<br>
Nom de l'envoyeur</p>
<p>
<b><code>to_address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="to_address" data-endpoint="POSTapi-send-mail-contact-admin" data-component="body"  hidden>
<br>
Adresse mail du destinataire</p>
<p>
<b><code>content</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="content" data-endpoint="POSTapi-send-mail-contact-admin" data-component="body"  hidden>
<br>
Contenu du mail</p>
<p>
<b><code>subject</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="subject" data-endpoint="POSTapi-send-mail-contact-admin" data-component="body"  hidden>
<br>
Objet du mail</p>

</form>


## Send a Personnalized Mail
Required to be a Gestionnaire




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/send-mail-gest"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_gestionnaire": 19,
    "to_address": "quo",
    "content_mail": "quidem",
    "subject": "ut"
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
 "Mail envoyé"
}
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
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id_gestionnaire</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id_gestionnaire" data-endpoint="POSTapi-send-mail-gest" data-component="body"  hidden>
<br>
ID du gestionnaire envoyant le mail</p>
<p>
<b><code>to_address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="to_address" data-endpoint="POSTapi-send-mail-gest" data-component="body"  hidden>
<br>
Adresse mail du destinataire</p>
<p>
<b><code>content_mail</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="content_mail" data-endpoint="POSTapi-send-mail-gest" data-component="body"  hidden>
<br>
Contenu du mail</p>
<p>
<b><code>subject</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="subject" data-endpoint="POSTapi-send-mail-gest" data-component="body"  hidden>
<br>
Objet du mail</p>

</form>



