(function() {
  var button, buttonStyles, materialIcons;

  materialIcons = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';

  buttonStyles = '<link href="https://codepen.io/andytran/pen/vLmRVp.css" rel="stylesheet">';

  button = '<a href="http://andytran.me" class="at-button"><i class="material-icons">link</i></a>';

  document.body.innerHTML += materialIcons + buttonStyles + button;

}).call(this);

