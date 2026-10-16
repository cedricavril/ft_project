// no GET['delete'] in url
if (window.location.href.includes('?delete')) window.location.replace("index.php");
/*init*/
let appellations = [];
var offersIndexToSend = [];
const input = document.getElementById("romeInput")
const list = document.getElementById("autocompleteList")
const splash = document.getElementById("splash")
const filtersForm = document.getElementById("filters-form")
const offersForm = document.getElementById("offers-form")
const alertForm = document.getElementById("alert-form")
const mailit = document.getElementById("mailit")
const toggleCollapseBtn = document.getElementById("toggle-collapse")
const emailInput = document.getElementById('alertEmail')
const flashMessage = document.getElementById("flash-message")
const modals = document.querySelectorAll('.modal')

document.getElementById("tooltiptext").textContent = document.getElementById("romeInput").value;

// a "refresh" url hash will submit the form again. Done when fail to get FT token, Cf. functions.php
if (window.location.hash === "#refresh") {
    window.location.hash = "";
    document.getElementById('filters-form').submit();
}


// will switch red or green (status 200) top-lighting on after req is done
function status_light(status)
{
    if (status != 200) document.getElementsByTagName('body')[0].classList.add('body-error')
    else document.getElementsByTagName('body')[0].classList.add('body-success')
}

/* ============================================================
   Ajax managing
============================================================ */
// appellations get created here. Errors will log in console. GET call written by bing's AI.
async function getData() {
    const url = "appellations.php";
    try {
        const response = await fetch(url);
        if (!response.ok) {
          throw new Error(`Response status: ${response.status}`);
        }

        appellations = await response.json();
    } catch (error) {
        console.error(error.message);
    }

    return appellations;
}

/*getData like, but POST oriented. */
async function post(request, success_msg, error_msg) {
    const response = await fetch(request);
    // this 200 can't be changed from remote and is the response code when successfully calling the file
    if (response.status != '200') {
        response.text = `<div class='error-message'>${error_msg}</div>`
        // in case of error, r.text (i.e. error_msg) is sent.
        return response
    }
    // Otherwise, native r.text() is used (not success_msg), i.e. string echoed from the called file.
    return response;
}

/* ============================================================
   load rome stuff when the page loads
============================================================ */
getData().then(result => {
    console.log("Appellations chargées :", appellations.length);
    console.log("Appellations :", appellations);
    console.log("Appellation 0 :", appellations[0]);
    return appellations
})

/* ============================================================
   Rome code autocompletion
============================================================ */
function autocompleteRome(input) {
    const query = input.trim().toLowerCase();

    sample = appellations.filter(a => a.libelle.toLowerCase().includes(query)  ||
        a.codeRome.toLowerCase().startsWith(query))
        .slice(0, 20)

    return sample;
}

input.addEventListener("input", () => {
    const results = autocompleteRome(input.value);

    document.getElementById("romeInput").nextElementSibling.style.display = "block"

    list.innerHTML = results.map(r =>
        `<div class="item" data-libelle="${r.libelle}" data-codeRome=${r.codeRome}>
            ${r.libelle} <span class="codeRome">${r.codeRome}</span>
        </div>`
    ).join("");
});
input.addEventListener("focusout", () => {
    document.getElementById("romeInput").nextElementSibling.style.display = "none"
});

/* ============================================================
   Toggle: show only checked offers
============================================================ */
const toggleCheckedBtn = document.getElementById("toggle-checked");

if (toggleCheckedBtn) {
    let showOnlyChecked = false;

    toggleCheckedBtn.addEventListener("click", () => {
        showOnlyChecked = !showOnlyChecked;

        const offers = document.querySelectorAll(".offer");

        offers.forEach(offer => {
            const checkbox = offer.querySelector(".offer-check");
            if (!checkbox) return;

            if (showOnlyChecked && !checkbox.checked) {
                offer.style.display = "none";
            } else {
                offer.style.display = "";
            }
        });

        toggleCheckedBtn.textContent = showOnlyChecked ? 
                "Afficher toutes les offres"
            :   "Afficher uniquement les offres cochées";
    });
}

/* ============================================================
   Toggle: collapse / expand all offers
============================================================ */
if (toggleCollapseBtn) {
    let collapsed = false;

    toggleCollapseBtn.addEventListener("click", () => {
        collapsed = !collapsed;

        const offers = document.querySelectorAll(".offer");

        offers.forEach(offer => {
            if (collapsed) {
                offer.classList.add("offer-collapsed");
            } else {
                offer.classList.remove("offer-collapsed");
            }
        });

        toggleCollapseBtn.textContent = collapsed
            ? "Déplier toutes les offres"
            : "Rétracter toutes les offres";
    });
}

