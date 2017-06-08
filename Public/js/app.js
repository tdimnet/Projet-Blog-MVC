// Select all the buttons within the view
$buttons = $('.sendComment');
$signals = $('.signal');

// Attach an event handler to it and all the relative data
$buttons.click(function() {
  $button = $(this);
});

$signals.click(function() {
  alert('Ce commentaire a bien été signalé');
});
