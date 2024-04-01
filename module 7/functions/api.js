const adresseInput = document.getElementById('adresseInput');
const suggestionsList = document.getElementById('suggestionsList');

adresseInput.addEventListener('input', function() {
    const inputValue = adresseInput.value;

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `https://api-adresse.data.gouv.fr/search/?q=${inputValue}`, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            const suggestions = data.features;
            afficherSuggestions(suggestions);
        }
    };
    xhr.send();
});

function afficherSuggestions(suggestions) {
    suggestionsList.innerHTML = ''; // Efface les anciennes suggestions

    suggestions.forEach(suggestion => {
        const li = document.createElement('li');
        li.textContent = suggestion.properties.label;
        li.addEventListener('click', function() {

            const adresseSelectionnee = suggestion.properties.label;
            adresseInput.value = adresseSelectionnee;
            suggestionsList.innerHTML = '';
           
        });
        suggestionsList.appendChild(li);
    });
}