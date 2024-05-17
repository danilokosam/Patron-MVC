if (palabra) {
  highlightText(palabra);
}

function highlightText(text) {
  removeHighlights();
  var content = document.getElementById("content");
  var regex = new RegExp(`(${text})`, "gi");
  content.innerHTML = content.innerHTML.replace(
    regex,
    '<span class="highlight">$1</span>'
  );
}

function removeHighlights() {
  var content = document.getElementById("content");
  var regex = /<span class="highlight">(.*?)<\/span>/gi;
  content.innerHTML = content.innerHTML.replace(regex, "$1");
}
