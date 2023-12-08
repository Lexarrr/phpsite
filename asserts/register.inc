<h1>Fill the Form</h1>
<br />
<form action="reg.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="userName" class="form-label">Your name: </label>
    <input type="text" id="userName" name="userName" class="form-control" aria-describedby="textHelp" />
    <div id="textHelp" class="form-text">Input your real name</div>
  </div>

  <div class="mb-3">
    <label for="userEmail" class="form-label">Your E-mail: </label>
    <input type="Email" id="userEmail" name="userEmail" class="form-control" aria-describedby="emailHelp" />
    <div id="emailHelp" class="form-text">We dont sent your e-mail anyone</div>
  </div>

  <div class="mb-3">
    <label for="userPass1" class="form-label">Your password: </label>
    <input type="password" name="userPass1" id="userPass1" class="form-control" />
  </div>

  <div class="mb-3">
    <label for="userPass2" class="form-label">Repeat your password: </label>
    <input type="password" name="userPass2" id="userPass2" class="form-control" aria-describedby="emailHelp" />
  </div>

  <input type="submit" name="sent" class="btn btn-primary" value="Отправить" />
</form>