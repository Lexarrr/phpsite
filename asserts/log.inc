<h1>Fill the Form</h1>
<br />
<form action="login.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="userEmail" class="form-label">Your E-mail: </label>
    <input type="Email" id="userEmail" name="userEmail" class="form-control" aria-describedby="emailHelp" />
    <div id="emailHelp" class="form-text">We dont sent your e-mail anyone</div>
  </div>

  <div class="mb-3">
    <label for="userPass" class="form-label">Your password: </label>
    <input type="password" name="userPass" id="userPass" class="form-control" aria-describedby="emailHelp" />
  </div>

  <input type="submit" name="sent" class="btn btn-primary" value="Отправить" />
</form>