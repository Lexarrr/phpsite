<h1>Fill the Form</h1>
<p>
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum accusamus
  numquam dicta, odio unde sequi, ut illum eaque fugit impedit rerum ex veniam
  hic deserunt dolores laboriosam distinctio! Consectetur, ab!
</p>
<br />
<form action="feedback.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="username" class="form-label">Your Name: </label>
    <input
      type="text"
      id="username"
      name="username"
      class="form-control"
      aria-describedby="textHelp"
    />
    <div id="textHelp" class="form-text">Input your exist name</div>
  </div>
  <div class="mb-2">
    <label for="email" class="form-label">Your E-mail: </label>
    <input
      type="email"
      id="email"
      name="email"
      class="form-control"
      aria-describedby="emailHelp"
    />
    <div id="emailHelp" class="form-text">We dont sent your e-mail anyone</div>
  </div>
  <div class="mb-3">
    <label for="textMess" class="form-label">Your message: </label>
    <textarea type="textMess" id="textMess" name="textMess" class="form-control" aria-describedby="messHelp">
    </textarea>
    <div id="messHelp" class="form-text">Input your opinion</div>
  </div>
  <input type="submit" name="sent" class="btn btn-primary" value="Отправить" />
</form>