/* ============================================================
   Modal managing
============================================================ */
//clicking outside the modals will hide them
modals.forEach(modal => {
    modal.addEventListener('click', function(event) {
        if (event.target === event.currentTarget) {
            hideModal();
        }
    });
});

function hideModal() {
    modals.forEach(modal => {
        modal.style.display = 'none'
    });
}

function showModal(modalId) {
    document.getElementById(modalId).style.display='flex'
    if (modalId == 'email-form') {
        document.getElementById('eMail').focus();
    }
}

// bind escape key to trigger hideModal()
// Source - https://stackoverflow.com/a/16089470
// Posted by Ian, modified by community. See post 'Timeline' for change history
// Retrieved 2026-08-08, License - CC BY-SA 3.0
addEvent(document, "keydown", function (e) {
    e = e || window.event;
    // use e.keyCode
    if (e.keyCode === 27) hideModal()
});

function addEvent(element, eventName, callback) {
    if (element.addEventListener) {
        element.addEventListener(eventName, callback, false);
    } else if (element.attachEvent) {
        element.attachEvent("on" + eventName, callback);
    } else {
        element["on" + eventName] = callback;
    }
}
// \Source - https://stackoverflow.com/a/16089470

/* ============================================================
   Alert managing
============================================================ */
function createAlert(email, freq = '', update = false) {
/* build a request to the server file */
    const requete1 = new Request("create_alert.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({'email': email, 'freq': freq, 'update': update, 'offersIndexToSend': offersIndexToSend})
    });

/* exec the request and show response msg */
    post(requete1, 'alerte envoyée avec succès', 'fichier introuvable').then(async r => {
        window.scrollTo(0, 0)

        const text = await r.text();

        if (text == 'email_exists') {
            if (confirm('Une alerte existe déjà avec cet e-mail. Mettre à jour?') == true)
                createAlert(email, freq, true)
            else
                alert('false')
        }

        status_light(r.status)
        flash(text)
        hideSplash();
    })
}

/* ============================================================
   send-mail button managing
============================================================ */
if (mailit) {
    mailit.addEventListener("click", () => {
        if ((document.querySelectorAll("input.offer-check:checked").length) == 0) 
            alert('veuillez cocher les offres à envoyer par mail')
        else {
            showModal('email-form')
        }
    })
}

function getTemplate(email) {
    showSplash('envoi en cours…')

/* fill offersIndexToSend[] with the quoted offers' index */
    els = document.getElementsByClassName('checkbox offer-check')
    index = 0;
    offersIndexToSend = [];
    Array.prototype.forEach.call(els, function(el) {
        if (el.checked) offersIndexToSend.push(index);
        index++;
    });

/* build a request to send these indexes and the total count of it to the backend file 
that will use the session and front variables to fill a template and eventually send the mail */
    const requete1 = new Request("mail_offers.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({'total_quoted': offersIndexToSend.length, 'offersIndexToSend': offersIndexToSend, 'email': email, 'csrf': document.getElementById('csrf').value})
    });

/* exec the request and show response msg */
    post(requete1, 'mail envoyé avec succès', 'fichier introuvable ou violation csrf').then(async r => {
        window.scrollTo(0, 0)

if (r.status == 200) {
        const text = await r.text();
        flash(text)
} else {
        status_light(r.status)
        flash(r.text)
}
        if (document.getElementById('create_alert')) document.getElementById('create_alert').focus()
        hideSplash();
    })
}

/* ============================================================
   Prevent double submission
============================================================ */
document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", () => {
        const buttons = form.querySelectorAll("button[type='submit']");
        buttons.forEach(btn => btn.disabled = true);
    });
});

// Show splash screen
function showSplash(text) {
    document.getElementById("splash-message").textContent = text
    document.getElementById("splash").style.display = "flex";
}

// Hide splash screen
function hideSplash() {
    document.getElementById("splash").style.display = "none";
}

// flash message handling
function flash(text) {
    flashMessage.innerHTML = text
}

/* ============================================================
    fill the romeInput input field, the hidden input field and the tooltip after clicking on an item
============================================================ */
document.addEventListener('mousedown', (e) => {
    const item = e.target.closest('.item');
    if (!item) return;

    const libelle = item.dataset.libelle;
    const codeRome = item.dataset.coderome;

    document.getElementById("tooltiptext").textContent = `${libelle} (${codeRome})`;
    document.getElementById("codeROME").value = codeRome
})

/* ============================================================
    reset codeRome hidden input field after clearing the input field text
============================================================ */
document.addEventListener('focusout', (e) => {
    const item = e.target.closest('#romeInput')
    const codeRome = document.getElementById("codeROME")

    if (item) {
        if (!item.value) {
            document.getElementById("codeROME").value = ''
            document.getElementById("tooltiptext").textContent = ``
        }
        item.value = document.getElementById("tooltiptext").textContent
    }
})