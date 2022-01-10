<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style type="stylesheet">



</style>
</head>
<body>
<h1>flatpickr examples live</h1>

<div class="group">
  <input type="text" id="calendar-tomorrow">
  <span class="bar"></span>
  <label class="input-label">From tomorrow</label>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
flatpickr('#calendar-tomorrow', {
    "minDate": "today",
    "mode": "range"


});

</script>


</html>


