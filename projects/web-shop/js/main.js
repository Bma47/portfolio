const checkbox = document.getElementById('check');
checkbox.addEventListener('change', function() {
  if (this.checked) {
    document.body.classList.add('no-scroll');
  } else {
    document.body.classList.remove('no-scroll');
  }
});
